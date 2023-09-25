<?php

namespace App\Http\Controllers;

use App\Models\ContainsModel;
use Illuminate\Http\Request;
use App\Models\PostsModel;
use App\Models\TagsModel;
use App\Models\UsersModel;

class PostController extends Controller{
    // All Blog posts page
    public function listAllPost(){
        $posts = PostsModel::all();
        $allTags = TagsModel::all();
        return view('posts', compact('posts', 'allTags'));
    }


    // Add new Blog page
    public function newform(){
        $allTags = TagsModel::all();
        return view('addPost', compact('allTags'));
    }


    // Insert new Blog to DB
    public function insert(Request $request){
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required|max:4000',
        ]);

        $usermodel = new UsersModel();
        $userId = $usermodel->getUserId();

        PostsModel::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'date' => now(),
            'u_id' => $userId
        ]);

        $postsmodel = new PostsModel();
        $postId = $postsmodel->getPostId($request->input('title'));

        $tags = $request->input('tags', []);
        $existingTagIds = [];
        $newTagNames = [];

        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $existingTagIds[] = $tag;
            } else {
                $newTagNames[] = trim($tag);
            }
        }

        foreach ($existingTagIds as $tagId) {
            ContainsModel::create([
                't_id' => $tagId,
                'p_id' => $postId,
            ]);
        }

        $tagsmodel = new TagsModel();

        foreach ($newTagNames as $tagName) {
            TagsModel::firstOrCreate(['name' => $tagName]);
            $tagId = $tagsmodel->getTagId($tagName);
            ContainsModel::create([
                't_id' => $tagId,
                'p_id' => $postId,
            ]);
        }

        return redirect()->route('add-post')->with('success', 'Blog created successfully!');
    }


    // Delete Blog post
    public function delete($id){
        $post = PostsModel::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Blog can not be found.');
        }

        $post->delete();

        return redirect()->route('posts')->with('success', 'Blog deleted sucessfully!');
    }


    // Modify Blog post
    public function edit($id){
        $post = PostsModel::find($id);
        $allTags = TagsModel::all();

        if (!$post) {
            return redirect()->back()->with('error', 'Blog can not be found.');
        }

        return view('editPost', compact('post', 'allTags'));
    }


    // Update Blog post and connecting Tags in DB
    public function update(Request $request, $p_id){
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required|max:4000',
        ]);

        $post = PostsModel::find($p_id);

        if (!$post) {
            return redirect()->back()->with('error', 'Blog can not be found.');
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $t_ids = ContainsModel::getPostsTids($p_id);
        $tags = $request->input('tags', []);
        $existingTagIds = [];
        $newTagNames = [];

        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $existingTagIds[] = $tag;
            } else {
                $newTagNames[] = trim($tag);
            }
        }

        foreach ($t_ids as $t_id) {
            if (!in_array($t_id, $existingTagIds)) {
                ContainsModel::where('p_id', $p_id)->where('t_id', $t_id)->delete();
            }
        }

        foreach ($existingTagIds as $tagId) {
            if (!in_array($tagId, $t_ids)) {
                ContainsModel::create([
                    't_id' => $tagId,
                    'p_id' => $p_id,
                ]);
            }
        }

        $tagsmodel = new TagsModel();

        foreach ($newTagNames as $tagName) {
            TagsModel::firstOrCreate(['name' => $tagName]);
            $tagId = $tagsmodel->getTagId($tagName);
            ContainsModel::create([
                't_id' => $tagId,
                'p_id' => $p_id,
            ]);
        }

        return redirect()->route('posts')->with('success', 'Blog modified successfully');
    }


    // Single Blog post
    public function showPost($id){
        $post = PostsModel::find($id);
        $allTags = TagsModel::all();

        if (!$post) {
            return redirect()->back()->with('error', 'This blog can not be found!');
        }

        return view('post', compact('post', 'allTags'));
    }


    // Filter Blog posts
    public function filterPost(Request $request){
        $allTags = TagsModel::all();
        $tagId = $request->input('tag');
        $pIds = ContainsModel::getPids($tagId);

        $posts = PostsModel::whereIn('p_id', $pIds)->get();

        return view('posts', compact('posts', 'allTags'));
    }
}

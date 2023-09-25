<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContainsModel;
use App\Models\TagsModel;
use App\Models\PostsModel;


class contains extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $tagmodel = new TagsModel();
        $postmodel = new PostsModel();
        $postid = $postmodel->getPostId("Két éve még lelkesedett az akkugyárért az iváncsai polgármester, mostanra elfogyott a türelme a zaj miatt");
        $tagid = $tagmodel->getTagId("sport");

        if ($postid !== null && $tagid !== null) {
            ContainsModel::create([
                'p_id' => $postid,
                't_id' => $tagid,
            ]);
        }
    }
}

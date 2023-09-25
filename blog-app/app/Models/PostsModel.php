<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'p_id';
    protected $fillable = ['title', 'content', 'date', 'u_id'];

    public function tags(){
        return $this->belongsToMany(TagsModel::class, 'contains', 'p_id', 't_id');
    }

    public function getPostId($post_title){
        $post = self::where('title', $post_title)->first();
        if ($post) {
            return $post->p_id;
        } else {
            return null;
        }
    }


}

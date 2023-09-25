<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 't_id';
    protected $fillable = ['name'];

    public function getTagId($tagName){
        $tag = self::where('name', $tagName)->first();
        if ($tag) {
            return $tag->t_id;
        } else {
            return null;
        }
    }

    public function getTagName($t_id){
        $tag = self::where('t_id', $t_id)->first();
        if ($tag) {
            return $tag->name;
        } else {
            return null;
        }
    }
}

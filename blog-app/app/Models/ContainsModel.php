<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainsModel extends Model
{
    use HasFactory;

    protected $table = 'contains';
    public $timestamps = false;
    protected $fillable = ['t_id', 'p_id'];

    public function getContain($p_id){
        $cont = self::where('p_id', $p_id);
        if ($cont) {
            return $cont->t_id;
        } else {
            return null;
        }
    }

    public static function getPostsTids($p_id){
        return self::where('p_id', $p_id)->pluck('t_id')->toArray();
    }

    public static function getPids($t_id){
        return self::where('t_id', $t_id)->pluck('p_id')->toArray();
    }
}

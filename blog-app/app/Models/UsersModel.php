<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'u_id';

    public function getUserId(){
        $milan_email = 'milan@example.com';
        $user = self::where('email', $milan_email)->first();
        if ($user) {
            return $user->u_id;
        } else {
            return null;
        }
    }
}

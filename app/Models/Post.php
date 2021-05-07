<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "image",
        "description",
        "user_id"
    ];

    public function user(){
        return User::find($this->user_id);
    }
}

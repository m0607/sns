<?php
// モデル
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        "id",
        "user_id",
        "title",
        "image",
        "area",
        "created_at",
        "updated_at"
    ];

}

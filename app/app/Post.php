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
    public function user()
    {
        return $this->belongsTo(User::class);  //1対多の1
    }

    public function report()
    {
        return $this->hasMany(Report::class);  //1対多の1
    }

}

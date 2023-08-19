<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['post_id','content'];
    public $timestamps = false;  //reportのDBにない登録日時を自動的に登録しなくていい
}

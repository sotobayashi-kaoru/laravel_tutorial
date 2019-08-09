<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='Comments';
    protected $fillable =['name','content','post_id'];
}

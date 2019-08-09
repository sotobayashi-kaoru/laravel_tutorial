<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='comments';
    protected $fillable =['name','comment','post_id'];
}



// https://192.168.0.168/posts/store?
// name=sotobayashi
// &
// comment=aaaaaaaaaaaaaaaaaaa

// password = xxxx

// curl 192.168.0.168/posts/update name=sotobayashi & password=xxxx

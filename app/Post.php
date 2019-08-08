<?php
namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
  protected $table = 'posts';
  protected $fillable = ['title','content'];

  public function comments()
  {
    return $this->belongsTo('App\User');
  }
}

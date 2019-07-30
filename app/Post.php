<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
  protected $table = 'posts';
  protected $fillable = ['title','content'];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
}

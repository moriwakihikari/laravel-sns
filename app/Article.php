<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Databese\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
  protected $fillable = [
    'title',
    'body',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function likes(): BelongsToMany
  {
    return $this->belongsToMany('App\User', 'likes')->withTimestamps();
  }

  public function isLikedBy(?User $user): bool
  {
    return $user
      ? (bool)$this->likes->where('id', $user->id)->count()
      : false;
  }

  public function getCountLikesAttribute(): int
  {
    return $this->likes->count();
  }
}

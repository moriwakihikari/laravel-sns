<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Article extends Model
{
    public function user(): BelongsTo
    {
      return $this->BelongsTo('App\User');
    }
}

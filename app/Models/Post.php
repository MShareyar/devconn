<?php

namespace App\Models;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Commentable;

    protected $fillable = ['title','content','user_id'];

    /**
     * Relations related to education model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

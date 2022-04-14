<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use Commentable;
    use Likeable;
    use SoftDeletes;

    protected $fillable = ['title','content','user_id'];

    /**
     * Relations related to education model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

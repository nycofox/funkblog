<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * Disable mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Always include the author when getting a post.
     *
     * @var string[]
     */
    protected $with = ['author'];

    /**
     * Always include the rating attribute in the model.
     *
     * @var string[]
     */
    protected $appends = ['rating'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'approved_at' => 'datetime',
        ];

    /**
     * A post has an author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     *
     */
    public function getRatingAttribute(): ?float
    {

    }

    public function setRating(User $user)
    {

    }
}

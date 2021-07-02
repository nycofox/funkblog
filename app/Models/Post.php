<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * A post has an author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
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

<?php

namespace App\Models;

use App\Traits\HasRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use HasRating;
    use SoftDeletes;

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

    protected $withCount = ['ratings'];

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
        return $this->belongsTo(User::class, 'user_id');
    }

}

<?php

namespace App\Traits;

use App\Models\Rating;

trait HasRating
{

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getRatingAttribute()
    {
        return round($this->ratings()->avg('rating'), 1) ?? 0;
    }

    public function getVoteAttribute()
    {
        return $this->ratings()->where('user_id', auth()->check() ? auth()->id() : null)->rating;
    }

    public function setRate($score)
    {
        if (auth()->check()) {
            return $this->ratings()->updateOrCreate([
                'user_id' => auth()->id(),
//                'post_id' => $this->id,
            ], [
                'rating' => $score,
            ]);
        }
    }

}

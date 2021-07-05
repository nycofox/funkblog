<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class RatePost extends Component
{

    public $post;
    public $userrating;

    public function __construct()
    {
//        $this->userrating = Rating::where(['user_id' => auth()->id(), 'post_id' => $this->post->id])->first()->rating;
        $this->userrating = 2;
    }

    public function rate($score)
    {
        $this->post->setRate($score);
    }

    private function calculateAverageRating()
    {
        $this->rating_average = round($this->post->ratings()->avg('rating'), 1);
    }

    public function render()
    {
        return view('livewire.rating');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RatePost extends Component
{

    public $post;
    public $userrating;
    public $rating_average;
    public $rating;

    public function mount($post)
    {
        $this->post = $post;
        $userrating = $this->post->ratings()->where(['user_id' => auth()->id()])->first();

        if(!$userrating) {
            $this->rating = 0;
        } else {
            $this->rating = (int)$userrating->rating;
        }

        $this->calculateAverageRating();
    }

    public function rate($score)
    {
        $this->post->setRate($score);
        $this->rating = $score;
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

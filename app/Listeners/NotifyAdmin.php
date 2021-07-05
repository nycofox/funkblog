<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\AdminPostCreated;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdmin
{

     /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $admins = Role::where('name', 'admin')->first()->users()->get();

//        dd($admins);

//        dd($event);

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new AdminPostCreated($event->post));
        }
    }
}

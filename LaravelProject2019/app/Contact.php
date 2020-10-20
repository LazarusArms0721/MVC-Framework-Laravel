<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Events\ContactCreated;

class Contact extends Model
{
    use Notifiable;

    protected $dispatchesEvents = [
      'created' => ContactCreated::class

    ];
}

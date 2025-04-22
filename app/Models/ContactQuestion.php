<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactQuestion extends Model
{
    protected $table = 'contact_questions';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status'
    ];

    public $timestamps = true;

    // Define any relationships or additional methods here if needed
}

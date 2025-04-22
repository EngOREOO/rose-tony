<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqHelpSection extends Model
{
    protected $table = 'faq_help_section';

    protected $fillable = [
        'title',
        'description',
        'notice',
        'form_title',
        'button_text'
    ];

    public $timestamps = true;

    // Define any relationships or additional methods here if needed
}

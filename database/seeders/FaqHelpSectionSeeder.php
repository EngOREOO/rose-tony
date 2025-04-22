<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqHelpSection;
class FaqHelpSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        FaqHelpSection::create([
            'title' => 'Need Help?',
            'description' => 'If you have an issue or question that requires immediate assistance, you can click the button below...',
            'notice' => 'Please allow 06 – 12 business days from the time your package arrives...',
            'form_title' => 'Have Any Question',
            'button_text' => 'Ask Question Now',
        ]);

    }
}

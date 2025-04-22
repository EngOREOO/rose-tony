<?php

namespace App\View\Composers;

use App\Models\FooterMenuItem;
use App\Models\FooterSetting;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        $footerSettings = FooterSetting::first() ?? new FooterSetting([
            'about_text' => 'Erna a Germany company, provides exquisite and classic fashion. Our priorities are workmanship, quality, distinctiveness, and adaptability!',
            'working_hours_weekday' => 'Tue-Fri : 8am - 9pm',
            'working_hours_weekend' => 'Sat-Mon : 8am - 9pm',
            'facebook_url' => 'https://www.facebook.com/',
            'twitter_url' => 'https://www.twitter.com/',
            'instagram_url' => 'https://www.instagram.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'phone' => '+00 123 456 789',
            'email' => 'support@example.com',
            'address' => '789 Inner Lane, California, USA',
            'app_store_url' => 'https://www.apple.com/store',
        ]);

        $customerServiceLinks = FooterMenuItem::customerService()->get();
        $ordersReturnLinks = FooterMenuItem::ordersReturn()->get();

        $view->with([
            'footerSettings' => $footerSettings,
            'customerServiceLinks' => $customerServiceLinks,
            'ordersReturnLinks' => $ordersReturnLinks,
        ]);
    }
}
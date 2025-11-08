<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $footer = [
            'footer_phone_no' => '+81383 766 284',
            'footer_description' => 'There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form is also here.',
            'footer_address' => 'Level 13, 2 Elizabeth Steereyt set
            Melbourne, Victoria 3000,Australia',
            'footer_email' => 'noreply@envato.com',
            'footer_text' => 'Lorem ipsum dolor sit amet enim.
            Etiam ullamcorper.',
            'footer_social_facebook' => 'facebook',
            'footer_social_twitter' => 'twitter',
            'footer_copyright' => 'Copyright @ Theme_Pure 2021 All right Reserved',
        ];

        # Delete Footer
        Footer::truncate();


        # Footer Insert Data
        Footer::create($footer);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{

    public function run()
    {
        $videos = [
            [
                'url'=>'https://www.youtube.com/watch?v=1X37RCf5dV4',
                'date' => date('Y-m-d')

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=-WPki1_yUXE',
                'date' => date('Y-m-d', strtotime(' +1 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=j4xVBmgLCvs',
                'date' => date('Y-m-d', strtotime(' +2 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=YBaQpcrFI4c',
                'date' => date('Y-m-d', strtotime(' +3 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=sCGX_Mi-fP4',
                'date' => date('Y-m-d', strtotime(' +4 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=SefK3b18n6k',
                'date' => date('Y-m-d', strtotime(' +5 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=1GOyXhvZBIU',
                'date' => date('Y-m-d', strtotime(' +6 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=2NzHW_vESP4',
                'date' => date('Y-m-d', strtotime(' +7 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=kJz9t0uilnA',
                'date' => date('Y-m-d', strtotime(' +8 day'))

            ],
            [
                'url'=>'https://www.youtube.com/watch?v=R0Oe1s8rg9c',
                'date' => date('Y-m-d', strtotime(' +9 day'))

            ],
        ];
        foreach ($videos as $video)
        {
            Video::create([
                'date'=>$video['date'],
                'url'=>$video['url'],
            ]);
        }
    }
}

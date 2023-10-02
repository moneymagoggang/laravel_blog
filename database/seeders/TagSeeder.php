<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        $data = ['Developer Tools', 'News', 'Others'];
        foreach($data as $name){
            Tag::query()->create([
                'name' => $name
            ]);
        }
//        Post::query()->create([
//            'name' => 'Developer Tools',
//        ]);
//        Post::query()->create([
//            'name' => 'News',
//        ]);
//        Post::query()->create([
//            'name' => 'Others',
//        ]);
    }
}

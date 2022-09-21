<?php

namespace Database\Seeders;

use App\Models\Content\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Page List
        $pages = [
            [
                'category_id' => 3,
                'title' => 'About Us',
                'summary' => 'About Us; Buttercup Events',
                'content' => 'Anyone can locate and attend events that feed their passions and enrich their lives thanks to Buttercup Events, a self-service ticketing platform for live experiences based in Sri Lanka. from gaming tournaments and air guitar competitions to music festivals, marathons, conferences, town hall meetings, and fundraising events. Our goal is to unite the nation via authentic experiences.',
                'image' => 'https://www.verywellmind.com/thmb/w45HA0dco-tSxL21Zc_0wJC0Mi0=/800x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-1057500046-f7e673d3a91546b0bd419c5d8336b2e0.jpg',
                'status' => true,
                'sort_order' => 0
            ],
        ];

        foreach ($pages as $page){
            $page_model = (new Page())->newQuery()->create([
                'category_id' => $page['category_id'],
                'title' => $page['title'],
                'url' => Str::slug($page['title']),
                'summary' => $page['summary'],
                'content' => $page['content'],
                'status' => $page['status'],
                'sort_order' => $page['sort_order']
            ]);
            $page_model->addMediaFromUrl($page['image'])->toMediaCollection('images');
        }
    }
}

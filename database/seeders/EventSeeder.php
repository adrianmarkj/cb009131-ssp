<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Event List
        $events = [
            [
                'category_id' => 1,
                'name' => 'Eat Street',
                'description' => 'The highly popular, much-awaited open-air street food festival, EAT STREET CMB 2023, will tantalize Colombo’s tastebuds on Saturday the 26th and Sunday the 27th of March 2023, from 11.am to 11pm, at Green Path Colombo (Ananda Coomaraswamy Mawatha, Colombo 07). The festival has built a reputation as Colombo’s top street food festival, amongst Colombo’s foodies and everyone else looking to have fun and enjoy good food. Next year, the title sponsor of the event is Coca-Cola, and the Hon. Prasanna Ranatunga – Minister of Tourism is expected to be the Chief Guest at the festival. EAT STREET CMB 2023 is also endorsed by the Sri Lanka Tourism Promotion Bureau.',
                'address' => 'Green Path, Ananda Coomaraswamy Mawatha, Colombo 07',
                'date' => '26/03/23',
                'phone' => '0112 397 397',
                'email' => 'eatstreetcmb@gmail.com',
                'image' => 'https://island.lk/wp-content/uploads/2022/03/EAT-STREET-CMB.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Oktoberfest',
                'description' => "It's that time of the year again when the Oktoberfest takes over not only Colombo but the
                world. Since 1993 the Hilton has been wowing its guests with an experience, and this time they
                certainly did not disappoint. The Hilton sports centre arena takes on a complete makeover,
                housing a large marquee sporting tables and benches, full on Oktoberfest decorations and the
                large crowd (900 strong on opening night) transports you straight into the streets of Munich.
                The live band (German of course) was certainly entertaining, engaging with the audience to
                ensure they keep up with the traditions.

                Consistent chants of “Oans, swoa, drie, g,suffa!” (German for one, two, three, drink!) followed by the lovely sounds of Bavaria, aromas from the large buffet along with German ladies in Dirndl’s keep the celebration going. Boasting a grand selection of food seen at The Oktoberfest, specialty breads, salads, meats, seafood, pretzels and sausages. And an extensive and impressive selection of desserts all thanks to the German born executive chef. On from  November 1 - November 10, make sure you make your reservations early in order to avoid being disappointed. Prost!

                ",
                'address' => 'Hilton, Colombo 07',
                'date' => '01/12/23',
                'phone' => '0112 456 200',
                'email' => 'hilton@gmail.com',
                'image' => 'https://www.sundayobserver.lk/sites/default/files/styles/large/public/news/2019/10/18/z_p35-Original.jpg?itok=ZznafVAO',
            ],
        ];

        foreach ($events as $event){
            $event_model = (new Event())->newQuery()->create([
                'category_id' => $event['category_id'],
                'name' => $event['name'],
                'url' => Str::slug($event['name']),
                'description' => $event['description'],
                'address' => $event['address'],
                'date' => $event['date'],
                'phone' => $event['phone'],
                'email' => $event['email'],
            ]);
            $event_model->addMediaFromUrl($event['image'])->toMediaCollection('images');
        }
    }
}

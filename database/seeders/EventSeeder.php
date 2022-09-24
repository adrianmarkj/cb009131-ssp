<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
                'description' => "The highly popular, much-awaited open-air street food festival, EAT STREET CMB 2023, will tantalize Colombo’s tastebuds on Saturday the 26th and Sunday the 27th of November 2022, from 11.am to 11pm, at Green Path Colombo (Ananda Coomaraswamy Mawatha, Colombo 07). The festival has built a reputation as Colombo’s top street food festival, amongst Colombo’s foodies and everyone else looking to have fun and enjoy good food. Next year, the title sponsor of the event is Coca-Cola, and the Hon. Prasanna Ranatunga – Minister of Tourism is expected to be the Chief Guest at the festival. EAT STREET CMB 2023 is also endorsed by the Sri Lanka Tourism Promotion Bureau.",
                'address' => 'Green Path, Ananda Coomaraswamy Mawatha, Colombo 07',
                'start_date' => '2022-11-26',
                'end_date' => '2022-11-27',
                'price_per_person' => 3000,
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
                'start_date' => '2022-11-01',
                'end_date' => '2022-11-10',
                'price_per_person' => 6000,
                'phone' => '0112 456 200',
                'email' => 'hilton@gmail.com',
                'image' => 'https://www.sundayobserver.lk/sites/default/files/styles/large/public/news/2019/10/18/z_p35-Original.jpg?itok=ZznafVAO',
            ],
            [
                'category_id' => 4,
                'name' => 'Canada and UK Education Fair',
                'description' => "Attend IDP's Canada and UK Education Fair, Meet Top Universities and clear all your doubts to study in abroad!",
                'address' => 'SLIIT Auditorium, Malabe Campus',
                'start_date' => '2022-03-14',
                'end_date' => '2022-03-17',
                'price_per_person' => 1500,
                'phone' => '0117 221 451',
                'email' => 'edufairb@gmail.com',
                'image' => 'https://idpsrilanka.files.wordpress.com/2018/03/srilanka-event-e1520852388190.jpg?w=729',
            ],
            [
                'category_id' => 1,
                'name' => 'APIIT Tantalize',
                'description' => "The annual talent show of A.P.I.I.T, 'Tantalize', kicks off yet again bigger and better than ever before! With the participation of many local universities and institutes, the event promises to be a thrilling evening filled with mind blowing talent, great fun and an awesome atmosphere! To deliver this promise we have assembled a team that consists of 50 full time members under the guidance of the Student Activity Club of APIIT and the past organizing committee of Tantalize, guaranteeing that the event will be an unforgettable experience.",
                'address' => '110 Ananda Coomaraswamy Mawatha, Colombo 07',
                'start_date' => '2023-04-08',
                'end_date' => '',
                'price_per_person' => 1500,
                'phone' => '0118 114 290',
                'email' => 'organizer@gmail.com',
                'image' => 'https://marquettewire.org/wp-content/uploads/2018/08/natl.jpg',
            ],
        ];

        foreach ($events as $event){
            $event_model = (new Event())->newQuery()->create([
                'category_id' => $event['category_id'],
                'name' => $event['name'],
                'url' => Str::slug($event['name']),
                'description' => $event['description'],
                'address' => $event['address'],
                'start_date' => $event['start_date'],
                'end_date' => $event['end_date'],
                'price_per_person' => $event['price_per_person'],
                'phone' => $event['phone'],
                'email' => $event['email'],
            ]);
            $event_model->addMediaFromUrl($event['image'])->toMediaCollection('images');
        }

        DB::table('category_event')->insert(
            array([
                'category_id' => 3,
                'event_id' => 1,
            ],
            [
                'category_id' => 5,
                'event_id' => 1,
            ],
            [
                'category_id' => 7,
                'event_id' => 1,
            ],
            [
                'category_id' => 3,
                'event_id' => 2,
            ],
            [
                'category_id' => 5,
                'event_id' => 2,
            ],
            [
                'category_id' => 7,
                'event_id' => 2,
            ],
            [
                'category_id' => 4,
                'event_id' => 3,
            ],
            [
                'category_id' => 5,
                'event_id' => 3,
            ],
            [
                'category_id' => 6,
                'event_id' => 3,
            ],
            [
                'category_id' => 1,
                'event_id' => 4,
            ],
            [
                'category_id' => 2,
                'event_id' => 4,
            ],
            [
                'category_id' => 5,
                'event_id' => 4,
            ])
        );
    }
}

<?php

use App\Link;
use App\User;
use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urls = [
            'https://www.google.com/',
            'https://www.amazon.com/',
            'https://www.digikala.com/'
        ];

        foreach ($urls as $url){
            $user = User::find(3);
            $this->gnarateLink($user,$url);
        }

    }

    private function gnarateLink($user,$url)
    {
        $count = $user->link()->count()+1;
        $slug = $user->id.'$'.$count;

        Link::create([
            'user_id' => $user->id,
            'url' => $url,
            'slug' => $slug
        ]);
    }
}

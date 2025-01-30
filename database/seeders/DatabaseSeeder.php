<?php

namespace Database\Seeders;

use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use App\Models\Image;
use App\Models\Level;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory(3)->create();

        Level::factory()->create([ "name" => "Oro" ]);
        Level::factory()->create([ "name" => "Plata" ]);
        Level::factory()->create([ "name" => "Bronce" ]);

        User::factory(5)->create()->each( function($user) {
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());

            $user->groups()->attach($this->array(rand(1,3)));

            $user->image()->save(Image::factory()->make([
                "url" => 'https://styles.redditmedia.com/t5_79vh26/styles/communityIcon_wqw69d5xu5bb1.png'
            ]));
        });

        Category::factory(4)->create();
        Tag::factory(6)->create();
        Post::factory(10)->create()->each(function($post){
            $post->image()->save(Image::factory()->make());            
            for ($i=0; $i < rand(1,3); $i++) { 
                $post->tags()->attach($this->array(rand(1,6)));
                $post->comments()->save(Comment::factory()->make());
            }
        });

        Video::factory(10)->create()->each(function($video){
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1,6)));
            for ($i=0; $i < rand(1,10); $i++) { 
                $video->comments()->save(Comment::factory()->make());
            }
        });
    }

    public function array($max){
        $values = [];

        for ($i=0; $i < $max; $i++) { 
            $values[$i] = $i;
        }

        return $i;
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Posts\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::factory()->count(30)->create();

        DB::table('posts')->insert([
            'title' => 'Welcome to Clangim, Starcraft Remastered Clan Management System. This is example Blog News.',
            'slug' => Str::slug('Welcome to Clangim, Starcraft Remastered Clan Management System'),
            'body' => '<div><b>Hello boys</b>, this week we destroyed hardly noobs from Korean team KFC.GJ! <br /><br /><b>Teamgim 4 </b>vs 2 KFC<br /><br /><b>Konyth 2</b>:1 Gisu<br /><b>Boget 2</b>:0 Trash<br />TrueCatch 1:<b>2 Zoma</b><br /><b>EpochZerg 2</b>:0 Dark<br /><b>CAT 2</b>:1 Bocian<br /> ColtX 1:<b>2 NULL</b><br /><br />Next week we gona meet chickens from MCD, prepare for <s>battle</s> dinner my friends!</div>',
            'image' => 'images/posts/1.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]);

    }
}

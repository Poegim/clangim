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

        if(config('app.seed.type') == "demo")
        {

            DB::table('posts')->insert([
                'title' => 'License',
                'slug' => Str::slug('License'),
                'body' => '<div><strong>Apache License 2.0</strong></div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            DB::table('posts')->insert([
                'title' => 'Cookies',
                'slug' => Str::slug('Cookies'),
                'body' => '<div>Cookies.</div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            DB::table('posts')->insert([
                'title' => 'Media',
                'slug' => Str::slug('Media'),
                'body' => '<div>Ingame races icons by www.pngegg.com<br />
                            Flags by Icons vector created by luis_molinero - www.freepik.com<br /></div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);


            DB::table('posts')->insert([
                'title' => 'Welcome to Clangim, Starcraft Remastered Clan Management System.',
                'slug' => Str::slug('Welcome to Clangim, Starcraft Remastered Clan Management System'),
                'body' => '<div><strong>Clangim </strong>is a content management system for <strong>Starcraft Remastered</strong> teams, powered by TALL stack (TailwindCSS, AlpineJS, Laravel, Livewire).&nbsp;<br><br>The modules that are part of the application:&nbsp;</div><ol><li>- blog along with the comments section</li><li>- forum with of hidden subforums</li><li>- team matches module, along with player statistics and email notification about incoming clan wars</li><li>- team section</li><li>- replays with metadata, comments and rating system, replays parsing powered by https://github.com/icza/screp</li><li>- users administration section</li><li>- user panel</li><li>- team settings panel (flags, logo, dark mode colors pallete)</li><li>- authentication modules</li></ol><ul><li><br></li></ul><div>For more information, see: https://github.com/poegim/clangim</div>',
                'image' => 'images/posts/demo.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);


        } elseif(config('app.seed.type') == "deploy")
        {

            DB::table('posts')->insert([
                'title' => 'License',
                'slug' => Str::slug('License'),
                'body' => '<div><strong>Apache License 2.0</strong></div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            DB::table('posts')->insert([
                'title' => 'Cookies',
                'slug' => Str::slug('Cookies'),
                'body' => '<div>Cookies.</div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            DB::table('posts')->insert([
                'title' => 'Media',
                'slug' => Str::slug('Media'),
                'body' => '<div>Ingame races icons by www.pngegg.com<br />
                            Flags by Icons vector created by luis_molinero - www.freepik.com<br /></div>',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);


            DB::table('posts')->insert([
                'title' => 'Welcome to Clangim, Starcraft Remastered Clan Management System.',
                'slug' => Str::slug('Welcome to Clangim, Starcraft Remastered Clan Management System'),
                'body' => '<div><strong>Clangim </strong>is a content management system for <strong>Starcraft Remastered</strong> teams, powered by TALL stack (TailwindCSS, AlpineJS, Laravel, Livewire).&nbsp;<br><br>The modules that are part of the application:&nbsp;</div><ol><li>- blog along with the comments section</li><li>- forum with of hidden subforums</li><li>- team matches module, along with player statistics and email notification about incoming clan wars</li><li>- team section</li><li>- replays with metadata, comments and rating system, replays parsing powered by https://github.com/icza/screp</li><li>- users administration section</li><li>- user panel</li><li>- team settings panel (flags, logo, dark mode colors pallete)</li><li>- authentication modules</li></ol><ul><li><br></li></ul><div>For more information, see: https://github.com/poegim/clangim</div>',
                'image' => 'images/posts/demo.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);


        } elseif(config('app.seed.type') == "tests")
        {
            Post::factory()->count(30)->create();
        }

    }
}

<?php

namespace App\Http\Controllers\Posts;

use App\Models\User;
use Illuminate\View\View;
use App\Mail\NewPostEmail;
use App\Models\Posts\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\HasPoints;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Traits\HasUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    use HasPoints;
    use HasUser;

    public function create(): View
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Post::class);

        $imgPath = NULL;

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:99',
                Rule::unique('posts'),
            ],

            'body' => [
                'required',
                'min:13',
            ],

            'image' => [
                'image',
                'max:512',
                'dimensions:min_width=50,min_height=50,max_height=1024,max_width=1024',
                'mimes:jpg,png',
            ],

        ],[
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        if ($request->image != NULL)
        {
            $postImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($postImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/posts/';
            $postImage->move($uploadLocation,$imgName);
            $imgPath = 'images/posts/'.$imgName;

        }

        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->image = $imgPath;
        $post->user_id = auth()->user()->id;
        $post->save();

        $this->incrementUserPoints();
        $this->sendEmailAboutNewPost($post);

        return redirect()->route('dashboard')->with('success', 'Post added successfully.');

    }

    public function show(Post $post): View
    {
        $postComments = $post->postComments();

        return view('posts.show', [
            'post' => $post,
            'postComments' => $postComments->paginate(25),
        ]);
    }

    public function edit(Post $post): View
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:99',
                Rule::unique('posts')->ignore($post->id, 'id'),
            ],

            'body' => [
                'required',
                'min:13',
            ],

            'image' => [
                'image',
                'max:512',
                'dimensions:min_width=50,min_height=50,max_height=1024,max_width=1024',
                'mimes:jpg,png',
            ],

        ],[
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        if ($request->remove_image == "on")
        {
            $request->image = NULL;
            File::delete($post->image);
            $post->image = NULL;

        }

        if ($request->image != NULL)
        {
            if ($post->image != NULL)
            {
                File::delete($post->image);
            }

            $postImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($postImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/posts/';
            $postImage->move($uploadLocation,$imgName);
            $imgPath = 'images/posts/'.$imgName;
            $post->image = $imgPath;

        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->edited_by = auth()->user()->id;
        $post->save();

        return redirect()->route('post.show', $post->slug)->with('success', 'Post has been updated.');

    }

    public function sendEmailAboutNewPost(Post $post): Void
    {
        $users = User::where('role', '<=', User::INACTIVE)->where('role', '>', User::ADMIN)->get();

        foreach($users as $user)
        {

            Mail::to($user->email)
            ->queue((new NewPostEmail($post))
            ->subject(env('APP_NAME').' - New Post has been added!')
            );

            //Required on local env due to mailtrap engine limits.
            if(env('MAIL_HOST', false) == 'smtp.mailtrap.io'){
                sleep(1);
            }

        }

    }

}

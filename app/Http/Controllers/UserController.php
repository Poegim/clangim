<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(): View
    {
        $this->authorize('view', User::class);
        return view('users.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PostServiceInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostServiceInterface $postService)
    {
        if($posts = $postService->allPost()) {
            return view('home.home',['posts' => $posts]);
        }
        return view('home.welcome');
    }
}

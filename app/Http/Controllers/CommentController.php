<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\CommentRequest;
use App\Contracts\PostServiceInterface;
use App\Contracts\CommentServiceInterface;

class CommentController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $auth, PostServiceInterface $postService)
    {
        if($posts = $postService->getPostByUser($auth->id())){
            return view('comment.create', ['posts' =>$posts]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Guard $auth, CommentServiceInterface $commentService)
    {
        $inputs = $request->only( 'text', 'post_id');
        if ($commentService->addComment($inputs)) {
            return redirect()->back()->with(['success' => "Comment has successfully added!!!"]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!" ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guard $auth, CommentServiceInterface $comment, PostServiceInterface $postService)
    {
        $comments = $auth->user()->comments;
        $posts = $auth->user()->posts;

        return view("comment.user", ['comments' => $comments, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

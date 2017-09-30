<?php
namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Post;
use App\Contracts\PostServiceInterface;

class PostController extends Controller
{
    public function __construct(Post $post)
    {
        parent::__construct();
        $this->middleware('auth');
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostServiceInterface $postService)
    {
        if ($posts = $postService->allPost()) {
            return view("post.index", ['posts' => $posts]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $auth)
    {

            return view("post.create");


//        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Guard $auth, PostServiceInterface $postService)
    {
        $image_name = null;
        if ($request->hasFile('image')) {
            $user_image = $request->file('image');
            $image_name = time().str_random().$user_image->getClientOriginalName();
            $user_image->move(public_path().'/images/', $image_name);
        }
        $inputs = $request->only('title', 'desk', 'user_id');
        $inputs['image'] = $image_name;
        $inputs['user_id'] = $auth->user()->id;

        if ($postService->addPost($inputs)) {
            return redirect()->back()->with(['success' => "Post has successfully created!!!"]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guard $auth, PostServiceInterface $postService)
    {
        $posts = $auth->user()->posts;
        return view("post.user", ['posts' => $posts]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Guard $auth,  PostServiceInterface $postService)
    {
        if ($post = $postService->editPost($id)) {
            return view('post.edit', ['post' => $post]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PostRequest $request, PostServiceInterface $postService)
    {
        $inputs = null;
        if ($request->hasFile('image')) {
            $user_image = $request->file('image');
            $image_name = time().str_random().$user_image->getClientOriginalName();
            $user_image->move(public_path().'/images/', $image_name);
            $inputs = $request->only('title', 'desk');
            $inputs['image'] = $image_name;
        } else {
            $inputs = $request->only('title', 'desk');
        }
        if ($postService->updatePost($inputs, $id)) {
            return redirect()->back()->with(['success' => "Post has successfully updated!!!"]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Guard $auth, PostServiceInterface $postService)
    {

        if ($postService->deletePost($id)) {
            return redirect()->back()->with(['success' => "Post has successfully deleted!!!"]);
        }
        return redirect()->back()->with(['error' => "Something went wrong!!!"]);
    }
}
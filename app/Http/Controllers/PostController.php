<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Alert;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('approval', 'yes')->get();
        return view('user.find', compact('posts'));
    }

    public function pending()
    {
        $posts = Post::where('approval', 'no')->get();
        return view('admin.pending', compact('posts'));
    }

    public function test()
    {
        $posts = Post::all();
        return view('admin.test', compact('posts'));
    }

    public function approved()
    {
        $posts = Post::where('approval', 'yes')->get();
        return view('admin.approved', compact('posts'));
    }

    public function removed()
    {
        $posts = Post::where('approval', 'removed')->get();
        return view('admin.removed', compact('posts'));
    }

    public function search()
    {
         // Validate the input
    $request->validate([
        'gender' => 'required|in:Bride,Groom',
        'age_min' => 'required|integer|min:18',
        'age_max' => 'required|integer|min:18|gte:age_min',
    ]);

    // Retrieve proposals based on the search criteria
    $proposals = Post::where('gender', $request->gender)
        ->whereBetween('age', [$request->age_min, $request->age_max])
        ->get();

    // Pass the results to the view
    return view('user.search', compact('proposals'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $userPostsCount = Post::where('name', Auth::user()->name)->count();

        $hasPaid = Payment::where('user_id', Auth::user()->id)
                      ->where('status', 'done')
                      ->exists();

        if ($userPostsCount >= 3 && !$hasPaid) {
            return redirect()->route('payment.page')->with('warning', 'Please complete the payment to continue.');
    }


    $post = Post::create([
        'name' => $request->name,
        'status' => $request->status,
        'gender' => $request->gender,
        'nationality' => $request->nationality,
        'age' => $request->age,
        'birthday' => $request->birthday,
        'district' => $request->district,
        'city' => $request->city,
        'job' => $request->job,
        'education' => $request->education,
        'image' => $request->image,
        'contact' => $request->contact,
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('images/proposals'), $filename);

        // Update the inventory item with the image filename
        $post->update(['image' => $filename]);
    }

    // Redirect or return success response
            return redirect()->back()->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
    // Error message
            return redirect()->back()->with('error', 'Failed to create member: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('user.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }

    public function approve($id)
    {

    $post = Post::find($id);
    
    
    if ($post) {
        $post->approval = 'yes';
        $post->save();
        Alert::success('Success', 'Post approved successfully!');
        return redirect()->back();
    }
        Alert::error('Error', 'Post not found!');
        return redirect()->back();
    }

    public function remove($id)
    {
    $post = Post::find($id);
    
    
    if ($post) {
        $post->approval = 'removed';
        $post->save();

        return redirect()->back();
    }

        return redirect()->back();
    }
    
    public function restore($id)
    {
    $post = Post::find($id);
    
    
    if ($post) {
        $post->approval = 'yes';
        $post->save();

        return redirect()->back();
    }

        return redirect()->back();
    }
}

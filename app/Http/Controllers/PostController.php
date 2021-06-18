<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('buku.index', compact('posts'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'judul' =>'required',
        'deskripsi' =>'required',
        'harga' =>'required',
        'image' =>'required|image|mimes:png,jpg,jpeg',
        ]);

        //image upload
        $image = $request->file('image');
        $imageName = date('YmdHis').'.'.$image->getClientOriginalExtension();
        $destination = storage_path('app/public/posts');
        $image->move($destination, $imageName);

        $post = Post::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'image'     => $imageName
        ]);

    if($post){
        //redirect dengan pesan sukses
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('post.index')->with(['error' => 'Data Gagal Disimpan!']);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('buku.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    return view('buku.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
        'judul' =>'required',
        'deskripsi' =>'required',
        'harga' =>'required',
        ]);

        $post = Post::findOrFail($post->id);

        if($request->file('image') == ""){
            $post->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            ]);
        }else{
            Storage::disk('local')->delete('public/posts/'.$post->image);
            $image = $request->file('image');
            $imageName = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $destination = storage_path('app/public/posts');
            $image->move($destination, $imageName);

            $post->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'harga'     => $request->harga,
                'image'     => $imageName
            ]);
        }
        if($post){
            return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('post.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('local')->delete('public/posts'.$post->image);
        $post->delete();
        return redirect('post');
    }
}
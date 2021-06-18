@extends('layouts.app')
@section('title', 'Detail')
@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="bg-white p-5 rounded">
        <div class="pt-5 grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3">
                <img src="{{ asset('storage/posts/'.$post->image) }}" class="max-auto w-50 rounded-md">
            </div>
            <div class="row-span-4">
                <div class="judul mb-2">
                    <p><strong>Judul:</strong></p>
                    <p>{{ $post->judul }}</p>
                </div>
                <div class="deskripsi mb-2">
                    <p><strong>Sinopsis:</strong></p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem repellat pariatur vitae debitis
                        quos accusantium ad et aut excepturi eos. Itaque blanditiis enim adipisci fugit consectetur cum
                        officia maiores culpa laboriosam quidem, nostrum corrupti corporis delectus sunt. Ab, aspernatur
                        distinctio voluptatibus ipsum obcaecati porro delectus nostrum, quos cupiditate ad sit.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis possimus quam tempore
                        eius, laboriosam, libero hic cupiditate voluptas consectetur deserunt eum, placeat eaque dicta
                        aliquid debitis saepe aut velit minus sint eligendi repudiandae pariatur repellendus? Nam
                        aliquam deleniti deserunt, nobis soluta accusantium cum quibusdam asperiores modi, tempore,
                        blanditiis repudiandae officia veniam accusamus possimus illo impedit dolore! Soluta amet
                        nostrum provident inventore id quam vel voluptate deserunt porro delectus suscipit obcaecati aut
                        iste minima fugit quas commodi, maiores dolorem, temporibus corporis, quia in asperiores?
                        Recusandae cum, doloremque quos tempora totam vel qui veritatis dolor odio, est neque ex,
                        commodi nam?</p>
                </div>
                <div class="harga mb-2">
                    <p><strong>Harga</strong></p>
                    <p>Rp.{{ $post->harga }}-, </p>
                </div>
                <div class="buttom mt-5">

                    <a href="{{ route('post.index') }}"
                        class="bg-red-600 text-white p-2 rounded shadow-sm focus:outline-none hover:bg-red-700">Cancel</a>
                    <a type="submit" href="{{ route('post.index') }}"
                        class="bg-indigo-500 text-white p-1.5 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Oke</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
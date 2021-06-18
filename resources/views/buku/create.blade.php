@extends('layouts.app')
@section('title', 'Tambah Data')
@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="bg-white p-5 rounded shadow-sm">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Gambar</label>
                <input type="file" name="image"
                class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2">
                @error('image')
                    <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-5">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2"
                placeholder="judul">
                @error('title')
                    <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-5">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2" rows="4" cols="50"></textarea>
                @error('deskripsi')
                    <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-5">
                <label>Harga</label>
                <input type="text" name="harga" value="{{ old('harga') }}"
                class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2"
                placeholder="harga">
                @error('title')
                    <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-5">
                <a href="{{ route('post.index') }}"  class="bg-red-600 text-white p-2 rounded shadow-sm focus:outline-none hover:bg-red-700">Cancel</a>
                <button type="submit" class="bg-indigo-500 text-white p-1.5 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Create</button>
            </div>

        </form>
    </div>
</div>
@endsection
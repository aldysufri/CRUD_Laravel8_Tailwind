@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="bg-white p-5 rounded">
        <div class="col-span-1 my-5">
            <a href="{{ route('post.create') }}"
                class="w-full bg-indigo-500 text-white p-2 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Tambah
                Data</a>
        </div>
        <div class="bg-white shadow-md rounded my-6">
            <table class=" w-full table-auto">
                <thead class="justify-between border-2">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">
                            <span>No</span>
                        </th>
                        <th class="py-3 px-6 text-center">
                            <span class="">Gambar</span>
                        </th>
                        <th class="py-3 px-6 text-center">
                            <span class="">Judul</span>
                        </th>
                        <th class="py-3 px-6 text-center">
                            <span class="">Deskripsi</span>
                        </th>
                        <th class="py-3 px-6 text-center">
                            <span class="">Harga</span>
                        </th>
                        <th class="py-3 px-6 text-center">
                            <span class="">Aksi</span>
                        </th>

                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-16 py-2">
                            <span>{{ ++$i  }}</span>
                        </td>
                        <td class="px-16 py-2">
                           <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-48 rounded-md">
                        </td>
                        <td class="px-16 py-2">
                            <span class="font-medium">{{ $post->judul }}</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            {{ $post->deskripsi }}
                        </td>
                        <td class="px-16 py-2">
                            Rp.{{ $post->harga }}-,
                        </td>
                        <td class="px-10 py-2 text-center">
                            {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('post.destroy', $post->id) }}" method="POST">
                            <button
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:border-indigo-700 text-xs focus:outline-none mr-2"><a
                                    href="{{ route('post.edit', $post->id) }}">EDIT</a></button>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:border-red-700 text-xs focus:outline-none">
                                HAPUS</button>
                            </form> --}}
                                           <form action="{{ route('post.destroy',$post->id) }}" method="POST">
 
                    <a class="bg-blue-400 text-white px-4 py-2 rounded hover:border-blue-900 text-xs focus:outline-none" href="{{ route('post.show',$post->id) }}">Show</a>
 
                    <a class="bg-blue-700 text-white px-4 py-2 rounded hover:border-red-700 text-xs focus:outline-none" href="{{ route('post.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="bg-red-500 text-white px-4 mt-3 py-2 rounded hover:border-red-700 text-xs focus:outline-none" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>

@endsection
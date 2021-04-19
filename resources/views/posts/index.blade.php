@extends('layouts.app')
@section('content')
<div class='flex justify-center p-3'> 
    <div class='w-8/12 bg-white p-6 rounded-lg'>
        <h3 class="text-lg m-5 underline">All Posts</h3>
        <div>
            <form action="{{route('post.store')}}" method="POST">
                @csrf
            <textarea name="post_content" id="" cols="50" rows="5" 
            class="bg-blue-100  @error('post_content') border-red-500 @enderror"></textarea>
            @error('post_content')
            <div class="text-red-500">
             {{$message}} 
             </div>
             @enderror
            <div>
            <input type="submit" value="Create Post" class="mt-3 bg-blue-500 p-3 rounded-lg text-white">
            </div>
            </form>

        </div>
                <ul class="w-8/12">
            @foreach ($posts as $post)
            <li class="m-3 bg-blue-400 p-3 rounded-lg"> {{$post->post_content}} {{$post->created_at}}</li>
            @endforeach
            </ul>
    </div>
</div>
@endsection
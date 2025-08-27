@extends('layout')
@section('main-section')
    <main class="container">
      <h2 class="header-title">All Blog Posts</h2>
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search..." name="search" />
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <div class="categories">
        <ul>
          <li><a href="">Health</a></li>
          <li><a href="">Entertainment</a></li>
          <li><a href="">Sports</a></li>
          <li><a href="">Nature</a></li>
        </ul>
      </div>

 <section class="cards-blog latest-blog grid gap-6 md:grid-cols-2 lg:grid-cols-2">
    @foreach($posts as $post)
    <div class="card-blog-content flex flex-col h-full rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105" data-aos="fade-up">

        <div class="w-full h-48 overflow-hidden relative">
            <img src="{{ asset($post->imagePath) }}" alt="" class="w-full h-full object-cover rounded-t-lg" />
            
            @auth
            @if(Auth::user()->id === $post->user_id)
            <div class="absolute top-2 right-2 flex space-x-2">
                <a href="{{route('blog.edit', $post)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{route('blog.delete', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                </form>
            </div>
            @endif
            @endauth
        </div>

        <div class="p-4 flex-grow flex flex-col justify-between">
            <p class="text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
                <span class="float-right text-gray-700">Written By {{ $post->user->name }}</span>
            </p>
            <h4 class="font-bold text-lg mt-2">
                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
            </h4>
        </div>
    </div>
    @endforeach
</section>


      <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
        <br>
      @endsection
@extends('layout')
      <!-- header -->
@section('header')

        <header class="header" style="background-image: url('{{ asset('images/photography.jpg') }}');">

        <div class="header-text">
          <h1>David Blog</h1>
          <h4>Dashboard of verified life content...</h4>
        </div>
        <div class="overlay"></div>
      </header>
@endsection
      
@section('main-section')

      <!-- main -->
      <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
      <section class="cards-blog latest-blog grid gap-6 md:grid-cols-2 lg:grid-cols-2">
    @foreach($posts as $post)
        <div class="card-blog-content flex flex-col h-full rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105" data-aos="fade-up">
            <div class="w-full h-48 overflow-hidden">
                <img src="{{ asset($post->imagePath) }}" alt="" class="w-full h-full object-cover rounded-t-lg" />
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


        <!-- <section class="cards-blog latest-blog grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
        <div class="card-blog-content flex flex-col h-full rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105" data-aos="fade-up">
          <div class="w-full h-48 overflow-hidden">
             <img src="{{ asset($post->imagePath) }}" alt="" class="w-full h-full object-cover rounded-t-lg" />
          </div>
          <div class="p-4 flex-grow flex flex-col justify-between">
              <p class="text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
                <span class="float-right text-gray-700">Written By {{ $post->user->name }}</span>
              </p>
              <h4 class="font-bold text-lg mt-2">
                <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
              </h4>
          </div>
        </div>
        @endforeach -->
      </main>
      @endsection

     
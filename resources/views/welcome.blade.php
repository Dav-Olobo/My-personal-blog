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
        <section class="cards-blog latest-blog">
          <div class="card-blog-content">
            <img src="{{asset('images/pic1.jpg')}}" alt="" />
            <p>
              2 hours ago
              <span style="float: right">Written By David Wakarindi</span>
            </p>
            <h4 style="font-weight: bolder">
              <a href="{{route('blog.show')}}">Benefits of Paul's Photography capturing your Wedding</a
              >
            </h4>
          </div>

          <div class="card-blog-content" data-aos="fade-left">
            <img src="{{asset('images/pic2.jpg')}}" alt="" />
            <p>
              23 hours ago
              <span style="float: right">Written By David Wakarindi</span>
            </p>
            <h4 style="font-weight: bolder">
              <a href=<a href="{{route('blog.show')}}">
                >Benefits of Using Drones in Aerial Photography</a
              >
            </h4>
          </div>

          <div class="card-blog-content" data-aos="fade-up">
            <img src="{{asset('images/pic3.jpg')}}" alt="" />
            <p>
              2 days ago
              <span style="float: right">Written By David Wakarindi</span>
            </p>
            <h4 style="font-weight: bolder">
              <a href="{{route('blog.show')}}">Best Location Ideas for Your Next Photo Shoot</a
              >
            </h4>
          </div>

          <div class="card-blog-content" data-aos="fade-left">
            <img src="{{asset('images/pic4.jpg')}}" alt="" />
            <p>
              3days ago
              <span style="float: right">Written By David Wakarindi</span>
            </p>
            <h4 style="font-weight: bolder">
              <a href="{{route('blog.show')}}">8 Most Popular Photography Genres</a>
            </h4>
          </div>
        </section>
      </main>
      @endsection

     
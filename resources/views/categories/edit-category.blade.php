@extends('layout')

@section('main-section')
<main style="max-width:700px; margin:30px auto; padding:20px; border:1px solid #ddd; border-radius:8px; background:#fafafa; font-family:Arial, sans-serif;">
    <h2 style="text-align:center; margin-bottom:20px; color:#333;">Edit Category!</h2>
    <div class="contact-form">
        <p></p>
        @include('includes.flash-message')
        
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display:flex; flex-direction:column;">
                <label for="title" style="margin-bottom:5px; font-weight:bold; color:#555;">Category Name</label>
                <input type="text" id="title" name="name" value="{{ old('name', $category->name) }}"
                    style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px; width:100%;">
            </div>
            @error('name') 
            <div style="color:red; font-size:12px; margin-top:-10px;">{{ $message }}</div>
            @enderror

            {{-- 
            <div style="display:flex; flex-direction:column;">
                <label for="slug" style="margin-bottom:5px; font-weight:bold; color:#555;">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required
                        style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px;">
            </div>
            --}}
            <br>
            <button type="submit" style="background-color: black; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                Update
            </button>
        </form>
    </div>
    <br>
    <div class="create-categories">
        <a href="{{route('categories.index')}}">Category List <span>&#8594;</span></a>
    </div>

</main>
@endsection
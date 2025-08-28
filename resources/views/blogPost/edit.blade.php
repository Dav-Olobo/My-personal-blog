@extends('layout')

@section('main-section')
    <main style="max-width:700px; margin:30px auto; padding:20px; border:1px solid #ddd; border-radius:8px; background:#fafafa; font-family:Arial, sans-serif;">
        <h2 style="text-align:center; margin-bottom:20px; color:#333;">Edit Blog Post</h2>
<div class="contact-form">
    <p></p>
   @include('includes.flash-message')
        <form action="{{ route('blog.update', $post) }}" method="POST" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:15px;">
           @method('PUT')
           @csrf

                    <div style="display:flex; flex-direction:column;">
            <label for="title" style="margin-bottom:5px; font-weight:bold; color:#555;">Title</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}"
                style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px; width:100%;">
        </div>
            @error('title') 
            <div style="color:red; font-size:12px; margin-top:-10px;">{{ $message }}</div>
            @enderror
            <!-- Uncomment if you want slug -->
            <!--
            <div style="display:flex; flex-direction:column;">
                <label for="slug" style="margin-bottom:5px; font-weight:bold; color:#555;">Slug</label>
                <input type="text" id="slug" name="slug" required
                       style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px;">
            </div>
            -->

            <div style="display:flex; flex-direction:column;">
                <label for="image" style="margin-bottom:5px; font-weight:bold; color:#555;">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required
                       style="padding:8px; border:1px solid #ccc; border-radius:5px; font-size:14px;">
            </div>
            @error('images') 
            <div style="color:red; font-size:12px; margin-top:-10px;">{{ $message }}</div>
            @enderror

           {{-- Category Field --}}
        <div style="display:flex; flex-direction:column; margin-bottom:15px;">
            <label for="categories" style="margin-bottom:5px; font-weight:bold; color:#555;">Choose a category:</label>
            <select name="category_id" id="categories" style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px;">
                <option selected disabled>Select option</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') 
                <div style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

            <div style="display:flex; flex-direction:column;">
                <label for="body" style="margin-bottom:5px; font-weight:bold; color:#555;">Content</label>
                <textarea id="body" name="body" rows="5" required
                          style="padding:10px; border:1px solid #ccc; border-radius:5px; font-size:14px; resize:vertical;">{{$post->body}}</textarea>
            </div>
            @error('body') 
            <div style="color:red; font-size:12px; margin-top:-10px;">{{ $message }}</div>
            @enderror
            <!-- <button type="submit"
                    style="padding:12px; background:#007bff; color:white; border:none; border-radius:5px; font-size:16px; cursor:pointer; transition:0.3s;">
                Create Post
            </button> -->

            <button type="submit" style="background-color: black; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                Submit
            </button>
        </form>
        </div>
    </main>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
@endsection

@extends('layout')

@section('main-section')
<main style="max-width:700px; margin:30px auto; padding:20px; border:1px solid #ddd; border-radius:8px; background:#fafafa; font-family:Arial, sans-serif;">
    <h2 style="text-align:center; margin-bottom:20px; color:#333;">View Category List!</h2>
    <div class="contact-form">
        {{-- Display status message from session --}}
        @include('includes.flash-message')

        {{-- Category table --}}
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Category Name</th>
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Created At</th>
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">{{ $category->id }}</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">{{ $category->name }}</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">{{ $category->created_at->diffForHumans() }}</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            <a href="{{ route('categories.edit', $category) }}" style="color: #007bff; text-decoration: none; margin-right: 10px;">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 12px; border: 1px solid #ddd; text-align: center;">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('categories.create') }}" style="display: inline-block; padding: 10px 20px; background-color: #141414ff; color: white; text-decoration: none; border-radius: 5px;">Add New Category</a>
        </div>
    </div>
</main>
@endsection
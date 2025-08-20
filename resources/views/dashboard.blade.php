@extends('layout')
@section('main-section')
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                <!-- <p class="mt-4">Welcome to your dashboard, {{ Auth::user()->name }}!</p> -->
        <div style="width:250px; background:#f8f9fa; border:1px solid #ddd; border-radius:8px; padding:15px; font-family:Arial, sans-serif;">

            <ul style="list-style:none; padding:0; margin:0;">
                <li style="margin-bottom:10px;">
                    <a href="{{route('blog.create')}}" style="display:block; text-decoration:none; padding:10px; background:#007bff; color:white; border-radius:5px; text-align:center;">
                        Create Post
                    </a>
                </li>
                <li style="margin-bottom:10px;">
                    <a href="" style="display:block; text-decoration:none; padding:10px; background:#28a745; color:white; border-radius:5px; text-align:center;">
                        Create Category
                    </a>
                </li>
                <li>
                    <a href="" style="display:block; text-decoration:none; padding:10px; background:#17a2b8; color:white; border-radius:5px; text-align:center;">
                        Categories List
                    </a>
                </li>
            </ul>

        </div>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
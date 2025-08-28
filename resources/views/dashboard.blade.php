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

                    <div class="mt-8 p-4 bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg max-w-xs mx-auto">
                        <ul class="list-none p-0 m-0">
                            <li class="mb-4">
                                <a href="{{route('blog.create')}}" class="block p-2 bg-blue-500 hover:bg-blue-700 text-white font-bold text-center rounded">
                                    Create Post
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="{{route('categories.create')}}" class="block p-2 bg-green-500 hover:bg-green-700 text-white font-bold text-center rounded">
                                    Create Category
                                </a>
                            </li>
                            <li>
                                <a href="{{route('categories.index')}}" class="block p-2 bg-gray-500 hover:bg-gray-700 text-white font-bold text-center rounded">
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
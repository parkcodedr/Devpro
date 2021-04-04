@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class=" bg-white p-6 rounded-lg md:w-4/12">
        <div>
            <img class="mx-auto h-12 w-auto" src="{{asset('smartlogo.png')}}" alt="Workflow">
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
                Edit Personal Details
            </h2>

        </div>
        <form class="mt-2 space-y-3" action="/profile" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input id="name" value="{{$user['name']}}" name="name" type="text" class="@error('name') border-red-500 @enderror block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
                @error('name')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="sr-only">Phone</label>
                <input id="phone" name="phone" type="text" class="@error('phone') border-red-500 @enderror block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone" value="{{$user['phone']}}">
                @error('phone')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="stack" class="sr-only">Stack</label>
                    <input id="stack" value="{{$user['stack']}}" name="stack" type="text" class="@error('stack') border-red-500 @enderror block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Stack">
                    @error('stack')
                    <span class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection
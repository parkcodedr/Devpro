@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class=" bg-white p-6 rounded-lg md:w-4/12">
        <div>
            <img class="mx-auto h-12 w-auto" src="{{asset('smartlogo.png')}}" alt="Workflow">
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
                Create an account
            </h2>

        </div>
        <form class="mt-2 space-y-3" action="{{ route('register') }} " method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input id="name" name="name" type="text" class="@error('name') border-red-500 @enderror block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name" value="{{old('name')}}">
                @error('name')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input id="username" name="username" type="text" class=" @error('username') border-red-500 @enderror w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md f focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="{{old('username')}}">
                @error('username')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="sr-only">Phone</label>
                <input id="phone" name="phone" type="text" class="@error('phone') border-red-500 @enderror block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone" value="{{old('phone')}}">
                @error('phone')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" class="@error('email') border-red-500 @enderror  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md  focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{old('email')}}">
                    @error('email')
                    <span class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" class="@error('password') border-red-500 @enderror  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    @error('password')
                    <span class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </span>
                    @enderror
                </div>

            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="@error('password_confirmation') border-red-500 @enderror w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md  focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Comfirm Password">
                @error('password_confirmation')
                <span class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </span>
                @enderror
            </div>


            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection
@extends('layouts.app')
@section('content')
<div class="flex justify-center xm:w-12 ">
    <div class="bg-white p-6 rounded-lg ">
        <div>
            <img class=" mx-auto h-12 w-auto" src="{{asset('smartlogo.png')}}" alt="Workflow">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address
               ') }}
            </div>

            <div class="text-center text-red p-2 rounded-lg text-green-500">
                {{Session::get('status')}}
            </div>



        </div>
        @error('email')
        <div class="text-center text-red p-2 rounded-lg text-red-500">
            {{$message}}
        </div>
        @enderror

        <form class="mt-4 space-y-6" action="forgot-password" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">

                </div>

            </div>



            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
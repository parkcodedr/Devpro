@extends('layouts.app')
@section('content')
<main>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  p-6 rounded-lg shadow-lg m-2">
            <h2 class="text-2xl font-bold mb-2 text-green-500">Welcome</h2>
            <p class="text-gray-500">{{auth()->user()->username}}</p>
        </div>

        <div class="grid sm:grid-cols-3 gap-2 ">
            <div class="bg-indigo-600  p-6 rounded-lg shadow-lg m-2">
                <h2 class="text-2xl font-bold mb-2 text-white">Projects</h2>
                <p class="text-white">12</p>
            </div>
            <div class="bg-pink-500  p-6 rounded-lg shadow-lg m-2">
                <h2 class="text-2xl font-bold mb-2 text-white">Teams</h2>
                <p class="text-white">4</p>
            </div>
            <div class="bg-yellow-400  p-6 rounded-lg shadow-lg m-2">
                <h2 class="text-2xl font-bold mb-2 text-white">Package</h2>
                <p class="text-white">Gold</p>
            </div>
        </div>


    </div>
</main>

@endsection

<script src='{{asset("js/app.js")}}'></script>
@extends('layouts.app')
@section('content')
<!-- component -->
<div class="container flex flex-wrap pt-4 pb-10 m-auto mt-6 md:mt-15 lg:px-12 xl:px-16">
    <div class="w-full px-0 lg:px-4">
        <h2 class="px-12 text-base font-bold text-center md:text-2xl text-blue-700">
            Choose your plan
        </h2>
        <p class="py-1 text-md text-center text-blue-700 mb-10">
            To get most out of this great app, you need to upgrade to a paid plan. choose according to your need
        </p>

        <div class="flex flex-wrap items-center justify-center py-4 pt-0">
            @foreach($plans as $plan)

            <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                {{ csrf_field() }}

                <input name="name" hidden value="{{$user->name}}" />
                <input name="email" type="email" hidden value="{{$user->email}}" />
                <input name="phone" type="tel" hidden value="{{$user->phone}}" />

                <input name="amount" type="text" hidden value="{{$plan->amount}}" />
                <input name="plan" type="text" hidden value="{{$plan->id}}" />
                <input name="description" type="text" hidden value="{{$plan->name}}" />

                <div class="w-full p-4 plan-card">
                    <label class="flex flex-col rounded-lg shadow-lg group relative cursor-pointer hover:shadow-2xl">
                        <div class="w-full px-4 py-6 rounded-t-lg card-section-1">
                            <h3 class="mx-auto text-base font-semibold text-center underline text-indigo-500 group-hover:text-indigo-500">
                                {{$plan->name}}
                            </h3>
                            <p class="text-5xl font-bold text-center group-hover:text-indigo-500 text-indigo-500">
                                N{{$plan->amount}}
                            </p>
                            <p class="text-xs text-center uppercase group-hover:text-indigo text-indigo-500">
                                Yearly
                            </p>
                        </div>
                        <div class="flex flex-col items-center justify-center w-full h-full py-6 rounded-b-lg bg-indigo-500">
                            <p class="text-xl text-white">
                                1 Year
                            </p>
                            <button type="submit" class="w-5/6 py-2 mt-2 font-semibold text-center uppercase bg-white border border-transparent rounded text-indigo-500">
                                Choose
                            </button>
                        </div>
                    </label>
                </div>
            </form>
            @endforeach


        </div>
    </div>
</div>


@endsection
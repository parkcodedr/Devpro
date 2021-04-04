<link rel="stylesheet" href="{{asset('css/app.css')}}" />

@extends('layouts.app')
@section('content')
<div class="flex flex-wrap content-center justify-center">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="mt-5 md:mt-5 md:col-span-6">
                @if(Session::has('success'))
                <div id="flash_message" class="mt-5 mb-5 bg-green-400 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-white mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold text-white">Success</p>
                            <p class="text-sm text-white">{{ Session::get('success') }}</p>
                        </div>
                    </div>
                </div>

                @endif
                @if(Session::has('error'))
                <div id="flash_message" class="mt-5 mb-5 bg-red-400 border-t-4 border-red-500 rounded-b text-red-900 m-5 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-white mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold text-white">Oopss! Error</p>
                            <p class="text-sm text-white">{{ Session::get('error') }}</p>
                        </div>
                    </div>
                </div>

                @endif
                <form action="/project" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name </label>
                                    <input type="text" name="project_name" id="project_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('project_name')
                                    <p class="text-red-600 ">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Discription </label>
                                    <textarea rows="5" type="text" name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </textarea>
                                    @error('description')
                                    <p class="text-red-600 ">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="stack" class="block text-sm font-medium text-gray-700">Stack/Language</label>
                                    <select id="stack" name="stack" autocomplete="stack" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="php">PHP</option>
                                        <option value="JavaScript">JavaScript</option>
                                        <option value="Python">Python</option>
                                        <option value="Java">Java</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                    <label for="live_url" class="block text-sm font-medium text-gray-700">Live URL (Optional)</label>
                                    <input type="text" name="live_url" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>


                                <div class="col-span-6">
                                    <label for="gitlink" class="block text-sm font-medium text-gray-700">Github Link (Optional) </label>
                                    <input type="text" name="gitlink" id="gitlink" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

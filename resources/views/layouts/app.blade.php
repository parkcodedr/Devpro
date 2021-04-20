<html>

<head>
    <title>DevPro</title>
    <meta name="description" content="Developers project management and profiling system">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow fixed  z-10 mx-auto inset-x-0 top-0 flex justify-between items-center p-1">

        <a href="#" class="font-extrabold m-3 uppercase inline-flex hover:text-indigo-700 transition-all duration-500">

            DevPro
        </a>
        <button id="mobileMenuButton" class="p-3 focus:outline-none md:hidden" title="Open side menu">
            <!-- SVG For "x" button -->
            <svg id="mobileMenuButtonClose" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <!-- SVG For "Menu burger" button -->
            <svg id="mobileMenuButtonOpen" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- List of nav item -->
        <div id="sideMenuHideOnMobile" class="bg-white font-semibold z-10 rounded-bl-md flex absolute top-0 right-0 transition-all duration-500 transform translate-x-0
                                            w-1/2 md:w-auto
                                            px-3 md:px-0
                                            flex-col md:flex-row
                                            -translate-y-full md:translate-y-0
                                            md:mt-1 md:items-center md:mx-1 md:uppercase">
            @guest
            <a href="/" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-indigo-600 hover:text-indigo-600 transition-all duration-500 py-1 sm:p-0">Home</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-indigo-600 hover:text-indigo-700 transition-all duration-500 py-1 sm:p-0">About</a>
            <div class="mt-2 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('login') }}" class=" inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Login
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Register
                    </a>
                </div>
            </div>
            @endguest
            @auth
            <a href="/dashboard" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-indigo-600 hover:text-indigo-600 transition-all duration-500 py-1 sm:p-0">Home</a>
            <a href="/project" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-indigo-600 hover:text-indigo-600 transition-all duration-500 py-1 sm:p-0">Project</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-indigo-600 hover:text-indigo-600 transition-all duration-500 py-1 sm:p-0">Team</a>
            <div @click.away="open = false" class="relative " x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span class="">{{auth()->user()->username}}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profile">Profile</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Settings</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
            @endauth
        </div>

    </nav>

    <script>
        var mobileMenuButton = document.getElementById("mobileMenuButton");
        mobileMenuButton.onclick = function() {
            document.getElementById("sideMenuHideOnMobile").classList.toggle("-translate-y-full");
            document.getElementById("sideMenuHideOnMobile").classList.toggle("mt-12");
            document.getElementById("sideMenuHideOnMobile").classList.toggle("shadow");
            document.getElementById("mobileMenuButtonClose").classList.toggle("hidden");
            document.getElementById("mobileMenuButtonOpen").classList.toggle("hidden");
        }
        // Hide element when click outside nav
        var theElementContainer = document.getElementsByTagName("nav")[0];
        document.addEventListener('click', function(event) {
            if (!theElementContainer.contains(event.target)) {
                document.getElementById("sideMenuHideOnMobile").classList.add("-translate-y-full");
                document.getElementById("sideMenuHideOnMobile").classList.remove("mt-12");
                document.getElementById("sideMenuHideOnMobile").classList.remove("shadow");
                document.getElementById("mobileMenuButtonOpen").classList.remove("hidden");
                document.getElementById("mobileMenuButtonClose").classList.add("hidden");
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <main class="mt-20">
        @yield('content')
        <script>
            const alertBox = document.querySelector('#flash_message');
            setTimeout(() => {
                alertBox.remove();
            }, 3000);
        </script>
    </main>
</body>

</html>
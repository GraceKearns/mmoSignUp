<header>
    <div>
        <a href="/">
            <div class="flex-1 relative">
                <img class="w-full h-40  object-cover" src="{{ asset('img/header.png') }}" />
                <h1
                    class="text-center text-4xl md:text-6xl text-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full">
                    Pixel Farming Sim</h1>

            </div>
        </a>
        
            <div class="flex justify-between  bg-amber-900 border-solid border-2 border-yellow-600">
                <div class="flex items-center">
                    <p class="ml-15"> </p>
                </div>
                <div class="flex justify-center items-center ">
                    <p class="text-center"> Online Users: {{ $activeUsersCount = Cache::get('active_users_count', 0) }} </p>
                </div>
                <div class="flex">
                <div class="flex items-center">
                    @auth <!-- Check if the user is authenticated -->
                    <p class="mr-6">Welcome, {{ auth()->user()->name }}</p>
                    @endauth
                </div>
                <a href="./SignOut">
                <div class="flex items-center">
                    @auth <!-- Check if the user is authenticated -->
                    <p class="mr-4 text-red-950">Sign Out?</p>
                    @endauth
                </div>
            </a>
            </div>

            </div>

        </a>
    </div>
</header>

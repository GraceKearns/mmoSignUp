<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.Header')
    <main>
        <div class="bg-black min-h-screen flex flex-col flex-grow-2">
            <section class="flex justify-center space-x-2 mt-5">
                <div class="w-1/4 bg-amber-900 border-solid border-2 border-yellow-600">
                    @foreach ($items as $item)
                    <a href="{{ $item['Route'] }}" >
                        <div class="flex m-3 bg-yellow-600 hover:bg-green-600 ">
                            <img class="w-8 " src="{{ asset($item['Img-Ref']) }}" />
                            <h2 class="ml-5">
                                {{ $item['Name'] }}
                            </h2>
                        </div>
                    </a>
                    @endforeach
                    <h1 class="text-center"> Latest Sign ups </h1>
                    @foreach ($players as $player)
                        <h2 class="text-center m-1">
                            {{ $player['name'] }}
                            {{ $player['registryDate'] }}

                        </h2>
                    @endforeach
                </div>
                <div class="w-2/4 bg-amber-900 border-solid border-2 border-yellow-600">
                    <h1 class="mt-4 text-center text-2xl font-bold "> Play the game </h1>
                    <div class="flex justify-center">
                        <a href="./SignUp" class="flex items-center">
                            <div class="m-10 p-16 rounded-xl bg-yellow-600 hover:bg-green-600 flex items-center justify-center h-48 w-24">
                                <p class="text-center"> New Player? Sign Up! </p>
                            </div>
                        </a>
                        <a href="./SignIn" class="flex items-center">
                            <div class="m-10 p-16 rounded-xl bg-yellow-600 hover:bg-green-600 flex items-center justify-center h-48 w-24">
                                <p class="text-center"> Play now <br/> </p>
                            </div>
                        </a>
                    </div>
                    
                </div>

            </section>
            <section class="flex flex-grow-3 justify-center  mt-4 mb-2 min-h-full">
                <div class="w-3/4 bg-amber-900 "> <!-- Updated width to w-2/3 to match the top section -->
                    <div class="pl-8 bg-yellow-200 ">
                        <h1 class="text-3xl text-center font-bold">News and Updates</h1>
                    </div>
                    <div class="flex items-center bg-yellow-200 ">
                        <div class="w-3/4">
                            <h2 class="text-2xl font-semibold ml-5">1.0 Update</h2>
                            <div class="ml-5">
                                <p>Welcome to the new 1.0 update of the game. I'm going to lorem ipsum this textbox, I'm
                                    going
                                    to
                                    lorem ipsum this textbox, I'm going to lorem ipsum this textbox, I'm going to lorem
                                    ipsum
                                    this
                                    textbox, I'm going to lorem ipsum this textbox.</p>
                            </div>
                        </div>
                        <div class="w-1/4 flex items-center justify-center">
                            <img src="../img/forums.png" alt="Forums Image" />
                        </div>
                    </div>
                    <div class="flex items-center bg-yellow-200 ">
                        <div class="w-3/4">
                            <h2 class="text-2xl font-semibold ml-5">Under Construction</h2>
                            <div class="ml-5">
                                <p>This page is under construction</p>
                            </div>
                        </div>
                        <div class="w-1/4 flex items-center justify-center">
                            <img src="../img/forums.png" alt="Forums Image" />
                        </div>
                    </div>
                </div>
            </section>


        </div>

    </main>
</body>

</html>

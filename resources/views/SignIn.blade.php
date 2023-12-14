<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.Header')
    <div class="bg-black min-h-screen flex flex-col flex-grow-2">
        <section class="flex justify-center space-x-2 mt-16">

            <div class="w-2/4  bg-amber-900 border-solid border-2 border-yellow-600">
                <h1 class="mt-4 text-center text-3xl font-bold mb-4"> Sign In </h1>


                <div class="flex justify-center">
                    <form method="POST" action="/SignIn" class="flex flex-col">
                        @csrf <!-- CSRF protection -->
                        <div class="flex flex-col">
                            <div class="flex items-center mb-4">
                                <label for="email" class="w-48 text-xl mr-2">Email:</label>
                                <input type="email" id="email" name="email"
                                    class="border ml-4 p-2 w-72  bg-yellow-200">
                            </div>
                            @if ($errors->has('email'))
                                <div class="text-red-600 error mb-2">{{ $errors->first('email') }}</div>
                            @endif

                            <div class="flex items-center mb-4">
                                <label for="password" class="w-48 text-xl  mr-2">Password:</label>
                                <input type="password" id="password" name="password"
                                    class="border ml-4 p-2 w-72 bg-yellow-200">
                            </div>
                            @if ($errors->has('password'))
                                <div class="text-red-600 error mb-2">{{ $errors->first('password') }}</div>
                            @endif


                        </div>
                        <input type="submit" value="Submit" class="bg-yellow-600 text-white px-4 py-2 rounded  mb-4">
                    </form>

                </div>

            </div>
        </section>



    </div>

</body>

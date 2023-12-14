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
                <h1 class="mt-4 text-center text-3xl font-bold mb-4"> Create an account </h1>

                @if($errors) 
                <div> {{$errors}} </div>
                @endif
                <div class="flex justify-center">
                    <form method="POST" action="/SignUp" class="flex flex-col">
                        @csrf <!-- CSRF protection -->
                        <div class="flex flex-col">
                            <div class="flex items-center mb-4">
                                <label for="name" class="w-48 text-xl  mr-2">Username:</label>
                                <input type="text" id="name" name="name"
                                    class="border ml-4 p-2 w-72 bg-yellow-200">

                            </div>
                            @if ($errors->has('name'))
                                <div class="text-red-600 error mb-2">{{ $errors->first('name') }}</div>
                            @endif
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

                            <div class="flex items-center mb-4">
                                <label for="confirm_password" class="w-48 text-xl  mr-2">Confirm Password:</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="border ml-4 p-2 w-72  bg-yellow-200">
                            </div>
                            @if ($errors->has('confirm_password'))
                            <div class="text-red-600 error mb-2">{{ $errors->first('confirm_password') }}</div>
                        @endif
                        </div>
                        <div class="flex ">
                            <div class="flex items-center mb-4">
                                <label for="day" class="w-16 text-xl mr-2">Day:</label>
                                <input type="number" id="day" name="day" min="1" max="31"
                                    class="border p-2 bg-yellow-200" placeholder="DD">
                            </div>

                            <div class="flex items-center mb-4">
                                <label for="month" class="w-16 text-xl mr-2 ml-4">Month:</label>
                                <input type="number" id="month" name="month" min="1" max="12"
                                    class="border p-2 bg-yellow-200" placeholder="MM">
                            </div>

                            <div class="flex items-center mb-4">
                                <label for="year" class="w-16 text-xl mr-2 ml-4">Year:</label>
                                <input type="number" id="year" name="year" min="1900" max="2099"
                                    class="border p-2 bg-yellow-200" placeholder="YYYY">
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="bg-yellow-600 text-white px-4 py-2 rounded  mb-4">
                    </form>

                </div>

            </div>
        </section>



    </div>

</body>

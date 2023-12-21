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
                <h1 class="mt-4 text-center text-3xl font-bold mb-4"> Password Reset</h1>
                <div class="flex justify-center">
                    <form method="POST" action="/ChangePassword">
                        @csrf <!-- CSRF protection -->
                        <div class="flex text-center ml-4 mr-4 mb-4 ">
                            <p class="p-8"> Change your password by inputting your email below, if an account exists
                                matching that
                                email they will be given further instructions </p>
                        </div>
                        <div class="flex items-center justify-center mb-4">

                            <label for="email" class="w-10 text-xl mr-2">Email:</label>
                            <input type="email" id="email" name="email"
                                class="border ml-4 p-2 w-72  bg-yellow-200">
                        </div>
                        <div class="flex justify-center">
                            <button type="submit " class="bg-yellow-600 text-white px-4 py-2 rounded  mb-4"> Reset </button>
                        </div>
                    </form>
                </div>
        </section>



    </div>

</body>

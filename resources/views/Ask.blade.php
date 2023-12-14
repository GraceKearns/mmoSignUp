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
                <h1 class="mt-4 text-center text-3xl font-bold mb-4"> Ask a question </h1>


                <div class="flex justify-center">
                    <form method="POST" action="/SendMail" class="flex flex-col">
                        @csrf <!-- CSRF protection -->
                        <div class="flex flex-col">
                            <div class="flex items-center mb-4 justify-center">
                                <label for="email" class="w-25 text-xl mr-1">Your Email:</label>
                                <input type="email" id="email" name="email"
                                    class="border ml-1 p-2 w-72  bg-yellow-200">
                            </div>
                            <div class="flex items-center mb-4 justify-center ">
                                <textarea id="body"  rows="20" cols="70" name="body"
                                    class="border ml-4 p-2  bg-yellow-200"> </textarea>
                            </div>


                        </div>
                        <input type="submit" value="Submit" class="bg-yellow-600 text-white px-4 py-2 rounded  mb-4">
                    </form>

                </div>

            </div>
        </section>



    </div>

</body>

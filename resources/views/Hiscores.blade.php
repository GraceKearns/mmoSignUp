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
                <h1 class="mt-4 text-center text-3xl font-bold mb-4"> High Scores </h1>
                <div class="flex w-full justify-center">
                    <table class="w-2/3 border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $player->name }}</td>
                                    <td class="px-4 py-2 border">{{ $player->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>



    </div>

</body>

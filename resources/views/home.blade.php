<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Hakana</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        #btn-create {
            background-color: var(--bg-primary);
        }

        #actionBar {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <x-layout>
        <section id="actionBar">
            <a href="{{ route('product.create') }}"><button id="btn-create">Create product</button></a>
            <div class="flex justify-between">
                <form>
                    <input placeholder="Search here..." type="text" name="search" id="search-bar">
                    <button style="background-color: var(--bg-secondary);">Search</button>
                </form>
                <select name="sorting" id="">
                    <option value="name">Name</option>
                    <option value="popular">Popular</option>
                    <option value="latest">Latest</option>
                    <option value="older">Older</option>
            </div>
            </select>
        </section>
        <hr class="mt-4 border-gray-500">
        <div id="products" style="display: flex; flex-wrap: wrap;">
            @foreach ($products as $product)
                <x-card :product="$product" />
            @endforeach
        </div>
    </x-layout>


</body>

</html>

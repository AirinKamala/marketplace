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
        form{
            display: grid;
            justify-content: center;
            button{
                background-color: var(--bg-success);
                width: 12rem;
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <x-layout>
        <h1>{{ $title }}</h1>
        <form action="{{ route('products.store') }}" method="post">
            <label for="productName">Product Name</label>
            <input type="text" name="productName" required>
            <label for="price">Price</label>
            <input type="text" name="price" required>
            <label for="stock">Stock</label>
            <input type="text" name="stock" required>
            <button>Submit</button>
        </form>
    </x-layout>

</body>

</html>

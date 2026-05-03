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
       <div>
        <h1>Login</h1>
        <form action="" method="post" style="display: flex; flex-direction: column;">
            <label for="email">Email</label>
            <input type="text" placeholder="email" name="emailAddress">
            <label for="pass">Password</label>
            <input type="text" placeholder="Password" name="pass">
            <button style="background-color: var(--bg-success); width: 12rem;">Login</button>
        </form>
       </div>
    </x-layout>


</body>

</html>

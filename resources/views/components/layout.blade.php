<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>

    {{-- font awesome cdn --}}
    <script src="https://kit.fontawesome.com/d5e2a19206.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-navbar />

    <div class="content">
        {{$slot}}
    </div>
    

    <x-footer />
</body>
</html>
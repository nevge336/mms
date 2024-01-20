<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <section class="image-hero position-relative d-flex align-items-center justify-content-center vh-100">
        <div class="z-index-1">
            @php $locale = session()->get('locale') @endphp

            @yield('content')
        </div>
        <img class="position-absolute w-100 h-100" src="{{ asset('images/home2.jpg') }}" alt="MMS" style="object-fit: cover; object-position: center;">
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="{{$icon}}" class="shadow-light rounded-circle" type="image/icon type" sizes="16x16">

    <title>@yield('title')</title>
    @include('partials.styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>

<body style="background-color: lightcyan">
    @yield('content')
    @include('partials.scripts')
    @include('partials.toast')
</body>
</html>

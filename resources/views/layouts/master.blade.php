
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
{{--    <link rel="icon" href="{{asset('images/icon.png')}}" class="shadow-light rounded-circle" type="image/gif" sizes="16x16">--}}
    <title>@yield('title')</title>
    @include('partials.styles')

</head>

<body>

    @yield('content')
    @include('partials.scripts')
</body>
</html>

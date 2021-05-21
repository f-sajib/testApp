
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="{{$icon}}" class="shadow-light rounded-circle" type="image/icon type" sizes="16x16">

    <title>@yield('title')</title>
    @include('partials.styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>




</head>

<body style="font-family: Samanata,fantasy !important;overflow:hidden;background: linear-gradient(90deg, lightcyan 0%, rgba(145, 240, 227, 1) 35%, cyan 100%);">
    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    @yield('content')
    @include('partials.scripts')
    @include('partials.toast')
</body>
</html>

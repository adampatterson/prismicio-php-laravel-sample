<!DOCTYPE html>
<html lang="en-us">
<head>
    {{--  Meta  --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="prismic.io">

    {{--  Meta Title --}}
    @if (isset($meta['title']))
        <title>{{ $meta['title'] }}</title>
    @else
        <title>Laravel sample</title>
    @endif

    {{--  Meta Description --}}
    @if (isset($meta['description']))
        <meta description="{{ $meta['description'] }}">
    @else
        <meta description="Laravel sample website with content retrieving from prismic.io">
    @endif

    {{--  Favicon  --}}
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon" type="image/x-icon">

    {{--  Fonts  --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--  Style  -->
    <link rel="stylesheet" href="/stylesheets/reset.css"/>
    <link rel="stylesheet" href="/stylesheets/style.css"/>
    <link rel="stylesheet" href="/stylesheets/common.css"/>

    {{--  Scripts  --}}
    <script>
        // Required for previews and experiments
        window.prismic = {
            endpoint: '{{ $endpoint }}'
        }
    </script>
    <script src="https://static.cdn.prismic.io/prismic.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
@if (\Route::currentRouteName() == 'home')
    <div class="homepage" data-wio-id="{{ $document->id }}">
        @else
            <div class="page" data-wio-id="{{ $document->id }}">
                @endif

                @include('partials/header')

                <main>
                    @yield('content')
                </main>

                @include('partials/footer')
            </div>
</body>
</html>

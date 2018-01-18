<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body { padding-bottom: 100px; }
        .level { display: flex; align-items: center; }
        .flex { flex: 1; }
        .mr-1 { margin-right: 1em; }
        [v-cloak] { display: none; }

        .btn:focus, .btn:active:focus, .btn.active:focus {
            outline: 0 none;
        }

        .btn.outline {
            background: none;
            padding: 12px 22px;
            border-radius: 9px;
        }
        .btn-primary.outline {
            border: 1px solid #2a88bd;
            color: #2a88bd;
            font-weight: bold;

        }
        .btn-primary.outline:hover, .btn-primary.outline:focus, .btn-primary.outline:active, .btn-primary.outline.active, .open > .dropdown-toggle.btn-primary {
            color: #f9f2f4;
            background-color: #3097D1;
            box-shadow: #2a2a2a;
        }

        .btn-delete.outline{
            border: 2px solid #dc3545;
            color: #f9f2f4;
            font-weight: bold;
            background-color: #dc3545;


        }
        .btn-delete.outline:hover, .btn-delete.outline:focus, .btn-delete.outline:active, .btn-delete.outline.active, .open > .dropdown-toggle.btn-primary {
            color: #dc3545;
            background-color: #f9f9f9;

        }

    </style>
</head>
<body>
<div id="app">

    @include('layouts.nav')
    @yield('content')

<flash message="{{session('flash')}}"></flash>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
{{----}}
<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Batteries Included - They Make It First, We Make It Last!
            @show
        </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS are placed here -->
        @section('head')
        <link rel="stylesheet" href="{{ URL::asset('tb/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        @show
    </head>

    <body>
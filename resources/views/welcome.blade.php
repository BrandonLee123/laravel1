<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       
            

@extends('layouts.app')
@section('content')
  <div id="slideshow" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#slideshow" data-slide-to="0" class="active"></li>
    <li data-target="#slideshow" data-slide-to="1"></li>
    <li data-target="#slideshow" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{url('')}}" alt="toycar">
    </div>
    <div class="carousel-item">
        <img src="{{url('#')}}" alt="promo">
    </div>
    <div class="carousel-item">
        <img src="{{url('#')}}" alt="toys">
    </div>
    </div>

    <a class="carousel-control-prev" href="#slideshow" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slideshow" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    </a>
  </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
</html>

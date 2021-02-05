<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>QR-Code Demo</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="">
<div class="container">
    @include('nav')

    @foreach($products as $product)
        <div class="row">
            <div class="col-3">
                <img src="{{ $product->image }}" alt="" class="w-50">
            </div>

            <div class="col">
                <p> {{ $product->title }}</p>
                <p>Rs. {{ $product->price }}</p>
            </div>

            <div class="col">
                {{ $product->qrCode() }}
            </div>

            <div class="col">
                {!! $product->barCode() !!}
            </div>

            <hr class="dropdown-divider">
        </div>
    @endforeach
</div>
</body>
</html>

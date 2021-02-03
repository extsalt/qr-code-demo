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

    <div class="row">
        <div class="col-4 mx-auto">

            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="title"
                           required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                              required></textarea>
                </div>

                <div class="mb-3">
                    <label for="product-price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="product-price" placeholder="" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Image</label>
                    <input class="form-control" type="file" id="formFile" name="image" required>
                </div>

                <button class="btn  btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

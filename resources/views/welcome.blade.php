<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Airsoft Information System (A.I.M) - Welcome</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<main>

    <section class="py-3 text-center container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="{{ asset('img/logo.png') }}" width="500">
                <p class="lead text-muted">Welcome to my site, here you will be able to find any and all information you could wish for regarding Airsoft.</p>

                @if (Route::has('login'))
                   <p>
                        @auth
                            <a href="{{ route(Auth::user()->role->name. '.dashboard') }}" class="btn btn-primary my-2">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary my-2">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary my-2">Register</a>
                            @endif
                        @endif
                   </p>
                @endif
            </div>
        </div>
    </section>

    <section class="py-3 text-center container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="{{ asset('img/proper_map.JPG') }}" width="100%">
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Fields</h5>
                            <p class="card-text">Get an overview of airsoft locations near you!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Teams</h5>
                            <p class="card-text">Create or join a team with your friends!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Map</h5>
                            <p class="card-text">See where in Denmark you can play Airsoft!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">&copy;Airsoft Information Map.</p>
        <p class="mb-0">Marco Vang Pedersen.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <title>profile</title>
</head>

<body class="">

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-4 shadow">
        <div>
            <h3 class="text-light">Quiz App</h3>
        </div>
        <!-- dropdown start -->
        <div class="dropdown me-5">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{ auth()->user()->name}}
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('profile.profileIndex')}}">Profile</a></li>
    <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
  </ul>
</div>
        <!-- dropdown end -->
    </header>

    <div class="container-fluid">
        <div class="row">

            <main class="w-50 mx-auto col-lg-10 px-md-4" id="main">
                <div class="shadow-lg mt-5">

            @foreach ($profiles as $profile)
            <div class="card">
                <div class="card-header">
                    <p>profile</p>
                </div>

                <div class="card-body">
                    <div>
                        <p>NAME: {{$profile['name']}}</p>
                    </div>
                    <div>
                        <p>Email: {{$profile['email']}}</p>
                    </div>
                </div>
            </div>
            @endforeach
                   

            </main>
        </div>
    </div>

    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>

</html>
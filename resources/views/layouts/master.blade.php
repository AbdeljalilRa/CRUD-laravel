<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta http-equiv="refresh" content="600"> <!-- Refreshes every 5 seconds -->
</head>

<body>
    
    <nav class="navbar navbar-expand-md navbar-light bg-light" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h4><span style="color: #E88D67;">CRUD</span> Laravel</h4>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('posts.index') }}">All Post</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('users.index') }}">All user</a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>
                <div id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 ">
                        @if (auth()->check())
                        
                    
                        <li class=" dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                            class="fa-solid fa-folder-open fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        
                                        <input class="dropdown-item" type="submit" value="Logout"></input>
                                    </form>
                                </li>

                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-2">
        @yield('content')
    </div>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

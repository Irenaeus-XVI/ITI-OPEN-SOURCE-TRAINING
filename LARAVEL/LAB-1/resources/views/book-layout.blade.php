<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">@yield('project-name')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container-fluid my-3">
        <div class="row">

            <!-- Dark Sidebar -->
            <!-- Professional Dark Sidebar -->
            <aside class="col-md-3">
                <div class="list-group shadow">
                    <a href="dashboard" class="list-group-item list-group-item-action active  text-light">
                        Dashboard
                    </a>
                    <a href="books" class="list-group-item list-group-item-action bg-dark text-light">
                        Books
                    </a>

                    <a href="create-book" class="list-group-item list-group-item-action bg-dark text-light">
                        Create-book
                    </a>

                </div>
            </aside>

            <!-- Content area -->
            <div class="col-md-9">
                @yield('content')
            </div>

        </div>
    </div>
</body>

</html>
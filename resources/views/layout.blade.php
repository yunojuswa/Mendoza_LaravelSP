<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css" />
    <title>Student Portal</title>
</head>

<body class="bg-dark text-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="/" class="navbar-brand">Student Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('students.index') }}" class="nav-link">View Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('students.create') }}" class="nav-link">Create Student</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main>
        <div class="container mt-5 pt-5">
            <div class="row g-4">
                <div class="col-12">
                    <h1 class="mb-4 text-white text-center">Student Portal</h1>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 bg-dark text-white">
                        <div class="card-body border border-primary rounded d-flex flex-column">
                            <h5 class="card-title">Home</h5>
                            <p class="card-text">Return to the dashboard and overview page.</p>
                            <a href="/home" class="btn btn-primary mt-auto">Go to Home</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 bg-dark text-white">
                        <div class="card-body border border-warning rounded d-flex flex-column">
                            <h5 class="card-title">Students</h5>
                            <p class="card-text">View the list of students and manage records.</p>
                            <a href="{{ route('students.index') }}" class="btn btn-warning mt-auto">View Students</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 bg-dark text-white">
                        <div class="card-body border border-success rounded d-flex flex-column">
                            <h5 class="card-title">Create Student</h5>
                            <p class="card-text">Add a new student record to the system.</p>
                            <a href="{{ route('students.create') }}" class="btn btn-success mt-auto">Create Student</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

</body>

</html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css" />
    <title>Student Profile</title>
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

    <!-- MAIN  -->
    <main>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 offset-3">

                  <h2 class="text-white m-0">Add Student</h2>
                  <a href="{{route('students.index')}}" class="btn btn-outline-warning mt-2">Back</a>

                    <div class="card bg-dark text-white mt-4">
                        <div class="card-body border border-light rounded">
                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control bg-dark text-white @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Course</label>
                                    <input type="text" name="course"
                                        class="form-control bg-dark text-white @error('course') is-invalid @enderror" value="{{ old('course') }}">
                                    @error('course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputYearLevel">Year Level</label>
                                    <select id="inputYearLevel" name="yearlevel"
                                        class="form-control bg-dark text-white @error('yearlevel') is-invalid @enderror">
                                        <option value="">Select Year Level</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                    </select>
                                    @error('yearlevel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success text-white">Save</button>
                            </form>
                        </div>

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

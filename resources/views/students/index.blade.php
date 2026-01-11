<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css" />
    <title>Student List</title>
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
            <h2 class="mb-4 text-white">Students List</h2>
            <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Student</a>
            @session('success')
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <strong>Success!</strong> {{ $value }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession
            <table class="table table-bordered table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->yearlevel }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}"
                                    class="btn btn-sm btn-outline-warning">View</a>
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="btn btn-sm btn-outline-info">Edit</a>
                                {{-- <form action="{{route('students.destroy', $student->id)}}" method="POST" class=d-inline>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this student?');"
                                >Delete</button>
                            </form> --}}

                                {{-- <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteStudentModal"
                            data-id="{{$student->id}}"
                            >Delete</button> --}}

                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                                    data-bs-toggle="modal" data-bs-target="#deleteStudentModal"
                                    data-route="{{ route('students.destroy', $student->id) }}">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Student list is empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!--pagination -->
            {{ $students->links('vendor.pagination.bootstrap-5-dark') }}
        </div>

        {{-- Delete modal --}}
        <div class="modal fade" id="deleteStudentModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Delete Student?</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>You're about to delete this project.</p>
                        <p>This action cannot be reserved.</p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete Student
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Delete Student Script --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function(){
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const studentId = this.dataset.id;
                    deleteForm.action = `/students/${studentId}`;
                });
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteUrl = this.dataset.route;
                    deleteForm.action = deleteUrl;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

</body>

</html>

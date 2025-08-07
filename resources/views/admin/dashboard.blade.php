{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="ms-auto">
            <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah halaman dashboard untuk <strong>Admin</strong>.</p>
    </div>
</body>
</html>

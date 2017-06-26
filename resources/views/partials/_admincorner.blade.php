<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>
    @include('partials._topbar')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <img src="/images/admin.svg" alt="admin" height="200">
            </div>
            <div class="col-md-6" style="margin-top: 90px"><h1>Admin Corner</h1></div>
        </div>
    </div>
    @yield('content')
    @include('partials._footer')
</body>
</html>

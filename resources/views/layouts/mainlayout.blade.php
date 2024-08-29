<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Digital | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div class= "main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-danger">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Perpustakaan Digital</a>
            </div>
        </nav>
        
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    
                        @if (Auth::user()->role_id==1)
                        <a href="dashboard" @if(request()->route()->uri =='dashboard') class='active' 
                            @endif>Dashboard</a>
                        <a href="category" @if(request()->route()->uri =='category') class='active' 
                            @endif>Kategori</a>
                        <a href="books" @if(request()->route()->uri =='books') class='active' 
                            @endif>Buku</a>
                        <a href="logout">Logout</a>
                    @else
                    <a href="profile" @if(request()->route()->uri =='profile') class='active' 
                        @endif>Profile</a>
                    <a href="category" @if(request()->route()->uri =='category') class='active' 
                        @endif>Kategori</a>
                    <a href="books"@if(request()->route()->uri =='books') class='active' 
                        @endif>Buku</a>
                    <a href="logout">Logout</a>
                    @endif
                    <footer class="text-center mt-4">
                        <p>Project by Dewangkara Yoga Setyawan</p>
                    </footer>
                        
                    
                </div>
                    <div class="content p-5 col-lg-10">
                        @yield('content')
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
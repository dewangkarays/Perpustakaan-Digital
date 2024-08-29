<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Digital | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var delay = 4000;
            var alertElement = document.querySelector('.alert-success');
            if (alertElement) {
                setTimeout(function () {
                    alertElement.classList.add('hidden'); 
                }, delay);
            }
        });
    </script>
</head>
<style>
.main {
    height: 100vh;
    background-image: url('https://images.unsplash.com/photo-1577985051167-0d49eec21977?q=80&w=1189&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
}
.register-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
        background-color: whitesmoke


    }
    form div {
        margin-bottom: 15px;
    }
    .alert-success {
            opacity: 1; 
            transition: opacity 0.8s ease-in-out; 
        }

    .alert-success.hidden {
            opacity: 0; 
        }

</style>
<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
                @if ($errors->any())
            <div class="alert alert-danger" style="width: 500px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
        <div class="register-box">
            <form action="register" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <label for="username" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    Have account? <a href="/">Login</a>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login SIMMEI</title>
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="col-md-4 mx-auto mt-5 border border-1 rounded-3 p-3">
            <div class="mb-4">
                <h4>LOGIN SIMMEI</h4>
                <div class="form-text">Login menggunakan Username anda</div>
            </div>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('authenticate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text grid text-center text-muted" id="username">
                        <box-icon name='user' size='sm'></box-icon>
                    </span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        id="username" name="username" autocomplete="off" spellcheck="false" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text grid text-center text-muted" id="password">
                        <box-icon name='key' size='sm'></box-icon>
                    </span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="password"
                        id="password" name="password" required>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

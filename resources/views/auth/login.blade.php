<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-secondary text-white text-center py-4">
                    <h3 class="fw-bold mb-0">LOGIN</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                            <label for="floatingEmail">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Your password" name="password">
                            <label for="floatingPassword">Password</label>
                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">
                                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-secondary btn-lg rounded-pill shadow-lg">Login Now</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <small>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#floatingPassword');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>

</body>
</html>

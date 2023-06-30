<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <section>
        <div class="imgbx">
            <img src="/images/dp00177.jpg" alt="">
        </div>
        <div class="contentbx">
            <div class="formbx">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="inputbx">
                        <span>Email</span>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="inputbx">
                        <span>Password</span>
                        <input type="password" name="password" autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="remember">
                        <label for="">
                            <input type="checkbox" name="" id="">
                            Remember me
                        </label>
                    </div>
                    <div class="inputbx">
                        <input type="submit" value="login">
                    </div>
                    <div class="inputbx">
                        <p>Don't have an accont? <a href="{{ route('register') }}">Sign up</a></p>
                    </div>
                </form>
                <h3>Login with social media</h3>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>

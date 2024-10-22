<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lovebirds Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">
</head>
<body>
<div class="container">
    <div class="left-section" style="background: url('{{ image_url($settings->background_image) }}') no-repeat center center/cover;">
        <div class="text-box">
            <h2>{{$settings->description_title}}</h2>
            <p>{{$settings->description}}</p>
        </div>
    </div>

        <div class="right-section">
        @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
            <div class="login-box">
                <h1>{{$settings->login_title}}</h1>
                <h2>Welcome to {{$settings->login_title}}</h2>

                <form method="POST" actions="{{route('admin.login')}}">
                    @csrf
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Enter Email" name="email">
                        @error('email')
                                <span style="color:red; "> {{$message}}</span>
                            @enderror
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="********" name="password">
                        @error('password')
                                <span style="color:red; "> {{$message}}</span>
                            @enderror
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn">Login</button>
                         <!--<a href="#" class="forgot-password">Forgot password?</a> -->
                    </div> 
                    <!-- <p>or</p> -->
                    <!-- <button class="google-signin">Sign in with Google</button> -->
                    <!-- <p class="new-account">New Lovebirds? <a href="#">Create Account</a></p> -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>

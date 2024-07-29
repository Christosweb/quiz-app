<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/vendor/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/vendor/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <title>sign in</title>
</head>
<body>
     <!-- Sing in  Form -->
     <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src={{asset("css/vendor/images/signin-image.jpg")}} alt="sing up image"></figure>
                        <a href="{{ route('signup')}}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <div class=" text-danger">
                            <h3> {{ $errors->first('error') }} </h3>
                        </div>
                        <form method="POST" action = "{{ route('login.signin')}}" class="register-form" id="login-form" >
                            @csrf
                        <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value ="{{$errors->any() ? old('email'):null}}"  placeholder="Your Email"/>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" value ="{{$errors->any() ? old('password'):null}}" placeholder="Password"/>
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember-me" class="agree-term" value="1"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</body>
</html>
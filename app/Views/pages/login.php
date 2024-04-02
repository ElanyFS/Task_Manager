<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/bed932eb60.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-pai">
        <div class="container" id="container">
            <div class="signin-signup">
                <form action="/login/store" method="post" class="sign-in-form" id="login-form">
                    <h2 class="title">Sign In</h2>

                    <div id="error-message"></div>
                    
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" placeholder="Username" name="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>

                    <input type="submit" value="Login" class="btn">

                    <p class="social-text">Or Sign in with social platform</p>
                    <div class="social-media">
                        <a href="" class="social-icons">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-google"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-square-x-twitter"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                    <p class="account-text">Don´t have an account? <a href="#" id="sign-up-btn2">Sign Up</a></p>
                </form>

                <!-- Register -->
                <form action="/login/create" method="post" class="sing-up-form" id="register-form">
                    <h2 class="title">Sign Up</h2>

                    <div class="" id="success-message-register"></div>
                    <div class="" id="error-message-register"></div>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="E-mail" name="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>

                    <input type="submit" value="Sign Up" class="btn">

                    <p class="social-text">Or Sign in with social platform</p>
                    <div class="social-media">
                        <a href="" class="social-icons">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-google"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-twitter"></i>
                        </a>

                        <a href="" class="social-icons">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                    <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign In</a></p>

                </form>
</div>
        </div>
    </div>

    <script src="../assets/js/app.js"></script>
</body>

</html>
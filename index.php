<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login/Sign-In</title>


    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/index.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="styles/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.co.jsm/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <style>
        h1   {color:white; text-align: center}
    </style>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="scripts/login.js"></script>
    <script src="scripts/index.js"></script>
    <style>
        .temp{
            width:250px;
            padding:10px;
            height:50px;
            position:relative;
            font-size: 27px;
            font-family:"Verdana";
            border:1px white solid;
            margin-top:-100px;
            margin-left:-142px;
            margin-bottom: 20px;
            top:50%;
            left:50%;}

        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .temp2{
            width:1500px;
            padding:10px;
            height:30px;
            position:relative;
            font-size: 20px;
            font-family:"Verdana";
            color:white;
            margin-top:-10px;
            margin-left:-180px;
            margin-bottom: 50px;
            top:50%;
            left:50%;
        }
    </style>

</head>

<body>


<div class="container">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div  class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Fancy Hotel</a>
                </div>
            </div>
        </nav>
        <h1 class="temp">Fancy Hotel</h1>
        <h3 class="temp2">A fancy way to book your stay</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="opacity:0.85; ">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Sign Up</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="main.php" method="POST" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Email" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" action="main.php" method="POST" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password1" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
</div>
<div class="container">
</div>
<script src="scripts/login.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/singin.css">
</head>

<body>
<div class="main-form">
    <div class="login-box">
        <h2>Sign In</h2>
        <form action="check-signIn" method="post">
            <div class="user-box">
                <input type="text" name="account" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="">
                <label>Password</label>
            </div>
            <div class="main-btn">
                <button>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
                </button>
                <a href="{{BASE_URL.'sign-up'}}">
                    <button type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Sign Up
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>
</body>

</html>
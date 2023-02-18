<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/signup.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
</head>
<body>
<div id='container'>
    <div class='signup'>
        <form action="{{BASE_URL.'sign-up-save/sign-up'}}" method="post" enctype="multipart/form-data">
            <input type='text' name="user_name" placeholder='Name:'/>
            <input type='email' name="email"  placeholder='Email:'/>
            <input type='text' name="phone"  placeholder='Phone:'/>
            <input type='password' name="pass" placeholder='Password:'/>
            <input type='password' name="re-pass" placeholder='Re-Password:'/>
            <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    add_photo_alternate
                </span>
            </label>
            <input type="file" name="img-user" id="img" class="img-2">
            <input type='submit' name="add-product" placeholder='SUBMIT'/>
        </form>
    </div>
</div>
<script src="./public/js/main.js"></script>
</body>
</html>
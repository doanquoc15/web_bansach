<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập Trang Quảng Trị</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/style_login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="{{asset('public/backend/images/wave.png')}}">
<div class="container">
    <div class="img">
        <img src="{{asset('public/backend/images/bg.svg')}}">
    </div>
    <div class="login-content">
        <form action="{{ URL::to('/admin-dashboard') }}" method="post">
            {{ csrf_field() }}
            <img src="{{asset('public/backend/images/avatar.svg')}}">
            <h2 class="title">Login</h2>
            <?php $message = Session::get('message');
            if (isset($message)){ ?>
            <div class="alert alert-danger">
                <strong>Thất bại! </strong> <?php echo $message;
                Session::put('message', null); // chỉ cho hiển thị một lần ?>
            </div>
            <?php } ?>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user" ></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" class="input" name="admin_userName" id = "userName"
                           oninvalid="this.setCustomValidity('Username không để trống!')"
                           oninput="this.setCustomValidity('')"
                           required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="admin_password" id="password"
                           oninvalid="this.setCustomValidity('Mật khẩu không để trống!')"
                           oninput="this.setCustomValidity('')"
                           required>
                </div>
            </div>
            <a href="#">Quên mật khẩu?</a>
            <input type="submit" class="btn" value="Đăng Nhập">
        </form>
    </div>
</div>
<script type="text/javascript" src="{{asset('public/backend/js/main.js')}}"></script>
</body>
</html>

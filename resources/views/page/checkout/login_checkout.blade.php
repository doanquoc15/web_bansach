{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}" />
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ URL::to('/loginCustomer-customer') }}" method="POST" class="sign-in-form">
                    {{ csrf_field() }}

                    <h2 class="title">Đăng Nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email_account" placeholder="Tài khoản" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_account" placeholder="Password" />
                    </div>
                    <input style="background: #38d39f;" type="submit" value="Đăng Nhập" class="btn solid" />
                    <p class="social-text">Hoặc đăng nhập bằng các nền tảng mạng xã hội</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bạn chưa có tài khoản ?</h3>
                    <p>
                        Bạn chưa có tài khoản để mua sách bên chúng tôi,
                        Click vào đăng ký
                        ngay!
                    </p>
                    <form action="{{ URL::to('/register') }}" method="post">
                        <input style="background:white; color:rgb(0, 165, 247)" type="submit" class="btn" value="Đăng ký" />
                    </form>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>--}}{{--

</html>
--}}{{---------------------------------}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
    <title>Đăng nhập người dùng</title>
    <style type="text/css">
        .container:before{
            background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form class="user" action="{{ URL::to('/loginCustomer-customer') }}" method="post">
                {{ csrf_field() }}
                <h2 class="title">Đăng Nhập</h2>

                <?php $message = Session::get('message');
                if (isset($message)){ ?>
                <div class="alert alert-danger" style="color: red; margin-top: 10px; margin-bottom: 10px;">
                    <strong>Thông báo! </strong> <?php echo $message;
                    Session::put('message', null); // chỉ cho hiển thị một lần ?>
                </div>
                <?php } ?>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email_account" placeholder="email"
                           oninvalid="this.setCustomValidity('Username không được để trống!')"
                           oninput="this.setCustomValidity('')"
                           required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password_account" type="password" placeholder="Mật khẩu"
                           oninvalid="this.setCustomValidity('Mật khẩu không được để trống!')"
                           oninput="this.setCustomValidity('')"
                           required/>
                </div>
                <input style="background: #38d39f;" type="submit" value="Đăng Nhập" class="btn solid" />
                <p class="social-text">Hoặc đăng nhập bằng các nền tảng mạng xã hội</p>
                <div class="social-media">
                    <a href="{{ url('/loginCustomer-facebook') }}" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Tạo mới tài khoản!</h3>
                <p>
                    Bạn chưa có tài khoản, hãy nhấn vào đăng ký ngay để sử dụng dịch vụ của chúng tôi.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    <a href="{{URL::to('/register-checkout')}}" style="text-decoration: none; color: whitesmoke;">Đăng Ký</a>
                </button>
            </div>
            <img src="{{asset('public/frontend/images/log.svg')}}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Bạn đã có tài khoản ?</h3>
                <p>
                    Quay lại trang đăng nhập
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src={{asset('public/frontend/images/log.svg')}} class="image" />
        </div>
    </div>
</div>
</body>
</html>

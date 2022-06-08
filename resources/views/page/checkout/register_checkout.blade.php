<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
        <title>Đăng ký tài khoản</title>
    </head>
    <body>
        {{-- <form action="{{URL::to('/add-customer')}}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="customer_name" placeholder="Họ và tên"/>
            <input type="email" name="customer_email" placeholder="Địa chỉ email"/>
            <input type="password" name="customer_password" placeholder="Mật khẩu"/>
            <input type="text" name="customer_phone" placeholder="Phone"/>
            <button type="submit" class="btn btn-default">Đăng kí</button>
        </form> --}}
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{URL::to('/add-customer')}}" method="POST" class="sign-in-form">
                        {{ csrf_field() }}
                        <h2 class="title">Đăng Ký</h2>
                        <div class="input-field">
                            <i class="fas fa-user-shield"></i>
                            <input type="text"  name="customer_name" placeholder="Họ và tên" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email"name="customer_email"  placeholder="Địa chỉ email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-key"></i>
                            <input type="password" name="customer_password" placeholder="Mật khẩu" />
                        </div>
                        <div class="input-field">
                            <i class="fa fa-phone"></i>
                            <input type="text"name="customer_phone"  placeholder="Phone" />
                        </div>

                        <input style="background:linear-gradient(to right, #32be8f, #38d39f, #32be8f);" type="submit" class="btn" value="Đăng ký"/>
                    </form>
                </div>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Bạn Đã Có Tài Khoản?</h3>
                        <p>
                            Bạn đã có hoặc đã đăng ký tài khoản thành công! Quay
                            lại trang
                            đăng nhập.
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            <a href="{{URL::to('/loginCustomer')}}" style="text-decoration: none; color:
                                whitesmoke;">Đăng nhập</a>
                        </button>
                    </div>
                    <img src={{asset('public/frontend/images/register.svg')}} class="image" alt="" />
                </div>
            </div>
        </div>
    </body>
</html>

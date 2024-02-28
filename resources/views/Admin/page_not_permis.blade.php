
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sản phẩm An Giang - Sở Công thương tỉnh An Giang</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ env('APP_URL') }}/assets/backend/images/favicon.ico">
        <!-- App css -->
        <link href="{{ env('APP_URL') }}/assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}/assets/backend/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}/assets/backend/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}/assets/backend/css/style.css" rel="stylesheet" type="text/css" />
        <script src="{{ env('APP_URL') }}/assets/backend/js/modernizr.min.js"></script>

    </head>

    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('{{ env('APP_URL') }}/assets/backend/images/bg.jpg');background-size: cover;"></div>
        <div class="wrapper-page account-page-full">
            <div class="card">
                <div class="card-block">
                    <div class="account-box">
                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{ env('APP_URL') }}/assets/backend/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>
                            <div class="text-center">
                                <h1 class="text-error">500</h1>
                                <h4 class="text-uppercase text-danger mt-3">Không có quyền truy cập</h4>

                                <a class="btn btn-md btn-block btn-custom waves-effect waves-light mt-3" href="/"> Trở về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-t-40 text-center">
                <p class="account-copyright">2018 © Trường đại học An Giang</p>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ env('APP_URL') }}/assets/backend/js/jquery.min.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/popper.min.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/bootstrap.min.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/metisMenu.min.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/waves.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="{{ env('APP_URL') }}/assets/backend/js/jquery.core.js"></script>
        <script src="{{ env('APP_URL') }}/assets/backend/js/jquery.app.js"></script>

    </body>
</html>

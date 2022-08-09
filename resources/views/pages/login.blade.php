<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gaisano Malls Tenant Portal Login" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Login CSS -->
    <link rel="stylesheet" href="{{ asset('/css/login/login.min.css')}}">
    <!--end::Login CSS -->

    <!--begin::Global CSS-->
    <link rel="stylesheet" href="{{ asset('/css/globals/plugins.bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/globals/prismjs.bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/globals/style.bundle.min.css')}}">
    <!--end::Global CSS-->

    <title>Login - Tenant Portal</title>
</head>
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root" >
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('assets/bg/The-Peak.jpg')}});height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <!--begin::Wrapper-->
                <div class="w-lg-400px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="tenant_signin_form">
                        <div class="text-center mb-10">
                                <!--begin::Logo-->
                                <a href="javascript:;" class="mb-12">
                                <img alt="Logo" src="{{asset('/assets/images/GaisanoMalls.png')}}" class="h-25px">
                            </a>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <h2 class="text-dark mt-5" style="font-size: 17px;">Tenant Portal Login</h2>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="font-weight-bolder font-size-sm " style="color: grey;">Enter your credentials to login to your account</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Input group-->
                        <div class="mb-10 form-group">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg" type="text" name="email" id="email" >
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback">
                                <div data-field="email" id="email_error" data-validator="notEmpty" class="fv-help-block"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 form-group">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>


                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg" type="password" id="password" name="password" >
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback">
                                <div data-field="password" id="password_error" data-validator="notEmpty" class="fv-help-block"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">

                            <label class="text-danger d-none invalid-credentials">Invalid Email Or Password</label>
                            <!--begin::Submit button-->
                            <button type="submit" id="submit_credentials" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Sign In</span>
                            </button>
                            <!--end::Submit button-->
                            <!--begin::Separator-->
                            {{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                            <!--end::Separator-->
                            <!--begin::Google link-->
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt=""  class="h-20px me-3">Continue with Google</a>
                            <!--end::Google link-->
                            <!--begin::Google link-->
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt=""  class="h-20px me-3">Continue with Facebook</a> --}}
                            <!--end::Google link-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->
        <!--begin::Global Config(global config for global JS scripts)-->
        <script src="{{mix('/js/app.js')}}"></script>
        <!--end::Global Config-->

        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('/js/globals/plugins.bundle.js')}}"></script>
        <script src="{{ asset('/js/globals/prismjs.bundle.js')}}"></script>
        <script src="{{ asset('/js/globals/scripts.bundle.min.js')}}"></script>
        <!--end::Global Theme Bundle-->

        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ mix('/js/pages/login/login.js')}}"></script>
        <!--end::Page Scripts-->
</body>
<!--end::Body-->




</html>



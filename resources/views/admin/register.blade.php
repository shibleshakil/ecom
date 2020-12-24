<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Register</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
    <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="loginbox">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{!! $message !!}}</strong>
        </div>
        @endif


        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{!! $message !!}</strong>
        </div>
        @endif
        <form id="register_form" class="form-vertical" method="post" novalidate="novalidate" action="{{ url ('admin-register') }}">@csrf
            <div class="control-group normal_text">
                <h3><img src="{{ asset('images/backend_images/logo.png') }}" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="name" 
                            id="name" placeholder="Enter Your name"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input type="email" name="email" 
                            id="email" placeholder="Enter Your Email" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pwd" 
                            id="pwd" placeholder="Password" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" 
                            id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><input type="submit" value="Register" class="btn btn-info" /></span>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
    <script src="{{ asset('jss/backend_js/matrix.login.js') }}"></script>
    <script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script> 
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script> 
    <script src="{{ asset('js/backend_js/select2.min.js') }}"></script> 
    <script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
    <script src="{{ asset('js/backend_js/matrix.js') }}"></script> 
    <script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
</body>

</html>
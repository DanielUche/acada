<!DOCTYPE html>
<html ng-app = "acada">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title set in pageTitle directive -->
 
     {!! Html::style('public/css/bootstrap.min.css') !!}
    <!-- Fonts -->
    {!! Html::style('public/css/font-awesome/css/font-awesome.min.css') !!}
    <!-- Main CSS files -->
    {!! Html::style('public/css/animate.css') !!}
    
     {!! Html::style('public/css/toastr.min.css') !!}
     {!! Html::style('public/css/ladda-themeless.min.css') !!}
     {!! Html::style('public/css/style.css') !!}
     {!! Html::style('public/css/angular-datepicker.min.css') !!}

    {!! Html::script('public/js/jquery-2.1.1.min.js') !!}
    {!! Html::script('public/js/jquery-ui/jquery-ui.js') !!}
    {!! Html::script('public/js/bootstrap.min.js') !!}
    {!! Html::script('public/js/angular.min.js') !!}

    {!! Html::script('public/js/toastr.min.js') !!}
    
    <title>Acada</title>

    <style type="text/css">
        .computed {
            display: none;
        }
        .computed2 {
            display: none;
        }
        .border-green{
            border:2px solid green;
        }
        .container {
            height: 100%;min-height: 100%;max-height: 100%;
            display: table;
        }
    </style>
</head>
<body class="gray-bg" landing-scrollspy id="page-top" style=" ">
<toaster-container toaster-options="{'position-class':'toast-top-right','close-button':true,'body-output-type':'trustedHtml','showDuration':'200','hideDuration':'100'}">
</toaster-container>

<div id="wrapper" class="top-navigation" >
<div class="row border-bottom white-bg ng-scope">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="#" class="navbar-brand">Acada</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar" ng-controller = "HomeCtrl">
            <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                <li><a href="{{url('/welcome')}}">Browse</a></li>
                <li><a href="#" ng-click="showModal()">Embed Video</a></li>  
                <li uib-dropdown="" class="dropdown">
                    <a href="" uib-dropdown-toggle="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> Account <span class="caret"></span></a>
                    <ul role="menu" uib-dropdown-menu="" class="dropdown-menu">
                        <li><a href="#" >My Embeds</a></li>
                        <li><a href="{{url('/profile')}}">Profile</a></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{url('/login')}}" >Sign In</a></li> 
                <li><a href="{{url('/register')}}">sign Up</a></li> 
            @endif
            </ul>
        </div>
    </nav>
</div>
    @yield('content')
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('.computed').css({'display':'block'});
    });
</script>


{!! Html::script('public/js/spin.min.js') !!}
{!! Html::script('public/js/ladda.min.js') !!}
{!! Html::script('public/js/angular-ladda.min.js') !!}
{!! Html::script('public/js/ui-bootstrap-tpls-1.1.2.min.js') !!}
{!! Html::script('public/js/angular-animate.min.js') !!}
{!! Html::script('public/js/angular-resource.min.js') !!}
{!! Html::script('public/js/moment.min.js') !!}
{!! Html::script('public/js/angular-datepicker.min.js') !!}
{!! Html::script('public/ajaxy/app.js') !!}
{!! Html::script('public/ajaxy/config.js') !!}
{!! Html::script('public/ajaxy/controllers.js') !!}
{!! Html::script('public/ajaxy/utilities.js') !!}
</body>
</html>
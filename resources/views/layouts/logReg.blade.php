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
<body class="gray-bg" landing-scrollspy id="page-top">
<toaster-container toaster-options="{'position-class':'toast-top-right','close-button':true,'body-output-type':'trustedHtml','showDuration':'200','hideDuration':'100'}">
</toaster-container>

<div id="wrapper" class="container" >
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
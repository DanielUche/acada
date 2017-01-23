@extends('layouts.app')
@section("content")
<div class="container" style="border:1x solid red" ng-controller = "ProfileCtrl">

    <div class = "row " style="margin-top:40px">
        
    <div class = "col-md-6 col-md-offset-3">
        <div class="contact-box center-version">
            <a>
                <img alt="image" class="img-circle" src="img/a5.jpg">

                <h3 class="m-b-xs"><strong>{{$user->name}}</strong></h3>

                <div class="font-bold">Contributor</div>
                <address class="m-t-md">
                    <strong>Acada, Inc.</strong><br>
                    Email: {{$user->email}}<br>
                </address>

            </a>
            <div class="contact-box-footer">
                <div class="m-t-xs btn-group">
                    <a class="btn btn-sm btn-white" ng-click ="showUpdateModal()"><i class="fa fa-user-plus"></i> Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
        
    </div>
</div>




@endsection
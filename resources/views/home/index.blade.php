@extends('layouts.app')
@section("content")
<div class="container" style="border:1x solid red" ng-controller = "HomeCtrl">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:20px ">
			<form>
				<input ng-enter = "search()" type="text" class="form-control input-md" name="search" ng-model = "video.search" placeholder="Search Embeded Videos By Title or Category" />
			</form>
		</div>
	</div>

	<div class = "row " style="margin-top:40px">
		<div class="col-md-10 col-md-offset-1 computed">		
			<div class = "col-md-3" style="margin-bottom: 25px" ng-repeat = "v in videos" ng-click = "showEmbedModal(v)">
			<div class="ibox-content text-center" style="padding: 5px 1px 2px 1px">
                <div class="m-b-sm">
                    <img src="public/images/img.jpg" class="img-cirlef" style="width: 196px;height:100px">
                </div>
                <p class="font-bold" style="display: block; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">
                	@{{v.title}}
                </p>
            </div>				
			</div>

			<div class ="row text-center computed" ng-show="!videos.length">
			 	<div class ="col-md-8 col-md-offset-2" >
			 		<a class="btn btn-sm btn-white btn-block" href="{{url('/welcome')}}"> No video found Refresh Embed List </a>
			 	</div>	
			</div>
		</div>
	</div>
</div>




@endsection
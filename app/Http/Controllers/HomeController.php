<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;

use App\Category;
use App\Video;
use App\User;

use DB;
use Auth;
use Input;
use Validator;

class HomeController extends Controller {

	public function __construct()
    {
        $this->middleware('auth',['except' => ['search_videos','get_videos','browse']]);
    }

	public function index(){
		$videos = Video::getVideos();
		return View('home.index');
	}

	public function profile(Request $request){
		$userID = Auth::user()->id;
		$user = User::getuser($userID);
		if($request->isMethod('post')){
			$validate = Validator::make($request->all(), User::rules_onUpdate($request->input('id')));
			if($validate->passes()){
				$save = User::saveuser($request);
				if($save) 
					return response()->json(['success'=>'Profile Updated Successfully']);
				return response()->json(['invalid'=>true, 'msg'=>'an error oured while saving embed code. Plz retry']);
			}
			return response()->json(['invalid'=>true,'errors'=>$validate->messages(),'msg'=>"Record not saved. Some fields are invalid"]);
		}
		if($request->wantsJson()){
			return response()->json($user);
		}
		return View('home.profile')->with('user',$user);
	}

	public function show_embed_modal(Request $request){
		if($request->input('v')){
			$embed = $request->input('embed');
			$title = $request->input('title');
			return View('home.video_modal')->with(['embed'=>$embed,'title'=>$title]);	
		}
		return View('home.embed_modal')->with('categories', Category::getCategories());
	}

	public function save_url(Request $request){
		if($request->isMethod('post')){
			$validate = Validator::make($request->all(), Video::$rules);
			if($validate->passes()){
				$save = Video::save_video($request);
				if($save) 
					return  response()->json(['success'=>'You tube Embed Code saved successfully']);
				return  response()->json(['invalid'=>true, 'msg'=>'an error oured while saving embed code. Plz retry']);
			}
			return response()->json(['invalid'=>true, 'errors'=> $validate->messages()]);
		}
	}

	public function get_videos(){
		return response()->json(['videos' => Video::getVideos()]);
	}

	public function search_videos(Request $request){
		return response()->json(Video::getVideos($request->input('search')));
	}

	public function open_model(){
		$id = Auth::user()->id;
		$user = User::getuser($id);
		return View('home.update')->with('user',$user);
	}

	public function browse(Request $request){
		if(Auth::user()){
			return redirect('welcome');
		}
		if($request->isMethod('post')){
			$request->flash();
			$video = Video::getVideos($request->input('search'));
			return View('home.browse')->with('videos',$video);
		}
		return View('home.browse')->with('videos',Video::getVideos());
	}
}

?>
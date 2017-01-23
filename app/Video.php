<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;

use DB;

class Video extends Model
{
	protected $table ="videos";
	protected $fillable = [
         'user_id' ,'category_id','video_url','title'
    ];

    public static $rules = ['video_url'=>'bail|unique:videos|required', 'category_id'=>'bail|required']; 

    protected $hidden = [];   

    static function save_video($request){
    	 DB::beginTransaction();
            try{
                $input = $request->all();
                $input['user_id'] = 1;
                $input['video_url'] = Video::get_embed($request->input('video_url'));
                $user = Video::create($input); 
            }catch(\Exception $e){
                DB::rollback();
                return $e;
            }
            DB::commit();
            return true;
    }

    static function getVideos ($input=null){
        if(!$input){
            return Video::get();
        }
    	return $perms = DB::table('videos')
                ->join('categories', 'videos.category_id', '=', 'categories.id')
                ->select('videos.id', 'videos.title', 'videos.video_url', 'categories.name')
                ->where('videos.title', 'like', '%'.$input.'%')
                ->orWhere('categories.name','like','%'.$input.'%')
                ->get();
    }

    static function get_embed($url){
		$ytarray=explode("/",$url);
		$ytendarray = end($ytarray);
		$ytendarray= explode("?v=", $ytendarray);
		$ytendstring = end($ytendarray);
		$ytendarray=explode("&", $ytendstring);
		$ytcode = $ytendarray[0];
		return $ytcode;
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password','provider','provider_id'
    ];

    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6',
    ];

    protected static function rules_onUpdate($id) {
        return  ['email'=>'bail|required|email|unique:users,email,'.$id, 'name'=>'bail|required'];
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    static function saveuser($req){
        if($req->input('id')){
            $user = User::where('id',$req->input('id'))->first();
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $save = $user->save();
            if($save){
                return true;
            }
        }else{
            $create = User::create([
            'name' => $req->input('name'),
            'password' => bcrypt($req->input('password')),
            'email' => $req->input('email')]);
            if($create){
                return true;
            }
        }
        
        return false;
    }

    static function getuser($id){
        return User::where('id',$id)->first();
    }
}

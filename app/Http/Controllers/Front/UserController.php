<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showUserName(){
        
        return 'Mostafa Mostafa';
    }
    public function getIndex(){
        /*$data=[];
        $data['id']=5;
        $data['name']='mostafa mostafa';*/
       /* $obj= new \stdClass();
        $obj-> name = 'mostafa';
        $obj-> id = '7';
        $obj-> gender = 'male';*/

       // return view ('welcome')->with('name','mostafa ahmad');
       $data=['mostafa','bassem'];
       return view ('welcome',compact('data'))->with('data',$data);
    }
}
//{{$obj -> name}} --{{$obj ->id}}
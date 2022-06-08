<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function  index(){
        $user = user::All();
        return view('users.index')->with('user',$user);
    }

    public function  create(){

        return view('users.create');
    }

    public function  insert( Request $request){
        $userNew = new  User();
        $userNew -> name = $request-> name;
        $userNew -> save();

        return redirect('/crud');
    }
    public function  edit($id){
        $userEdit = user::find($id);
        return view('users.edit')-> with('user', $userEdit);
    }
    public function  update(Request $request , $id){
        $userEdited = user::find($id);
        $userEdited -> name = $request-> name;
        $userEdited -> save();
        return redirect('/crud');

    }

    public function  delete(Request $request , $id){
        $userEdited = user::find($id);

        $userEdited -> delete();
        return redirect('/crud');

    }



}
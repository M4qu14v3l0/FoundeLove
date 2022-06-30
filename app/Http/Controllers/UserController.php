<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function  index(){
        //$user = user::All();
        //return view('users.index')->with('user',$user);
        //return User::all();
        return UserResource::collection(User::all());
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
        $userDelete = user::find($id);

        $userDelete -> delete();
        return redirect('/crud');

    }

    public function export(){
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function exportPDF(){
        $user = user::all();
        $pdf = PDF::loadView('pdf\users',['user'=>$user]);
        return $pdf-> download('user.pdf');
    }
<<<<<<< HEAD

=======
>>>>>>> 48a56c040cfb2e3e14b5b65e5cefc5520d5fc7c9
}

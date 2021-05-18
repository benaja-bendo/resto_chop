<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::where('role','admin')->get();
        return view('admin.users.adminUser',[
            'users'=>$users
        ]);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.allUser',[
            'users'=>$users
        ]);
    }

    public function profil($id)
    {
        $user = User::find($id);
        return view('admin.users.profil',[
            'user'=>$user
        ]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['string', 'max:255'],
            'email' => ['required', 'email'],
            'tel' => ['numeric'],
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->number_phone = $request->tel;
        if ($user->save()) {
            return back()->with('success', 'modification avec success');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()){
            return back()->with('success', 'suppression avec success');
        }
    }

}

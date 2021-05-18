<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function all(){
        $restaurants = Restaurant::select('*')->orderby('created_at','DESC')->get();
        return view('admin.Restaurants.AllRestaurants',[
            'restaurants'=>$restaurants,
        ]);
    }

    public function profil($restaurant, $id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin.Restaurants.profil',[
            'restaurant'=>$restaurant
        ]);
    }

    public function store(Request $request){

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'sigle' => ['required'],
            'image' => ['required', 'image'],
            'email_public' => ['email'],
            'number_public' => ['numeric'],
        ]);

        if (request()->hasFile('image')) {
            $image_path = '/storage/' . $request->image->store('image_restaurants', 'public');
        }

        $restaurant = Restaurant::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'profile_photo_path'=>$image_path,
            'sigle'=>$request->sigle,
            'email_public'=>$request->email_public,
            'number_public'=>$request->number_public,
        ]);

        return back()->with('success', 'creation avec success');
    }


    public function update(Request $request,$id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'sigle' => ['required'],
            'image' => ['required', 'image'],
            'email_public' => ['email'],
            'number_public' => ['numeric'],
        ]);
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->name;
        $restaurant->slug = Str::slug($request->name, '-');
        $restaurant->sigle = $request->sigle;
        $restaurant->email_public = $request->email_public;
        $restaurant->number_public = $request->number_public;
        if (request()->hasFile('image')) {
            $restaurant->profile_photo_path  = '/storage/' . $request->image->store('image_restaurants', 'public');
        }
        if ($restaurant->save()) {
            return back()->with('success', 'modification avec success');
        }

    }

    public function destroy($id){
        $restaurant = Restaurant::findOrFail($id);
        $file_path = public_path().$restaurant->profile_photo_path;
        File::delete($file_path);
        if($restaurant->delete()){
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function writePost(){
        return view('page.write_post');
    }

    public function addCategory(){
        return view('page.add_category');
    }

    public function storeCategory(Request $request){
        //print_r($request->);
        //return view();
        //echo $request->categories_name;
        $validatedData = $request->validate([
            'categories_name' => ['required', 'unique:categories', 'max:25'],
            'slug' => ['required', 'unique:categories', 'max:25']
        ]);


        $data = array();
        $data['categories_name'] = $request->categories_name;
        $data['slug'] = $request->slug;
        //return response()->json($data);
        $insertToDb = DB::table('categories')->insert($data);
        if($insertToDb){
            $notification = array(
                'message' => "successfully inserted",
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => "something went wrong",
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function allCategory(){
        $data = DB::table('categories')->get();
        return view('page.all_category', compact('data'));
    }
}
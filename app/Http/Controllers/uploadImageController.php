<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Images;
use Image;
use DB;
use File;

class uploadImageController extends Controller
{
    public function store(request $request){

        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);
        // $imageName = $request->image->getClientOriginalName();
        $imagePath = $request->image->store('/image/backup','public');
        $imagePath = $request->image->store('/image','public');
        $imagePathInfo = pathinfo($imagePath);
        $imageName = $imagePathInfo['basename'];
        Images::create([
            'image' => $imageName,
        ]);
        return redirect('/');
    }
    
    public function default(){
        $img = Images::latest('created_at', 'desc')->first()->image;
        if(Storage::exists('public/image/'.$img)) {
            //Found existing file then delete
            Storage::delete('public/image/'.$img);  
          }
        Storage::copy('public/image/backup/'.$img, 'public/image/'.$img);
        
        return redirect('/');
    } 

    public function index(){
        $Imageurl = Images::first();
        if (!empty($Imageurl)) {
            $Imageurl = Images::latest()->first()->image;
        }else{
            $Imageurl == 0;
        }
        return view('index', compact('Imageurl'));
    }

    public function flip(){        
        $img = Images::latest('created_at', 'desc')->first()->image;
        $image = Image::make(public_path("/storage/image/{$img}"));
        //Flip the Image 180 degree
        $image->flip('v')->save();
        return redirect('/');
    }

    public function brightness(){        
        $img = Images::latest('created_at', 'desc')->first()->image;
        $image = Image::make(public_path("/storage/image/{$img}"));
        //brightness the image
        $image->brightness(35)->save();
        return redirect('/');
    }

    public function darkness(){        
        $img = Images::latest('created_at', 'desc')->first()->image;
        $image = Image::make(public_path("/storage/image/{$img}"));
        //darkness the image
        $image->brightness(-35)->save();
        return redirect('/');
    }
    
    public function contrast(){        
        $img = Images::latest('created_at', 'desc')->first()->image;
        $image = Image::make(public_path("/storage/image/{$img}"));
        //contrast the image
        $image->gamma(1.6)->save();
        return redirect('/');
    }
    
    public function blur(){        
        $img = Images::latest('created_at', 'desc')->first()->image;
        $image = Image::make(public_path("/storage/image/{$img}"));
        //blur the image
        $image->blur(15)->save();
        return redirect('/');
    }
}
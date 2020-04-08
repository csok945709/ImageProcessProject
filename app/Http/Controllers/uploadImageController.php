<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Images;
use Image;
use DB;


class uploadImageController extends Controller
{
    public function store(request $request){

        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);
       
        $imagePath = $request->image->store('image','public');
        Images::create([
            'image' => $imagePath,
        ]);
        return redirect('/');
    }

    public function index(){
        $Imageurl = Images::latest()->first()->image;
        return view('index', compact('Imageurl'));
    }

    public function rotate(){
        // Here Need GEt IMG FROM STORAGE AND MAKE ROTATE AND SAVE
        
        return view('index', compact('store'));
    }
}
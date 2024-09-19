<?php

// namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;

// class ImageUploadController extends Controller
// {
//     //

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     // public function index(): View

//     // {
//     //     return view('image-upload');
//     // }

//     /**
//      * Display a listing of the resource.
//      *
//     //  * @return \Illuminate\Http\Response
//      */
//     // public function store(Request $request): RedirectResponse
//     // {
//     //     $request->validate([
//     //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//     //     ]);

//     //     $image = $request->file('image');
//     //     $imageName = time() . '.' . $image->extension();

//     //     $destinationPathThumbnail = public_path('images/thumbnail');
//     //     $img = Image::read($image->path());
//     //     $img->resize(500, 00, function ($constraint) {
//     //         $constraint->aspectRatio();
//     //     })->save($destinationPathThumbnail . '/' . $imageName);

//     //     $destinationPath = public_path('/images');
//     //     $image->move($destinationPath, $imageName);

//     //     return back()->with('success', 'Image Uploaded successfully!')
//     //         ->with('imageName', $imageName);
//     // }
// }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;  // For logging


class ImageController extends Controller
{
    // public function upload(Request $request)
    // {
    //     // Add validation for the image
    //     $request->validate([
    //         'croppedImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Ensure the file is an image
    //     ]);

    //     if ($request->hasFile('croppedImage')) {
    //         $file = $request->file('croppedImage');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();

    //         // Store the file in public/uploads
    //         Storage::put('public/uploads/' . $filename, file_get_contents($file));

    //         // Get the public URL of the uploaded image
    //         $url = Storage::url('uploads/' . $filename);

    //         // Return the image URL in the response
    //         return response()->json(['success' => true, 'url' => $url]);
    //     }

    //     return response()->json(['success' => false], 400);
    // }


    // public function upload(Request $request)
    // {
    //     // Log if the request hits this point
    //     Log::info('File upload initiated.');

    //     // Validate the uploaded image
    //     $request->validate([
    //         'croppedImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Check if the file is received
    //     if ($request->hasFile('croppedImage')) {
    //         Log::info('File received:', ['file' => $request->file('croppedImage')]);

    //         // Get the uploaded file
    //         $file = $request->file('croppedImage');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();

    //         // Store the image in the public/uploads directory
    //         Storage::put('public/uploads/' . $filename, file_get_contents($file));
    //         Log::info('File stored:', ['filename' => $filename]);

    //         // Get the URL of the uploaded image
    //         $url = Storage::url('uploads/' . $filename);
    //         Log::info('File URL generated:', ['url' => $url]);

    //         // Return the image URL in the response
    //         return response()->json(['success' => true, 'url' => $url]);
    //     } else {
    //         Log::info('File was not received.');
    //     }

    //     return response()->json(['success' => false], 400);
    // }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'croppedImage' => 'required',
        ]);

        // Get the cropped image data
        $imageData = $request->input('croppedImage');

        // Extract base64 data and decode
        $imageParts = explode(";base64,", $imageData);
        $imageBase64 = base64_decode($imageParts[1]);
        $imageName = uniqid() . '.jpg';

        // Store the image
        Storage::disk('public')->put('uploads/' . $imageName, $imageBase64);

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
}


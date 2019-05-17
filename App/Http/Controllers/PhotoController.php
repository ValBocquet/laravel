<?php

namespace App\Http\Controllers;

use Illuminate\Http\FormRequest;
use App\Http\Requests\ImagesRequest;
use Request;

class PhotoController extends Controller
{
    public function getForm() {
        return view('photo');
    }

    public function postForm(ImagesRequest $request) {
        $img = $request->file('image');


        if (Request::hasFile('image')) {
            if (Request::file('image')->isValid()) {
                $chemin = config('images.path');
                $extension = strrchr($img, '.');

                do {
                    $nom = str_random(10) . '.' . $extension;
                } while (file_exists($chemin . '.' . $nom));

                if($img->move($chemin, $nom)) {
                    return view('photo_ok');
                }
            }
        }
        // if($img->isValid()) {
        //     $chemin = config('images.path');
        //     $extension = $img->getClientOriginalExtension();

        //     do {
        //         $nom = str_random(10) . '.' . $extension;
        //     } while (file_exists($chemin . '.' . $nom));

        //     if($img->move($chemin, $nom)) {
        //         return view('photo_ok');
        //     }
        // }

        return redirect('photo')
            ->with('error', 'Problème lors de l\'envoi de l\'image');
    }
}

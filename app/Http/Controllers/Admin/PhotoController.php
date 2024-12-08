<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PhotoController extends Controller
{
    public function create(Request $request)
    {
        $files = $request->file('files');

        if (! is_null($files)) {
            foreach ($files as $file) {
                if ($file->isValid()) {

                    $filePath = $file->store('storage/photos', 'public');

                    Photo::create([
                        'src' => $filePath,
                    ]);

                }
            }

            return redirect()->back()->with('message', 'Zdjęcia zostały dodane');
        }

        return redirect()->back()->with("error", "Wystąpił błąd");
    }


    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->back()->with("message", "Zdjęcie zostało usunięte");
    }


    public function index()
    {
        $photos = Photo::all();

        return Inertia::render('Admin/Photo/Index', compact('photos'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now()->format('Y-m-d');
        return view('admin.albums.create', compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'desc' => 'required | string',
            'date' => 'required | string',
            'image' => 'mimes:jpeg, | max:10000 | required',
            'files.*' => 'image | mimes:jpeg,| max:10000',
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->desc = $request->desc;
        $album->date = $request->date;
        $album->save();

        $album->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('main_image');

        foreach ($request->files as $file) {
            foreach ($file as $image) {
                if ($image !== null) {
                    $album->addMedia($image)
                        ->preservingOriginal()
                        ->toMediaCollection('images');
                }
            }
        }

        return redirect(route('albums.index'))->with('message', 'Альбом успешно сохранен.');

        //return redirect(route('albums.upload', $album));

    }


    /**
     * @param Album $album
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function uploadImages(Album $album)
//    {
//        return view('admin.albums.upload', compact('album'));
//    }
//
//    public function storeImages(Request $request)
//    {
//
//        $response['status'] = 'success';
//
//        return $response;
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $main_image = $album->getFirstMedia('main_image');
        $images = $album->getMedia('images');
        return view('admin.albums.show', compact('album', 'main_image', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $main_image = $album->getFirstMedia('main_image');
        $images = $album->getMedia('images');
        return view('admin.albums.edit', compact('album', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required | string',
            'desc' => 'required | string',
            'date' => 'required | string',
//            'image' => 'mimes:jpeg, | max:10000 | required',
//            'files.*' => 'image | mimes:jpeg,| max:10000',
        ]);

        $album->title = $request->title;
        $album->desc = $request->desc;
        $album->date = $request->date;
        $album->update();

//        $album->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('main_image');
//
//        foreach ($request->files as $file) {
//            foreach ($file as $image) {
//                if ($image !== null) {
//                    $album->addMedia($image)
//                        ->preservingOriginal()
//                        ->toMediaCollection('images');
//                }
//            }
//        }

        return redirect(route('albums.index'))->with('message', 'Альбом ' . $album->title . ' успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect(route('albums.index'))->with('message', 'Альбом успешно удален.');
    }
}

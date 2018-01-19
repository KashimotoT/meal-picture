<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show picuter's list
        $photo = Photo::latest('ctreated_at')->paginate(10);
        return View('photos.create')->with('photos', $photo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //get all requests
        $input = $request->all();
        //
        // //get original name
        $fileName = $input['fileName']->getClientOriginalName();

        // //get request of fileName
        $file = $request->file('fileName');
        //
        // //give a randam fileName？
        // $file_path = $file->store('/photos');

        //get path
        $image = Image::make($file->getRealPath());

        //resize image
        $image->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        //save image
        $image->save(public_path().'/images'.$fileName);

        //path
        $path = '/photos/'. $fileName;

        //add record
        $photo = new Photo();
        $photo->path = 'images/' . $fileName;
        $photo->save();
        return redirect('/photos/')->with('status', 'ファイルのアップロード完了');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}

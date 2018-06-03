<?php

namespace App\Http\Controllers;

use App\models\ClubImage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Auth;
use Illuminate\Support\Facades\Storage;

class ClubImageController extends Controller
{
    public function __construct() {



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Club $club
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  ) {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {


        $file = $request->file('image');
        $path = 'public/users/'. $request->user_id;
        $filename = $request->file('image')->getClientOriginalName();
        $image = $filename;
        $file->move($path,$image);





           $image = ClubImage::create([
                'club_id' => $request->club_id,
                'user_id' => $request->user_id,
                'image_path' => $image,
                'tags' => null,
                'active' => 1,

                'main' => 0
            ]);

            return response()->json($image);

    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show() {
        echo 'owner.show.event';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Club $club
     * @param Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(  ) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Event $event
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update( ) {


    }
    public function changeActive(Request $request){
        $image = ClubImage::findOrFail($request->image_id);

        if($image->active == 1){
            $image->active = 0;
            $image->update();
        } else {
            $image->active = 1;
            $image->update();
        }
    }

    public function changeMain(Request $request){
        $image = ClubImage::findOrFail($request->image_id);
        if($image->main == 0){
            $club_images = ClubImage::where('club_id', $image->club_id)->where('id', '!=', $image->id)->get();
            if(!empty($club_images)){
                foreach ($club_images as $club_image){
                    $club_image->main = 0;
                    $club_image->update();
                }
            }
            $image->main = 1;
            $image->update();
        } else {
            $image->main = 0;
            $image->update();
        }


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy( Request $request ) {

       $image = ClubImage::findOrFail($request->ClubImage_id);


       $image->delete();

    }
}

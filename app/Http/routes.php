<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;
use App\Product;
use App\Staff;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function (){

   $staff = Staff::find(1);

   $photo = new Photo(['path'=>'example.jpg']);

   $staff->photos()->save($photo);

});

Route::get('/create/product/photo', function (){

    $pro = Product::find(1);
    $photo = new Photo(['path'=>'expro.jpg']);
    $pro->photos()->save($photo);

});

Route::get('/read', function (){

   $staff = Staff::find(1);
   foreach ($staff->photos as $photo){

       echo $photo->path . "<br>";

   }

});

Route::get('/update', function (){

   $staff = Staff::find(1);

   $photo = $staff->photos()->where('imageable_id', 1)->first();
   $photo->path = 'update.jpg';
   $photo->save();

});


Route::get('/delete', function () {

    $staff = Staff::find(1);
    //$photo = $staff->photos()->where('imageable_id', 1)->first();

    //$photo->delete();

    $staff->photos()->delete();

});


Route::get('/assign', function (){

    $staff = Staff::find(1);
    $photo = Photo::find(9);
    $staff->photos()->save($photo);

});


Route::get('/un-assign', function (){

    $staff = Staff::find(1);
    $staff->photos()->whereId(9)->update(['imageable_id'=>'', 'imageable_type'=>'']);

});










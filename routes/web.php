<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function (){
    $user=User::findOrFail(1);
    $post= new Post(['title'=>'mero bazar2','body'=>'this side is super cool 2']);
    $user->posts()->save($post);


});

Route::get('/read', function (){
    $user= User::find(1);
    foreach ($user-> posts as $posts){
        echo $posts . "<br>";
    }

});

Route::get('/update', function (){
    $user= User::findOrFail(1);
    //$user->posts()->whereId(1)->update(['title'=>'Php','body'=>'PhP is awasome for learning']);
    $user->posts()->where('id','=',2)->update(['title'=>'Php laravel','body'=>'PhP is awasome for learning']);



});

Route::get('/delete',function (){
    $user=User::findOrFail(1);
    $user->posts()->whereId(1)->delete();
    $user->posts()->delete();
});

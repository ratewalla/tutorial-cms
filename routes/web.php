<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use Carbon\Carbon;


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

// Route::get('/', function () {

//     return view('welcome');

// });

// Route::get('/about', function () {

//     // return view('welcome');h
//     return "Hi about page.";

// });

// Route::get('/contact', function () {

//     // return view('welcome');

//     return "Hi contact page";

// });

// route::get('/post/{id}/{name}', function($id, $name){

//     return "This is post number ".$id." ".$name;

// });


// //Below shortens/ nicknames url

// Route::get('/admin/post/example', array('as'=>'admin.home',function(){

//     $url = route('admin.home');
//     return "this url is " . $url;

// }));



// Route::get('/post/{name}/{id}', 'PostsController@index');

// Route::resource('post', 'PostsController');

// Route::get('/contact/{name}', 'PostsController@showContact');

// Route::get('post/{id}/{name}', 'PostsController@showPost');


// Route::get('insert',function(){
//     DB::insert('insert into posts(title, content)values(?,?)',['PHP with laravel', 'Laravel is cool']);
// });

// reading

// Route::get('/read',function(){

//     $results = DB::select('select * FROM posts where id = ?', [1]);

//     foreach ($results as $post) {
//         return $post->title;
//     }

// });



// updating

// Route::get('update',function(){

//     $updated = DB::update('update posts set title = "updated title" where id=?',[1]);
//     return $updated;

// });

// deleting

// Route::get('delete',function(){

//     DB::delete('delete from posts where id=?',[1]);
    
// });


///////////////////////////////// ELOQUENT / ORM /////////////////////////////////////////

// Route::get('read',function(){

//     $posts=Post::all();

//     foreach ($posts as $post) {
//         return $post->content;
//     }

// });

// Route::get('find',function(){

//     $posts=Post::find(2);

//     // foreach ($posts as $post) {
//     //     return $post->content;
//     // }

//     return $posts->content;

// });


// Route::get('/findwhere',function(){

//     $posts = Post::where('id',3)->orderBy('id','desc')->take(1)->get();

//     return $posts;

// });

// Route::get('findmore', function(){

//     // $posts = Post::findOrFail(2);
//     // return $posts;

//     $posts = Post::where('user_count','<',50)->firstOrFail();

// });


// Route::get('insert',function(){

//     $post = new Post;

//     $post->title = 'these are some more records';
//     $post->content = 'This is also some more text';

//     $post->save();



// });

// Route::get('findrecord',function(){

//     $post = Post::find(2);

//     $post->title = 'new another php record';
//     $post->content = 'new This is some more text';

//     $post->save();



// });

// Route::get('create', function(){

//     Post::create(['title'=>'ooie boogie','content'=>'im the oogie boogie man']);

// });

// Route::get('update', function(){

//     Post::where('id',2)->where('is_admin',0)->update(['title'=>'shooby dooby','content'=>'ooba booga']);

// });


// Route::get('delete', function(){

//     $post = Post::find(2);

//     $post->delete();

// });


// Route::get('delete2', function(){

// Post::destroy([4,5]);

// //or

// // Post::where('is_admin',0)->delete();

// });


// Route::get('softdelete',function(){

//     Post::find(2)->delete();

// });

// Route::get('readsoftdelete',function(){

// //    $posts = Post::find(6);
// //    return $posts;

// // $posts = Post::withTrashed()->where('id',6)->get();
// // return $posts;

// $posts = Post::onlyTrashed()->where('is_admin', 0)->get();
// return $posts;


// });


// Route::get('restore', function(){

//     Post::withTrashed()->where('is_admin',0)->restore();

// });


// Route::get('permdelete', function(){

//     Post::onlyTrashed()->where('is_admin',0)->forceDelete();

// });



//////////////////// Eloquent Relationships /////////////////////////////////

// ///// One to one /////

// Route::get('user/{id}/post', function($id){

//     return User::find($id)->post->title;

// });

// /// Inverse ///

// Route::get('post/{id}/user', function($id){

//     return Post::find($id)->user->name;

// });


////// One to Many ///////

// Route::get('posts', function(){

//     $user = User::find(1);

//     foreach ($user->posts as $post) {
//         echo $post->title."<br>";
//     }

// });


////// Many to Many ///////

// Route::get('user/{rId}/role', function($rId){

//     $user =  User::find($rId);

//     foreach ($user->roles as $role) {
//         return $role->name;
//     }

// });


////// Accessing intermediate/pivot table ///////

// Route::get('userpivot', function(){

//    $user = User::find(1);

//     foreach ($user->roles as $role){
//         return $role->pivot->created_at;
//     }

// });


// Route::get('getcountry',function(){

//    $country =  Country::find(3);

//    foreach($country->posts as $post){
//        return $post->title;
//    }

// });

////// Polymorphic relations ///////

// Route::get('polyphoto', function (){

//     $user = User::find(1);

//     foreach($user->photos as $photo){
//         return $photo->path;
//     }

// });

// Route::get('postphoto', function (){

//     $post = Post::find(1);

//     foreach($post->photos as $photo){
//         echo $photo->path."<br>";
//     }

// });

// inverse //

// Route::get('photo/{id}',function($id){

//     $photo =  Photo::findOrFail($id);
//     return $photo->imageable;

// });

////// Polymorphic many to many relations ///////

// Route::get('tags', function(){

//     $post = Post::find(1);

//     foreach ($post->tags as $tag){
//         echo $tag->name;
//     }

// });

// // inverse //

// Route::get('tagsrev', function(){

//     $tag = Tag::find(2);

//     foreach($tag->posts as $post){
//         return $post->title;
//     }

// });


/////////////////////////////////////////////////////////////////////
///
///                      CRUD                                    ///
///
////////////////////////////////////////////////////////////////////




Route::group(['middleware' => 'web'], function () {
    
    Route::resource('posts', 'PostsController');

});



Route::get('dates', function () {

    $date = new DateTime();

    echo $date->format('d-m-y')."<br>";

    echo Carbon::now()->addDays(10)->diffForHumans()."<br>";

    echo Carbon::now()->subDays(10)->diffForHumans()."<br>";
    
});


// Accessors

Route::get('getname', function () {
    
    $user = User::findOrFail(1);
    echo $user->name;

});

// Mutator

Route::get('setname', function () {
    
    $user = User::findOrFail(1);
    $user->name="goofy goober";
    $user->save();

});
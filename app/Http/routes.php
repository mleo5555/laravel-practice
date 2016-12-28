<?php

use App\Post;



Route::get('/', function () {
  return view('welcome');
});

Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');

Route::get('/post/{id}', 'PostsController@show_post');




Route::get('/insert', function() {

  DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is the Best']);

  return "You just inserted stuff into your DB!";

});

Route::get('/read', function() {

  $results = DB::select('select * from posts where id = ?', [1]);

  return $results;

});

Route::get('/update', function() {

  $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

  return $updated;

});

Route::get('/delete', function() {

  $deleted = DB::delete('delete from posts where id = ?', [1]);

  return $deleted;

});


Route::get('/find', function() {

  $post = Post::find(2);
  return $post;

});


Route::get('/basicinsert', function() {

  $post = new Post;

  $post->title = 'New title inserted';
  $post->content = 'New content inserted';

  $post->save();

});


Route::get('/create', function() {

  Post::create(['title' => 'the create method', 'content' => 'Some created content']);

});


Route::get('/update', function() {

  Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'content'=>'New PHP Content']);

});


Route::get('/delete', function() {

  $post = Post::find(2);
  $post->delete();

});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

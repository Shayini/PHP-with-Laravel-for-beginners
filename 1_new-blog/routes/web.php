<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;

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

// Route::get('/contact', function () {
//     return "hi contact";
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post no. ".$id." ".$name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//     $url = route('admin.home');
//     return "This url is ".$url;
// }));

// Route::get('/post', '\App\Http\Controllers\PostController@index');
// Route::get('/post/{id}', [PostController::class, 'index']);          // use App\Http\Controllers\PostController;

// Route::resource('posts', PostController::class);                     // use App\Http\Controllers\PostController;

// Route::get('/contact', [PostController::class, 'contact']);             // use App\Http\Controllers\PostController;

// Route::get('/post/{id}/{name}/{pass}', [PostController::class, 'show_post']);        // use App\Http\Controllers\PostController;





/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){
//     DB::insert('insert into posts (title, content) values (?, ?)', ['PHP', 'Laravel']);      // use Illuminate\Support\Facades\DB
// });


// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?', [1]);      // use Illuminate\Support\Facades\DB

//     foreach($results as $post){
//         return $post->title;
//     }
// });


// Route::get('/update', function(){
//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);     // use Illuminate\Support\Facades\DB

//     return $updated;
// });


// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id = ?', [1]);        // use Illuminate\Support\Facades\DB

//     return $deleted;
// });





/*
|--------------------------------------------------------------------------
| ELOQUENT / ORM(object relational mapping)
|--------------------------------------------------------------------------
*/

// Route::get('/read', function(){     // find all data
//     $posts = Post::all();          // use App\Models\Post;

//     foreach($posts as $post){
//         return $post->title;
//     }
// });


// Route::get('/find', function(){     // find data with particular id
//     $post = Post::find(4);      // Here '4' - id    // use App\Models\Post;

//     return $post->title;
// });


// Route::get('/findwhere', function(){     // find data with particular id with constraints
//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();      // Here 'take(1)' - take one from the collection    // use App\Models\Post;

//     return $posts;
// });


// Route::get('/findmore', function(){     // find data with particular id, if not found then return 'Not found' error page
//     // $posts = Post::findOrFail(3);      // Here '1' - id    // use App\Models\Post;
//     $posts = Post::where('is_admin', '<', 50)->firstOrFail();
//     return $posts;
// });


// Route::get('basicinsert', function(){       // insert data to database
//     $post = new Post;       // create object

//     // insert to each column
//     $post->title = 'new Eloquent title insert';
//     $post->content = 'new eloquent is really cool, look at this content';

//     $post->save();
// });


// Route::get('basicinsert2', function(){       // updating data in database
//     $post = Post::find(3);       // find the data with id=3

//     // update to each column
//     $post->title = 'new Eloquent title insert 3';
//     $post->content = 'new eloquent is really cool, look at this content 3';

//     $post->save();
// });


// Route::get('/update', function(){       // updating data in database
//     Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love Laravel']);
// });


// Route::get('/create', function(){       // to use this configure mass assignment in Post.php, else you will get Mass assignment exception
//     Post::create(['title'=>'the create method', 'content'=>'WOW I\'m learning a lot']);

// });


// Route::get('/delete', function(){    // delete data
//     $post = Post::find(3);

//     $post->delete();
// });


// Route::get('/delete2', function(){      // delete multiple when we know the key
//     Post::destroy([5,6]);
//     // Post::where('is_admin', 0)->delete();
// });


// // Soft delete(can be recovered)
// // first make migration with add_deleted_column_to_posts_table with --table=posts
// // then open that file and add '$table->softDeletes()' inside the schema of up()
// // then add "$table->dropColumn('deleted_at')" inside the schema of down()
// Route::get('/softdelete', function(){
//     Post::find(2)->delete();
// });


// // get the deleted(softdelete) data
// Route::get('/readsoftdelete', function(){
//     // $post = Post::find(1);      // can't use this
//     $post = Post::withTrashed()->where('is_admin', 0)->get();       // gives all the items that are trashed and not trashed
//     // $post = Post::onlyTrashed()->where('is_admin', 0)->get();    // gives only the items that are trashed

//     return $post;
// });


// // restore the deleted(softdelete) data
// Route::get('/restore', function(){
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });


// delete softdeleted data permanently
// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });







/*
|--------------------------------------------------------------------------
| ELOQUENT - Relationships
|--------------------------------------------------------------------------
*/

// //One to One relationship (get Post->post using User->user_id)
// Route::get('/user/{id}/post', function ($id) {
//     return User::find($id)->post->content;
// });

// //Inverse relationship - Inverse One to One relationship (get User->user using Post->(user_id))
// Route::get('/post/{id}/user', function ($id) {
//     return Post::find($id)->user->name;
// });


// //One to Many relationship (get Post->posts using User->user_id)
// Route::get('/posts/{id}', function ($id) {
//     $user = User::find($id);

//     foreach($user->posts as $post) {
//         echo $post->title . '<br>';
//     }
// });


// //Many to Many relationship (find the roles of a user)
// Route::get('/user/{id}/role', function($id){
//     // $user = User::find($id);

//     // foreach($user->roles as $role){
//     //     echo $role->name;
//     // }

//     //or
//     $role = User::find($id)->roles()->orderBy('id', 'desc')->get();
//     return $role;

// });


// // Accessing the intermediate table / pivot
// Route::get('user/pivot', function(){
//     $user = User::find(1);

//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }
// });


// //Has Many Through relationship - Link 3 tables - (get the post of a user from this country)
// Route::get('/user/country', function(){
//     $country = Country::find(4);

//     foreach($country->posts as $post){
//         return $post->title;
//     }
// });



// // Polymorphic Relations (here photos relations acts as child to both user and post relations)
// // One to Many
// Route::get('/user/{id}/photos', function($id){  //comment the user_id in post table
//     $user = User::find($id);

//     foreach($user->photos as $photo) {
//         echo $photo->path . "<br>";
//     }
// });
// Route::get('/post/{id}/photos', function($id){  //comment the user_id in post table
//     $post = Post::find($id);

//     foreach($post->photos as $photo) {
//         echo $photo->path . "<br>";
//     }
// });


// // Inverse Relationship Inverse One to Many - get the owner of the image(from post or user)
// Route::get('photo/{id}/post', function($id){
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });


// Polymorphic Relations
// Many to Many
// putting tags on Video and Post
Route::get('/post/tag', function(){
    $post = Post::find(1);

    foreach($post->tags as $tag) {
        echo $tag->name;
    }
});


// Polymorphic Relations
// Many to Many
// retrieving owner of a tag (post or video)
Route::get('/tag/post', function(){
    $tag = Tag::find(2);

    foreach($tag->posts as $post) {
        echo $post->title;
    }
});


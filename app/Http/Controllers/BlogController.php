<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;

class BlogController extends Controller
{
    //
    public function index()
    {
        /*$categories = Category::with( ['posts' => function($query) {
          $query->published();
        }])->orderBy('title', 'asc')->get();
*/

        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate(3);

         return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
      //$post = Post::published()->findOrFail($id);
      /*$categories = Category::with( ['posts' => function($query) {
        $query->published();
      }])->orderBy('title', 'asc')->get();
*/

      /*$viewcount = $post->view_count + 1;
      $post->update([
        'view_count' => $viewcount
      ]);*/

      $post->increment('view_count', 1);


      return view('blog.show', compact('post'));
    }

    public function category(Category $category)
    {
      /*$categories = Category::with( ['posts' => function($query) {
        $query->published();
      }])->orderBy('title', 'asc')->get();
*/

      /*$posts = Post::with('author')
                  ->latestFirst()
                  ->where('category_id', $id)
                  ->published()
                  ->simplePaginate(3);*/

      $posts = $category->posts()
                ->with('author')
                ->latestFirst()
                ->published()
                ->simplePaginate(2);

      $categoryName = $category->title;

       return view('blog.index', compact('posts', 'categoryName'));


    }

    public function author(User $author)
    {
      $posts = $author->posts()
                ->with('category')
                ->latestFirst()
                ->published()
                ->simplePaginate(2);

      $authorName = $author->name;

       return view('blog.index', compact('posts', 'authorName'));

    }
}



/*
\DB::enableQueryLog();

*/

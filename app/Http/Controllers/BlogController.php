<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
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

         return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
      //$post = Post::published()->findOrFail($id);
      /*$categories = Category::with( ['posts' => function($query) {
        $query->published();
      }])->orderBy('title', 'asc')->get();
*/


      return view('blog.show', compact('post', 'categories'));
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

       return view('blog.index', compact('posts', 'categories', 'categoryName'));


    }
}



/*
\DB::enableQueryLog();

*/

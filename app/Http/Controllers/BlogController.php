<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $perPage = 20;

    /** Home */
    public function home()
    {
        return view('blog.home', ['posts' => Post::publish()->latest()->paginate($this->perPage)]);
    }

    /** Categories */
    public function showCategories()
    {
        return view('blog.categories', ['categories' => Category::onlyParent()->paginate($this->perPage)]);
    }

    /** Tags */
    public function showTags()
    {
        return view('blog.tags', ['tags' => Tag::paginate($this->perPage)]);
    }

    /** Search post */
    public function searchPosts(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('blog.home');
        }

        return view('blog.search-post', [
            'posts' => Post::publish()->search($request->keyword)->paginate($this->perPage)->appends(['keyword' => $request->keyword])
        ]);
    }

    /** show post by category */
    public function showPostsByCategory($slug)
    {
        $posts = Post::publish()->whereHas('categories', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perPage);

        $category = Category::where('slug', $slug)->first();
        $categoryRoot = $category->root();

        return view('blog.posts-category', [
            'posts' => $posts,
            'category' => $category,
            'categoryRoot' => $categoryRoot
        ]);
    }

    /** show post by tag */
    public function showPostsByTag($slug)
    {
        $posts = Post::publish()->whereHas('tags', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perPage);

        $tag = Tag::where('slug', $slug)->first();
        $tags = Tag::search($tag->title)->get();

        return view('blog.posts-tag', [
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags,
        ]);
    }

    /** show post detail */
    public function showPostDetail($slug)
    {
        $post = Post::publish()->with(['categories', 'tags'])->where('slug', $slug)->first();
        if (!$post) {
            return redirect()->route('blog.home');
        }

        return view('blog.post-detail', [
            'post' => $post,
            'latestPosts' => Post::publish()->latest()->limit(5)->get()
        ]);
    }
}

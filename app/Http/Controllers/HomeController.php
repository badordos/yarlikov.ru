<?php

namespace App\Http\Controllers;

use App\Project;
use App\Album;
use App\Article;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $favorites_projects = Project::where('is_favorite', 1)->get();

        View::share('favorites_projects', $favorites_projects);
    }

    public function index()
    {
        $albums = Album::orderByDesc('date')->take(6)->get();
        $articles = Article::orderByDesc('created_at')->take(5)->get();
        $projects = Project::orderByDesc('created_at')->take(3)->get();

        return view('index', compact('projects', 'albums', 'articles', 'projects'));
    }

    public function projects()
    {
        $projects = Project::orderByDesc('created_at')->paginate(8);
        return view('projects', compact('projects'));
    }

    public function albums()
    {
        $albums = Album::orderByDesc('date')->take(6)->paginate(8);
        return view('albums', compact('albums'));
    }

    public function album(Album $album)
    {
        $media = $album->getMedia('images');
        return view('album', compact('album', 'media'));
    }

    public function blog()
    {
        $articles = Article::orderByDesc('created_at')->paginate(10);
        return view('blog', compact('articles'));
    }

    public function article(Article $article)
    {
        return view('article', compact('article'));
    }


    public function contact()
    {
        return view('contact');
    }

}

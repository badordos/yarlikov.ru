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
        $title = 'Владислав Ярлыков, web-разработчик и фотограф Екатеринбург.';

        return view('index', compact('projects', 'albums', 'articles', 'projects', 'title'));
    }

    public function projects()
    {
        $projects = Project::orderByDesc('created_at')->paginate(8);
        $title = 'Проекты';

        return view('projects', compact('projects', 'title'));
    }

    public function albums()
    {
        $albums = Album::orderByDesc('date')->take(6)->paginate(8);
        $title = 'Фотосессии';
        return view('albums', compact('albums','title'));
    }

    public function album(Album $album)
    {
        $media = $album->getMedia('images');
        $title = $album->title;
        return view('album', compact('album', 'media', 'title'));
    }

    public function blog()
    {
        $articles = Article::orderByDesc('created_at')->paginate(10);
        $title = 'Блог о программировании';
        return view('blog', compact('articles', 'title'));
    }

    public function article(Article $article)
    {
        $title = $article->title;
        return view('article', compact('article', 'title'));
    }


    public function contact()
    {
        $title = 'Контакты';
        return view('contact', compact('title'));
    }

}

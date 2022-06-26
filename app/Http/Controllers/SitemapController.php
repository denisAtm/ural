<?php
namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Tag;
use App\Models\News;
use App\Models\Articles;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
//        $products = Products::products()->orderBy('updated_at', 'desc')->first();
//        $categories = Categories::approvedPosts()->orderBy('updated_at', 'desc')->first();
//        $tag = Tag::approvedPosts()->orderBy('updated_at', 'desc')->first();
//        $news = News::approvedPosts()->orderBy('updated_at', 'desc')->first();
//        $articles = Articles::approvedPosts()->orderBy('updated_at', 'desc')->first();

        $products = Products::get()->first();
        $categories = Categories::get()->first();
        $tag = Tag::get()->first();
        $news = News::get()->first();
        $articles = Articles::get()->first();
        return response()->view('sitemap.index', [
            'products' => $products,
            'categories' => $categories,
            'tag' => $tag,
            'news' => $news,
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }

    public function products()
    {
        $products = Products::get();
        return response()->view('sitemap.products', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Categories::get();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function tags()
    {
        $tags = Tag::get();
        return response()->view('sitemap.tags', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }
    public function news()
    {
        $news = News::get();
        return response()->view('sitemap.news', [
            'news' => $news,
        ])->header('Content-Type', 'text/xml');
    }
    public function articles()
    {
        $articles = Articles::get();
        return response()->view('sitemap.articles', [
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }
}

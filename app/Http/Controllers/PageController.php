<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\GearRatio;
use App\Models\LocationOfAxes;
use App\Models\MetaPage;
use App\Models\News;
use App\Models\NumberOfTransferStages;
use App\Models\Products;
use App\Models\Series;
use App\Models\TypeOfTransmission;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $news = News::where('status_id',1)->orderBy('created_at','desc')->limit(4)->get();
        $meta=MetaPage::where('meta_url','http://ural')->get();
        return view('index',['news'=>$news],['meta'=>$meta]);
    }
    public function contacts(){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        return view('contacts',['meta'=>$meta]);
    }

    public function newsSingle($slug){
        $news = News::where('slug',$slug)->first();
        $meta=MetaPage::where('meta_url','http://ural')->get();
        if($news->status->id==1){
            $prev = News::where('id','<',$news->id)->latest('id')->first();
            $next = News::where('id','<',$news->id)->oldest('id')->first();
            return view('news-single',['news'=>$news,'prev'=>$prev,'next'=>$next],['meta'=>$meta]);
        }else{
            abort(404);
        }
    }
    public function aboutPage(){
        $about = AboutPage::get();
        $meta=MetaPage::where('meta_url','http://ural')->get();
        return view('about',['about'=>$about],['meta'=>$meta]);
    }


    //Страница Новости
    public function news(){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $news = News::where('status_id',1)->orderBy('created_at','desc')->paginate(12);
        return view('news',['news'=>$news],['meta'=>$meta]);
    }

    public function catalog($slug){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $attr1 = TypeOfTransmission::get();
        $attr2 = NumberOfTransferStages::get();
        $attr3 = GearRatio::get();
        $attr4 = LocationOfAxes::get();
        $category = Categories::where('slug',$slug)->first();
        $series = $category->series;
        return view('catalog',compact(['attr1','attr2','attr3','attr4','slug','series','meta']));
    }

    public function single($catSlug,$slug){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $product = Products::where('slug',$slug)->first();
        return view('single',compact(['product','meta']));
    }

    public function articles(){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $articles = Articles::orderBy('publish_at','desc')->get();
        return view('articles',['articles'=>$articles],['meta'=>$meta]);
    }
    public function articlesSingle($slug){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $article = Articles::where('slug',$slug)->first();
        if($article->status->id==1){
            $prev = News::where('id','<',$article->id)->latest('id')->first();
            $next = News::where('id','<',$article->id)->oldest('id')->first();
            return view('articles-single',['article'=>$article,'prev'=>$prev,'next'=>$next],['meta'=>$meta]);
        }else{
            abort(404);
        }
    }
}

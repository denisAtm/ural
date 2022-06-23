<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Categories;
use App\Models\GearRatio;
use App\Models\LocationOfAxes;
use App\Models\News;
use App\Models\NumberOfTransferStages;
use App\Models\TypeOfTransmission;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $news = News::where('status_id',1)->orderBy('created_at','desc')->limit(4)->get();

        return view('index',['news'=>$news]);
    }
    public function newsCard($slug){
        $news = News::where('slug',$slug)->first();
        if($news->status->id==1){
            $prev = News::where('id','<',$news->id)->latest('id')->first();
            $next = News::where('id','<',$news->id)->oldest('id')->first();
            return view('news-single',['news'=>$news,'prev'=>$prev,'next'=>$next]);
        }else{
            abort(404);
        }
    }
    public function aboutPage(){
        $about = AboutPage::get();
        return view('about',['about'=>$about]);
    }


    //Страница Новости
    public function news(){
        $news = News::where('status_id',1)->orderBy('created_at','desc')->paginate(12);
        return view('news',['news'=>$news]);
    }

    public function catalog($slug){
        $attr1 = TypeOfTransmission::get();
        $attr2 = NumberOfTransferStages::get();
        $attr3 = GearRatio::get();
        $attr4 = LocationOfAxes::get();
        $products = Categories::where('slug',$slug)->first()->products()->paginate(12);
        return view('catalog',compact(['attr1','attr2','attr3','attr4','slug','products']));
    }
}

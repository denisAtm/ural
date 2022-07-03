<?php

namespace App\Http\Controllers;

use App\Filters\ArticleFilter;
use App\Filters\CatalogFilter;
use App\Models\AboutPage;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\CategoriesOfArticles;
use App\Models\GearMotor;
use App\Models\GearRatio;
use App\Models\LocationOfAxes;
use App\Models\MetaPage;
use App\Models\News;
use App\Models\NumberOfTransferStages;
use App\Models\Products;
use App\Models\QuestionAnswer;
use App\Models\Reducer;
use App\Models\Series;
use App\Models\TypeOfTransmission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    public function index(){
        $news = News::where('status_id',1)->orderBy('created_at','desc')->limit(4)->get();
        $meta=MetaPage::where('meta_url','http://ural')->get();

        return view('index',['news'=>$news],['meta'=>$meta]);
    }
    public function contacts(){
        $meta=MetaPage::where('meta_url','http://ural/contacts')->get();
        return view('contacts',['meta'=>$meta]);
    }

    public function newsSingle($slug){
        $news = News::where('slug',$slug)->first();

        $search= 'http://ural/news/';
        $meta=MetaPage::where('meta_url','LIKE',"%{$search}%")->get();
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
        $meta=MetaPage::where('meta_url','http://ural/about')->get();
        return view('about',['about'=>$about],['meta'=>$meta]);
    }


    //Страница Новости
    public function news(){
        $meta=MetaPage::where('meta_url','http://ural/news')->get();
        $news = News::where('status_id',1)->orderBy('created_at','desc')->paginate(12);
        return view('news',['news'=>$news],['meta'=>$meta]);
    }

    public function catalog($slug, CatalogFilter $filter){
        $search= 'http://ural/catalog/';
        $meta=MetaPage::where('meta_url','LIKE',"%{$search}%")->get();
        $attr1 = TypeOfTransmission::get();
        $attr2 = NumberOfTransferStages::get();
        $attr3 = GearRatio::get();
        $attr4 = LocationOfAxes::get();
        $category = Categories::where('slug',$slug)->first();
        $products = Reducer::filter($filter)->where('category_id',$category->id)->paginate(6);
        if($products->isEmpty()){
            $products = GearMotor::filter($filter)->where('category_id',$category->id)->paginate(6);
        }
        return view('catalog',compact(['attr1','attr2','attr3','attr4','slug','products','meta','category']));
    }

    public function single($catSlug,$slug){
        $meta=MetaPage::where('meta_url','http://ural')->get();
        $product = Reducer::where('slug',$slug)->first();
        if(!empty($product)){
            $quest = $product->questions->paginate(4);
            return view('single',compact(['product','meta','quest']));
        }else{
            $product = GearMotor::where('slug',$slug)->first();
            $quest = $product->questions->paginate(4);
            return view('single-motor',compact(['product','meta','quest']));
        }
    }

    public function articles(ArticleFilter $filter){
        $meta=MetaPage::where('meta_url','http://ural/articles')->get();
        $categoriesOfArticles = CategoriesOfArticles::tree();
        $articles = Articles::filter($filter)->orderBy('publish_at','desc')->paginate(12);
        return view('articles',['articles'=>$articles,'meta'=>$meta,'categoriesOfArticles'=>$categoriesOfArticles]);
    }

    public function articlesSingle($slug){
        $search= 'http://ural/articles/';
        $meta=MetaPage::where('meta_url','LIKE',"%{$search}%")->get();
        $article = Articles::where('slug',$slug)->first();
        if($article->status->id==1){
            $prev = Articles::where('id','<',$article->id)->latest('id')->first();
            $next = Articles::where('id','<',$article->id)->oldest('id')->first();
            return view('articles-single',['article'=>$article,'prev'=>$prev,'next'=>$next,'meta'=>$meta]);
        }else{
            abort(404);
        }
    }
    public function sendForm(Request $request){
        $questions = new QuestionAnswer();
        $questions->name = $request->name;
        $questions->email = $request->email;
        $questions->question = $request->textarea;
        $questions->answer = ' ';
        $questions->status = 0;
        $questions->product_id = $request->id;
        $validate = Validator::make(Input::all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($validate){
            $questions->save();
        }

        return back()->with('Всё');

    }
    public function search(Request $request){
//        $products = Reducer::filter($filter)->limit(5)->get();
        if($request->ajax()){
            $reducers = Reducer::where('name','LIKE','%'.$request->str.'%')->limit(5)->get();
            $motors = GearMotor::where('name','LIKE','%'.$request->str.'%')->limit(5)->get();
            if($reducers->isNotEmpty()){
                $products[]=[
                    'name'=>'Редукторы',
                    'items'=> $reducers
                ];
            }
            if($motors->isNotEmpty()){
                $products[] =[
                    'name'=>'Мотор-редукторы',
                    'items'=> $motors
                ];
            }
            foreach($products as $product){
                foreach ($product['items'] as $item){
                    $item->href = '/catalog/'.$item->category->slug.'/'.$item->slug;
                }
            }


            return response()->json($products);
        }

    }
}

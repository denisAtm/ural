<?php

namespace Backpack\CRUD\app\Http\Controllers;

use App\Models\Articles;
use App\Models\GearMotor;
use App\Models\News;
use App\Models\Order;
use App\Models\QuestionAnswer;
use App\Models\Reducer;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $news = News::latest()->take(5)->get();
        $articles = Articles::latest()->take(5)->get();
        $reducer = Reducer::latest()->take(5)->get();
        $gearMotor = GearMotor::latest()->take(5)->get();
        $questionAnswer = QuestionAnswer::latest()->take(5)->get();
        $order = Order::latest()->take(5)->get();
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin')     => backpack_url('dashboard'),
            trans('backpack::base.dashboard') => false,
        ];

        return view(backpack_view('dashboard'),compact(['news','articles','reducer','gearMotor','questionAnswer','order']));
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }
}

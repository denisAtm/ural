<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use App\Models\Shaft;
use Illuminate\Http\Request;

class frontShaftController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');
        $triggeredBy = $request->input('triggeredBy');
        $form = backpack_form_input();
        if (! $form['series_id']) {
            return [];
        }
        if ($form['series_id']) {
            $options = Series::find($form['series_id'])->frontShafts();
        }
        if ($search_term) {
            $results = $options->where('name', 'LIKE', '%'.$search_term.'%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }
        return $results;
    }
    public function show($id)
    {
        return Shaft::find($id);
    }
}

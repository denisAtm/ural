<?php

namespace App\Filters;

use App\Models\Tag;

class ArticleFilter extends QueryFilter{
    public function category_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }
    public function tag($slug = null){
        return $this->builder->when($slug, function($query) use($slug){
            $query->whereHas('tags', function ($q) use($slug){
                $q->where('slug',$slug);
            });
        });
    }

//    public function search_field($search_string = ''){
//        return $this->builder
//            ->where('title', 'LIKE', '%'.$search_string.'%')
//            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
//    }
}



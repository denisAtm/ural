<?php

namespace App\Filters;

class CatalogFilter extends QueryFilter
{
    public function typeOfTransmission($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }
    public function numberOfTransferStages($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('number_of_transfer_stages_id', $id);
        });
    }
    public function locationOfAxes($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('location_of_axes_id', $id);
        });
    }
    public function gearRatio($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->whereHas('gearRatios', function($q) use($id){
                $q->where('gear_ratio_id',$id);
            });
        });
    }
    public function myRange($value = null){

    }
    public function search_field($search_string = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$search_string.'%');
//            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}

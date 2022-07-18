<?php

namespace App\Filters;

use App\Models\GearRatio;

class CatalogFilter extends QueryFilter
{
    public function typeOfTransmission($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }
    public function locationOfAxes($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('location_of_axes_id', $id);
        });
    }
    public function gearRatio($value = null){
        return $this->builder->when($value, function($query) use($value){
            $value = explode(';',$value);
            $query->whereHas('series.gearRatios', function($q) use($value){
                $q->whereBetween('name',[(int)$value[0],(int)$value[1]]);
            });
        });
    }
    public function torque($value = null){
        return $this->builder->when($value, function($query) use($value){
            $value = explode(';',$value);
            $query->whereBetween('torque', [(int)$value[0],(int)$value[1]]);
        });

    }
    public function search_field($search_string = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$search_string.'%');
//            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}

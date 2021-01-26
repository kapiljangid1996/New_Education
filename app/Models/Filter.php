<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\College\College;

class Filter extends Model
{
	use HasFactory;

	public static function filterCollege($request){
		if (!empty($request->all())) {
			$request->session()->put('form_data', $request->all());
		}

		if($request->session()->has('form_data')){
			$result=  $request->session()->get('form_data');
		} 

		else{
			$result = array();
		}

		$data=  array();

		parse_str($result['form_data'], $form_data);

		if (!empty($form_data['college_name']) && !empty($form_data['city']) && !empty($form_data['ownership']) && !empty($form_data['rating'])) {
			$id = $form_data['college_name'];
			$query = College::with('state_name')->with('city_name')->where('id',$id)->orderBy('id', 'desc')->paginate(10);
		}

		elseif (!empty($form_data['college_name']) && !empty($form_data['city'])) {
            $id = $form_data['college_name']; 
            $query = College::with('state_name')->with('city_name')->where('id',$id)->orderBy('id', 'desc')->paginate(10);   
        }

		elseif (!empty($form_data['college_name']) && !empty($form_data['ownership'])) {
            $id = $form_data['college_name']; 
            $query = College::with('state_name')->with('city_name')->where('id',$id)->orderBy('id', 'desc')->paginate(10);   
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['rating'])) {
            $id = $form_data['college_name']; 
            $query = College::with('state_name')->with('city_name')->where('id',$id)->orderBy('id', 'desc')->paginate(10);   
        }

        elseif (!empty($form_data['city']) && !empty($form_data['ownership'])) {
            $college_id1 = College::whereIn('ownership',$form_data['ownership'])->pluck('id'); 
            $college_id2 = College::whereIn('city',$form_data['city'])->pluck('id'); 
            $id = $college_id1->INTERSECT($college_id2);   
            $query = College::with('state_name')->with('city_name')->whereIn('id',$id)->orderBy('id', 'desc')->paginate(10);
        }

        elseif (!empty($form_data['ownership']) && !empty($form_data['rating'])) {
            $college_id1 = College::whereIn('ownership',$form_data['ownership'])->pluck('id'); 
            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                      
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $college_id2 = College::whereIn('id',$data)->pluck('id'); 
            $id = $college_id1->union($college_id2);   
            $query = College::with('state_name')->with('city_name')->whereIn('id',$id)->orderBy('id', 'desc')->paginate(10);   
        }

		elseif (!empty($form_data['ownership'])){
			$query = College::with('state_name')->with('city_name')->whereIn('ownership',$form_data['ownership'])->orderBy('id', 'desc')->paginate(10);
		}

		elseif (!empty($form_data['rating'])){
			foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                 
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $query = College::with('state_name')->with('city_name')->whereIn('id',$data)->orderBy('id', 'desc')->paginate(10);
		}

		elseif (!empty($form_data['college_name'])) {
            $query = College::with('state_name')->with('city_name')->where('id',$form_data['college_name'])->paginate(10);
        }

        elseif (!empty($form_data['city'])){
			$query = College::with('state_name')->with('city_name')->whereIn('city',$form_data['city'])->orderBy('id', 'desc')->paginate(40);
		}

        else{
            $query = College::with('state_name')->with('city_name')->where('status','=',1)->orderBy('id', 'desc')->paginate(10); 
        }

		return $query;
	}
}
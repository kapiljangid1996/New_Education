<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\College\College;
use App\Models\College\CourseFee;
use App\Models\Course\Course;
use Session;

class Filter extends Model
{
	use HasFactory;

	public static function filterCollege($request, $slug){
        $search_data = array();
        parse_str($slug, $search_data);
        /*echo "<pre>";
        print_r($search_data);
        die();*/

        if (!empty($search_data)) {
            if (isset($search_data['page'])) {
                if($request->session()->has('form_data')){
                   $request->session()->put('form_data.page',$search_data['page']);
                } 
            }else{
                $request->session()->put('form_data', $search_data);
            }           
        }

        if($request->session()->has('form_data')){
            $form_data=  $request->session()->get('form_data');
            $_GET =  $request->session()->get('form_data');
        } 

        else{
            $form_data = array();
        }

        $data=  array();

        $query = College::with('state_name')->with('city_name')->where('status',1)->orderBy('id', 'desc');

        if (!empty($form_data['college_name']) && !empty($form_data['city']) && !empty($form_data['ownership']) && !empty($form_data['rating'])) {
            $query = College::where('status',1)->where('id',$form_data['college_name']);
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['city'])) {
            $query = College::where('status',1)->where('id',$form_data['college_name']);   
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['ownership'])) {
            $query = College::where('status',1)->where('id',$form_data['college_name']);   
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['rating'])) {
            $query = College::where('status',1)->where('id',$form_data['college_name']);   
        }

        elseif (!empty($form_data['city']) && !empty($form_data['ownership'])) {
            $query = College::where('status',1)->whereIn('city',$form_data['city'])->whereIn('ownership',$form_data['ownership']);
        }

        elseif (!empty($form_data['ownership']) && !empty($form_data['rating'])) { 
            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                      
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }  
            $query = College::where('status',1)->whereIn('ownership',$form_data['ownership'])->whereIn('id',$data);   
        }

        elseif (!empty($form_data['college_name'])) {
            $query = College::where('status',1)->where('id',$form_data['college_name']);
        }

        elseif (!empty($form_data['city'])){
            $query = College::where('status',1)->whereIn('city',$form_data['city']);
        }

        elseif (!empty($form_data['ownership'])){
            $query = College::where('status',1)->whereIn('ownership',$form_data['ownership']);
        }

        elseif (!empty($form_data['rating'])){
            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                 
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $query = College::where('status',1)->whereIn('id',$data);
        }

        elseif (!empty($form_data['price'])){
            $arr = explode(" - ", $form_data['price']);

            $query = College::where('status',1)->whereIn('id',$data);
        }

        else{
            Session::forget('form_data'); 
            $query; 
        }

		return $query->paginate(10);
	}

    public static function filterCourse($request){

        if (!empty($request->all())) {
            if (isset($request->page)) {
                if($request->session()->has('course_form_data')){
                   $request->session()->put('course_form_data.page',$request->page);
                } 
            }else{
                 $request->session()->put('course_form_data', $request->all());
            }           
        }

        if($request->session()->has('course_form_data')){
            $course_form_data=  $request->session()->get('course_form_data');
            $_GET =  $request->session()->get('course_form_data');
        } 

        else{
            $course_form_data = array();
        }

        if (!empty($course_form_data['category_id']) && !empty($course_form_data['course_name'])) {
            $query = Course::where('id',$course_form_data['course_name'])->paginate(10);   
        }

        elseif (!empty($course_form_data['course_name'])) {
            $query = Course::where('id',$course_form_data['course_name'])->paginate(10);
        }

        elseif (!empty($course_form_data['category_id'])) {
            $query = Course::whereIn('category_id',$course_form_data['category_id'])->paginate(10);
        }

        else{
            Session::forget('course_form_data'); 
            $query = Course::where('status','=',1)->paginate(10); 
        }

        return $query;
    }
}
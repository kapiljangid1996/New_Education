<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Exam\Exam;
use App\Models\College\College;
use App\Models\City;
use App\Models\Rating;
use App\Models\Filter;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('status','=',1)->get(); // Get all Course List on fornt page
        return view('front.index')->with('courses',$courses);
    }

    public function courseView()
    {
        $courses = Course::where('status','=',1)->paginate(10); // Get all Course List on Courses page
        return view('front.courseView')->with('courses',$courses);
    }

    public function courseDetail($slug)
    {
        $courses = Course::where('slug','=',$slug)->get(); // Get all Course List on Course Detail
        return view('front.courseDetail')->with('courses',$courses);
    }

    public function collegeView(Request $request)
    {        
        //echo "<pre>";print_r($request->page);die;
        if (!empty($request->all())) {
            if (isset($request->page)) {
                if($request->session()->has('form_data')){
                   $request->session()->put('form_data.page',$request->page);
                } 
            }else{
                 $request->session()->put('form_data', $request->all());
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

        //parse_str($result['form_data'], $form_data);

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
            $query = College::with('state_name')->with('city_name')->whereIn('city',$form_data['city'])->orderBy('id', 'desc')->paginate(10);
        }

        else{
            $query = College::with('state_name')->with('city_name')->where('status','=',1)->orderBy('id', 'desc')->paginate(10); 
        }

       // echo "<pre>";print_r($query);die;

        $cities = College::with('city_name')->where('status','=',1)->select('city', DB::raw('count(*) as total'))->groupBy('city')->orderBy('total', 'desc')->get();
        return view('front.collegeView')->with('colleges',$query)->with('cities',$cities);
    }

    public function collegeDetail($slug)
    {
        $colleges = College::with('admission')->with('placement')->with('infrastructure')->with('course_fee')->with('cut_off')->with('reviews.user')->with('state_name')->with('city_name')->where('slug','=',$slug)->get();
        $courses = Course::where('status','=',1)->get();
        $exams = Exam::where('status','=',1)->get();
        return view('front.collegeDetail')->with('colleges',$colleges)->with('courses',$courses)->with('exams',$exams);
    }    
}

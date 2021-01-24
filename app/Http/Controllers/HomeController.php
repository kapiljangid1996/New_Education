<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Exam\Exam;
use App\Models\College\College;
use App\Models\City;
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
        $form_data =array();
        if($request->session()->has('form_data'))
        {
           $result=  $request->session()->get('form_data');
           parse_str($result['form_data'], $form_data);
        }else{
            $result = array();
        }
        $data=  array();
        

        if (!empty($form_data['ownership']) && !empty($form_data['rating']) && !empty($form_data['college_name'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::with('state_name')->with('city_name')->where('id',$id)->paginate(10);  /* Get College Name */
        }

        elseif (!empty($form_data['ownership']) && !empty($form_data['college_name'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::with('state_name')->with('city_name')->where('id',$id)->paginate(10);   /* Get College Name */
        }

        elseif (!empty($form_data['ownership']) && !empty($form_data['rating'])) {

            $college_id1 = College::whereIn('ownership',$form_data['ownership'])->pluck('id'); /* Get Colleges Id Accroding to the Ownership instances*/

            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');     /* Get all the colleges id according to the ratings n-1 to n*/                 
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $college_id2 = College::whereIn('id',$data)->pluck('id'); /* Get Colleges Id Accroding to the Ratings instances*/

            $id = $college_id1->union($college_id2);    /* Merge colleges ids from ownership and ratings instances */

            $colleges = College::with('state_name')->with('city_name')->whereIn('id',$id)->paginate(10);   /* Get all the colleges Merge colleges ids */
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['rating'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::with('state_name')->with('city_name')->where('id',$id)->paginate(10);   /* Get all the colleges Merge colleges ids */
        }

        elseif (!empty($form_data['ownership'])) {
            $colleges = College::with('state_name')->with('city_name')->whereIn('ownership',$form_data['ownership'])->orderBy('id', 'desc')->paginate(10); 
        }

        elseif (!empty($form_data['rating'])) {
            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                 
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $colleges = College::with('state_name')->with('city_name')->whereIn('id',$data)->paginate(10);
        }

        elseif (!empty($form_data['college_name'])) {
            $colleges = College::with('state_name')->with('city_name')->where('id',$form_data['college_name'])->paginate(10);;
        }

        else{
            $colleges = College::with('state_name')->with('city_name')->where('status','=',1)->orderBy('id', 'desc')->paginate(10); 
        }
        $cities = College::with('city_name')->where('status','=',1)->select('city', DB::raw('count(*) as total'))->groupBy('city')->orderBy('total', 'desc')->get();
        return view('front.collegeView')->with('colleges',$colleges)->with('cities',$cities);
    }

    public function collegeDetail($slug)
    {
        $colleges = College::with('admission')->with('placement')->with('infrastructure')->with('course_fee')->with('cut_off')->with('reviews.user')->with('state_name')->with('city_name')->where('slug','=',$slug)->get();
        $courses = Course::where('status','=',1)->get();
        $exams = Exam::where('status','=',1)->get();
        return view('front.collegeDetail')->with('colleges',$colleges)->with('courses',$courses)->with('exams',$exams);
    }    
}

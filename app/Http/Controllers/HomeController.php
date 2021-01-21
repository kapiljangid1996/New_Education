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
        $courses = Course::where('status','=',1)->get();
        return view('front.index')->with('courses',$courses);
    }

    public function courseView()
    {
        $courses = Course::where('status','=',1)->paginate(10);
        return view('front.courseView')->with('courses',$courses);
    }

    public function courseDetail($slug)
    {
        $courses = Course::where('slug','=',$slug)->get();
        return view('front.courseDetail')->with('courses',$courses);
    }

    public function collegeView()
    {
        $colleges = College::with('state_name')->with('city_name')->where('status','=',1)->orderBy('created_at', 'desc')->paginate(10);
        $cities = College::with('city_name')->where('status','=',1)->select('city', DB::raw('count(*) as total'))->groupBy('city')->get();
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

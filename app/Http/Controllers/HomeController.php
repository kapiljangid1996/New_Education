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
        $colleges= Filter::filterCollege($request);
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

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
use App\Models\Slider;
use App\Models\WebsiteVisitor;
use Newsletter;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status',1)->get();
        $colleges = College::with('state_name')->with('city_name')->where('featured_colleges','=', 1)->take(5)->get(); 

        $get_ip = WebsiteVisitor::where('ip_address','=',$_SERVER['REMOTE_ADDR'])->count();

        if ($get_ip < 1) {
            $websiteVisitor = new WebsiteVisitor;

            $websiteVisitor->ip_address = $_SERVER['REMOTE_ADDR'];

            $websiteVisitor->save();
        }
        return view('front.index')->with('sliders',$sliders)->with('colleges',$colleges);
    }

    public function courseView(Request $request)
    {
        $courses= Filter::filterCourse($request); // Get all Course List on Courses page
        return view('front.courseView')->with('courses',$courses);
    }

    public function courseDetail($slug)
    {
        $courses = Course::where('slug','=',$slug)->get(); // Get all Course List on Course Detail
        return view('front.courseDetail')->with('courses',$courses);
    }

    public function collegeView(Request $request, $slug)
    {           
        $colleges= Filter::filterCollege($request, $slug);
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

    public function newsLetter(Request $request)
    {
        Newsletter::unsubscribe($request->email);
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect()->back()->with('success', 'Thanks For Subscribe');
        }
        return redirect()->back()->with('toast_error', 'Sorry! You have already subscribed ');
        
    }    
}

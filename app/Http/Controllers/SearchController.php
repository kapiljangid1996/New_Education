<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College\College;
use App\Models\Course\Course;
use App\Models\Rating;
use App\Models\City;

class SearchController extends Controller
{
    public function getCity(Request $request)
    {
        $result = $request->get('state_id');
        $get_city = $request->get('city_id');

        $query = City::where('state_id',$result)->get();

        echo '<option value="">Select city</option>';
        
        foreach ($query as $key => $value) {
            if ($get_city == $value->id) {
               echo '<option value="'.$value->id.'" selected="selected">'.$value->name.'</option>';
            }
            else{
                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
        }  
        die();      
    }

    public function search(Request $request)
    {
    	if(!empty($request->get('query'))){
    		$query = $request->get('query');
    		$result = $request->get('type');
    		if ($result == 'college') {
    			$data = College::orderBy('name','asc')->where('name', 'like', '%'.$query.'%')->orWhere('city', 'like', '%'.$query.'%')->orWhere('state', 'like', '%'.$query.'%')->get();
	    		$output = '<ul class="dropdown-menu edutab" style="display:block;">';
	    		foreach($data as $row){    			
	    			$output .= '<li><a class="search-list" href="/college/'.$row->slug.'">'.$row->name.'</a></li>';
	    		}    		
    			$output .= '</ul>';
    		}
            elseif ($result == 'course') {
    			$data = Course::orderBy('name','asc')->where('name', 'like', '%'.$query.'%')->get();    		
	    		$output = '<ul class="dropdown-menu edutab" style="display:block;">';
	    		foreach($data as $row){    			
	    			$output .= '<li><a class="search-list" href="/course/'.$row->slug.'">'.$row->name.'</a></li>';
	    		}    		
    			$output .= '</ul>';
    		}
    		echo $output;
    	}
    }
    /*------------------------------------------------------------------ Colleges Filter Page Start --------------------------------------------------------------*/

    public function filterCollegeResult(Request $request)
    {
        $result = $request->all();
        $form_data=  array();
        $data=  array();
        parse_str($result['form_data'], $form_data);

        if (!empty($form_data['ownership']) && !empty($form_data['rating']) && !empty($form_data['college_name'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::where('id',$id)->paginate(10)->appends($form_data);  /* Get College Name */
        }

        elseif (!empty($form_data['ownership']) && !empty($form_data['college_name'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::where('id',$id)->paginate(10)->appends($form_data);   /* Get College Name */
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

            $colleges = College::whereIn('id',$id)->paginate(10)->appends($form_data);   /* Get all the colleges Merge colleges ids */
        }

        elseif (!empty($form_data['college_name']) && !empty($form_data['rating'])) {

            $id = $form_data['college_name']; /* Get Colleges Id Accroding to the Name instances*/

            $colleges = College::where('id',$id)->paginate(10);   /* Get all the colleges Merge colleges ids */
        }

        elseif (!empty($form_data['ownership'])) {
            $colleges = College::whereIn('ownership',$form_data['ownership'])->orderBy('id', 'desc')->paginate(10)->appends($form_data);
        }

        elseif (!empty($form_data['rating'])) {
            foreach ($form_data['rating'] as $key => $value) {
                $min_rate = $value - 0.99;
                $ratings = Rating::whereBetween('rating',[$min_rate, $value])->pluck('college_id');                 
                foreach ($ratings as $key => $rate) {
                    $data[] = $rate;
                }                         
            }
            $colleges = College::whereIn('id',$data)->paginate(10)->appends($form_data);
        }

        elseif (!empty($form_data['college_name'])) {
            $colleges = College::where('id',$form_data['college_name'])->paginate(10)->appends($form_data);;
        }

        else{
            $colleges = College::where('status','=',1)->orderBy('id', 'desc')->paginate(10); 
        }

        return view('front.collegefilter')->with('colleges',$colleges); 
    }

    /*------------------------------------------------------------------ Colleges Filter Page End --------------------------------------------------------------------------------*/


    /*------------------------------------------------------------------ Courses Filter Page Start --------------------------------------------------------------------------------*/

    public function filterCourseResult(Request $request)
    {
        $result = $request->all();
        $course_form_data=  array();

        parse_str($result['course_form_data'], $course_form_data);

        if (!empty($course_form_data['category_id']) && !empty($course_form_data['course_name'])) {

            $course_id1 = Course::whereIn('category_id',$course_form_data['category_id'])->pluck('id'); /* Get Courses Id Accroding to the Category instances*/

            $course_id2 = $course_form_data['course_name']; /* Get Courses Id Accroding to the Name instances*/

            $id = $course_id1->union($course_id1)->union($course_id2);    /* Merge Course ids from Category and name instances */

            $courses = Course::whereIn('id',$id)->paginate(10);   /* Get all the Course Merge Course ids */
        }

        elseif (!empty($course_form_data['course_name'])) {
            $courses = Course::where('id',$course_form_data['course_name'])->paginate(10);
        }

        elseif (!empty($course_form_data['category_id'])) {
            $courses = Course::whereIn('category_id',$course_form_data['category_id'])->paginate(10);
        }

        else{
            $courses = Course::where('status','=',1)->paginate(10); 
        }

        return view('front.coursefilter')->with('courses',$courses);              
    }

    /*------------------------------------------------------------------ Courses Filter Page End --------------------------------------------------------------------------------*/

    public function autocompleteCourse(Request $request){

        $search = $request->get('term');
      
        $result = Course::select('name','id')->where('name', 'LIKE', '%'.$search.'%')->get();
 
        return response()->json($result);
    }

    public function autocompleteCollege(Request $request){

        $search = $request->get('term');
      
        $result = College::select('name','id')->where('name', 'LIKE', '%'.$search.'%')->get();
 
        return response()->json($result);
    }
}

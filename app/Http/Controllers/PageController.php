<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class PageController extends Controller
{
	public function contact()
	{
		return view('front.contact');
	}

	public function saveContact(Request $request)
	{
		$contacts = Contact::create($request->all());
		return redirect()->back()->with('success','Thank You!');
	}

	public function studentInquiry()
	{
		return view('front.inquiry');
	}

	public function saveStudentInquiry(Request $request)
	{
		$inquiry = Contact::storeInquiry($request);
		return redirect()->back()->with('toast_success','Thank You!');
	}

}

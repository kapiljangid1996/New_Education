<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Contact;
use App\Exports\ContactsExport;

class PageController extends Controller
{
	public function contact()
	{
		return view('front.contact');
	}

	public function saveContact(Request $request)
	{
		echo "<pre>"; print_r($request->all()); die();
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

	public function exportContact($type)
	{
		return Excel::download(new ContactsExport, 'student-list.' . $type);
	}

}

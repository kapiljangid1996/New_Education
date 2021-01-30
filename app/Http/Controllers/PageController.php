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

}

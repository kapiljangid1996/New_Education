<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   	public function index()
    {
        return view('admin.index');
    }

   	public function contactList()
    {
    	$contacts = Contact::all();
        return view('admin.contact')->with('contacts', $contacts);
    }
}

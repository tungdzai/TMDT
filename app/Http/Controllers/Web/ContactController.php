<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('web.contact.index',compact('contacts'));
    }
    public function store(Request $request){
        $contact = Contact::create($request->all());
        return redirect()->route('page.contact',$contact);
    }
}

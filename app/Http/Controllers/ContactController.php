<?php

namespace App\Http\Controllers;

use App\Exports\ExportForm;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\contact\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $contact=Contact::first();
        return view('pages.contact' ,compact('contact'));
    }

    public function adminContact(){
        $contacts=Contact::get();
        return view('admin.contacts.index' , compact('contacts'));
    }
    public function create(){
        return view('admin.contacts.create');
    }
    public function store(ContactRequest $request ){

        Contact::create($request->validated());
        return redirect()->route('contacts.index')->with('message' , 'The Contact Created Successfully');
    }
    public function edit($id){
        $contact=Contact::find($id);
        return view('admin.contacts.edit' ,compact('contact'));
    }
    public function update(ContactRequest $request ,Contact $contact ){
        Contact::find($contact->id )->update($request->validated());
        return redirect()->route('contacts.index')->with('message' , 'The Contact Updated Successfully');

    }
    public function destroy($id){
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('message' , 'The Contact Deleted Successfully');

    }


//contact form message

    public function showMessage(){
        $msgs=ContactForm::latest()->get();
        return view('admin.contacts.contact_form' , compact('msgs'));
    }
    public function ContactMessage(Request $request){
        $contact_form=new ContactForm;
        $contact_form->name=$request->name;
        $contact_form->email=$request->email;
        $contact_form->subject=$request->subject;
        $contact_form->message=$request->message;
        $contact_form->save();
        return redirect()->route('contact-us')->with('message' , 'The Message Send Successfully');
    }
    public function deleteMessage($id){
        ContactForm::find($id)->delete();
        return redirect()->back()->with('message' , 'The Message Deleted');
    }

    public function export(){
        return Excel::download(new ExportForm, 'forms.xlsx');
    }

}

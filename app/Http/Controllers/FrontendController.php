<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Validator;
use App\Models\Page;
class FrontendController extends Controller
{

    public function index(Request $request){
        if($request->all()){
            $query = Page::query();

            if($request->city){
                $query->where('city',$request->city);
            }
            if($request->vendor){
                $query->where('vendor',$request->vendor);
            }

            $data = $query->get();

            return view('frontend.search',compact('data'));

        }
        $venues = Page::all();
        return view('frontend.index',compact('venues'));
    }
    public function more_info($id){
        $item = Page::find($id);
        return view('frontend.details',compact('item'));
    }
    public function invitation(){return view('frontend.invitation');}
    public function service(){return view('frontend.service');}
    public function vendor(){return view('frontend.vendor');}
    public function venue(){return view('frontend.venue');}
    public function contactus(){return view('frontend.contact-us');}

    public function contactusForm(Request $request){

        $rules =  [
            'name' =>'required|string',
            'email' =>'required|email',
            'phone' =>'required',
            'message' =>'required|string'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);
        //redirect back with success message
        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you soon.');
    }
}

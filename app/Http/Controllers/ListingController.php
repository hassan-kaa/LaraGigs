<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {   
        return view('listings.index',[
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }
    public function show()
    {
        return view('listings.show',[
            'listing'=>Listing::find(request('id'))
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request $request)
    {
       $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'company' =>'required',
            'email' => ['required','email',Rule::unique('listings','email')],
            'tags' => 'required',
            'website' => 'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->user()->id;
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Created Successfully');

    }
    public function edit()
    {
        return view('listings.edit',[
            'listing'=>Listing::find(request('id'))
        ]);
    }
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'company' =>'required',
            'email' => ['required','email',Rule::unique('listings','email')->ignore(request('id'))],
            'tags' => 'required',
            'website' => 'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        Listing::find(request('id'))->update($formFields);
        return redirect('/')->with('message','Listing Updated Successfully');
    }
    public function delete()
    {
        Listing::find(request('id'))->delete();
        return redirect('/')->with('message','Listing Deleted Successfully');
    }
    public function manage()
    {
        return view('listings.manage',[
            'listings'=>Listing::where('user_id',auth()->user()->id)->get()->sortByDesc('created_at')
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function create()
    {
        return view('proposals.create',[
            'listing'=>Listing::find(request('listing_id'))
        ]);
    }
    public function submit(Request $request)
    {
        $formFields = $request->validate([
            'cover_letter' => 'required',
            'CV' => 'required|mimes:pdf,doc,docx|max:2000'
        ]);
        if($request->hasFile('CV')){
            $formFields['CV'] = $request->file('CV')->store('CVs','public');
        }
        $formFields['user_id'] = auth()->user()->id;
        $formFields['listing_id'] = request('listing_id');
        $formFields['status'] = 'pending';
        $proposal =Proposal::create($formFields);
        return redirect('/listing/'.$proposal->listing->id)->with('message','Proposal Submitted Successfully');
    }
    


    public function edit()
    {
        return view('proposals.edit',[
            'proposal'=>Proposal::find(request('id'))
        ]);
    }
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'cover_letter' => 'required',
            'CV' => 'mimes:pdf,doc,docx|max:2000'
        ]);
        if($request->hasFile('CV')){
            $formFields['CV'] = $request->file('CV')->store('CVs','public');
        }
        $formFields['user_id'] = auth()->user()->id;
        $formFields['listing_id'] = request('listing_id');
        $formFields['status'] = 'pending';
        Proposal::update($formFields);
        return redirect('/proposal/manage')->with('message','Proposal Submitted Successfully');
    }
    public function delete()
    {
        Proposal::find(request('id'))->delete();
        return redirect('/')->with('message','Proposal Deleted Successfully');
    }
    public function manage()
    {
        return view('proposals.manage',[
            'proposals'=>Proposal::where('user_id',auth()->user()->id)->get()
        ]);
    }



}

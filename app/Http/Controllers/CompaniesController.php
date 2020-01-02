<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // company data pagination wise
        $data['companies'] = Companies::paginate(10);

        //view
        return view('company.listing',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // headings 
        $data['title'] = "Company";
        //view
        return view('company.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation the request
        $request->validate([
            'name' => 'required',
            "logo"  => "mimes:jpeg,jpg,png,gif|dimensions:max_width=100,max_height=100"
        ]);

        // all request input
        $input = $request->all();

        // unset the logo
        unset($input['logo']);

        // check if logo set
        if ($request->file('logo')) {

            // file path
            $folder = "public/logo";

            // file upload
            $fileName = $request->logo->store('public/logo');

             // add file array in request array
            $input['logo'] =  $fileName;

        }

        // inserting company into table
        $create = Companies::create($input);

        // check if mysqli inserted id 
        if ( $create->id > 0 ) {
            
             $dataMsg = [

                'name' => $request->name,
                'email' => $request->email,

             ];

             Mail::send('mails.mail', $dataMsg, function($message) use ($request)
             {
             $message->to($request->email)->subject('Company register');
             });

           return redirect()->back()->with('success','Company added successfully');
           
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit( $companies)
    {
        // headings 
        $data['title'] = "Company";
        
        // company data with id
        $data['companay'] = Companies::where('company_id',$companies)->first();
        //view
        return view('company.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $companies)
    {
        //validation the request
        $request->validate([
            'name' => 'required',
            "logo"  => "mimes:jpeg,jpg,png,gif|dimensions:max_width=100,max_height=100"
        ]);

        // all request input
        $input = $request->all();

        // unset the value
        unset($input['logo']);
        unset($input['_method']);
        unset($input['_token']);
    
        // check if logo set
        if ( $request->file('logo') ) {

            // file path
            $folder = "public/logo";

            // file upload
            $fileName = $request->logo->store('public/logo');

             // add file array in request array
            $input['logo'] =  $fileName;

        }

        // updat company data 
        $update = Companies::where('company_id',$companies)->update($input);

        // check if mysqli inserted id 
        if ( $update ) {
           
           return redirect()->back()->with('success','Company updated successfully');
           
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy( $companies )
    {
        //delete
        $delete = Companies::where('company_id',$companies)->delete();

        if ( $delete ) {
           
           return redirect()->back()->with('success','Company deleted successfully');
           
        }
        
    }
}

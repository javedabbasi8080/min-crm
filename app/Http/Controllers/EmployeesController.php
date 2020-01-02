<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // headings 
        $data['title'] = "Employee";

        // company data pagination wise
        $data['employees'] = Employees::join('companies as c','c.company_id','=' ,'employees.company_id')
        ->select('employees.*','c.name as company_name')
        ->paginate(10);

        //view
        return view('employee.listing',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // headings 
        $data['title'] = "Employee";

        // all company 
        $data['companies'] = Companies::all();
        //view
        return view('employee.create',$data);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
        ]);

        // all request input
        $input = $request->all();

        unset($input['company']);
        $input['company_id'] = $request->company;
      
        // inserting company into table
        $create = Employees::create($input);

        // check if mysqli inserted id 
        if ( $create->id > 0 ) {
           
           return redirect()->back()->with('success','Employee added successfully');
           
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit( $employees)
    {
        // headings 
        $data['title'] = "Employee";
        
        // company data with id
        $data['employee'] = Employees::where('employee_id',$employees)->first();

        // all company 
        $data['companies'] = Companies::all();
        //view
        return view('employee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $employees)
    {
         //validation the request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
        ]);

        // all request input
        $input = $request->all();

        unset($input['company']);
        unset($input['_token']);
        unset($input['_method']);

        $input['company_id'] = $request->company;

        // updat company data 
        $update = Employees::where('employee_id',$employees)->update($input);

        // check if mysqli inserted id 
        if ( $update ) {
           
           return redirect()->back()->with('success','Employee updated successfully');
           
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy( $employees )
    {
        //delete
        $delete = Employees::where('employee_id',$employees)->delete();

        if ( $delete ) {
           
           return redirect()->back()->with('success','Employee deleted successfully');
           
        }
        
    }
}

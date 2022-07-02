<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.forVendor.manageVendor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            'description'=> 'required',
            'office_address'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'operator_name'=> 'required',
            'operator_phone'=> 'required',
            'tin'=> 'required',
            'trade_number'=> 'required',
            'status'=> 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'faild'=>'404',
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $vendorinsert = new Vendor();
            $vendorinsert->name = $request->name;
            $vendorinsert->description = $request->description;
            $vendorinsert->office_address = $request->office_address;
            $vendorinsert->email = $request->email;
            $vendorinsert->phone = $request->phone;
            $vendorinsert->operator_name = $request->operator_name;
            $vendorinsert->operator_phone = $request->operator_phone;
            $vendorinsert->tin = $request->tin;
            $vendorinsert->trade_number = $request->trade_number;
            $vendorinsert->status = $request->status;
            $vendorinsert->save();
            return response()->json([
                'message'=>'SuccessFully Vendor Inserted'
            ]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

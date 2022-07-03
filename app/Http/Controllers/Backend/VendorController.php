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
    public function forshow()
    {
        $vendorall = Vendor::orderby('id','asc')->get();
        return [
            'vendor'=>$vendorall
        ];
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
            'email'=> 'required|email|unique:vendors',
            'phone'=> 'required|numeric|unique:vendors',
            'operator_name'=> 'required',
            'operator_phone'=> 'required|numeric|unique:vendors',
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
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *s
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vendoreditforshow($id)
    {
       $singlevendor = Vendor::find($id);
       return [
         'singleVen'=>$singlevendor
       ];
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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'office_address'=>'required',
            // 'email'=>'required|unique:vendors',
            // 'phone'=>'required|unique:vendors',
            'operator_name'=>'required',
            // 'operator_phone'=>'required|unique:vendors',
            // 'tin'=>'required|unique:vendors',
            // 'trade_number'=>'required|unique:vendors',
            'status'=>'required',
        ]);
        if($validator->fails()){
            return [
                'faild' => '404',
                'error' =>$validator->messages()
            ];
        }else{
            $vendorUpdate = Vendor::find($id);
            $vendorUpdate->name = $request->name;
            $vendorUpdate->description = $request->description;
            $vendorUpdate->office_address = $request->office_address;
            $vendorUpdate->email = $request->email;
            $vendorUpdate->phone = $request->phone;
            $vendorUpdate->operator_name = $request->operator_name;
            $vendorUpdate->operator_phone = $request->operator_phone;
            $vendorUpdate->tin = $request->tin;
            $vendorUpdate->trade_number = $request->trade_number;
            $vendorUpdate->status = $request->status;
            $vendorUpdate->update();
            return response()->json([
                'message'=>'Updated SuccessFully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletevendor = Vendor::find($id);
        $deletevendor->delete();
        return [
            'message'=>'SUCCEFULLY DELETED'
        ];
    }
}

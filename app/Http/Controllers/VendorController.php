<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Http\Resources\VendorCollection;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$vendors = new Vendor();
        $query = "select * from vendors where name like '%".$request->name."%'";

        $vendors = DB::select(DB::raw($query));

         return response()->json([
            'result' => new VendorCollection($vendors),
        ],200);

        /* Verificar que exista el parametro en el request (buscar si)*/
        if($request->has('name')){
            $vendors = $vendors->where('name','like','%'.$request->name.'%');
        }
        if($request->has('email')){
            $vendors = $vendors->Where('phone','like','%'.$request->phone.'%');
        }

         /* Condicion where*/
        // $vendors = $vendors->where('birthdate','>=','1990-01-01');

         /* where con  2 o mas condiciones  ( condicion1 AND condicion2 OR condicionN...) */
        // if($request->has('search')){
        //     $vendors = $vendors->where(function($query) use ($request){
        //         $query->where('name','like','%'.$request->search .'%')
        //             ->orWhere('email','like','%'.$request->search.'%');
        //     });
        // }
        
        /* Joins */
        // $vendors = $vendors->select('vendors.name as vendor_name','products.name as product_name');
        // $vendors = $vendors->join('products','products.vendor_id','=','vendors.id');
        // $vendors->where('products.stock','>=','60');

        // $vendors = $vendors->get();
        // return response()->json([
        //     'vendors' => $vendors,
        //     'total' => count($vendors)
        // ],200);

        $vendors = $vendors->get();
        return response()->json([
            'users' => new VendorCollection($vendors)
        ],200);

        //Paginacion
        // $vendors = Vendor::paginate(5);

        // return response()->json([
        //     'result' => $vendors,
        // ],200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:50',
            // 'phone' =>  'required|size:10',
            // 'address' => 'required|min:5'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ],422);
        }

        // $vendor = Vendor::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]); 

        // $vendor = DB::table('vendors')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();

        return response()->json([
            'vendor' => $vendor
        ],200);
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
        $vendor = Vendor::where('id',$id)->first();
        //$vendor = Vendor::where('id',$id)->first();
        //$vendor = DB::table('vendors')->where('id',$id)->first();
        if($vendor === null ){ //count($vendor)
            return response()->json([
                'errors' => [ 'vendor' => 'Not Found' ]
            ],200);  
        }
        
        return response()->json([
            'vendor' => $vendor
        ],200);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'phone' =>  'required|size:10',
            'address' => 'required|min:5'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ],422);
        }

        $vendor = Vendor::find($id); 
        //$vendor = DB::table('vendors')->where('id',$id)->first();
        //$vendor = Vendor::where('id',$id)->first();

        if($vendor === null ){ //count($vendor)
            return response()->json([
                'errors' => [ 'vendor' => 'Not Found' ]
            ],200);  
        }
        
        // $vendor->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);
        
        if($request->has('name')){
            $vendor->name = $request->name;
        }
        
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();

        // $vendor = DB::table('vendors')->where('id',$vendor->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);

        return response()->json([
            'vendor' => $vendor
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $vendor = Vendor::find($id); 
        //$vendor = DB::table('vendors')->where('id',$id)->first();
        //$vendor = Vendor::where('id',$id)->first();

        if($vendor === null ){ //count($vendor)
            return response()->json([
                'errors' => [ 'vendor' => 'Not Found' ]
            ],200);  
        }
        $vendor->delete();
        //$vendor = DB::table('vendors')->where('id',$vendor->id)->delete(); //Delete Row
        // $vendor = DB::table('vendors')
        // ->where('id',$vendor->id)
        // ->update(['deleted_at' => Carbon::now()]); // Actualizar Deleted_at

        return response()->json([
            'vendor' => $vendor
        ],200);
    }

    public function restore($id)
    {

        $vendor = Vendor::withTrashed()->where('id',$id)->first(); 
        if($vendor === null ){ //count($vendor)
            return response()->json([
                'errors' => [ 'vendor' => 'Not Found' ]
            ],200);  
        }
        $vendor->restore();
        return response()->json([
            'vendor' => $vendor
        ],200);
    }
}



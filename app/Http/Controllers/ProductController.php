<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = new product();

        /* Verificar que exista el parametro en el request (buscar si)*/

        if($request->has('name')){
            $products = $products->where('name','like','%'.$request->name.'%');
        }
        if($request->has('price')){
            $products = $products->Where('price','like','%'.$request->price.'%');
        }

         /* Condicion where*/
        // $users = $users->where('birthdate','>=','1990-01-01');

         /* where con  2 o mas condiciones  ( condicion1 AND condicion2 OR condicionN...) */
        // if($request->has('search')){
        //     $users = $users->where(function($query) use ($request){
        //         $query->where('name','like','%'.$request->search .'%')
        //             ->orWhere('email','like','%'.$request->search.'%');
        //     });
        // }
        
        /* Joins */
        // $users = $users->select('users.name as user_name','products.name as product_name');
        // $users = $users->join('products','products.user_id','=','users.id');
        // $users->where('products.stock','>=','60');

        $products = $products->get();
        return response()->json([
            'products' => $products,
            'total' => count($products)
        ],200);

        //Paginacion
        // $users = User::paginate(5);

        // return response()->json([
        //     'result' => $users,
        // ],200);
        
        
    }
    public function store(Request $request)
    {
        //return $request->all();
       
        

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]); 

        // $user = DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);

        $request->validate([ 
            'name' => 'required|min:2|max:50',
            'description' => 'required',
            'stock' =>  'required|min:1',
            'price' => 'required|min:0.01',
            'vendor_id' => 'required',
            'img'=> 'required|mimes:jpg,jpeg,bmp,png'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price; 
        $product->vendor_id = $request->vendor_id;
        $product->user_id = auth()->user()->id;
        //$product->user_id = $request->user()->id;
        $product->save();
        Log::channel('history')->info('Producto Agregado' . $product );

        return response()->json([
            'product' => $product
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
        $product = Product::where('id',$id)->first();
        //$user = User::where('id',$id)->first();
        //$user = DB::table('users')->where('id',$id)->first();
        if($product === null ){ //count($user)
            return response()->json([
                'errors' => [ 'product' => 'Not Foundd' ]
            ],200);  
        }
        
        return response()->json([
            'product' => $product
        ],200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'description' => 'required',
            'stock' =>  'required|min:1',
            'price' => 'required|min:0.01',
            'vendor_id' => 'required',
            'user_id' => 'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ],422);
        }

        $product = Product::find($id); 
        //$user = DB::table('users')->where('id',$id)->first();
        //$user = User::where('id',$id)->first();

        if($product === null ){ //count($user)
            return response()->json([
                'errors' => [ 'user' => 'Not Found' ]
            ],200);  
        }
        
        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);
        
        if($request->has('name')){
            $product->name = $request->name;
        }
        
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->vendor_id = $request->vendor_id;
        $product->user_id = $request->user_id;
        $product->save();

        // $user = DB::table('users')->where('id',$user->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);


        return response()->json([
            'product' => $product
        ],200);
    }
    public function destroy($id)
    {

        $product = Product::find($id); 
        //$user = DB::table('users')->where('id',$id)->first();
        //$user = User::where('id',$id)->first();

        if($product === null ){ //count($user)
            return response()->json([
                'errors' => [ 'product' => 'Not Found' ]
            ],200);  
        }
        $product->delete();
        //$user = DB::table('users')->where('id',$user->id)->delete(); //Delete Row
        // $user = DB::table('users')
        // ->where('id',$user->id)
        // ->update(['deleted_at' => Carbon::now()]); // Actualizar Deleted_at

        return response()->json([
            'product' => $product
        ],200);
    }

    public function restore($id)
    {

        $product = Product::withTrashed()->where('id',$id)->first(); 
        if($product === null ){ //count($user)
            return response()->json([
                'errors' => [ 'product' => 'Not Found' ]
            ],200);  
        }
        $product->restore();
        return response()->json([
            'product' => $product
        ],200);
    }
  

}

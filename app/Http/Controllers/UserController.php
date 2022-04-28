<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = new User();

        /* Verificar que exista el parametro en el request (buscar si)*/
        if($request->has('name')){
            $users = $users->where('name','like','%'.$request->name.'%');
        }
        if($request->has('email')){
            $users = $users->byEmail($request->email);
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

        $users = $users->get();
        return response()->json([
            'users' => new UserCollection($users)
        ],200);

        //Paginacion
        // $users = User::paginate(5);

        // return response()->json([
        //     'result' => $users,
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
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' =>  'required|size:10',
            'birthdate' => 'required|date',
            'password' =>  'required|min:5'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ],422);
        }

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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'user' => $user
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
        $user = User::find($id);
        //$user = User::where('id',$id)->first();
        //$user = DB::table('users')->where('id',$id)->first();
        if($user === null ){ //count($user)
            return response()->json([
                'errors' => [ 'user' => 'Not Found' ]
            ],404);  
        }
        
        return response()->json([
            'user' => new UserResource($user)
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
            'name' => 'nullable|min:2|max:50',
            'email' => 'required|email|unique:users,email,'. $id,
            'phone' =>  'required|size:10',
            'birthdate' => 'required|date',
            'password' =>  'required|min:5'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ],422);
        }

        $user = User::find($id); 
        //$user = DB::table('users')->where('id',$id)->first();
        //$user = User::where('id',$id)->first();

        if($user === null ){ //count($user)
            return response()->json([
                'errors' => [ 'user' => 'Not Found' ]
            ],404);  
        }
        
        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);
        
       // if($request->has('name')){
        //     $user->name = $request->name ;
        // }

        $user->name = $request->has('name') ? $request->name : $user->name;
        $user->email = $request->has('email') ? $request->email : $user->email;
        $user->phone = $request->has('phone') ? $request->phone : $user->phone;
        $user->birthdate = $request->has('birthdate') ? $request->birthdate :  $user->birthdate ;
        $user->password = $request->has('password') ? bcrypt($request->password) : $user->password;

        // $user = DB::table('users')->where('id',$user->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'birthdate' => $request->birthdate,
        //     'password' => bcrypt($request->password)
        // ]);


        return response()->json([
            'user' => $user
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

        $user = User::find($id); 
        //$user = DB::table('users')->where('id',$id)->first();
        //$user = User::where('id',$id)->first();

        if($user === null ){ //count($user)
            return response()->json([
                'errors' => [ 'user' => 'Not Found' ]
            ],404);  
        }
        $user->delete();
        //$user = DB::table('users')->where('id',$user->id)->delete(); //Delete Row
        // $user = DB::table('users')
        // ->where('id',$user->id)
        // ->update(['deleted_at' => Carbon::now()]); // Actualizar Deleted_at

        return response()->json([
            'user' => $user
        ],200);
    }

    public function restore($id)
    {

        $user = User::withTrashed()->where('id',$id)->first(); 
        if($user === null ){ //count($user)
            return response()->json([
                'errors' => [ 'user' => 'Not Found' ]
            ],200);  
        }
        $user->restore();
        return response()->json([
            'user' => $user
        ],200);
    }
}

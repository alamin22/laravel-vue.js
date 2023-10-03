<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Auth;
use Validator;
use DB;

class AuthController extends Controller
{
    function register(Request $request){
		
		$validator = Validator::make($request->all(),[
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'c_password' => 'required |same:password',
		]);
		if($validator->fails()){
			$response = [
				'success' => false,
				'error' => $validator->errors(),
				'message' => "Something went wrong !",
			];
			return response()->json($response,400);
		}
		$data = $request->all();
		$data['password'] = bcrypt($data['password']);
		$user = User::create($data);
		
		$success['token'] = $user->createToken('MyApp')->plainTextToken;
		$success['name'] = $user->name;
		$response = [
				'success' => true,
				'error' => $success,
				'message' => "Register Successfully.",
			];
		return response()->json($response,200);
	}
	function login(Request $request){

		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
			$user = Auth::user();
			$success['token'] = $user->createToken('MyApp')->plainTextToken;
			$success['name'] = $user->name;
			$response = [
				'success' => true,
				'token' => $success['token'],
				'status'=>'success',
				'message' => "Login Successfully.",
			];
			return response()->json($response,200);
		}else{
			$response = [
				'success' => false,
				'error' => 'unauthorized',
				'message' => "Login Failed.",
			];
			return response()->json($response,400);
		}
	}
	function addNewBook(Request $request){
		$data = DB::table('books')->insert([
			'name'=>$request->name,
			'price'=>$request->price,
			'author'=>$request->author,
		]);
		return response()->json('Book Added.',200);
	}
	function getData(){
		$getall = DB::table('books')->orderBy('id','DESC')->get();
		return response()->json($getall,200);
	}
	function edit(Request $request,$id){
		$data = DB::table('books')->where('id',$id)->first();
		return response()->json($data,200);
	}
	function editStore(Request $request,$id){
		$data = DB::table('books')->where('id',$id)->update([
			'name' => $request->name,
			'price' => $request->price,
			'author' => $request->author,
		]);
		return response()->json('Updated Successfully.',200);
	}
	function delete(Request $request,$id){
		DB::table('books')->where('id',$id)->delete();
		return response()->json('Book Deleted.',200);
	}
	function search(Request $request){
		$getall = DB::table('books')
			->where('name','LIKE','%'.$request->key.'%')
			->orWhere('price','LIKE','%'.$request->key.'%')
			->orWhere('author','LIKE','%'.$request->key.'%')
			->orderBy('id','DESC')
			->get();
		return response()->json($getall,200);
	}
	
}

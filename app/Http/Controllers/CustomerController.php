<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
       $customers = Customer::all();
       return response()->json([
        'data' => $customers,
        'status' => 200,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
         [
            'username' =>'required|unique:customers',
            'fname' =>'required',
            'lname' =>'required',
            'email' =>'required|email|unique:customers',
            'address' =>'required',
            'password' =>'required|min:6',
        ]);
       
        if($validator->fails()){
            return response()->json([
                'message' => 'validation error',
                'errors' => $validator->errors()
                
            ],400);
        }
        $costomer = Customer::create([
            'username' => $request->username,
            'fname' =>$request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),

        ]);

        return response()->json([
            'data' => $costomer,
            'status' => '200'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

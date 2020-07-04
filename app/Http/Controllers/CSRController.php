<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\csrnote;

class CSRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = csrnote::all();

        return response()->json([
            'display' => $data
        ]);
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
        //
        $arrtribute = $this->CSRValidation($request);
        $data = csrnote::create($arrtribute);

        return response()->json([
            'Message' => 'Success',
            'result' => $data
        ]);
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
        $CSR = csrnote::find($id);
        $CSR->CSR = $request->input('CSR');
        $CSR->save();

        return response()->json([
            'Message' => 'Update Success',
            'result' => $CSR
        ]);

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

    public function CSRValidation(Request $request)
    {
        return $this->validate($request, [  
            'CSR' => ['bail'],
             
        ]);

    }
}

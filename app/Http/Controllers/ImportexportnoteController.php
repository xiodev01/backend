<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Importexportnote;

class ImportexportnoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function importNote_index()
    {
        //
        $data = Importexportnote::all();

        return response()->json([
            'message'=>'succuss',
            'display' => $data
        ]);
    }
    public function exportNote_index()
    {
        //
        $data = Importexportnote::all();

        return response()->json([
            'message'=>'succuss',
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
    }

    public function ImportNote_store(Request $request)
    {
        // 
        $Note = new Importexportnote;
        $Note->importNotes = $request->input('ImportNote');
        $Note->save();

        return response()->json([
            'message' => 'success',
            'result' => $Note
        ]); 
    }
    public function ExportNote_store(Request $request)
    {
        // 
        $Note = new Importexportnote;
        $Note->ExportNotes = $request->input('ExportNote');
        $Note->save();

        return response()->json([
            'message' => 'success',
            'result' => $Note
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
    }

    public function ImportNote_update(Request $request, $id)
    {
        //
        $Note = Importexportnote::find($id);
        $Note->importNotes = $request->input('ImportNote');
        $Note->save();

        return response()->json([
            'message'=>'success',
            'result'=> $Note
        ]);

        
    }
    public function ExportNote_update(Request $request, $id)
    {
        //
        $Note = Importexportnote::find($id);
        $Note->ExportNotes = $request->input('ExportNote');
        $Note->save();

        return response()->json([
            'message'=>'success',
            'result'=> $Note
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
}

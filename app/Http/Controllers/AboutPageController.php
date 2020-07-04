<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Aboutpage;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aboutpage::all();

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
        $arrtribute = $this->AboutValidation($request);
        $data = Aboutpage::create($arrtribute);

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

        $About = Aboutpage::find($id);
        if ($request->input('CompanyDescription')) {
          $About->CompanyDescription = $request->input('CompanyDescription');
        }

        if ($request->input('CompanyImage')) {
            $Image = $request->input('CompanyImage');

            $file = $Image;

         
            for ($x = 0; $x < count($Image); $x++) {
                $fileArray = $file[$x];
                $image_string = $fileArray;
                preg_match("/data:image\/(.*?);/", $image_string, $image_extension);
                $image_string = preg_replace('/data:image\/(.*?);base64,/', '', $image_string);
                $image_string = str_replace(' ', '+', $image_string); //
                $image_name_string = 'image_' . rand(10, 1000) . '.' . $image_extension[1];

                Storage::disk('public')->put($image_name_string, base64_decode($image_string));
                $image_base64 = base64_decode($image_string);
                Storage::disk('ftp')->put($image_name_string, base64_decode($image_string), 'r+');
            }

            $About->CompanyImage = $image_name_string;
        }
        if ($request->input('Mession')) {
            $About->Mession = $request->input('Mession');
        }
        if ($request->input('Vission')) {
            $About->Vission = $request->input('Vission');
        }
        if ($request->input('Enviroment')) {
            $About->Enviroment = $request->input('Enviroment');
        }
        if ($request->input('EmployeeProgressNote')) {
            $About->EmployeeProgressNote = $request->input('EmployeeProgressNote'); 
        
        }
        if ($request->input('OurPeopleNote')) {
            $About->OurPeopleNote = $request->input('OurPeopleNote');  
       
        
        }

 
        $About->save();

        return response()->json([
            'Message' => 'Success',
            'result' => $About
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

    public function AboutValidation(Request $request)
    {
        return $this->validate($request, [ 

            'CompanyDescription' => ['bail'],
            'CompanyImage' => ['bail'],
            'Mession' => ['bail'],
            'Vission' => ['bail'],
            'Enviroment' => ['bail'],
            'EmployeeProgressNote' => ['bail'],
            'OurPeopleNote' => ['bail'],
            
        ]);

    }
}

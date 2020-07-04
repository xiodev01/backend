<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Welcomepage;

class WelcomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Welcomepage::all();

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
        $arrtribute = $this->WelcomeValidation($request);
        $data = Welcomepage::create($arrtribute);

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

     
        $Welcome = WelcomePage::find($id);
        if ($request->input('Whoarewe')) {
            $Welcome->Whoarewe = $request->input('Whoarewe');
            $Welcome->Imports = $request->input('Imports');
            $Welcome->Exports = $request->input('Exports');
        }

        if ($request->input('Image')) {
            $Image = $request->input('Image');
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
            $Welcome->Image = $image_name_string;
        }

    
        if ($request->input('DescribeProduct')) {
            $Welcome->DescribeProduct = $request->input('DescribeProduct');
        }

        if ($request->input('DescribeServices')) {
            $Welcome->DescribeServices = $request->input('DescribeServices');
        }



        $Welcome->save();


        return response()->json([
            'Message' => 'Update Success',
            'display' => $Welcome
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

    public function WelcomeValidation(Request $request)
    {
        return $this->validate($request, [

            'Whoarewe' => ['bail'],
            'Imports' => ['bail'],
            'Exports' => ['bail'],
            'Image' => ['bail'],
            'DescribeProduct' => ['bail'],
            'DescribeServices' => ['bail'],
        ]);
    }
}

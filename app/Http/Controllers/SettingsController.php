<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Setting;
use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Setting::all();
        $user = User::all();

        return response()->json([
            'display' => $data ,
            'user' => $user ,
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
        $arrtribute = $this->settingsValidation($request);
        $data = Setting::create($arrtribute);

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


        $Settings = Setting::find($id);
        $User = User::find($id);

        if ($request->input('Email')) {
            $User->email = $request->input('Email');
        }
        if ($request->input('Password')) {
            // $User->password = $request->input('Password');
            $User->password = Hash::make($request->input('Password'));
            // 'password' => Hash::make($request->newPassword)
            // $User->password = $request->input('Password');
        }

        $User->save();
        

       

        // return response()->json(['data'=>$User]);

        if ($request->input('companyName')) {
            $Settings->companyName = $request->input('companyName');
        }
        if ($request->input('companyLogo')) {
            $Image = $request->input('companyLogo');
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
            $Settings->companyLogo =$image_name_string;
        }
        if ($request->input('companyEmail')) {
            $Settings->companyEmail = $request->input('companyEmail');
        }
        if ($request->input('companyPhone')) {
            $Settings->companyPhone = $request->input('companyPhone');
        }
        if ($request->input('companyAddress')) {
            $Settings->companyAddress = $request->input('companyAddress');
        }
        if ($request->input('companyWorkingTime')) {
            $Settings->companyWorkingTime = $request->input('companyWorkingTime');
        }
        if ($request->input('Email')) {
            $User->email = $request->input('Email');
        }
        if ($request->input('Password')) {
            $User->password = $request->input('Password');
        }
        if ($request->input('FacebookLink')) {
            $Settings->FacebookLink = $request->input('FacebookLink');
        }
        if ($request->input('InstagramLink')) {
            $Settings->InstagramLink = $request->input('InstagramLink');
        }
        if ($request->input('GoogleLink')) {
            $Settings->GoogleLink = $request->input('GoogleLink');
        }
    
        $Settings->save();


        return response()->json([
            'Message' => 'Success',
            'result' => $Settings,
            'user' => $User
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

    public function settingsValidation(Request $request)
    {
        return $this->validate($request, [
            'companyName' => ['bail'],
            'companyLogo' => ['bail'],
            'companyEmail' => ['bail'],
            'companyPhone' => ['bail'],
            'companyAddress' => ['bail'],
            'companyWorkingTime' => ['bail'],
            'Email' => ['bail'],
            'Password' => ['bail'],
            'FacebookLink' => ['bail'],
            'InstagramLink' => ['bail'],
            'GoogleLink' => ['bail'],
        ]);
    }
}

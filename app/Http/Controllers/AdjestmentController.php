<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adjestment;

class AdjestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Adjestment::all();

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
        $arrtribute = $this->adjestmentsValidation($request);
        $data = Adjestment::create($arrtribute);

        return response()->json([
            'Message' => 'Adjestment Success',
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
        $Adjestment = Adjestment::find($id);

        if ($request->input('Home_Activate_Welcome_Section')) {
            $Adjestment->Home_Activate_Welcome_Section = $request->input('Home_Activate_Welcome_Section');
        }
        if ($request->input('Home_Activate_Welcome_Image')) {
            $Adjestment->Home_Activate_Welcome_Image = $request->input('Home_Activate_Welcome_Image');
 
        }
        if ($request->input('Home_Activate_Welcome_Note')) {
            $Adjestment->Home_Activate_Welcome_Note = $request->input('Home_Activate_Welcome_Note');
     
        }
        if ($request->input('Home_Activate_Imports_Note')) {
            $Adjestment->Home_Activate_Imports_Note = $request->input('Home_Activate_Imports_Note');
      
        }
        if ($request->input('Home_Activate_Export_Note')) {
            $Adjestment->Home_Activate_Export_Note = $request->input('Home_Activate_Export_Note');
    
        }
        if ($request->input('Home_Activate_Our_Products_Section')) {
            $Adjestment->Home_Activate_Our_Products_Section = $request->input('Home_Activate_Our_Products_Section');
     
        }
        if ($request->input('Home_Activate_Product_Slide_Show')) {
            $Adjestment->Home_Activate_Product_Slide_Show = $request->input('Home_Activate_Product_Slide_Show');
     
        }
        if ($request->input('Home_Activate_Services_Section')) {
            $Adjestment->Home_Activate_Services_Section = $request->input('Home_Activate_Services_Section');
     
        }
        if ($request->input('Home_Activate_Services_Section_Note')) {
            $Adjestment->Home_Activate_Services_Section_Note = $request->input('Home_Activate_Services_Section_Note');
      
        }
        // About

        if ($request->input('About_Activate_About_Section')) {
            $Adjestment->About_Activate_About_Section = $request->input('About_Activate_About_Section');
       
        }
        if ($request->input('About_Activate_About_Image')) {
            $Adjestment->About_Activate_About_Image = $request->input('About_Activate_About_Image');
       
        }
        if ($request->input('About_Activate_About_Note')) {
            $Adjestment->About_Activate_About_Note = $request->input('About_Activate_About_Note');
       
        }
        if ($request->input('About_Activate_Vision_Mission_Section')) {
            $Adjestment->About_Activate_Vision_Mission_Section = $request->input('About_Activate_Vision_Mission_Section');
    
        }
        if ($request->input('About_Activate_Mission')) {
            $Adjestment->About_Activate_Mission = $request->input('About_Activate_Mission');
    
        }
        if ($request->input('About_Activate_Vision')) {
            $Adjestment->About_Activate_Vision = $request->input('About_Activate_Vision');
    
        }
        if ($request->input('About_Activate_Enviroment_Section')) {
            $Adjestment->About_Activate_Enviroment_Section = $request->input('About_Activate_Enviroment_Section');
     
        }
        if ($request->input('About_Activate_Enviroment_Note')) {
            $Adjestment->About_Activate_Enviroment_Note = $request->input('About_Activate_Enviroment_Note');
     
        }
        if ($request->input('About_Activate_Employee_Progress')) {
            $Adjestment->About_Activate_Employee_Progress = $request->input('About_Activate_Employee_Progress');
     
        }
        if ($request->input('About_Activate_Our_People')) {
            $Adjestment->About_Activate_Our_People = $request->input('About_Activate_Our_People');
    
        }
        if ($request->input('Import_Activate_Import_Notes')) {
            $Adjestment->Import_Activate_Import_Notes = $request->input('Import_Activate_Import_Notes');
      
        }
        if ($request->input('Import_Activate_Import_Products')) {
            $Adjestment->Import_Activate_Import_Products = $request->input('Import_Activate_Import_Products');
       
        }
        if ($request->input('Export_Activate_Export_Notes')) {
            $Adjestment->Export_Activate_Export_Notes = $request->input('Export_Activate_Export_Notes');
      
        }
        if ($request->input('Export_Activate_Export_Products')) {
            $Adjestment->Export_Activate_Export_Products = $request->input('Export_Activate_Export_Products');
      
        }

        if ($request->input('CSR_Activate_CSR_Note')) {
            $Adjestment->CSR_Activate_CSR_Note = $request->input('CSR_Activate_CSR_Note');
       
        }
        if ($request->input('CSR_Activate_Contact_us_box')) {
            $Adjestment->CSR_Activate_Contact_us_box = $request->input('CSR_Activate_Contact_us_box');
      
        }
        if ($request->input('CSR_Activate_About_us_box')) {
            $Adjestment->CSR_Activate_About_us_box = $request->input('CSR_Activate_About_us_box');
       
        }


        if ($request->input('Contact_Activate_Contact_Details')) {
            $Adjestment->Contact_Activate_Contact_Details = $request->input('Contact_Activate_Contact_Details');
      
        }
        if ($request->input('Contact_Activate_Contact_Form')) {
            $Adjestment->Contact_Activate_Contact_Form = $request->input('Contact_Activate_Contact_Form');
      
        }
        if ($request->input('Contact_Activate_Map')) {
            $Adjestment->Contact_Activate_Map = $request->input('Contact_Activate_Map');
     
        }

        
        
          
             $Adjestment->save();

        return response()->json([
            'Message' => 'Adjestment Success',
            'result' => $Adjestment
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

    public function adjestmentsValidation(Request $request)
    {
        return $this->validate($request, [ 
            'Home_Activate_Welcome_Section'=> ['bail'],
            'Home_Activate_Welcome_Image'=> ['bail'],
            'Home_Activate_Welcome_Note'=> ['bail'],
            'Home_Activate_Imports_Note'=> ['bail'],
            'Home_Activate_Export_Note'=> ['bail'],
            'Home_Activate_Our_Products_Section'=> ['bail'],
            'Home_Activate_Product_Slide_Show'=> ['bail'],
            'Home_Activate_Services_Section'=> ['bail'],
            'Home_Activate_Services_Section_Note'=> ['bail'],
            'About_Activate_About_Section'=> ['bail'],
            'About_Activate_About_Image'=> ['bail'],
            'About_Activate_About_Note'=> ['bail'],
            'About_Activate_Vision_Mission_Section'=> ['bail'],
            'About_Activate_Mission'=> ['bail'],
            'About_Activate_Vision'=> ['bail'],
            'About_Activate_Enviroment_Section'=> ['bail'],
            'About_Activate_Enviroment_Note'=> ['bail'],
            'About_Activate_Employee_Progress'=> ['bail'],
            'About_Activate_Our_People'=> ['bail'],
            'Import_Activate_Import_Notes'=> ['bail'],
            'Import_Activate_Import_Products'=> ['bail'],
            'Export_Activate_Export_Notes'=> ['bail'],
            'Export_Activate_Export_Products'=> ['bail'],
            'CSR_Activate_CSR_Note'=> ['bail'],
            'CSR_Activate_Contact_us_box'=> ['bail'],
            'CSR_Activate_About_us_box'=> ['bail'],
            'Contact_Activate_Contact_Details'=> ['bail'],
            'Contact_Activate_Contact_Form'=> ['bail'],
            'Contact_Activate_Map'=> ['bail'],
        ]);

    }
}

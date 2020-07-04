<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Product::orderby('id','DESC')->get();
        $data->each->append('Image');

        $dataImage = Product::with('Image')->get();

        $dataImport = Product::where('ActiveImport','true')->orderby('id','DESC')->get();
        $dataImport->each->append('Image');

        $dataallImport = Product::where('ActiveImport','true')->orderby('id','DESC')->get();
        $dataallImport = Product::with('Image')->get();

        $dataallExport = Product::where('ActiveExport','true')->orderby('id','DESC')->get();
        $dataallExport = Product::with('Image')->get();


        $dataExport = Product::where('ActiveExport','true')->orderby('id','DESC')->get();
        $dataExport->each->append('Image');

        $HomeProducts = Product::limit(8)->with('Image')->orderby('id','DESC')->get();

        $ProductCategory = Product::select('category')->distinct('category')->limit(5)->get(); 

    //   commit on master

        return response()->json([
            'IndexResult' => $data ,
            'IndexImage' => $dataImage ,
            'IndexImport' => $dataImport ,
            'IndexAllExport' => $dataallExport ,
            'IndexAllImport' => $dataallImport ,
            'IndexExport' => $dataExport ,
            'HomeProducts' => $HomeProducts ,
            'Category' => $ProductCategory ,
            
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

         

        $arrtribute = $this->ProductValidation($request); 
        

        if ($request->ActiveImport == '1') {
            $arrtribute['ActiveImport'] = 'true';
        }
        if ($request->ActiveImport == '0') {
            $arrtribute['ActiveImport'] = 'false';
        }
        if ($request->ActiveExport =='1') {
            $arrtribute['ActiveExport'] = 'true';
        }
        if ($request->ActiveExport =='0') {
            $arrtribute['ActiveExport'] = 'false';
        }
        if ($request->ActiveImport == null) {
            $arrtribute['ActiveImport'] = 'false';
        }
        if ($request->ActiveExport == null) {
            $arrtribute['ActiveExport'] = 'false';
        }
 
        $data = Product::create($arrtribute);

        $getID = Product::orderBy('id','DESC')->first();
        $img_store_all = $request->input('image_name_array');
        $file = $img_store_all;

        for($x = 0; $x < count($img_store_all); $x++) {
            $fileArray = $file[$x];
            $image_string = $fileArray;
            preg_match("/data:image\/(.*?);/",$image_string,$image_extension);
            $image_string = preg_replace('/data:image\/(.*?);base64,/','',$image_string);
            $image_string = str_replace(' ', '+', $image_string); //
            $image_name_string = 'image_' . rand(10,1000) . '.' . $image_extension[1];

            Storage::disk('public')->put($image_name_string,base64_decode($image_string));

            $image_base64 = base64_decode($image_string);
                Storage::disk('ftp')->put($image_name_string, base64_decode($image_string), 'r+');
            
      
            $img = new Image;
            $img->product_id = $getID['id'];
            $img->img = $image_name_string;
            $img->save();
        } 

        return response()->json([
            'message' => 'success test product',
            'result' => $data, 
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
        $arrtribute = $this->ProductValidation($request); 
        $Product = Product::find($id);
        $Product->update($arrtribute);

        $img_store_all = $request->input('image_name_array');
        $file = $img_store_all;

        for($x = 0; $x < count($img_store_all); $x++) {
            $fileArray = $file[$x];
            $image_string = $fileArray;
            preg_match("/data:image\/(.*?);/",$image_string,$image_extension);
            $image_string = preg_replace('/data:image\/(.*?);base64,/','',$image_string);
            $image_string = str_replace(' ', '+', $image_string); //
            $image_name_string = 'image_' . rand(10,1000) . '.' . $image_extension[1];

            Storage::disk('public')->put($image_name_string,base64_decode($image_string));

            $image_base64 = base64_decode($image_string);
                Storage::disk('ftp')->put($image_name_string, base64_decode($image_string), 'r+');
            
      
            $img = new Image;
            $img->product_id = $id;
            $img->img = $image_name_string;
            $img->save();
        } 


        return response()->json([
            'display'=>$Product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Image_destroy($id)
    {
        //

        $product= Image::find($id);
        $product->delete();


            return response()->json([
                'message' =>'Product Successfully removed',
            ],200); 

    }
    public function destroy($id)
    {
        //
        $product= Product::find($id);
        $product->delete();


            return response()->json([
                'message' =>'Product Successfully removed',
            ],200);
    }

    public function ProductValidation(Request $request)
    {
        return $this->validate($request, [
            "Name" => ['bail'],
            "Category" => ['bail'],
            "ActiveImport" => ['bail'],
            "ActiveExport" => ['bail'],
            "Description" => ['bail'],
            "image_name_array" => ['bail'],

            
        ]);
    }
}

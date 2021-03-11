<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
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
        $validateData = $request->validate([
            'Title' => 'required|max:255',
            'Description' => 'required',
            'media' => 'required',
            'price' => 'required',
            'cost_per_item' => 'required',
            'SKU' => 'required',
            'weight' => 'required'
        ]);
        
        $position = strpos($request -> media,';');
        $sub = substr($request -> media,0,$position);
        $ext = explode('/',$sub)[1];

        $name = time().".".$ext;
        $img = Image::make($request->media)->resize(240,200);
        $upload_path = 'backend/product/';
        $image_url = $upload_path.$name;
        $img->save($image_url);

        $product = new Product;
        $product -> Title = $request-> Title;
        $product -> Description = $request -> Description;
        $product -> media = $image_url;
        $product -> price = $request -> price;
        $product -> cost_per_item = $request -> cost_per_item;
        $product -> SKU = $request -> SKU;
        $product ->weight = $request -> weight;
        $product ->save();

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        return response()->json($product);
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
        $data = array();
        $data['Title'] = $request->Title;
        $data['Description'] = $request->Description;
        $data['price'] = $request->price;
        $data['cost_per_item'] = $request->cost_per_item;
        $data['SKU'] = $request->SKU;
        $data['weight'] = $request->weight;
        $update = DB::table('products')->where('id',$id)->update($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        $media = $product -> media;
        unlink($media);
        DB::table('products')->where('id',$id)->delete();
    }
}

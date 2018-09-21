<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Product as ProductResource;

class ProductsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $products = Product::get();
        return view('product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: 
        // Do somethething to sku
        // Validations of field      
        // Image Upload
       
        if($request->hasFile('img'))
        {
            $fileNameWithExtension = $request->file('img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = "";

            if($this->checkIfValidImage($extension)) {
                $fileNameToStore = $fileName."__".time().".".$extension;
                $path = $request->file('img')->storeAs('public/images/banners',$fileNameToStore);
            } 
            else $fileNameToStore = 'default.png';    
        }
        else
        {
            $fileNameToStore = 'default.png';
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->images = $fileNameToStore;
        $product->retail_price = $request->input('retail-price');
        $product->sale_price = $request->input('sale-price');

        
        # return $request->all();

        if( $product->save() ) {
            return redirect('products')->with('success','Product is successfully added!');    
        } else {
            return back()->with('error','Cannot Add product!');    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->images = $request->input('images');
        $product->retail_price = $request->input('retail-price');
        $product->sale_price = $request->input('sale-price');

        if( $product->save() ) {
            return redirect('products')->with('success','Product is successfully updated!');    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product = Product::find($id);
       
        if( $product->delete() ) {
            return redirect('products')->with('success','Product is successfully deleted!');    ;    
        }
    }

    public function getProducts() {
        $products = Product::where('available',true)
                            ->where('visible',true)
                            ->get();

        foreach ($products as $product) 
        {
            // {{asset('storage/attachments')}}
            $image = asset('storage/images/banners') ."/". $product->images; 
            $product->images = $image;
        }

        return ProductResource::collection($products);
    }

    private function checkIfValidImage($ext) {
        
        if( !empty($ext) ) {
            return ( $ext == 'jpg' ) || ( $ext == 'jpeg' ) || ( $ext == 'png' );
        }

        return false;
    }
}

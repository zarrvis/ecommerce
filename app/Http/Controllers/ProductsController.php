<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest()->paginate(10);
        // $products = Product::orderBy('id','DESC');

        // $products = Product::all();
        return view('products.index',compact('products'));

        // return view('products.index',['products' => Product::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'price' => 'required|numeric',
          'image' => 'required|image',
          'description' => 'required'
        ]);
        // dd($request->all());
        // Product::create($request->all());
        $product = new Product;
        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = 'uploads/products/' . $product_image_new_name;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product created succesfully.');
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
        return view('products.edit', ['product' => Product::find($id)]);
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
        $this->validate($request, [
          'name' => 'required',
          'price' => 'required|numeric',
          'description' => 'required'
        ]);
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
      if(file_exists($product->image)){
        unlink($product->image);
      };

      $product->delete();

      return redirect()->back()
                          ->with('success','Product deleted succesfully.');
    }
}

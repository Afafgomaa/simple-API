<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

use App\Http\Resources\ProductResource;
use App\Http\Resources\productCollection;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Exceptions\ProductNotBelongsToYou;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
       $this->middleware('auth:api')->except('index', 'show');
     }
    public function index()
    {
      //  return new productCollection(product::all());
        return productCollection::collection(product::paginate(20));
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
    public function store(ProductRequest $request)
    {
      $product = new product;
      $product->name = $request->name ;
      $product->detail = $request->description;
      $product->price = $request->price;
      $product->discount = $request->discount;
      $product->stock = $request->stock;

      $product->save();
        return response([
          'data' => new ProductResource($product)
        ],Response::HTTP_CREATED) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
      $this->checkUserProduct($product);
      $request['detail'] = $request->description;
      unset($request['description']);
      $product->update($request->all());
      return response([
        'data' => new ProductResource($product)
      ],Response::HTTP_CREATED) ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
         $product->delete();
         return response(null, 204);
    }

    protected function checkUserProduct($product)
    {
      if(Auth::id() !== $product->user_id){
         throw new ProductNotBelongsToYou;
      }
    }
}

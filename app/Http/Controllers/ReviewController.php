<?php

namespace App\Http\Controllers;

use App\review;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewsResource;

use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
      return  ReviewsResource::collection($product->reviews);
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
    public function store(ReviewRequest $request,product $product)
    {
        $review  = new review($request->all());
        $product->reviews->save($review);
        return response([
          'data' => new ReviewsResource($review )], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        //
    }
}

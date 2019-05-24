<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use DB;
use App\ProductRating;
use Session;

class ProductController extends Controller
{
    
    public function store(Request $request)
    {
        //dd($request);

        $productRating_model = new ProductRating();

        $pid = $request->product_id;
        $productRating_model->product_id = $request->product_id;
        $productRating_model->user_id=0;
        $productRating_model->name = $request->author;
        $productRating_model->email = $request->email;
        $productRating_model->rating = $request->rating;
        $productRating_model->reviews = $request->comment;

        $productRating_model->save();
        Session::flash('success-message', 'Thanks for your review');

        return Redirect::to('/product/'.$pid);
        
    }
}

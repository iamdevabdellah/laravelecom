<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Order;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Cart;
use App\User;
use App\Product;

class CartController extends Controller
{	

	public function index(){
		if (Auth::guest()){
			return view('checkout_Without_login');
		}
		return view('checkout2');
	}

	public function addToCart(Request $request){


		//dd(session()->all());
		if(!session()->has('tracking_number')){
			session()->put('tracking_number', Session::getId());
		}
		$tracking_number = Session::get('tracking_number');

		$data['product_info'] = DB::table('products')->where('product_id', $request->product_id)->first();

		$order_exists = DB::table('temp_orders')->where('product_id', $data['product_info']->product_id)->where('tracking_number', $tracking_number)->first();

		if($order_exists){

			$product_qty = $order_exists->product_qty+$request->qty;
			DB::table('temp_orders')->where('temp_order_row_id', $order_exists->temp_order_row_id)->update([
				'product_qty'=> $product_qty,
				'product_total_price' => ($order_exists->product_price * $product_qty)
			]);			
		}
		else
		{
			DB::table('temp_orders')->insert([
				'product_id'=>$data['product_info']->product_id,
				'tracking_number'=>$tracking_number,
				'product_price'=>$data['product_info']->product_price,
				'product_qty'=>$request->qty,
				'product_total_price'=>$data['product_info']->product_price*$request->qty,
				'created_at'=> date('Y-m-d H:i:s'),
			]);
		}

		return redirect('/mycart');
	}
	public function myCart(){
		if(!session()->has('tracking_number')){
			session()->put('tracking_number', Session::getId());
		}
		$tracking_number = session()->get('tracking_number');
		$data['temp_orders'] = DB::table('temp_orders As To')
								->join('products As p', 'To.product_id', '=', 'p.product_id')
								->where('To.tracking_number', $tracking_number)
								->select('p.*', 'To.*')
								->get();

		$data['total_price'] = DB::table('temp_orders')
								->where('tracking_number', $tracking_number)
								->sum('product_total_price');

		return view('cart', ['data'=>$data]);
	}

	public function updateCart(Request $request){

		if(!session()->has('tracking_number')){
			session()->put('tracking_number', Session::getId());
	}
	$product_info = DB::table('temp_orders')->where('temp_order_row_id', $request->temp_order_row_id)->first();
	$product_price = DB::table ('products')->where('product_id', $product_info->product_id)->first()->product_price;

	$product_qty = $request->qty_textbox;

	DB::table('temp_orders')->where('temp_order_row_id', $request->temp_order_row_id)->update(['product_qty' => $product_qty, 'product_total_price' => ($product_price * $product_qty)]);

	return redirect('/mycart');
    }

    public function cartItemDelete($temp_order_row_id){
        if(!session()->has('tracing_number')){
            session()->put('tracing_number', Session::getId());
        }
        DB::table('temp_orders')->where('tracking_number', session()->get('tracking_number'))->where('temp_order_row_id', $temp_order_row_id)->delete();

        echo 1;
    }


    
    public function cartItemDeleteAll() {
        if(!session()->has('tracing_number')){
            session()->put('tracing_number', Session::getId());
        }
        DB::table('temp_orders')->where('tracking_number', session()->get('tracking_number'))->delete();
	}
	
	public function checkOut() {
		if(!session()->has('tracing_number')){
            session()->put('tracing_number', Session::getId());
		}
		
		$data =[];
		return view('checkout-without-login',['data'=> $data]);


	}

	public function confirmOrder() {



	}
}

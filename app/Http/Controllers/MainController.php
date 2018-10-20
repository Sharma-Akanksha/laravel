<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Response;

class MainController extends Controller
{
    public function home()
    {
    	return view('index');
    }

    public function formStore(Request $request)
    {
    	$file = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];
    	$data['product_name'] = $request->product;
    	$data['quantity'] = $request->quantity;
    	$data['price'] = $request->price;
    	$data['date_time'] = date('Y-m-d H:i:s');
    	$data['total_value'] = $request->price * $request->quantity;
    	Storage::disk('local')->put('data.json', json_encode($data));
    	return Response::json($data);

    }
}

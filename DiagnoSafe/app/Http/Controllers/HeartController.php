<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TestRec;

class HeartController extends Controller
{
    function index()
    {
        return view('heart');
    }

    function predict()
    {
        $data = request()->post();
        unset($data['_token']);

        $response = Http::withBody(
            json_encode($data),
            'json'
        )
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post('http://127.0.0.1:5000/predict-heart');

        $heart = json_decode($response->body());

        Testrec::create([
            'user_id'=>\Auth::user()->id,
            'predictor_used'=>'Heart Failure Predictor',
            'test_data'=>json_encode($data),
            'prediction'=>$heart->result
        ]);
        $message = $heart->result == 0 ? "You are not likely to have Heart Failure." : "You are likely to have a Heart Failure. Take Care.";
    
        return redirect()->back()->with('result', $message);
    }
}

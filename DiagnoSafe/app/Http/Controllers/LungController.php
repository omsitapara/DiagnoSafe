<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TestRec;
class LungController extends Controller
{
    function index()
    {
        return view('lung');
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
            ->post('http://127.0.0.1:5000/predict-lung');

        $lung = json_decode($response->body());
              
        Testrec::create([  
            'user_id'=>\Auth::user()->id,
            'predictor_used'=>'Lung Cancer Predictor',
            'test_data'=>json_encode($data),
            'prediction'=>$lung->result,
        ]);
        $message = $lung->result == 0? "You are not likely to have Lung Cancer." : "You are likely to have Lung Cancer. Please take care.";
        return redirect()->back()->with('result', $message);
    }
}

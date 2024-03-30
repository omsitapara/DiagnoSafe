<?php

namespace App\Http\Controllers;

use App\Models\testrec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Diabetes;

class DiabetesController extends Controller
{
    function index()
    {
        return view('diabetes');
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
            ->post('http://127.0.0.1:5000/predict-diabetes');

        $diabetic = json_decode($response->body());
        
        Testrec::create([
            'user_id'=>\Auth::user()->id,
            'predictor_used'=>'Diabetes Predictor',
            'test_data'=>json_encode($data),
            'prediction'=>$diabetic->result,
        ]);
        $message = $diabetic->result == 0 ? "You are not likely to be Diabetic." : "You are likely to be Diabetic. Please verify the same with your physician.";
                
        return redirect()->back()->with('result', $message);
    }
}

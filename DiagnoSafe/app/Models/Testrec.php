<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Testrec extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'predictor_used',
        'test_data',
        'prediction'
    ];
    protected $appends = ['formatted'];

    private function formatter(){  
        $map=json_decode($this->test_data,true);
        $formatted='';
        foreach($map as $k=>$v){
            switch ($k) {
                case 'cp':
                    $formatted .= "Chest Pain: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'pp':
                    $formatted .= "Peer Pressure: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    } 
                break;
                case 'sb':
                    $formatted .= "Shortness of Breath: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    } 
                break;   
                case 'yf':
                    $formatted .= "Yellow Fingers: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'anx':
                    $formatted .= "Anxiety: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'chd':
                    $formatted .= "Chronic Disease: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'alco':
                    $formatted .= "Alcohol Consumption: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'cough':
                    $formatted .= "Excessive Coughing: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'gender':
                    $formatted .= "Gender: ";
                    if($v === '1'){
                        $formatted .= "Male";
                    }
                    else {
                        $formatted .= "Female";
                    }
                break;
                case 'diffs':
                    $formatted .= "Difficulty Swallowing: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'allergy':
                    $formatted .= "Allergy: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'smoking':
                    $formatted .= "Smoking: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'wheezing':
                    $formatted .= "Wheezing: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'fatigue':
                    $formatted .= "Fatigue: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'age':
                    $formatted .= "Age: $v";
                break;
                case 'bmi':
                    $formatted .= "BMI: $v";
                break;
                case 'hba1c':
                    $formatted .= "HbA1c Level: $v";
                break;
                case 'glucose':
                    $formatted .= "Blood Glucose: $v";
                break;
                case 'heartdisease':
                    $formatted .= "Heart Disease: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'hypertension':
                    $formatted .= "Hypertension: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'ang':
                    $formatted .= "Exercise Induced Angina: ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'cpt':
                    $formatted .= "Chest Pain Type: ";
                    if($v === '0'){
                        $formatted .= "Asymptomatic";
                    }
                    else if($v==='1'){
                        $formatted .= "Atypical Angina";
                    }
                    else if($v==='2'){
                        $formatted .= "Non-Anginal Pain";
                    }
                    else{
                        $formatted .= "Typical Angina";
                    }
                break;
                case 'fbs':
                    $formatted .= "High Fasting Blood Sugar (>120): ";
                    if($v === '1'){
                        $formatted .= "Yes";
                    }
                    else {
                        $formatted .= "No";
                    }
                break;
                case 'mhr':
                    $formatted .= "Max Heart Rate: $v";
                break;
                case 'old':
                    $formatted .= "Old Peak: $v";
                break;
                case 'rbp':
                    $formatted .= "Resting Blood Pressure: $v";
                break;
                case 'sex':
                    $formatted .= "Sex: ";
                    if($v === '1'){
                        $formatted .= "Male";
                    }
                    else {
                        $formatted .= "Female";
                    }
                break;
                case 'sts':
                    $formatted .= "ST-Slope: ";
                    if($v === '0'){
                        $formatted .= "Downslopping";
                    }
                    else if($v==='1'){
                        $formatted .= "Flat";
                    }
                    else{
                        $formatted .= "Upslopping";
                    }
                break;
                case 'chol':
                    $formatted .= "Cholesterol: $v";
                break;
                case 'recg':
                    $formatted .= "Resting ElectroCardiogram Report: ";
                    if($v === '0'){
                        $formatted .= "Left Ventricular Hypertrophy(LHV)";
                    }
                    else if($v==='1'){
                        $formatted .= "Normal";
                    }
                    else{
                        $formatted .= "ST: T-wave Abnormality";
                    }
                
            }
            $formatted .= "\n";
        }
        return $formatted;
    }
    protected function getFormattedAttribute(): string
    {
        return $this->formatter();
    }
}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 text-black dark:text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="flex-col w-full p-6">
                <p class ="text-3xl text-redd">Services Offered</p>
                <hr/>
                <div class="w-full pt-2">
                <p class="pt-2 text-lg">We have currently 3 trained models and can predict only 3 health conditions. The health condition predictors are:</p>
                <ol class="list-decimal text-lg p-6">
                    <li>Diabetes Predictor</li>
                    <li>Heart Failure Predictor</li>
                    <li>Lung Cancer Predictor</li>
                </ol>
            </div>
            <div class="flex-col w-full">
                <p class ="text-3xl text-redd">Steps</p>
                <hr/>
                <div class="w-full pt-2">
                <p class="pt-2 text-lg">Follow the followind steps to check your health condition:</p>
                <ol class="list-decimal text-lg p-6">
                    <li>Log in to DiagnoSafe.</li>
                    <li>Select the predictor for which you want to predict your results.</li>
                    <li>Fill up a simple form that contains medical as well as lifestyle parameters</li>
                    <li>Click on Predict Result Button</li>
                    <li>There you Go. You have the Results now.</li>
                </ol>
            </div>
            <div class="flex-col w-full">
                <p class="text-3xl text-redd">Your Recent Tests</p>
                <hr/>
                <p class="pt-2 text-lg">Here are your most recent 3 prediction details:</p>
                <table class="shadow-lg mt-3 w-full">
                    <tr>
                    <th class=" border dark:border-white border-black text-center px-8 py-2">Test id</th>
                    <th class=" border dark:border-white border-black text-center px-8 py-2">Predictor</th>
                    <th class=" border dark:border-white border-black text-center px-8 py-2">Entered Values</th>
                    <th class=" border dark:border-white border-black text-center px-8 py-2">Prediction</th>
                    </tr>
                    @forelse ($tests as $test)
                        <tr class="border border-black dark:border-white">
                            <td class="border py-2 border-black dark:border-white text-center">{{$test->id}}</td>
                            <td class="border py-2 border-black dark:border-white text-center">{{$test->predictor_used}}</td>
                            <td class="border py-2 px-2 border-black dark:border-white text-justify" style="white-space: pre-line;">{{$test->formatted}}</td>
                            <td class="border py-2 border-black dark:border-white text-center">{{$test->prediction== '0' ?"Negative":"Positive"}}</td>
                        </tr>
                    @empty
                         <tr>
                            <td class="text-center border border-black dark:border-white" colspan="4">No Data.</td>
                         </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>  
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Diabetes Predictor') }}
        </h2>
    </x-slot>
    <style>
        input::placeholder,select:required:invalid{
            color:rgb(115, 126, 126);
        }
    </style>
    <div class="grid grid-cols-1 sm:grid-cols-12 ">
        <div class="sm:col-start-4 sm:col-span-6 p-6">
            <form method="POST" action="{{route('diabetes-predictor-pre')}}">
                @csrf()
                <div>
                    <x-input-label for="gender" :value="__('Gender')" />
                    <x-select id="gender" class="block mt-1 w-full" name="gender" :value="old('gender')" required autofocus>
                        <option value="" selected disabled hidden>Select your gender</option>
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="age" :value="__('Age')" />
                    <x-text-input id="age" class="block mt-1 w-full" type="number" step='any' name="age" :value="old('age')" required placeholder="Enter your age in years" />
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="hypertension" :value="__('Do you have Hypertension?')" />
                    <x-select id="hypertension" class="block mt-1 w-full" name="hypertension" :value="old('hypertension')" required autofocus placeholder="Select an option">
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('hypertension')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="heartdisease" :value="__('Do you have Heart Disease?')" />
                    <x-select id="heartdisease" class="block mt-1 w-full" name="heartdisease" :value="old('heartdisease')" required autofocus>
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('heartdisease')" class="mt-2" /> 
                </div>
                <div class="mt-3">
                    <x-input-label for="bmi" :value="__('BMI (Body Mass Index)')" />
                    <x-text-input id="bmi" class="block mt-1 w-full" type="number" step='any' name="bmi" :value="old('bmi')" required placeholder="Enter your BMI, for e.g. 23.1" />
                    <x-input-error :messages="$errors->get('bmi')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="hba1c" :value="__('HbA1C(Haemoglobin A1C Level)')" />
                    <x-text-input id="hba1c" class="block mt-1 w-full" type="number" step='any' name="hba1c" :value="old('hba1c')" required placeholder="Enter your HbA1C Level in %, for e.g. 5.5" />
                    <x-input-error :messages="$errors->get('hba1c')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="glucose" :value="__('Glucose Level (2 hour after meal)')" />
                    <x-text-input id="glucose" class="block mt-1 w-full" type="number" name="glucose" :value="old('glucose')" required placeholder="Enter your glucose level in mg/dL" />
                    <x-input-error :messages="$errors->get('glucose')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Predict Result') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <x-modal name="diab-result" :show="session('result')" :close="'Close'" focusable>
        <h2 class="m-3 text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Diabetes Prediction Results') }}
        </h2>
        <p class=" m-3 text-sm text-gray-600 dark:text-gray-400">
            {{ session('result') }}
        </p>
        <div class="mt-6 mr-3 mb-3 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Close') }}
            </x-secondary-button>
    </x-modal>
</x-app-layout>

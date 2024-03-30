<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lung Cancer Predictor') }}
        </h2>
    </x-slot>
    <style>
        input::placeholder,select:required:invalid{
            color:rgb(115, 126, 126);
        }
    </style>
    <div class="grid grid-cols-1 sm:grid-cols-12 ">
        <div class="sm:col-start-4 sm:col-span-6 p-6">
            <form method="POST" action="{{route('lung-predictor-pre')}}">
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
                    <x-input-label for="smoking" :value="__('Do you Smoke?')" />
                    <x-select id="smoking" class="block mt-1 w-full" name="smoking" :value="old('smoking')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('smoking')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="yf" :value="__('Do you have Yellow Fingers?')" />
                    <x-select id="yf" class="block mt-1 w-full" name="yf" :value="old('yf')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('yf')" class="mt-2" />
                </div>
                <div class ="mt-3">
                    <x-input-label for="anx" :value="__('Do you have Anxiety?')" />
                    <x-select id="anx" class="block mt-1 w-full" name="anx" :value="old('anx')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('anx')" class="mt-2" />
                </div>
                <div class = "mt-3">
                    <x-input-label for="pp" :value="__('Do you feel Peer-Pressure?')" />
                    <x-select id="pp" class="block mt-1 w-full" name="pp" :value="old('pp')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('pp')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="chd" :value="__('Do you have any Chronic Disease?')" />
                    <x-select id="chd" class="block mt-1 w-full" name="chd" :value="old('chd')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('chd')" class="mt-2" />
                </div>
                <div class = "mt-3">
                    <x-input-label for="fatigue" :value="__('Do you feel fatigue?')" />
                    <x-select id="fatigue" class="block mt-1 w-full" name="fatigue" :value="old('fatigue')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('fatigue')" class="mt-2" />
                </div>
                <div class ="mt-3">
                    <x-input-label for="allergy" :value="__('Do you have any Allergies?')" />
                    <x-select id="allergy" class="block mt-1 w-full" name="allergy" :value="old('allergy')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('allergy')" class="mt-2" />
                </div>
                <div class = "mt-3">
                    <x-input-label for="wheezing" :value="__('Do you have Wheezing Sound?')" />
                    <x-select id="wheezing" class="block mt-1 w-full" name="wheezing" :value="old('wheezing')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('wheezing')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="alco" :value="__('Do you consume Alcohol?')" />
                    <x-select id="alco" class="block mt-1 w-full" name="alco" :value="old('alco')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('alco')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="cough" :value="__('Are you coughing excessively?')" />
                    <x-select id="cough" class="block mt-1 w-full" name="cough" :value="old('cough')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('cough')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="sb" :value="__('Are you feeling Shortenss of Breathing?')" />
                    <x-select id="sb" class="block mt-1 w-full" name="sb" :value="old('sb')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('sb')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="diffs" :value="__('Do you have difficulty swallowing?')" />
                    <x-select id="diffs" class="block mt-1 w-full" name="diffs" :value="old('diffs')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('diffs')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="cp" :value="__('Do you have Chest Pain?')" />
                    <x-select id="cp" class="block mt-1 w-full" name="cp" :value="old('cp')" required autofocus>
                        <option value="" selected disabled hidden>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('cp')" class="mt-2" />
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
            {{ __('Lung Cancer Prediction Results') }}
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

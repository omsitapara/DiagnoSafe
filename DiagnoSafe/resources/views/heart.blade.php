<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Heart Failure Predictor') }}
        </h2>
    </x-slot>
    <style>
        input::placeholder,select:required:invalid{
            color:rgb(115, 126, 126);
        }
    </style>
    <div class="grid grid-cols-1 sm:grid-cols-12 ">
        <div class="sm:col-start-4 sm:col-span-6 p-6">
            <form method="POST" autocomplete="off" action="{{route('heart-predictor-pre')}}">
                @csrf()
                <div>
                    <x-input-label for="age" :value="__('Age')" />
                    <x-text-input id="age" class="block mt-1 w-full" type="number" step='any' name="age" :value="old('age')" autofocus required placeholder="Enter your age in years"/>
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="sex" :value="__('Sex')" />
                    <x-select id="sex" class="block mt-1 w-full" name="sex" :value="old('sex')" required autofocus>
                        <option value="" selected disabled hidden>Select your sex</option>
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="cpt" :value="__('Chest Pain Type')" />
                    <x-select id="cpt" class="block mt-1 w-full" name="cpt" :value="old('cpt')" required autofocus placeholder="Select an option">
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="0">Asymptomatic</option>
                        <option value="1">Atypical Angina</option>
                        <option value="2">Non-Anginal Pain</option>
                        <option value="3">Typical Angina</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('cpt')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="rbp" :value="__('Resting Blood Pressure')" />
                    <x-text-input id="rbp" class="block mt-1 w-full" type="number" step='any' name="rbp" :value="old('rbp')" required placeholder="Enter your Systolic Resting Blood Pressure" />
                    <x-input-error :messages="$errors->get('rbp')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="chol" :value="__('Cholesterol')" />
                    <x-text-input id="chol" class="block mt-1 w-full" type="number" step='any' name="chol" :value="old('chol')" required placeholder="Enter your Cholesterol Level, for e.g. 210" />
                    <x-input-error :messages="$errors->get('chol')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="fbs" :value="__('Is your Fasting Blood Sugar Level above 120mg/dL ?')" />
                    <x-select id="fbs" class="block mt-1 w-full" name="fbs" :value="old('fbs')" required autofocus>
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('fbs')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="recg" :value="__('Resting ElectroCardiogram')" />
                    <x-select id="recg" class="block mt-1 w-full" name="recg" :value="old('recg')" required autofocus placeholder="Select an option">
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="0">Left Ventricular Hypertrophy(LHV)</option>
                        <option value="1">Normal</option>
                        <option value="2">ST: T-wave Abnormality</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('recg')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="mhr" :value="__('Maximum Heart Rate Achieved')" />
                    <x-text-input id="mhr" class="block mt-1 w-full" type="number" step='any' name="mhr" :value="old('mhr')" required placeholder="Enter your Max Heart Rate, for e.g. 102" />
                    <x-input-error :messages="$errors->get('mhr')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="ang" :value="__('Do you have Exercise induced Angina (Heart Pain during Exercise)?')" />
                    <x-select id="ang" class="block mt-1 w-full" name="ang" :value="old('ang')" required autofocus>
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('ang')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="olp" :value="__('Enter OldPeak')" />
                    <x-text-input id="olp" class="block mt-1 w-full" type="number" step='any' name="olp" :value="old('olp')" required placeholder="Enter your OldPeak, for e.g. 1.5" />
                    <x-input-error :messages="$errors->get('olp')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="sts" :value="__('ST Slope')" />
                    <x-select id="sts" class="block mt-1 w-full" name="sts" :value="old('sts')" required autofocus placeholder="Select an option">
                        <option value="" selected disabled hidden>Select an appropriate option</option>
                        <option value="0">Downsloping</option>
                        <option value="1">Flat</option>
                        <option value="2">Upsloping</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('sts')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Predict Result') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <x-modal name="heart-result" :show="session('result')" :close="'Close'" focusable>
        <h2 class="m-3 text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Heart Failure Prediction Results') }}
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

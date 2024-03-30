<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Laravel')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-black dark:text-white">
        <div class="relative sm:flex flex-col sm:justify-center sm:items-center min-h-screen bg-center bg-gray-200 dark:bg-gray-800 object-fill bg-cover  selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-black hover:text-white dark:text-white dark:hover:text-redd focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-black hover:text-white dark:text-white dark:hover:text-redd focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-black hover:text-white dark:text-white dark:hover:text-redd focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center" style="width: 100px;">
                    @include('components.logo')
                </div>
            </div>
            <div class="flex-col w-full p-6">
                <p class ="text-3xl text-redd">Overview</p>
                <hr class=""/>
                <div class="w-full pt-2">
                    <p class ="text-lg pt-2">In the ever-evolving landscape of healthcare, technology plays a pivotal role in empowering individuals to take proactive measures towards their well-being. DiagnoSafe, a cutting-edge machine learning-based disease prediction web application, stands at the forefront of this revolution. Designed to provide users with personalized health insights, predictions, and recommendations, DiagnoSafe harnesses the power of advanced algorithms to revolutionize how individuals approach their health management.</p>
                </div>
            </div>
            <div class="flex-col w-full p-6">
                <p class ="text-3xl text-redd">Key Features</p>
                <hr/>
                <div class="w-full pt-2 p-6">
                    <ol class="list-decimal text-xl pt-2">
                        <li class="font-bold">Predictive Health Insights:</li>
                        <p class="pb-3 text-lg">DiagnoSafe employs sophisticated machine learning models to analyze user-inputted health data, offering predictions on the likelihood of developing specific diseases or health conditions.</p>
                        <li class="font-bold">User-Friendly Interface:</li>
                        <p class="pb-3 text-lg">With a user-friendly interface and accessible design, DiagnoSafe ensures that health information is presented in a clear and understandable manner, catering to users of varying technical proficiencies.</p>
                        <li class="font-bold">High Accuracy Predictive Models:</li>
                        <p class = "pb-3 text-lg">DiagnoSafe utilizes state-of-the-art machine learning algorithms trained on comprehensive and diverse datasets to ensure the highest accuracy in health predictions.
                        The predictive models are continually refined and updated based on the latest medical research and user feedback, enhancing their precision over time.</p>
                        <li class="font-bold">Continuous Monitoring and Updates:</li>
                        <p class="pb-3 text-lg">Using DiagnoSafe, users can continuously monitor their health condition based on their medical and/or lifestyle features. This makes the user to know more about his/her health and users can recognise changes to improve their health and stay healthy ahead.</p>
                        <li class="font-bold">Security and Privacy</li>
                        <p class="pb-3 text-lg">We do not collect any user data and sell it to third party. The only data that we record is the medical parameters that can be used to enhance our already trained machine learning models. All your data with us is safe and secure.</p>
                    </ol>
                </div>
            </div>
        </div>
    </body>
</html>

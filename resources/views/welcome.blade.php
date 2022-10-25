<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased"
    style="background-image:url('https://www.istockphoto.com/sign-in/assets/static/589551276-desktop-11b06e2d436bd69c8f20.jpg')">
    <div
        style="background-color: antiquewhite;
    width: 30%;
    height: 293px;
    border: rgba;
    border: 2px solid wheat ;
    margin-left: 36%;
    margin-top: 10%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <div style="font-size: 40px;color: green; display: flex; justify-content: center;margin-top: 44px;">Sign Up for Free</div>
        @if (Route::has('login'))
            {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="margin-left: 19%;
            width: 174px;
            padding: 40px;
            margin-top: 12%;
            height: 131px;
            background-color: wheat;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" > --}}
            <div style="padding:20px; display: flex; justify-content: center;">

                @auth
                    <a style="text-align: right;color: green;" href="{{ url('/home') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <button
                        style="margin-left: 13px;font-size: 20px; color: green;
                    padding: 7px; border: 1px solid black; border-radius: 0px;"><a
                            class="text-sm text-gray-700 dark:text-gray-500 underline"
                            href="{{ route('login') }}">LOGIN</a></button>

                    @if (Route::has('register'))
                        <button
                            style="margin-left: 13px;font-size: 20px; color: green;
                    padding: 7px; border: 1px solid black; border-radius: 0px;"><a
                                class="text-sm text-gray-700 dark:text-gray-500 underline"><a
                                    href="{{ route('register') }}">REGISTER<a></button>
                    @endif
                @endauth
            </div>

            {{-- </div> --}}
        @endif
    </div>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title></title>
</head>
<body class="font-poppins">
    <div class="bg-blue-600 w-full min-h-screen justify-center flex items-center">
        <div class="bg-gray-400 w-1/3 h-[500px] justify-center items-center flex flex-col p-6">
            <img src="{{ asset('icon/laundrylogo.svg') }}" alt="">
            <h1 class="font-semibold text-5xl text-white">Jems Laundry</h1>
        </div>
        <div class="bg-white w-[45%] h-[500px] flex flex-col justify-center px-24">
            <p class="text-xs">Welcome Back!</p>
            <p class="font-semibold text-lg mb-5">Login to your account</p>
            <div class="flex flex-col">
                <label for="" class="text-sm mb-1">Email</label>
                <input id="email" type="email" name="email"
                class="border border-gray-400 outline-none rounded-sm px-4 py-2 font-light text-sm"
                placeholder="example@gmail.com">
            </div>
            <div class="flex flex-col my-4">
                <label for="" class="text-sm mb-1">Password</label>
                <input id="password" type="password" name="password"
                    class="border border-gray-400 outline-none rounded-sm px-4 py-2 font-light text-sm"
                    placeholder="Password">
            </div>
            <button class="text-white bg-blue-600 px-5 font-medium rounded-md py-2 mt-3">Login</button>
        </div>
    </div>
</body>
</html>
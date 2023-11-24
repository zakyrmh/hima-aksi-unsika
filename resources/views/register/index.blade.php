<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#fbe4d8]">
    <div class="flex justify-center h-screen"> 
        <div class="bg-white flex flex-col items-center w-80 h-96 rounded-lg shadow-lg m-auto px-4 py-6">
            <div class="m-auto sm:w-64">
                <h1 class="text-lg font-semibold text-center mb-2 sm:text-xl sm:mb-4">Sign Up</h1>
                <form action="" class="flex flex-col items-center mb-3">
                    <input type="text" placeholder="Name" class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <input type="text" placeholder="Username" class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <input type="email" placeholder="Email" class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <input type="password" placeholder="Password" class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <input type="password" placeholder="Confirm Password" class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <button class="bg-[#2b124c] text-white w-full rounded-md px-2 py-1">Sign Up</button>
                </form>
                <p class="text-sm text-center">Already have an account? <a href="/login" class="text-[#854f6c] font-semibold">Sign In</a></p>
            </div>
        </div>
    </div>
</body>

</html>

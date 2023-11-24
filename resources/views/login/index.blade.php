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
                <h1 class="text-lg font-semibold text-center mb-2 sm:text-xl sm:mb-4">Sign In</h1>
                <form action="" class="flex flex-col items-center mb-3">
                    <input type="text" placeholder="Username"
                        class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md mb-2 px-2 py-1 sm:mb-3">
                    <div class="flex items-center justify-end w-full mb-2 sm:mb-3">
                        <input type="password" placeholder="Password" id="input"
                            class="bg-[#dfb6b2] placeholder-[#190019] border-0 ring-0 ring-white w-full rounded-md px-2 py-1">
                        <button id="toggle" class="absolute mr-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden" id="show">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6" id="hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    <button type="submit" class="bg-[#2b124c] text-white w-full rounded-md px-2 py-1">Sign In</button>
                </form>
                <p class="text-sm text-center">Dont't have an account? <a href="/register"
                        class="text-[#854f6c] font-semibold">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        const toggle = document.querySelector("#toggle")
        const input = document.querySelector("#input")
        const show = document.querySelector("#show")
        const hidden = document.querySelector("#hidden")

        toggle.addEventListener('click', () => {
            if (input.type === "password") {
                input.type = "text"
                show.classList.add('block')
                hidden.classList.add('hidden')
                show.classList.remove('hidden')
            } else {
                input.type = "password"
                hidden.classList.add('block')
                hidden.classList.remove('hidden')
                show.classList.add('hidden')
            }
        })
    </script>
</body>

</html>

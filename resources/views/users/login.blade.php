<x-layout>
    <div class="flex flex-col items-center justify-center bg-slate-100 rounded-xl w-1/2 m-auto p-10 ">
        <h3 class="text-2xl font-bold text-laravel mb-2">Login</h3>
        <form method="POST" class="w-2/3" action="/login" >
            @csrf
            <div class="mb-6 flex flex-col gap-1 ">
                <label for="email" class="inline-block text-lg ">
                    Email
                </label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{old('email')}}" />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6 flex flex-col gap-1">
                <label for="password" class="inline-block text-lg ">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6 flex flex-col">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Login
                </button>
                <span class="flex py-4">Don't have an account ?
                <a href="/register" class="text-blue-400 font-bold ml-4 "> Register </a>
            </span>
            </div>
        </form>
    </div>
</x-layout>
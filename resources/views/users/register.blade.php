<x-layout>
    <div class="flex flex-col items-center justify-center w-1/2 bg-slate-100 rounded-xl p-10 m-auto ">
        <h3 class="text-2xl mb-2 font-bold text-laravel">Register</h3>
        <form method="POST" class="w-2/3" action="/register" >
        @csrf
        <div class="mb-6 flex flex-col gap-1">
            <label for="name" class="inline-block text-lg ">
            Name
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />
    
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6 flex flex-col gap-1">
        <label for="email" class="inline-block text-lg ">
            Email
            </label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
    
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
    
        <div class="mb-6 flex flex-col gap-1">
            <label for="password_confirmation" class="inline-block text-lg ">
            Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
    
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6 flex gap-1 flex-col">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Register
            </button>
            <span class="flex py-4" >Already have account ? 
            <a href="/login" class="text-blue-400 font-bold "> Login </a>
        </span>
        </div>
</x-layout>
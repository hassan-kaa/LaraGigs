<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/ab778d3325.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    <title>Laragigs</title>
</head>
<body>
    <nav class="flex justify-between items-center mb-4" >
        <a href="/"><img src="{{asset('/images/logo.png')}}" alt="logo" class="w-24"></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            @if(auth()->user()->role === 'admin')
            <li><span class="font-bold uppercase">
                Welcome {{auth()->user()->name}}</span></li>
            <li><a href="/listing/manage" class="hover:text-laravel"> <i class="fa-solid fa-gear"></i> Manage</a></li>
            <li><form action="/logout" method="POST" class="cursor-pointer hover:text-laravel">
                @csrf
                 <button type="submit" > <i class="fa-solid fa-door-closed"></i> Logout</button></form></li>
@else
<li><span class="font-bold uppercase">
    Welcome {{auth()->user()->name}}</span></li>
<li><a href="/proposal/manage" class="hover:text-laravel"> <i class="fa-solid fa-gear"></i> Manage</a></li>
<li><form action="/logout" method="POST" class="cursor-pointer hover:text-laravel">
    @csrf
     <button type="submit" > <i class="fa-solid fa-door-closed"></i> Logout</button></form></li>
@endif
            
            @else
            <li><a href="/register" class="hover:text-laravel"> <i class="fa-solid fa-user-plus"></i> Register</a></li>
            <li><a href="/login" class="hover:text-laravel"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
            @endauth
        </ul>
    </nav>
{{--VIEW OUTPUT--}}
<div class="mb-48">
{{$slot}}
</div>
@auth
@if(auth()->user()->role === 'admin')
<footer
class="fixed bottom-0  left-0 w-full flex items-center justify-center font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
<a href="/listing/create" class="absolute  bg-black text-white py-2 px-5">Post Job</a>
</footer>
@endif
@endauth
<x-flash-message/>
</body>
</html>
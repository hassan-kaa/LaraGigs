@if(session()->has('message'))
    <div x-show="show" x-data="{show:true}" x-init="setTimeout(()=>{show=false},3000)" class="fixed top-0 left-1/2 -translate-x-1/2 bg-blue-400 text-white px-28 py-3 " role="alert">
        {{session('message')}}
    </div>
@endif
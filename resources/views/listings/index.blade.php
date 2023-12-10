<x-layout>
@include('partials._hero')
@include('partials._search')
@if(count($listings) > 0)
    <div class=" flex flex-col lg:grid lg:grid-cols-2 w-screen px-10 py-4 gap-4" >
        @foreach($listings as $listing)
        @php
$tags = explode(',', $listing->tags);
@endphp
       
            <div class="p-4 bg-gray-100 rounded-lg items-center flex gap-4 h-full">
                <img src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="logo" class="w-1/3 aspect-square"/>
                <div class="flex flex-col gap-2">
                    <a href="/listing/{{$listing->id}}" class="font-bold text-xl">
                    {{ $listing->title }}
                </a>
                    <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>
                    <div class="flex gap-2">
                        <img width="24" height="24" src="https://img.icons8.com/ios-filled/100/marker.png"
                             alt="marker"/>
                        <p class="text-gray-600">{{ $listing->location }}</p>
                    </div>
                </div>
            </div>
       
        @endforeach
    </div>
@else 
    <p>No listings found</p>
@endif
<div class="mt-6 px-10 flex items-center justify-between w-full">
{{$listings->links()}}
</div>
</x-layout>
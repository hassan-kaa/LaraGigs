<h1>{{$heading}}</h1>
@if(count($listings) > 0)
    <ul>
        @foreach($listings as $listing)
            <a href="/listing/{{$listing['id']}}" >{{$listing['title']}}</a>
            <p>{{$listing['descrition']}}</p>
        @endforeach
    </ul>
@else 
    <p>No listings found</p>
@endif
@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<div class="flex gap-2 items-center justify-start">
  @foreach($tags as $tag)
  <span class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3  text-xs">
    <a href="listings/?tag={{$tag}}">{{$tag}}</a>
  </span>
  @endforeach
</div>
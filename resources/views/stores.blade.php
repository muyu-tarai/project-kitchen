@extends('layout')
@section('css')
<!-- <link rel="stylesheet" href="/css/index.css"> -->
@endsection
@section('content')
<form action="/stores" method="get">
  @csrf
  <input type="text" name="keyword" value="{{isset($keyword) ? $keyword : '' }}">
  <input type="submit" value="検索">
  </form>
@if(isset($stores))
@foreach($stores as $stores )
<div class="stores">
  <div class="stores-item-image">
    <a href="store/{{$stores->id}}"><img src="data:image/{{ $stores->ext }};base64,{{ $stores->store_image }}"></a>
  </div>
  <p class="medium">{{ isset($stores->store_name) ? $stores->store_name : '' }}</p>
</div>
@endforeach
@endif
  @endsection
  @section('js')
  <script src="/js/index.js "></script>
  @endsection
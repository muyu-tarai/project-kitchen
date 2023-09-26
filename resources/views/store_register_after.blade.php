@extends('layout')
@section('content')
<p>aaaa</p>
<img src="https://dl.dropboxusercontent.com/scl/fi/l6oto737f3l705zqdaf1u/tarai.jpg?rlkey=7gkhk9itjmp2v71sdcjb0albf" alt="ダメです">
{{ dd($tmp) }}
@foreach($tmp as $a)
@endforeach
@endsection
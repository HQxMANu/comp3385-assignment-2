@extends('layouts.email')
@section('content')
    <p>{{ $name }} has sent feedback about your website. Below are the comments left by them:</p>
    <p>{{ $comment }}</p>
@endsection
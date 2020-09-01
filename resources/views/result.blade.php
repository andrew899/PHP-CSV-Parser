@extends('layouts.app')

@section('content')
    @foreach($data as $key => $value)
        <p>Key = {{ $key }}</p>
        <p>Value = {{ $value }}</p>
    @endforeach
@endsection

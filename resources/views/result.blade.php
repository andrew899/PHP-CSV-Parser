@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <h5 class="card-header">Result</h5>
            <div class="card-body">
                <p>File: {{ $data['filePath'] }};</p>
                <p>Amount of rows: {{ $data['rows'] }};</p>
                <p>Selected column : {{ $data['colName'] }}</p>
                <p>Result: {{ $data['result'] }}</p>
            </div>
        </div>
    </div>



@endsection

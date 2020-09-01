@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <form action="{{ route('previewFile') }}" method="post">
            @csrf
            <label for="fileSelect">Select file</label>
            <select class="form-control" id="fileSelect" name="fileSelect">
                <option disabled selected>-- Choose file from local storage --</option>
                @foreach($files as $key => $data)
                <option value="{{$data->name}}">{{$data->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-block">Preview</button>
        </form>
    </div>
</div>

<div class="container">
    <div class="form-group">
        <form action="{{ route('previewPath') }}" method="post">
            @csrf
            <label for="inputPath">Path to file: </label>
            <input class="form-control" id="inputPath" name="filePath" placeholder="Input full path to file..." type="text">
            <button type="submit" class="btn btn-primary btn-block">Preview</button>
        </form>
    </div>
</div>

<div class="container">
    <div class="form-group">
        <a href="{{route('fileUpload')}}" class="btn btn-secondary">Upload file form</a>
    </div>
</div>
@endsection

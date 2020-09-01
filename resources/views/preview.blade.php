@extends('layouts.app')

@if( count($data) > 0)
    @section('content')
        <div class="container">
            <div class="form-group">
                <form action="{{ route('parse') }}" method="post">
                    @csrf
                    <input type="hidden" name="filePath" value="{{ $data[0] }}">
                    <label for="columnSelect">Example select</label>
                    <select class="form-control" id="columnSelectSelect" name="colSelect">
                        <option disabled selected>-- Choose column from calculating --</option>
                        @foreach($data[1] as $key => $value)
                            <option name="{{ $value }}" value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-block">Preview</button>
                </form>
            </div>
        </div>

        <div class="container">
            <div>
                <h3>Preview</h3>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        @foreach($data[1] as $tr)
                            <th scope="col">{{ $tr }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                @foreach($data as $key => $line)
                    @if($key == 0 || $key == 1)
                        @continue;
                    @endif
                <tr>
                    @foreach($line as $value)
                    <th scope="row">{{ $value }}</th>
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endsection
@else
    @section('content')
        <div class="container">
            <h1>Data empty!!!</h1>
        </div>
    @endsection
@endif

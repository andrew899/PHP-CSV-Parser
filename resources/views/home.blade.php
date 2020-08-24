@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form type="@_POST" action="ReportParser.php">
                <div class="input-group mb-3">
                    <input type="url" class="form-control" placeholder="Path to file" aria-label="Path to file" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" placeholder="Path to file" aria-label="Path to file" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

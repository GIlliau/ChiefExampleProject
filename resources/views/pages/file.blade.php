@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Download file') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('download.file') }}">
                            @csrf
                            <button class="btn btn-success">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

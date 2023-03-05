@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Buy cow') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('buy.cow') }}">
                            @csrf
                            <button class="btn btn-success">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

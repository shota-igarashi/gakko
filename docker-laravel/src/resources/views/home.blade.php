@extends('layouts.app')

@section('content')
<div class="container-fluid justify-content-center row center-block pr-0">
    @include('layouts.sidebar')

    <div class="col-10">
        <div class="">
            <div class="card">
                <div class="card-header">Dashboards</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

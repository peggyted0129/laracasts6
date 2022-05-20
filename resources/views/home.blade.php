@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span class="me-3"> You are logged in! </span>

                    @if( Auth::check() )
                        <span> {{ Auth::user()->name }} </span>
                    @endif

                    @auth
                        <span> 歡迎登入 </span>
                    @endauth
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

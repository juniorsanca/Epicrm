@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->check() && auth()->user()->id)
                        <small style="margin: 13px"> You are logged in, {{auth()->user()->name}}</small>
                        @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

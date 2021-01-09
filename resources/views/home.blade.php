@extends('layouts.app')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">Posts</div>

                <div class="card-body w-100">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <post-component>
                        </post-component>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

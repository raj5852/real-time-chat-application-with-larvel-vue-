@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <chat-component  :user="{{ Auth::user() }}" />
            </div>
        </div>
    </div>
@endsection

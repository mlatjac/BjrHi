@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
              <h1 class="display-4">{{ config('app.name') }}</h1>
              <p class="lead">@lang('other.jumbotron_intro')</p>
              <hr class="my-4">
              <p>@lang('other.jumbotron_extra')</p>
            </div>
        </div>
    </div>
</div>
@endsection

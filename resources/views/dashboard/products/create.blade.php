@extends('dashboard.layout')
@section('title', __('dashboard.add'))
@section('content')
<h1 class="h3 mb-3">@lang('dashboard.add') @lang('dashboard.products')</h1>
<form method="POST" action="{{ route('dashboard.products.store') }}">
    @include('dashboard.products.form')
</form>
@endsection

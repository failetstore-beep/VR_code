@extends('dashboard.layout')
@section('title', __('dashboard.edit'))
@section('content')
<h1 class="h3 mb-3">@lang('dashboard.edit') @lang('dashboard.products')</h1>
<form method="POST" action="{{ route('dashboard.products.update', $product) }}">
    @method('PUT')
    @include('dashboard.products.form')
</form>
@endsection

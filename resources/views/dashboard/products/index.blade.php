@extends('dashboard.layout')
@section('title', __('dashboard.products'))
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h3">@lang('dashboard.products')</h1>
    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">@lang('dashboard.add')</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>@lang('dashboard.name')</th>
            <th>@lang('dashboard.sku')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td><a href="{{ route('dashboard.products.edit', $product) }}" class="btn btn-sm btn-secondary">@lang('dashboard.edit')</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">@lang('dashboard.no_products')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

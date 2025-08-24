@csrf
<div class="mb-3">
    <label class="form-label" for="name">@lang('dashboard.name')</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}">
</div>
<div class="mb-3">
    <label class="form-label" for="sku">@lang('dashboard.sku')</label>
    <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}">
</div>
<button type="submit" class="btn btn-primary">@lang('dashboard.save')</button>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Augmira</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.products.index') }}">@lang('dashboard.products')</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.embeds.index') }}">Embeds</a></li>
        </ul>
        @include('partials.lang-switcher')
    </div>
</nav>

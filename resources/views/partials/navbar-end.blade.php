<a class="navbar-item" href="{{-- route('store.index') --}}">
    <span class="icon">
        <i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i>
    </span>
    <span>Store</span>
</a>

<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">
        <span class="icon">
          <i class="fa fa-fw fa-bolt" aria-hidden="true"></i>
        </span>
        <span>Plugins</span>
    </a>

    <div class="navbar-dropdown">
        @if ($plugins->isEmpty())
            <span class="navbar-item has-text-danger">No plugins are installed.</span>
        @else
            @foreach ($plugins as $plugin)
                <a href="{{ route('plugin.show', $plugin->link) }}" class="navbar-item">
                    <span>{{ $plugin->name }}</span>
                </a>
            @endforeach
        @endif
    </div>
</div>

<a class="navbar-item" href="{{-- route('options.index') --}}">
    <span class="icon">
        <i class="fa fa-fw fa-cogs" aria-hidden="true"></i>
    </span>
    <span>Options</span>
</a>
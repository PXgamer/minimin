@extends('layouts.app')

@section('content')
    <div class="container is-fluid">
        <section class="hero">
            <div class="hero-body">
                <h1 class="title">
                    {{ config('app.name') }}
                </h1>
            </div>
        </section>
        <div class="content">
            <nav class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Control Panel
                    </p>
                </header>

                <div class="card-content">
                    <ul>
                        <li>
                            <a href="{{-- route('options.index') --}}">
                                <span>{{ config('app.name') }} Options</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{-- route('store.index') --}}">
                                <span>{{ config('app.name') }} Store</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Plugins
                    </p>
                </header>

                <div class="card-content">
                    @if ($plugins->isEmpty())
                        <article class="message is-warning">
                            <div class="message-body">
                                No {{ config('app.name') }} plugins are installed.
                            </div>
                        </article>
                    @else
                        @foreach ($plugins as $plugin)
                            <li>
                                <a href="{{ route('plugin.show', $plugin->link) }}">
                                    <span>{{ $plugin->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </div>
            </nav>
        </div>
    </div>
@endsection

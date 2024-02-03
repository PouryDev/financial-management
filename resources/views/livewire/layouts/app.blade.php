<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/scss/app.scss',
    ])
    @livewireStyles
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }
    </style>

</head>
<body>
<header class="mdc-top-app-bar pk-header-shadow">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button" aria-label="Open navigation menu">menu</button>
            <span class="mdc-top-app-bar__title">{{ auth()->user()->name }} ({{ number_format(auth()->user()->balance + 3000000) }})</span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
        </section>
    </div>
</header>
<aside class="mdc-drawer mdc-drawer--modal">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a class="mdc-list-item {{ ($active ?? '') === 'dashboard' ? 'mdc-list-item--activated' : '' }} pk-list-item" href="#" aria-current="page" tabindex="0">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">inbox</i>
                <span class="mdc-list-item__text">Dashboard</span>
            </a>
            <a class="mdc-list-item {{ ($active ?? '') === 'transaction' ? 'mdc-list-item--activated' : '' }} pk-list-item" href="#">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">receipt</i>
                <span class="mdc-list-item__text">Transactions</span>
            </a>
            <a class="mdc-list-item {{ ($active ?? '') === 'card' ? 'mdc-list-item--activated' : '' }} pk-list-item" href="#">
                <span class="mdc-list-item__ripple"></span>
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">credit_card</i>
                <span class="mdc-list-item__text">Bank cards</span>
            </a>
        </nav>
    </div>
</aside>

<div class="mdc-drawer-scrim"></div>
<main class="mdc-top-app-bar--fixed-adjust">
    <div style="margin-top: 20px">
        {{ $slot }}
    </div>
</main>


@stack('modals')
@livewireScripts


<script src="{{ asset('assets/js/livewire-traits.js') }}"></script>
<script src="{{ asset('assets/js/md-auto-init.js') }}"></script>
<script src="{{ asset('assets/js/mdc-drawer.js') }}"></script>

</body>
</html>

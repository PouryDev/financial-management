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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/main.css') }}">
</head>
<body>
@stack('modals')
{{ $slot }}
@livewireScripts

<script>
    const textFields = [].map.call(document.querySelectorAll('.mdc-text-field'), function(el) {
        el.setAttribute('data-mdc-auto-init', 'MDCTextField')
    });
    const buttons = [].map.call(document.querySelectorAll('.mdc-button'), function(el) {
        el.setAttribute('data-mdc-auto-init', 'MDCRipple')
    });
    const navBars = [].map.call(document.querySelectorAll('.mdc-top-app-bar'), function(el) {
        el.setAttribute('data-mdc-auto-init', 'MDCTopAppBar')
    });
</script>

<script src="{{ asset('assets/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/auth/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/auth/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/auth/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="{{ asset('assets/auth/js/main.js') }}"></script>



<script>
    window.addEventListener('updated',  e => {
        const detail = e.detail[0]
        Swal.fire({
            title: detail.title,
            icon: detail.icon,
            iconColor: detail.iconColor,
            timer: 3000,
            toast: true,
            position: 'bottom-right',
            timerProgressBar: true,
            showConfirmButton: false,
        })
    });
    window.addEventListener('show-confirm-dialog', e => {
        const detail = e.detail[0]
        Swal.fire({
            title: detail.title,
            text: detail.text,
            icon: detail.icon,
            showCancelButton: true,
            confirmButtonText: e.detail.confirmButtonText,
            cancelButtonText: e.detail.cancelButtonText,
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit(e.detail.onConfirmed, e.detail.data);
            }
        });
    });

</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="{{base_url('/manifest.json')}}" />
    <title>{{ $title }} - Randomize</title>  
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d9a7263363532f7ffbb5', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css'>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" />
    <script src="https://kit.fontawesome.com/4ddf6b30b0.js" crossorigin="anonymous"></script>
    @php
        get_css('style.css');
        get_css('fonts.css');
    @endphp
</head>
<body class="bg-randomize-light">
    @yield('content')
    
    <div class="alert alert-info alert-dismissible fade alert-install" role="alert" style="z-index: 999999;position: fixed;bottom: 10px;right: 20px;">
        <strong>Install App!</strong> <br>For more better experience, <br>please install hazardReportApplication<br>
        <button type="button" class="btn btn-dark install-app mt-5">
            Install
        </button>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojify.js/1.1.0/js/emojify.min.js" integrity="sha512-3xH6Z72Cx2K+0KHZUYxQFOaawDZtdStTYxA90HjskJolk/OURHEw96ph/cQGsg6USSh44fXPMmOhd5uYaKPbKg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    @php
        get_js('script.js');
    @endphp
</body>
</html>
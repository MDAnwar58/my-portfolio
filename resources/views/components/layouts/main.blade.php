<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portfolio</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    {{-- for seo purposes --}}
    {{-- <meta property="og:type" content="{{ $type }}"> --}}
    {{-- <meta property="og:url" content="{{ $url }}"> --}}
    {{-- <meta property="og:title" content="{{ $title }}"> --}}

    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ 'Crafting digital experiences that blend innovative design with cutting-edge technology. Specializing in web development, Web design, and creative solutions.' }}">
    <meta property="og:image" content="{{ asset('apple-touch-icon.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    {{ $slot }}

    <script>
        function alertNotify(msg, status = "success", position = "bottom-right") {
            toastr.options = {
                closeButton: true
                , debug: false
                , newestOnTop: true
                , progressBar: true
                , positionClass: `toast-${position}`, // now always valid
                preventDuplicates: false
                , showDuration: "300"
                , hideDuration: "1000"
                , timeOut: "5000"
                , extendedTimeOut: "1000"
                , showEasing: "swing"
                , hideEasing: "linear"
                , showMethod: "fadeIn"
                , hideMethod: "fadeOut"
            , };

            // only valid toastr methods
            if (["success", "error", "warning", "info"].includes(status)) {
                toastr[status](msg);
            } else {
                toastr.info(msg); // fallback
            }
        }

    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('script')
</body>
</html>

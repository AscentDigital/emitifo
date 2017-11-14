<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMS Campaign">
    <meta name="author" content="Ascent">
    <meta name="keyword" content="SMS campaign marketing phones health medical HIV AIDS">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>@if(isset($title)){{ $title }}@else PrepSms @endif</title>

    <!-- Icons -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">


</head>

<body class="app flex-row align-items-center login-bg">
    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>
</body>

</html>
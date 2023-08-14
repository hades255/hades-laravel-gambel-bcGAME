<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{$settings->namesite}}</title>
    <meta name="description" content="{{$settings->namesite}} - Official site ⚡ hotbitmarket.com. We take all commissions, a bonus upon registration. ⭐ We will make payments within 24 hours to any payment system." />

    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/maintenance.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/logo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo.jpg">

    <meta name="theme-color" content="#ffffff">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$settings->namesite}} official site - instant games service<">
    <meta property="og:url" content="/">
    <meta property="og:image" content="/img/logo.jpg">
    <meta property="business:contact_data:country_name" content="canada">
    <base href="/">
</head>
<body>
<div class="center">
    <div class="icon">
        <i class="fad fa-sensor-alert"></i>
    </div>
    <div class="header">Oops...</div>
    <div>
        We have detected suspicious activity 
		<p>on your account.</p>
        <br>
        <a href="https://vk.com/{{$settings->vk_url}}" target="_blank">Let us know</a>
        <br><br>
        <a href="/">Back To Home</a>
    </div>
</div>
</body>
</html>

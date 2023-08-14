<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans&display=swap);

    * {
        margin: 0;
        padding: 0;
        font-family: Open Sans, sans-serif;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .li {
        border-bottom: 1px solid black;
    }

    .header {
        padding: 25px;
        background: #0a0a0a;
    }

    .header a {
        color: white;
        font-size: 1.6em;
    }

    .block-main {
        height: 400px;
    }

    .container {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 75px;
    }

    p {
        font-size: 2em;
        font-weight: 600;
    }

    .desc {
        margin-top: 15px;
    }

    .s {
        margin-top: 35px;
    }

    .btn {
        padding: 15px;
        background: #27ae60;
        color: white;
    }
</style>

<div class="header">
    <a href="http://betsplay2x.fun">{{$settings->namesite}}</a>
</div>
<div class="block-main">
    <div class="container">
        <p>Account Verification {{$settings->namesite}}</p>
        <div class="desc">You received this email because someone registered on <a href="https://hotbitmarket.com" class="li">Hotbitmarket.com</a>, indicating your address.<br>If it wasn't you, please ignore this email.</div>
        <div class="s"><a href="https://newcasino.hotbitmarket.com/email_confirm/{{$hash}}" class="btn">Verify account</a></div>
        <div class="s">Or follow the link yourself: <span style="user-select: all">https://newcasino.hotbitmarket.com/email_confirm/{{$hash}}</span></div>
    </div>
</div>

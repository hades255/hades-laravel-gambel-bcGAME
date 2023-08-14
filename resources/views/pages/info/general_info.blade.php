@if(Auth::guest())
    <div class="info-block">
        <div class="info-block-title">Login / Singup</div>
        <div class="info-block-content">
            Login is required before starting to play on a real balance.
        </div>
        <div class="info-block-content">
            Login is required before starting to play on a real balance.
        </div>
        <div class="info-block-content">
            <a class="ll" href="javascript:void(0)" onclick="iziToast.destroy(); $('#b_si').click()">Login</a>
        </div>
    </div>
@else
<div class="info-block">
    <div class="info-block-title">Demo mode</div>
    <div class="info-block-content">
        Demo mode can be enabled by clicking on the icon <i class="fad fa-coins game_info-icon_info"></i>, which is located next to the account balance.
    </div>
</div>
@endif
<div id="__ajax_title" style="display: none">@if(Auth::user()->chat_role < 3) User registration statistics @else backspin @endif</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if(Auth::user()->chat_role < 3)
        You do not have access to this information
    @else
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="first">
                <div class="kt-grid__item kt-wizard-v2__aside">
                    <div class="kt-wizard-v2__nav">
                        <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fad fa-circle-notch"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Wheel
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-crash"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Crash
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fas fa-bomb"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Mines
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fa fa-dice"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Dice
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fad fa-chess-rook"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Tower
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-roulette"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Roulette
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-stairs"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Stairs
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fas fa-coin"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Coinflip
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-hilo"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                HiLo
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-blackjack"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Blackjack
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fas fa-ball-pile"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Plinko
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="icon-keno"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                Keno
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-dark fade show mt-3" role="alert">
                            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                            <div class="alert-text">
                                <p><strong>backspin</strong><br>
                                <span>The chances of losing (substituting a win for a loss by the system) depend on the balance of the user's account.<br></span></p>
                                <p><strong>base chance</strong><br>
                                <span>Standard chance to lose.</span></p>
                                <p><strong>Max Chance</strong><br>
                                <span>The chance to hit cannot exceed this value.</span></p>
                                <p><strong>Maximum ratio</strong><br>
                                <span>Automatic defeat if a person reaches the specified coefficient value.</span></p>
                                <p><strong>Speed</strong><br>
                                <span>A factor by which the algorithm will increase the chances of losing.<br>The lower it is, the lower the chance of losing for a certain balance threshold.</span></p>
                                <p>All games using such a system support preview.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @php($balanceAdjustments = function($gameId) {
                    $v = \App\Http\Controllers\AdminController::getAdjustmentValues($gameId);
                    $base = $v['base'];
                    $speed = $v['speed'];
                    $max = $v['max'];
                    $mm = $v['mm'];

                    $sendFunc = "delayedv('#$gameId-base', function(v) { send('#g', '/admin/adj/$gameId/'"
                        ."+$('#$gameId-base').val()+'/'+$('#$gameId-max').val()+'/'+$('#$gameId-speed').val()+'/'+$('#$gameId-maxMul').val());"
                        ."adj($gameId, $('#$gameId-base').val(), $('#$gameId-max').val(), $('#$gameId-speed').val(), $('#$gameId-maxMul').val()) })";

                    return <<< HTML
                        <div class="form-group">
                            <label>Base chance</label>
                            <div class="input-group">
                                <input id="$gameId-base" oninput="$sendFunc" value="$base" type="text" class="form-control" placeholder="Base chance" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="flaticon2-percentage"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Max Chance</label>
                            <div class="input-group">
                                <input id="$gameId-max" oninput="$sendFunc" value="$max" type="text" class="form-control" placeholder="Max Chance" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="flaticon2-percentage"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Speed</label>
                            <div class="input-group" id="i1">
                                <input id="$gameId-speed" oninput="$sendFunc" value="$speed" type="text" class="form-control" placeholder="Speed" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maximum ratio</label>
                            <div class="input-group">
                                <input id="$gameId-maxMul" oninput="$sendFunc" value="$mm" type="text" class="form-control" placeholder="Maximum ratio" aria-describedby="basic-addon2">
                            </div>
                        </div>

                        <div class="kt-widget4" style="margin-top: 20px" id="adj$gameId"></div>

                        <script type="text/javascript">$(document).ready(function() {adj($gameId, $base, $max, $speed, $mm)});</script>
HTML;
                })

                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper" id="g">
                    <div class="kt-form" id="kt_form">
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Wheel</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(2) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Crash</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> с coefficient 1.01 - 1.50</label>
                                        <div class="input-group" id="i3">
                                            <input oninput="delayedv('#i3 input', function(v) { send('#i3', '/admin/probability/crash_s/'+v) })"
                                                   value="{{$settings->crash_s}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> с coefficient 1.51 - 2.50</label>
                                        <div class="input-group" id="i4">
                                            <input oninput="delayedv('#i4 input', function(v) { send('#i4', '/admin/probability/crash_m/'+v) })"
                                                   value="{{$settings->crash_m}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> с coefficient 2.51 - 4.00</label>
                                        <div class="input-group" id="i5">
                                            <input oninput="delayedv('#i5 input', function(v) { send('#i5', '/admin/probability/crash_b/'+v) })"
                                                   value="{{$settings->crash_b}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> с coefficient 4.01 - 10.00</label>
                                        <div class="input-group" id="ii6">
                                            <input oninput="delayedv('#ii6 input', function(v) { send('#ii6', '/admin/probability/crash_h/'+v) })"
                                                   value="{{$settings->crash_h}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Mines</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(5) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Dice</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(1) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Tower</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(9) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Roulette</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> x36</label>
                                        <div class="input-group" id="r">
                                            <input oninput="delayedv('#r input', function(v) { send('#r', '/admin/probability/roulette/'+v) })"
                                                   value="{{$settings->roulette}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> x3</label>
                                        <div class="input-group" id="r1">
                                            <input oninput="delayedv('#r1 input', function(v) { send('#r1', '/admin/probability/roulette_3/'+v) })"
                                                   value="{{$settings->roulette_3}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Probability <strong>lose</strong> x2</label>
                                        <div class="input-group" id="r2">
                                            <input oninput="delayedv('#r2 input', function(v) { send('#r2', '/admin/probability/roulette_2/'+v) })"
                                                   value="{{$settings->roulette_2}}" type="text" class="form-control" placeholder="Probability" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="flaticon2-percentage"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Stairs</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(11) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Coinflip</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(4) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">HiLo</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(7) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Blackjack</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(8) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Plinko</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(13) !!}
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Keno</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    {!! $balanceAdjustments(14) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<script type="text/javascript" src="/admin_assets/js/adjustments.js"></script>

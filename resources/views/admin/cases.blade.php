<div id="__ajax_title" style="display: none">Cases</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid row">
    @foreach(\App\Box::get() as $box)
        <div class="col-xl-4">
            <div class="kt-portlet kt-portlet--height-fluid" id="box{{$box->id}}">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-widget kt-widget--project-1">
                        <div class="kt-widget__head">
                            <div class="kt-widget__label">
                                <div class="kt-widget__media">
                                    <span class="kt-media kt-media--lg kt-media--circle task-ico">
                                        <i class="fad fa-box-open"></i>
                                    </span>
                                </div>
                                <div class="kt-widget__info kt-margin-t-5">
                                    <a href="#" class="kt-widget__title">
                                        {{$box->name}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="javascript:void(0)" onclick="cid = {{$box->id}};" data-toggle="modal" data-target="#add" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-add"></i>
                                                <span class="kt-nav__link-text">Add item</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="javascript:void(0)" onclick="send('#box{{$box->id}}', '/admin/case/remove/{{$box->id}}', function() {window.location.reload()})" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                <span class="kt-nav__link-text">Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <div class="kt-widget__content">
                                <div class="kt-widget__details">

                                    <span class="kt-widget__subtitle">Price</span>
                                    <span class="kt-widget__value">{{$box->price}} <span>USD.</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Price:</label>
                    <input type="text" class="form-control" id="price">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="create">Create</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Item type:</label>
                    <input type="text" class="form-control" placeholder="1 - Money, 2 - Experience" id="type">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Amount of money/experience:</label>
                    <input type="text" class="form-control" placeholder="123" id="value">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Chance:</label>
                    <input type="text" class="form-control" placeholder="From 0 To 100" id="chance">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Rarity (color)</label>
                    <input type="text" class="form-control" placeholder="none, green, rare, purple, orange, red" id="rarity">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="i_create">Create</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/admin_assets/js/cases.js"></script>
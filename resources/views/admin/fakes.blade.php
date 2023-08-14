<div id="__ajax_title" style="display: none">Fakes</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile" id="users_container">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
                <table class="kt-datatable__table" style="display: block;">
                    <thead class="kt-datatable__head">
                        <tr class="kt-datatable__row" style="left: 0px;">
                            <th class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--sort">
                                <span style="width: 50px">#</span>
                            </th>
                            <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 200px;">Fake</span></th>
                            <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 181px;">Level</span></th>
                            <th data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="kt-datatable__body" id="users"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="new_group" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fakes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Number of fakes:</label>
                    <input type="text" class="form-control" id="g_num" placeholder="От 1 до 50">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="g_create">Create</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">fake</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Name:</label>
                    <input type="text" class="form-control" id="code" placeholder="Name">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Level:</label>
                    <input type="text" class="form-control" id="sum" placeholder="From 1 To 10">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="create">Create</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="f_settings" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
			<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="game_fake" @if($settings['game_fake'] == 1) checked @endif type="checkbox"
                                        onclick="send('#game_fake', '/admin/setting/game_fake/'+($('#game_fake').is(':checked') ? '1' : '0'))"> Fake betting activity
                                    <span></span>
                                </label>
                            </div>
                <div class="form-group">
                    <label class="form-control-label">Fake game interval (sec):</label>
                    <input type="text" class="form-control" placeholder="Recommended 5 to 250 sec" value="{{$settings->time_fake}}" id="f_edit_time">
                </div>
											<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="chat_fake" @if($settings['chat_fake'] == 1) checked @endif type="checkbox"
                                        onclick="send('#chat_fake', '/admin/setting/chat_fake/'+($('#chat_fake').is(':checked') ? '1' : '0'))"> Fake chat activity
                                    <span></span>
                                </label>
                            </div>
				<div class="form-group">
                    <label class="form-control-label">Fake chat interval (sec):</label>
                    <input type="text" class="form-control" placeholder="Recommended 5 to 250 sec" value="{{$settings->time_chat_fake}}" id="f_edit_time_chat">
                </div>
				<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="withdraw_fake" @if($settings['withdraw_fake'] == 1) checked @endif type="checkbox"
                                        onclick="send('#withdraw_fake', '/admin/setting/withdraw_fake/'+($('#withdraw_fake').is(':checked') ? '1' : '0'))"> Fake withdrawal activity
                                    <span></span>
                                </label>
                            </div>
				<div class="form-group">
                    <label class="form-control-label">Fake chat interval (sec):</label>
                    <input type="text" class="form-control" placeholder="Recommended 35 to 450 sec" value="{{$settings->withdraw_time_fake}}" id="f_edit_time_withdraw">
                </div>
				<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="live_fake" @if($settings['live_fake'] == 1) checked @endif type="checkbox"
                                        onclick="send('#live_fake', '/admin/setting/live_fake/'+($('#live_fake').is(':checked') ? '1' : '0'))"> Fake live feed activity
                                    <span></span>
                                </label>
                            </div>
							<div class="form-group">
                    <label class="form-control-label">Fake online in games (people):</label>
                    <input type="text" class="form-control" placeholder="Recommended from 25 to 250 people" value="{{$settings->fakeonline_games}}" id="f_edit_fakeonline_games">
                </div>
				<div class="form-group">
                    <label class="form-control-label">Total users (persons):</label>
                    <input type="text" class="form-control" placeholder="Recommended from 250 to 250,000 people" value="{{$settings->fakesumusers}}" id="f_edit_fakesumusers">
                </div>
				<div class="form-group">
                    <label class="form-control-label">Total output (persons):</label>
                    <input type="text" class="form-control" placeholder="Recommended from 10,000 to 25,000,000 people" value="{{$settings->fakesumwithdraw}}" id="f_edit_fakesumwithdraw">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="f_edit">Edit</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
if (window.location.href.indexOf('load')==-1) {
     window.location.replace(window.location.href+'?load');
}
</script>
<script type="text/javascript" src="/admin_assets/js/pages/fakes.js"></script>

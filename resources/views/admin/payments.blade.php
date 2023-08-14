<div id="__ajax_title" style="display: none">Refills</div>
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
                            <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 200px;">Amount and status</span></th>
                            <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 181px;">User ID</span></th>
                            <th data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="kt-datatable__body" id="users"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
if (window.location.href.indexOf('load')==-1) {
     window.location.replace(window.location.href+'?load');
}
</script>
<script type="text/javascript" src="/admin_assets/js/pages/payments.js"></script>

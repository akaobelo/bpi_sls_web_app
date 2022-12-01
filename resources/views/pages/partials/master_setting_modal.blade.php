<div class="modal fade" id="master_settings" tabindex="-1" role="dialog" aria-labelledby="master_settings" aria-hidden="true">
    <div id="modal_size" class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center; background-color:#d12338;">
                <img alt="Logo" src="{{asset('/assets/images/GaisanoMalls-White.png')}}" class="max-h-30px" />
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12" style="text-align: center;">
                        <h3 id="modal-description">Master Password</h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control master_key" style="height:50px;font-size:18px;text-align:center;">
                        <br>
                        <button type="button" id="btnConfirm" class="form-control btn btn-primary font-weight-bold">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="master_config" tabindex="-1" role="dialog" aria-labelledby="master_config" aria-hidden="true">
    <div id="modal_size" class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center; background-color:#d12338;">
                <img alt="Logo" src="{{asset('/assets/images/GaisanoMalls-White.png')}}" class="max-h-30px" />
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12" style="text-align: center;">
                        <h3 id="modal-description">Master Settings</h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <select autocomplete="off" class="form-control form-control-solid form-control-md" name="printer_name" id="printer_name">
                            <option value="Citizen CL-S700CII">Citizen CL-S700CII</option>
                            <option value="Xprinter XP-H500B">Xprinter XP-H500B</option>
                        </select>
                        <br>
                        <select autocomplete="off" class="form-control form-control-solid form-control-md" name="disable_module" id="disable_module">
                            <option value="1">Allow All</option>
                            <option value="2">Barcode Interface Program</option>
                            <option value="3">Shelf Label System</option>
                            <option value="4">Disable Both</option>
                        </select>
                            <br>
                        <button type="button" id="btnConfSave" class="form-control btn btn-primary font-weight-bold">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{asset('/js/pages/others/master_settings.js')}}"></script>
@endpush

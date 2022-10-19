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
@push('scripts')
    <script src="{{asset('/js/pages/others/master_settings.js')}}"></script>
@endpush

<div class="modal" id="modalPakanMasuk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading"></h4>
            </div>

            <div class="modal-body modal-body">
                <form id="dataForm" name="dataForm">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">

                    <div class="errMsgContainer mb-3"></div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" id="jumlah" name="jumlah">
                                <div class="input-group-addon">Kg</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jeni Pakan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="">--- Pilih Jenis Pakan ---</option>
                                <option value="SB10">SB10</option>
                                <option value="SB11">SB11</option>
                                <option value="SB12">SB12</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSave" class="btn btn-primary addData">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

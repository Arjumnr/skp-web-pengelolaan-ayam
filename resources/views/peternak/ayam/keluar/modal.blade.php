<div class="modal" id="modalAyamKeluar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading"></h4>
            </div>

            <div class="modal-body modal-body">
                <form id="dataForm" name="dataForm">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">

                    <div class="errMsgContainer mb-3">

                    </div>
                    <div class="form-group row">
                        <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nomor" name="nomor" placeholder="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                                placeholder="Manjung">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="20">
                                <div class="input-group-addon">Ekor</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_berat" class="col-sm-2 col-form-label">Total Berat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" id="total_berat" name="total_berat"
                                    placeholder="10">
                                <div class="input-group-addon">Kg</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" id="umur" name="umur"
                                    placeholder="30">
                                <div class="input-group-addon">Hari</div>
                            </div>
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

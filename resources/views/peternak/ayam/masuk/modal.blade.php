<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="addModalLable" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLable">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body modal-body">
                <form action="" method="POST" id="addData">
                    @csrf
                    <div class="errMsgContainer mb-3">

                    </div>
                    <div class="form-group row">
                        <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nomor" name="nomor" ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_berat" class="col-sm-2 col-form-label">Total Berat</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="total_berat" name="total_berat"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur"
                                value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnUpdate" class="btn btn-primary addData">Save
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

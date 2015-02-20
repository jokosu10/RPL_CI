<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Form Laporan Data Kerusakan Laboratorium</h3>
    </div><!-- /.box-header -->
    <div class="box-body" >
        <form role="form" method="post" action="<?php echo base_url()?>index.php/laporan/export_pdf ">
            <!-- text input -->
            
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <div ><input type="date" name ="tgl_awal" class="form_input datepicker small-form" required ></div>
                </div>
                <div class="form-group">
                    <label>Tanggal Ahkir</label>
                    <div><input type="date" name ="tgl_ahkir" class="form_input datepicker small-form" required ></div>
                </div>
                    <input type="hidden" name="id" class="form-control" />
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->

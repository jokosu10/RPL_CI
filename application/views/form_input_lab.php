<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Form Input Data Laboratorium</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url();?>/index.php/Input_lab/input_data_lab">
            <!-- text input -->
            <div class="form-group">
                <label>Nama Laboratorium</label>
                <input type="text" name="nm_lab" class="form-control" placeholder="Nama Laboratorium" />
            </div>
            <div class="form-group">
                <label>Total Meja</label>
                <input type="text" name="total_meja_lab" class="form-control" placeholder="Total Meja"/>
            </div>
                <input type="hidden" name="id" class="form-control" />
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="box">
    <div class="box-header">
       <h3 class="box-title">Data Laboratorium</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Laboratorium</th>
                    <th>Jumlah Meja</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1?>
            <?php 
                if (isset($lab)) {
                    foreach ($lab as $row ) {
            ?>
                <tr>
                    <th><?php echo $no++?></th>
                    <th><?php echo $row['Nama_lab'];?></th>
                    <th><?php echo $row['Total_meja'];?></th>
                    <th>
                        <span class="glyphicon glyphicon-trash" onClick="hapus(<?php echo $row['ID_lab']?>)"></span> 
                        <span class="glyphicon glyphicon-edit" onClick="edit('<?php echo $row['ID_lab']?>','<?php echo $row['Nama_lab']?>','<?php echo $row['Total_meja']?>')"></span>
                    </th>
                </tr>
            <?php } }?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<script src="<?php echo base_url();?>asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>asset/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
            function hapus(id) {
                var r = confirm("Apakah Yakin DiHapus ? ");
                if (r == true) {
                    document.location.href = "<?php echo base_url();?>/index.php/input_lab/hapus/"+ id;
                }
            }
            function edit(id,nama,jumlahmeja) {
                $("input[name=nm_lab]").val(nama);
                $("input[name=total_meja_lab]").val(jumlahmeja);
                $("input[name=id]").val(id);

            }
        </script>
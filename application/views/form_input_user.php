<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Form Input User</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url();?>/index.php/Input_user/input_data_user">
            <!-- text input -->
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nm_user" class="form-control" placeholder="Nama User" />
            </div>
            <div class="form-group">
                <label>Status User</label>
                <select name="status_user">
                    <option>Kabag </option>
                    <option>Teknisi </option>
                    <option>User </option>
                </select>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="user_pass" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group">
                <label>Confrim Password</label>
                <input type="password" name="confrim_pass" class="form-control" placeholder="Confrim Password" />
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
       <h3 class="box-title">Data User</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Status User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1?>
            <?php 
                if (isset($user)) {
                    foreach ($user as $row ) {
            ?>
                <tr>
                    <th><?php echo $no++?></th>
                    <th><?php echo $row['Nama_User'];?></th>
                    <th><?php echo $row['Status_User'];?></th>
                    <th>
                        <span class="glyphicon glyphicon-trash" onClick="hapus(<?php echo $row['ID_User']?>)"></span>
                        <span class="glyphicon glyphicon-edit" onClick="edit('<?php echo $row['ID_User']?>','<?php echo $row['Nama_User']?>','<?php echo $row['Status_User']?>')"></span>
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
                    document.location.href = "<?php echo base_url();?>/index.php/input_user/hapus/"+ id;
                }
            }
            function edit(id,nama,status_user) {
                $("input[name=nm_user]").val(nama);
                $("input[name=status_user]").val(status_user);
                $("input[name=id]").val(id);

            }
        </script>
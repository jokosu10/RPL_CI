<script type="text/javascript" src="<?php echo base_url();?>asset/fancy_box/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/fancy_box/jquery.fancybox.css" media="screen" />
<div align="center">	
	<div class="form-group" class="form-control">
	        <label>Pilih Nama Lab</label>
	        <select id="lab" class="form-control">
	        	<option value=""></option>	
	            <?php foreach ($lab as $row ) {
				?>
					<option value="<?php echo $row['ID_lab'];?>"><?php echo $row['Nama_lab'];?></option>	
				<?php } ?>
	        </select>
	</div>
</div>
<div class="row">
	<?php 
		if (isset($meja)) {
			foreach ($meja as $row ) {
	?>
	<div class="col-md-2">
		<div class="bordered">
			<div align="center">
				<?php if($row["Status"] == 0){ ?>
				<div>
					<img src="<?php echo base_url();?>asset/img/baik.png" height="50" width="50" >
				</div>
				<?php
				} else {
				?>
				<div>
					<img src="<?php echo base_url();?>asset/img/buruk.png" height="50" width="50" >
				</div>
				<?php
				}
				?>
				<div><?php echo "No ".$row['NoUrut_meja'];?></div>
				<a href="#form-rusak<?php echo $row["ID_meja"]; ?>" class="fancybox">
				<?php if ($this->session->userdata("Status_User") == 'User') { ?>
					<?php if ($row['Status'] == 0) { ?>
						<span class="glyphicon glyphicon-pencil"></span></a>
					<?php } ?>
				<?php } else { ?> 
				<?php if ($row['Status'] == 1) { ?>
						<span class="glyphicon glyphicon-pencil"></span></a>
				<?php } } ?>

				
			
				<?php if ($this->session->userdata("Status_User") == 'Teknisi' || $this->session->userdata("Status_User") == 'Kabag' ) { ?>
					<a href="#detail-lab<?php echo $row["ID_meja"]; ?>" class="fancybox">
						<span class="glyphicon glyphicon-zoom-in"></span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<div id="detail-lab<?php echo $row["ID_meja"]; ?>" class="box-body" style="display:none;">
			<div class="form-group">
				<label>Detail Kerusakan Lab</label><br/>
							<div class="box">
						    <div class="box-header">
						       <h3 class="box-title">History Kerusakan</h3>
						    </div>
						    <div class="box-body table-responsive">
						        <table id="example1" class="table table-bordered table-striped">
						            <thead>
						                <tr>
						                    <th>No</th>
						                    <th>Keterangan Kerusakan</th>
						                    <th>Tgl Kerusakan</th>
						                    <th>Keterangan Perbaikan</th>
						                    <th>Tgl Perbaikan</th>
						                </tr>
						            </thead>
						            <tbody>
						           		<?php 
						           		$no = 1;
										if(!empty($detail_kerusakan)){
											foreach ($detail_kerusakan as $detail) { 
												if($detail->ID_Meja == $row["ID_meja"]){
										?>
										<tr>
						                    <th><?php echo $no++ ?></th>
						                    <th><?php echo $detail->Keterangan_Kerusakan; ?></th>
						                    <th><?php echo $detail->Tgl_Kerusakan; ?></th>
						                    <th><?php echo $detail->Keterangan_Perbaikan; ?></th>
						                    <th><?php echo $detail->Tgl_Selesai; ?></th>
						                </tr>

											<?php }
												}

										}
									?>
									</tbody>
						        </table>
						    </div>
						</div><!-- /.box -->
				<label></label>
            </div>
	</div>

	<div id="form-rusak<?php echo $row["ID_meja"]; ?>" class="box-body" style="display:none;">
	<?php if ($this->session->userdata("Status_User") == 'Teknisi') { ?>
		<form action="<?php echo site_url(); ?>/kerusakan/form_teknisi" method="post">
	<?php } else { ?>
		<form action="<?php echo site_url(); ?>/kerusakan/form" method="post">
	<?php } ?>
			<div class="form-group">
			<?php if ($this->session->userdata("Status_User") == 'Teknisi') { ?>
				<label>Keterangan Kerusakan</label>
				<?php 
	           		$no = 1;//untuk no di history
	           		if(!empty($detail_kerusakan)){
	       				foreach ($detail_kerusakan as $detail) { 
	       					if($detail->ID_Meja == $row["ID_meja"]){
       				
				?>
										
				<p><?php echo $detail->Keterangan_Kerusakan; ?></p>
				<?php
								break;
						}
					}
				}
				?>
                <label>Keterangan Perbaikan</label>
             <?php } else { ?> 
				<label>Keterangan Rusak</label>
             <?php } ?>
                <input type="hidden" name="id" value="<?php echo $row["ID_meja"]; ?>">
                <input type="hidden" name="id_lab" value="<?php echo $row["ID_lab"]; ?>">
                <textarea required name="keterangan" rows="6" cols="20" class="form-control"></textarea>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary btn-sm">Simpan</button>
            </div>
		</form>
	</div>
	<?php } }?>
</div> 
<script type="text/javascript">
	$("#lab").change(function(){
		var id = $("#lab").val();
		document.location.href="<?php echo base_url(); ?>/index.php/kerusakan/lab/" + id;
	});
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
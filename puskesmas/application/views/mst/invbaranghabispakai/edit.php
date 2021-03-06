<?php if(validation_errors()!=""){ ?>
<div class="alert alert-warning alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	<h4>	<i class="icon fa fa-check"></i> Information!</h4>
	<?php echo validation_errors()?>
</div>
<?php } ?>

<?php if($this->session->flashdata('alert_form')!=""){ ?>
<div class="alert alert-success alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	<h4>  <i class="icon fa fa-check"></i> Information!</h4>
	<?php echo $this->session->flashdata('alert_form')?>
</div>
<?php } ?>


<section class="content">
<form action="<?php echo base_url()?>mst/invbaranghabispakai/{action}/{kode}" method="POST" >
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">{title_form}</h3>
				</div><!-- /.box-header -->

					<div class="box-footer pull-right" style="width:100%">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-warning">Ulang</button>
						<button type="button" class="btn btn-success" onClick="document.location.href='<?php echo base_url()?>mst/invbaranghabispakai'">Kembali</button>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Uraian</label>
							<input type="hidden" class="form-control" name="kode" placeholder="Uraian" value="<?php 
								if(set_value('kode')=="" && isset($id_mst_inv_barang_habispakai_jenis)){
									echo $id_mst_inv_barang_habispakai_jenis;
								}else{
									echo  set_value('kode');
								}
								?>">
							<input type="text" class="form-control" name="uraian" placeholder="Uraian" value="<?php 
								if(set_value('uraian')=="" && isset($uraian)){
									echo $uraian;
								}else{
									echo  set_value('uraian');
								}
								?>">
						</div>
						
					</div>
					</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.box -->
	</div><!-- /.box -->
</form>
</section>

<script>
	$(function () {	
		$("#menu_master_data").addClass("active");
		$("#menu_mst_invbaranghabispakai").addClass("active");
	});
</script>

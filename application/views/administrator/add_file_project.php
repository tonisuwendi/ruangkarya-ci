<?php echo $this->session->flashdata('success'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?= base_url(); ?>administrator/project/<?= $project['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Batal</a>
        </div>
		<div class="card-body">
			<?php echo $this->session->flashdata('failed'); ?>
			<form
				action="<?= base_url(); ?>administrator/post_add_file_project/<?= $project['id'] ?>"
				method="post"
				enctype="multipart/form-data"
			>
            <?php for($i = 0; $i < 5 - $file->num_rows(); $i++){ ?>
            <div class="form-group">
                <label>File Pendukung</label><br>
                <input type="file" class="form-control" name="file1<?= $i + 1; ?>" id="file" accept="image/jpg,image/jpeg,image/png,image/gif">
            </div>
            <?php } ?>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-info btn-sm">Ubah File</button>
                </div>
            </div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
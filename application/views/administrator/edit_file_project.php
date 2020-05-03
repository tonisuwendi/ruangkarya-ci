<?php echo $this->session->flashdata('success'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $this->session->flashdata('failed'); ?>
			<form
				action="<?= base_url(); ?>administrator/post_edit_file_project/<?= $file['id'] ?>"
				method="post"
				enctype="multipart/form-data"
			>
            <div class="form-group">
                <label>File Pendukung Lama</label><br>
                <img src="<?= base_url(); ?>assets/images/projects/<?= $file['name']; ?>" style="width: 200px">   
            </div>
            <div class="form-group">
                <label>File Pendukung Baru</label><br>
                <input type="file" class="form-control" name="file20" id="file" accept="image/jpg,image/jpeg,image/png,image/gif" required>
            </div>
            <input type="hidden" name="randId" value="<?= $file['randId'] ?>">
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
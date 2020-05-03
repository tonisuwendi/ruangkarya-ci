<?php echo $this->session->flashdata('success'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h4 mb-2 text-gray-800 mb-4">Edit Projek</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="<?= base_url(); ?>administrator/projects"
				class="btn btn-danger btn-sm"
				><i class="fa fa-times-circle"></i> Batal</a
			>
		</div>
		<div class="card-body">
			<?php echo $this->session->flashdata('failed'); ?>
			<form
				action="<?= base_url(); ?>administrator/project/<?= $project['pId'] ?>"
				method="post"
				enctype="multipart/form-data"
			>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required value="<?= $project['pName']; ?>">
                        <small class="text-danger"><?php echo form_error('name'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?= $project['name']; ?>" disabled class="form-control">
                    </div>
                </div>
                <?php if($project['type'] == 1){ ?>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">File Lama</label>
                        <div class="col-sm-10">
                            <img src="<?= base_url(); ?>assets/images/projects/<?= $project['file']; ?>" alt="<?= $project['pName']; ?>" width="150">
                        </div>
                    </div>
                    <div class="form-group row formInputFileProjectType" id="formInputFileProjectType1">
                        <label for="file" class="col-sm-2 col-form-label">File Baru</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file1" id="file" accept="image/jpg,image/jpeg,image/png">
                            <small class="text-muted">Format file yang di izinkan JPG, JPEG, dan PNG</small>
                        </div>
                    </div>
                <?php }else if($project['type'] == 2){ ?>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">File Lama</label>
                        <div class="col-sm-10">
                            <img src="<?= base_url(); ?>assets/images/projects/<?= $project['file']; ?>" alt="<?= $project['pName']; ?>" width="150">
                        </div>
                    </div>
                    <div class="form-group row formInputFileProjectType" id="formInputFileProjectType2">
                        <label for="file" class="col-sm-2 col-form-label">File Baru</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file2" id="file" accept="image/gif">
                            <small class="text-muted">Format file yang di izinkan GIF</small>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="form-group row formInputFileProjectType" id="formInputFileProjectType3">
                        <label for="file" class="col-sm-2 col-form-label">File Projek</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="file3" id="file" value="<?= $project['file']; ?>">
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control" rows="5"><?= $project['description']; ?></textarea>
                        <small class="text-danger"><?php echo form_error('description'); ?></small>
                    </div>
                </div>
                <?php if($file->num_rows() > 0){ ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File Pendukung</label>
                    <div class="col-sm-10">
                        <?php foreach($file->result_array() as $f): ?>
                            <img src="<?= base_url(); ?>assets/images/projects/<?= $f['name'] ?>" style="width: 200px">
                            <a href="<?= base_url(); ?>administrator/project/file/<?= $f['id']; ?>" target="_blank" class="btn btn-success btn-sm">Ubah</a>
                            <span style="cursor: pointer" onclick="btnDelete('<?= $f['id']; ?>','<?= $project['pId']; ?>')" class="btn btn-danger btn-sm">Hapus</span>
                            <br><br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php } ?>
                <?php if($file->num_rows() < 5){ ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        <a href="<?= base_url(); ?>administrator/project/<?= $project['pId']; ?>/add-file" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah <?= 5 - $file->num_rows(); ?> file pendukung lagi</a>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="linkyt" class="col-sm-2 col-form-label">Video Pendukung</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="linkyt" id="linkyt" value="<?= $project['linkyt']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-info btn-sm">Edit Projek</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<script>
function btnDelete(id,idP){
	swal({
		title: "Ingin menghapus file?",
		text: "Apakah kamu yakin ingin menghapus file pendukung ini?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			document.location = `<?= base_url(); ?>administrator/project/delete-file/${id}/${idP}`
		}
	});
}
</script>
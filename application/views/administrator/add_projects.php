<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h4 mb-2 text-gray-800 mb-4">Buat Projek Baru</h1>

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
				action="<?= base_url(); ?>administrator/projects/add"
				method="post"
				enctype="multipart/form-data"
			>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required value="<?php echo set_value('name'); ?>">
                        <small class="text-danger"><?php echo form_error('name'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="category" id="category" class="form-control" required>
                        <option value="" selected disabled>Pilih Kategori</option>
                        <?php foreach($categories->result_array() as $c): ?>
                            <option value="<?= $c['type']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('category'); ?></small>
                    </div>
                </div>
                <div class="form-group row formInputFileProjectType" id="formInputFileProjectType1" style="display:none">
                    <label for="file" class="col-sm-2 col-form-label">File Projek</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="file1" id="file" accept="image/jpg,image/jpeg,image/png">
                        <small class="text-muted">Format file yang di izinkan JPG, JPEG, dan PNG</small>
                    </div>
                </div>
                <div class="form-group row formInputFileProjectType" id="formInputFileProjectType2" style="display:none">
                    <label for="file2" class="col-sm-2 col-form-label">File Projek</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="file2" id="file2" accept="image/gif">
                         <small class="text-muted">Format file yang di izinkan GIF</small>
                    </div>
                </div>
                <div class="form-group row formInputFileProjectType" id="formInputFileProjectType3" style="display:none">
                    <label for="file" class="col-sm-2 col-form-label">File Projek</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="file3" id="file">
                        <small class="text-muted">Link youtube setelah tanda =. Cth: https://www.youtube.com/watch?v=<strong>mucs3GPVdgQ</strong></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control" rows="5"><?php echo set_value('name'); ?></textarea>
                        <small class="text-danger"><?php echo form_error('description'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file4" class="col-sm-2 col-form-label">File Pendukung</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="file4" id="file4" accept="image/jpg,image/jpeg,image/png">
                        <small class="text-muted">Format file yang di izinkan JPG, JPEG, dan PNG</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="linkyt" class="col-sm-2 col-form-label">Video Pendukung</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="linkyt" id="linkyt">
                        <small class="text-muted">Link youtube setelah tanda =. Cth: https://www.youtube.com/watch?v=<strong>mucs3GPVdgQ</strong></small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script>
$("select#category").change(function(){
    const id = $(this).val();
    if(id == '1'){
        $(".formInputFileProjectType").hide();
        $("#formInputFileProjectType1").show();
    }else if(id == '2'){
        $(".formInputFileProjectType").hide();
        $("#formInputFileProjectType2").show();
    }else{
        $(".formInputFileProjectType").hide();
        $("#formInputFileProjectType3").show();
    }
})
</script>
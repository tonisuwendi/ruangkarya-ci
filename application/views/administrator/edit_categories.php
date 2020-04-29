<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h4 mb-2 text-gray-800 mb-4">Ubah Kategori</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="<?= base_url(); ?>administrator/categories"
				class="btn btn-danger btn-sm"
				><i class="fa fa-times-circle"></i> Batal</a
			>
		</div>
		<div class="card-body">
			<?php echo $this->session->flashdata('failed'); ?>
			<form
				action="<?= base_url(); ?>administrator/category/<?= $category['id']; ?>"
				method="post"
				enctype="multipart/form-data"
			>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="<?= $category['name']; ?>">
                        <small class="text-danger"><?php echo form_error('name'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">File Type</label>
                    <div class="col-sm-10">
                    <select name="type" id="type" class="form-control" required>
                        <option value="<?= $category['type']; ?>"><?php if($category['type'] == 1){echo "JPG/PNG";}else if($category['type'] == 2){echo "GIF";}else{echo "Link Video";} ?></option>
                        <option value="1">JPG/PNG</option>
                        <option value="2">GIF</option>
                        <option value="3">Link Video</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-info btn-sm">Edit Kategori</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

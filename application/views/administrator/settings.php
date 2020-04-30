<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Pengaturan</h1>

	<div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                <div class="list-group">
                    <a href="<?= base_url(); ?>administrator/settings" class="list-group-item list-group-item-action">Nama Aplikasi</a>
                    <a href="<?= base_url(); ?>administrator/setting/banner" class="list-group-item list-group-item-action">Banner</a>
                    <a href="<?= base_url(); ?>administrator/setting/text" class="list-group-item list-group-item-action">Teks Banner</a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="lead text-dark mb-0">Nama Aplikasi</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>administrator/settings" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="app_name" value="<?= $setting['app_name']; ?>" required>
                        </div>
                        <button class="btn btn-sm btn-info" type="submit">Edit Nama</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

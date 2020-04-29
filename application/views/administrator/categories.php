<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Data Kategori</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="<?= base_url(); ?>administrator/categories/add"
				class="btn btn-info btn-sm"
				>Tambah Kategori</a
			>
		</div>
		<div class="card-body">
			<?php if($categories->num_rows() > 0){ ?>
			<div class="table-responsive">
				<table
					class="table table-bordered"
					id="dataTable"
					width="100%"
					cellspacing="0"
				>
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Type</th>
                            <th>Aksi</th>
						</tr>
					</thead>
					<tbody class="data-content">
					<?php $no=1; foreach($categories->result_array() as $c): ?>
                        <tr>
							<td><?= $no; ?></td>
							<td><?= $c['name']; ?></td>
							<?php if($c['type'] == 1){ ?>
								<td>PNG/JPG</td>
							<?php }else if($c['type'] == 2){ ?>
								<td>GIF</td>
							<?php }else{ ?>
								<td>Link Video</td>
							<?php } ?>
							<td style="width: 100px">
								<a href="<?= base_url(); ?>administrator/category/<?= $c['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
								<button onclick="btnDelete('<?= $c['id']; ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
							</td>
						</tr>
					<?php $no++; endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php }else{ ?>
				<div class="alert alert-warning">
					Upss. Belum ada kategori. Yuk tambah kategori sekarang.
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<script>
function btnDelete(id){
	swal({
		title: "Yakin ingin menghapus kategori?",
		text: "Apakah kamu yakin ingin menghapus kategori ini? Semua projek dengan kategori ini akan ikut terhapus",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			document.location = `<?= base_url(); ?>administrator/category/${id}/delete`
		}
	});
}
</script>
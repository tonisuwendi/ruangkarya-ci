<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Data Projek</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="<?= base_url(); ?>administrator/projects/add"
				class="btn btn-info btn-sm"
				>Tambah Projek</a
			>
		</div>
		<div class="card-body">
			<?php if($projects->num_rows() > 0){ ?>
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
							<th>File</th>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Tanggal Input</th>
                            <th>Aksi</th>
						</tr>
					</thead>
					<tbody class="data-content">
					<?php $no=1; foreach($projects->result_array() as $p): ?>
                        <tr>
							<td><?= $no; ?></td>
							<?php if($p['type'] == 3){ ?>
							<td><iframe width="70" height="50" src="https://www.youtube.com/embed/<?= $p['file']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
							<?php }else{ ?>
								<td><img src="<?= base_url(); ?>assets/images/projects/<?= $p['file']; ?>" height="50"></td>
							<?php } ?>
							<td><?= $p['pName']; ?></td>
							<td><?= $p['name']; ?></td>
							<td><?= $p['date_input']; ?></td>
							<td style="width: 140px">
								<a href="<?= base_url(); ?>project/<?= $p['slug']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i></a>
								<a href="<?= base_url(); ?>administrator/project/<?= $p['pId']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
								<button onclick="btnDelete('<?= $p['pId']; ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
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
		title: "Ingin menghapus projek?",
		text: "Apakah kamu yakin ingin menghapus projek ini? Projek yang dihapus tidak akan bisa dikembalikan lagi.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			document.location = `<?= base_url(); ?>administrator/project/${id}/delete`
		}
	});
}
</script>
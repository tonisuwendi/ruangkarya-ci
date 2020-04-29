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
<?php
$categories = $this->db->get('categories');
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/logo/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url(); ?>">Beranda</a>
        </li>
        <li class="nav-item dropdown active ml-1">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach($categories->result_array() as $c): ?>
                <a class="dropdown-item" href="<?= base_url(); ?>categories/<?= $c['id']; ?>"><?= $c['name']; ?></a>
            <?php endforeach; ?>
            </div>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Cari projek" aria-label="Search">
        <button class="btn btn-sm btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    </div>
</nav>
<div class="navtop"></div>
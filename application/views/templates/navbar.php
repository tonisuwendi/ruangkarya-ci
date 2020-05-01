<?php
$categories = $this->db->get('categories');
$setting = $this->db->get('settings')->row_array();
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand mr-5" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/logo/<?= $setting['logo']; ?>" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        <form class="form-inline my-2 my-lg-0" action="<?= base_url(); ?>search">
        <input class="form-control form-control-sm mr-sm-1" name="q" type="search" placeholder="Cari projek" aria-label="Search" autocomplete="off">
        <button class="btn btn-sm btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    </div>
</nav>
<div class="navtop"></div>
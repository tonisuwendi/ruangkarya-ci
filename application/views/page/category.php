<?php
$setting = $this->db->get('settings')->row_array();
?>

<style>
    div.banner {
        background-image: url(<?= base_url(); ?>assets/images/bg/<?= $setting['banner']; ?>);
    }
</style>

<div class="banner">
    <div class="container">
        <h2><?= nl2br($setting['text']); ?></h2>
    </div>
</div>

<div class="wrapper">
    <h2 class="title">Kategori <?= $data['name']; ?></h2>
    <?php if($projects->num_rows() > 0){ ?>
    <div class="div main">
        <?php foreach($projects->result_array() as $p): ?>
        <a href="<?= base_url(); ?>project/<?= $p['slug']; ?>">
        <div class="item">
            <?php if($p['type'] == 3){ ?>
                <iframe src="https://www.youtube.com/embed/<?= $p['file']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php }else{ ?>
            <div class="thumb">
                <img src="<?= base_url(); ?>assets/images/projects/<?= $p['file'] ?>" alt="<?= $p['pName']; ?>">
            </div>
            <?php } ?>
            <div class="text">
                <h3 class="name"><?= $p['pName']; ?></h3>
                <a href="<?= base_url(); ?>categories/<?= $p['id']; ?>"><span class="category"><?= $p['name']; ?></span></a>
            </div>
        </div>
        </a>
        <?php endforeach; ?>
        <div class="clearfix"></div>
    </div>
    <br>
    <?php }else{ ?>
        <div class="alert alert-warning">Belum ada projek untuk kategori <?= $data['name']; ?></div>
    <?php } ?>
    <?= $this->pagination->create_links(); ?>
</div>
<?php
$setting = $this->db->get('settings')->row_array();
?>

<style>
    div.banner {
        background-image: url(<?= base_url(); ?>assets/images/bg/<?= $setting['banner']; ?>);
    }
</style>

<div class="banner"></div>

<div class="wrapper">
    <div class="content">
        <h2 class="title"><?= $project['pName']; ?></h2>
        <?php if($this->session->userdata('admin')){ ?>
            <a href="<?= base_url(); ?>administrator/project/<?= $project['pId'] ?>" class="btn float-right btn-info btn-sm"><i class="fa fa-pen"></i> Edit</a>
        <?php } ?>
        <?php
        $exp = explode(" ",$project['date_input']);
        $date = explode("-", $exp[0]);
        ?>
        <p class="date"><i class="far fa-clock"></i> <?= $date[2] . '-' . $date[1] . '-' . $date[0] ?></p>
        <a href="<?= base_url(); ?>categories/<?= $project['id']; ?>"><p class="category"><?= $project['name']; ?></p></a>
        <?php if($project['type'] == 3){ ?>
            <br>
            <iframe src="https://www.youtube.com/embed/<?= $project['file']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php }else{ ?>
            <img src="<?= base_url(); ?>assets/images/projects/<?= $project['file']; ?>" alt="<?= $project['pName']; ?>" class="clickFullScreenImg">
        <?php } ?>
        <p class="description">
            <?= nl2br($project['description']); ?>
        </p>
        <?php if($project['file2'] != ""){ ?>
            <?php foreach($file->result_array() as $f): ?>
                <hr>
                <img src="<?= base_url(); ?>assets/images/projects/<?= $f['name']; ?>" alt="<?= $project['pName']; ?>" class="clickFullScreenImg">
            <?php endforeach; ?>
        <?php } ?>
        <?php if($project['linkyt'] != ""){ ?>
            <br>
            <hr>
            <iframe src="https://www.youtube.com/embed/<?= $project['linkyt']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php } ?>
    </div>
    <div class="more">
        <h2 class="title">Projek Lainnya</h2>
        <hr>
        <?php foreach($projectMore->result_array() as $p): ?>
            <a href="<?= base_url(); ?>project/<?= $p['slug']; ?>">&bull; <?= $p['name']; ?></a>
        <?php endforeach; ?>
    </div>
</div>
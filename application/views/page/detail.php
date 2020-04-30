<div class="banner"></div>

<div class="wrapper">
    <div class="content">
        <h2 class="title"><?= $project['pName']; ?></h2>
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
        <p class="description"><?= $project['description']; ?></p>
    </div>
    <div class="more">
        <h2 class="title">Projek Lainnya</h2>
        <hr>
        <?php foreach($projectMore->result_array() as $p): ?>
            <a href="<?= base_url(); ?>project/<?= $p['slug']; ?>">&bull; <?= $p['name']; ?></a>
        <?php endforeach; ?>
    </div>
</div>
<div class="banner">
    <div class="container">
        <h2>TEMUKAN PULUHAN RIBU <br> TALENTA KREATIF INDONESIA</h2>
    </div>
</div>

<div class="wrapper">
    <h2 class="title">Projek Terbaru</h2>
    <div class="div main">
        <?php foreach($projects->result_array() as $p): ?>
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
                <span class="category"><?= $p['name']; ?></span>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
    </div>
    <br>
    <?= $this->pagination->create_links(); ?>
</div>
<h2><?= $title ?></h2>
<hr>
<div class="row">
    <?php foreach($filmes as $filme) : ?>
        <div class="col-md-3">
            <div class="text-center">
                <a href="<?php echo site_url('/filmes/'.$filme['slug']); ?>">
                    <img class="filme-thumb" src="<?php echo site_url(); ?>assets/images/filmes/<?php echo $filme['filme_image']; ?>" alt="<?php echo $filme['title']; ?>">
                    <div class="caption">
                        <h3><?php echo $filme['title']; ?></h3><br>
                    </div>            
                </a>         


   
            </div>
        </div>

    <?php endforeach; ?>
</div>
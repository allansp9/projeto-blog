<h2><?= $title ?></h2>
<div class="row">
    <?php foreach($posts as $post) : ?>
        <div class="col-md-3">
            <div class="thumbnail">
                <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="<?php echo $post['title']; ?>">
                <div class="caption">
                    <a href="<?php echo site_url('/posts/'.$post['slug']); ?>"><h3><?php echo $post['title']; ?></h3></a><br>
                    <small>Adicionado por: <?php echo $post['name']; ?></small>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>
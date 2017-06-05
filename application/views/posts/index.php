<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <h3><?php echo $post['title']; ?></h3>
    <div class="row">
        <div class="col-md-3">
            <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">   
        </div>
        <div class="col-md-9">
            <?php echo word_limiter($post['body'], 50); ?>
            <br><br>
            <p><a href="<?php echo site_url('/posts/'.$post['slug']); ?>">Leia mais...</a></p>    
        </div>
    </div>
<?php endforeach; ?>
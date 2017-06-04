<h2><?= $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
    <?php echo $post['body']; ?>
<div class="post-body">
    <?= $post['body']; ?>
</div>
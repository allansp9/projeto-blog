<h2><?= $post['title']; ?></h2>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">   

<div class="post-body">
    <?= $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-default pull-left">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger" />
</form>
<?php endif; ?>
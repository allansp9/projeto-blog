<div class="row">
    <div class="col-md-8">
        <h2><?= $post['title']; ?></h2>
        <img class="poster img-responsive" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="<?php echo $post['title']; ?>">   
    </div>
    
    <div class="post-body col-md-4">
        <h2>Descrição</h2>
        <?= $post['body']; ?>
    </div>
</div>    
    <div class="row">
        <?php if($this->session->userdata('user_id') == $post['user_id']): ?>
        <hr>
        <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-default pull-left">Edit</a>
        <?php echo form_open('/posts/delete/'.$post['id']); ?>
            <input type="submit" value="Delete" class="btn btn-danger" />
        </form>
        <?php endif; ?>
    </div>

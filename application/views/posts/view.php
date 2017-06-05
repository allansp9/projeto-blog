<div class="row">
    <div class="col-md-8">
        <h2><?= $post['title']; ?></h2>
        <img class="poster img-responsive" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="<?php echo $post['title']; ?>">   
    </div>
    
    <div class="post-body col-md-4">
        <h2>Descrição</h2>
        <?= $post['body']; ?>
        <hr>
        <h3>Comentários</h3>
        <?php if($comments) : ?>
            <?php foreach($comments as $comment) : ?>
                <div class="well">
                    <h5><?php echo $comment['body']; ?> <br><i class="pull-right">Por: <?php echo $comment['name']; ?></i></h5>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Seja o primeiro a comentar!</p>
        <?php endif; ?>
        <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open('comments/create/'.$post['id']); ?>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Comentário</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>"/>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
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

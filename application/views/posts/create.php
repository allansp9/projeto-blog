<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Adicionar titulo">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" id="" name="body" placeholder="Adicionar conteudo"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
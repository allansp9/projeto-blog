<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Adicionar titulo">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" id="editor1" name="body" placeholder="Adicionar conteudo"></textarea>
  </div>
  <div class="form-group">
    <label>Categoria</label>
    <select name="category_id" class="form-control" id="">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
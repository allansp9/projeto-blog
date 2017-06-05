<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('filmes/update'); ?>
    <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Adicionar titulo" value="<?php echo $filme['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" id="editor1" name="body" placeholder="Adicionar conteudo"><?php echo $filme['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Lista</label>
    <select name="lista_id" class="form-control" id="">
      <?php foreach($listas as $lista): ?>
        <option value="<?php echo $lista['id']; ?>"><?php echo $lista['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>
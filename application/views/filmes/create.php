<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('filmes/create'); ?>
  <div class="form-group">
    <label>Título</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Adicionar titulo" value="<?php echo set_value('title'); ?>">
  </div>
  <div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" id="editor1" name="body" placeholder="Adicionar conteudo" value="<?php echo set_value('email'); ?>"></textarea>
  </div>
  <div class="form-group">
    <label>Lista</label>
    <select name="lista_id" class="form-control" id="">
      <?php foreach($listas as $lista): ?>
        <option value="<?php echo $lista['id']; ?>"><?php echo $lista['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Enviar Imagem</label>
    <input type="file" name="userfile" size="20">
    
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
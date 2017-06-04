<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
    
    <div class="form-group">
        <labe>Nome</labe>
        <input type="text" name="name" class="form-control" placeholder="Digite um nome"/>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    
</form>
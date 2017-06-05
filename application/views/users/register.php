<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center"><?= $title; ?></h1>
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Nome" value="<?php echo set_value('name'); ?>">
            </div>
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" class="form-control" name="username" placeholder="Usuário" value="<?php echo set_value('username'); ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email"value="<?php echo set_value('email'); ?>">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <label>Confirmar Senha</label>
                <input type="password" class="form-control" name="password2" placeholder="Confirmar Senha">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </div>
    </div>    
<?php echo form_close(); ?>
<h2><?= $title; ?></h2>
<ul class="list-group">
    <?php foreach($listas as $lista) : ?>
        <li class="list-group-item"><a href="<?php echo site_url('/listas/filmes/'.$lista['id']); ?>"><?php echo $lista['name']; ?></a>
        <form class="cat-delete" action="listas/delete/<?php echo $lista['id']; ?>" metho="POST">
            
            <input type="submit" class="btn-link text-danger" value="[X]"/>
        </form>
            
        
        </li>
        
    <?php endforeach; ?>    
</ul>
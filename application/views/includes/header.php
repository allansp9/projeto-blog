<html>
<head>
    <meta charset="UTF-8">
    <title>ciBlog</title>
    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>about">About</a></li>
             <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="<?php echo base_url(); ?>posts/create">Criar Post</a></li> 
            
          </ul>
        </div>
      </div>
</nav>

<div class="container">
    

<html>
<head>
    <meta charset="UTF-8">
    <title>ciBlog</title>
    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
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
             <li><a href="categories">Categories</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          
            <li><a href="users/login">Login</a></li>
            <li><a href="users/register">Register</a></li>
          
          
            <li><a href="posts/create">Create Post</a></li>
            <li><a href="categories/create">Create Category</a></li>
            <li><a href="users/logout">Logout</a></li>

          </ul>
        </div>
      </div>
</nav>

<div class="container">
    

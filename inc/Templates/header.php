<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Saraha</title>
        <link rel="stylesheet" href="<?php echo $css . $pageStyle; ?>">
        <?php if(isset($fixed_footer)): ?>
            <style media="screen">
                .footer{
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                }
            </style>
        <?php endif; ?>
    </head>
    <body>
        <!--******************************
        *********************************
            1. Navbar                  *
        *********************************
        **********************************-->
        <div class="saraha">
            <div class="nav">
                <div class="container">
                    <h1 class="logo">S<span class="blue">a</span>r<span class="blue">a</span>h<span class="blue">a</span></h1>
                    <ul class="list">
                        <?php if(count($navbar) > 0): ?>
                            <?php foreach($navbar as $link): ?>
                                <li><a href="<?php echo $link['href']; ?>"><?php echo $link['name']; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

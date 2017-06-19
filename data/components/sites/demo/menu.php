<?php
$containerFluid = False;
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <?php 
        if ($containerFluid) {
            print '<div class="container-fluid">';
        } 
        else {
            print '<div class="container">';
        }
        ?>
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><?php print $siteName; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li <?php if ($paramPage == 'homepage'): print 'class="active"'; endif;?>><a href="?p=homepage">Home <span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Link A</a></li>
                <li><a href="#">Link B</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
            </li>
            <li <?php if ($paramPage == '#'): print 'class="active"'; endif;?>><a href="#">Link 1</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
            <input class="form-control" placeholder="Search" type="text">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li <?php if ($paramPage == '#'): print 'class="active"'; endif;?>><a href="#">Link Right</a></li>
        </ul>
        </div>
    </div> <!-- class container -->
</nav>

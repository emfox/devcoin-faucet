<?php
//ini_set("display_errors", 1);
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devcoin Faucet</title>
    <meta name="description" content="Devcoin Faucet">
    <meta name="Emfox Zhou" content="DVC">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- Bootstrap depend on jquery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>

  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="https://faucet.d.evco.in">Home</a>
        </div>
        <div>
          <ul class="nav navbar-nav" id="nav-list">
          <li><a href="/">Faucet</a></li>
          <?php if (is_admin()) echo '<li><a href="/server.php">Server</a></li>' ?>
          </ul>
          <script type="text/javascript">
            $("#nav-list").find("li").each(function () {
                var a = $(this).find("a:first")[0];
                if ($(a).attr("href") === location.pathname) {
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            });
          </script>
          <p class="navbar-text navbar-right small">
            Blockcount: <?php echo number_format($derp["blocks"]);?> 
            - Difficulty: <?php echo $derp['difficulty'];?> 
            - Estimate time of next round: <?php $varb = $derp["blocks"];
            $vart =1375479729+(time()-1375479729)*(ceil(($varb+1)/4000)*4000-100000)/($varb-100000);
            echo date('Y-m-d H:i:s',$vart);
            //block 100000 generated at unix time 1375479729
            ?>
          </p>
        </div>
      </div>
    </nav>
    <div class="container">
      <!-- END HEADER.PHP -->

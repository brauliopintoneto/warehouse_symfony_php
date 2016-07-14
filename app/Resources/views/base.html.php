<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>

 	<!-- Material Design fonts -->
  	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">  		
  	<!-- Bootstrap -->
  	<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bootstrap-material-design-master/dist/css/bootstrap.min.css')?>" >
  	<!-- Bootstrap Material Design -->
  	<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bootstrap-material-design-master/dist/css/bootstrap-material-design.css') ?>">

  	<!-- Bootstrap select -->
  	<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('node_modules/bootstrap-select/dist/css/bootstrap-select.css') ?>">
	
	<link rel="stylesheet" href="<?php echo $view['assets']->getUrl("node_modules/jquery-ui/themes/base/all.css")?>" >
	  
  	<!-- JQuery -->
  	<script type="text/javascript" src="<?php echo $view['assets']->getUrl('node_modules/jquery/jquery-3.1.0.js') ?>"></script>
  	<script type="text/javascript" src="<?php echo $view['assets']->getUrl('node_modules/jquery/jquery-ui.js') ?>"></script>
  	
  	<!-- Bootstrap select -->  	
	<script type="text/javascript" src="<?php echo $view['assets']->getUrl('node_modules/bootstrap-select/dist/js/bootstrap-select.js') ?>"></script>

	<style>
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		
		fieldset {
		    border: 0px solid transparent;
		}
	</style>
		
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('title', 'Hello Application') ?></title>
    </head>
    <body>
        <?php $view['slots']->output('_content') ?>
    </body>
</html>
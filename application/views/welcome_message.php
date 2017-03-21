<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<!-- Bootstrap -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
<h1><?php echo $page_header; ?>
 </h1>

	<div id="body">

<?php echo form_open(); ?>
<fieldset>

<!-- Form Name -->
<legend>
		<?php echo 'Round ';
					$c=0;
					foreach ($Round as $object) {
						if($c==1) break;
						echo $object->Round;
						$c++;
	}

	 ?></legend>


<!-- Select Tips For The Round -->
<?php
	$c=0;

	foreach ($Fixture as $object) {
		if ($c==0){
		$Margin = $MarginSelector;
	}elseif ($c!=0){
		$Margin = '';
		}
		echo '
		<div class="form-group">
		  <label class="col-md-4 control-label" for="selectbasic">Game '.$object->Game. ' '. $object->Home_Team.' V '.$object->Away_Team.' at '.$object->Ground.' '.$object->Time_EST . '</label>
		  <div class="col-md-4">
		    <select id="selectbasic" name="selectbasic" class="form-control">
		      <option value="1">'.$object->Home_Team.'</option>
		      <option value="2">'.$object->Away_Team.'</option>
		    </select>
		  </div>
		</div>'.
		$Margin;
		$c++;

	}

	 ?>
<!-- Button (Double) -->
<div class="form-group">
	<? echo form_submit(array('name'=>'Submit', 'class'=>'btn btn-success'),'Submit'); ?>
</div>

</fieldset>
<?php form_close(); ?>


	</div>

	<p class="footer">Pages rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

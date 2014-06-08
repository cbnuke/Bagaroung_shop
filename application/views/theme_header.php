<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Site for COOP SCI-KKU.">
<meta name="author" content="CBNUKE">
<?php echo css('bootstrap.css');?>
<?php echo css('bootstrap-responsive.css');?>
<?php echo css('jquery.ui.core.css');?>
<?php echo css('jquery.ui.datepicker.css');?>
<?php echo css('jquery.ui.theme.css');?>
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}

@media print {
	body {
		padding: 0px;
		font-size: 13px;
		line-height: 13px;
	}
	h1,h2,h3,h4,h5,h6 {
		margin-top: 14px;
		margin-bottom: 0px;
		font-family: inherit;
		font-weight: bold;
		line-height: 14px;
		color: inherit;
		text-rendering: optimizelegibility;
	}
	h3 {
		font-size: 26px;
		margin-bottom: 10px;
	}
	legend {
		margin-bottom: 0px;
		font-size: 13px;
		line-height: 13px;
		color: #333333;
		border: 0;
		border-bottom: 1px solid #e5e5e5;
	}
	label {
		font-size: 13px;
		line-height: 13px;
	}
	.well-large {
		padding: 8px;
	}
	.table {
		width: 90%;
		margin-top: 4px;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 14px;
	}
	.table th,.table td {
		padding: 2px;
		line-height: 17px;
		text-align: left;
		vertical-align: top;
		border-top: 1px solid #dddddd;
		text-align: left;
	}
}
</style>
	<?php echo js('jquery.js');?>
	<?php echo js('bootstrap.js');?>
	<?php echo js('jquery.ui.core.js');?>
	<?php echo js('jquery.ui.datepicker.js');?>
	<?php echo js('jquery.ui.datepicker-th.js');?>
	<?php echo js('jquery.ui.widget.js');?>
<script type="text/javascript"> 
	jQuery(window).load(function(){
		$("[data-toggle='tooltip']").tooltip();
  	});  
</script>
</head>
<body>
	<div class="navbar navbar-fixed-top hidden-print">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="brand" href="#">เม้งบริการชัยภูมิ</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li <?php if($page=='main')echo 'class="active"';?>><?php echo anchor('main','หน้าหลัก');?>
						</li>
						<li <?php if($page=='customers')echo 'class="active"';?>><?php echo anchor('customers','ลูกค้า');?>
						</li>
						<li <?php if($page=='products')echo 'class="active"';?>><?php echo anchor('products','สินค้า');?>
						</li>
						<li <?php if($page=='trade')echo 'class="active"';?>><?php echo anchor('trade','ซื้อขาย');?>
						</li>
						<li <?php if($page=='occasion')echo 'class="active"';?>><?php echo anchor('occasion','ส่งงวด');?>
						</li>
						<li <?php if($page=='confiscate')echo 'class="active"';?>><?php echo anchor('confiscate','ยึดคืน');?>
						</li>
						<li <?php if($page=='stock')echo 'class="active"';?>><?php echo anchor('stock','สต็อก');?>
						</li>
					</ul>
					<?php echo $form_login;?>
					<div class="input-prepend input-append" style="height: 40px;">
						<span class="add-on"><i class="icon-user"></i> </span> <span
							class="add-on"><?php echo $u_name;?> </span>
						<button class="btn" type="submit">ออกจากระบบ</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- container -->
	<div class="container">
		<?php
		
		if (isset ( $debug )) {
			print '<pre>';
			print_r ( $debug );
			print '</pre>';
		}
		?>
		<?php if(isset($alert))echo $alert;?>
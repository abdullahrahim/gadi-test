<?php 
/*
$dsn = 'mysql:dbname=gt_test;host=127.0.0.1';
	$pdo = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$query = "select * from table1";
	$sQuery = $pdo->prepare($query);
	$sQuery->execute();
	$ret = $sQuery->fetchAll(PDO::FETCH_ASSOC);
	print_r($ret);
	echo 'hello';*/
	
	require 'vendor/autoload.php';
	//
	$db = new AK\Db();
	//print_r($db->get_records());
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Example4 - Abdullah Rahim</title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=63e2c6d94b6d3d84d41a319bfecf7b5c">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=fed4abc50aa232e9a6137f9ba4127b7b">
	</script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fbasic_init%2Fzero_configuration.html" async>
	</script>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js">
	</script>
	
	<script type="text/javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable();
} );


	</script>
</head>
<body>
<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>User ID</th>
							<th>Username</th>
							<th>Login Time</th>
							<th>Server ID</th>
							<th>Table Name</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$records = $db->get_records();	
							if($records){
								foreach ($records as $r ){
								?>
								<tr>
							<td><?php echo $r['id']; ?></td>
							<td><?php echo $r['uid']; ?></td>
							<td><?php echo $r['username']; ?></td>
							<td><?php echo $r['log_in_time']; ?></td>
							<td><?php echo $r['server_id']; ?></td>
							<td><?php echo $r['tablename']; ?></td>
						</tr>
								
								<?php 
								}
							}
						?>
					</tbody>
					</table>
</body>

</html>
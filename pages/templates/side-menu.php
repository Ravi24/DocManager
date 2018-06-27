
<?php echo '
	<!DOCTYPE html>
	<html>'; 

require_once('head.php');
	?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php require_once('page-header.php');?>

  <!-- =============================================== -->

<?php require_once('page-side-menu.php');
  #<!-- Content Wrapper. Contains page content -->
 	require_once('page-content.php');
  #<!-- /.content-wrapper -->
	require_once('page-footer.php');
  #<!-- Control Sidebar -->
  require_once('page-control-sidebar.php'); ?>
  #<!-- /.control-sidebar -->
  #<!-- Add the sidebar's background. This div must be placed -->
  
</div>
<!-- ./wrapper -->




<?php require_once('page-jquery.php');?>
</body>
</html>

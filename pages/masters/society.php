<?php 
function pageContent(){
  $x = '<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Society Master</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frmSociety" method = "POST" action = "../../Classes/Society.php">
            <!-- ../../Classes/Society.php -->
              <div class="box-body">
                <div class="form-group">
                  <label for="txtSocietyCode" class="col-sm-2 control-label">Society Code</label>

                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" id="txtSocietyCode" name="txtSocietyCode" placeholder="Society Code"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txtSocietyName" class="col-sm-2 control-label">Society Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtSocietyName" name="txtSocietyName" placeholder="Society Name"/>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Activate Society
                      </label>
                      <span id="txtResponse" class=""></span>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-default">Cancel</button>
                <button type="button" id="btnCreateSociety" name="btnCreateSociety" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>';

  return $x;
}

 echo '
  <!DOCTYPE html>
  <html>'; 

require_once('../templates/head.php');
  ?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php require_once('../templates/page-header.php');?>

<?php require_once('../templates/page-side-menu.php');
#<!-- Content Wrapper. Contains page content -->
echo '
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Society Master
        <small>(Create/Modify Society)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li><a href="#">Society Master</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Society Master Data</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove" >
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">';?>
           <?php echo pageContent();?> 
         <?php echo' 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>';
  #<!-- /.content-wrapper -->
  require_once('../templates/page-footer.php');
  #<!-- Control Sidebar -->
  require_once('../templates/page-control-sidebar.php');
  #<!-- /.control-sidebar -->
  #<!-- Add the sidebar's background. This div must be placed -->
  
echo '</div>';
#<!-- ./wrapper -->

require_once('../templates/page-jquery.php'); ?>


<script type="text/javascript">

$(document).ready(function(){
  $("#btnCreateSociety").click(function(){
    var data = $("#frmSociety :input").serializeArray();
    $.post($("#frmSociety").attr("action"),data, function(info){
      $("#txtResponse").fadeIn(3000)
      $("#txtResponse").html(info);
      $("#txtResponse").fadeOut(3000)
      if(info.substring(0,5) == "Error"){
        $("#txtResponse").attr("Class","alert alert-danger pull-right");
      }
      else{
        $("#txtResponse").attr("Class","alert alert-success pull-right");        
      }
    });
    
  });

});

</script>
</body>
</html>

<?php 
function pageContent(){
  $x = '<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Document Manager</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frmDocCreate" method = "POST" action = "../../Classes/doc_manager_logic.php">
            <!-- ../../Classes/Society.php -->
              <div class="box-body">
                <div class="form-group">
                  <label for="txtDocMasterCode" class="col-sm-2 control-label">Mater Category</label>

                  <div id="divDocMasterCode" class="col-sm-10">
                    <input type="number" class="form-control" id="txtDocMasterCode" name="txtDocMasterCode" placeholder="Document Master Code" autofocus = "true"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txtDocSubCode" class="col-sm-2 control-label">Sub-Category</label>

                  <div id="divDocSubCode" class="col-sm-10">
                    <input type="number" class="form-control" id="txtDocSubCode" name="txtDocSubCode" placeholder="Document Category"/>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="txtGrowerCode" class="col-sm-2 control-label">Grower Code</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="txtGrowerCode" name="txtGrowerCode" placeholder="Grower Code"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txtRemarks" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                   
                    <textarea type="text" class="form-control" id="txtRemarks" name="txtRemarks" placeholder="Remarks" row="4" col="50"></textarea>
                    
                  </div>
                </div>

              </div><!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-default">Cancel</button>
               
                 <button type="button" id="btnSaveDoc" name="btnSaveDoc" class="btn btn-info pull-right">Save</button>
                
              </div>
              <div class = "panel-primary col-sm-5" id="availableOptionsBox" > 
                <div class="panel-heading">
                  <h3 class = "panel-title">Available Options</h3>
                </div>
                <div class="panel-body" id="availableOptions">
                  
                </div>

              </div>

              <div class = "panel-primary col-sm-6 pull-right" id="session_generated_doc" > 
                <div class="panel-heading">
                  <h3 class = "panel-title">Generated Documents in current session</h3>
                </div>
              <div class="panel-body" id="session_generated_docs">
                  
              </div>
                
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
        Cane Data Modifiction | Document Manager
        <small>(Document Number Generator)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Document Master</a></li>
        <li><a href="#">Docuement Manager</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Cane Documents</h3>

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
          <!-- Footer -->
           <span id="txtResponse" class=""></span>
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


<script type="text/javascript" src="../../js/doc_manager.js"></script>
</body>
</html>

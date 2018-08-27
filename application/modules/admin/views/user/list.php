<div class="dashboard_graph">
  <div class="x_panel">
    <div class="x_title">
      <h2><?php echo $esg->module['name'].' '.$esg->module['task'] ?></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
      </p>
      <button class="btn btn-success btn-sm" id="add_user"><i class="glyphicon glyphicon-plus"></i> Add User</button>
      <button class="btn btn-default btn-sm" id="reload_user"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
      <button class="btn btn-danger btn-sm" id="delete_user"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</button>
      <table id="user_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>
              <label><input type="checkbox" id="check-all"></label>
            </th>
            <th>username</th>
            <th>name</th>
            <th>role</th>
            <th>active</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
            	<div class="x_content">
                <?php
                echo form_open_multipart(base_url('admin/user/ajax_edit'),array(
                  'data-parsley-validate'=>'data-parsley-validate',
                  'class'=> 'form-horizontal form-label-left',
                  'id' => 'form'
                ));
                form($esg->field,'full');
                echo form_close();
                ?>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
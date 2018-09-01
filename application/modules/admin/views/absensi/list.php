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
      </p>
      <button class="btn btn-default btn-sm" id="reload_absensi"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
      <!-- <button class="btn btn-danger btn-sm" id="delete_user"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</button> -->
      <table id="absensi_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>nama</th>
            <th>kelas</th>
            <th>jam</th>
            <th>waktu</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
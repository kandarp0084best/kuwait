@include('admin.layouts.header')

<style type="text/css">
  table.table.table-bordered.table-striped.text-center tr th {
    background: #5C5CFF;
    color: #fff;
}
.tr_foo {
    background: #ffa50040 !important;
    color: orange;
    font-weight: 900;
}
.tr_foo_1 {
    background: #ffa50040 !important;
    color: #000;
    font-weight: 900;
}
.text-middle
{

  vertical-align : middle !important;
  text-align:center !important;

}
.avg_footer
{
  background: #ffae2dcc !important;
  color: #000;
  font-weight: 900;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employer</a></li>
        <!-- <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Employer filter</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
               <form onsubmit="return false" role="employer" name="employer_filter" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                   <label for="Year">Select Year:</label>
                   <select  class="form-control" name="year">
                      <option value='' selected="" disabled="">-- Select Year --</option>

                    <?php 
                       for($i = 2010 ; $i < date('Y'); $i++){
                          echo "<option value='".$i."'>$i</option>";
                       }
                    ?>
                      <option value='{{now()->year}}'>{{now()->year}}</option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="employer_filter">Submit</button>
            </div>
            </form>
          <!-- /.box -->

          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="row">
              <div class="col-md-12 text-center show-load" style="display: none;"><h3>Processing...</h3></div>
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div id="appendData" style="padding:10px;"></div>
              </div>
              <div class="col-md-3"></div>
            </div>
           
          </div>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

@include('admin.layouts.sidebar')
@include('admin.layouts.footer')
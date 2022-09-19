@include('admin.layouts.header')

<style type="text/css">
  table.table.table-bordered.table-striped tr th {
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
        Alumni
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumni</a></li>
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
              <h3 class="box-title">alumni filter</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="alumni_filter" method="post" onsubmit="return false">

            {{ csrf_field() }}

              <div class="box-body">
                <div class="form-group">
                  <label for="Departm">Departm ent:</label>
                  <select class="form-control" name="departm">
                    <option value="" disabled="" selected="">-- Departm ent --</option>
                    <option value="College">College</option>
                    <option value="Chemical">Chemical</option>
                    <option value="Computer">Computer</option>
                    <option value="Civil">Civil</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Industrial & Management Systems">Industrial</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Petroleum">Petroleum</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="years">Year:</label>
                   <select  class="form-control" name="year">
                      <option value='' selected="" disabled="">-- Select Year --</option>

                    <?php 
                       for($i = 2017 ; $i < date('Y'); $i++){
                          echo "<option value='".$i."'>$i</option>";
                       }
                    ?>
                    <option value='{{now()->year}}'>{{now()->year}}</option>
                  </select>
                </div>

                <!-- <div class="form-group">
                  <label for="years">Semester:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="semester" value="Fall">
                    <label class="form-check-label" >Fall</label>
                    &nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="semester" value="Spring">
                    <label class="form-check-label" >Spring</label>
                    &nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="semester" value="Summer">
                    <label class="form-check-label" >Summer</label>
                  </div>
                </div> -->

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="response" value="response"> Response
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="degrees" value="degrees"> Advanced Education and Certifications
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="employment" value="employment"> Employment
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="professional" value="professional"> Professional Societies
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="overall" value="overall"> Overall Preparation at Kuwait University
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="attainment" value="attainment"> Level of Attainment
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="all_checked" name="importance" value="importance"> Importance to Career
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="select_all" class="select_all" value="select_all"> Select All
                  </label>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="filter">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row (main row) -->

      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">alumni filter</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
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
<div class="content-wrapper">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'dd-mm-yy'  // Set format dd-mm-yyyy
    });
  });
  </script>
  <!-- page content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">  
        <div class="card">
          <div class="card-header">
            <h2><?php echo $title ?></h2>  
            <ul class="nav navbar-right panel_toolbox">
              <a href="<?php echo base_url('penjualan/reppdf/'.$periode) ?>"><li><button type="button" class="btn btn-success btn-sm mb-2"><i class="fa fa-plus m-1"></i> Download PDF</button></li></a>
            </ul>          
            <div class="clearfix"></div>
            <form id="applications" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <div class="form-group">                                                
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Periode<span class="required">*</span></label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class='input-group date'>
                            <input type="text" id="datepicker" name="periode" required="required" class="form-control col-md-7 col-xs-12" value="<?= isset($periode) ? $periode : '' ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 mt-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save m-1"></i> Update</button>                                    
                    </div>
                </div>
            </form>

          </div>
          <div class="card-body">
            <table id="inhouse" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Night</th>
                  <th>rate</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $lasttipe = '';
                  $jmldata = count($datapenjualan);
                  $total = 0;

                  for ($i = 0; $i < $jmldata; $i++) {   
                    if ($lasttipe == '' || $lasttipe != $datapenjualan[$i]['namatipe']) {
                      $subtotal = 0;
                      echo '<tr><td colspan="4"><strong>' . $datapenjualan[$i]['namatipe'] . '</strong></td></tr>';
                    }
                    $lasttipe = $datapenjualan[$i]['namatipe'];
                    $subtotal += $datapenjualan[$i]['nominal'];
                    $total += $datapenjualan[$i]['nominal'];
                    echo '<tr>';
                    echo '<td>' . $datapenjualan[$i]['checkin'] . '</td>';
                    echo '<td>' . $datapenjualan[$i]['duration'] . '</td>';
                    echo '<td align="right">' . number_format($datapenjualan[$i]['price']) . '</td>';
                    echo '<td align="right">' . number_format($datapenjualan[$i]['nominal']) . '</td>';
                    echo '</tr>';
                    if ($i < $jmldata - 1 && $datapenjualan[$i]['namatipe'] != $datapenjualan[$i + 1]['namatipe']) {
                      echo '<tr><td colspan="3"><strong>Sub Total</strong></td><td align="right"><strong>' . number_format($subtotal) . '</strong></td></tr>';                                     
                    }
                  }
                  if ($total > 0) {
                    echo '<tr><td colspan="3"><strong>Sub Total</strong></td><td align="right"><strong>' . number_format($subtotal) . '</strong></td></tr>';
                    echo '<tr><td colspan=5></td></tr>';
                    echo '<tr><td colspan="3"><strong>Total</strong></td><td align="right"><strong>' . number_format($total) . '</strong></td></tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>      
      </div>
    </div>
  </div>
</div>

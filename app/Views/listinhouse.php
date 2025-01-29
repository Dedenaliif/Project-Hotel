<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script>
$(function(){
    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("success") ?>'
        })
    <?php } ?>
});
$(function(){
    <?php if(session()->has("success2")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("success2") ?>'
        })
    <?php } ?>
});
</script>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5><div class="card-title"><?php echo $title ?></div></h5>
                    </div>
                    <div class="card-body">
                    <table id="inhouse" class="uk-table uk-table-hover uk-table-striped" style="width: 100%;">
							<thead>
								<tr>
                                    <th>Nama</th>
									<th>no kamar</th>
									<th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
                    </div>
                </div>
                </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
        
          <!-- Content wrapper -->
           <!-- Data Tables CSS -->
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
           <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.uikit.css">
           <!-- Data Tables JS -->
          <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit.min.js"></script>
          <script src=""></script>
          <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
          <script src="https://cdn.datatables.net/2.2.1/js/dataTables.uikit.js"></script>

<script>

var site_url = "<?php echo base_url('inhouse'); ?>";

$(document).ready( function () {

    $("#inhouse").DataTable({
        lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
        bProcessing: true,
        serverSide: true,
        scrollY: "400px",
        scrollCollapse: true,
        ajax: {
        url: site_url + "/ajaxloaddata", // json datasource
        type: "post",
        data: {}
        },
        columns: [        
        { data: "nama" },
        { data: "nokamar" },
        { data: "checkin" },
        { data: "checkout" },
        { data: "action" },
        ],
        columnDefs: [
        { orderable: false, targets: [0, 1, 2, 3] }
        ],
        bFilter: true, // to display datatable search
    });
});
</script>
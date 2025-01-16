
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">				
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $title ?></h2>						
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="inhouse" class="table table-striped table-bordered">
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
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

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
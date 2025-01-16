
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">				
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $title ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<a href="<?php echo base_url('tamu') ?>"><li><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Back</button></li></a>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table class="table table-striped table-bordered">						
							<tr>
								<th width="20%">Nama Tamu</th>
								<th><?php echo $datatamu->nama ?></th>									
							</tr>
							<tr>
								<th width="20%">Alamat</th>
								<th><?php echo $datatamu->alamat ?></th>									
							</tr>
							<tr>
								<th width="20%">Telp</th>
								<th><?php echo $datatamu->phone ?></th>									
							</tr>
							<tr>
								<th width="20%">Email</th>
								<th><?php echo $datatamu->email ?></th>									
							</tr>
						</table>
					</div>
					<div class="x_content">
						<table id="history" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Tipe Kamar</th>
									<th>No Kamar</th>
									<th>Night</th>
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

var site_url = "<?php echo base_url('tamu'); ?>";

$(document).ready( function () {
    $("#history").DataTable({
        lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
        bProcessing: true,
        serverSide: true,
        scrollY: "400px",
        scrollCollapse: true,
        "searching": false,
        ajax: {
        url: site_url + "/ajaxhistory/1", // json datasource
        type: "post",
        data: {}
        },
		columns: [        
		{ data: "checkin" },
		{ data: "namatipe" },
		{ data: "nokamar" },
		{ data: "duration" },
		],
        columnDefs: [
        { orderable: false, targets: [0, 1, 2, 3] }
        ],
        bFilter: true, // to display datatable search
    });
});
</script>
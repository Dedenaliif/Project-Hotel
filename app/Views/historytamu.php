<!-- historytamu.php -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?php echo $title ?></div>
                    <a href="<?php echo base_url('tamu') ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left m-1"></i>Back</a>
                </div>
                <div class="card-body">
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
                <div class="card-body">
                    <table id="history" class="uk-table uk-table-hover uk-table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Tipe Kamar</th>
                                <th>No Kamar</th>
                                <th>Night</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link CSS dan JS untuk DataTables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.uikit.css">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.uikit.js"></script>

<script>
var site_url = "<?php echo base_url('tamu'); ?>";
var idtamu = <?php echo $datatamu->id; ?>;

$(document).ready(function () {
    $("#history").DataTable({
        lengthMenu: [[10, 30, -1], [10, 30, "All"]], // page length options
        bProcessing: true,
        serverSide: true,
        scrollY: "400px",
        scrollCollapse: true,
        searching: false,
        ajax: {
            url: site_url + "/ajaxhistory/" + idtamu, // URL dengan ID tamu
            type: "post",
            data: {},
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
        bFilter: true, // untuk menampilkan pencarian di DataTables
    });
});
</script>

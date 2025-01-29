<!-- Load SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Load jQuery & jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
$(document).ready(function() {
    // SweetAlert2 untuk Notifikasi
    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("success") ?>'
        });
    <?php } elseif(session()->has("error")) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        });
    <?php } ?>

    // Datepicker dengan format d-m-Y
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true
    });

    // AJAX untuk mendapatkan harga kamar
    $("#idkamar").change(function() {
        var idkamar = $(this).val();
        if (idkamar) {
            $.ajax({
                url: "<?= base_url('checkin/getharga') ?>/" + idkamar,
                type: "GET",
                success: function(data) {
                    var hargaFormatted = new Intl.NumberFormat('id-ID').format(data); // Format ke IDR
                    $("#price").val(hargaFormatted);
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Tidak dapat mengambil harga kamar. Coba lagi!'
                    });
                }
            });
        }
    });

    // Validasi sebelum submit form
    $("form").submit(function(e) {
        if ($("#datepicker").val() === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Tanggal check-in wajib diisi!'
            });
            e.preventDefault();
        }
    });
});
</script>

<!-- Content -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5><div class="card-title"><?= $title ?></div></h5>
                </div>
                <div class="card-body">
                    <form id="applications" action="<?= $action; ?>" method="post">
                        <!-- Nama Tamu -->
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Nama Tamu <span class="required">*</span></label>
                            <div class="col-md-4">
                                <select name="idtamu" class="form-control" required>
                                    <option value="">Pilih Tamu</option>
                                    <?php foreach($listtamu as $l) { ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>  

                        <!-- Tanggal Checkin -->
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Check-in <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="text" id="datepicker" name="checkin" class="form-control" required value="<?= set_value('checkin') ?>">
                            </div>
                        </div>

                        <!-- No Kamar & Harga -->
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">No Kamar <span class="required">*</span></label>
                            <div class="col-md-4">
                                <select name="idkamar" id="idkamar" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php foreach($listkamar as $l) { ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nokamar'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" id="price" name="price" class="form-control mt-2" placeholder="Harga" readonly>
                            </div>
                        </div>

                        <!-- Durasi Menginap -->
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Durasi (Malam) <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="number" id="duration" name="duration" class="form-control" required min="1">
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?= $button ?></button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>

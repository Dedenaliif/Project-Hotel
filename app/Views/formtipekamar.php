<!-- Load jQuery dan SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.all.min.js"></script>

<!-- Form Input Tipe Kamar -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5><div class="card-title"><?php echo $title ?></div></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="row mb-3">
                            <label class="col-md-3">Kode Kamar *</label>
                            <div class="col-md-2">
                                <input type="hidden" name="idkamar" value="<?php echo $idkamar ?>">
                                <input type="text" id="kodekamar" name="kodekamar" required class="form-control" value="<?php echo $kodekamar; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Nama Tipe Kamar *</label>
                            <div class="col-md-3">
                                <input type="text" id="namatipe" name="namatipe" required class="form-control" value="<?php echo $namatipe; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Ukuran *</label>
                            <div class="col-md-2">
                                <input type="text" id="ukuran" name="ukuran" required class="form-control" value="<?php echo $ukuran; ?>">
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save m-1"></i> <?php echo $button ?></button>
                                <?php if (!empty($idkamar)) { ?>
                                    <button class="btn btn-danger delete" type="button" data-url="<?php echo base_url('tipekamar/delete/'.$idkamar) ?>">
                                        <i class="fa fa-trash m-1"></i> Hapus
                                    </button>
                                <?php } ?> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Delete dengan SweetAlert2 -->
<script>
    $(document).ready(function() {
        $('.delete').on('click', function() {
            var delete_url = $(this).data('url');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = delete_url;
                }
            });
        });
    });
</script>

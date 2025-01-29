<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.all.min.js"></script>

<!-- Form Input Tipe Kamar -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?php echo $title ?></div>
                </div>
                <div class="card-body">
                <form id="applications" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post">
                        <div class="row mb-3">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama<span class="required">*</span></label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="hidden" name="id" value="<?php echo $id ?>"> 
                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama; ?>">
                            </div>
                        </div>                         
                        <div class="row mb-3">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $alamat; ?>">
                            </div>
                        </div>      
                        <div class="row mb-3">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telpon <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">
                            </div>
                        </div>                                        
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save m-1"></i> <?php echo $button ?></button>
                                    <?php
                                        if (!empty($id)) { ?>
                                            <button class="btn btn-danger delete" type="button" data-url="<?php echo base_url('tamu/delete/'.$id) ?>"><i class="fa fa-trash m-1"></i> Delete</button>                                 									
                                    <?php } ?> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

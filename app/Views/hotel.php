<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</script>


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-6">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"><?php echo $title ?></h5>
                    </div>
                    <div class="card-body">
                    <form id="applications" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post">
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Hotel</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $nama ?>">
                          </div>
                        </div>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Alamat</label>
                          <div class="col-sm-10">
                            <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?php echo $alamat; ?>">
                          </div>
                        </div>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Telpon</label>
                          <div class="col-sm-10">
                            <input type="text" id="phone" name="phone" required="required" class="form-control" value="<?php echo $phone; ?>">
                          </div>
                        </div>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Email</label>
                          <div class="col-sm-10">
                          <input type="text" id="email" name="email" required="required" class="form-control" value="<?php echo $email; ?>">
                          </div>
                        </div>
                        <div class="form-group row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Jenis Penelitian</label>
                          <div class="col-sm-10">
                          <select name="bintang" class="select2_single form-control">
                          <option value="1" <?php if ($bintang=='1') echo 'Selected'; ?>>Bitang 1</option>
                          <option value="2" <?php if ($bintang=='2') echo 'Selected'; ?>>Bitang 2</option>
                          <option value="3" <?php if ($bintang=='3') echo 'Selected'; ?>>Bitang 3</option>
                          <option value="4" <?php if ($bintang=='4') echo 'Selected'; ?>>Bitang 4</option>
                          <option value="5" <?php if ($bintang=='5') echo 'Selected'; ?>>Bitang 5</option>
                          </select>
                          </div>
                        </div>
                       
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
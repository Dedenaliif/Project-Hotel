<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <!--/ Total Revenue -->
				<div class="row">
                
                    <div class="col-4">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="<?php echo base_url('public/assets/img/icons/unicons/paypal.png') ?>" alt="paypal" class="rounded">
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                            
                            </div>
                          </div>
                          <p class="mb-1">Total Kamar</p>
                          <h4 class="card-title mb-3"><?php echo $countkamar; ?></h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="<?php echo base_url('public/assets/img/icons/unicons/paypal.png') ?>" alt="paypal" class="rounded">
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                            </div>
                          </div>
                          <p class="mb-1">Total Tamu</p>
                          <h4 class="card-title mb-3"><?php echo $counttamu; ?></h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="<?php echo base_url('public/assets/img/icons/unicons/cc-primary.png') ?>" alt="Credit Card" class="rounded">
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                            </div>
                          </div>
                          <p class="mb-1">Pendapatan</p>
                          <h4 class="card-title mb-3">Rp. <?php echo number_format($totalpendapatan) ; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>
            
            </div>
            
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
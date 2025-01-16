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
                    <form id="applications" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hotel <span class="required">*</span></label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $alamat; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telpon <span class="required">*</span></label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Jenis Penelitian">Jenis Penelitian <span class="required">*</span></label>                               
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="bintang" class="select2_single form-control">
                                    <option value="1" <?php if ($bintang=='1') echo 'Selected'; ?>>Bitang 1</option>
                                    <option value="2" <?php if ($bintang=='2') echo 'Selected'; ?>>Bitang 2</option>
                                    <option value="3" <?php if ($bintang=='3') echo 'Selected'; ?>>Bitang 3</option>
                                    <option value="4" <?php if ($bintang=='4') echo 'Selected'; ?>>Bitang 4</option>
                                    <option value="5" <?php if ($bintang=='5') echo 'Selected'; ?>>Bitang 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>									
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


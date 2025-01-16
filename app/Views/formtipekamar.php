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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Kamar <span class="required">*</span></label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="hidden" name="idkamar" value="<?php echo $idkamar ?>"> 
                                <input type="text" id="kodekamar" name="kodekamar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kodekamar; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tipe Kamar <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" id="namatipe" name="namatipe" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $namatipe; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ukuran <span class="required">*</span></label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="ukuran" name="ukuran" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $ukuran; ?>">
                            </div>
                        </div>                        
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $button ?></button>
                            <?php
                                if (!empty($idkamar)) { ?>
                                    <button class="btn btn-danger delete" type="button" data-url="<?php echo base_url('tipekamar/delete/'.$idkamar) ?>"><i class="fa fa-trash"></i> Delete</button>                                 									
                            <?php } ?> 
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

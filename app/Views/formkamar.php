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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Kamar<span class="required">*</span></label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="hidden" name="id" value="<?php echo $id ?>"> 
                                <input type="text" id="nokamar" name="nokamar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nokamar; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Publikasi">Publikasi <span class="required">*</span></label>                               
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name='idtipekamar' class="select2_single form-control">
                                    <?php
                                        foreach($listtipekamar as $l)
                                        {
                                            if ($l['idkamar']==$idtipekamar) $select = ' selected'; else $select='';
                                            echo '<option value="'.$l['idkamar'].'" '.$select.'>'.$l['namatipe'].'</option>';
                                        }
                                    ?>                                                                        
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Price <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $price; ?>">
                            </div>
                        </div>      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Allotment <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" id="allotment" name="allotment" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $allotment; ?>">
                            </div>
                        </div>                                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $button ?></button>
                                    <?php
                                        if (!empty($id)) { ?>
                                            <button class="btn btn-danger delete" type="button" data-url="<?php echo base_url('kamar/delete/'.$id) ?>"><i class="fa fa-trash"></i> Delete</button>                                 									
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

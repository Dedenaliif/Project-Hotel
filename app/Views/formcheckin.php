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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Publikasi">Nama Tamu <span class="required">*</span></label>                               
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name='idtamu' class="select2 form-control">
                                    <?php
                                        foreach($listtamu as $l)
                                        {                                            
                                            echo '<option value="'.$l['id'].'">'.$l['nama'].'</option>';
                                        }
                                    ?>                                                                        
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group">												
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Checkin<span class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class='input-group date'>
                                    <input type="text" id="checkin" name="checkin" required="required" class="form-control col-md-7 col-xs-12" value="">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Publikasi">No Kamar <span class="required">*</span></label>                               
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <select onchange="checkrate()" name='idkamar' id="idkamar" class="select2 form-control">
                            <option>Pilih</option>
                                <?php
                                    foreach($listkamar as $l)
                                    {                                            
                                        echo '<option value="'.$l['id'].'">'.$l['nokamar'].'</option>';
                                    }
                                ?>                                                                        
                            </select>
                                <input type="text" id="price" name="price" class="form-control col-md-7 col-xs-12" placeholder="price" value="" readonly>
                            </div>
                        </div>  
                        <div class="form-group">												
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Durasi<span class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class='input-group'>
                                    <input type="text" id="duration" name="duration" required="required" class="form-control col-md-7 col-xs-12" value="">
                                    <span class="input-group-addon">
                                        <span> night</span>
                                    </span>
                                </div>
                            </div>
                        </div>                                                                                       
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $button ?></button>                                    
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

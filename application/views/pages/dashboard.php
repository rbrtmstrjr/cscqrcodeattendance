
<section class="content">
    <div class="container-fluid">
    	<div class="row-clearfix">
            <?php if($this->session->flashdata('success')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('success').'</p>'; ?>
                    </div>
            <?php endif; ?>
            <div class="col-md-9">
                <img src="<?php echo base_url(); ?>assets/skin/images/wew.png" class="img-responsive" >
            </div>
    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons col-lime">equalizer</i>
                    </div>
                    <div class="content">
                        <div class="text">RECENTLY SCANNED</div>
                    <div class="number">10</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons col-lime">favorite</i>
                    </div>
                    <div class="content">
                        <div class="text">SUCCESSFULLY PAID</div>
                    <div class="number">
                        <?php
                        $query = $this->db->query('SELECT * FROM students_data WHERE status = 1');
                        echo $query->num_rows();
                        ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons col-lime">face</i>
                    </div>
                    <div class="content">
                        <div class="text">ENROLLED STUDENTS</div>
                    <div class="number">
                        <?php
                        $query = $this->db->query('SELECT * FROM students_data');
                        echo $query->num_rows();
                        ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons col-lime">bookmark</i>
                    </div>
                    <div class="content">
                        <div class="text">EVENTS CREATED</div>
                    <div class="number">
                        <?php
                        $query = $this->db->query('SELECT * FROM csc_events');
                        echo $query->num_rows();
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-6">
                    <div id="printableArea">
                    <div class="card bg">
                        </br>
                        </br>
                        </br>
                        </br>
                        
                        <div class="body">
                             <img src="<?php echo base_url(); ?>assets/skin/images/<?php echo $fetch_data['student_image']; ?>" width="130px" height="130px"  style="border: 4px solid #fff;">
                             <img src="<?php echo base_url(); ?>render/QRcode/<?php echo $fetch_data['school_id']; ?>" width="130px" height="130px"  style="border: 4px solid #fff;" class="pull-right">
                            <h4><?php echo $fetch_data['first_name']." ".$fetch_data['last_name']; ?></h4>
                            <p><?php echo $fetch_data['course']." ".$fetch_data['year']; ?></p>
                            <p><?php echo $fetch_data['school_id'];?></p>
                        </div>
                    </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>About <?php echo $fetch_data['first_name']; ?></h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Address
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch_data['address'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">home</i>
                                        Boarding House
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch_data['boarding_house'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">phone</i>
                                        Contact No.
                                    </div>
                                    <div class="content">
                                        <?php echo "+63".$fetch_data['students_contact'];?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn bg-blue-grey" onclick="printDiv('printableArea')">Print CSC Card</a>
                <!-- #END# Badges -->
            </div>
        </div>
    </section>
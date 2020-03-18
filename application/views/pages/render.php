 <section class="content">
	<div class="container-fluid">

        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php if($this->session->flashdata('add_students')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('add_students').'</p>'; ?>
                    </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('add_course')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('add_course').'</p>'; ?>
                    </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('add_major')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('add_major').'</p>'; ?>
                    </div>
            <?php endif; ?>
                    <div class="card">
                        <div class="header">
                            <h2>
                            STUDENTS DATA
                            <small>This contains all the students data and thier personal information</small></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Add New Students</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#addcourse">Add New Program</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#addmajor">Add New Major</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>IMAGE</th>
                                            <th>QR CODE</th>
                                            <th>NAME</th>
                                            <th>COURSE</th>
                                            <th>YEAR</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fetch_data as $data): ?>
                                            <tr>
                                                <td><?php echo $data['school_id']; ?></td>
                                                <td>
                                                    <img src="<?php echo base_url(); ?>assets/skin/images/<?php echo $data['student_image']; ?>" width="70px" height="70px">
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url('render/QRcode/'.$data['school_id']); ?>" height="70px">
                                                <td><?php echo $data['first_name']."&nbsp".$data['last_name']; ?></td>
                                                <td><?php echo $data['course']; ?></td>
                                                <td><?php echo $data['year']." - ".$data['section']; ?></td>
                                                </td>
                                                <td>
                                                    <div class="btn-group bg-grey" role="group">
                                                    <a href="<?php echo site_url('/render/'.$data['school_id']); ?>" class="btn waves-effect"><i class="material-icons">remove_red_eye</i></a>
                                                    <a href="<?php echo site_url('/render/viewdata/'.$data['school_id']); ?>" class="btn"><i class="material-icons">timeline</i></a>
                                                    <a href="#" data-toggle="modal" data-target="#<?php echo $data['id']; ?>" class="btn"><i class="material-icons">edit</i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

            <!-- ADD NEW STUDENTS -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title">REGISTRATION FORM</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="form_advanced_validation" action="<?php echo base_url(); ?>students/register" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <center>
                                    <div class="upload-btn-wrapper">
                                        <button class="meowbtn">Select Profile Image</button>
                                        <input type="file" name="userfile" size="20" />
                                    </div>
                                    </center>
                                    <div class="col-md-12">
                                        <label for="id">ID No.</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="number" name="id_num" class="form-control" placeholder="Enter ID No." required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="first_name">First Name</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label for="course">Course</label>
                                        <select name="course" class="form-control show-tick">
                                            <?php foreach($get_data as $data): ?>
                                                <option><?php echo $data['course']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="year">Year</label>
                                        <select name="year" class="form-control show-tick">
                                            <option>1st</option>
                                            <option>2nd</option>
                                            <option>3rd</option>
                                            <option>4th</option>
                                            <option>5th</option>                                       
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="year">Section</label>
                                        <select name="section" class="form-control show-tick">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>                                
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="year">Major</label>
                                        <select name="major" class="form-control show-tick">
                                            <option>None</option>
                                            <?php foreach($get_major as $data): ?>
                                                <option><?php echo $data['major']; ?></option>
                                            <?php endforeach; ?>                               
                                        </select>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <label for="address">Address</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="text" name="address" class="form-control" placeholder="Enter Permanent Address" required>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label for="boarding_house">Boarding House</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="text" name="boarding_house" class="form-control" placeholder="Optional" required>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <label for="contact">Contact No.</label>
                                        <div class="form-group">
                                            <div class="form-line success">
                                                <input type="number" name="contact" class="form-control" placeholder="Enter contact no." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" value="ADD">
                            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addcourse" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title" id="defaultModalLabel">Add New Programme</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url(); ?>students/add_program">
                           <div class="form-group">
                            <label>Programme Name</label>
                                <div class="form-line success">
                                    <input type="text" name="course" class="form-control" placeholder="Add new program" required>
                                </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" value="SAVE">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addmajor" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title" id="defaultModalLabel">Add New Major</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url(); ?>students/add_major">
                           <div class="form-group">
                            <label>Major Name</label>
                                <div class="form-line success">
                                    <input type="text" name="major" class="form-control" placeholder="Add new major" required>
                                </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" value="SAVE">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            
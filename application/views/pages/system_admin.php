    <section class="content">
        <div class="container-fluid">
            
           

            <div class="row clearfix">
            <!-- alerts -->
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <?php if($this->session->flashdata('add_admin')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('add_admin').'</p>'; ?>
                    </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('edit_admin')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('edit_admin').'</p>'; ?>
                    </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('delete_admin')): ?>
                <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('delete_admin').'</p>'; ?>
                    </div>
            <?php endif; ?>
            </div>
            <!-- alerts -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               SYSTEM ADMIN
                               <small>This admin has only have the permission to use the csc app scanner.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Add New Admin</a></li>
                                        <li><a href="<?php echo base_url(); ?>system_admin/reset_settings">Reset System Settings</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php if(empty($fetch_data->result())){
                                    echo '<label>No admin found</label>';
                                    }
                                ?>
                                <?php foreach($fetch_data->result() as $row): ?>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="card profile-card">
                                        <div class="profile-header">&nbsp;</div>
                                        <div class="profile-body">
                                            <div class="image-area">
                                                <img src="<?php echo base_url(); ?>assets/skin/images/no_images.png" height="100px"/>
                                            </div>
                                            <div class="content-area">
                                                 <h4 class="col-teal"><?php echo $row->name; ?></h4>
                                                 <h4><?php echo $row->position; ?></h4>
                                                 <p><?php echo $row->username; ?></p>
                                                 <hr>
                                                <div class="btn-group">
                                                <a href="#" data-toggle="modal" data-target="#<?php echo $row->id; ?>" class="btn bg-grey"><i class="material-icons">edit</i></a>
                                                <a href="<?php echo site_url('System_admin/delete_admin/'.$row->id); ?>" class="btn bg-red"><i class="material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- edit modal -->
                                <div class="modal fade" id="<?php echo $row->id; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-pink">
                                                    <h4 class="modal-title" id="defaultModalLabel">EDIT ADMIN</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo base_url(); ?>system_admin/edit_admin">
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                        <label for="id">Username</label>
                                                            <div class="form-group">
                                                                <div class="form-line success">
                                                                <input type="text" value="<?php echo $row->username; ?>" name="username" class="form-control" placeholder="Enter username" required>
                                                                </div>
                                                            </div>
                                                        <label for="id">Password</label>
                                                            <div class="form-group">
                                                                <div class="form-line success">
                                                                <input type="password" name="password" class="form-control" placeholder="Enter password" max-length="4" required>
                                                                </div>
                                                            </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-link waves-effect" value="SAVE">
                                                    <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of modal -->
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="defaultModalLabel">ADD NEW ADMIN</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url(); ?>system_admin/add_admin">
                                <label for="id">Name</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                <label for="id">Position</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                        <input type="text" name="position" class="form-control" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                <label for="id">Username</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                                        </div>
                                    </div>
                                <label for="id">Password</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
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
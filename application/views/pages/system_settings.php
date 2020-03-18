
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPDATE SYSTEM'S LOGIN PASSWORD
                                <small>This contains all the events and schedules of every program.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" action="update_password" class="form-horizontal">
                                <div class="form-group">
                                    <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                        <div class="col-sm-9">
                                            <div class="form-line success">
                                            <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                            </div>
                                            <span class="col-red"><?php echo form_error('OldPassword'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-9">
                                            <div class="form-line success">
                                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                            </div>
                                            <span class="col-red"><?php echo form_error('NewPassword'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                        <div class="col-sm-9">
                                            <div class="form-line success">
                                            <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                            </div>
                                            <span class="col-red"><?php echo form_error('NewPasswordConfirm'); ?></span>
                                        </div>
                               </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <input type="submit" class="btn btn-danger" value="UPDATE">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                RESET SYSTEM SETTINGS
                                <small>This contains all the events and schedules of every program.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="OldPassword" class="col-sm-3 control-label">Events Created</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="mycheck" id="md_checkbox_21" class="filled-in chk-col-red" value="1" <?php echo set_checkbox('mycheck', '1'); ?> />
                                            <label for="md_checkbox_21">This contains all the Events Admin created for every semester.</label>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPassword" class="col-sm-3 control-label">Attendance Record</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="mycheck" id="md_checkbox_22" class="filled-in chk-col-red" value="2" <?php echo set_checkbox('mycheck', '2'); ?> />
                                            <label for="md_checkbox_22">Contains all the record of Students Attendance every event.</label>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">System Admin</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="mycheck" id="md_checkbox_23" class="filled-in chk-col-red" value="3" <?php echo set_checkbox('mycheck', '3'); ?> />
                                            <label for="md_checkbox_23">This are the Officers that have authorize to use the Application Scanner.</label>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">Students Data</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="mycheck" id="md_checkbox_25" class="filled-in chk-col-red" value="4" <?php echo set_checkbox('mycheck', '4'); ?> />
                                            <label for="md_checkbox_25" class="col-red">Please make sure that you already backup this data before resetting. Otherwise this action cannot be undo!</label>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-danger"  onclick="checked">RESET</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </section>
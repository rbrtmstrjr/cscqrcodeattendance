
    <section class="content">
        <div class="container-fluid">
    	    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ATTENDANCE RECORD
                                <small>This contains all the records attended by the student.</small>
                            </h2>
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th rowspan="1">ID.</th>
                                            <th rowspan="1">Event Name</th>
                                            <th rowspan="1">Event Date</th>
                                            <th colspan="2" scope="colgroup" class="text-center">Morning</th>
                                            <th colspan="2" scope="colgroup" class="text-center">Afternoon</th>
                                            <th colspan="2" scope="colgroup" class="text-center">Evening</th>
                                            <th rowspan="1">Scan By</th>
                                        </tr>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">In</th>
                                            <th scope="col">Out</th>
                                            <th scope="col">In</th>
                                            <th scope="col">Out</th>
                                            <th scope="col">In</th>
                                            <th scope="col">Out</th>
                                            <th scope="col"></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fetch_data->result() as $data): ?>
                                        <tr>
                                            <td><?php echo $data->student_id; ?></td>
                                            <td><?php echo $data->event_name; ?></td>
                                            <td><?php echo $data->attendance_date; ?></td>
                                            
                                            <?php if($data->morning_in && $data->morning_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->morning_in_time.'</td>';
                                                }
                                            ?>
                                            
                                            <?php if($data->morning_out && $data->morning_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->morning_out_time.'</td>';
                                                }
                                            ?>
                                            <?php if($data->afternoon_in && $data->afternoon_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->afternoon_in_time.'</td>';
                                                }
                                            ?>
                                            <?php if($data->afternoon_out && $data->afternoon_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->afternoon_out_time.'</td>';
                                                }
                                            ?>
                                            <?php if($data->evening_in && $data->evening_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->evening_in_time.'</td>';
                                                }
                                            ?>
                                            <?php if($data->evening_out && $data->evening_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                                {
                                                    echo '<td><span class="badge bg-grey">No Event</span></td>';
                                                }
                                                else{
                                                    echo '<td>'.$data->evening_out_time.'</td>';
                                                }
                                            ?>
                                            <td><?php echo $data->scan_by; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
	   </div>
    </section>

            <!-- Creating New Events Modal-->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-grey">
                            <h4 class="modal-title" id="defaultModalLabel">CREATE NEW EVENTS</h4>
                        </div>
                        <form  method="POST" action="<?php echo base_url(); ?>schedule/add_schedule">
                        <div class="modal-body">
                            <label>Note: Please leave it blank if its doesnt have specific time event to be attended. :)</label>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Events Name</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="text" name="events_name" class="form-control" placeholder="Enter Events Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Events Date</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="date" name="events_date" class="form-control"  value="<?php echo date('Y-m-d'); ?>" placeholder="Please choose a date..." disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Morning In</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="morning_in" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="morning_in_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Morning Out</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="morning_out" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="morning_out_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Afternoon In</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="afternoon_in" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="afternoon_in_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Afternoon Out</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="afternoon_out" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="afternoon_out_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Evening In</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="evening_in" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="evening_in_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Evening Out</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="evening_out" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Stop</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="evening_out_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>In Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="in_penalty" class="form-control" placeholder="In Peso" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Out Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="out_penalty" class="form-control" placeholder="In Peso" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" value="START EVENT">
                            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
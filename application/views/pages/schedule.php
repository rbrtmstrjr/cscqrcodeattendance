
    <section class="content">
        <div class="container-fluid">
    	    <div class="row clearfix">
                
                    <?php if($this->session->flashdata('schedule')): ?>
                    <div style="background-color:#8dad16;" class="alert alert-dismissible animated rubberBand" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('schedule').'</p>'; ?>
                        </div>
                    <?php endif; ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EVENTS AND SCHEDULE
                                <small>This contains all the events and schedules of every program.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Add New Events</a></li>
                                        <li><a href="javascript:void(0);" onclick="printDiv('printableArea')">Print All Events</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div id="printableArea">
                        <div class="body table-responsive">
                            <table class="table table-bordered" id="myTable">
                              <tr>
                                <th rowspan="1">Event Name</th>
                                <th rowspan="1">Event Date</th>
                                <th colspan="2" scope="colgroup" class="text-center">Morning</th>
                                <th colspan="2" scope="colgroup" class="text-center">Fines</th>
                                <th colspan="2" scope="colgroup" class="text-center">Afternoon</th>
                                <th colspan="2" scope="colgroup" class="text-center">Fines</th>
                                <th colspan="2" scope="colgroup" class="text-center">Evening</th>
                                <th colspan="2" scope="colgroup" class="text-center">Fines</th>
                              </tr>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                              </tr>
                               <?php if(empty($fetch_data)){
                                        echo '<tr><td colspan="2">No events found</td></tr>';
                                    }
                                ?>
                              <?php foreach($fetch_data as $data): ?>
                              <tr>
                                    <th><?php  echo $data->event_name; ?></th>
                                    <td><?php  echo $data->event_date; ?></td>

                                    <?php if($data->morning_in && $data->morning_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->morning_in." - ".$data->morning_in_stop.'</td>';
                                    }
                                    ?>
                                    
                                    <?php if($data->morning_out && $data->morning_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->morning_out." - ".$data->morning_out_stop.'</td>';
                                    }
                                    ?>
                                    <td><?php  echo $data->morning_in_penalty; ?></td>
                                    <td><?php  echo $data->morning_out_penalty; ?></td>
                                    <?php if($data->afternoon_in && $data->afternoon_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->afternoon_in." - ".$data->afternoon_in_stop.'</td>';
                                    }
                                    ?>

                                    <?php if($data->afternoon_out && $data->afternoon_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->afternoon_out." - ".$data->afternoon_out_stop.'</td>';
                                    }
                                    ?>
                                    <td><?php  echo $data->afternoon_in_penalty; ?></td>
                                    <td><?php  echo $data->afternoon_out_penalty; ?></td>
                                    <?php if($data->evening_in && $data->evening_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->evening_in." - ".$data->evening_in_stop.'</td>';
                                    }
                                    ?>

                                    <?php if($data->evening_out && $data->evening_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        echo '<td>'.$data->evening_out." - ".$data->evening_out_stop.'</td>';
                                    }
                                    ?>
                                    <td><?php  echo $data->evening_in_penalty; ?></td>
                                    <td><?php  echo $data->evening_out_penalty; ?></td>
                              </tr>
                              <?php endforeach; ?>
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
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="defaultModalLabel">CREATE NEW EVENTS</h4>
                        </div>
                        <form  method="POST" action="<?php echo base_url(); ?>schedule/add_schedule">
                        <div class="modal-body">
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
                                    <label>Cut Off</label>
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
                                    <label>Cut Off</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="morning_out_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Morning In Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="morning_in_penalty" class="form-control" placeholder="Enter Amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Morning Out Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="morning_out_penalty" class="form-control" placeholder="Enter Amount" required>
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
                                    <label>Cut Off</label>
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
                                    <label>Cut Off</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="time" name="afternoon_out_stop" class="form-control" placeholder="Please choose a time...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Afternoon In Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="afternoon_in_penalty" class="form-control" placeholder="Enter Amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Afternoon Out Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="afternoon_out_penalty" class="form-control" placeholder="Enter Amount" required>
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
                                    <label>Cut Off</label>
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
                                    <label>Cut off</label>
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
                                            <input type="number" name="evening_in_penalty" class="form-control" placeholder="Enter Amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Out Penalty</label>
                                    <div class="form-group">
                                        <div class="form-line success">
                                            <input type="number" name="evening_out_penalty" class="form-control" placeholder="Enter Amount" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php
                            $result = $this->db->query('SELECT * FROM csc_events WHERE event_date = DATE(now())');
                            if ($result->num_rows() == 0)
                            {
                                echo '<input type="submit" class="btn btn-link waves-effect" value="START EVENT">';
                            }
                            else{
                                 echo '<input type="submit" class="btn btn-link waves-effect" value="START EVENT" disabled>';
                            }
                            ?>
                            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
                        </div> 
                        </form>
                    </div>
                </div>
            </div>


            
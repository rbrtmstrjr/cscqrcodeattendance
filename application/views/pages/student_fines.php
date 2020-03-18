
<section class="content">
    <div class="container-fluid">
    	<div class="row-clearfix">
    		<div class="col-xs-12 col-sm-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                PROGRAM ATTENDANCE
                                <small>This contains all the schedule, fines and events attended by the following students.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" data-toggle="modal" data-target="#fines">Paid Account</a></li>
                                        <li><a href="javascript:void(0);" onclick="printDiv('printableArea')">Print Account</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div id="printableArea">
                        <div class="body table-responsive">
                            <img src="<?php echo base_url(); ?>assets/skin/images/<?php echo $hey['student_image']; ?>" width="92px" height="92px">
                            <img src="<?php echo base_url('render/QRcode/'.$hey['school_id']); ?>" width="100px" height="100px">
                            <p class="font-20"><?php echo $hey['school_id']." - ".strtoupper($hey['first_name'])." ".strtoupper($hey['last_name']); ?></p>
                            <table class="table table-bordered">
                              <tr>
                                <th rowspan="1">Event Name</th>
                                <th rowspan="1">Event Date</th>
                                <th colspan="2" scope="colgroup" class="text-center">Morning</th>
                                <th colspan="2" scope="colgroup" class="text-center">Afternoon</th>
                                <th colspan="2" scope="colgroup" class="text-center">Evening</th>
                                <th rowspan="1">Scan By</th>
                                <th rowspan="1">Fines</th>
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
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            <?php foreach($fetch_data->result() as $data): ?>
                                <tr>

                                    <th><?php echo $data->event_name; ?></th>
                                    <td><?php echo $data->attendance_date; ?></td>

                                <?php if($data->morning_in && $data->morning_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        if($data->morning_in_time > $data->morning_in && $data->morning_in_time < $data->morning_in_stop)
                                            {

                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>
                                            
                                <?php if($data->morning_out && $data->morning_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        if($data->morning_out_time > $data->morning_out && $data->morning_out_time < $data->morning_out_stop)
                                            {
                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>
                                            
                                <?php if($data->afternoon_in && $data->afternoon_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        if($data->afternoon_in_time > $data->afternoon_in && $data->afternoon_in_time < $data->afternoon_in_stop)
                                            {
                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>

                                <?php if($data->afternoon_out && $data->afternoon_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }     
                                    else{

                                        if($data->afternoon_out_time > $data->afternoon_out && $data->afternoon_out_time < $data->afternoon_out_stop)
                                            {
                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>

                                <?php if($data->evening_in && $data->evening_in_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        if($data->evening_in_time > $data->evening_in && $data->evening_in_time < $data->evening_in_stop)
                                            {
                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>
                                
                                <?php if($data->evening_out && $data->evening_out_stop == date("H:i:s", mktime(0, 0, 0)))
                                    {
                                        echo '<td><span class="badge bg-grey">No Event</span></td>';
                                    }
                                    else{
                                        if($data->evening_out_time > $data->evening_out && $data->evening_out_time < $data->evening_out_stop)
                                            {
                                                echo '<td><span class="badge bg-green">Attended</span></td>';
                                            }
                                        else{
                                            echo '<td><span class="badge bg-pink">&nbsp&nbspAbsent&nbsp&nbsp</span></td>';
                                            }
                                    }
                                ?>
                                    <td><?php echo $data->scan_by; ?></td>
                                    <?php
                                    $total_count = $data->morning_in_fines+$data->morning_out_fines+$data->afternoon_in_fines+$data->afternoon_out_fines+$data->evening_in_fines+$data->evening_out_fines;
                                    ?>
                                    <td><?php echo $total_count; ?></td>
                                </tr>
                            
                            <?php endforeach; ?>
                            <tr>
                                <td rowspan="1">Status:</td>
                                <?php if($hey['status'] == 0)
                                {
                                    echo '<td rowspan="1"><span class="badge bg-red">&nbsp&nbspUnpaid&nbsp&nbsp</span></td>';
                                }
                                else{
                                    echo '<td rowspan="1"><span class="badge bg-blue">&nbsp&nbsp&nbsp&nbspPaid&nbsp&nbsp&nbsp&nbsp</span></td>';
                                }
                                ?>
                                <td colspan="6" scope="colgroup"></td>
                                <td colspan="1">Total Fines:</td>
                                <?php
                                $hayys = $hey['school_id'];
                                $query = $this->db->query('SELECT sum(morning_in_fines) as morning_in, sum(morning_out_fines) as morning_out, sum(afternoon_in_fines) as afternoon_in, sum(afternoon_out_fines) as afternoon_out, sum(evening_in_fines) as evening_in, sum(evening_out_fines) as evening_out FROM payment WHERE payment_id = '.$hayys.'');
                                foreach ($query->result() as $row)
                                {
                                    $meow = $row->morning_in+$row->morning_out+$row->afternoon_in+$row->afternoon_out+$row->evening_in+$row->evening_out;
                                    echo '<th rowspan="1">'.$meow.'</th>';
                                }
                                ?>
                              </tr>
                              <tr>
                                <td rowspan="1">Deduction:</td>
                                <?php 
                                echo '<th rowspan="1">'.$hey['deduction'].'</th>';
                                ?>
                                <td colspan="6" scope="colgroup"></td>
                                <td colspan="1">Payment:</td>
                                <?php 
                                echo '<th rowspan="1">'.$hey['initial_payment'].'</th>';
                                ?>
                              </tr>
                              <tr>
                                <td rowspan="1">Paid By:</td>
                                <td rowspan="1"></td>
                                <td colspan="6" scope="colgroup"></td>
                                <td colspan="1">Balance:</td>
                                <?php 
                                $a = $hey['initial_payment'];
                                $b = $hey['deduction'];
                                $c = $a+$b;
                                $d = $meow-$c;
                                if($d != 0)
                                {
                                    $this->db->query('UPDATE students_data SET status = 0 WHERE school_id = '.$hey['school_id'].'');
                                }
                                else
                                {
                                    $this->db->query('UPDATE students_data SET status = 1 WHERE school_id = '.$hey['school_id'].'');
                                }
                                echo '<th colspan="1">'.$d.'</th>';
                                ?>
                              </tr>
                              
                            </table>
                        </div>
                        </div>
                    </div>
                <a href="<?php echo base_url(); ?>render" class="btn bg-teal">Back</a>
                </div>
        </div>
	</div>
</section>

            <div class="modal fade" id="fines" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title">PAYMENT FORM</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url(); ?>students/students_payment">
                           <div class="form-group">
                            <label>Total Balance:</label>
                            <h1>PHP <?php echo $d;?></h1>
                           </div>
                           <div class="form-group">
                            <label>Amount to be paid</label>
                                <div class="form-line success">
                                    <input type="hidden" name="id_num" value="<?php echo $hey['school_id']; ?>">
                                    <input type="hidden" name="total" value="<?php echo $d; ?>">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount in peso" required>
                                </div>
                           </div>
                           <div class="form-group">
                            <label>Deduction</label>
                                <div class="form-line success">
                                    <input type="number" name="deduction" class="form-control" placeholder="Fines deduction" required>
                                </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <?php
                            if ($hey['status'] == 0)
                            {
                                echo '<input type="submit" class="btn btn-link waves-effect" value="PAID ACCOUNT">';
                            }
                            else{
                                 echo '<input type="submit" class="btn btn-link waves-effect" value="PAID ACCOUNT" disabled>';
                            }
                            ?>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
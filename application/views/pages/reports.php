    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STUDENTS REPORTS
                                <small>This contains all the reports and status of every students fines.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>COURSE</th>
                                            <th>YEAR&SECTION</th>
                                            <th>MAJOR</th>
                                            <th>FINES</th>
                                            <th>PAYMENT</th>
                                            <th>DEDUCTION</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fetch_data as $row): ?>
                                            <tr>
                                                <td><?php echo $row['first_name']."&nbsp".$row['last_name']; ?></td>
                                                <td><?php echo $row['course']; ?></td>
                                                <td><?php echo $row['year']."-".$row['section']; ?></td>
                                                <td><?php echo $row['major']; ?></td>
                                                
                                                <td>P00.00</td>
                                                <td><?php echo $row['initial_payment']; ?></td>
                                                <td><?php echo $row['deduction']; ?></td>
                                                <?php if($row['status'] == 0)
                                                {
                                                   echo '<td rowspan="1"><span class="badge bg-red">&nbsp&nbspUnpaid&nbsp</span></td>';
                                                }
                                                else
                                                {
                                                    echo '<td rowspan="1"><span class="badge bg-blue">&nbsp&nbsp&nbsp&nbspPaid&nbsp&nbsp&nbsp&nbsp</span></td>';
                                                }
                                                ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
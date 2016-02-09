<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Donation List</h4>
                    <p class="category">Manage Donations in the Database</p>
                    <?php if($role == 'admin'){ ?>
                    <div class="pull-right" style="padding: 10px;">
                        <a href="<?=site_url('donations/add')?>" class="btn btn-success">Add Donation <i class="pe-7s-plus"></i> </a>
                    </div>

                    <?php } ?>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <th>Full Name</th>
                        <th>Donation Date</th>
                        <th>Blood Grp</th>
                        <th>Quantity (Bags)</th>
                        <th>Status</th>
                        <th>Expiry Date</th>
                        <th>Next Appointment</th>
                        <?php if($role == 'admin') { ?>
                        <th>Actions</th>
                        <?php } ?>
                        </thead>
                        <tbody>
                        <?php
                        foreach($donations as $donor){ ?>
                            <tr>
                                <td><?= $donor->fname. ' '.$donor->lname ?></td>
                                <td><?= $donor->date ?></td>
                                <td><?= $donor->blood_grp ?></td>
                                <td><?= $donor->quantity ?></td>
                                <?php
                                $temp  = '';
                                if($donor->status == 'Processing'){
                                    $temp = "<label class='label label-warning'>$donor->status</label>";
                                }
                                if($donor->status == 'Rejected'){
                                    $temp = "<label class='label label-danger'>$donor->status</label>";
                                }
                                if($donor->status == 'Accepted'){
                                    $temp = "<label class='label label-success'>$donor->status</label>";
                                }

                                ?>
                                <td><?= $temp ?></td>
                                <td><?= $donor->expiry?></td>
                                <td><?= $donor->nxt_appointment ?></td>
                                <?php if($role == 'admin'){ ?>
                                <td>
                                    <a href="<?= site_url('donations/edit/'.$donor->id)?>" class="btn btn-default btn-success">Edit <i class="pe-7s-edit"></i> </a> &nbsp;
                                    <a delete-id='<?=$donor->id?>' delete-type='delete_donation' class="btn btn-default btn-danger delete-object">Delete <i class="pe-7s-close-circle"></i> </a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>
</div>



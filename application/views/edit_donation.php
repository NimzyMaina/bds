<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Donation</h4>
                    <p class="category">Edit Donation Details in the Database</p>
                </div>
                <div class="content">
                    <?php if(null != $this->session->flashdata('success')){?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> <?=$this->session->flashdata('success')?>.
                        </div>
                    <?php }?>
                    <?php if(null != $this->session->flashdata('error')){?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Fail!</strong> <?=$this->session->flashdata('error')?>.
                        </div>
                    <?php }?>
                    <form action="<?= site_url("donations/edit/$id")?>" method="post">
                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="donor_id">Donor Name</label>
                                <?php
                                $attributes = 'class = "form-control select2" id = "donor_id"';
                                echo form_dropdown('donor_id',$donors,set_value('donor_id',$donation[0]->donor_id),$attributes);?>
                                <span class="text-danger"><?php echo form_error('donor_id'); ?></span>
                            </div>
                            <div class="form-group col col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="<?=set_value('quantity',$donation[0]->quantity)?>">
                                <span class="text-danger"><?php echo form_error('quantity'); ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="nxt_appointment">Next Appointment</label>
                                <input type="text" name="nxt_appointment" class="form-control date" value="<?=set_value('nxt_appointment',$donation[0]->nxt_appointment)?>">
                                <span class="text-danger"><?php echo form_error('nxt_appointment'); ?></span>
                            </div>
                            <div class="form-group col col-md-6">
                                <label for="date">Donation Date</label>
                                <input type="text" name="date" class="form-control date" value="<?=set_value('date',$donation[0]->date)?>">
                                <span class="text-danger"><?php echo form_error('date'); ?></span>
                            </div>

                            <div class="form-group col col-md-6">
                                <label for="expiry">Expiry Date</label>
                                <input type="text" name="expiry" class="form-control date" value="<?=set_value('expiry',$donation[0]->expiry)?>">
                                <span class="text-danger"><?php echo form_error('expiry'); ?></span>
                            </div>
                            <div class="form-group col col-md-6">
                                <label for="status">Status</label>
                                <?php
                                $status = array( '-SELECT-' => '-SELECT-',
                                    'Processing' => 'Processing',
                                    'Accepted' => 'Accepted',
                                    'Rejected' => 'Rejected');
                                $attributes = 'class = "form-control select2" id = "donor_id"';
                                echo form_dropdown('status',$status,set_value('status',$donation[0]->status),$attributes);?>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group pull-right" style="padding-right: 5%">
                                <button class="btn btn-success" type="submit">Submit <i class="pe-7s-edit"></i> </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </div>
</div>



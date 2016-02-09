<div class="content">
    <div class="container-fluid">
        
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Edit Donor</h4>
            <p class="category">Manage Donor Details in the Database</p>
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
            <form action="<?= site_url("donor/edit/$id")?>" method="post">
            <div class="row">
            <div class="form-group col col-md-6">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" value="<?=$donor[0]->fname?>">
                <span class="text-danger"><?php echo form_error('fname'); ?></span>
            </div>
            
             <div class="form-group col col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?=$donor[0]->lname?>">
                <span class="text-danger"><?php echo form_error('lname'); ?></span>
            </div>
            </div>

            <div class="row">
                <div class="form-group col col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?=$donor[0]->email?>">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>

            <div class="form-group col col-md-6">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?=$donor[0]->phone?>">
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
            </div>
            </div>

            <div class="row">
                <div class="form-group col col-md-6">
                    <label for="blood_grp">Blood Group</label><br />
        <?php 
        echo form_radio('blood_grp', 'A+', $donor[0]->blood_grp == 'A+')."A+ &nbsp;";
            echo form_radio('blood_grp', 'A-', $donor[0]->blood_grp == 'A-')."A- &nbsp;";
            echo form_radio('blood_grp', 'B+', $donor[0]->blood_grp == 'B+')."B+ &nbsp;";
            echo form_radio('blood_grp', 'B-', $donor[0]->blood_grp == 'B-')."B- &nbsp;";
            echo form_radio('blood_grp', 'AB+', $donor[0]->blood_grp == 'AB+')."AB+ &nbsp;";
            echo form_radio('blood_grp', 'AB-', $donor[0]->blood_grp == 'Ab-')."AB- &nbsp;";
            echo form_radio('blood_grp', 'O+', $donor[0]->blood_grp == 'O+')."O+ &nbsp;";
            echo form_radio('blood_grp', 'O-', $donor[0]->blood_grp == 'O-')."O- &nbsp;";
            ?>
            <span class="text-danger"><?php echo form_error('blood_grp'); ?></span>
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



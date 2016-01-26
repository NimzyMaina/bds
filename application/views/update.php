<div class="content">
    <div class="container-fluid">
        
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Edit Donor</h4>
            <p class="category">Manage Donor Details in the Database</p>
        </div>
        <div class="content">
            <form action="<?= site_url('donor')?>" methods="post">
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
        echo form_radio('blood_grp', 'A+', FALSE)."A+ &nbsp;";
            echo form_radio('blood_grp', 'A-', FALSE)."A- &nbsp;";
            echo form_radio('blood_grp', 'B+', FALSE)."B+ &nbsp;";
            echo form_radio('blood_grp', 'B-', FALSE)."B- &nbsp;";
            echo form_radio('blood_grp', 'AB+', FALSE)."AB+ &nbsp;";
            echo form_radio('blood_grp', 'AB-', FALSE)."AB- &nbsp;";
            echo form_radio('blood_grp', 'O+', FALSE)."O+ &nbsp;";
            echo form_radio('blood_grp', 'O-', FALSE)."O- &nbsp;";
            ?>
            <span class="text-danger"><?php echo form_error('blood_grp'); ?></span>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>


        
    </div>
</div>



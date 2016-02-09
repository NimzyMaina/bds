<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Centre</h4>
                    <p class="category">Edit Centre Details to the Database</p>
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
                    <form action="<?= site_url("centres/edit/$id")?>" method="post">
                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="name">Centre Name</label>
                                <input type="text" name="name" class="form-control" value="<?=set_value('name',$centre[0]->name)?>">
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>

                            <div class="form-group col col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="<?=set_value('address',$centre[0]->address)?>">
                                <span class="text-danger"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?=set_value('email',$centre[0]->email)?>">
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>

                            <div class="form-group col col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?=set_value('phone',$centre[0]->phone)?>">
                                <span class="text-danger"><?php echo form_error('phone'); ?></span>
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



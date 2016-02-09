<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Centre List</h4>
                    <p class="category">Manage Centres in the Database</p>
                    <div class="pull-right" style="padding: 10px;">
                        <a href="<?=site_url('centres/add')?>" class="btn btn-success">Add Centre <i class="pe-7s-plus"></i> </a>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Center Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach($centres as $donor){ ?>
                            <tr>
                                <td><?= $donor->name ?></td>
                                <td><?= $donor->email ?></td>
                                <td><?= $donor->phone ?></td>
                                <td><?= $donor->address ?></td>
                                <td>
                                    <a href="<?= site_url('centres/edit/'.$donor->id)?>" class="btn btn-default btn-success">Edit <i class="pe-7s-edit"></i> </a>
                                    <a delete-id='<?=$donor->id?>' delete-type='delete_centre' class="btn btn-default btn-danger delete-object">Delete <i class="pe-7s-close" </a>
                                </td>
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


        
        <div class="content">
            <div class="container-fluid">
                
        <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Donor List</h4>
                                <p class="category">Manage Donors in the Database</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Blood Grp</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($donors as $donor){ ?>
                                    <tr>
                                    <td><?= $donor->id ?></td>
                                        <td><?= $donor->fname ?></td>
                                        <td><?= $donor->lname ?></td>
                                        <td><?= $donor->email ?></td>
                                        <td><?= $donor->phone ?></td>
                                        <td><?= $donor->role ?></td>
                                        <td><?= $donor->blood_grp ?></td>
                                        <td>
                                            <a href="<?= site_url('donor/'.$donor->id)?>" class="btn btn-default btn-success">Edit</a>
                                            <a href="<?= site_url('donor/delete/'.$donor->id)?>" class="btn btn-default btn-danger">Delete</a>
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


        
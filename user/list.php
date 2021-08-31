<?php
require_once '../include/header.php'; 
require_once '../process/functions.php'
?>
<input type="hidden" id="base_url" value="<?php echo BASE_URL;?>">
<div id="wrapper">
    <?php require_once '../include/sidebar.php';?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
           <?php require_once '../include/navbar.php'?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">View Users</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fa fa-plus" aria-hidden="true"></i>Add User
                    </button>
                        <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['success'])):?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                            </div>
                        <?php endif?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.D</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require_once '../process/functions.php';
                                        $functions = new functions();
                                        $users = $functions->getUser(); $i=0;?>
                                    <?php foreach($users as $i => $user):?>
                                        <tr id="row_<?php echo $user['md5_id'];?>">
                                            <td><?php echo ++$i;?></td>
                                            <td><?php echo $user['name'];?></td>
                                            <td><?php echo $user['username'];?></td>
                                            <td><?php echo $user['email'];?></td>
                                            <td><?php echo $user['mobile'];?></td>
                                            <td><?php echo $user['status'];?></td>
                                            <td><?php echo $user['created_at'];?></td>
                                            <td>
                                                <a href="javascript:void(0);" data-sid="<?php echo $user['md5_id'];?>" class="btn btn-primary btn-sm btn-edit">Edit</a>
                                                <a href="javascript:void(0);" data-sid="<?php echo $user['md5_id'];?>" class="btn btn-sm btn-danger btn-delete">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

       <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form action="../process/insert_user.php" method="post" id="getForm">
                        <div class="modal-body">
                            <div class="card col-12">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="fname" class="control-label mb-1">First Name</label>
                                        <input id="fname" name="fname" type="text" class="form-control" placeholder="Enter Name">
                                        <?php if(isset($_SESSION['nameErr'])):?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['nameErr'];?>
                                            </div>
                                        <?php endif?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="lname" class="control-label mb-1">Last Name</label>
                                        <input id="lname" name="lname" type="text" class="form-control" placeholder="Enter Name">
                                        <?php if(isset($_SESSION['nameErr'])):?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['nameErr']; unset($_SESSION['nameErr']);?>
                                            </div>
                                        <?php endif?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email">
                                    <?php if(isset($_SESSION['emailErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['emailErr']; unset($_SESSION['emailErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="control-label mb-1">Username</label>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Enter username">
                                    <?php if(isset($_SESSION['userErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['userErr']; unset($_SESSION['userErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['passErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['passErr'];?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="con_password" class="control-label mb-1">Confirm Password</label>
                                    <input id="con_password" name="con_password" type="password" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['passErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['passErr']; unset($_SESSION['passErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="contact" class="control-label mb-1">Phone number</label>
                                    <input id="v" name="contact" type="number" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['phoneErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['phoneErr']; unset($_SESSION['phoneErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Select Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-1">
                                <div class="g-recaptcha" data-sitekey="6LcfjR8cAAAAAHBEI5iOVBfeiJMU3-zs9iHPH_wi"> </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End user Modal -->

        <!-- Edit user Modal -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editmodal">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form action="../process/insert_user.php" method="post" id="getForm">
                        <div class="modal-body">
                            <div class="card col-12">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="fnames" class="control-label mb-1">First Name</label>
                                        <input id="fnames" name="fname" type="text" class="form-control" placeholder="Enter Name">
                                        <?php if(isset($_SESSION['nameErr'])):?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['nameErr'];?>
                                            </div>
                                        <?php endif?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="lnames" class="control-label mb-1">Last Name</label>
                                        <input id="lnames" name="lname" type="text" class="form-control" placeholder="Enter Name">
                                        <?php if(isset($_SESSION['nameErr'])):?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['nameErr']; unset($_SESSION['nameErr']);?>
                                            </div>
                                        <?php endif?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="emails" class="control-label mb-1">Email</label>
                                    <input id="emails" name="email" type="email" class="form-control" placeholder="Enter email">
                                    <?php if(isset($_SESSION['emailErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['emailErr']; unset($_SESSION['emailErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="usernames" class="control-label mb-1">Username</label>
                                    <input id="usernames" name="username" type="text" class="form-control" placeholder="Enter username" readonly>
                                    <?php if(isset($_SESSION['userErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['userErr']; unset($_SESSION['userErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="passwords" class="control-label mb-1">Password</label>
                                    <input id="passwords" name="password" type="password" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['passErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['passErr'];?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="con_passwords" class="control-label mb-1">Confirm Password</label>
                                    <input id="con_passwords" name="con_password" type="password" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['passErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['passErr']; unset($_SESSION['passErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="contacts" class="control-label mb-1">Phone number</label>
                                    <input id="contacts" name="contact" type="number" class="form-control" placeholder="Enter Name">
                                    <?php if(isset($_SESSION['phoneErr'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['phoneErr']; unset($_SESSION['phoneErr']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Select Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                </div>
                                <input type="hidden" name="user_id" id="user_id">
                            </div>
                            <div class="mt-1">
                                <div class="g-recaptcha" data-sitekey="6LcfjR8cAAAAAHBEI5iOVBfeiJMU3-zs9iHPH_wi"> </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:void(0);" class="btn btn-secondary btn-close">Close</a>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--edit user modal end -->

<?php require_once '../include/footer.php';?>

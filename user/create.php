<?php
require_once '../include/header.php';
?>

<div id="wrapper">
    <?php require_once '../include/sidebar.php'; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php require_once '../include/navbar.php' ?>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Create User</h1>
                <form action="../process/insert_user.php" method="post" id="getForm">
                    <div class="card col-8">
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
                    <div class="mt-1 col-8">
                        <button id="send_email" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                            <span id="payment-button-amount">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
<?php require_once '../include/footer.php'; ?>
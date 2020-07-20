<?php session_start();
    require'../../../libs/function.php';
    connect_db();
    if (isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $password = $_POST['oldpassword'];
        $password = strtolower($password);
        $email = strip_tags($email);
        $email = addslashes($email);
        $password = strip_tags($password);
        $password = addslashes($password);
        $password = md5($password);

        $newpass = $_POST['newpass'];
        $newpass = strip_tags($newpass);
        $newpass = addslashes($newpass);
        $newpass = md5($newpass);

        $error = "Incorrect password!";
        $success = 'Change password successfully!';
        if ($email != "" || $password !="") {
            $sql = "SELECT email,password FROM account WHERE email = '$email' AND password = '$password'";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows!=0) {
                $sql = "UPDATE account SET password = '$newpass' WHERE email = '$email' AND password = '$password'";
                $query = mysqli_query($conn,$sql);
                $_SESSION['success'] = $success;
                unset($_SESSION['errorpass']);
            }else{
                $_SESSION['errorpass'] =$error;
                // header('Location:index.php');
            }
        }
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Password</title>
        <link href="../../../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-success text-center font-weight-light my-4"><?php if (isset($_SESSION['success'])) { echo $_SESSION['success'];};if (isset($_SESSION['errorpass'])) { echo $_SESSION['errorpass'];} ?></h3></div>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        <form onsubmit="return validateForm()" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                                <label class="small mb-1" for="currentPass">Current Password</label>
                                                <input name="oldpassword" class="form-control py-4" id="currentPass" type="password" placeholder="Enter current password" />
                                                <label class="small mb-1" for="newPass">New Password</label>
                                                <input name="newpass" class="form-control py-4" id="newPass" type="password" placeholder="Enter new password" />
                                                <label class="small mb-1" for="verifyPass">Confirm New Password</label>
                                                <input name="confirmpass" class="form-control py-4" id="verifyPass" type="password" placeholder="Enter Re-type password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="index.php">Return to Home</a>
                                                <button type="submit" name="submit" class="btn btn-primary">Save Change</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" charset="utf-8" >
            function validateForm() {
                currentPass = document.querySelectorAll('#currentPass').value
                newPass = document.querySelector('#newPass').value
                verifyPass = document.querySelector('#verifyPass').value
                if (currentPass == newPass) {
                    return false
                }
                if (newPass == '') {
                    return false
                }
                if (verifyPass == '') {
                    return false
                }
                if (newPass!=verifyPass) {
                    return false
                }else return true
            }
        </script>
    </body>
</html>

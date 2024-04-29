<?php
session_start();
require_once "Connect.php";

if (empty($_SESSION['accup'])) {
    $C_ID = $_SESSION['acc']['C_ID'];
    $C_UserName = $_SESSION['acc']['C_UserName'];
    $C_Password = $_SESSION['acc']['C_Password'];
    $C_Gender = $_SESSION['acc']['C_Gender'];
    $C_Email = $_SESSION['acc']['C_Email'];
    $C_Phone = $_SESSION['acc']['C_Phone'];
    $C_Street = $_SESSION['acc']['C_Street'];
    $C_City = $_SESSION['acc']['C_City'];
}
else{
    $C_ID =$_GET['id'];
    $C_UserName = $_GET['username'];
    $C_Password = $_GET['password'];
    $C_Gender = $_GET['gender'];
    $C_Email = $_GET['email'];
    $C_Phone = $_GET['phone'];
    $C_Street = $_GET['street'];
    $C_City = $_GET['city'];

}




if (isset($_POST['update'])) {
    $C_UserName = $_POST['name'];
    $C_Password = $_POST['pass'];
    $C_Gender = $_POST['fender'];
    $C_Email = $_POST['email'];
    $C_Phone = $_POST['phone'];
    $C_Street = $_POST['street'];
    $C_City = $_POST['city'];

    unset($_SESSION['accup']); 

    header("Location: CustomerUpdate.php?id=$C_ID&username=$C_UserName&password=$C_Password&gender=$C_Gender&email=$C_Email&phone=$C_Phone&street=$C_Street&city=$C_City");
} 
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Cart.css">
</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php include 'NormalNavBar.php'; ?>

        <section class="flexpage rflex">
            <div class="">
                <a href="" class="Pagetitle ">
                    <h2>&nbsp</h2>
                </a>
            </div>
            <!-- <hr class="titline"> -->
            <br>
            <div>
                <form action="CustomerUpdate.php" method="POST">
                    <table class="producttab" cellspacing="0">
                        <tr border-right=" 1px solid #000000;">

                            <td class="imagetab1 leftside" valign="top">
                                <div class="slideshow-container rflex">
                                    <div class="  imgfix">
                                        <h3>Account Information</h3>
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>User Name:</h3>
                                        <input type="text" name="name" Value="<?= $C_UserName ?>" class="form-control2">
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>Password:</h3>
                                        <input type="text" name="pass" Value="<?= $C_Password ?>" class="form-control2">
                                    </div>

                                    <div class="seperate  imgfix">
                                        <h3>Gender:</h3>
                                        <input type="text" name="gender" Value="<?= $C_Gender ?>" class="form-control2">
                                    </div>

                                    <div class="seperate  imgfix">
                                        <h3>Street:</h3>
                                        <input type="text" name="street" Value="<?= $C_Street ?>" class="form-control2">
                                    </div>


                                </div>
                            </td>
                            <!-- <td class="middle-border"></td> -->
                            <td class="imagetab2 rightside" valign="middle">
                                <div class="slideshow-container rflex">
                                    <div class="  imgfix">
                                        <h3>&nbsp</h3>
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>Email:</h3>
                                        <input type="text" name="email" Value="<?= $C_Email ?>" class="form-control2">
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>Phone:</h3>
                                        <input type="text" name="phone" Value="<?= $C_Phone ?>" class="form-control2">
                                    </div>

                                    <div class="seperate  imgfix">
                                        <h3>City:</h3>
                                        <input type="text" name="city" Value="<?= $C_City ?>" class="form-control2">
                                    </div>
                                    <div class="seperate  imgfixing2">
                                        <p>&nbsp</p>
                                        <h3><button type="submit" name="update" class="path-btn">Update</a></h3>
                                        <!-- <h3><a href="CheckOut.php" class="path-btn">Next</a></h3> -->
                                    </div>


                                </div>
                            </td>

                        </tr>

                    </table>
                </form>
                <div class="blank">&nbsp</div>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>

            </div>

        </section>
        <?php include 'Footer.php'; ?>
    </div>
</body>

</html>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="test.css">
    <title>Selected User Details</title>
    <style>
        table,
        td,
        th {
            padding-top: 50px;
            padding-bottom: 50px;
            vertical-align: middle;
            font-size: 40px;
        }
        
        .button {
            background-color: rgba(0, 0, 0, 0.568);
            /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        
        .button:hover {
            background-color: #555555;
            color: white;
        }
        
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Height of the footer */
            color: aliceblue;
        }
    </style>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">The Sparks Bank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="st.php">Customer</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Trasactions
          </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item active" href="st.php">Transfer Money</a></li>
                            <li><a class="dropdown-item" href="transaction.php">History</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <h2>Selected User Details</h2>
    <br>
    <?php
include "config.php";
$row; 
if(isset($_GET['id'])){
$ID = $_GET['id'];
}
$q="SELECT * From `bank`.`customer` WHERE id='$ID'";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
$_SESSION['id']=$ID;
?>
        <?php  
				$row=mysqli_fetch_array($result)
			?>
        <table border="2" class="ot">
            <tr>
                <td>Sr no.</td>
                <td>Name</td>
                <td>Email</td>
                <td>Balance</td>
                <br>

            </tr>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['amount']; ?>
                </td>

            </tr>
        </table>
        <br>
        <h2> Transaction </h2>

        <form method="post" name="tcredit" class="tabletext">
            <br><br><br>
            <label style="color : white;"><b>Transfer To:</b></label>
            <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose account</option>
            <?php
                include 'config.php';
                $ID=$_GET['id'];
                $n = "SELECT * FROM `bank`.`customer`";
				$result=mysqli_query($con,$n);
                if(!$result)
                {
                    echo "Error ".$n."<br>".mysqli_error($con);
                }
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $row['id'];?>" >
                
                    <?php echo $row['name'] ;?> (Balance: 
                    <?php echo $row['amount'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
            <br>
            <br>
            <label style="color : white;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="transamt" required>
            <br><br>
            <div class="text-center">
                <button name="submit" type="submit" id="myBtn" class="button">Transfer Money</button>

            </div>
            <br>
        </form>
        <br><br>
        <footer style="margin-top: 500px;">
            <br><br><br>
            <hr>
            <h6>Contact - 617289182</h6>
            <h6>Email - bank@gmail.com</h6>
            <h6>&#169;The Sparks Bank</h6>

        </footer>
</body>

</html>
<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['transamt'];

    $sql = "SELECT * from `bank`.`customer` where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from `bank`.`customer` where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['amount']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero amount cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['amount'] - $amount;
                $sql = "UPDATE `bank`.`customer` set amount=$newbalance where id=$from";
                mysqli_query($con,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['amount'] + $amount;
                $sql = "UPDATE `bank`.`customer` set amount=$newbalance where id=$to";
                mysqli_query($con,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $date = date('Y-m-d H:i:s');
                $sql = "INSERT INTO `bank`.`transhistory`(`sender`, `receiver`, `amttransfered`,`datetime`) VALUES ('$sender','$receiver','$amount','$date')";
                $query=mysqli_query($con,$sql);

                if($query){
                     echo "<script> alert('Transaction is Successful');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
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
    <title>Transaction History</title>
    <style>
        table,
        td,
        th {
            padding-top: 9px;
            padding-bottom: 9px;
            vertical-align: middle;
            font-size: 35px;
        }
        
        h1 {
            text-align: center;
            color: aliceblue;
        }
    </style>
    <title>Hello, world!</title>
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
                            <li><a class="dropdown-item" href="st.php">Transfer Money</a></li>
                            <li><a class="dropdown-item active" href="transaction.php">History</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <h1>Transcation History</h1>
    <br>
    <table border="2" class="ot">

        <tr>
            <td>Sr no.</td>
            <td>Sender</td>
            <td>Receiver</td>
            <td>Amount Transfered</td>
            <td>Date and Time</td>
        </tr>


        <?php

include "config.php"; 

$records = mysqli_query($con,"SELECT * FROM `bank`.`transhistory`") or die( mysqli_error($con));


while($row = mysqli_fetch_array($records))
{
?>
            <tr>
                <td>
                    <?php echo $row['sno']; ?>
                </td>
                <td>
                    <?php echo $row['sender']; ?>
                </td>
                <td>
                    <?php echo $row['receiver']; ?>
                </td>
                <td>
                    <?php echo $row['amttransfered']; ?>
                </td>
                <td>
                    <?php echo $row['datetime']; ?>
                </td>
            </tr>
            <?php
}
?>
    </table>

    <?php mysqli_close($con);  ?>
    <hr>
    <footer style="margin-top: 500px;">
        <br>
        <hr>
        <h6>Contact - 617289182</h6>
        <h6>Email - bank@gmail.com</h6>
        <h6>&#169;The Sparks Bank</h6>

    </footer>
</body>

</html>
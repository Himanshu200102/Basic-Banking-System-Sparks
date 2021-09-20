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
    <title>Customer Details</title>
    <style>
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Height of the footer */
            color: aliceblue;
        }
        
        table,
        td,
        th {
            padding-top: 2px;
            padding-bottom: 2px;
            vertical-align: middle;
            font-size: 20px;
        }
        
        .button {
            background-color: rgba(0, 0, 0, 0.568);
            /* Green */
            border: none;
            color: white;
            padding: 5px 10px;
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
                        <a class="nav-link active" href="st.php">Customer</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Trasactions
          </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="st.php">Transfer Money</a></li>
                            <li><a class="dropdown-item" href="transaction.php">History</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Customer Details</h2>
    <table border="2" class="ot">
        <tr>
            <td>Sr no.</td>
            <td>Name</td>
            <td>Email</td>
            <td>Balance</td>
            <td>Transfer Money</td>
        </tr>


        <?php

include "config.php"; 

$records = mysqli_query($con,"SELECT * FROM `bank`.`customer`") or die( mysqli_error($con));


while($row = mysqli_fetch_array($records))
{
?>
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
                <td>
                    <a href="selecteddetails.php?id= <?php echo $row['id'] ;?>"><button class="button" onclick="document.location='selecteddetails.php' ">Transfer Funds</button></a>
                </td>
            </tr>
            <?php
}
?>
    </table>

    <?php mysqli_close($con);  ?>
    <footer style="margin-top: 500px;">
        <br>
        <hr>
        <h6>Contact - 617289182</h6>
        <h6>Email - bank@gmail.com</h6>
        <h6>&#169;The Sparks Bank</h6>

    </footer>
</body>

</html>
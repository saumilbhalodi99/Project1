<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Simple form and table</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">

    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <?php session_start();
                if(isset($_SESSION['done'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['done'];?></div>
                <?php } unset($_SESSION['done']); ?>
                <?php if(isset($_SESSION['send'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['send'];?></div>
                <?php } unset($_SESSION['send']); ?>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="process.php" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="phone" placeholder="Phone number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Check-in time</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="c_i_time" placeholder="Check-in time" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Check-out time</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="c_o_time" placeholder="Check-out time" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Host name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="host_name" placeholder="Host name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address Visited</label>
                        <div class="col-sm-10">
                            <textarea name="address_visited" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>

    <br><br><br><br><br>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Check in time </th>
                <th>Check out time </th>
                <th>Host name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $link=mysqli_connect("localhost","root","","arash");
                $q = "select *from crud";
                $res = mysqli_query($link,$q);
                $no = 1;
                while($row = mysqli_fetch_assoc($res)) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['phone'].'</td>';
                        echo '<td>'.$row['c_i_time'].'</td>';
                        echo '<td>'.$row['c_o_time'].'</td>';
                        echo '<td>'.$row['host_name'].'</td>';
                        echo '<td>'.$row['address_visited'].'</td>';
                        echo '</tr>';
                    $no++;
                }
                $row = mysqli_fetch_assoc($res);
                if(!empty($row)) {
                    echo '<tr><td><b>No data found</b></td></tr>';
                }
            ?>            
        </tbody>
    </table>
</div>
</body>
</html>                            
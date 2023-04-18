<?php

$servername = "localhost:3306";
$username = "petrilakova";
$password_db = "987654321";
$database = "cvstore";

try {

    $connect = new PDO("mysql:host=$servername;dbname=$database", $username, $password_db);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected Successfully";

} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}



?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h3>DATA Z DATABAZY </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $query = "SELECT * FROM cvstore ORDER BY DECS";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        $result = $statement->fetchAll();
                        if($result)
                        {
                            foreach($result as $row)
                            {
                                ?>
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->price; ?></td>
                                    <td><?= $row->category; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="6">No Record Found</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






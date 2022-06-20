<?php 
    include("../View/partials/_header.php");
    include("../View/partials/_navbar.php");
    include("../View/partials/_sidebar.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require("../Controller/generalController.php");
    
    $conn = new DbConnection($databaseHost,$databaseUserName,"",$databaseName);
    $conn->connect();
?>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">Confirmation</h4>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12">
                            <p class="text-primary">.text-primary</p>
                            <p class="text-success">.text-success</p>
                            <p class="text-danger">.text-danger</p>
                            <p class="text-warning">.text-warning</p>
                            <p class="text-info">
                            <?php 

                                $ref = getenv("HTTP_REFERER");
                                $controle = new GeneralController();
                               
                                if (strpos($ref,"signup"))
                                {
                                    $controle->createUser();
                                }
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include("../View/partials/_footer.php");
    include("../View/partials/_script.php");
?>

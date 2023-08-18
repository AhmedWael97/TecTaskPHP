<?php 
    require_once('./db/connection.php');
    require_once('./backend/UserController.php')
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Style  -->
        <link rel="stylesheet" href="./dist/css/bootstrap.min.css" /> 
        <title>
            Tec Task
        </title>        
    </head>
    <body>
        <div class="container mt-4">
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST" && $message == "success")
                {
                    echo '<span class="text-success d-block"><b> Saved Successfully !! </b></span>';
                } else if($_SERVER["REQUEST_METHOD"] == "POST" && $message == "failed") {
                    echo '<span class="text-danger d-block"><b> Something Went Wrong !! </b></span>';
                }
            ?>
            <div class="title">
                <h4>
                    Add User
                </h4>
            </div>
            <form class="form" method="post"  enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-2 ">
                        <label class="inputLable">
                            First Name
                        </label>
                        <input type="text" name="first_name" required class="form-control" />
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-2 ">
                        <label class="inputLable">
                            Second Name
                        </label>
                        <input type="text" name="second_name" required class="form-control" />
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-2 ">
                        <label class="inputLable">
                            User Image
                        </label>
                        <input type="file" name="image" id="file" required class="form-control" />
                        <span class="d-block text-danger d-none fileError">
                            Allowed Extensions (jpg, jpeg, png)
                        </span>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-2 ">
                        <input type="submit" name="save" class="btn btn-primary mt-2" />
                    </div>
                </div>
            </form>
        </div>


        <!-- JQuery -->
        <script src="./dist/js/jquery.min.js"></script>
        <!-- Script -->
        <script src="./dist/js/script.js"></script>
    </body>
</html>

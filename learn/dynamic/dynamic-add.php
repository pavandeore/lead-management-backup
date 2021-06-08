<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
    
    $(document).ready(function(){
        var html = ' <tr><td><input class="form-control" type="text" name="txtFullname[]" /></td><td><input class="form-control" type="text" name="txtEmail[]" /></td><td><input class="form-control" type="text" name="txtPhone[]" /></td><td><input class="form-control" type="text" name="txtAddress[]" /></td><td><input class="form-control" type="button" id="remove" name="remove" value="remove" /></td></tr>';

        var x = 1;
        $("#add").click(function(){
            $("#table_field").append(html);
        })
        $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
        })

    })
    
    </script>

</head>
<body>
    
<div class="container">
    <form action="" method="POST" id="isert_form" class="insert-form">
        <div class="input-field">
            <table class="table" id="table_field">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
                <?php
                    $con = new mysqli("localhost","root","","test");
                    if(isset($_POST['save'])){
                        $txtFullname = $_POST['txtFullname'];
                        $txtEmail = $_POST['txtEmail'];
                        $txtPhone = $_POST['txtPhone'];
                        $txtAddress = $_POST['txtAddress'];
                        
                        foreach ($txtFullname as $key => $value) {
                            $save = "INSERT INTO user(namee, email, phone, addresss) VALUES('".$value."','".$txtEmail[$key]."','".$txtPhone[$key]."','".$txtAddress[$key]."')";
                            $con->query($save);
                        }

                    }
                ?>
                <tr>
                    <td><input class="form-control" type="text" name="txtFullname[]" /></td>
                    <td><input class="form-control" type="text" name="txtEmail[]" /></td>
                    <td><input class="form-control" type="text" name="txtPhone[]" /></td>
                    <td><input class="form-control" type="text" name="txtAddress[]" /></td>
                    <td><input class="form-control" type="button" id="add" name="add" value="Add" /></td>
                </tr>
            </table>
            <center>
                <input class="btn btn-info" type="submit" id="save" name="save" value="Save Data" />
            </center>        
        </div>
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
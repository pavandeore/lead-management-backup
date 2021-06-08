<?php

    $con = new mysqli("localhost","root","","lead_management");
    $id = $_POST['id'];

    if(isset($_POST['search'])){
        
        $query = "SELECT * FROM test_data where id='$id'";
        $run = $con->query($query)
        
        while($row = mysqli_fetch_array($run)){
        ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?> " /><br/>
                <input type="text" name="name" value="<?php echo $row['name'] ?> " /><br/>
                <input type="text" name="email" value="<?php echo $row['email'] ?> " /><br/>
                <input type="submit" name="update" vlaue="update data" />
            </form>

            <?php
        }
        
    }

    ?>
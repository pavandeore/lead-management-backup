<?php

include 'config.php';


if(isset($_POST['itemIdSelect'])){
    $itemIdSelect = $_POST['itemIdSelect'];

    $sql4 = "SELECT * from `item_master` WHERE id = $itemIdSelect ";
    $result4 = $con->query($sql4);
    if ($result4->num_rows > 0) {

?>
                        <div class='col-6'>
                                    <?php
                                       
                                            while ($row4 = $result4->fetch_assoc()) {
                                                echo $row4['item_desc'];
                                            
                                        
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td><input class='form-control' type='number' min='0' id='quantity-inp' /></td>
                        <td>
                            <?php   
                                echo $row4['rate'];
                            ?>
                        </td>
                        <td>500.00</td>
                        <td>
                            <?php
                                 echo $row4['gst'];
                                }
                            ?>
                        </td>
                        <td></td>
                        <td>590.00</td>
                        <td><button class='btn btn-danger remove-btn'>-</button></td>

<?php

                                }
}else{
    echo "Not getting Item Id";
}


?>
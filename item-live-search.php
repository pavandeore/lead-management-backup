<?php

include 'config.php';

if ($con->connect_error) {
    die("Failed to connect" . $con->connect_error);
}

if (isset($_POST['query'])) {
    $inputText = $_POST['query'];
    $query = "SELECT * FROM `item_master` WHERE item_name  LIKE '$inputText%'";

    $result = $con->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a href='#' id='live-search-click' onclick='return sendId(" . $row['id'] . ")'
            class='live-search-click list-group-item list-group-item-action border-1' >" . $row['item_name'] .
                "</a>";
        }
    } else {
        echo "<p class='list-group-item'>No Record</p>";
    }
}

?>

<script>

    function sendId(id) {
        $.ajax({
            url: "specific-item-live-search.php",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                $(".item-preview-div").html(data);
            }
        })
    }
</script>
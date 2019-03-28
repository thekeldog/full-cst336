<?php
    include "./connection.php";

    $conn = get_database_connection('cinder');
    $curr_user_id = "1";

    $sql = "SELECT * FROM user WHERE";
    $sql .= " id != " . $curr_user_id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records);


?>
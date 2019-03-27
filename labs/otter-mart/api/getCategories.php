<?php
    include './connection.php';

    $conn = get_database_connection('ottermart');

    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records);
?>
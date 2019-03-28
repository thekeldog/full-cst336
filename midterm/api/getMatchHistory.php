<?php
    include "./connection.php";
    echo "at least I'm here";

    $conn = get_database_connection('cinder');
    $curr_user_id = "1";

    echo "here's some stuff";

    $sql = "SELECT `match`.answer_timestamp as tm, user.username FROM `match` ";
    $sql .= "INNER JOIN `user` ON `match`.match_user_id = `user`.id";
    $sql .= " WHERE `user`.id = `match`.`match_user_id` AND `user`.id != " .$curr_user_id;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records);


?>
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'stchat' );
$name = 'kel';

function load($conn) {
    $stmt = mysqli_prepare($conn, "SELECT fromu, msg FROM messages LIMIT 50");
    mysqli_stmt_bind_result($stmt, $name, $msg);
    mysqli_stmt_execute($stmt);
    $echos = '';
    while (mysqli_stmt_fetch($stmt)) {
        $echos .= '<div class="ms1">' . '<div class="dele rowms"><p>' . $name . '</p></div>' . '<div class="undo"><p class="msg1">' . $msg . '</p></div>' . '</div> <br>';

    }
    echo $echos;

}
function send($conn)
{

    if (!empty($_POST['newmsgs'])){
        $nam = 'kelll';
        $msg2 = $_POST['newmsgs'];
        $stmt2 = mysqli_prepare($conn, "INSERT INTO messages (fromu, msg) VALUES (?,?)");


        mysqli_stmt_bind_param($stmt2, 'ss', $nam, $msg2);

        mysqli_stmt_execute($stmt2);

        header('Location: mess_chat.php');

    }

}
send($conn);

?>

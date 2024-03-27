<?php
session_start();
?>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'stchat' );

if (isset($_GET['ms'])){
    $par = htmlspecialchars($_GET['ms'] === 'json');
    json_encode($par);
}

function load($conn) {
    $stmt = mysqli_prepare($conn, "SELECT fromu, msg FROM messages LIMIT 50");
    mysqli_stmt_bind_result($stmt, $name, $msg);
    mysqli_stmt_execute($stmt);
    $echos = '';
    while (mysqli_stmt_fetch($stmt)) {
        $echos .= '<div class="ms1">' . '<div class="dele rowms"><p>' . $name . '</p></div>' . '<div class="undo"><p class="msg1">' . $msg . '</p></div>' . '</div> <br>';

    }

    return  $echos;
}




    echo "<div class='chat'>
    <div class='chat-messages'>
        <div class='cmas' id='messages'>";
if (isset($par)) {
    echo load($conn);
    header('Content-Type: application/json');
    exit();
    };
       echo "</div>
    <div class='chat-input'>
        <form method='post' id='chat-form'>
            <input type='text' id='message-text' class='chat-forminput' placeholder='Введите сообщение' name='newmsgs' /> <input type='submit' class='chat-formsubmit' value='=>' />
        </form>
    </div>
</div>";



if(!empty($_SESSION['user'])) {
    if (isset($_POST['newmsgs'])){
        $msg2 = $_POST['newmsgs'];
        $stmt2 = mysqli_prepare($conn, "INSERT INTO messages (fromu, msg) VALUES (?,?)");


        mysqli_stmt_bind_param($stmt2, 'ss', $_SESSION['user'][1], $msg2);

        mysqli_stmt_execute($stmt2);

        header('Location: chat.php');


    }



}
?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


    <script>
        $(document).ready(function() {

         //   setInterval(load, 5000);
        })

// Обновление сообщений каждые 5 секунд


        function load() {
            $.ajax({
                url: 'chat.php',
                type: 'GET',

                success: function (response) {
                    $('#messages').html(response.json);
                    console.log(response)
                },
                error: function () {
                    alert('Ошибка при загрузке сообщений.');
                }
            });
        }



    </script>














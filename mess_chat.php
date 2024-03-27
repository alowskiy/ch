<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">


</head>
<body>
<div class='chat'>
    <div class='chat-messages'>
        <div class='cmas' id='messages'>
            <div class="ms1"><div class="dele rowms"><p>luij</p></div><div class="undo"><p class="msg1">well well well</p></div></div> <br>
        </div>
        <div class='chat-input'>
            <form method='post' id='chat-form'>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'stchat' );
                require_once 'get_send.php';
                load($conn); ?>
                <input type='text' id='message-text' class='chat-forminput' placeholder='Введите сообщение' name='newmsgs' /> <input type='submit' class='chat-formsubmit' value='=>' />
            </form>
        </div>
    </div>

    <script src="jquery-3.7.1.min.js"> </script>
    <script>

        $(function() {

            $.ajaxSetup({
                cache: false
            });

            var url = "get_send.php";

            $(".chat-formsubmit").click(function(event) {
                event.preventDefault();
                $(".cmas").html("").load(url);

            });
        });
    </script>



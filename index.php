<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kwas</title>
<!--    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script src="assets/js/vendor/jquery-1.11.min.js"></script>
    <link href="assets/stylesheets/screen.css" rel="stylesheet" >
</head>
<body>
<div class="gallery">
<?php
require 'lib/HipChat.php';
require 'cfg/cfg.php';

$token = TOKEN;
$hc = new HipChat\HipChat($token);

// list rooms
//foreach ($hc->get_rooms() as $room) {
//  echo " - $room->room_id = $room->name\n";
//}

    $posts =  $hc->get_rooms_history('517400');

    foreach ($posts as $post) {
        $msg = $post->message;

        $images = array();
        //var_dump($msg);
        preg_match('!http://[^?#]+\.(?:jpe?g|png|gif)!Ui' , $msg , $images);
        //var_dump($images);
        if (!empty($images[0])) {
            $img = $images[0];
            echo '<div class="element-item span_3"><a href="#"><img src="'.$img.'" alt=""></a></div>';
        }

    }

?>
</div>
<script src="assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
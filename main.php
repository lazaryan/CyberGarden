<?php
    include('images.php'); 
    $path = 'img\17851785_60x60.png';
    $colorMatrix = get_color_matrix($path);
    echo json_encode($colorMatrix);
?>

<?php 

require 'image.class.php';

use ImgProcessing\Image;

$img = new Image('generated.jpg', 1920,1200);
$img->add_img_jpg('matrix.jpg', 0, 0, 1920,1200);
$img->add_img_jpg('ashtanga.jpg', -500, -400, 200, 188);
$img->add_text('Programming is Magic', 10, 100);

echo '<img src="generated.jpg" alt="generated" width="900"/>';
<?php

$targ_w = $_POST['targ_w'];
$targ_h = $_POST['targ_h'];
$sest_utl_p_ = $_POST['sest_utl_p_'];
$jpeg_quality = 90;

$src0 = $_POST['photo_url'];
$src = 'uploads/'.$src0;
 $srcY = $src;
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);

imagejpeg($dst_r,$src,$jpeg_quality);

				
 if(rename($src, $sest_utl_p_.$src0))
            {
				echo $src.'';
            }
            else
            {
                echo "";
            }
exit;
?>
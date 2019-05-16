<?php 

namespace ImgProcessing;

class Image
{
    public $width;                 // LARGEUR DU BACKGROUND
    public $height;                // HAUTEUR DU BACKGROUND
    public $img_path;        

    public function __construct($img_path, $width, $height)
    {
        $this->img_path = $img_path;
        $this->width = $width;
        $this->height = $height;
        $this->create_empty_space_to_draw_on();
    }

    public function create_empty_space_to_draw_on()
    {
        $img = imagecreatetruecolor($this->width, $this->height);
        imagesavealpha($img, true);
        $bg = imagecolorallocatealpha($img, 0, 0, 0, 127);
        imagefill($img, 0, 0, $bg);
        imagejpeg($img, $this->img_path, 100);
    }

    
    public function add_text($text, $posx, $posy)
    {
        $img = imagecreatefromjpeg($this->img_path);
        $police = 'C:\wamp64\www\img_gen\AmostelySignature.ttf';
        $taille_police = 90;
        $couleur = imagecolorallocate($img, 0, 0, 0);
        imagettftext($img, $taille_police, 0, $posx, $posy, $couleur, $police, $text);
        imagejpeg($img, $this->img_path, 100);
    }

    public function add_img_jpg($path_img, $posx, $posy, $largeur, $hauteur)
    {
        $img = imagecreatefromjpeg($this->img_path);
        $img_bg = imagecreatefromjpeg($path_img);
        $succeed = imagecopymerge($img, $img_bg, $posx*(-1), $posy*(-1), 0, 0, $largeur, $hauteur, 100);
        imagejpeg($img, $this->img_path, 100);
    }

}
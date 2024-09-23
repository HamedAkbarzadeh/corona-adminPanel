<?php

namespace App\Services\GD;



class GD
{
    public $image;
    public $color_hex = [];



    public static function image($width = 200, $height = 100)
    {
        $instance = new self($width, $height);
        return $instance;
    }

    function __construct($width = 200, $height = 100)
    {
        $this->image = imagecreatetruecolor($width, $height);
        $this->fillColorHex();
    }

    function fillColorHex()
    {
        $this->color_hex = [
            'blue' => imagecolorallocatealpha($this->image, 50, 168, 157, 0),
            'pruple' => imagecolorallocatealpha($this->image, 169, 67, 217, 0),
            'red' => imagecolorallocatealpha($this->image, 189, 58, 119, 0),
            'green' => imagecolorallocatealpha($this->image, 55, 191, 94, 0),
            'orange' => imagecolorallocatealpha($this->image, 171, 165, 53, 0),
            'black' => imagecolorallocatealpha($this->image, 0, 0, 0, 0),
            'white' => imagecolorallocatealpha($this->image, 250, 250, 250, 0)
        ];
    }


    function setBG($color = null)
    {
        if ($color == null) {
            $color = $this->randomHex();
        }
        imagefill($this->image, 0, 0, $this->color_hex[$color]);
        return $this;
    }


    function randomHex()
    {
        return array_rand($this->color_hex);
    }


    function setText($text = 'No Photo', $textColor = 'black', $x = 65, $y = 40)
    {
        imagestring($this->image, 5, $x, $y, $text, $this->color_hex[$textColor]);
        return $this;
    }
    function jpg()
    {
        //header
        header('content-type: image');
        imagejpeg($this->image);
    }
    function png()
    {
        imagepng($this->image);
    }
}

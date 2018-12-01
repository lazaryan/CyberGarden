<?php

function get_color_matrix($path)
{
    $img = imagecreatefrompng($path);
    $rgb = imagecolorat($img, 0, 0);
    $colorMatrix = array(
        'red' => array(),
        'green' => array(),
        'blue' => array(),
        'alpha' => array()
    );
    //echo imagesy($img) . ' ';
    //echo imagesx($img);
    //exit(0);
    for ($y = 0; $y < imagesy($img); $y++)
    {
        $colorLine = array(
            'red' => array(),
            'green' => array(),
            'blue' => array(),
            'alpha' => array()
        );
        for ($x = 0; $x < imagesx($img); $x++)
        {
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);
            array_push($colorLine['red'], $colors['red']);
            array_push($colorLine['green'], $colors['green']);
            array_push($colorLine['blue'], $colors['blue']);
            array_push($colorLine['alpha'], $colors['alpha']);
        }
        //array_push($colorMatrix, $colorLine);
        
        
        array_push($colorMatrix['red'], $colorLine['red']);
        array_push($colorMatrix['green'], $colorLine['green']);
        array_push($colorMatrix['blue'], $colorLine['blue']);
        array_push($colorMatrix['alpha'], $colorLine['alpha']);
    }
    return $colorMatrix;
}
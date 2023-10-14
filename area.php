<?php
Class Area
{
    public $width;
    public $height;
    public $raduis;
    public $shape;
    public $area;

    function rArea($rwidth, $rheight)
    {
        $this->width = $rwidth;
        $this->height = $rheight;
       $rarea = $rwidth * $rheight;
       return $this->area =$rarea;
    }
    function cArea($craduis)
    {
        $this->raduis = $craduis;
       $carea = 2 * 3.14 * $craduis * $craduis;
       return $this->area =$carea;
    }
    function sArea($swidth)
    {
        $this->width = $swidth;
       $sarea = $swidth * $swidth;
       return $this->area =$sarea;
    }

}
<?php

define('WORD_WIDTH',6);
define('WORD_HIGHT',10);
define('OFFSET_X',2);
define('OFFSET_Y',0);
define('WORD_SPACING',4);

class valite
{
	public function setImage($Image)
	{
		$this->ImagePath = $Image;
	}
	
	public function getData()
	{
		return $data;
	}
	
	public function getResult()
	{
		return $DataArray;
	}
	
	public function getHec()
	{
		$res = imagecreatefromjpeg($this->ImagePath);
		$size = getimagesize($this->ImagePath);
		$data = array();
		for($i = 0; $i < $size[1]; ++$i)
		{
			for($j = 0; $j < $size[0]; ++$j)
			{
				$rgb = imagecolorat($res,$j,$i);
				$rgbarray = imagecolorsforindex($res, $rgb);
				if($rgbarray['red'] < 160 || $rgbarray['green'] < 160 || $rgbarray['blue'] < 160)
				{
					$data[$i][$j]=1;
				}else{
					$data[$i][$j]=0;
				}
			}
		}
		$this->DataArray = $data;
		$this->ImageSize = $size;
	}
	
	public function run()
	{
		$result = "";
		$data = array("","","","");
		
		for($i = 0; $i < 4; ++$i)
		{
			$x = ($i * (WORD_WIDTH + WORD_SPACING)) + OFFSET_X;
			$y = OFFSET_Y;
			for($h = $y; $h < (OFFSET_Y + WORD_HIGHT); ++$h)
			{
				for($w = $x; $w < ($x + WORD_WIDTH); ++$w)
				{
					$data[$i] .= $this->DataArray[$h][$w];
				}
			}
		}


		foreach($data as $numKey => $numString)
		{
			$max = 0.0;
			$num = 0;
			foreach($this->Keys as $key => $value)
			{
				$percent = 0.0;
				similar_text($value, $numString, $percent);
				if(intval($percent) > $max)
				{
					$max = $percent;
					$num = $key;
					if(intval($percent) > 95)
						break;
				}
			}
			$result .= $num;
		}
		$this->data = $result;

		return $result;
	}

	public function Draw()
	{
		for($i = 0; $i < $this->ImageSize[1]; ++$i)
		{
	        for($j = 0; $j < $this->ImageSize[0]; ++$j)
		    {
			    echo $this->DataArray[$i][$j];
	        }
		    echo "\n";
		}
	}
	
	public function __construct()
	{
		$this->Keys = array(
			'0'=>'011110100001100001100001100001100001100001100001100001011110',
			'1'=>'001000111000001000001000001000001000001000001000001000111110',
			'2'=>'011110100001100001000001000010000100001000010000100001111111',
			'3'=>'011110100001100001000010001100000010000001100001100001011110',
			'4'=>'000100000100001100010100100100100100111111000100000100001111',
			'5'=>'111111100000100000101110110001000001000001100001100001011110',
			'6'=>'001110010001100000100000101110110001100001100001100001011110',
			'7'=>'111111100010100010000100000100001000001000001000001000001000',
			'8'=>'011110100001100001100001011110010010100001100001100001011110',
			'9'=>'011100100010100001100001100011011101000001000001100010011100',
		);
	}
	
	protected $ImagePath;
	protected $DataArray;
	protected $ImageSize;
	protected $data;
	protected $Keys;
	protected $NumStringArray;
}
?>
<?php 

class Point
{
	private $x;
	private $y;

	public function __construct($x, $y)
	{
		$this->setX($x);
		$this->setY($y);

	}

	public function setX($x)
	{
		$this->x = $x; 
	}

	public function setY($y)
	{
		$this->y = $y;
	}

	public function getX()
	{
		return $this->x;
	}

	public function getY()
	{
		return $this->y;
	}
}
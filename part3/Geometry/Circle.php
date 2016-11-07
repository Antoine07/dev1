<?php 

class Circle
{
	private $r;
	private $point = null;

	public function __construct($r, Point $p)
	{
		$this->setR($r);
	}

	public function setR($r)
	{
		$this->r = $r; 
	}

	public function setPoint(Point $point)
	{
		$this->point = $point;
	}

	public function getR()
	{
		return $this->r;
	}

	public function getPoint()
	{
		return $this->point;
	}
}
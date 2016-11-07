<?php 

class Vector
{

	private $vector = [];

	public function __construct(Point $a, Point $b)
	{
		$this->vector = [($b->getX()-$a->getX()), ($b->getY()-$a->getY())];
	}

	public function getVector()
	{
		return $this->vector;
	}
}
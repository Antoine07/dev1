<?php 

class Distance{

	public function calcul(Point $p, Point $q)
	{

		return sqrt( pow($p->getX() - $q->getX(),2) + pow($p->getY() - $q->getY(),2) );
	}

}

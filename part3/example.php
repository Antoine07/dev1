<?php 


class Point{
	
    // Déclaration des variables
	private $x;
    private $y;
 	
    
    // Fonction Constructor
    public function __construct($x,$y){
    
    	$this->setX($x);
        $this->setY($y);
    }
    
    
    //Fonction set
    public function setX($x){
    	
        if (!is_numeric($x)){
        	throw new Exception('Cette valeur n\'est pas un numérique');
        }
        
          $this->x = $x;
        
    }
    
    public function setY($y){
    	
         if (!is_numeric($y)){
        	throw new Exception('Cette valeur n\'est pas un numérique');
        }
        
          $this->y = $y;
        }

    // Fonction get
    public function getX(){
    	return $this->x;
    }
    
    public function getY(){
    	return $this->y;
    }
}

$pointer = new Point ('aa',40);
echo '<pre>';
print_r($pointer);
echo '</pre>';
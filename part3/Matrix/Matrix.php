<?php 

class Matrix
{

	public function product(array $matrix1, array $matrix2)
	{

		if(count($matrix1) != count($matrix2) ) 
			throw new Exception('matrix1 and matrix2 must be same dim');

		$res = [];

		$len = count($matrix2);

		for ($i=0; $i <$len ; $i++) { 
			for ($j=0; $j <$len ; $j++) { 
				$res[$i][$j] = 0 ;
				for ($k=0; $k <$len ; $k++) { 
					// 0 0 * 0 0 + 0 1 * 1 0 , 0 0 * 0 1 + 0 1* 1 1  
					$res[$i][$j] += $matrix1[$i][$k]*$matrix2[$k][$j];
				}
			}
		}

		return $res;
	}
}
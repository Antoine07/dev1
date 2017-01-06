<?php 

class Kermit 
{

	private $pdo = null;
	private $table = 'kermits';

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	/**
     * @return array
     */
    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM `kermits`;');

        return $stmt->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `kermits` WHERE id=?");

        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

    }

    // todo
    public function create($data)
    {

    }

    // todo
    public function delte($id)
    {
    	
    }

    // todo
    public function update($data, $id)
    {

    }
}
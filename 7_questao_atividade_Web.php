<?php
class Database{
	private $host = "localhost";
	private $username = "root";
	private $password = "carlos";
	private $database ="crud";

	public function_construct(){

		return->connect();

	}


	public function getConnection(){
		return $this->conexao;
	}


	private function connect(){
		$this->conexao=mysql_connect($this->host, $this->username,$this->password, $this->database);
	}
	
}
class produtoDao{
	private $data;
	public function_construct(Database $data){
		$this->data = $data;
	}
	public function inserir(produto $produto){
		$nome = $produto->getNome();
		$preco = $produto->getPreco();
		$query = "insert into produtos(nome,preco) values(?,?)";
		$stmt = mysqli_prepare($this->data->getConnection(), $query);
		mysqli_stmt_bind_param($stmt, 'ss',$nome,$preco);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

}
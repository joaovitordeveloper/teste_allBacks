<?php

namespace App\Model;

use App\DB\Conexao;
use App\Utils\Str;
use PDOException;

require './app/db/database.php';

class Torcedor{

    private static $con;

    function __construct()
    {
        self::$con = Conexao::conexao();
    }


    public function inserir($torcedor)
    {
        try {
            $sql = 'INSERT INTO torcedor (DOCUMENTO, NOME, TELEFONE, EMAIL, CEP, ENDERECO, BAIRRO, CIDADE, UF, ATIVO) 
            VALUES(:DOCUMENTO, :NOME, :TELEFONE, :EMAIL, :CEP, :ENDERECO, :BAIRRO, :CIDADE, :UF, :ATIVO)';

            $query = self::$con->prepare($sql);
            $query->bindValue(':DOCUMENTO', Str::removeMascaras($torcedor['documento']));
            $query->bindValue(':NOME', $torcedor['nome']);
            $query->bindValue(':TELEFONE', $torcedor['telefone']);
            $query->bindValue(':EMAIL', $torcedor['email']);
            $query->bindValue(':CEP', $torcedor['cep']);
            $query->bindValue(':ENDERECO', $torcedor['endereco']);
            $query->bindValue(':BAIRRO', $torcedor['bairro']);
            $query->bindValue(':CIDADE', $torcedor['cidade']);
            $query->bindValue(':UF', $torcedor['uf']);
            $query->bindValue(':ATIVO', $torcedor['ativo']);
            $query->execute();

        return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function getTorcedores()
    {
        try {

            $sql = 'SELECT * FROM torcedor';
            $query = self::$con->prepare($sql);
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        
        } catch(PDOException $e) {
            return false;
        }
    }

    public function getTorcedorLista(){
        try {

            $sql = 'SELECT * FROM torcedor LIMIT 25';
            $query = self::$con->prepare($sql);
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        
        } catch(PDOException $e) {
            return false;
        }
    }
}
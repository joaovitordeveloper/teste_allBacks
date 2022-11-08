# All-blacks

Bem vindo ao projeto feito para a All Blacks

O projeto tem como objetivo principal pegar os dados presentes no arquivo xml e inseri-los no banco de dados, com isso apresentando na tela para o usuário final dando-lhe a opção de fazer o download de todos os torcedores em um arquivo xls. 

Na geração do arquivo xls optei por utilizar o PhpSpreadsheet pois é uma biblioteca mais nova em questão de atualização.

O phpexcel foi descontinuada e por isso não utilizei.

Na estrutura do código foi utilizado o padrão de MVC utilizando PHP, javaScript com jQuery, HTML e o bootstrap.

A listagem dos arquivos está sendo feita através do arquivo main.js.
 
# Dando inicio a execução

Para poder executar o código na máquina local antes precisa ter o composer instalado, se não tiver instalado pode baixa-lo no link https://getcomposer.org/download/.

Após baixar, execute o comando no terminal para rodar o composer, 

composer install 

Nosso projeto possui um arquivo .config.php com as configurações de banco, na pasta Configs, crie uma cópia do .configModelo.php e o renomeie para .config.php.

Os dados de banco estão logo abaixo;

Muito obrigado pela atenção.

# Dados para criação do banco

CREATE SCHEMA `teste_allbacks` ;

CREATE TABLE `torcedor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENTO` varchar(15) DEFAULT NULL,
  `NOME` varchar(250) DEFAULT NULL,
  `DATAHORAINSERT` datetime DEFAULT NULL,
  `TELEFONE` varchar(250) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `CEP` varchar(50) DEFAULT NULL,
  `ENDERECO` varchar(250) DEFAULT NULL,
  `BAIRRO` varchar(100) DEFAULT NULL,
  `CIDADE` varchar(100) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `ATIVO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


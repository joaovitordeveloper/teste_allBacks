<?php

require __DIR__.'/vendor/autoload.php';
require_once 'app/Configs/.config.php';

use App\Model\Torcedor;

$torcedoresModel = new Torcedor();
$lista = $torcedoresModel->getTorcedorLista();
$retorno = ['lista' => $lista];
echo json_encode($retorno);
exit;
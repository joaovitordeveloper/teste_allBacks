<?php

namespace App\Controller\Pages;

use App\Model\Torcedor;
use \App\Utils\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Cell\DataType as CellDataType;

/**
 * metodo responsvel por retornar o conteudo do site
 * @return string
 */
class Home extends Page{

   public static function home(){
      $torcedor = new Torcedor();

      if (isset($_POST['importar'])) {
         copy($_FILES['xmlFile']['tmp_name'], 'data/' . $_FILES['xmlFile']['name']);
        $torcedores = simplexml_load_file('data/' . $_FILES['xmlFile']['name']);

        foreach ($torcedores as $value) {
         $torcedor->inserir($value);
        }
      }

      if (isset($_POST['exportar'])) {

         $dados = $torcedor->getTorcedores();

         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet(0);
         $colunas = [];
        
            for ($col = 'A'; $col < 'K'; $col++) $colunas[] = $col;
        
            $cabecalho = ['DOCUMENTO', 'NOME', 'TELEFONE', 'EMAIL', 'CEP', 'ENDERECO', 'BAIRRO', 'CIDADE', 'UF','ATIVO'];

            foreach ($colunas as $key => $col) {
               switch ($col) {
                   case 'A':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'B':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'C':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'D':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'E':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'F':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'G':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'H':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'I':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'J':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'K':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'L':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   default:
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                       break;
               }

               $sheet->setCellValueExplicit($col . '3', $cabecalho[$key], CellDataType::TYPE_STRING)->getColumnDimension($col)->setAutoSize(true);

               $styleCabeçalho = [
                  'font' => [
                      'bold'  => true,
                      'color' => ['rgb' => 'ffffff'],
                      'size'  => 15
                  ],
                  'alignment' => [
                      'horizontal' => Alignment::HORIZONTAL_CENTER,
                      'vertical' => Alignment::VERTICAL_CENTER
                  ]
              ];
  
              $styleLinha = [
                  'font' => [
                      'bold'  => true,
                      'color' => ['rgb' => 'ffffff'],
                      'size'  => 12
                  ],
                  'alignment' => [
                      'horizontal' => Alignment::HORIZONTAL_CENTER,
                      'vertical' => Alignment::VERTICAL_CENTER
                  ]
              ];

              $corTitulo = '6495ED';
              $corLinha = '6495ED';
              $titulo = 'Lista de Torcedores Relatório ';
            }  

        $sheet->setCellValue('A1', $titulo)->mergeCells('A1:J1')->getRowDimension(1)->setRowHeight(40);
        $sheet->getStyle('A1')->applyFromArray($styleCabeçalho);
        $sheet->getStyle('A2')->applyFromArray($styleLinha);
        $sheet->getStyle('B2')->applyFromArray($styleLinha);
        $sheet->getStyle('C2')->applyFromArray($styleLinha);
        $sheet->getStyle('D2')->applyFromArray($styleLinha);
        $sheet->getStyle('E2')->applyFromArray($styleLinha);
        $sheet->getStyle('F2')->applyFromArray($styleLinha);
        $sheet->getStyle('G2')->applyFromArray($styleLinha);
        $sheet->getStyle('H2')->applyFromArray($styleLinha);
        $sheet->getStyle('I2')->applyFromArray($styleLinha);
        $sheet->getStyle('J2')->applyFromArray($styleLinha);;
        $sheet->getStyle('A3')->applyFromArray($styleLinha);
        $sheet->getStyle('B3')->applyFromArray($styleLinha);
        $sheet->getStyle('C3')->applyFromArray($styleLinha);
        $sheet->getStyle('D3')->applyFromArray($styleLinha);
        $sheet->getStyle('E3')->applyFromArray($styleLinha);
        $sheet->getStyle('F3')->applyFromArray($styleLinha);
        $sheet->getStyle('G3')->applyFromArray($styleLinha);
        $sheet->getStyle('H3')->applyFromArray($styleLinha);
        $sheet->getStyle('I3')->applyFromArray($styleLinha);
        $sheet->getStyle('J3')->applyFromArray($styleLinha);
        $sheet->getStyle('A1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corTitulo);
        $sheet->getStyle('A2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('B2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('C2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('D2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('E2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('F2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('G2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('I2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('J2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('A3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('B3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('C3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('D3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('E3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('F3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('G3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('H3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('I3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);
        $sheet->getStyle('J3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($corLinha);

        $spreadsheet->getActiveSheet(0)->setCellValue('A1', $titulo)->getColumnDimension('A')->setAutoSize(true);

        $row = 4;
        foreach ($dados as $value) {
            $sheet->setCellValueExplicit('A' . $row, !empty($value['DOCUMENTO']) ? $value['DOCUMENTO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('A')->setAutoSize(true);
            $sheet->setCellValueExplicit('B' . $row, !empty($value['NOME']) ?   $value['NOME'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('B')->setAutoSize(true);
            $sheet->setCellValueExplicit('C' . $row, !empty($value['TELEFONE']) ? $value['TELEFONE'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('C')->setAutoSize(true);            
            $sheet->setCellValueExplicit('D' . $row, !empty($value['EMAIL']) ? $value['EMAIL'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('D')->setAutoSize(true);            
            $sheet->setCellValueExplicit('E' . $row, !empty($value['CEP']) ? $value['CEP'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('E')->setAutoSize(true);            
            $sheet->setCellValueExplicit('F' . $row, !empty($value['ENDERECO']) ? $value['ENDERECO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('F')->setAutoSize(true);            
            $sheet->setCellValueExplicit('G' . $row, !empty($value['BAIRRO']) ? $value['BAIRRO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('G')->setAutoSize(true);            
            $sheet->setCellValueExplicit('H' . $row, !empty($value['CIDADE']) ? $value['CIDADE'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('H')->setAutoSize(true);            
            $sheet->setCellValueExplicit('I' . $row, !empty($value['UF']) ? $value['UF'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('I')->setAutoSize(true);            
            $sheet->setCellValueExplicit('J' . $row, !empty($value['ATIVO']) ? $value['ATIVO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('J')->setAutoSize(true);            
            $row++;
        }
        

         $fileName = 'torcedores.xls';

         $writer = new Xlsx($spreadsheet);
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
         $writer->save('php://output');
         exit();  

        }
      
      
  $content = View::render('pages/home');

    //retorna a view da paina
    return parent::getPage('All Blacks - TESTE', $content);

   }
}
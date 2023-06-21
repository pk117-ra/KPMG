<?php
/**
 * This file contains class to export data to Microsoft Excel
 *
 * @author KoolPHP Inc (support@koolphp.net)
 * @link https://www.koolphp.net
 * @copyright KoolPHP Inc
 * @license https://www.koolreport.com/license#mit-license

    $report = new myReport();
    $report->run()
    ->exportToExcel(array(
        "dataStores" => array(
            'sales' => array(
                // 'rowDimension' => 'column',
                // 'columnDimension' => 'row',
                "measures" => array(
                    "dollar_sales - sum",
                    // 'dollar_sales - count',
                ),
                'rowSort' => array(
                    // 'orderMonth' => function($a, $b) {
                    // return (int)$a > (int)$b;
                    // },
                    // 'orderDay' => function($a, $b) {
                    // return (int)$a > (int)$b;
                    // },
                    'dollar_sales - sum' => 'desc',
                ),
                'columnSort' => array(
                    'orderMonth' => function ($a, $b) {
                        return (int) $a < (int) $b;
                    },
                    // 'dollar_sales - sum' => 'desc',
                    // 'orderYear' => 'desc',
                ),
                // 'headerMap' => array(
                // 'dollar_sales - sum' => 'Sales (in USD)',
                // 'dollar_sales - count' => 'Number of Sales',
                // ),
                'headerMap' => function ($v, $f) {
                    if ($v === 'dollar_sales - sum') {
                        $v = 'Sales (in USD)';
                    }

                    if ($v === 'dollar_sales - count') {
                        $v = 'Number of Sales';
                    }

                    if ($f === 'orderYear') {
                        $v = 'Year ' . $v;
                    }

                    return $v;
                },
                // 'dataMap' => function($v, $f) {return $v;},
            ),
        ),
    ))
    ->toBrowser("myReport.xlsx");

 */

namespace koolreport\pivot;

use \koolreport\core\Utility as Util;
use \PhpOffice\PhpSpreadsheet as ps;

class PivotExcelExport
{
    public function saveDataStoreToSheet($dataStore, $sheet, $option)
    {
        $totalName = Util::get($option, 'totalName', 'Total');
        $emptyValue = Util::get($option, 'emptyValue', '-');
        $headerMap = Util::get($option, 'headerMap', array());
        $dataMap = Util::get($option, 'dataMap', array());
        $colMetas = $dataStore->meta()['columns'];
        // echo "colMetas = "; print_r($colMetas); echo " <br> ";

        $pivotUtil = new PivotUtil($dataStore, $option);
        $fni = $pivotUtil->getFieldsNodesIndexes();
        $rowNodes = $fni['mappedRowNodes'];
        $rowNodesInfo = $fni['rowNodesInfo'];
        $rowIndexes = $fni['rowIndexes'];
        $rowFields = array_values($fni['rowFields']);
        $colNodes = $fni['mappedColNodes'];
        $colNodesInfo = $fni['colNodesInfo'];
        $colIndexes = $fni['colIndexes'];
        $colFields = array_values($fni['colFields']);
        $mappedDataFields = $fni['mappedDataFields'];
        $dataFields = array_values($fni['dataFields']);
        $indexToData = $fni['indexToData'];

        $startCol = Util::get($option, 'startColumn', 1);
        $startRow = Util::get($option, 'startRow', 1);

        $cell = ps\Cell\Coordinate::stringFromColumnIndex($startCol) . ($startRow);
        $endCell = ps\Cell\Coordinate::stringFromColumnIndex(
            $startCol + count($rowFields) - 1) . ($startRow + count($colFields) - 1);
        $sheet->setCellValue($cell, implode(' | ', $mappedDataFields));
        $sheet->mergeCells($cell . ":" . $endCell);
        $sheet->getStyle($cell)->getAlignment()->setHorizontal(
            ps\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($cell)->getAlignment()->setVertical(
            ps\Style\Alignment::VERTICAL_TOP);

        foreach ($colFields as $i => $f) {
            foreach ($colIndexes as $c => $j) {
                $node = $colNodes[$j];
                $nodeMark = $colNodesInfo[$j];
                $colTotalHeader = isset($nodeMark[$f]['total']);
                if (isset($nodeMark[$f]['numChildren'])) {
                    $row = $startRow + $i;
                    $col = $startCol + count($rowFields) + $c * count($dataFields);
                    $rowspan = $colTotalHeader ? $nodeMark[$f]['level'] : 1;
                    $colspan = $nodeMark[$f]['numChildren'];
                    $endRow = $row + $rowspan - 1;
                    $endCol = $col + $colspan - 1;
                    $cell = ps\Cell\Coordinate::stringFromColumnIndex($col) . $row;
                    $endCell = ps\Cell\Coordinate::stringFromColumnIndex($endCol) . $endRow;
                    $sheet->mergeCells($cell . ":" . $endCell);

                    $value = $node[$f];
                    $sheet->getCell($cell)->setValue($value);
                    $sheet->getStyle($cell)->getAlignment()->setHorizontal(
                        ps\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle($cell)->getAlignment()->setVertical(
                        ps\Style\Alignment::VERTICAL_TOP);
                }
            }
        }

        $maxLength = array_fill(0, count($rowFields), 0);
        foreach ($rowIndexes as $r => $i) {
            $node = $rowNodes[$i];
            $nodeMark = $rowNodesInfo[$i];
            foreach ($rowFields as $j => $f) {
                $rowTotalHeader = isset($nodeMark[$f]['total']);
                if (isset($nodeMark[$f]['numChildren'])) {
                    $row = $startRow + count($colFields) + $r;
                    $col = $startCol + $j;
                    $rowspan = $nodeMark[$f]['numChildren'];
                    $colspan = $rowTotalHeader ? $nodeMark[$f]['level'] : 1;
                    $endRow = $row + $rowspan - 1;
                    $endCol = $col + $colspan - 1;
                    $cell = ps\Cell\Coordinate::stringFromColumnIndex($col) . $row;
                    $endCell = ps\Cell\Coordinate::stringFromColumnIndex($endCol) . $endRow;
                    $sheet->mergeCells($cell . ":" . $endCell);

                    $value = $node[$f];
                    $sheet->getCell($cell)->setValue($value);
                    $sheet->getStyle($cell)->getAlignment()->setVertical(
                        ps\Style\Alignment::VERTICAL_CENTER);
                    if ($maxLength[$j] < strlen($value)) {
                        $maxLength[$j] = strlen($value);
                    }

                }
            }

            foreach ($colIndexes as $c => $j) {
                $dataRow = isset($indexToData[$i][$j]) ?
                $indexToData[$i][$j] : array();
                foreach ($dataFields as $k => $df) {
                    $col = ps\Cell\Coordinate::stringFromColumnIndex(
                        $startCol + count($rowFields) + $c * count($dataFields) + $k);
                    $row = $startRow + count($colFields) + $r;
                    $cell = $col . $row;
                    if (isset($dataRow[$df])) {
                        $value = $dataRow[$df];
                        $colMeta = Util::get($colMetas, $df, 'string');
                        $type = Util::get($colMeta, 'type', 'string');
                        $format = $colMeta;
                        $formatCode = "";
                        switch ($type) {
                            case "number":
                                $decimals = Util::get($format,"decimals",0);
                                $dec_point = Util::get($format,"dec_point",".");
                                $thousand_sep = Util::get($format,"thousand_sep",",");
                                $prefix = Util::get($format,"prefix","");
                                $suffix = Util::get($format,"suffix","");
                                $formatCode = "\"{$prefix}\"#{$thousand_sep}##0{$dec_point}00\"{$suffix}\"";
                                break;
                            default:
                                $value = Util::format($value, $format);
                                break;
                        }
                        
                    } else {
                        $value = $emptyValue;
                    }
                    $sheet->getCell($cell)->setValue($value);
                    $style = $sheet->getStyle($cell);
                    if (! empty($formatCode)) {
                        $style->getNumberFormat()->setFormatCode($formatCode);
                    }
                    $style->getAlignment()->setHorizontal(
                        ps\Style\Alignment::HORIZONTAL_RIGHT);

                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        }

        for ($i = 0; $i < sizeof($maxLength); $i++) {
            $col = ps\Cell\Coordinate::stringFromColumnIndex($startCol + $i);
            // $sheet->getColumnDimension($col)->setWidth($maxLength[$i]);
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }

    public function saveContentToSheet($content, $sheet, $chartDataSheet)
    {
        $highestRow = $sheet->getHighestDataRow(); // e.g. 10
        $highestColumn = $sheet->getHighestDataColumn(); // e.g 'F'
        $range = 'A' . $highestRow . ':' . $highestColumn . $highestRow;
        $data = $sheet->rangeToArray(
            $range, NULL, TRUE, FALSE);
        // echo "range = "; print_r($range); echo " <br> ";
        // echo "data = "; print_r($data); echo " <br> ";
        $emptySheet = true;
        foreach ($data as $rows) {
            foreach ($rows as $row) {
                if (! empty($row)) {
                    $emptySheet = false;
                    break; break;
                }
            }
        }
        if (! $emptySheet) $highestRow++;
        $option = $content;
        $option['startRow'] = $highestRow;

        $cell = "A" . ($highestRow);
        $contentAttrs = $content['attributes'];
        $dataSource = $content['dataSource'];
        $cell = Util::get($contentAttrs, 'cell', $cell);
        $range = "$cell:$cell";
        $range = Util::get($contentAttrs, 'range', $range);
        $range = explode(":", $range);
        $this->saveDataStoreToSheet($dataSource, $sheet, $option);
    }

}

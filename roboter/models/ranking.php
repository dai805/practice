<?php

class CsvModel
{
    private $csv_file;
    public function __construct($csv_file)
    {
        $this->$csv_file = $csv_file;
        // CSVファイルがない場合はCSVファイルを作成する。
    }
}

class RankingModel extends CsvModel
{

}

?>
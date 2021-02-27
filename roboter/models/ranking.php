<?php

class CsvModel
{
    public function __construct($csv_file)
    {
        $csvpath = dirname(__FILE__)."/../../" . $csv_file;
        // CSVファイルがない場合はCSVファイルを作成する。
        if(!file_exists($csvpath))
        {
            touch($csvpath);
        }
    }
}

class RankingModel extends CsvModel
{
    
}

?>
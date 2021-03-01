<?php

/* 定数宣言 */
define('RANKING_CSV_FILE_PATH', 'ranking.csv');
define('RANKING_COLUMN_NAME', 'NAME');
define('RANKING_COLUMN_COUNT', 'COUNT');

/**
 * CsvModelクラス
 * CSVファイルを作成する
 */
class CsvModel
{
    public function __construct($csvpath)
    {
        // $csvpath = dirname(__FILE__)."/../../" . $csv_file;
        // CSVファイルがない場合はCSVファイルを作成する。
        if(!file_exists($csvpath))
        {
            touch($csvpath);
        }
    }
}

/**
 * RankingModelクラス
 * 
 */
class RankingModel extends CsvModel
{
    /**
     * 
     */
    public function __construct($csv_file=NULL)
    {
        if(is_null($csv_file))
        {
            $csv_file = $this->get_csv_file();
            parent::__construct($csv_file);
            $columns = array(RANKING_COLUMN_NAME, RANKING_COLUMN_COUNT);
            $this->write_csv($csv_file, $columns);
        }
    }

    /**
     * 
     */
    public function get_csv_file()
    {
        $csv_file_path = NULL;
        try{
            $dir = dirname(__FILE__)."/../../";
            $csv_file_path = $dir . RANKING_CSV_FILE_PATH;
            // iniファイルの読み込み
            // $ini_ary = parse_ini_file($dir.'setting.ini', true);
            // print($ini_ary['RANKING']['URL']);
        }catch(Exception $e){
            print("捕捉した例外：". $e->getMessage() ."\n");
        }
        return $csv_file_path;
    }

    /**
     * CSVファイルへの書き込み
     */
    public function write_csv($csvfile, $records)
    {
        $fp = fopen($csvfile, 'w');
        fputcsv($fp, $records);
        fclose($fp);
    }

    /**
     * 人気店の取得
     */
    public function get_most_popular()
    {
        
    }
}

?>
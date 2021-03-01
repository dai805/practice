<?php
require(dirname(__FILE__)."/../models/ranking.php");
const DEFAULT_ROBOT_NAME = 'roboko';

/**
 * Robotクラス
 * 
 */
class Robot
{
    private $name;
    private $user_name;

    public function __construct($name=DEFAULT_ROBOT_NAME, $user_name='')
    {
        $this->name = $name;
        $this->user_name = $user_name;
    }
    
    public function hello()
    {
        $rankingmodel = new RankingModel();

        // 後で戻す
        // $csvpath = dirname(__FILE__)."/../../" . "ranking.csv";
        // $csvmodel = new CsvModel($csvpath);
        // $keywords = array("restaurant" => 'ABC Restaurant');
        // $tmp = $this->template_replace('greeting.txt', $keywords);
    }

    /**
     * 読み込んだファイルの内容をキーワードで置換する
     * 
     * @param string $filename ファイル名
     * @param array 置換するキーワード
     * @return string ファイルの内容（置換済み）
     */
    public function template_replace($filename, $keywords)
    {
        $str = file_get_contents(dirname(__FILE__)."/../templates/". $filename);
        foreach($keywords as $keyword => $value)
        {
            $ret = str_replace("$".$keyword, $value, $str);
            $str = $ret;
        }
        return $str;
    }
}

/**
 * RestaurantRobotクラス
 * 
 */
class RestaurantRobot extends Robot
{
    public function __construct($name=DEFAULT_ROBOT_NAME)
    {
        parent::__construct($name);
    }
}
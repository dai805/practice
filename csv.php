<?php

/**
 * CSVファイルを読み込みデータを配列で取得する。
 * 取得出来ない場合はfalseを返す。
 *
 * @param string $filename
 * @return array|bool
 */
function read_csv($filename)
{
    $filepath = __DIR__ ."\\" . $filename;

    // ファイル読み込み
    if(($fp = fopen($filepath, 'r')) === false)
    {
        exit("CSVファイル読み込みエラー");
    };

    // CSVファイルを一行ずつカンマ区切りで配列に保存
    while($line = fgetcsv($fp))
    {
        $records[] = $line;
    }
    return $records;
}

/**
 * CSVファイルにデータを書き込む。
 *
 * @param string $filename
 */
function write_csv($filename, $records)
{
    $filepath = __DIR__ ."\\" . $filename;
    $fp = fopen($filename, 'w');

    foreach($records as $data)
    {
        $line = implode(',' , $data);
        fwrite($fp, $line . "\n");
    }
    fclose($fp);
}

?>
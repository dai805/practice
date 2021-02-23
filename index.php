<?php
require('csv.php');

$greeting = "こんにちは！私はRobokoです。あなたの名前は何ですか？\n";
print($greeting);
$your_name = trim(fgets(STDIN));

$records = read_csv('ranking.csv');
$recordsSorted = $records;
foreach($records as $value){
    $key_ary[] = $value[0];
    $value_ary[] = $value[1];
}

array_multisort($value_ary, SORT_DESC, SORT_NUMERIC, $key_ary, SORT_ASC, SORT_STRING, $recordsSorted);

$cnt = 0;
$recommendCnt = count($recordsSorted);
while(1)
{
    $recommend = "私のオススメのレストランは、". $recordsSorted[$cnt][0] ."です。\nこのレストランは好きですか？[Yes/No]";
    print($recommend);
    $ans = strtoupper(trim(fgets(STDIN)));
    if($ans !== 'YES' && $ans !== 'NO'){
        print('Yes/Noで回答してください。\n');
    }else if($ans === 'YES'){
        break;
    }else{
        $cnt++;
        if($recommendCnt === $cnt)
        {
            break;
        }
    }
}

$msg = $your_name. "さん。どこのレストランが好きですか？\n";
print($msg);
$restaurant = mb_convert_case(trim(fgets(STDIN)), MB_CASE_TITLE);

for($i = 0; $i < $recommendCnt; $i++)
{
    if($restaurant === $records[$i][0])
    {
        $records[$i][1] = (string)((int)$records[$i][1] + 1);
        break;
    }else{
        if($i === $recommendCnt -1)
        {
            $records[] = array($restaurant,1);
        }
    }
}

write_csv('ranking.csv', $records);

$bye = $your_name . "さん。ありがとうございました。\n良い一日を！さようなら。";
print($bye);

?>
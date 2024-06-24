<?php
include('simple_html_dom.php');
$html = file_get_html("https://2sport.tv/league/premier-league-8");
$list = [];

$items = $html->find(".list-match-table" , 0);
foreach($items->find(".common-table-row") as $map ) {
    
    $date = $map->find("span" , 0 );
    $league = $map->find(".league-name" , 0);
    $link = $items->find("a" , 0);
    
    $list[] = [

        "league-name"=> $league->plaintext,
        "date"=> $date-> plaintext,
        "link"=> $link-> href
    ];

};

echo(json_encode($list , JSON_PRETTY_PRINT));

?>
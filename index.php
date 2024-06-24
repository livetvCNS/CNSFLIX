<?php
include('simple_html_dom.php');
$geturl = $_GET['url'];
if($geturl){
$html = file_get_html("$geturl");
$list = [];
if($html){
foreach($html->find(".common-table-row") as $map ) {
    
    if($map->find(".match-time" , 0 )) {
    $date = $map->find(".match-time" , 0 );
     }else {
        $date = $map->find(".txt-green" , 0 );
   };
    $league = $map->find(".league-name" , 0);
    $home_title = $map->find(".club-name" ,0);
     $away_title = $map->find(".club-name" ,1);
      $link = $html->find(".common-table-row" , 0);
    if($map->find(".score-wrapper" ,0)){
     $score = $map->find(".score-wrapper" ,0);
    }
    
    
    $list[] = [
      "home-title" => $home_title->plaintext,
      "away-title" => $away_title->plaintext,
       "league-name"=> $league->plaintext,
       "date"=> $date-> plaintext,
       "score"=> $score->plaintext,
      "link"=> $score->href
    ];

};

if($list){
    echo(json_encode($list , JSON_PRETTY_PRINT));
};

};
};

?>
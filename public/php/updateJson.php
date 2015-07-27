<?php

function appendToJson(){
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  $inp = file_get_contents('../api/comments.json');
  $tempArray = json_decode($inp);
  array_push($tempArray, $request);
  $jsonData = json_encode($tempArray);
  file_put_contents('../api/comments.json', $jsonData);
}
appendToJson();
?>

<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = "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";
$open_ai = new OpenAi($open_ai_key);


// var_dump($open_ai);

$complete = $open_ai->completion([
    "model" => "text-davinci-003",
    "prompt" => "Comment vas-tu ?",
    "temperature" => 0.9,
    "max_tokens" => 150,
    "top_p" => 2,
    "frequency_penalty" => 0,
    "presence_penalty" => 0.6,
    "n" => 2
]);



$json = json_decode($complete);
print_r($json);
$array = (array) $json;
// echo $array['id'];
$array2 = $array['choices'];
$array3 = (array) $array2[0];
// echo ($array3['text']);


?>
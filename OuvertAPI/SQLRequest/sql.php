<?php
if (isset($_GET['query']) && $_GET['query'] != '') {
    $url = 'https://api.openai.com/v1/completions';

    $data = [
        'model' => 'text-davinci-003',
        'prompt' => $_GET['query'],
        'temperature' => 0.3,
        'max_tokens' => 60,
        'top_p' => 1.0,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.0,
        'stop' => '["#", ";"]'
    ];

    $curl = curl_init($url);

    // 1. Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // 2. Set the CURLOPT_POST option to true for POST request
    curl_setopt($curl, CURLOPT_POST, true);

    // 3. Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    // 4. Set custom headers for RapidAPI Auth and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer [VOTRE CLE API]',
    ]);

    // Execute cURL request with all previous settings
    
    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="get" >
          <label for="query">Enter your query string:</label>
          <input id="query" type="text" name="query" />
          <br />
          <button type="submit" name="submit">Search</button>
    </form>
  <br />
  <p id="ecrit" style="color:red"></p>
  <?php
  if (!empty($response)) {
      echo $_GET['query'];
      echo '<br>';
      print_r($response['choices'][0]['text']);
  }
  ?>



</body>
</html>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - ChatGPT</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>Discutez avec Chat GPT</h1>

<?php

  function callOpenAI($message) {
    $openai_endpoint = "https://api.openai.com/v1/chat/completions";
    $openai_token = $_ENV['OPEN_AI_KEY'];

    $data = array(
      "model" => "gpt-3.5-turbo",
      "messages" => array(
        array(
          "role" => "system",
          "content" => "Vous parlez avec ChatGPT."
        ),
        array(
          "role" => "user",
          "content" => $message
        )
      ),
      "max_tokens" => 100,
      "temperature" => 0.7,
    );
  }

?>

<form method="POST">
  <input type="text" name="message" placeholder="Entrez un message..." required>
  <input type="submit" value="Envoyer">
</form>

</body>
</html>

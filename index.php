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
  }

?>

<form method="POST">
  <input type="text" name="message" placeholder="Entrez un message..." required>
  <input type="submit" value="Envoyer">
</form>

</body>
</html>

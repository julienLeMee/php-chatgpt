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

  require_once __DIR__ . '/vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  function callOpenAI($message) {
    $openai_endpoint = "https://api.openai.com/v1/chat/completions";
    $openai_token = $_ENV['OPEN_AI_KEY_2'];

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

    $headers = array(
      "Content-Type: application/json",
      "Authorization: Bearer $openai_token"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $openai_endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
  }

  if(isset($_POST['message']) && isset($_POST['ok'])) {
    $message = $_POST['message'];
    $response = callOpenAI($message);
    $data = json_decode($response, true);
    echo "<p>" . $data['choices'][0]['message']['content'] . "</p>";
  }

?>

<form method="POST">
  <input type="text" name="message" placeholder="Entrez un message..." required>
  <input type="submit" name="ok" value="Envoyer">
</form>

</body>
</html>

<?php
require_once '../response.php';

function getProductsByCategory(string $category_name)
{
  error_reporting(0);
  $mysqli = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
  if ($mysqli->connect_error)
    return response_soap(false, 'Failed connection: ' . $mysqli->connect_error);

  $stmt = $mysqli->prepare('CALL getProductsByCategory(?)');
  if (!$stmt)
    return response_soap(false, 'Preparation failed: ' . $mysqli->error);

  if (!$stmt->bind_param('s', $category_name))
    return response_soap(false, 'Parameter binding failed: ' . $stmt->error);

  if (!$stmt->execute())
    return response_soap(false, 'Failed execution: ' . $stmt->error);

  $result = $stmt->get_result();
  if (!$result)
    return response_soap(false, 'Failed get result: ' . $stmt->error);

  if ($result->num_rows === 0)
    return response_soap(false, 'Error: There is no data for the category entered');

  while ($row = $result->fetch_assoc())
    $data[] = $row;

  $stmt->close();
  $mysqli->close();

  return response_soap(true, 'Data successfully obtained!', $data);
}
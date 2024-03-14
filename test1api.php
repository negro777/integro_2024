<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

function is_palindrome($input) {
    $input = strtolower($input);
    $input = preg_replace("/[^a-z0-9]/i", "", $input);
    return $input === strrev($input);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);
    $input = $data['text']; 
    $isPalindrome = is_palindrome($input);

  
    echo json_encode(["isPalindrome" => $isPalindrome]);
} else {
   
    echo json_encode(["error" => "Only POST method is accepted"]);
}
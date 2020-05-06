<?php
function string_trim($string, $max_string_length = 300)
{
  if (mb_strlen($string) <= $max_string_length) {
    return "<p>$string</p>";
  } else {
    $words = explode(' ', $string);
    $sum = 0;
    $max_element = 0;
    for ($i = 0; $i < count($words); $i++) {
      $sum += mb_strlen($words[$i]);
      if ($sum > $max_string_length) {
        $max_element = $i--;
        break;
      }
    }
    $words = array_slice($words, 0, $max_element);
    $new_string = implode(' ', $words);
    $new_string .= '...';
    return <<<HTML
      <p>$new_string</p>
      <a class="post-text__more-link" href="#">Читать далее</a>
      HTML;
  }
};

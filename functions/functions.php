<?php
function string_trim($string, $max_string_length = 300)
{
    $string = htmlspecialchars($string);
    if (mb_strlen($string) <= $max_string_length) {
        $result = "<p>$string</p>";
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
        $result = <<<HTML
      <p>$new_string</p>
      <a class="post-text__more-link" href="#">Читать далее</a>
HTML;
    }
    return $result;
};

function relative_date($post_date, $user = true)
{
    $last = ' назад';
    if ($user) {
        $last = ' на сайте';
    }
    $past = strtotime($post_date);
    $present = time();
    $diff = $present - $past;
    $result = null;
    if (floor($diff / 60) < 60) {
        $result = floor($diff / 60) . ' ' .
            get_noun_plural_form(
                floor($diff / 60),
                'минута',
                'минуты',
                'минут'
            ) .
            $last;
    } elseif (floor($diff / 3600) < 24) {
        $result = floor($diff / 3600) . ' ' .
            get_noun_plural_form(
                floor($diff / 3600),
                'час',
                'часа',
                'часов'
            ) .
            $last;
    } elseif (floor($diff / 86400) < 7) {
        $result = floor($diff / 86400) . ' ' .
            get_noun_plural_form(
                floor($diff / 86400),
                'день',
                'дня',
                'дней'
            ) .
            $last;
    } elseif (floor($diff / 604800) < 5) {
        $result = floor($diff / 604800) . ' ' .
            get_noun_plural_form(
                floor($diff / 604800),
                'неделя',
                'недели',
                'недель'
            ) .
            $last;
    } elseif (floor($diff / 2419200) < 13) {
        $result = floor($diff / 2419200) . ' ' .
            get_noun_plural_form(
                floor($diff / 2419200),
                'месяц',
                'месяца',
                'месяцев'
            ) .
            $last;
    } else {
        $result = floor($diff / 29030400) . ' ' .
            get_noun_plural_form(
                floor($diff / 29030400),
                'год',
                'года',
                'лет'
            ) .
            $last;
    }
    return $result;
};

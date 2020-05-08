<?php
require_once('functions/functions.php');
require_once('helpers.php');

$is_auth = rand(0, 1);

$user_name = 'ivan'; // укажите здесь ваше имя

$title = 'readme: популярное';

$cards = [
  [
    'heading' => 'Цитата',
    'type' => 'post-quote',
    'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
    'user_name' => 'Лариса',
    'avatar' =>  'userpic-larisa-small.jpg'
  ],
  [
    'heading' => 'Игра престолов',
    'type' => 'post-text',
    'content' => 'Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала!',
    'user_name' => 'Владик',
    'avatar' => 'userpic.jpg'
  ],
  [
    'heading' => 'Наконец, обработал фотки!',
    'type' => 'post-photo',
    'content' => 'rock-medium.jpg',
    'user_name' => 'Виктор',
    'avatar' => 'userpic-mark.jpg'
  ],
  [
    'heading' => 'Моя мечта',
    'type' => 'post-video',
    'content' => 'coast-medium.jpg',
    'user_name' => 'Лариса',
    'avatar' => 'userpic-larisa-small.jpg'
  ],
  [
    'heading' => 'Лучшие курсы',
    'type' => 'post-link',
    'content' => 'www.htmlacademy.ru',
    'user_name' => 'Владик',
    'avatar' => 'userpic.jpg'
  ]
];

$content = include_template('main.php', [
    'cards' => $cards
]);

$layout = include_template('layout.php', [
    'title' => $title,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'content' => $content
]);

print($layout);

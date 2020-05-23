USE readme;

INSERT INTO content_types (name)
VALUES
  ('post-quote'),
  ('post-text'),
  ('post-photo'),
  ('post-video'),
  ('post-link');

INSERT INTO users (email, login_user, password_user)
VALUES
  ('bulba@rb.by', 'lukashenko', 'gazgazgaz'),
  ('balalaika@rf.ru', 'putin', 'whoifnotme');

INSERT INTO comments (content)
VALUES
  ('Ого! Восхитительно! Я в восторге!'),
  ('Мдэ... Ну такое...');

INSERT INTO posts (heading, paragraph, image_post, video, link)
VALUES
  (
    'Цитата',
    'Мы в жизни любим только раз, а после ищем лишь похожих',
    null,
    null,
    null
  ),
  (
    'Игра престолов',
    'Не могу дождаться начала финального сезона своего любимого сериала!',
    null,
    null,
    null
  ),
  (
    'Наконец, обработал фотки!',
    null,
    'rock-medium.jpg',
    null,
    null
  ),
  (
    'Моя мечта',
    null,
    null,
    'coast-medium.jpg',
    null
  ),
  (
    'Лучшие курсы',
    null,
    null,
    null,
    'www.htmlacademy.ru'
  );

SELECT
  p.*,
  u.login_user,
  t.name
FROM posts AS p
JOIN users AS u ON u.id = p.post_author_ID
JOIN content_types AS t ON t.id = p.content_type_ID
ORDER BY
  count_views DESC;

SELECT
  p.*,
  u.login_user
FROM posts AS p
JOIN users AS u ON u.login_user = 'lukashenko'
  AND u.id = p.post_author_ID;

  -- SELECT p.*, u.login_user
  -- FROM posts AS p
  -- JOIN users AS u ON u.id = p.post_author_ID
  -- WHERE u.login_user = 'lukashenko';

SELECT
  c.*,
  u.login_user
FROM comments AS c
JOIN users AS u ON u.id = c.author_ID
JOIN posts AS p ON p.id = c.post_ID
WHERE
  p.id = "1";

INSERT INTO likes AS l (user_ID, post_ID)
VALUES
  (
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.id = l.user_ID
    ),
    (
      SELECT
        p.id
      FROM posts AS p
      WHERE
        p.id = l.post_ID
    )
  );

INSERT INTO subscriptions AS s (author_ID, subscribe_ID)
VALUES
  (
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.id = s.author_ID
    ),
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.id = s.subscribe_ID
    )
  )

USE readme;

-- Fill content-types table

INSERT INTO content_types (title, class_name, icon_width, icon_height)
VALUES
  ('Цитата', 'post-quote', 21, 20),
  ('Текст', 'post-text', 20, 21),
  ('Картинка', 'post-photo', 22, 18),
  ('Видео', 'post-video', 24, 16),
  ('Ссылка', 'post-link', 21, 18);

-- Fill users table

INSERT INTO users (email, login_user, password_user, avatar)
VALUES
  (
    'larisa111@mail.ru',
    'Лариса',
    'secret123',
    'userpic-larisa-small.jpg'
  ),
  (
    'vladik111@mail.ru',
    'Владик',
    'secret123',
    'userpic.jpg'
  ),
  (
    'viktor111@mail.ru',
    'Виктор',
    'secret123',
    'userpic-mark.jpg'
  );

-- Fill posts table

INSERT INTO posts (heading, paragraph, image_post, video, link, author, post_author_ID, content_type_ID)
VALUES
  (
    'Цитата',
    'Мы в жизни любим только раз, а после ищем лишь похожих',
    null,
    null,
    null,
    'Автор цитаты',
    1,
    1
  ),
  (
    'Игра престолов',
    'Не могу дождаться начала финального сезона своего любимого сериала!',
    null,
    null,
    null,
    null,
    2,
    2
  ),
  (
    'Наконец, обработал фотки!',
    null,
    'rock-medium.jpg',
    null,
    null,
    null,
    3,
    3
  ),
  (
    'Моя мечта',
    null,
    null,
    'coast-medium.jpg',
    null,
    null,
    1,
    4
  ),
  (
    'Лучшие курсы',
    null,
    null,
    null,
    'www.htmlacademy.ru',
    null,
    2,
    5
  );

-- Fill comments table

INSERT INTO comments (content, author_ID, post_ID)
VALUES
  (
    'Ого! Восхитительно! Я в восторге!',
    1,
    2
  ),
  (
    'Мдэ... Ну такое...',
    3,
    2
  );

-- List of posts whith users names and types of content + sorting by views

SELECT
  p.*,
  u.login_user,
  c.class_name
FROM posts AS p
JOIN users AS u ON u.id = p.post_author_ID
JOIN content_types AS c ON c.id = p.content_type_ID
ORDER BY
  count_views DESC;

-- List of posts for current user only

SELECT
  p.*,
  u.login_user
FROM posts AS p
JOIN users AS u ON u.login_user = 'Лариса'
  AND u.id = p.post_author_ID;

-- List of comments for current post + users names

SELECT
  c.*,
  u.login_user
FROM comments AS c
JOIN users AS u ON u.id = c.author_ID
WHERE
  c.post_ID = 2;

-- Add like to post

INSERT INTO likes (user_ID, post_ID)
VALUES
  (
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.login_user = 'Лариса'
    ),
    2
  );

-- Subscribe to user

INSERT INTO subscriptions (author_ID, subscribe_ID)
VALUES
  (
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.login_user = 'Виктор'
    ),
    (
      SELECT
        u.id
      FROM users AS u
      WHERE
        u.login_user ='Лариса'
    )
  );

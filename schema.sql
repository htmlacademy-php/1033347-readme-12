CREATE DATABASE IF NOT EXISTS readme DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE readme;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) UNIQUE NOT NULL,
  login_user VARCHAR(128) UNIQUE NOT NULL,
  password_user VARCHAR(255) NOT NULL,
  avatar TEXT
);

CREATE TABLE IF NOT EXISTS hashtags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hashtag CHAR
);

CREATE TABLE IF NOT EXISTS content_types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(128),
  class_name VARCHAR(128),
  icon_width INT,
  icon_height INT
);

CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  heading VARCHAR(256) NOT NULL,
  paragraph TEXT,
  author VARCHAR(128),
  image_post TEXT,
  video TEXT,
  link TEXT,
  count_views INT,
  is_repost BIT,
  origin_author_ID INT,
  post_author_ID INT NOT NULL,
  content_type_ID INT NOT NULL,
  FOREIGN KEY (post_author_ID) REFERENCES users(id),
  FOREIGN KEY (content_type_ID) REFERENCES content_types(id)
);

CREATE TABLE IF NOT EXISTS posts_hashtags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  post_ID INT,
  hashtag_ID INT,
  FOREIGN KEY (post_ID) REFERENCES posts(id),
  FOREIGN KEY (hashtag_ID) REFERENCES hashtags(id)
);

CREATE TABLE IF NOT EXISTS comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_comment TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  content TEXT NOT NULL,
  author_ID INT NOT NULL,
  post_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (post_ID) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS likes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_ID INT NOT NULL,
  post_ID INT NOT NULL,
  FOREIGN KEY (user_ID) REFERENCES users(id),
  FOREIGN KEY (post_ID) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS subscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  author_ID INT NOT NULL,
  subscribe_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (subscribe_ID) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  content TEXT,
  author_ID INT NOT NULL,
  receiver_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (receiver_ID) REFERENCES users(id)
);

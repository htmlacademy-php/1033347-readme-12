CREATE DATABASE readme DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE readme;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) UNIQUE NOT NULL,
  login_user VARCHAR(128) UNIQUE NOT NULL,
  password_user VARCHAR(255) NOT NULL,
  avatar TEXT
);
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  heading CHAR NOT NULL,
  paragraph TEXT NOT NULL,
  author VARCHAR(128) NOT NULL,
  image_post TEXT,
  video TEXT NOT NULL,
  link TEXT NOT NULL,
  count_views INT,
  post_author_ID INT NOT NULL,
  content_type_ID INT NOT NULL,
  hashtag_ID INT NOT NULL,
  FOREIGN KEY (post_author_ID) REFERENCES users(id),
  FOREIGN KEY (content_type_ID) REFERENCES content_types(id),
  FOREIGN KEY (hashtag_ID) REFERENCES hashtags(id)
);
CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_comment TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  content TEXT NOT NULL,
  author_ID INT NOT NULL,
  post_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (post_ID) REFERENCES posts(id)
);
CREATE TABLE likes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_ID INT NOT NULL,
  post_ID INT NOT NULL,
  FOREIGN KEY (user_ID) REFERENCES users(id),
  FOREIGN KEY (post_ID) REFERENCES posts(id)
);
CREATE TABLE subscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  author_ID INT NOT NULL,
  subscribe_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (subscribe_ID) REFERENCES users(id)
);
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  content TEXT,
  author_ID INT NOT NULL,
  receiver_ID INT NOT NULL,
  FOREIGN KEY (author_ID) REFERENCES users(id),
  FOREIGN KEY (receiver_ID) REFERENCES users(id)
);
CREATE TABLE hashtags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hashtag CHAR
);
CREATE TABLE content_types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content_type VARCHAR(128),
  class VARCHAR(128)
);

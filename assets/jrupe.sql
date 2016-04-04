CREATE TABLE users (
  id       INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64)  NOT NULL,
  password VARCHAR(255) NOT NULL,
  console  VARCHAR(4),
  about    VARCHAR(255)
);

CREATE TABLE events (
  id       INT        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sherpa   INT        NOT NULL,
  console  VARCHAR(4) NOT NULL,
  activity INT        NOT NULL,
  start    DATETIME   NOT NULL,
  other    VARCHAR(255)
);

CREATE TABLE activities (
  id   INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(32) NOT NULL
);

CREATE TABLE user_event (
  id    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user  INT NOT NULL,
  event INT NOT NULL
);

CREATE TABLE logins (
  id        INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id   INT  NOT NULL,
  phpsessid TEXT NOT NULL
);

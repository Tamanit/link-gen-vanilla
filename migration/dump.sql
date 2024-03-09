DROP TABLE IF EXISTS URLS;
CREATE TABLE urls (
    id serial PRIMARY KEY,
    url varchar(500),
    token varchar(8) UNIQUE,
 time_expire timestamp)

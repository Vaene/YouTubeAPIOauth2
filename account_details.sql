

CREATE TABLE IF NOT EXISTS `account_detai;s` (
  
  `ad_id` bigint(16) unsigned NOT NULL DEFAULT '0',
  `password` varchar(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `id_key` varchar(128) NOT NULL,
  `app_name` varchar(64) NOT NULL,
  `client_id` varchar(256) NOT NULL,
  `client_email_address` varchar(256) NOT NULL,
  `client_secret` varchar(256) NOT NULL,
  `redirect_uris` varchar(256) NOT NULL,
  `javascript_origins` varchar(256) NOT NULL,
  `access_token` varchar(64) NOT NULL,
  `token_type` varchar(64) NOT NULL,
  `expires_in` int(12) NOT NULL,
  `id_token` longtext NOT NULL,
  `refresh_token` varchar(64) NOT NULL,
  `created` int(12) NOT NULL,
  `updated` int(12) NOT NULL,
  PRIMARY KEY (`ad_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

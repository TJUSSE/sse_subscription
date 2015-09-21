sse_subscription
================

[![Dependency Status](https://www.versioneye.com/user/projects/55fd3528ddc3cf001a0002df/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55fd3528ddc3cf001a0002df)

使用本模块前需要先安装第三方库：

```bash
# cd sseweb/sites/default/modules/sse_subscription
composer install
```

-- --------------------------------------------------------

###表的结构 `sse_subscribe_mail`

```SQL
CREATE TABLE IF NOT EXISTS `sse_subscribe_mail` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cancel_token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;
```

-- --------------------------------------------------------

###表的结构 `sse_subscribe_events`

```SQL
CREATE TABLE IF NOT EXISTS `sse_subscribe_events` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `at` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `ua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `at` (`at`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;
```

-- --------------------------------------------------------

###表的结构 `sse_subscribe_data`

```SQL
CREATE TABLE IF NOT EXISTS `sse_subscribe_data` (
  `srid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL,
  `target_tid` int(10) unsigned NOT NULL,
  `category_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`srid`),
  UNIQUE KEY `sid` (`sid`,`target_tid`,`category_tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;
```


DROP TABLE IF EXISTS `auth_config`;</explode>
CREATE TABLE `auth_config` (
  `k` varchar(32) NOT NULL,
  `v` text,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_config` VALUES ('title', '命运星辰授权系统');</explode>
INSERT INTO `auth_config` VALUES ('keywords', '命运星辰授权系统');</explode>
INSERT INTO `auth_config` VALUES ('description', '命运星辰授权系统');</explode>
INSERT INTO `auth_config` VALUES ('web', 'www.fatestars.com');</explode>
INSERT INTO `auth_config` VALUES ('web_url', 'www.fatestars.com');</explode>
INSERT INTO `auth_config` VALUES ('shop_url', 'ds.fatestars.com');</explode>
INSERT INTO `auth_config` VALUES ('back', 'www.fatestars.com');</explode>
INSERT INTO `auth_config` VALUES ('sizekb', '50');</explode>
INSERT INTO `auth_config` VALUES ('gg', '命运星辰授权系统');</explode>
INSERT INTO `auth_config` VALUES ('mail_smtp', 'smtp.qq.com');</explode>
INSERT INTO `auth_config` VALUES ('mail_post', '465');</explode>
INSERT INTO `auth_config` VALUES ('mail_user', '1594800175@qq.com');</explode>
INSERT INTO `auth_config` VALUES ('mail_pass', '');</explode>
INSERT INTO `auth_config` VALUES ('mail_time', '60');</explode>
INSERT INTO `auth_config` VALUES ('switch', '1');</explode>
INSERT INTO `auth_config` VALUES ('ipauth', '1');</explode>
INSERT INTO `auth_config` VALUES ('update', '1');</explode>
INSERT INTO `auth_config` VALUES ('addblock', '1');</explode>
INSERT INTO `auth_config` VALUES ('repair', '1');</explode>
INSERT INTO `auth_config` VALUES ('authfile', '/includes/authcode.php');</explode>
INSERT INTO `auth_config` VALUES ('qq', '1594800175');</explode>
INSERT INTO `auth_config` VALUES ('qq_qun', '801207741');</explode>
INSERT INTO `auth_config` VALUES ('qg', 'https://jq.qq.com/?_wv=1027&k=2QOzc0zJ');</explode>
INSERT INTO `auth_config` VALUES ('version', '1000');</explode>
INSERT INTO `auth_config` VALUES ('ver', 'V1.0');</explode>
INSERT INTO `auth_config` VALUES ('content', '您的网站未授权！购买正版请联系QQ：1594800175');</explode>
INSERT INTO `auth_config` VALUES ('Index_Slide1', '大海终将波涛汹涌，世界定会因我动荡！');</explode>
INSERT INTO `auth_config` VALUES ('Index_Slide2', '你想知道您的域名是正版授权吗？赶紧来查一下吧~');</explode>
INSERT INTO `auth_config` VALUES ('Index_Slide3', '你想知道该QQ是正版授权商吗？赶紧来查一下吧~');</explode>
INSERT INTO `auth_config` VALUES ('Index_Slide4', '源码还没下载吗？赶紧下载吧~');</explode>
INSERT INTO `auth_config` VALUES ('Index_Slide5', '你想用卡密自助授权吗？赶紧来授权吧~');</explode>
INSERT INTO `auth_config` VALUES ('uplog', '
v1.0</p>
1.程序更新日志</p>
');</explode>
INSERT INTO `auth_config` VALUES ('links', '
<li><i class="bx bx-chevron-right"></i><a href="//www.fatestars.com/">命运星辰官网</a></li> <li><i class="bx bx-chevron-right"></i><a href="//blog.fatestars.com/">命运星辰博客</a></li> <li><i class="bx bx-chevron-right"></i><a href="#">待添加</a></li> <li><i class="bx bx-chevron-right"></i><a href="#">待添加</a></li> <li><i class="bx bx-chevron-right"></i><a href="#">待添加</a></li>
');</explode>



DROP TABLE IF EXISTS `auth_user`;</explode>
CREATE TABLE `auth_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

INSERT INTO `auth_user`(`user`, `pass`) VALUES
('fatestars', '123456');</explode>

DROP TABLE IF EXISTS `auth_daili`;</explode>
CREATE TABLE `auth_daili` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `last` datetime DEFAULT NULL,
  `dlip` varchar(15) DEFAULT NULL,
  `per_tj` int(1) NOT NULL DEFAULT '1',
  `active` int(1) DEFAULT NULL,
  `citylist` varchar(150) DEFAULT NULL,
  `boss` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_site`;</explode>
CREATE TABLE `auth_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `authcode` varchar(100) DEFAULT NULL,
  `sign` varchar(20) DEFAULT NULL,
  `syskey` varchar(40) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `daili` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_block`;</explode>
create table `auth_block` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `dbname` varchar(255) NOT NULL,
  `authcode` varchar(100) DEFAULT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_log`;</explode>
CREATE TABLE `auth_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(150) DEFAULT NULL,
  `type` varchar(20) NULL,
  `date` datetime NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `data` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_km`;</explode>
CREATE TABLE `auth_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `km` text,
  `state` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_down`;</explode>
CREATE TABLE `auth_down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NULL,
  `authcode` varchar(100) NULL,
  `sign` varchar(100) NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` datetime NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `auth_box`;</explode>
CREATE TABLE `auth_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `title` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_box` (`id`, `url`, `title`, `description`) values (1,'www.fatestars.com','前端美化','自然留白，视觉吸引，巧妙色彩，激动人心。');</explode>
INSERT INTO `auth_box` (`id`, `url`, `title`, `description`) values (2,'www.fatestars.com','程序定制','随心所欲，享你所想，个人定制，尊享升华。');</explode>
INSERT INTO `auth_box` (`id`, `url`, `title`, `description`) values (3,'www.fatestars.com','云端API','多元功能，调用便捷，稳定持久，云端加速。');</explode>
INSERT INTO `auth_box` (`id`, `url`, `title`, `description`) values (4,'www.fatestars.com','高端加密','混淆难解，方法特殊，高速加密，免费无华。');</explode>

DROP TABLE IF EXISTS `auth_qa`;</explode>
CREATE TABLE `auth_qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_qa` (`id`, `url`, `title`) values (1,'//www.fatestars.com','搭建后有其他收费吗？ ');</explode>
INSERT INTO `auth_qa` (`id`, `url`, `title`) values (2,'//www.fatestars.com','搭建后是永久使用吗？');</explode>
INSERT INTO `auth_qa` (`id`, `url`, `title`) values (3,'//www.fatestars.com','和演示站点一样的吗？');</explode>
INSERT INTO `auth_qa` (`id`, `url`, `title`) values (4,'//www.fatestars.com','搭建后是可以使用吗？');</explode>

DROP TABLE IF EXISTS `auth_procedure`;</explode>
CREATE TABLE `auth_procedure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_procedure` (`id`, `title`, `description`) values (1,'1.查看类型','选择适合自己的类型，然后点击购买，购买卡密。 ');</explode>
INSERT INTO `auth_procedure` (`id`, `title`, `description`) values (2,'2.人工搭建','添加客服，向其说明要搭建的站点，选择付款方式完成搭建。');</explode>
INSERT INTO `auth_procedure` (`id`, `title`, `description`) values (3,'3.开始营收','搭建后的网站直接运作上线，后续更新以及售后我们将持续提供。');</explode>


DROP TABLE IF EXISTS `auth_combo`;</explode>
CREATE TABLE `auth_combo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `tag` text,
  `title` text,
  `description` text,
  `money` text,
  `html` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_combo` (`id`, `url`,`tag`, `title`, `description`, `money`, `html`, `once`) values (1,'www.fatestars.com','','授权','适合刚入门的新手','60','<li>赠送二级域名包含服务器</li><li>程序更新售后指导</li><li>享受至高无上站点权益</li>');</explode>
INSERT INTO `auth_combo` (`id`, `url`,`tag`,  `title`, `description`, `money`, `html`, `once`) values (2,'www.fatestars.com','','代理商','适合对网络已熟知','120','<li>赠送二级域名包含服务器</li><li>程序更新售后指导</li><li>享受至高无上站点权益</li>');</explode>
INSERT INTO `auth_combo` (`id`, `url`, `tag`, `title`, `description`, `money`, `html`, `once`) values (3,'www.fatestars.com','最值套餐','合作商','适合熟悉市场的老手','240','<li>赠送二级域名包含服务器</li><li>程序更新售后指导</li><li>享受至高无上站点权益</li>');</explode>
	
DROP TABLE IF EXISTS `auth_gglist`;</explode>
CREATE TABLE `auth_gglist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(150) NOT NULL,
  `title` text,
  `content` text,
  `tag` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_gglist` (`id`, `time`,`title`, `content`, `tag`) values (1,'2021.8.1-21:40','官方网站','网址：www.fatestars.com','官网');</explode>
INSERT INTO `auth_gglist` (`id`, `time`,`title`, `content`, `tag`) values (2,'2021.8.2-21:40','官方群聊','QQ群：801207741','Q群');</explode>
INSERT INTO `auth_gglist` (`id`, `time`,`title`, `content`, `tag`) values (3,'2021.8.3-21:40','站长QQ','QQ：1594800175','站长');</explode>

DROP TABLE IF EXISTS `auth_gxlist`;</explode>
CREATE TABLE `auth_gxlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(150) NOT NULL,
  `title` text,
  `content` text,
  `tag` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_gxlist` (`id`, `time`,`title`, `content`, `tag`) values (1,'2021.8.1-21:40','易支付','更新对接易支付','易支付');</explode>
INSERT INTO `auth_gxlist` (`id`, `time`,`title`, `content`, `tag`) values (2,'2021.8.2-21:40','码支付','更新对接码支付','码支付');</explode>
INSERT INTO `auth_gxlist` (`id`, `time`,`title`, `content`, `tag`) values (3,'2021.8.3-21:40','当面付','更新对接当面付','当面付');</explode>

DROP TABLE IF EXISTS `auth_gg`;</explode>
CREATE TABLE `auth_gg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(150) NOT NULL,
  `title` text,
  `content` text,
  `tag` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_gg` (`id`, `time`,`title`, `content`, `tag`) values (1,'2021.8.1-21:40','官方网站','网址：www.fatestars.com','官网');</explode>
INSERT INTO `auth_gg` (`id`, `time`,`title`, `content`, `tag`) values (2,'2021.8.2-21:40','官方群聊','QQ群：801207741','Q群');</explode>
INSERT INTO `auth_gg` (`id`, `time`,`title`, `content`, `tag`) values (3,'2021.8.3-21:40','站长QQ','QQ：1594800175','站长');</explode>

DROP TABLE IF EXISTS `auth_gx`;</explode>
CREATE TABLE `auth_gx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(150) NOT NULL,
  `title` text,
  `content` text,
  `tag` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `auth_gx` (`id`, `time`,`title`, `content`, `tag`) values (1,'2021.8.1-21:40','正式版1.0','内测结束，正式版1.0开始。','1.0');</explode>
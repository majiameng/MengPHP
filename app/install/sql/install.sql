/*
Navicat MySQL Data Transfer

Source Server         : 佳萌
Source Server Version : 50718
Source Host           : majiameng.com:3306
Source Database       : mengphp

Target Server Type    : MYSQL
Target Server Version : 80036
File Encoding         : 65001

Date: 2024-02-03 16:39:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for meng_admin_annex
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_annex`;
CREATE TABLE `meng_admin_annex` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_id` int unsigned NOT NULL DEFAULT '0' COMMENT '关联的数据ID',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '类型',
  `group` varchar(100) NOT NULL DEFAULT 'sys' COMMENT '文件分组',
  `file` varchar(255) NOT NULL COMMENT '上传文件',
  `hash` varchar(64) NOT NULL COMMENT '文件hash值',
  `size` decimal(12,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '附件大小KB',
  `status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '使用状态(0未使用，1已使用)',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `mtime` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='[系统] 上传附件';

-- ----------------------------
-- Records of meng_admin_annex
-- ----------------------------

-- ----------------------------
-- Table structure for meng_admin_annex_group
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_annex_group`;
CREATE TABLE `meng_admin_annex_group` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '附件分组',
  `count` int unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `size` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '附件大小kb',
  `ctime` int NOT NULL DEFAULT '0',
  `mtime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 附件分组';

-- ----------------------------
-- Records of meng_admin_annex_group
-- ----------------------------
INSERT INTO `meng_admin_annex_group` VALUES ('1', 'sys', '0', '0.00', '0', '0');

-- ----------------------------
-- Table structure for meng_admin_config
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_config`;
CREATE TABLE `meng_admin_config` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统配置(1是，0否)',
  `group` varchar(20) NOT NULL DEFAULT 'base' COMMENT '分组',
  `title` varchar(20) NOT NULL COMMENT '配置标题',
  `name` varchar(50) NOT NULL COMMENT '配置名称，由英文字母和下划线组成',
  `value` text NOT NULL COMMENT '配置值',
  `type` varchar(20) NOT NULL DEFAULT 'input' COMMENT '配置类型()',
  `options` text NOT NULL COMMENT '配置项(选项名:选项值)',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '文件上传接口',
  `tips` varchar(255) NOT NULL COMMENT '配置提示',
  `sort` int unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint unsigned NOT NULL COMMENT '状态',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `mtime` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='[系统] 系统配置';

-- ----------------------------
-- Records of meng_admin_config
-- ----------------------------
INSERT INTO `meng_admin_config` VALUES ('1', '1', 'sys', '扩展配置分组', 'config_group', '', 'array', ' ', '', '请按如下格式填写：&lt;br&gt;键值:键名&lt;br&gt;键值:键名&lt;br&gt;&lt;span style=&quot;color:#f00&quot;&gt;键值只能为英文、数字、下划线&lt;/span&gt;', '1', '1', '1492140215', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('13', '1', 'base', '网站域名', 'site_domain', 'http://majiameng.com', 'input', '', '', '', '2', '1', '1492140215', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('14', '1', 'upload', '图片上传大小限制', 'upload_image_size', '0', 'input', '', '', '单位：KB，0表示不限制大小', '3', '1', '1490841797', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('15', '1', 'upload', '允许上传图片格式', 'upload_image_ext', 'jpg,png,gif,jpeg,ico', 'input', '', '', '多个格式请用英文逗号（,）隔开', '4', '1', '1490842130', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('16', '1', 'upload', '缩略图裁剪方式', 'thumb_type', '2', 'select', '1:等比例缩放\r\n2:缩放后填充\r\n3:居中裁剪\r\n4:左上角裁剪\r\n5:右下角裁剪\r\n6:固定尺寸缩放\r\n', '', '', '5', '1', '1490842450', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('17', '1', 'upload', '图片水印开关', 'image_watermark', '1', 'switch', '0:关\r\n1:开', '', '', '6', '1', '1490842583', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('18', '1', 'upload', '图片水印图', 'image_watermark_pic', '/my/meng/upload/sys/image/c0/41d1e1d1aa17fe125d237a877a1276.png', 'image', '', '', '', '7', '1', '1490842679', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('19', '1', 'upload', '图片水印透明度', 'image_watermark_opacity', '50', 'input', '', '', '可设置值为0~100，数字越小，透明度越高', '8', '1', '1490857704', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('20', '1', 'upload', '图片水印图位置', 'image_watermark_location', '9', 'select', '7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中', '', '', '9', '1', '1490858228', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('21', '1', 'upload', '文件上传大小限制', 'upload_file_size', '0', 'input', '', '', '单位：KB，0表示不限制大小', '1', '1', '1490859167', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('22', '1', 'upload', '允许上传文件格式', 'upload_file_ext', 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip', 'input', '', '', '多个格式请用英文逗号（,）隔开', '2', '1', '1490859246', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('23', '1', 'upload', '文字水印开关', 'text_watermark', '0', 'switch', '0:关\r\n1:开', '', '', '10', '1', '1490860872', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('24', '1', 'upload', '文字水印内容', 'text_watermark_content', '', 'input', '', '', '', '11', '1', '1490861005', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('25', '1', 'upload', '文字水印字体', 'text_watermark_font', '', 'file', '', '', '不上传将使用系统默认字体', '12', '1', '1490861117', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('26', '1', 'upload', '文字水印字体大小', 'text_watermark_size', '20', 'input', '', '', '单位：px(像素)', '13', '1', '1490861204', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('27', '1', 'upload', '文字水印颜色', 'text_watermark_color', '#000000', 'input', '', '', '文字水印颜色，格式:#000000', '14', '1', '1490861482', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('28', '1', 'upload', '文字水印位置', 'text_watermark_location', '1', 'select', '7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中', '', '', '11', '1', '1490861718', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('29', '1', 'upload', '缩略图尺寸', 'thumb_size', '300x300;500x500', 'input', '', '', '为空则不生成，生成 500x500 的缩略图，则填写 500x500，多个规格填写参考 300x300;500x500;800x800', '4', '1', '1490947834', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('30', '1', 'develop', '开发模式', 'app_debug', '1', 'switch', '0:关\r\n1:开', '', '', '0', '1', '1491005004', '1492093874');
INSERT INTO `meng_admin_config` VALUES ('31', '1', 'develop', '页面Trace', 'app_trace', '0', 'switch', '0:关\r\n1:开', '', '', '0', '1', '1491005081', '1492093874');
INSERT INTO `meng_admin_config` VALUES ('33', '1', 'sys', '富文本编辑器', 'editor', 'umeditor', 'select', 'ueditor:UEditor\r\numeditor:UMEditor\r\nkindeditor:KindEditor\r\nckeditor:CKEditor', '', '', '2', '1', '1491142648', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('35', '1', 'databases', '备份目录', 'backup_path', './backup/database/', 'input', '', '', '数据库备份路径,路径必须以 / 结尾', '0', '1', '1491881854', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('36', '1', 'databases', '备份分卷大小', 'part_size', '20971520', 'input', '', '', '用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '0', '1', '1491881975', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('37', '1', 'databases', '备份压缩开关', 'compress', '1', 'switch', '0:关\r\n1:开', '', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '0', '1', '1491882038', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('38', '1', 'databases', '备份压缩级别', 'compress_level', '4', 'radio', '1:最低\r\n4:一般\r\n9:最高', '', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '0', '1', '1491882154', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('39', '1', 'base', '网站状态', 'site_status', '1', 'switch', '0:关\r\n1:开', '', '站点关闭后将不能访问，后台可正常登录', '1', '1', '1492049460', '1494690024');
INSERT INTO `meng_admin_config` VALUES ('40', '1', 'sys', '后台管理路径', 'admin_path', 'admin.php', 'input', '', '', '必须以.php为后缀', '0', '1', '1492139196', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('41', '1', 'base', '网站标题', 'site_title', 'MengPHP', 'input', '', '', '网站标题是体现一个网站的主旨，要做到主题突出、标题简洁、连贯等特点，建议不超过28个字', '6', '1', '1492502354', '1494695131');
INSERT INTO `meng_admin_config` VALUES ('42', '1', 'base', '网站关键词', 'site_keywords', 'mengphp,mengphp框架', 'input', '', '', '网页内容所包含的核心搜索关键词，多个关键字请用英文逗号&quot;,&quot;分隔', '7', '1', '1494690508', '1494690780');
INSERT INTO `meng_admin_config` VALUES ('43', '1', 'base', '网站描述', 'site_description', 'mengphp,mengphp框架', 'textarea', '', '', '网页的描述信息，搜索引擎采纳后，作为搜索结果中的页面摘要显示，建议不超过80个字', '8', '1', '1494690669', '1494691075');
INSERT INTO `meng_admin_config` VALUES ('44', '1', 'base', 'ICP备案信息', 'site_icp', '', 'input', '', '', '请填写ICP备案号，用于展示在网站底部，ICP备案官网：&lt;a href=&quot;http://www.miibeian.gov.cn&quot; target=&quot;_blank&quot;&gt;http://www.miibeian.gov.cn&lt;/a&gt;', '9', '1', '1494691721', '1494692046');
INSERT INTO `meng_admin_config` VALUES ('45', '1', 'base', '站点统计代码', 'site_statis', '', 'textarea', '', '', '第三方流量统计代码，前台调用时请先用 htmlspecialchars_decode函数转义输出', '10', '1', '1494691959', '1494694797');
INSERT INTO `meng_admin_config` VALUES ('46', '1', 'base', '网站名称', 'site_name', 'MengPHP', 'input', '', '', '将显示在浏览器窗口标题等位置', '3', '1', '1494692103', '1494694680');
INSERT INTO `meng_admin_config` VALUES ('47', '1', 'base', '网站LOGO', 'site_logo', '/static/image/logo.png', 'image', '', '', '网站LOGO图片', '4', '1', '1494692345', '1494693235');
INSERT INTO `meng_admin_config` VALUES ('48', '1', 'base', '网站图标', 'site_favicon', '/static/image/favicon.ico', 'image', '', '', '又叫网站收藏夹图标，它显示位于浏览器的地址栏或者标题前面，&lt;strong class=&quot;red&quot;&gt;.ico格式&lt;/strong&gt;，&lt;a href=&quot;https://www.baidu.com/s?ie=UTF-8&amp;wd=favicon&quot; target=&quot;_blank&quot;&gt;点此了解网站图标&lt;/a&gt;', '5', '1', '1494692781', '1494693966');
INSERT INTO `meng_admin_config` VALUES ('49', '1', 'base', '手机网站', 'wap_site_status', '1', 'switch', '0:关\r\n1:开', '', '如果有手机网站，请设置为开启状态，否则只显示PC网站', '2', '1', '1498405436', '1498405436');
INSERT INTO `meng_admin_config` VALUES ('50', '1', 'sys', '云端推送', 'cloud_push', '0', 'switch', '0:关\r\n1:开', '', '关闭之后，无法通过云端推送安装扩展', '3', '1', '1504250320', '1504250320');
INSERT INTO `meng_admin_config` VALUES ('51', '0', 'base', '手机网站域名', 'wap_domain', 'http://blog.majiameng.com', 'input', '', '', '手机访问将自动跳转至此域名', '2', '1', '1504304776', '1504304837');
INSERT INTO `meng_admin_config` VALUES ('52', '0', 'sys', '多语言支持', 'multi_language', '0', 'switch', '0:关\r\n1:开', '', '开启后你可以自由上传多种语言包', '4', '1', '1506532211', '1506532211');

-- ----------------------------
-- Table structure for meng_admin_language
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_language`;
CREATE TABLE `meng_admin_language` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '语言包名称',
  `code` varchar(20) NOT NULL DEFAULT '' COMMENT '编码',
  `locale` varchar(255) NOT NULL DEFAULT '' COMMENT '本地浏览器语言编码',
  `icon` varchar(30) NOT NULL DEFAULT '' COMMENT '图标',
  `pack` varchar(100) NOT NULL DEFAULT '' COMMENT '上传的语言包',
  `sort` tinyint unsigned NOT NULL DEFAULT '1',
  `status` tinyint unsigned NOT NULL DEFAULT '0',
  `ctime` int NOT NULL DEFAULT '0',
  `mtime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 语言包';

-- ----------------------------
-- Records of meng_admin_language
-- ----------------------------
INSERT INTO `meng_admin_language` VALUES ('1', '简体中文', 'zh-cn', 'zh-CN,zh-CN.UTF-8,zh-cn', '', '1', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for meng_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_log`;
CREATE TABLE `meng_admin_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uid` int unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `param` text,
  `remark` varchar(255) DEFAULT '',
  `count` int unsigned NOT NULL DEFAULT '1',
  `ip` varchar(128) DEFAULT '',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `mtime` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COMMENT='[系统] 操作日志';

-- ----------------------------
-- Records of meng_admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for meng_admin_member
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_member`;
CREATE TABLE `meng_admin_member` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int unsigned NOT NULL DEFAULT '0' COMMENT '会员等级ID',
  `nick` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `mobile` bigint unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用金额',
  `frozen_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `income` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '收入统计',
  `expend` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '开支统计',
  `exper` int unsigned NOT NULL DEFAULT '0' COMMENT '经验值',
  `integral` int unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `frozen_integral` int unsigned NOT NULL DEFAULT '0' COMMENT '冻结积分',
  `sex` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '性别(1男，0女)',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `last_login_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登陆IP',
  `last_login_time` int unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `login_count` int unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `expire_time` int unsigned NOT NULL DEFAULT '0' COMMENT '到期时间(0永久)',
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '状态(0禁用，1正常)',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000001 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 会员表';

-- ----------------------------
-- Records of meng_admin_member
-- ----------------------------
INSERT INTO `meng_admin_member` VALUES ('1000000', '1', '', 'test', '0', '', '', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '1', '', '', '0', '0', '1706889600', '1', '1493274686', '1706948879');

-- ----------------------------
-- Table structure for meng_admin_member_level
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_member_level`;
CREATE TABLE `meng_admin_member_level` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '等级名称',
  `min_exper` int unsigned NOT NULL DEFAULT '0' COMMENT '最小经验值',
  `max_exper` int unsigned NOT NULL DEFAULT '0' COMMENT '最大经验值',
  `discount` int unsigned NOT NULL DEFAULT '100' COMMENT '折扣率(%)',
  `intro` varchar(255) NOT NULL COMMENT '等级简介',
  `default` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '默认等级',
  `expire` int unsigned NOT NULL DEFAULT '0' COMMENT '会员有效期(天)',
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `mtime` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[系统] 会员等级';

-- ----------------------------
-- Records of meng_admin_member_level
-- ----------------------------
INSERT INTO `meng_admin_member_level` VALUES ('1', '普通用户', '0', '0', '100', '普通用户', '1', '0', '1', '1509614804', '1706949368');
INSERT INTO `meng_admin_member_level` VALUES ('2', '会员', '100', '1000', '95', '会员', '0', '31', '1', '1509614804', '1706949350');

-- ----------------------------
-- Table structure for meng_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_menu`;
CREATE TABLE `meng_admin_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID(快捷菜单专用)',
  `pid` int unsigned NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL COMMENT '模块名或插件名，插件名格式:plugins.插件名',
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `title` varchar(20) NOT NULL COMMENT '菜单标题',
  `icon` varchar(80) NOT NULL DEFAULT 'aicon ai-shezhi' COMMENT '菜单图标',
  `param` varchar(200) NOT NULL DEFAULT '' COMMENT '扩展参数',
  `target` varchar(20) NOT NULL DEFAULT '_self' COMMENT '打开方式(_blank,_self)',
  `sort` int unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `debug` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '开发模式可见',
  `system` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统菜单，系统菜单不可删除',
  `nav` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '是否为菜单显示，1显示0不显示',
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '状态1显示，0隐藏',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `mtime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 管理菜单';

-- ----------------------------
-- Records of meng_admin_menu
-- ----------------------------
INSERT INTO `meng_admin_menu` VALUES ('1', '0', '0', 'admin', null, null, '首页', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('2', '0', '0', 'admin', null, null, '系统', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('3', '0', '0', 'admin', null, null, '社区', 'fa fa-desktop', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('4', '0', '1', 'admin', null, null, '快捷菜单', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('5', '0', '3', 'admin', null, null, '插件列表', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('6', '0', '2', 'admin', null, null, '系统功能', 'fa fa-cogs', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('7', '0', '2', 'admin', null, null, '会员管理', 'fa fa-users', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('9', '0', '2', 'admin', null, null, '开发专用', 'aicon ai-mokuaiguanli', '', '_self', '4', '1', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('10', '0', '6', 'admin', 'system', 'index', '系统设置', 'aicon ai-icon01', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('11', '0', '6', 'admin', 'config', 'index', '配置管理', 'aicon ai-shezhi', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('12', '0', '6', 'admin', 'menu', 'index', '系统菜单', 'typcn typcn-th-list', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('13', '0', '6', 'admin', 'user', 'role', '管理员角色', 'fa fa-desktop', '', '_self', '4', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('14', '0', '6', 'admin', 'user', 'index', '系统管理员', 'fa fa-desktop', '', '_self', '5', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('15', '0', '6', 'admin', 'log', 'index', '系统日志', 'fa fa-desktop', '', '_self', '6', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('16', '0', '6', 'admin', 'annex', 'index', '附件管理', 'fa fa-desktop', '', '_self', '7', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('20', '0', '7', 'admin', 'member', 'level', '会员等级', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('21', '0', '7', 'admin', 'member', 'index', '会员列表', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('22', '0', '9', 'admin', 'develop', 'lists', '[示例]列表模板', 'fa fa-desktop', '', '_self', '1', '1', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('23', '0', '9', 'admin', 'develop', 'edit', '[示例]编辑模板', 'fa fa-desktop', '', '_self', '2', '1', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('24', '0', '4', 'admin', 'index', 'index', '后台首页', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('25', '0', '4', 'admin', 'index', 'clear', '清空缓存', 'fa fa-desktop', '', '_self', '1', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('26', '0', '12', 'admin', 'menu', 'add', '添加菜单', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('27', '0', '12', 'admin', 'menu', 'edit', '修改菜单', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('28', '0', '12', 'admin', 'menu', 'del', '删除菜单', 'fa fa-desktop', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('29', '0', '12', 'admin', 'menu', 'status', '状态设置', 'fa fa-desktop', '', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('30', '0', '12', 'admin', 'menu', 'sort', '排序设置', 'fa fa-desktop', '', '_self', '5', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('31', '0', '12', 'admin', 'menu', 'quick', '添加快捷菜单', 'fa fa-desktop', '', '_self', '6', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('32', '0', '12', 'admin', 'menu', 'export', '导出菜单', 'fa fa-desktop', '', '_self', '7', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('33', '0', '13', 'admin', 'user', 'addrole', '添加角色', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('34', '0', '13', 'admin', 'user', 'editrole', '修改角色', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('35', '0', '13', 'admin', 'user', 'delrole', '删除角色', 'fa fa-desktop', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('36', '0', '13', 'admin', 'user', 'status', '状态设置', 'fa fa-desktop', '', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('37', '0', '14', 'admin', 'user', 'adduser', '添加管理员', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('38', '0', '14', 'admin', 'user', 'edituser', '修改管理员', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('39', '0', '14', 'admin', 'user', 'deluser', '删除管理员', 'fa fa-desktop', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('40', '0', '14', 'admin', 'user', 'status', '状态设置', 'fa fa-desktop', '', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('41', '0', '14', 'admin', 'user', 'info', '个人信息设置', 'fa fa-desktop', '', '_self', '5', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('55', '0', '11', 'admin', 'config', 'add', '添加配置', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('56', '0', '11', 'admin', 'config', 'edit', '修改配置', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('57', '0', '11', 'admin', 'config', 'del', '删除配置', 'fa fa-desktop', '', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('58', '0', '11', 'admin', 'config', 'status', '状态设置', '', '', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('59', '0', '11', 'admin', 'config', 'sort', '排序设置', '', '', '_self', '5', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('60', '0', '10', 'admin', 'system', 'index', '基础配置', '', 'group=base', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('61', '0', '10', 'admin', 'system', 'index', '系统配置', '', 'group=sys', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('62', '0', '10', 'admin', 'system', 'index', '上传配置', '', 'group=upload', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('63', '0', '10', 'admin', 'system', 'index', '开发配置', '', 'group=develop', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('70', '0', '21', 'admin', 'member', 'add', '添加会员', '', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('71', '0', '21', 'admin', 'member', 'edit', '修改会员', '', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('72', '0', '21', 'admin', 'member', 'del', '删除会员', '', 'table=admin_member', '_self', '3', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('73', '0', '21', 'admin', 'member', 'status', '状态设置', '', '', '_self', '4', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('74', '0', '21', 'admin', 'member', 'pop', '[弹窗]会员选择', 'fa fa-desktop', '', '_self', '5', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('75', '0', '20', 'admin', 'member', 'addlevel', '添加会员等级', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('76', '0', '20', 'admin', 'member', 'editlevel', '修改会员等级', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('77', '0', '20', 'admin', 'member', 'dellevel', '删除会员等级', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('78', '0', '16', 'admin', 'annex', 'upload', '附件上传', 'fa fa-desktop', '', '_self', '1', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('79', '0', '16', 'admin', 'annex', 'del', '删除附件', 'fa fa-desktop', '', '_self', '2', '0', '1', '1', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('84', '0', '6', 'admin', 'database', 'index', '数据库管理', 'fa fa-desktop', '', '_self', '8', '0', '1', '1', '1', '1491461136', '0');
INSERT INTO `meng_admin_menu` VALUES ('85', '0', '84', 'admin', 'database', 'export', '备份数据库', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491461250', '0');
INSERT INTO `meng_admin_menu` VALUES ('86', '0', '84', 'admin', 'database', 'import', '恢复数据库', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491461315', '0');
INSERT INTO `meng_admin_menu` VALUES ('87', '0', '84', 'admin', 'database', 'optimize', '优化数据库', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491467000', '0');
INSERT INTO `meng_admin_menu` VALUES ('88', '0', '84', 'admin', 'database', 'del', '删除备份', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491467058', '0');
INSERT INTO `meng_admin_menu` VALUES ('89', '0', '84', 'admin', 'database', 'repair', '修复数据库', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491880879', '0');
INSERT INTO `meng_admin_menu` VALUES ('90', '0', '21', 'admin', 'member', 'setdefault', '设置默认等级', 'fa fa-desktop', '', '_self', '0', '0', '1', '1', '1', '1491966585', '0');
INSERT INTO `meng_admin_menu` VALUES ('91', '0', '10', 'admin', 'system', 'index', '数据库配置', 'fa fa-desktop', 'group=databases', '_self', '5', '0', '1', '1', '1', '1492072213', '0');
INSERT INTO `meng_admin_menu` VALUES ('97', '0', '6', 'admin', 'language', 'index', '语言包管理', 'fa fa-desktop', '', '_self', '11', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('98', '0', '97', 'admin', 'language', 'add', '添加语言包', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('99', '0', '97', 'admin', 'language', 'edit', '修改语言包', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('100', '0', '97', 'admin', 'language', 'del', '删除语言包', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('101', '0', '97', 'admin', 'language', 'sort', '排序设置', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('102', '0', '97', 'admin', 'language', 'status', '状态设置', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('103', '0', '16', 'admin', 'annex', 'favicon', '收藏夹图标上传', 'fa fa-desktop', '', '_self', '3', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('105', '0', '4', 'admin', 'index', 'index_page', '欢迎页面', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('106', '0', '4', 'admin', 'user', 'iframe', '布局切换', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('107', '0', '15', 'admin', 'log', 'del', '删除日志', 'fa fa-desktop', 'table=admin_log', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('108', '0', '15', 'admin', 'log', 'clear', '清空日志', 'fa fa-desktop', '', '_self', '100', '0', '1', '0', '1', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('109', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('110', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('111', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('112', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('113', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('114', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('115', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('116', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('117', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('118', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('119', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('120', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('121', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('122', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('123', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('124', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('125', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('126', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('127', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('128', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('129', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('130', '0', '4', 'admin', '', '', '预留占位', '', '', '_self', '100', '0', '1', '1', '0', '1490315067', '0');
INSERT INTO `meng_admin_menu` VALUES ('138', '1', '4', 'admin', 'system', 'index', '系统设置', 'aicon ai-icon01', '', '_self', '1', '0', '0', '1', '1', '1509694177', '0');
INSERT INTO `meng_admin_menu` VALUES ('139', '1', '4', 'admin', 'menu', 'index', '系统菜单', 'typcn typcn-th-list', '', '_self', '3', '0', '0', '1', '1', '1509694183', '0');

-- ----------------------------
-- Table structure for meng_admin_menu_lang
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_menu_lang`;
CREATE TABLE `meng_admin_menu_lang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `lang` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '语言包',
  `ctime` int NOT NULL DEFAULT '0',
  `mtime` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8 COMMENT='[系统] 菜单语言';

-- ----------------------------
-- Records of meng_admin_menu_lang
-- ----------------------------
INSERT INTO `meng_admin_menu_lang` VALUES ('131', '1', '首页', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('132', '2', '系统', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('133', '3', '插件', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('134', '4', '快捷菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('135', '5', '插件列表', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('136', '6', '系统功能', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('137', '7', '会员管理', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('139', '9', '开发专用', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('140', '10', '系统设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('141', '11', '配置管理', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('142', '12', '系统菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('143', '13', '管理员角色', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('144', '14', '系统管理员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('145', '15', '系统日志', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('146', '16', '附件管理', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('150', '20', '会员等级', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('151', '21', '会员列表', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('152', '22', '[示例]列表模板', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('153', '23', '[示例]编辑模板', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('154', '24', '后台首页', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('155', '25', '清空缓存', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('156', '26', '添加菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('157', '27', '修改菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('158', '28', '删除菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('159', '29', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('160', '30', '排序设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('161', '31', '添加快捷菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('162', '32', '导出菜单', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('163', '33', '添加角色', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('164', '34', '修改角色', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('165', '35', '删除角色', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('166', '36', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('167', '37', '添加管理员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('168', '38', '修改管理员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('169', '39', '删除管理员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('170', '40', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('171', '41', '个人信息设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('185', '55', '添加配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('186', '56', '修改配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('187', '57', '删除配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('188', '58', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('189', '59', '排序设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('190', '60', '基础配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('191', '61', '系统配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('192', '62', '上传配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('193', '63', '开发配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('200', '70', '添加会员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('201', '71', '修改会员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('202', '72', '删除会员', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('203', '73', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('204', '74', '[弹窗]会员选择', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('205', '75', '添加会员等级', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('206', '76', '修改会员等级', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('207', '77', '删除会员等级', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('208', '78', '附件上传', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('209', '79', '删除附件', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('214', '84', '数据库管理', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('215', '85', '备份数据库', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('216', '86', '恢复数据库', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('217', '87', '优化数据库', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('218', '88', '删除备份', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('219', '89', '修复数据库', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('220', '90', '设置默认等级', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('221', '91', '数据库配置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('227', '97', '语言包管理', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('228', '98', '添加语言包', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('229', '99', '修改语言包', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('230', '100', '删除语言包', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('231', '101', '排序设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('232', '102', '状态设置', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('233', '103', '收藏夹图标上传', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('235', '105', '欢迎页面', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('236', '106', '布局切换', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('237', '107', '删除日志', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('238', '108', '清空日志', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('239', '109', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('240', '110', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('241', '111', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('242', '112', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('243', '113', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('244', '114', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('245', '115', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('246', '116', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('247', '117', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('248', '118', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('249', '119', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('250', '120', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('251', '121', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('252', '122', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('253', '123', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('254', '124', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('255', '125', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('256', '126', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('257', '127', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('258', '128', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('259', '129', '预留占位', '1', '0', '0');
INSERT INTO `meng_admin_menu_lang` VALUES ('260', '130', '预留占位', '1', '0', '0');

-- ----------------------------
-- Table structure for meng_admin_module
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_module`;
CREATE TABLE `meng_admin_module` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '系统模块',
  `name` varchar(50) NOT NULL COMMENT '模块名(英文)',
  `identifier` varchar(100) NOT NULL COMMENT '模块标识(模块名(字母).开发者标识.module)',
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `intro` varchar(255) NOT NULL COMMENT '模块简介',
  `author` varchar(100) NOT NULL COMMENT '作者',
  `icon` varchar(80) NOT NULL DEFAULT 'aicon ai-mokuaiguanli' COMMENT '图标',
  `version` varchar(20) NOT NULL COMMENT '版本号',
  `url` varchar(255) NOT NULL COMMENT '链接',
  `sort` int unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0未安装，1未启用，2已启用',
  `default` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '默认模块(只能有一个)',
  `config` text NOT NULL COMMENT '配置',
  `app_id` varchar(30) NOT NULL DEFAULT '0' COMMENT '应用市场ID(0本地)',
  `theme` varchar(50) NOT NULL DEFAULT 'default' COMMENT '主题模板',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[系统] 模块';

-- ----------------------------
-- Records of meng_admin_module
-- ----------------------------
INSERT INTO `meng_admin_module` VALUES ('1', '1', 'admin', 'admin.hisiphp.module', '系统管理模块', '系统核心模块，用于后台各项管理功能模块及功能拓展', 'HisiPHP官方出品', '', '1.0.0', 'http://www.hisiphp.com', '0', '2', '0', '', '0', 'default', '1489998096', '1489998096');
INSERT INTO `meng_admin_module` VALUES ('2', '1', 'index', 'index.hisiphp.module', '系统默认模块', '仅供前端插件访问和应用市场推送安装，禁止在此模块下面开发任何东西。', 'HisiPHP官方出品', '', '1.0.0', 'http://www.hisiphp.com', '0', '2', '0', '', '0', 'default', '1489998096', '1489998096');
INSERT INTO `meng_admin_module` VALUES ('3', '1', 'install', 'install.hisiphp.module', '系统安装模块', '系统安装模块，勿动。', 'HisiPHP官方出品', '', '1.0.0', 'http://www.hisiphp.com', '0', '2', '0', '', '0', 'default', '1489998096', '1489998096');

-- ----------------------------
-- Table structure for meng_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_role`;
CREATE TABLE `meng_admin_role` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `intro` varchar(200) NOT NULL COMMENT '角色简介',
  `auth` text NOT NULL COMMENT '角色权限',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='[系统] 管理角色';

-- ----------------------------
-- Records of meng_admin_role
-- ----------------------------
INSERT INTO `meng_admin_role` VALUES ('1', '超级管理员', '拥有系统最高权限', '0', '1489411760', '0', '1');
INSERT INTO `meng_admin_role` VALUES ('2', '系统管理员', '拥有系统管理员权限', '[\"1\",\"4\",\"25\",\"24\",\"2\",\"6\",\"10\",\"60\",\"61\",\"62\",\"63\",\"91\",\"11\",\"55\",\"56\",\"57\",\"58\",\"59\",\"12\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"13\",\"33\",\"34\",\"35\",\"36\",\"14\",\"37\",\"38\",\"39\",\"40\",\"41\",\"16\",\"78\",\"79\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"7\",\"20\",\"75\",\"76\",\"77\",\"21\",\"90\",\"70\",\"71\",\"72\",\"73\",\"74\",\"8\",\"17\",\"65\",\"66\",\"67\",\"68\",\"94\",\"95\",\"18\",\"42\",\"43\",\"45\",\"47\",\"48\",\"49\",\"19\",\"80\",\"81\",\"82\",\"83\",\"9\",\"22\",\"23\",\"3\",\"5\"]', '1489411760', '0', '1');

-- ----------------------------
-- Table structure for meng_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_user`;
CREATE TABLE `meng_admin_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL,
  `nick` varchar(50) NOT NULL COMMENT '昵称',
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `auth` text NOT NULL COMMENT '权限',
  `iframe` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0默认，1框架',
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `last_login_ip` varchar(128) NOT NULL COMMENT '最后登陆IP',
  `last_login_time` int unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='[系统] 管理员表';

-- ----------------------------
-- Records of meng_admin_user
-- ----------------------------

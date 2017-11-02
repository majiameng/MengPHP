/*
Navicat MySQL Data Transfer

Source Server         : 佳萌
Source Server Version : 50718
Source Host           : majiameng.com:3306
Source Database       : mengphp

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-11-02 18:07:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for meng_admin_annex
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_annex`;
CREATE TABLE `meng_admin_annex` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联的数据ID',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '类型',
  `group` varchar(100) NOT NULL DEFAULT 'sys' COMMENT '文件分组',
  `file` varchar(255) NOT NULL COMMENT '上传文件',
  `hash` varchar(64) NOT NULL COMMENT '文件hash值',
  `size` decimal(12,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '附件大小KB',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '使用状态(0未使用，1已使用)',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '附件分组',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `size` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '附件大小kb',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 附件分组';

-- ----------------------------
-- Records of meng_admin_annex_group
-- ----------------------------
INSERT INTO `meng_admin_annex_group` VALUES ('1', 'sys', '0', '0.00');

-- ----------------------------
-- Table structure for meng_admin_config
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_config`;
CREATE TABLE `meng_admin_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统配置(1是，0否)',
  `group` varchar(20) NOT NULL DEFAULT 'base' COMMENT '分组',
  `title` varchar(20) NOT NULL COMMENT '配置标题',
  `name` varchar(50) NOT NULL COMMENT '配置名称，由英文字母和下划线组成',
  `value` text NOT NULL COMMENT '配置值',
  `type` varchar(20) NOT NULL DEFAULT 'input' COMMENT '配置类型()',
  `options` text NOT NULL COMMENT '配置项(选项名:选项值)',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '文件上传接口',
  `tips` varchar(255) NOT NULL COMMENT '配置提示',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='[系统] 系统配置';

-- ----------------------------
-- Records of meng_admin_config
-- ----------------------------
INSERT INTO `meng_admin_config` VALUES ('1', '1', 'sys', '扩展配置分组', 'config_group', '', 'array', ' ', '', '请按如下格式填写：&lt;br&gt;键值:键名&lt;br&gt;键值:键名&lt;br&gt;&lt;span style=&quot;color:#f00&quot;&gt;键值只能为英文、数字、下划线&lt;/span&gt;', '1', '1', '1492140215', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('13', '1', 'base', '网站域名', 'site_domain', 'http://majiameng.com', 'input', '', '', '', '2', '1', '1492140215', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('14', '1', 'upload', '图片上传大小限制', 'upload_image_size', '0', 'input', '', '', '单位：KB，0表示不限制大小', '3', '1', '1490841797', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('15', '1', 'upload', '允许上传图片格式', 'upload_image_ext', 'jpg,png,gif,jpeg,ico', 'input', '', '', '多个格式请用英文逗号（,）隔开', '4', '1', '1490842130', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('16', '1', 'upload', '缩略图裁剪方式', 'thumb_type', '2', 'select', '1:等比例缩放\r\n2:缩放后填充\r\n3:居中裁剪\r\n4:左上角裁剪\r\n5:右下角裁剪\r\n6:固定尺寸缩放\r\n', '', '', '5', '1', '1490842450', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('17', '1', 'upload', '图片水印开关', 'image_watermark', '1', 'switch', '0:关闭\r\n1:开启', '', '', '6', '1', '1490842583', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('18', '1', 'upload', '图片水印图', 'image_watermark_pic', '/upload/sys/image/49/4d0430eaf30318ef847086d0b63db0.png', 'image', '', '', '', '7', '1', '1490842679', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('19', '1', 'upload', '图片水印透明度', 'image_watermark_opacity', '50', 'input', '', '', '可设置值为0~100，数字越小，透明度越高', '8', '1', '1490857704', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('20', '1', 'upload', '图片水印图位置', 'image_watermark_location', '9', 'select', '7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中', '', '', '9', '1', '1490858228', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('21', '1', 'upload', '文件上传大小限制', 'upload_file_size', '0', 'input', '', '', '单位：KB，0表示不限制大小', '1', '1', '1490859167', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('22', '1', 'upload', '允许上传文件格式', 'upload_file_ext', 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip', 'input', '', '', '多个格式请用英文逗号（,）隔开', '2', '1', '1490859246', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('23', '1', 'upload', '文字水印开关', 'text_watermark', '0', 'switch', '0:关闭\r\n1:开启', '', '', '10', '1', '1490860872', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('24', '1', 'upload', '文字水印内容', 'text_watermark_content', '', 'input', '', '', '', '11', '1', '1490861005', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('25', '1', 'upload', '文字水印字体', 'text_watermark_font', '', 'file', '', '', '不上传将使用系统默认字体', '12', '1', '1490861117', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('26', '1', 'upload', '文字水印字体大小', 'text_watermark_size', '20', 'input', '', '', '单位：px(像素)', '13', '1', '1490861204', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('27', '1', 'upload', '文字水印颜色', 'text_watermark_color', '#000000', 'input', '', '', '文字水印颜色，格式:#000000', '14', '1', '1490861482', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('28', '1', 'upload', '文字水印位置', 'text_watermark_location', '7', 'select', '7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中', '', '', '11', '1', '1490861718', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('29', '1', 'upload', '缩略图尺寸', 'thumb_size', '300x300;500x500', 'input', '', '', '为空则不生成，生成 500x500 的缩略图，则填写 500x500，多个规格填写参考 300x300;500x500;800x800', '4', '1', '1490947834', '1491040778');
INSERT INTO `meng_admin_config` VALUES ('30', '1', 'develop', '开发模式', 'app_debug', '1', 'switch', '0:关闭\r\n1:开启', '', '', '0', '1', '1491005004', '1492093874');
INSERT INTO `meng_admin_config` VALUES ('31', '1', 'develop', '页面Trace', 'app_trace', '0', 'switch', '0:关闭\r\n1:开启', '', '', '0', '1', '1491005081', '1492093874');
INSERT INTO `meng_admin_config` VALUES ('33', '1', 'sys', '富文本编辑器', 'editor', 'umeditor', 'select', 'ueditor:UEditor\r\numeditor:UMEditor\r\nkindeditor:KindEditor\r\nckeditor:CKEditor', '', '', '2', '1', '1491142648', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('35', '1', 'databases', '备份目录', 'backup_path', './backup/database/', 'input', '', '', '数据库备份路径,路径必须以 / 结尾', '0', '1', '1491881854', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('36', '1', 'databases', '备份分卷大小', 'part_size', '20971520', 'input', '', '', '用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '0', '1', '1491881975', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('37', '1', 'databases', '备份压缩开关', 'compress', '1', 'switch', '0:关闭\r\n1:开启', '', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '0', '1', '1491882038', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('38', '1', 'databases', '备份压缩级别', 'compress_level', '4', 'radio', '1:最低\r\n4:一般\r\n9:最高', '', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '0', '1', '1491882154', '1491965974');
INSERT INTO `meng_admin_config` VALUES ('39', '1', 'base', '网站状态', 'site_status', '1', 'switch', '0:关闭\r\n1:开启', '', '站点关闭后将不能访问，后台可正常登录', '1', '1', '1492049460', '1494690024');
INSERT INTO `meng_admin_config` VALUES ('40', '1', 'sys', '后台管理路径', 'admin_path', 'admin.php', 'input', '', '', '必须以.php为后缀', '0', '1', '1492139196', '1492140215');
INSERT INTO `meng_admin_config` VALUES ('41', '1', 'base', '网站标题', 'site_title', 'MengPHP', 'input', '', '', '网站标题是体现一个网站的主旨，要做到主题突出、标题简洁、连贯等特点，建议不超过28个字', '6', '1', '1492502354', '1494695131');
INSERT INTO `meng_admin_config` VALUES ('42', '1', 'base', '网站关键词', 'site_keywords', 'mengphp,mengphp框架', 'input', '', '', '网页内容所包含的核心搜索关键词，多个关键字请用英文逗号&quot;,&quot;分隔', '7', '1', '1494690508', '1494690780');
INSERT INTO `meng_admin_config` VALUES ('43', '1', 'base', '网站描述', 'site_description', '三大发射点发撒大是大非啊', 'textarea', '', '', '网页的描述信息，搜索引擎采纳后，作为搜索结果中的页面摘要显示，建议不超过80个字', '8', '1', '1494690669', '1494691075');
INSERT INTO `meng_admin_config` VALUES ('44', '1', 'base', 'ICP备案信息', 'site_icp', '', 'input', '', '', '请填写ICP备案号，用于展示在网站底部，ICP备案官网：&lt;a href=&quot;http://www.miibeian.gov.cn&quot; target=&quot;_blank&quot;&gt;http://www.miibeian.gov.cn&lt;/a&gt;', '9', '1', '1494691721', '1494692046');
INSERT INTO `meng_admin_config` VALUES ('45', '1', 'base', '站点统计代码', 'site_statis', '', 'textarea', '', '', '第三方流量统计代码，前台调用时请先用 htmlspecialchars_decode函数转义输出', '10', '1', '1494691959', '1494694797');
INSERT INTO `meng_admin_config` VALUES ('46', '1', 'base', '网站名称', 'site_name', 'MengPHP', 'input', '', '', '将显示在浏览器窗口标题等位置', '3', '1', '1494692103', '1494694680');
INSERT INTO `meng_admin_config` VALUES ('47', '1', 'base', '网站LOGO', 'site_logo', '', 'image', '', '', '网站LOGO图片', '4', '1', '1494692345', '1494693235');
INSERT INTO `meng_admin_config` VALUES ('48', '1', 'base', '网站图标', 'site_favicon', '', 'image', '', '/admin/annex/favicon', '又叫网站收藏夹图标，它显示位于浏览器的地址栏或者标题前面，&lt;strong class=&quot;red&quot;&gt;.ico格式&lt;/strong&gt;，&lt;a href=&quot;https://www.baidu.com/s?ie=UTF-8&amp;wd=favicon&quot; target=&quot;_blank&quot;&gt;点此了解网站图标&lt;/a&gt;', '5', '1', '1494692781', '1494693966');
INSERT INTO `meng_admin_config` VALUES ('49', '1', 'base', '手机网站', 'wap_site_status', '1', 'switch', '0:关闭\r\n1:开启', '', '如果有手机网站，请设置为开启状态，否则只显示PC网站', '2', '1', '1498405436', '1498405436');
INSERT INTO `meng_admin_config` VALUES ('50', '1', 'sys', '云端推送', 'cloud_push', '0', 'switch', '0:关闭\r\n1:开启', '', '关闭之后，无法通过云端推送安装扩展', '3', '1', '1504250320', '1504250320');
INSERT INTO `meng_admin_config` VALUES ('51', '0', 'base', '手机网站域名', 'wap_domain', 'http://blog.majiameng.com', 'input', '', '', '手机访问将自动跳转至此域名', '2', '1', '1504304776', '1504304837');
INSERT INTO `meng_admin_config` VALUES ('52', '0', 'sys', '多语言支持', 'multi_language', '0', 'switch', '0:关闭\r\n1:开启', '', '开启后你可以自由上传多种语言包', '4', '1', '1506532211', '1506532211');

-- ----------------------------
-- Table structure for meng_admin_language
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_language`;
CREATE TABLE `meng_admin_language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '语言包名称',
  `code` varchar(20) NOT NULL DEFAULT '' COMMENT '编码',
  `locale` varchar(255) NOT NULL DEFAULT '' COMMENT '本地浏览器语言编码',
  `icon` varchar(30) NOT NULL DEFAULT '' COMMENT '图标',
  `pack` varchar(100) NOT NULL DEFAULT '' COMMENT '上传的语言包',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 语言包';

-- ----------------------------
-- Records of meng_admin_language
-- ----------------------------
INSERT INTO `meng_admin_language` VALUES ('1', '简体中文', 'zh-cn', 'zh-CN,zh-CN.UTF-8,zh-cn', '', '1', '1', '1');

-- ----------------------------
-- Table structure for meng_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_log`;
CREATE TABLE `meng_admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `param` text,
  `remark` varchar(255) DEFAULT '',
  `count` int(10) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(128) DEFAULT '',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COMMENT='[系统] 操作日志';

-- ----------------------------
-- Records of meng_admin_log
-- ----------------------------
INSERT INTO `meng_admin_log` VALUES ('1', '1', '后台首页', 'admin/index/index', '[]', '浏览数据', '685', '0.0.0.0', '1508757817', '1509617137');
INSERT INTO `meng_admin_log` VALUES ('2', '1', '系统设置', 'admin/system/index', '[]', '浏览数据', '152', '0.0.0.0', '1508757824', '1509613965');
INSERT INTO `meng_admin_log` VALUES ('3', '1', '系统配置', 'admin/system/index', '{\"group\":\"sys\"}', '浏览数据', '15', '0.0.0.0', '1508757828', '1509610576');
INSERT INTO `meng_admin_log` VALUES ('4', '1', '上传配置', 'admin/system/index', '{\"group\":\"upload\"}', '浏览数据', '15', '0.0.0.0', '1508757832', '1509610578');
INSERT INTO `meng_admin_log` VALUES ('5', '1', '开发配置', 'admin/system/index', '{\"group\":\"develop\"}', '浏览数据', '13', '0.0.0.0', '1508757835', '1509610592');
INSERT INTO `meng_admin_log` VALUES ('6', '1', '数据库配置', 'admin/system/index', '{\"group\":\"databases\"}', '浏览数据', '12', '0.0.0.0', '1508757838', '1509610581');
INSERT INTO `meng_admin_log` VALUES ('7', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"24\"}', '浏览数据', '1', '0.0.0.0', '1508758090', '1508758090');
INSERT INTO `meng_admin_log` VALUES ('8', '1', '[示例]列表模板', 'admin/develop/lists', '[]', '浏览数据', '10', '0.0.0.0', '1508759928', '1509614881');
INSERT INTO `meng_admin_log` VALUES ('9', '1', '在线升级', 'admin/upgrade/index', '[]', '浏览数据', '6', '0.0.0.0', '1508759934', '1509608872');
INSERT INTO `meng_admin_log` VALUES ('10', '1', '模块管理', 'admin/module/index', '[]', '浏览数据', '20', '0.0.0.0', '1508759953', '1509608813');
INSERT INTO `meng_admin_log` VALUES ('11', '1', '钩子管理', 'admin/hook/index', '[]', '浏览数据', '9', '0.0.0.0', '1508759999', '1509608853');
INSERT INTO `meng_admin_log` VALUES ('12', '1', '会员等级', 'admin/member/level', '[]', '浏览数据', '20', '0.0.0.0', '1508760014', '1509614810');
INSERT INTO `meng_admin_log` VALUES ('13', '1', '会员列表', 'admin/member/index', '[]', '浏览数据', '13', '0.0.0.0', '1508760017', '1509614858');
INSERT INTO `meng_admin_log` VALUES ('14', '1', '上传配置', 'admin/system/index', '{\"id\":{\"upload_file_size\":\"0\",\"upload_file_ext\":\"doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip\",\"upload_image_size\":\"0\",\"upload_image_ext\":\"jpg,png,gif,jpeg,ico\",\"thumb_size\":\"300x300;500x500\",\"thumb_type\":\"2\",\"image_watermark\":\"1\",\"image_watermark_pic\":\"\\/upload\\/sys\\/image\\/49\\/4d0430eaf30318ef847086d0b63db0.png\",\"image_watermark_opacity\":\"50\",\"image_watermark_location\":\"9\",\"text_watermark_content\":\"\",\"text_watermark_location\":\"7\",\"text_watermark_font\":\"\",\"text_watermark_size\":\"20\",\"text_watermark_color\":\"#000000\"},\"type\":{\"upload_file_size\":\"input\",\"upload_file_ext\":\"input\",\"upload_image_size\":\"input\",\"upload_image_ext\":\"input\",\"thumb_size\":\"input\",\"thumb_type\":\"select\",\"image_watermark\":\"switch\",\"image_watermark_pic\":\"image\",\"image_watermark_opacity\":\"input\",\"image_watermark_location\":\"select\",\"text_watermark\":\"switch\",\"text_watermark_content\":\"input\",\"text_watermark_location\":\"select\",\"text_watermark_font\":\"file\",\"text_watermark_size\":\"input\",\"text_watermark_color\":\"input\"},\"group\":\"upload\"}', '保存数据', '1', '0.0.0.0', '1508760087', '1508760087');
INSERT INTO `meng_admin_log` VALUES ('15', '1', null, null, '[]', '浏览数据', '1', '0.0.0.0', '1509078469', '1509078469');
INSERT INTO `meng_admin_log` VALUES ('16', '1', '配置管理', 'admin/config/index', '[]', '浏览数据', '44', '0.0.0.0', '1509092349', '1509617001');
INSERT INTO `meng_admin_log` VALUES ('17', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"11\"}', '浏览数据', '2', '0.0.0.0', '1509092353', '1509517269');
INSERT INTO `meng_admin_log` VALUES ('18', '1', '配置管理', 'admin/config/index', '{\"group\":\"sys\"}', '浏览数据', '2', '0.0.0.0', '1509092366', '1509517264');
INSERT INTO `meng_admin_log` VALUES ('19', '1', '配置管理', 'admin/config/index', '{\"group\":\"base\"}', '浏览数据', '4', '0.0.0.0', '1509092370', '1509517345');
INSERT INTO `meng_admin_log` VALUES ('20', '1', '欢迎页面', 'admin/index/welcome', '[]', '浏览数据', '13', '0.0.0.0', '1509093730', '1509606124');
INSERT INTO `meng_admin_log` VALUES ('21', '1', '系统菜单', 'admin/menu/index', '[]', '浏览数据', '23', '0.0.0.0', '1509101986', '1509614931');
INSERT INTO `meng_admin_log` VALUES ('22', '1', '布局切换', 'admin/user/iframe', '{\"val\":\"1\"}', '浏览数据', '3', '0.0.0.0', '1509102007', '1509585195');
INSERT INTO `meng_admin_log` VALUES ('23', '1', '布局切换', 'admin/user/iframe', '{\"val\":\"0\"}', '浏览数据', '2', '0.0.0.0', '1509102021', '1509585174');
INSERT INTO `meng_admin_log` VALUES ('24', '1', '个人信息设置', 'admin/user/info', '[]', '浏览数据', '1', '0.0.0.0', '1509102037', '1509102037');
INSERT INTO `meng_admin_log` VALUES ('25', '1', '添加菜单', 'admin/menu/add', '{\"pid\":\"6\",\"mod\":\"admin\"}', '浏览数据', '1', '0.0.0.0', '1509102104', '1509102104');
INSERT INTO `meng_admin_log` VALUES ('26', '1', '基础配置', 'admin/system/index', '{\"group\":\"base\"}', '浏览数据', '61', '0.0.0.0', '1509332836', '1509610586');
INSERT INTO `meng_admin_log` VALUES ('27', '1', '基础配置', 'admin/system/index', '{\"id\":{\"site_status\":\"1\",\"site_domain\":\"\",\"wap_domain\":\"\",\"site_name\":\"HisiPHP\",\"site_logo\":\"\",\"site_favicon\":\"\",\"site_title\":\"HisiPHP\\u5e94\\u7528\\u5e02\\u573a\",\"site_keywords\":\"hisiphp,hisiphp\\u6846\\u67b6,php\\u5f00\\u6e90\\u6846\\u67b6\",\"site_description\":\"\",\"site_icp\":\"\",\"site_statis\":\"\"},\"type\":{\"site_status\":\"switch\",\"site_domain\":\"input\",\"wap_site_status\":\"switch\",\"wap_domain\":\"input\",\"site_name\":\"input\",\"site_logo\":\"image\",\"site_favicon\":\"image\",\"site_title\":\"input\",\"site_keywords\":\"input\",\"site_description\":\"textarea\",\"site_icp\":\"input\",\"site_statis\":\"textarea\"},\"group\":\"base\"}', '保存数据', '1', '0.0.0.0', '1509499566', '1509499566');
INSERT INTO `meng_admin_log` VALUES ('28', '1', '基础配置', 'admin/system/index', '{\"id\":{\"site_status\":\"1\",\"site_domain\":\"\",\"wap_domain\":\"\",\"site_name\":\"HisiPHP\",\"site_logo\":\"\",\"site_favicon\":\"\",\"site_title\":\"HisiPHP\\u5e94\\u7528\\u5e02\\u573a\",\"site_keywords\":\"hisiphp,hisiphp\\u6846\\u67b6,php\\u5f00\\u6e90\\u6846\\u67b6\",\"site_description\":\"\\u4e09\\u5927\\u53d1\\u5c04\\u70b9\\u53d1\\u6492\\u5927\\u662f\\u5927\\u975e\\u554a\",\"site_icp\":\"\",\"site_statis\":\"\"},\"type\":{\"site_status\":\"switch\",\"site_domain\":\"input\",\"wap_site_status\":\"switch\",\"wap_domain\":\"input\",\"site_name\":\"input\",\"site_logo\":\"image\",\"site_favicon\":\"image\",\"site_title\":\"input\",\"site_keywords\":\"input\",\"site_description\":\"textarea\",\"site_icp\":\"input\",\"site_statis\":\"textarea\"},\"group\":\"base\"}', '保存数据', '1', '0.0.0.0', '1509499585', '1509499585');
INSERT INTO `meng_admin_log` VALUES ('29', '1', '基础配置', 'admin/system/index', '{\"id\":{\"site_status\":\"1\",\"site_domain\":\"\",\"wap_domain\":\"\",\"site_name\":\"HisiPHP\",\"site_logo\":\"\",\"site_favicon\":\"\",\"site_title\":\"MengPHP\",\"site_keywords\":\"mengphp,mengphp\\u6846\\u67b6\",\"site_description\":\"\\u4e09\\u5927\\u53d1\\u5c04\\u70b9\\u53d1\\u6492\\u5927\\u662f\\u5927\\u975e\\u554a\",\"site_icp\":\"\",\"site_statis\":\"\"},\"type\":{\"site_status\":\"switch\",\"site_domain\":\"input\",\"wap_site_status\":\"switch\",\"wap_domain\":\"input\",\"site_name\":\"input\",\"site_logo\":\"image\",\"site_favicon\":\"image\",\"site_title\":\"input\",\"site_keywords\":\"input\",\"site_description\":\"textarea\",\"site_icp\":\"input\",\"site_statis\":\"textarea\"},\"group\":\"base\"}', '保存数据', '1', '0.0.0.0', '1509499675', '1509499675');
INSERT INTO `meng_admin_log` VALUES ('30', '1', '开发配置', 'admin/system/index', '{\"id\":{\"app_debug\":\"1\"},\"type\":{\"app_debug\":\"switch\",\"app_trace\":\"switch\"},\"group\":\"develop\"}', '保存数据', '1', '0.0.0.0', '1509500917', '1509500917');
INSERT INTO `meng_admin_log` VALUES ('31', '1', '修改配置', 'admin/config/edit', '{\"id\":\"39\"}', '浏览数据', '1', '0.0.0.0', '1509505901', '1509505901');
INSERT INTO `meng_admin_log` VALUES ('32', '1', '添加配置', 'admin/config/add', '[]', '浏览数据', '3', '106.121.0.119', '1509505914', '1509604499');
INSERT INTO `meng_admin_log` VALUES ('33', '1', '数据库管理', 'admin/database/index', '[]', '浏览数据', '12', '0.0.0.0', '1509505931', '1509614635');
INSERT INTO `meng_admin_log` VALUES ('34', '1', '修改菜单', 'admin/menu/edit', '{\"id\":\"6\"}', '浏览数据', '1', '0.0.0.0', '1509505970', '1509505970');
INSERT INTO `meng_admin_log` VALUES ('35', '1', '修改会员等级', 'admin/member/editlevel', '{\"id\":\"1\"}', '浏览数据', '6', '0.0.0.0', '1509506130', '1509614785');
INSERT INTO `meng_admin_log` VALUES ('36', '1', '系统管理员', 'admin/user/index', '[]', '浏览数据', '15', '0.0.0.0', '1509508562', '1509616713');
INSERT INTO `meng_admin_log` VALUES ('37', '1', '修改管理员', 'admin/user/edituser', '{\"id\":\"1\"}', '浏览数据', '3', '106.121.0.119', '1509508570', '1509604937');
INSERT INTO `meng_admin_log` VALUES ('38', '1', '系统日志', 'admin/log/index', '[]', '浏览数据', '6', '0.0.0.0', '1509508574', '1509610464');
INSERT INTO `meng_admin_log` VALUES ('39', '1', '[示例]编辑模板', 'admin/develop/edit', '[]', '浏览数据', '8', '0.0.0.0', '1509516556', '1509610443');
INSERT INTO `meng_admin_log` VALUES ('40', '1', '插件管理', 'admin/plugins/index', '[]', '浏览数据', '14', '0.0.0.0', '1509516561', '1509608837');
INSERT INTO `meng_admin_log` VALUES ('41', '1', '模块管理', 'admin/module/index', '{\"status\":\"1\"}', '浏览数据', '6', '0.0.0.0', '1509516572', '1509606066');
INSERT INTO `meng_admin_log` VALUES ('42', '1', '模块管理', 'admin/module/index', '{\"status\":\"0\"}', '浏览数据', '7', '0.0.0.0', '1509516573', '1509606117');
INSERT INTO `meng_admin_log` VALUES ('43', '1', '附件上传', 'admin/annex/upload', '{\"action\":\"config\",\"noCache\":\"1509516687063\",\"thumb\":\"no\",\"from\":\"ueditor\"}', '浏览数据', '1', '0.0.0.0', '1509516688', '1509516688');
INSERT INTO `meng_admin_log` VALUES ('44', '1', '附件上传', 'admin/annex/upload', '{\"action\":\"config\",\"noCache\":\"1509516687065\",\"thumb\":\"no\",\"from\":\"ueditor\"}', '浏览数据', '1', '0.0.0.0', '1509516690', '1509516690');
INSERT INTO `meng_admin_log` VALUES ('45', '1', '附件上传', 'admin/annex/upload', '{\"action\":\"config\",\"noCache\":\"1509516887201\",\"thumb\":\"no\",\"from\":\"ueditor\"}', '浏览数据', '1', '0.0.0.0', '1509516888', '1509516888');
INSERT INTO `meng_admin_log` VALUES ('46', '1', '附件上传', 'admin/annex/upload', '{\"action\":\"config\",\"noCache\":\"1509516887200\",\"thumb\":\"no\",\"from\":\"ueditor\"}', '浏览数据', '1', '0.0.0.0', '1509516890', '1509516890');
INSERT INTO `meng_admin_log` VALUES ('47', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"10\"}', '浏览数据', '2', '0.0.0.0', '1509517126', '1509517185');
INSERT INTO `meng_admin_log` VALUES ('48', '1', '配置管理', 'admin/config/index', '{\"group\":\"upload\"}', '浏览数据', '1', '0.0.0.0', '1509517335', '1509517335');
INSERT INTO `meng_admin_log` VALUES ('49', '1', '基础配置', 'admin/system/index', '{\"id\":{\"site_status\":\"1\",\"site_domain\":\"a\",\"wap_domain\":\"\",\"site_name\":\"HisiPHP\",\"site_logo\":\"\",\"site_favicon\":\"\",\"site_title\":\"MengPHP\",\"site_keywords\":\"mengphp,mengphp\\u6846\\u67b6\",\"site_description\":\"\\u4e09\\u5927\\u53d1\\u5c04\\u70b9\\u53d1\\u6492\\u5927\\u662f\\u5927\\u975e\\u554a\",\"site_icp\":\"\",\"site_statis\":\"\"},\"type\":{\"site_status\":\"switch\",\"site_domain\":\"input\",\"wap_site_status\":\"switch\",\"wap_domain\":\"input\",\"site_name\":\"input\",\"site_logo\":\"image\",\"site_favicon\":\"image\",\"site_title\":\"input\",\"site_keywords\":\"input\",\"site_description\":\"textarea\",\"site_icp\":\"input\",\"site_statis\":\"textarea\"},\"group\":\"base\"}', '保存数据', '1', '0.0.0.0', '1509519728', '1509519728');
INSERT INTO `meng_admin_log` VALUES ('50', '1', '数据库配置', 'admin/system/index', '{\"id\":{\"backup_path\":\".\\/backup\\/database\\/\",\"part_size\":\"20971520\",\"compress\":\"1\",\"compress_level\":\"4\"},\"type\":{\"backup_path\":\"input\",\"part_size\":\"input\",\"compress\":\"switch\",\"compress_level\":\"radio\"},\"group\":\"databases\"}', '保存数据', '3', '0.0.0.0', '1509519899', '1509610584');
INSERT INTO `meng_admin_log` VALUES ('51', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"62\"}', '浏览数据', '2', '0.0.0.0', '1509521555', '1509521567');
INSERT INTO `meng_admin_log` VALUES ('52', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"63\"}', '浏览数据', '1', '0.0.0.0', '1509521572', '1509521572');
INSERT INTO `meng_admin_log` VALUES ('53', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"132\"}', '浏览数据', '2', '0.0.0.0', '1509585218', '1509585222');
INSERT INTO `meng_admin_log` VALUES ('54', '1', '基础配置', 'admin/system/index', '{\"id\":{\"site_status\":\"1\",\"site_domain\":\"http:\\/\\/majiameng.com\",\"wap_site_status\":\"1\",\"wap_domain\":\"http:\\/\\/blog.majiameng.com\",\"site_name\":\"MengPHP\",\"site_logo\":\"\",\"site_favicon\":\"\",\"site_title\":\"MengPHP\",\"site_keywords\":\"mengphp,mengphp\\u6846\\u67b6\",\"site_description\":\"\\u4e09\\u5927\\u53d1\\u5c04\\u70b9\\u53d1\\u6492\\u5927\\u662f\\u5927\\u975e\\u554a\",\"site_icp\":\"\",\"site_statis\":\"\"},\"type\":{\"site_status\":\"switch\",\"site_domain\":\"input\",\"wap_site_status\":\"switch\",\"wap_domain\":\"input\",\"site_name\":\"input\",\"site_logo\":\"image\",\"site_favicon\":\"image\",\"site_title\":\"input\",\"site_keywords\":\"input\",\"site_description\":\"textarea\",\"site_icp\":\"input\",\"site_statis\":\"textarea\"},\"group\":\"base\"}', '保存数据', '1', '106.121.0.119', '1509604149', '1509604149');
INSERT INTO `meng_admin_log` VALUES ('55', '1', '状态设置', 'admin/config/status', '{\"val\":\"0\",\"table\":\"admin_config\",\"ids\":\"39\"}', '浏览数据', '4', '106.121.0.119', '1509604261', '1509604385');
INSERT INTO `meng_admin_log` VALUES ('56', '1', '状态设置', 'admin/config/status', '{\"val\":\"1\",\"table\":\"admin_config\",\"ids\":\"39\"}', '浏览数据', '4', '106.121.0.119', '1509604261', '1509604419');
INSERT INTO `meng_admin_log` VALUES ('57', '1', '状态设置', 'admin/config/status', '{\"val\":\"0\",\"table\":\"admin_config\",\"ids\":\"13\"}', '浏览数据', '1', '106.121.0.119', '1509604400', '1509604400');
INSERT INTO `meng_admin_log` VALUES ('58', '1', '状态设置', 'admin/config/status', '{\"val\":\"1\",\"table\":\"admin_config\",\"ids\":\"13\"}', '浏览数据', '1', '106.121.0.119', '1509604411', '1509604411');
INSERT INTO `meng_admin_log` VALUES ('59', '1', '排序设置', 'admin/config/sort', '{\"val\":\"2\",\"table\":\"admin_config\",\"ids\":\"39\"}', '保存数据', '1', '106.121.0.119', '1509604425', '1509604425');
INSERT INTO `meng_admin_log` VALUES ('60', '1', '排序设置', 'admin/config/sort', '{\"val\":\"1\",\"table\":\"admin_config\",\"ids\":\"39\"}', '保存数据', '1', '106.121.0.119', '1509604429', '1509604429');
INSERT INTO `meng_admin_log` VALUES ('61', '1', '修改配置', 'admin/config/edit', '{\"id\":\"44\"}', '浏览数据', '1', '106.121.0.119', '1509604493', '1509604493');
INSERT INTO `meng_admin_log` VALUES ('62', '1', '排序设置', 'admin/menu/sort', '{\"val\":\"1\",\"table\":\"admin_menu\",\"ids\":\"1\"}', '保存数据', '1', '106.121.0.119', '1509604542', '1509604542');
INSERT INTO `meng_admin_log` VALUES ('63', '1', '排序设置', 'admin/menu/sort', '{\"val\":\"2\",\"table\":\"admin_menu\",\"ids\":\"2\"}', '保存数据', '1', '106.121.0.119', '1509604545', '1509604545');
INSERT INTO `meng_admin_log` VALUES ('64', '1', '排序设置', 'admin/menu/sort', '{\"val\":\"3\",\"table\":\"admin_menu\",\"ids\":\"3\"}', '保存数据', '1', '106.121.0.119', '1509604548', '1509604548');
INSERT INTO `meng_admin_log` VALUES ('65', '1', '状态设置', 'admin/menu/status', '{\"val\":\"0\",\"table\":\"admin_menu\",\"ids\":\"1\"}', '浏览数据', '5', '106.121.0.119', '1509604552', '1509604555');
INSERT INTO `meng_admin_log` VALUES ('66', '1', '状态设置', 'admin/menu/status', '{\"val\":\"0\",\"table\":\"admin_menu\",\"ids\":\"2\"}', '浏览数据', '5', '106.121.0.119', '1509604556', '1509604563');
INSERT INTO `meng_admin_log` VALUES ('67', '1', '状态设置', 'admin/menu/status', '{\"val\":\"0\",\"table\":\"admin_menu\",\"ids\":\"3\"}', '浏览数据', '2', '106.121.0.119', '1509604557', '1509604559');
INSERT INTO `meng_admin_log` VALUES ('68', '1', '状态设置', 'admin/menu/status', '{\"val\":\"1\",\"table\":\"admin_menu\",\"ids\":\"3\"}', '浏览数据', '2', '106.121.0.119', '1509604558', '1509604560');
INSERT INTO `meng_admin_log` VALUES ('69', '1', '状态设置', 'admin/menu/status', '{\"ids\":{\"1\":\"4\"},\"sort\":{\"1\":\"0\",\"3\":\"1\",\"5\":\"100\",\"7\":\"100\",\"9\":\"100\"},\"status\":\"1\",\"table\":\"admin_menu\",\"val\":\"1\"}', '保存数据', '2', '106.121.0.119', '1509604732', '1509604737');
INSERT INTO `meng_admin_log` VALUES ('70', '1', '状态设置', 'admin/menu/status', '{\"ids\":{\"1\":\"4\"},\"sort\":{\"1\":\"0\",\"3\":\"1\",\"5\":\"100\",\"7\":\"100\",\"9\":\"100\"},\"status\":\"1\",\"table\":\"admin_menu\",\"val\":\"0\"}', '保存数据', '1', '106.121.0.119', '1509604734', '1509604734');
INSERT INTO `meng_admin_log` VALUES ('71', '1', '修改菜单', 'admin/menu/edit', '{\"id\":\"106\"}', '浏览数据', '1', '106.121.0.119', '1509604763', '1509604763');
INSERT INTO `meng_admin_log` VALUES ('72', '1', '修改会员', 'admin/member/edit', '{\"id\":\"1000000\"}', '浏览数据', '3', '0.0.0.0', '1509604802', '1509614864');
INSERT INTO `meng_admin_log` VALUES ('73', '1', '优化数据库', 'admin/database/optimize', '{\"ids\":\"meng_admin_annex\"}', '浏览数据', '1', '106.121.0.119', '1509604830', '1509604830');
INSERT INTO `meng_admin_log` VALUES ('74', '1', '修复数据库', 'admin/database/repair', '{\"ids\":\"meng_admin_annex\"}', '浏览数据', '1', '106.121.0.119', '1509604831', '1509604831');
INSERT INTO `meng_admin_log` VALUES ('75', '1', '数据库管理', 'admin/database/index', '{\"group\":\"import\"}', '浏览数据', '2', '0.0.0.0', '1509604836', '1509604851');
INSERT INTO `meng_admin_log` VALUES ('76', '1', '管理员角色', 'admin/user/role', '[]', '浏览数据', '4', '0.0.0.0', '1509604992', '1509616716');
INSERT INTO `meng_admin_log` VALUES ('77', '1', '修改角色', 'admin/user/editrole', '{\"id\":\"2\"}', '浏览数据', '3', '0.0.0.0', '1509604998', '1509605089');
INSERT INTO `meng_admin_log` VALUES ('78', '1', '导入模块', 'admin/module/import', '[]', '浏览数据', '4', '0.0.0.0', '1509605349', '1509606073');
INSERT INTO `meng_admin_log` VALUES ('79', '1', '模块管理', 'admin/module/index', '{\"status\":\"2\"}', '浏览数据', '8', '0.0.0.0', '1509605350', '1509606096');
INSERT INTO `meng_admin_log` VALUES ('80', '1', '设计模块', 'admin/module/design', '[]', '浏览数据', '9', '0.0.0.0', '1509605351', '1509606143');
INSERT INTO `meng_admin_log` VALUES ('81', '1', '插件管理', 'admin/plugins/index', '{\"status\":\"0\"}', '浏览数据', '2', '0.0.0.0', '1509605406', '1509606272');
INSERT INTO `meng_admin_log` VALUES ('82', '1', '插件管理', 'admin/plugins/index', '{\"status\":\"1\"}', '浏览数据', '1', '0.0.0.0', '1509605407', '1509605407');
INSERT INTO `meng_admin_log` VALUES ('83', '1', '设计插件', 'admin/plugins/design', '[]', '浏览数据', '4', '0.0.0.0', '1509605408', '1509606251');
INSERT INTO `meng_admin_log` VALUES ('84', '1', '添加快捷菜单', 'admin/menu/quick', '{\"id\":\"17\"}', '浏览数据', '1', '0.0.0.0', '1509605713', '1509605713');
INSERT INTO `meng_admin_log` VALUES ('85', '1', '设计模块', 'admin/module/design', '{\"name\":\"user\",\"title\":\"user\",\"identifier\":\"user\",\"intro\":\"user\",\"author\":\"user\",\"url\":\"user\",\"version\":\"1.0.0\",\"file\":\"common.php,config.php\",\"dir\":\"admin\\r\\nhome\\r\\nmodel\\r\\nlang\\r\\nsql\\r\\nvalidate\\r\\nview\"}', '保存数据', '1', '0.0.0.0', '1509605728', '1509605728');
INSERT INTO `meng_admin_log` VALUES ('86', '1', '安装模块', 'admin/module/install', '{\"id\":\"4\"}', '浏览数据', '1', '0.0.0.0', '1509605746', '1509605746');
INSERT INTO `meng_admin_log` VALUES ('87', '1', '安装模块', 'admin/module/install', '{\"clear\":\"0\",\"id\":\"4\"}', '保存数据', '1', '0.0.0.0', '1509605764', '1509605764');
INSERT INTO `meng_admin_log` VALUES ('88', '1', '主题管理', 'admin/module/theme', '{\"id\":\"4\"}', '浏览数据', '1', '0.0.0.0', '1509605806', '1509605806');
INSERT INTO `meng_admin_log` VALUES ('89', '1', '卸载模块', 'admin/module/uninstall', '{\"id\":\"4\"}', '浏览数据', '1', '0.0.0.0', '1509606107', '1509606107');
INSERT INTO `meng_admin_log` VALUES ('90', '1', '卸载模块', 'admin/module/uninstall', '{\"clear\":\"1\",\"id\":\"4\"}', '保存数据', '1', '0.0.0.0', '1509606113', '1509606113');
INSERT INTO `meng_admin_log` VALUES ('91', '1', '设计插件', 'admin/plugins/design', '{\"name\":\"mengmeng\",\"title\":\"mengmeng\",\"identifier\":\"mengmeng\",\"intro\":\"mengmeng\",\"author\":\"mengmeng\",\"url\":\"mengmeng\",\"version\":\"1.0.0\",\"dir\":\"admin\\r\\nhome\\r\\nmodel\\r\\nsql\\r\\nvalidate\\r\\nview\\r\\nstatic\"}', '保存数据', '1', '0.0.0.0', '1509606267', '1509606267');
INSERT INTO `meng_admin_log` VALUES ('92', '1', '删除插件', 'admin/plugins/del', '{\"id\":\"1\"}', '浏览数据', '2', '0.0.0.0', '1509606327', '1509606343');
INSERT INTO `meng_admin_log` VALUES ('93', '1', '添加钩子', 'admin/hook/add', '[]', '浏览数据', '2', '0.0.0.0', '1509606383', '1509606396');
INSERT INTO `meng_admin_log` VALUES ('94', '1', '添加钩子', 'admin/hook/add', '{\"name\":\"123\",\"intro\":\"1231\",\"id\":\"\"}', '保存数据', '1', '0.0.0.0', '1509606392', '1509606392');
INSERT INTO `meng_admin_log` VALUES ('95', '1', '删除钩子', 'admin/hook/del', '{\"ids\":\"5\"}', '浏览数据', '1', '0.0.0.0', '1509606413', '1509606413');
INSERT INTO `meng_admin_log` VALUES ('96', '1', '在线升级', 'admin/upgrade/index', '{\"account\":\"admin\",\"password\":\"admin123\"}', '保存数据', '1', '0.0.0.0', '1509606525', '1509606525');
INSERT INTO `meng_admin_log` VALUES ('97', '1', '语言包管理', 'admin/language/index', '[]', '浏览数据', '1', '0.0.0.0', '1509606540', '1509606540');
INSERT INTO `meng_admin_log` VALUES ('98', '1', '修改语言包', 'admin/language/edit', '{\"id\":\"1\"}', '浏览数据', '1', '0.0.0.0', '1509606547', '1509606547');
INSERT INTO `meng_admin_log` VALUES ('99', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"19\"}', '浏览数据', '5', '0.0.0.0', '1509609023', '1509609029');
INSERT INTO `meng_admin_log` VALUES ('100', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"50\"}', '浏览数据', '1', '0.0.0.0', '1509609030', '1509609030');
INSERT INTO `meng_admin_log` VALUES ('101', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"51\"}', '浏览数据', '1', '0.0.0.0', '1509609051', '1509609051');
INSERT INTO `meng_admin_log` VALUES ('102', '1', '删除菜单', 'admin/menu/del', '{\"sort\":{\"1\":\"1\",\"3\":\"1\",\"5\":\"1\",\"6\":\"2\",\"7\":\"3\",\"8\":\"4\",\"9\":\"5\",\"10\":\"2\",\"12\":\"1\",\"13\":\"2\",\"14\":\"3\",\"15\":\"4\",\"16\":\"5\",\"17\":\"3\",\"19\":\"1\",\"20\":\"2\",\"21\":\"3\",\"22\":\"4\",\"23\":\"5\",\"24\":\"6\",\"25\":\"7\",\"26\":\"4\",\"28\":\"1\",\"29\":\"2\",\"30\":\"3\",\"31\":\"4\",\"32\":\"5\",\"34\":\"1\",\"35\":\"2\",\"36\":\"3\",\"37\":\"4\",\"38\":\"5\",\"39\":\"6\",\"41\":\"100\",\"42\":\"100\",\"43\":\"7\",\"45\":\"1\",\"46\":\"2\",\"47\":\"3\",\"48\":\"8\",\"50\":\"0\",\"51\":\"0\",\"52\":\"0\",\"53\":\"0\",\"54\":\"0\",\"55\":\"11\",\"57\":\"100\",\"58\":\"100\",\"59\":\"100\",\"60\":\"100\",\"61\":\"100\",\"63\":\"2\",\"65\":\"1\",\"67\":\"0\",\"68\":\"0\",\"69\":\"0\",\"70\":\"2\",\"72\":\"0\",\"73\":\"1\",\"74\":\"2\",\"75\":\"3\",\"76\":\"4\",\"77\":\"5\",\"79\":\"3\",\"81\":\"1\",\"83\":\"1\",\"84\":\"2\",\"85\":\"3\",\"86\":\"4\",\"87\":\"5\",\"88\":\"6\",\"89\":\"7\",\"90\":\"8\",\"91\":\"9\",\"92\":\"10\",\"93\":\"11\",\"94\":\"2\",\"96\":\"0\",\"97\":\"1\",\"98\":\"2\",\"99\":\"3\",\"100\":\"4\",\"101\":\"5\",\"102\":\"6\",\"103\":\"7\",\"104\":\"8\",\"105\":\"3\",\"107\":\"2\",\"108\":\"3\",\"109\":\"4\",\"110\":\"5\",\"111\":\"4\",\"113\":\"0\",\"114\":\"0\",\"115\":\"0\",\"117\":\"4\",\"119\":\"1\",\"121\":\"2\"},\"status\":\"1\",\"ids\":{\"83\":\"65\",\"84\":\"66\",\"85\":\"67\",\"86\":\"68\",\"87\":\"69\",\"88\":\"64\",\"89\":\"92\",\"90\":\"94\",\"91\":\"95\",\"92\":\"96\",\"93\":\"104\",\"96\":\"93\",\"97\":\"42\",\"98\":\"43\",\"99\":\"44\",\"100\":\"45\",\"101\":\"46\",\"102\":\"47\",\"103\":\"48\",\"104\":\"49\",\"107\":\"51\",\"108\":\"52\",\"109\":\"53\",\"110\":\"54\",\"113\":\"81\",\"114\":\"82\",\"115\":\"83\"}}', '保存数据', '1', '0.0.0.0', '1509609083', '1509609083');
INSERT INTO `meng_admin_log` VALUES ('103', '1', '删除菜单', 'admin/menu/del', '{\"sort\":{\"1\":\"1\",\"3\":\"1\",\"5\":\"1\",\"6\":\"2\",\"7\":\"3\",\"8\":\"4\",\"9\":\"5\",\"10\":\"2\",\"12\":\"1\",\"13\":\"2\",\"14\":\"3\",\"15\":\"4\",\"16\":\"5\",\"17\":\"3\",\"19\":\"1\",\"20\":\"2\",\"21\":\"3\",\"22\":\"4\",\"23\":\"5\",\"24\":\"6\",\"25\":\"7\",\"26\":\"4\",\"28\":\"1\",\"29\":\"2\",\"30\":\"3\",\"31\":\"4\",\"32\":\"5\",\"34\":\"1\",\"35\":\"2\",\"36\":\"3\",\"37\":\"4\",\"38\":\"5\",\"39\":\"6\",\"41\":\"100\",\"42\":\"100\",\"43\":\"7\",\"45\":\"1\",\"46\":\"2\",\"47\":\"3\",\"48\":\"8\",\"50\":\"0\",\"51\":\"0\",\"52\":\"0\",\"53\":\"0\",\"54\":\"0\",\"55\":\"11\",\"57\":\"100\",\"58\":\"100\",\"59\":\"100\",\"60\":\"100\",\"61\":\"100\",\"63\":\"2\",\"65\":\"1\",\"67\":\"0\",\"68\":\"0\",\"69\":\"0\",\"70\":\"2\",\"72\":\"0\",\"73\":\"1\",\"74\":\"2\",\"75\":\"3\",\"76\":\"4\",\"77\":\"5\",\"79\":\"3\",\"81\":\"1\",\"83\":\"2\",\"85\":\"3\",\"87\":\"4\",\"90\":\"4\",\"92\":\"1\",\"94\":\"2\"},\"status\":\"1\",\"ids\":{\"81\":\"17\",\"83\":\"18\",\"85\":\"19\",\"87\":\"80\"}}', '保存数据', '1', '0.0.0.0', '1509609168', '1509609168');
INSERT INTO `meng_admin_log` VALUES ('104', '1', '删除菜单', 'admin/menu/del', '{\"sort\":{\"1\":\"1\",\"3\":\"1\",\"5\":\"1\",\"6\":\"2\",\"7\":\"3\",\"8\":\"4\",\"9\":\"5\",\"10\":\"2\",\"12\":\"1\",\"13\":\"2\",\"14\":\"3\",\"15\":\"4\",\"16\":\"5\",\"17\":\"3\",\"19\":\"1\",\"20\":\"2\",\"21\":\"3\",\"22\":\"4\",\"23\":\"5\",\"24\":\"6\",\"25\":\"7\",\"26\":\"4\",\"28\":\"1\",\"29\":\"2\",\"30\":\"3\",\"31\":\"4\",\"32\":\"5\",\"34\":\"1\",\"35\":\"2\",\"36\":\"3\",\"37\":\"4\",\"38\":\"5\",\"39\":\"6\",\"41\":\"100\",\"42\":\"100\",\"43\":\"7\",\"45\":\"1\",\"46\":\"2\",\"47\":\"3\",\"48\":\"8\",\"50\":\"0\",\"51\":\"0\",\"52\":\"0\",\"53\":\"0\",\"54\":\"0\",\"55\":\"11\",\"57\":\"100\",\"58\":\"100\",\"59\":\"100\",\"60\":\"100\",\"61\":\"100\",\"63\":\"2\",\"65\":\"1\",\"67\":\"0\",\"68\":\"0\",\"69\":\"0\",\"70\":\"2\",\"72\":\"0\",\"73\":\"1\",\"74\":\"2\",\"75\":\"3\",\"76\":\"4\",\"77\":\"5\",\"79\":\"3\",\"82\":\"4\",\"84\":\"1\",\"86\":\"2\"},\"status\":\"1\",\"ids\":{\"79\":\"8\"}}', '保存数据', '1', '0.0.0.0', '1509609253', '1509609253');
INSERT INTO `meng_admin_log` VALUES ('105', '1', '导出菜单', 'admin/menu/export', '{\"id\":\"2\"}', '浏览数据', '1', '0.0.0.0', '1509609256', '1509609256');
INSERT INTO `meng_admin_log` VALUES ('106', '1', '欢迎页面', 'admin/index/index_page', '[]', '浏览数据', '23', '0.0.0.0', '1509613756', '1509617139');
INSERT INTO `meng_admin_log` VALUES ('107', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"133\"}', '保存数据', '1', '0.0.0.0', '1509614264', '1509614264');
INSERT INTO `meng_admin_log` VALUES ('108', '1', '修改会员等级', 'admin/member/editlevel', '{\"name\":\"\\u666e\\u901a\\u7528\\u6237\",\"discount\":\"100\",\"min_exper\":\"0\",\"max_exper\":\"0\",\"expire\":\"0\",\"status\":\"1\",\"default\":\"1\",\"intro\":\"\\u666e\\u901a\\u7528\\u6237\",\"id\":\"\"}', '保存数据', '1', '0.0.0.0', '1509614781', '1509614781');
INSERT INTO `meng_admin_log` VALUES ('109', '1', '添加会员等级', 'admin/member/addlevel', '[]', '浏览数据', '2', '0.0.0.0', '1509614796', '1509614807');
INSERT INTO `meng_admin_log` VALUES ('110', '1', '添加会员等级', 'admin/member/addlevel', '{\"name\":\"\\u666e\\u901a\\u7528\\u6237\",\"discount\":\"100\",\"min_exper\":\"0\",\"max_exper\":\"0\",\"expire\":\"0\",\"status\":\"1\",\"default\":\"1\",\"intro\":\"\\u666e\\u901a\\u7528\\u6237\",\"id\":\"\"}', '保存数据', '1', '0.0.0.0', '1509614803', '1509614803');
INSERT INTO `meng_admin_log` VALUES ('111', '1', '删除会员等级', 'admin/member/dellevel', '{\"ids\":\"1\"}', '浏览数据', '1', '0.0.0.0', '1509614818', '1509614818');
INSERT INTO `meng_admin_log` VALUES ('112', '1', '修改会员', 'admin/member/edit', '{\"level_id\":\"2\",\"username\":\"admin\\\\\",\"nick\":\"admin\",\"password\":\"admin123\",\"email\":\"\",\"mobile\":\"\",\"expire_time\":\"\",\"status\":\"1\",\"id\":\"\"}', '保存数据', '1', '0.0.0.0', '1509614849', '1509614849');
INSERT INTO `meng_admin_log` VALUES ('113', '1', '修改会员', 'admin/member/edit', '{\"level_id\":\"2\",\"username\":\"admin\",\"nick\":\"admin\",\"password\":\"admin123\",\"email\":\"\",\"mobile\":\"\",\"expire_time\":\"\",\"status\":\"1\",\"id\":\"\"}', '保存数据', '1', '0.0.0.0', '1509614853', '1509614853');
INSERT INTO `meng_admin_log` VALUES ('114', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"136\"}', '保存数据', '1', '0.0.0.0', '1509616982', '1509616982');
INSERT INTO `meng_admin_log` VALUES ('115', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"134\"}', '保存数据', '2', '0.0.0.0', '1509616986', '1509616993');
INSERT INTO `meng_admin_log` VALUES ('116', '1', '删除菜单', 'admin/menu/del', '{\"ids\":\"135\"}', '保存数据', '1', '0.0.0.0', '1509616988', '1509616988');

-- ----------------------------
-- Table structure for meng_admin_member
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_member`;
CREATE TABLE `meng_admin_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级ID',
  `nick` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `mobile` bigint(11) unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用金额',
  `frozen_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `income` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '收入统计',
  `expend` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '开支统计',
  `exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '经验值',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `frozen_integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '冻结积分',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别(1男，0女)',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `last_login_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登陆IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '到期时间(0永久)',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态(0禁用，1正常)',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000001 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 会员表';

-- ----------------------------
-- Records of meng_admin_member
-- ----------------------------
INSERT INTO `meng_admin_member` VALUES ('1000000', '1', '', 'test', '0', '', '$2y$10$WC0mMyErW1u1JCLXDCbTIuagCceC/kKpjzvCf.cxrVKaxsrZLXrGe', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '1', '', '', '0', '0', '0', '1', '1493274686');

-- ----------------------------
-- Table structure for meng_admin_member_level
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_member_level`;
CREATE TABLE `meng_admin_member_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '等级名称',
  `min_exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最小经验值',
  `max_exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最大经验值',
  `discount` int(2) unsigned NOT NULL DEFAULT '100' COMMENT '折扣率(%)',
  `intro` varchar(255) NOT NULL COMMENT '等级简介',
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认等级',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员有效期(天)',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='[系统] 会员等级';

-- ----------------------------
-- Records of meng_admin_member_level
-- ----------------------------
INSERT INTO `meng_admin_member_level` VALUES ('1', '普通用户', '0', '0', '100', '普通用户', '1', '0', '1', '1509614804', '1509614804');
INSERT INTO `meng_admin_member_level` VALUES ('2', '会员', '0', '0', '100', '会员', '0', '0', '1', '1509614804', '1509614804');

-- ----------------------------
-- Table structure for meng_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_menu`;
CREATE TABLE `meng_admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID(快捷菜单专用)',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL COMMENT '模块名或插件名，插件名格式:plugins.插件名',
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `title` varchar(20) NOT NULL COMMENT '菜单标题',
  `icon` varchar(80) NOT NULL DEFAULT 'aicon ai-shezhi' COMMENT '菜单图标',
  `url` varchar(200) NOT NULL COMMENT '链接地址(模块/控制器/方法)',
  `param` varchar(200) NOT NULL DEFAULT '' COMMENT '扩展参数',
  `target` varchar(20) NOT NULL DEFAULT '_self' COMMENT '打开方式(_blank,_self)',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `debug` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '开发模式可见',
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统菜单，系统菜单不可删除',
  `nav` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否为菜单显示，1显示0不显示',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态1显示，0隐藏',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 管理菜单';

-- ----------------------------
-- Records of meng_admin_menu
-- ----------------------------
INSERT INTO `meng_admin_menu` VALUES ('1', '0', '0', '', null, null, '首页', 'fa fa-desktop', '', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('2', '0', '0', '', null, null, '系统', 'fa fa-desktop', '', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('3', '0', '0', '', null, null, '社区', 'fa fa-desktop', '', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('4', '0', '1', '', null, null, '快捷菜单', 'fa fa-desktop', '', '', '_self', '0', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('5', '0', '3', '', 'plugins', null, '插件列表', 'fa fa-desktop', '', '', '_self', '0', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('6', '0', '2', '', 'system', null, '系统功能', 'fa fa-desktop', '', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('7', '0', '2', '', 'member', null, '会员管理', 'fa fa-desktop', '', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('9', '0', '2', '', 'develop', null, '开发专用', 'fa fa-desktop', '', '', '_self', '4', '1', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('10', '0', '6', 'admin', 'system', 'index', '系统设置', 'fa fa-desktop', 'admin/system/index', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('11', '0', '6', 'admin', 'config', 'index', '配置管理', 'fa fa-desktop', 'admin/config/index', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('12', '0', '6', 'admin', 'menu', 'index', '系统菜单', 'fa fa-desktop', 'admin/menu/index', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('13', '0', '6', 'admin', 'user', 'role', '管理员角色', 'fa fa-desktop', 'admin/user/role', '', '_self', '4', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('14', '0', '6', 'admin', 'user', 'index', '系统管理员', 'fa fa-desktop', 'admin/user/index', '', '_self', '5', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('15', '0', '6', 'admin', 'log', 'index', '系统日志', 'fa fa-desktop', 'admin/log/index', '', '_self', '6', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('16', '0', '6', 'admin', 'annex', 'index', '附件管理', 'fa fa-desktop', 'admin/annex/index', '', '_self', '7', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('20', '0', '7', 'admin', 'member', 'level', '会员等级', 'fa fa-desktop', 'admin/member/level', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('21', '0', '7', 'admin', 'member', 'index', '会员列表', 'fa fa-desktop', 'admin/member/index', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('22', '0', '9', 'admin', 'develop', 'lists', '[示例]列表模板', 'fa fa-desktop', 'admin/develop/lists', '', '_self', '1', '1', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('23', '0', '9', 'admin', 'develop', 'edit', '[示例]编辑模板', 'fa fa-desktop', 'admin/develop/edit', '', '_self', '2', '1', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('24', '0', '4', 'admin', 'index', 'index', '后台首页', 'fa fa-desktop', 'admin/index/index', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('25', '0', '4', 'admin', 'index', 'clear', '清空缓存', 'fa fa-desktop', 'admin/index/clear', '', '_self', '1', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('26', '0', '12', 'admin', 'menu', 'add', '添加菜单', 'fa fa-desktop', 'admin/menu/add', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('27', '0', '12', 'admin', 'menu', 'edit', '修改菜单', 'fa fa-desktop', 'admin/menu/edit', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('28', '0', '12', 'admin', 'menu', 'del', '删除菜单', 'fa fa-desktop', 'admin/menu/del', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('29', '0', '12', 'admin', 'menu', 'status', '状态设置', 'fa fa-desktop', 'admin/menu/status', '', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('30', '0', '12', 'admin', 'menu', 'sort', '排序设置', 'fa fa-desktop', 'admin/menu/sort', '', '_self', '5', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('31', '0', '12', 'admin', 'menu', 'quick', '添加快捷菜单', 'fa fa-desktop', 'admin/menu/quick', '', '_self', '6', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('32', '0', '12', 'admin', 'menu', 'export', '导出菜单', 'fa fa-desktop', 'admin/menu/export', '', '_self', '7', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('33', '0', '13', 'admin', 'user', 'addrole', '添加角色', 'fa fa-desktop', 'admin/user/addrole', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('34', '0', '13', 'admin', 'user', 'editrole', '修改角色', 'fa fa-desktop', 'admin/user/editrole', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('35', '0', '13', 'admin', 'user', 'delrole', '删除角色', 'fa fa-desktop', 'admin/user/delrole', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('36', '0', '13', 'admin', 'user', 'status', '状态设置', 'fa fa-desktop', 'admin/user/status', '', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('37', '0', '14', 'admin', 'user', 'adduser', '添加管理员', 'fa fa-desktop', 'admin/user/adduser', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('38', '0', '14', 'admin', 'user', 'edituser', '修改管理员', 'fa fa-desktop', 'admin/user/edituser', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('39', '0', '14', 'admin', 'user', 'deluser', '删除管理员', 'fa fa-desktop', 'admin/user/deluser', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('40', '0', '14', 'admin', 'user', 'status', '状态设置', 'fa fa-desktop', 'admin/user/status', '', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('41', '0', '14', 'admin', 'user', 'info', '个人信息设置', 'fa fa-desktop', 'admin/user/info', '', '_self', '5', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('55', '0', '11', 'admin', 'config', 'add', '添加配置', 'fa fa-desktop', 'admin/config/add', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('56', '0', '11', 'admin', 'config', 'edit', '修改配置', 'fa fa-desktop', 'admin/config/edit', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('57', '0', '11', 'admin', 'config', 'del', '删除配置', 'fa fa-desktop', 'admin/config/del', '', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('58', '0', '11', 'admin', 'config', 'status', '状态设置', '', 'admin/config/status', '', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('59', '0', '11', 'admin', 'config', 'sort', '排序设置', '', 'admin/config/sort', '', '_self', '5', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('60', '0', '10', 'admin', 'system', 'index', '基础配置', '', 'admin/system/index', 'group=base', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('61', '0', '10', 'admin', 'system', 'index', '系统配置', '', 'admin/system/index', 'group=sys', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('62', '0', '10', 'admin', 'system', 'index', '上传配置', '', 'admin/system/index', 'group=upload', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('63', '0', '10', 'admin', 'system', 'index', '开发配置', '', 'admin/system/index', 'group=develop', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('70', '0', '21', 'admin', 'member', 'add', '添加会员', '', 'admin/member/add', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('71', '0', '21', 'admin', 'member', 'edit', '修改会员', '', 'admin/member/edit', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('72', '0', '21', 'admin', 'member', 'del', '删除会员', '', 'admin/member/del', 'table=admin_member', '_self', '3', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('73', '0', '21', 'admin', 'member', 'status', '状态设置', '', 'admin/member/status', '', '_self', '4', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('74', '0', '21', 'admin', 'member', 'pop', '[弹窗]会员选择', 'fa fa-desktop', 'admin/member/pop', '', '_self', '5', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('75', '0', '20', 'admin', 'member', 'addlevel', '添加会员等级', 'fa fa-desktop', 'admin/member/addlevel', '', '_self', '0', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('76', '0', '20', 'admin', 'member', 'editlevel', '修改会员等级', 'fa fa-desktop', 'admin/member/editlevel', '', '_self', '0', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('77', '0', '20', 'admin', 'member', 'dellevel', '删除会员等级', 'fa fa-desktop', 'admin/member/dellevel', '', '_self', '0', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('78', '0', '16', 'admin', 'annex', 'upload', '附件上传', 'fa fa-desktop', 'admin/annex/upload', '', '_self', '1', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('79', '0', '16', 'admin', 'annex', 'del', '删除附件', 'fa fa-desktop', 'admin/annex/del', '', '_self', '2', '0', '1', '1', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('84', '0', '6', 'admin', 'database', 'index', '数据库管理', 'fa fa-desktop', 'admin/database/index', '', '_self', '8', '0', '1', '1', '1', '1491461136');
INSERT INTO `meng_admin_menu` VALUES ('85', '0', '84', 'admin', 'database', 'export', '备份数据库', 'fa fa-desktop', 'admin/database/export', '', '_self', '0', '0', '1', '1', '1', '1491461250');
INSERT INTO `meng_admin_menu` VALUES ('86', '0', '84', 'admin', 'database', 'import', '恢复数据库', 'fa fa-desktop', 'admin/database/import', '', '_self', '0', '0', '1', '1', '1', '1491461315');
INSERT INTO `meng_admin_menu` VALUES ('87', '0', '84', 'admin', 'database', 'optimize', '优化数据库', 'fa fa-desktop', 'admin/database/optimize', '', '_self', '0', '0', '1', '1', '1', '1491467000');
INSERT INTO `meng_admin_menu` VALUES ('88', '0', '84', 'admin', 'database', 'del', '删除备份', 'fa fa-desktop', 'admin/database/del', '', '_self', '0', '0', '1', '1', '1', '1491467058');
INSERT INTO `meng_admin_menu` VALUES ('89', '0', '84', 'admin', 'database', 'repair', '修复数据库', 'fa fa-desktop', 'admin/database/repair', '', '_self', '0', '0', '1', '1', '1', '1491880879');
INSERT INTO `meng_admin_menu` VALUES ('90', '0', '21', 'admin', 'member', 'setdefault', '设置默认等级', 'fa fa-desktop', 'admin/member/setdefault', '', '_self', '0', '0', '1', '1', '1', '1491966585');
INSERT INTO `meng_admin_menu` VALUES ('91', '0', '10', 'admin', 'system', 'index', '数据库配置', 'fa fa-desktop', 'admin/system/index', 'group=databases', '_self', '5', '0', '1', '1', '1', '1492072213');
INSERT INTO `meng_admin_menu` VALUES ('97', '0', '6', 'admin', 'language', 'index', '语言包管理', 'fa fa-desktop', 'admin/language/index', '', '_self', '11', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('98', '0', '97', 'admin', 'language', 'add', '添加语言包', 'fa fa-desktop', 'admin/language/add', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('99', '0', '97', 'admin', 'language', 'edit', '修改语言包', 'fa fa-desktop', 'admin/language/edit', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('100', '0', '97', 'admin', 'language', 'del', '删除语言包', 'fa fa-desktop', 'admin/language/del', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('101', '0', '97', 'admin', 'language', 'sort', '排序设置', 'fa fa-desktop', 'admin/language/sort', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('102', '0', '97', 'admin', 'language', 'status', '状态设置', 'fa fa-desktop', 'admin/language/status', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('103', '0', '16', 'admin', 'annex', 'favicon', '收藏夹图标上传', 'fa fa-desktop', 'admin/annex/favicon', '', '_self', '3', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('105', '0', '4', 'admin', 'index', 'index_page', '欢迎页面', 'fa fa-desktop', 'admin/index/index_page', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('106', '0', '4', 'admin', 'user', 'iframe', '布局切换', 'fa fa-desktop', 'admin/user/iframe', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('107', '0', '15', 'admin', 'log', 'del', '删除日志', 'fa fa-desktop', 'admin/log/del', 'table=admin_log', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('108', '0', '15', 'admin', 'log', 'clear', '清空日志', 'fa fa-desktop', 'admin/log/clear', '', '_self', '100', '0', '1', '0', '1', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('109', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('110', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('111', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('112', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('113', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('114', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('115', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('116', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('117', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('118', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('119', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('120', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('121', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('122', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('123', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('124', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('125', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('126', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('127', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('128', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('129', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('130', '0', '4', 'admin', '', '', '预留占位', '', '', '', '_self', '100', '0', '1', '1', '0', '1490315067');
INSERT INTO `meng_admin_menu` VALUES ('132', '1', '4', 'admin', 'config', 'index', '配置管理', 'fa fa-desktop', 'admin/config/index', '', '_self', '2', '0', '0', '1', '1', '1509092353');

-- ----------------------------
-- Table structure for meng_admin_menu_lang
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_menu_lang`;
CREATE TABLE `meng_admin_menu_lang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `lang` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '语言包',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8 COMMENT='[系统] 菜单语言';

-- ----------------------------
-- Records of meng_admin_menu_lang
-- ----------------------------
INSERT INTO `meng_admin_menu_lang` VALUES ('131', '1', '首页', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('132', '2', '系统', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('133', '3', '插件', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('134', '4', '快捷菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('135', '5', '插件列表', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('136', '6', '系统功能', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('137', '7', '会员管理', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('139', '9', '开发专用', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('140', '10', '系统设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('141', '11', '配置管理', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('142', '12', '系统菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('143', '13', '管理员角色', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('144', '14', '系统管理员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('145', '15', '系统日志', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('146', '16', '附件管理', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('150', '20', '会员等级', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('151', '21', '会员列表', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('152', '22', '[示例]列表模板', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('153', '23', '[示例]编辑模板', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('154', '24', '后台首页', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('155', '25', '清空缓存', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('156', '26', '添加菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('157', '27', '修改菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('158', '28', '删除菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('159', '29', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('160', '30', '排序设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('161', '31', '添加快捷菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('162', '32', '导出菜单', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('163', '33', '添加角色', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('164', '34', '修改角色', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('165', '35', '删除角色', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('166', '36', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('167', '37', '添加管理员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('168', '38', '修改管理员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('169', '39', '删除管理员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('170', '40', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('171', '41', '个人信息设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('185', '55', '添加配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('186', '56', '修改配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('187', '57', '删除配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('188', '58', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('189', '59', '排序设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('190', '60', '基础配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('191', '61', '系统配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('192', '62', '上传配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('193', '63', '开发配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('200', '70', '添加会员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('201', '71', '修改会员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('202', '72', '删除会员', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('203', '73', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('204', '74', '[弹窗]会员选择', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('205', '75', '添加会员等级', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('206', '76', '修改会员等级', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('207', '77', '删除会员等级', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('208', '78', '附件上传', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('209', '79', '删除附件', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('214', '84', '数据库管理', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('215', '85', '备份数据库', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('216', '86', '恢复数据库', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('217', '87', '优化数据库', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('218', '88', '删除备份', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('219', '89', '修复数据库', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('220', '90', '设置默认等级', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('221', '91', '数据库配置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('227', '97', '语言包管理', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('228', '98', '添加语言包', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('229', '99', '修改语言包', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('230', '100', '删除语言包', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('231', '101', '排序设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('232', '102', '状态设置', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('233', '103', '收藏夹图标上传', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('235', '105', '欢迎页面', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('236', '106', '布局切换', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('237', '107', '删除日志', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('238', '108', '清空日志', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('239', '109', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('240', '110', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('241', '111', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('242', '112', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('243', '113', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('244', '114', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('245', '115', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('246', '116', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('247', '117', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('248', '118', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('249', '119', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('250', '120', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('251', '121', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('252', '122', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('253', '123', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('254', '124', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('255', '125', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('256', '126', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('257', '127', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('258', '128', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('259', '129', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('260', '130', '预留占位', '1');
INSERT INTO `meng_admin_menu_lang` VALUES ('261', '132', '配置管理', '1');

-- ----------------------------
-- Table structure for meng_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `meng_admin_role`;
CREATE TABLE `meng_admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `intro` varchar(200) NOT NULL COMMENT '角色简介',
  `auth` text NOT NULL COMMENT '角色权限',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL,
  `nick` varchar(50) NOT NULL COMMENT '昵称',
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `auth` text NOT NULL COMMENT '权限',
  `iframe` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0默认，1框架',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `last_login_ip` varchar(128) NOT NULL COMMENT '最后登陆IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 管理员表';

-- ----------------------------
-- Records of meng_admin_user
-- ----------------------------

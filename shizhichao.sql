/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shizhichao

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-06 11:07:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shi-admin`
-- ----------------------------
DROP TABLE IF EXISTS `shi-admin`;
CREATE TABLE `shi-admin` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(320) NOT NULL,
  `password` varchar(320) NOT NULL,
  `last_loginip` varchar(255) NOT NULL,
  `last_logintime` varchar(255) NOT NULL,
  `times` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户名';

-- ----------------------------
-- Records of shi-admin
-- ----------------------------
INSERT INTO `shi-admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', '2017-09-04 09:53:18', '36');

-- ----------------------------
-- Table structure for `shi-ararea`
-- ----------------------------
DROP TABLE IF EXISTS `shi-ararea`;
CREATE TABLE `shi-ararea` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章区域';

-- ----------------------------
-- Records of shi-ararea
-- ----------------------------
INSERT INTO `shi-ararea` VALUES ('1', '欧美');
INSERT INTO `shi-ararea` VALUES ('2', '亚洲');
INSERT INTO `shi-ararea` VALUES ('3', '日韩');
INSERT INTO `shi-ararea` VALUES ('4', '欧洲');
INSERT INTO `shi-ararea` VALUES ('5', '拉美');

-- ----------------------------
-- Table structure for `shi-arschool`
-- ----------------------------
DROP TABLE IF EXISTS `shi-arschool`;
CREATE TABLE `shi-arschool` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Schools` varchar(255) NOT NULL COMMENT '流派',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章流派';

-- ----------------------------
-- Records of shi-arschool
-- ----------------------------
INSERT INTO `shi-arschool` VALUES ('1', '经典');
INSERT INTO `shi-arschool` VALUES ('2', '流行');
INSERT INTO `shi-arschool` VALUES ('3', '快乐');
INSERT INTO `shi-arschool` VALUES ('5', '嘻哈');

-- ----------------------------
-- Table structure for `shi-art-clickzan`
-- ----------------------------
DROP TABLE IF EXISTS `shi-art-clickzan`;
CREATE TABLE `shi-art-clickzan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-art-clickzan
-- ----------------------------
INSERT INTO `shi-art-clickzan` VALUES ('1', '27', '25');

-- ----------------------------
-- Table structure for `shi-art-collection`
-- ----------------------------
DROP TABLE IF EXISTS `shi-art-collection`;
CREATE TABLE `shi-art-collection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-art-collection
-- ----------------------------
INSERT INTO `shi-art-collection` VALUES ('1', '27', '25');

-- ----------------------------
-- Table structure for `shi-article`
-- ----------------------------
DROP TABLE IF EXISTS `shi-article`;
CREATE TABLE `shi-article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `read_num` int(11) NOT NULL COMMENT '浏览量',
  `categroy` int(11) NOT NULL DEFAULT '1' COMMENT '分类',
  `school` int(11) NOT NULL COMMENT '流派',
  `years` int(11) NOT NULL COMMENT '年代',
  `area` int(11) NOT NULL COMMENT '区域',
  `stars` int(11) NOT NULL,
  `ishot` int(11) NOT NULL,
  `jingdian` int(11) NOT NULL,
  `readerrecom` int(11) NOT NULL DEFAULT '0',
  `recompeople` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Records of shi-article
-- ----------------------------
INSERT INTO `shi-article` VALUES ('9', '贝吉塔', 'ASDZXC', 'qeqweq', '<p>ASDZXC</p>', '0000-00-00', '0', '5', '1', '1', '1', '4', '0', '0', '1', '6');
INSERT INTO `shi-article` VALUES ('10', '弗利萨', 'ASDZXC', 'qweqwe', '<p>撒旦</p>', '2017-08-21', '0', '1', '2', '4', '1', '4', '0', '0', '2', '6');
INSERT INTO `shi-article` VALUES ('11', '樱木花道', '一元二次方程', 'qweq', '<p>X<sup>2</sup>+X=0</p>', '2017-08-22', '0', '1', '1', '4', '2', '5', '0', '0', '6', '6');
INSERT INTO `shi-article` VALUES ('12', '大司马', '正方形打野', 'qweqwe', '<p>迂回敌方</p>', '2017-08-22', '0', '7', '3', '4', '2', '5', '0', '0', '22', '6');
INSERT INTO `shi-article` VALUES ('14', 'ASDZXC', '水电费', 'sadsa', '<p>ASDZXC</p>', '2017-08-22', '6', '1', '5', '3', '3', '4', '0', '0', '11', '6');
INSERT INTO `shi-article` VALUES ('15', 'ASDZXC', '啊是', '<p>阿达&nbsp; &nbsp; &nbsp;</p>', '<p>阿达</p>', '2017-08-22', '0', '1', '1', '3', '4', '5', '1', '1', '15', '6');
INSERT INTO `shi-article` VALUES ('16', '周大福', '周大福', '<p>打算&nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机计算机</p>', '2017-08-22', '7', '2', '2', '3', '3', '5', '1', '1', '23', '7');
INSERT INTO `shi-article` VALUES ('17', '小周', '小周童鞋', '<p>啊打</p>', '<p>爱爱爱爱爱爱啊1</p>', '2017-08-22', '0', '2', '1', '1', '4', '4', '1', '1', '10', '7');
INSERT INTO `shi-article` VALUES ('21', '薛之谦', '丑八怪', '<p>爱的</p>', '<p>供养</p>', '2017-08-28', '9', '2', '5', '4', '2', '5', '1', '1', '8', '7');
INSERT INTO `shi-article` VALUES ('23', '啊是', '啥都解决', '<p>阿萨德</p>', '<p>撒旦</p>', '2017-08-28', '10', '2', '5', '4', '2', '5', '1', '1', '0', '0');
INSERT INTO `shi-article` VALUES ('24', '迈克尔贝', '桃花怪大战汽车人', '<p>赛博坦</p>', '<p>威震天大人</p>', '2017-08-29', '24', '2', '3', '4', '4', '5', '1', '1', '0', '0');
INSERT INTO `shi-article` VALUES ('25', '一棵草', '桃花侠大战菊花怪', '<p>好不好</p>', '<p>不好啊</p>', '2017-08-30', '13', '2', '2', '3', '2', '5', '1', '1', '0', '0');
INSERT INTO `shi-article` VALUES ('26', '二世', '查理', '<p>真的是你啊</p>', '<p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">在上小学的时候，父母与老师就引领着我学习各种科目。列如：音乐让我感受到了美妙的声音，数学上我感受到了几何的美丽，英语使我学习到异国风情。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">步入中高年级了 ，也增加了许多科目，生物让我领悟到了大自然造物主的神奇，地理让我感受到祖国大好山河的壮观美丽，历史让我了解到了古时祖先的英勇，政治让我体会到了国家的政策以及策略。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">以上的科目虽然重要，但是我认为，一个中国人，最重要的是学好语文。语文，是我国五千年文化沉淀的结晶，它也代表着我国古代劳动人民的智慧。更是中国固特的代表。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">现在，语文已深深地进入了我们的<a href=\"https://www.duanwenxue.com/jingdian/shenghuo/\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">生活</a>，它使我们精彩的生活锦上添花，更加美丽。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">海内存知己,天涯若比邻.<a href=\"https://www.duanwenxue.com/qinggan/youqing/\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">友情</a>因诗句而被拉近;“劝君更进一杯酒,西出阳关无故人.”<a href=\"https://www.duanwenxue.com/diary/jimo/\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">寂寞</a>因诗句而得到慰藉;“桃花潭水深千尺,不及汪伦送我情.”诗句又因友情而更加甜美。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文向我展示着它独有的思想,表达着人们的感情,让我感受到了作者们所要诉说的内容，并且让我体会到了作者随心所欲的写法。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文不仅表达着热爱,里面也有表述忧愁、郁闷。东坡遭贬,壮志未现而大唱“大江东去,浪淘尺,千古风流人物。”;稼轩胡虏未灭而叹“千古江山,英雄无览仲谋处。”;陈涉苦难深重努呼“王候将相,宁有种呼!”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文的魅力，也在我们的生活中体现出来。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我问语文：“语文是什么?”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文这样回答：“乱花渐欲迷人眼,浅草才能没马蹄’的美景是语文;’春蚕到死丝方尽,蜡炬成灰泪始干’的奉献精神始语文;’衣带渐宽终不悔,为伊消得人憔悴’得执著是语文”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我问语文：“美是什么?”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文这样回答：“秋日蔚蓝的天空中悠悠飘落的黄叶是一种美;把安危置之度外收获满舱鱼虾是一种美;放弃安逸舒适而笑傲霜雪的梅菊是一种美。美无时不有,无处不在。”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我问语文：“精神是什么?”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">语文这样回答：“寄意寒星荃不察,我以我血荐轩辕’是一种精神;俯首甘为孺子牛’是一种精神;夸父追日’是一种精神;’愚公移山’也是一种精神。”</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">与语文的对话结束后,我的心还在沉思,原来世界这么美好,原来世界这么奇妙,值得我们用心去感受.因此,我想走进大自然,捡两片落叶,去体会&quot;落红不是无情物&quot;的精神;我想冲进那牛毛般的细雨中感受那浪漫无羁的情调.语文犹如七色光,丰富多彩.与语文交流,可以洗涤你心灵的尘埃,可以陶冶你的情操,可以使你的生活更加美好。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; line-height: 39.2000007629395px; text-indent: 28px; color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"line-height: 39.2000007629395px;\">我阅读语文,获得知识。让我认识到了</span><a href=\"https://www.duanwenxue.com/jingdian/ganwu/\" style=\"line-height: 39.2000007629395px; margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">人生</a><span style=\"line-height: 39.2000007629395px;\">中的友情、</span><a href=\"https://www.duanwenxue.com/qinggan/qinqing/\" style=\"line-height: 39.2000007629395px; margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">亲情</a><span style=\"line-height: 39.2000007629395px;\">;感受到了祖国江山那无限</span><a href=\"https://www.duanwenxue.com/yuju/youmei/\" style=\"line-height: 39.2000007629395px; margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; text-decoration: none;\">优美</a><span style=\"line-height: 39.2000007629395px;\">的风景;感慨报效祖国之情。我热爱语文,因为它用最真实的话语,遗留下了千古文化。</span></p><p><br/></p>', '2017-08-30', '4', '2', '2', '1', '1', '6', '1', '1', '0', '0');
INSERT INTO `shi-article` VALUES ('27', '西撒的', '小二黑', '<p>阿萨德把还是北大就爱和波士顿接收不到就是觉得阿萨德把还是北大就爱和波士顿接收不到就是觉得阿萨德把还是北大就爱和波士顿接收不到就是觉得阿萨德把还是北大就爱和波士顿接收不到就是觉得&nbsp;</p>', '<p class=\"ind2\" style=\"padding: 0px; font-family: &#39;PingFang SC Regular&#39;; line-height: 26px; color: rgb(49, 59, 81); white-space: normal; margin-top: 0px !important; margin-bottom: 14px !important; text-indent: 2em !important;\">多情的春雨淅淅沥沥地缠绵了整整一个春季，依然没有丝毫停歇的意思，随着季节的更替辗转到了夏季。绵绵的雨丝，总是占据着广阔的天空，使得这个浅夏依然在清凉凉，浅夏的天，阴雨连绵，地面；时而，大雨滂沱，豆大的雨点，铿锵有力地敲打着窗棂，... ...</p><p class=\"ind2\" style=\"padding: 0px; font-family: &#39;PingFang SC Regular&#39;; line-height: 26px; color: rgb(49, 59, 81); white-space: normal; margin-top: 0px !important; margin-bottom: 14px !important; text-indent: 2em !important;\">多情的春雨淅淅沥沥地缠绵了整整一个春季，依然没有丝毫停歇的意思，随着季节的更替辗转到了夏季。绵绵的雨丝，总是占据着广阔的天空，使得这个浅夏依然在清凉凉，浅夏的天，阴雨连绵，地面；时而，大雨滂沱，豆大的雨点，铿锵有力地敲打着窗棂，... ...</p><p class=\"ind2\" style=\"padding: 0px; font-family: &#39;PingFang SC Regular&#39;; line-height: 26px; color: rgb(49, 59, 81); white-space: normal; margin-top: 0px !important; margin-bottom: 14px !important; text-indent: 2em !important;\">多情的春雨淅淅沥沥地缠绵了整整一个春季，依然没有丝毫停歇的意思，随着季节的更替辗转到了夏季。绵绵的雨丝，总是占据着广阔的天空，使得这个浅夏依然在清凉凉，浅夏的天，阴雨连绵，地面；时而，大雨滂沱，豆大的雨点，铿锵有力地敲打着窗棂，</p><p><br/></p>', '2017-08-30', '11', '2', '1', '1', '1', '5', '1', '1', '34', '6');
INSERT INTO `shi-article` VALUES ('28', 'sad', 'ads', '<p>阿萨德</p>', '<p>撒旦</p>', '2017-09-05', '0', '18', '1', '2', '1', '3', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for `shi-aryears`
-- ----------------------------
DROP TABLE IF EXISTS `shi-aryears`;
CREATE TABLE `shi-aryears` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `years` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='年代';

-- ----------------------------
-- Records of shi-aryears
-- ----------------------------
INSERT INTO `shi-aryears` VALUES ('1', '17世纪');
INSERT INTO `shi-aryears` VALUES ('2', '18世纪');
INSERT INTO `shi-aryears` VALUES ('3', '19世纪');
INSERT INTO `shi-aryears` VALUES ('4', '20世纪');

-- ----------------------------
-- Table structure for `shi-audio`
-- ----------------------------
DROP TABLE IF EXISTS `shi-audio`;
CREATE TABLE `shi-audio` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `audio` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `authorid` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `read_num` int(11) NOT NULL DEFAULT '0',
  `stars` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='音频';

-- ----------------------------
-- Records of shi-audio
-- ----------------------------
INSERT INTO `shi-audio` VALUES ('1', '../../upload/audio/test.mp3', '加加加', '3', '2017-08-22', '0', '0');
INSERT INTO `shi-audio` VALUES ('3', '../../upload/audio/test2.mp3', '阿萨德', '3', '2017-08-23', '0', '0');
INSERT INTO `shi-audio` VALUES ('4', '../../upload/audio/test.mp3', 'haha', '2', '2017-08-25', '0', '0');
INSERT INTO `shi-audio` VALUES ('5', '../../upload/audio/test.mp3', '刘琦', '2', '2017-08-25', '0', '0');
INSERT INTO `shi-audio` VALUES ('6', '../../upload/audio/test2.mp3', '撒旦', '3', '2017-08-29', '0', '0');

-- ----------------------------
-- Table structure for `shi-audio-clickzan`
-- ----------------------------
DROP TABLE IF EXISTS `shi-audio-clickzan`;
CREATE TABLE `shi-audio-clickzan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `audioid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-audio-clickzan
-- ----------------------------

-- ----------------------------
-- Table structure for `shi-banner`
-- ----------------------------
DROP TABLE IF EXISTS `shi-banner`;
CREATE TABLE `shi-banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) NOT NULL COMMENT 'banner图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='banner图';

-- ----------------------------
-- Records of shi-banner
-- ----------------------------
INSERT INTO `shi-banner` VALUES ('1', '../../upload/banner/webp.jpg');
INSERT INTO `shi-banner` VALUES ('2', '../../upload/banner/webp1.jpg');
INSERT INTO `shi-banner` VALUES ('3', '../../upload/banner/webp2.jpg');
INSERT INTO `shi-banner` VALUES ('6', '../../upload/banner/23132.png');

-- ----------------------------
-- Table structure for `shi-comment-ar`
-- ----------------------------
DROP TABLE IF EXISTS `shi-comment-ar`;
CREATE TABLE `shi-comment-ar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `articleid` int(11) NOT NULL COMMENT '文章',
  `customer` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评论';

-- ----------------------------
-- Records of shi-comment-ar
-- ----------------------------
INSERT INTO `shi-comment-ar` VALUES ('3', 'dsdads', '16', '6', '2017-08-24');

-- ----------------------------
-- Table structure for `shi-comment-au`
-- ----------------------------
DROP TABLE IF EXISTS `shi-comment-au`;
CREATE TABLE `shi-comment-au` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `audioid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-comment-au
-- ----------------------------
INSERT INTO `shi-comment-au` VALUES ('1', 'sadsad', '1', '6', '2017-08-24');

-- ----------------------------
-- Table structure for `shi-comment-ve`
-- ----------------------------
DROP TABLE IF EXISTS `shi-comment-ve`;
CREATE TABLE `shi-comment-ve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `vedioid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-comment-ve
-- ----------------------------
INSERT INTO `shi-comment-ve` VALUES ('1', '地方斯蒂芬', '1', '6', '2017-08-24');

-- ----------------------------
-- Table structure for `shi-course`
-- ----------------------------
DROP TABLE IF EXISTS `shi-course`;
CREATE TABLE `shi-course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='课程表';

-- ----------------------------
-- Records of shi-course
-- ----------------------------
INSERT INTO `shi-course` VALUES ('1', '小学数学', '1');
INSERT INTO `shi-course` VALUES ('2', '小学语文', '1');
INSERT INTO `shi-course` VALUES ('3', '初中英语', '2');
INSERT INTO `shi-course` VALUES ('4', '初中化学', '2');
INSERT INTO `shi-course` VALUES ('5', '高中物理', '3');
INSERT INTO `shi-course` VALUES ('6', '高中生物', '3');
INSERT INTO `shi-course` VALUES ('7', '大学高数', '4');
INSERT INTO `shi-course` VALUES ('8', '大学计算机', '4');
INSERT INTO `shi-course` VALUES ('15', '焊接结构学', '4');
INSERT INTO `shi-course` VALUES ('16', '中文', '5');
INSERT INTO `shi-course` VALUES ('17', '英语', '5');
INSERT INTO `shi-course` VALUES ('18', '画画', '1');
INSERT INTO `shi-course` VALUES ('19', '几何', '1');
INSERT INTO `shi-course` VALUES ('20', '音乐', '1');
INSERT INTO `shi-course` VALUES ('21', '看图说话', '0');
INSERT INTO `shi-course` VALUES ('22', '体育', '1');
INSERT INTO `shi-course` VALUES ('23', '计算机', '1');

-- ----------------------------
-- Table structure for `shi-custmoer`
-- ----------------------------
DROP TABLE IF EXISTS `shi-custmoer`;
CREATE TABLE `shi-custmoer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `headimg` varchar(255) NOT NULL DEFAULT '../../upload/112120404833295902.png',
  `info` text,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Records of shi-custmoer
-- ----------------------------
INSERT INTO `shi-custmoer` VALUES ('6', '博士', '231231', '../../upload/headimg/14-1506291A242927.jpg', '<p>1231232</p>', '123213', 'c56d0e9a7ccec67b4ea131655038d604');
INSERT INTO `shi-custmoer` VALUES ('21', '积极', '', '../../upload/112120404833295902.png', '', '13499998888', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `shi-custmoer` VALUES ('22', '季节', '', '../../upload/112120404833295902.png', '', '13477778888', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `shi-custmoer` VALUES ('23', '123', '', '../../upload/112120404833295902.png', '', '13344445555', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `shi-custmoer` VALUES ('25', 'cs', '11', '../../upload/112120404833295902.png', null, '13758216497', '14e1b600b1fd579f47433b88e8d85291');

-- ----------------------------
-- Table structure for `shi-experience`
-- ----------------------------
DROP TABLE IF EXISTS `shi-experience`;
CREATE TABLE `shi-experience` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `headimg` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `readnum` int(11) NOT NULL DEFAULT '0',
  `stars` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='精彩心得';

-- ----------------------------
-- Records of shi-experience
-- ----------------------------
INSERT INTO `shi-experience` VALUES ('1', '2131', '<p>打击</p>', '啊是', '../../upload/experience/u=3280010440,2340064&fm=26&gp=0.jpg', '啊是', '3', '4', '2017-08-28');
INSERT INTO `shi-experience` VALUES ('3', '二位', '<p>似懂非懂是你发的时间能否对你</p>', '阿萨德撒', 'wq', '按时', '4', '4', '2017-08-28');
INSERT INTO `shi-experience` VALUES ('4', '阿萨德', '<p>啊是</p>', '啊是', '', '啊是', '4', '5', '2017-08-29');
INSERT INTO `shi-experience` VALUES ('5', '阿萨德', '<p>撒旦</p>', '撒', '../../upload/experience/14-1506291A242927.jpg', '阿萨德', '20', '5', '2017-08-29');

-- ----------------------------
-- Table structure for `shi-experience-clickzan`
-- ----------------------------
DROP TABLE IF EXISTS `shi-experience-clickzan`;
CREATE TABLE `shi-experience-clickzan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `experienceid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-experience-clickzan
-- ----------------------------

-- ----------------------------
-- Table structure for `shi-experience-collect`
-- ----------------------------
DROP TABLE IF EXISTS `shi-experience-collect`;
CREATE TABLE `shi-experience-collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `experienceid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-experience-collect
-- ----------------------------

-- ----------------------------
-- Table structure for `shi-grade`
-- ----------------------------
DROP TABLE IF EXISTS `shi-grade`;
CREATE TABLE `shi-grade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) NOT NULL COMMENT '年级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='年级';

-- ----------------------------
-- Records of shi-grade
-- ----------------------------
INSERT INTO `shi-grade` VALUES ('1', '小学');
INSERT INTO `shi-grade` VALUES ('2', '初中');
INSERT INTO `shi-grade` VALUES ('3', '高中');
INSERT INTO `shi-grade` VALUES ('4', '大学');
INSERT INTO `shi-grade` VALUES ('5', '学前');

-- ----------------------------
-- Table structure for `shi-homepage`
-- ----------------------------
DROP TABLE IF EXISTS `shi-homepage`;
CREATE TABLE `shi-homepage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `music` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-homepage
-- ----------------------------
INSERT INTO `shi-homepage` VALUES ('1', '../../upload/music/test2.mp3');

-- ----------------------------
-- Table structure for `shi-plate`
-- ----------------------------
DROP TABLE IF EXISTS `shi-plate`;
CREATE TABLE `shi-plate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `platename` varchar(255) NOT NULL COMMENT '板块名字',
  `plateinfo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='板块';

-- ----------------------------
-- Records of shi-plate
-- ----------------------------

-- ----------------------------
-- Table structure for `shi-reader`
-- ----------------------------
DROP TABLE IF EXISTS `shi-reader`;
CREATE TABLE `shi-reader` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher` varchar(255) NOT NULL,
  `headimg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='朗读者';

-- ----------------------------
-- Records of shi-reader
-- ----------------------------
INSERT INTO `shi-reader` VALUES ('2', '实打实1', '../../upload/readers/23132.png');
INSERT INTO `shi-reader` VALUES ('3', '心好累', '../../upload/readers/18505720_094740582159_2.jpg');
INSERT INTO `shi-reader` VALUES ('4', '大妹子', '../../upload/readers/u=164979922,3774932046&fm=27&gp=0 (1).jpg');

-- ----------------------------
-- Table structure for `shi-readers`
-- ----------------------------
DROP TABLE IF EXISTS `shi-readers`;
CREATE TABLE `shi-readers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teachername` varchar(255) NOT NULL,
  `headimg` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `stars` int(11) NOT NULL DEFAULT '0',
  `cate` varchar(255) NOT NULL COMMENT '分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='讲师列表';

-- ----------------------------
-- Records of shi-readers
-- ----------------------------
INSERT INTO `shi-readers` VALUES ('1', '小白', '../../upload/readers/u=2512569091,2477301902&fm=27&gp=0.jpg', '<p>傻白甜22</p>', '4', '');
INSERT INTO `shi-readers` VALUES ('2', '笑话', '../../upload/readers/14-1506291A242927.jpg', '<p>傻白甜</p>', '5', '');
INSERT INTO `shi-readers` VALUES ('3', '法师', '../../upload/readers/18505720_094740582159_2.jpg', '<p>都是</p>', '3', '');
INSERT INTO `shi-readers` VALUES ('4', '红蜘蛛', '../../upload/readers/18505720_094740582159_2.jpg', '<p>霸气</p>', '4', '');
INSERT INTO `shi-readers` VALUES ('5', '刘琦', '../../upload/readers/11.jpg', '<p>长得不错哦</p>', '5', '英语外教--名师讲堂');

-- ----------------------------
-- Table structure for `shi-subscribe-au`
-- ----------------------------
DROP TABLE IF EXISTS `shi-subscribe-au`;
CREATE TABLE `shi-subscribe-au` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `audioid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='音频订阅';

-- ----------------------------
-- Records of shi-subscribe-au
-- ----------------------------
INSERT INTO `shi-subscribe-au` VALUES ('1', '4', '6');
INSERT INTO `shi-subscribe-au` VALUES ('3', '1', '7');
INSERT INTO `shi-subscribe-au` VALUES ('4', '5', '7');

-- ----------------------------
-- Table structure for `shi-subscribe-ve`
-- ----------------------------
DROP TABLE IF EXISTS `shi-subscribe-ve`;
CREATE TABLE `shi-subscribe-ve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vedioid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='视频订阅';

-- ----------------------------
-- Records of shi-subscribe-ve
-- ----------------------------
INSERT INTO `shi-subscribe-ve` VALUES ('2', '2', '6');
INSERT INTO `shi-subscribe-ve` VALUES ('3', '3', '7');
INSERT INTO `shi-subscribe-ve` VALUES ('6', '6', '7');

-- ----------------------------
-- Table structure for `shi-subscribe-zhibo`
-- ----------------------------
DROP TABLE IF EXISTS `shi-subscribe-zhibo`;
CREATE TABLE `shi-subscribe-zhibo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-subscribe-zhibo
-- ----------------------------
INSERT INTO `shi-subscribe-zhibo` VALUES ('1', '23234', '23');
INSERT INTO `shi-subscribe-zhibo` VALUES ('3', '2342', '25');

-- ----------------------------
-- Table structure for `shi-vedio`
-- ----------------------------
DROP TABLE IF EXISTS `shi-vedio`;
CREATE TABLE `shi-vedio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vedio` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `authorid` int(255) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='视频';

-- ----------------------------
-- Records of shi-vedio
-- ----------------------------
INSERT INTO `shi-vedio` VALUES ('1', '../../upload/vedio/1.mp4', '好啊', '1', '2017-08-21');
INSERT INTO `shi-vedio` VALUES ('2', 'aasd ', '不好吧', '2', '2017-08-21');
INSERT INTO `shi-vedio` VALUES ('3', '', '塞狗粮', '2', '2017-08-22');
INSERT INTO `shi-vedio` VALUES ('5', '../../upload/vedio/2.mp4', '爱德华', '3', '2017-08-23');
INSERT INTO `shi-vedio` VALUES ('6', '../../upload/vedio/2.mp4', '啊', '1', '2017-08-23');

-- ----------------------------
-- Table structure for `shi-vedio-clickzan`
-- ----------------------------
DROP TABLE IF EXISTS `shi-vedio-clickzan`;
CREATE TABLE `shi-vedio-clickzan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vedioid` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-vedio-clickzan
-- ----------------------------
INSERT INTO `shi-vedio-clickzan` VALUES ('1', '27', '25');

-- ----------------------------
-- Table structure for `shi-vediocate`
-- ----------------------------
DROP TABLE IF EXISTS `shi-vediocate`;
CREATE TABLE `shi-vediocate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-vediocate
-- ----------------------------
INSERT INTO `shi-vediocate` VALUES ('1', '搞笑一下');
INSERT INTO `shi-vediocate` VALUES ('2', '欢乐十分');
INSERT INTO `shi-vediocate` VALUES ('3', '精彩瞬间');
INSERT INTO `shi-vediocate` VALUES ('4', '百家讲台');

-- ----------------------------
-- Table structure for `shi-zhibo`
-- ----------------------------
DROP TABLE IF EXISTS `shi-zhibo`;
CREATE TABLE `shi-zhibo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) NOT NULL,
  `roomid` varchar(255) NOT NULL,
  `publisherpass` varchar(255) NOT NULL,
  `assistantpass` varchar(255) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1开启0关闭',
  `lookurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shi-zhibo
-- ----------------------------
INSERT INTO `shi-zhibo` VALUES ('5', '../../upload/zhibo/23132.png', '01CA0B33B60B20AB9C33DC5901307461', '123', '123', '南沙街', '<p>123</p>', '1', 'https://view.csslcloud.net/api/view/lecturer?roomid=01CA0B33B60B20AB9C33DC5901307461&userid=3E817DE5CEF11904');

/*
 Navicat Premium Data Transfer

 Source Server         : Clother
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : chat

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 04/07/2018 16:00:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for REPLY
-- ----------------------------
DROP TABLE IF EXISTS `REPLY`;
CREATE TABLE `REPLY` (
  `mess_Id` int(11) DEFAULT NULL,
  `user_Id_Rp` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_vietnamese_ci,
  `time` time DEFAULT NULL,
  `reply_Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`reply_Id`) USING BTREE,
  KEY `FK_RP_USER` (`user_Id_Rp`),
  KEY `FK_RP_MESS` (`mess_Id`),
  CONSTRAINT `FK_RP_MESS` FOREIGN KEY (`mess_Id`) REFERENCES `MESS` (`MESS_ID`),
  CONSTRAINT `FK_RP_USER` FOREIGN KEY (`user_Id_Rp`) REFERENCES `USER` (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- ----------------------------
-- Records of REPLY
-- ----------------------------
BEGIN;
INSERT INTO `REPLY` VALUES (1, 1, 'chim en chao dai bang', '16:52:37', 1);
INSERT INTO `REPLY` VALUES (1, 2, 'chao lai ', '16:53:37', 2);
INSERT INTO `REPLY` VALUES (1, 2, 'abc', '16:54:37', 3);
INSERT INTO `REPLY` VALUES (1, 1, 'abc gi', '15:39:00', 4);
INSERT INTO `REPLY` VALUES (1, 2, 'hello', '12:00:00', 6);
INSERT INTO `REPLY` VALUES (2, 2, 'bello', '12:00:00', 7);
INSERT INTO `REPLY` VALUES (2, 3, 'ddddddd', '03:09:36', 10);
INSERT INTO `REPLY` VALUES (2, 2, 'gg', '03:44:28', 11);
INSERT INTO `REPLY` VALUES (2, 2, 'gg', '03:44:30', 12);
INSERT INTO `REPLY` VALUES (1, 2, 'con ga', '03:49:11', 13);
INSERT INTO `REPLY` VALUES (1, 2, 'hajzz', '03:51:07', 14);
INSERT INTO `REPLY` VALUES (1, 2, '@@', '03:51:18', 15);
INSERT INTO `REPLY` VALUES (1, 2, '@@ nua', '03:51:46', 16);
INSERT INTO `REPLY` VALUES (1, 2, '@@ nua', '03:52:39', 17);
INSERT INTO `REPLY` VALUES (1, 2, '@@ nua', '03:54:15', 18);
INSERT INTO `REPLY` VALUES (1, 2, '@@ nua', '03:55:22', 19);
INSERT INTO `REPLY` VALUES (1, 2, '@@ nua', '04:00:09', 20);
INSERT INTO `REPLY` VALUES (1, 2, 'wtf', '04:00:24', 21);
INSERT INTO `REPLY` VALUES (1, 1, 'sdfsfdsfasdf', '04:00:59', 22);
INSERT INTO `REPLY` VALUES (1, 2, '@@', '04:01:26', 23);
INSERT INTO `REPLY` VALUES (2, 2, 'ahiihihih', '04:05:06', 24);
INSERT INTO `REPLY` VALUES (1, 1, 'hajzz', '04:50:18', 25);
INSERT INTO `REPLY` VALUES (1, 1, 'haha', '06:17:49', 26);
INSERT INTO `REPLY` VALUES (1, 2, 'dm,mmmm,', '06:18:00', 27);
INSERT INTO `REPLY` VALUES (5, 5, 'abcv', '06:54:01', 28);
INSERT INTO `REPLY` VALUES (5, 5, 'hajzz', '06:55:24', 29);
INSERT INTO `REPLY` VALUES (13, 1, 'abc', '07:08:41', 30);
INSERT INTO `REPLY` VALUES (5, 1, 'fdsafsad', '07:15:45', 31);
INSERT INTO `REPLY` VALUES (15, 1, 'hahaha', '07:16:08', 32);
INSERT INTO `REPLY` VALUES (15, 1, 'gggggg', '07:16:19', 33);
INSERT INTO `REPLY` VALUES (14, 1, 'the hai', '07:16:24', 34);
INSERT INTO `REPLY` VALUES (17, 6, 'alo', '07:17:27', 35);
INSERT INTO `REPLY` VALUES (18, 6, 'kaka', '07:19:07', 36);
INSERT INTO `REPLY` VALUES (20, 5, 'dsadasfsda', '07:21:34', 37);
INSERT INTO `REPLY` VALUES (5, 1, 'ê', '07:23:28', 38);
INSERT INTO `REPLY` VALUES (5, 5, 'co gi khong ', '07:23:37', 39);
INSERT INTO `REPLY` VALUES (13, 6, 'abc abc', '07:26:03', 40);
INSERT INTO `REPLY` VALUES (23, 6, 'abc', '07:26:17', 41);
INSERT INTO `REPLY` VALUES (23, 5, 'xyz', '07:26:29', 42);
INSERT INTO `REPLY` VALUES (23, 6, 'mnq', '07:26:39', 43);
INSERT INTO `REPLY` VALUES (23, 6, 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '07:34:30', 44);
INSERT INTO `REPLY` VALUES (20, 5, 'daskldjaksdka', '03:27:07', 45);
INSERT INTO `REPLY` VALUES (20, 5, 'fdajkslfjsaklfjasdk', '03:27:19', 46);
INSERT INTO `REPLY` VALUES (20, 2, 'fl;dsakf;sakfls;fksl;fkl;as', '03:27:35', 47);
INSERT INTO `REPLY` VALUES (1, 1, 'jdsakdjals', '03:50:53', 48);
INSERT INTO `REPLY` VALUES (5, 1, 'fadjsfljadsjklf', '03:52:03', 49);
INSERT INTO `REPLY` VALUES (5, 5, 'kafuadsfasud', '03:52:38', 50);
INSERT INTO `REPLY` VALUES (5, 1, 'fklasjfklasd', '03:52:58', 51);
INSERT INTO `REPLY` VALUES (6, 5, 'gjghj', '03:59:25', 52);
COMMIT;

-- ----------------------------
-- Table structure for USER
-- ----------------------------
DROP TABLE IF EXISTS `USER`;
CREATE TABLE `USER` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Name` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_Email` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_Pass` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_Image` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `user_Id_2` (`user_Id`),
  KEY `user_Id_3` (`user_Id`),
  KEY `user_Id_4` (`user_Id`),
  KEY `user_Id_5` (`user_Id`),
  KEY `user_Id_6` (`user_Id`),
  KEY `user_Id_7` (`user_Id`),
  KEY `user_Id_8` (`user_Id`),
  KEY `user_Id_9` (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- ----------------------------
-- Records of USER
-- ----------------------------
BEGIN;
INSERT INTO `USER` VALUES (1, 'tri', 'poketho11@gmail.com', '123456', 'http://blackberryvietnam.net/attachments/bbvn-net-13-jpg.77742/');
INSERT INTO `USER` VALUES (2, 'thanh', 'poketho12@gmail.com', '123456', 'http://blackberryvietnam.net/attachments/bbvn-net-4-jpg.77741/');
INSERT INTO `USER` VALUES (3, 'abc', 'o@gmail.com', '123456', 'http://alumni.crg.eu/sites/default/files/default_images/default-picture_0_0.png');
INSERT INTO `USER` VALUES (4, 'xyz', 'p@gmail.com', '123456', 'http://alumni.crg.eu/sites/default/files/default_images/default-picture_0_0.png');
INSERT INTO `USER` VALUES (5, 'TriPro', 'poketho13@gmail.com', '123456', 'http://alumni.crg.eu/sites/default/files/default_images/default-picture_0_0.png');
INSERT INTO `USER` VALUES (6, 'TT', 'poketho14@gmail.com', '123456', 'http://alumni.crg.eu/sites/default/files/default_images/default-picture_0_0.png');
COMMIT;

-- ----------------------------
-- Table structure for mess
-- ----------------------------
DROP TABLE IF EXISTS `mess`;
CREATE TABLE `mess` (
  `mess_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Id_1` int(11) DEFAULT NULL,
  `user_Id_2` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`mess_id`),
  KEY `FK_MESS_USER_1` (`user_Id_1`),
  KEY `FK_MESS_USER_2` (`user_Id_2`),
  KEY `mess_id` (`mess_id`),
  KEY `mess_id_2` (`mess_id`),
  KEY `mess_id_3` (`mess_id`),
  KEY `mess_id_4` (`mess_id`),
  KEY `mess_id_5` (`mess_id`),
  KEY `mess_id_6` (`mess_id`),
  KEY `mess_id_7` (`mess_id`),
  KEY `mess_id_8` (`mess_id`),
  CONSTRAINT `FK_MESS_USER_1` FOREIGN KEY (`USER_ID_1`) REFERENCES `USER` (`USER_ID`),
  CONSTRAINT `FK_MESS_USER_2` FOREIGN KEY (`USER_ID_2`) REFERENCES `USER` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- ----------------------------
-- Records of mess
-- ----------------------------
BEGIN;
INSERT INTO `mess` VALUES (1, 1, 2, '06:18:00');
INSERT INTO `mess` VALUES (2, 2, 3, '04:05:06');
INSERT INTO `mess` VALUES (5, 5, 1, '06:55:24');
INSERT INTO `mess` VALUES (6, 5, 4, NULL);
INSERT INTO `mess` VALUES (13, 1, 6, '07:08:05');
INSERT INTO `mess` VALUES (14, 1, 3, '07:15:53');
INSERT INTO `mess` VALUES (15, 1, 4, '07:15:54');
INSERT INTO `mess` VALUES (17, 6, 4, '07:17:24');
INSERT INTO `mess` VALUES (18, 6, 3, '07:19:04');
INSERT INTO `mess` VALUES (20, 5, 2, '07:21:19');
INSERT INTO `mess` VALUES (23, 6, 5, '07:26:14');
COMMIT;

-- ----------------------------
-- Procedure structure for get_Last_Time_Of_Reply
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_Last_Time_Of_Reply`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_Last_Time_Of_Reply`(IN `mess_Id` INT, OUT `v_last_time` TIME, OUT `v_content` TEXT, OUT `v_last_replyid` INT)
BEGIN
	DECLARE not_found_end INT DEFAULT 0;
	DECLARE cur_last_mess CURSOR FOR SELECT REPLY.reply_Id,REPLY.time,REPLY.content from REPLY where REPLY.mess_Id=mess_Id AND REPLY.reply_Id in (SELECT max(REPLY.reply_Id) FROM REPLY WHERE REPLY.mess_Id=mess_Id);
DECLARE CONTINUE HANDLER FOR NOT FOUND SET not_found_end = 1;
OPEN cur_last_mess;
  SET not_found_end = 0;
  open_loop : LOOP 
  FETCH cur_last_mess INTO v_last_replyid,v_last_time, v_content;
      IF not_found_end THEN
        CLOSE cur_last_mess;
        LEAVE open_loop;
      END IF;  
END LOOP;
	SELECT v_last_replyid,v_last_time,v_content;
END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_rest_of_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_rest_of_user`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_rest_of_user`(IN `current_user_id` INT)
BEGIN
DECLARE not_found_mess INT DEFAULT 0;
DECLARE v_userid1 int;
DECLARE v_userid2 int;
DECLARE v_messid int;
DECLARE cur_mess CURSOR FOR SELECT mess.mess_id, mess.user_Id_1,mess.user_Id_2 FROM mess WHERE mess.user_Id_1 = current_user_id OR mess.user_Id_2 = current_user_id;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET not_found_mess = 1;
CREATE TEMPORARY TABLE temp(messId int not null,userId int);
OPEN cur_mess;
  SET not_found_mess = 0;
  mess_loop : LOOP 
  FETCH cur_mess INTO v_messid, v_userid1, v_userid2;
      IF not_found_mess THEN
        CLOSE cur_mess;
        LEAVE mess_loop;
      END IF;  
      IF v_userid1 = current_user_id THEN
      INSERT into temp(messId,userId) VALUES(v_messid,v_userid2);
     ELSE
     INSERT into temp(messId,userId) VALUES(v_messid,v_userid1);
    	END IF;
END LOOP;

	SELECT * from temp;
    drop TEMPORARY TABLE temp;
END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_last_time_mess
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_last_time_mess`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_last_time_mess`(IN `messid` INT)
BEGIN
  CALL get_Last_Time_Of_Reply(messid,@val,@val1,@val2);
  update mess set mess.time = @val WHERE mess.mess_id = messid;
END;
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

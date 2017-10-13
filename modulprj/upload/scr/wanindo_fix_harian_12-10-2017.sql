/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wanindo_demo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-13 13:11:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `absen_import`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import`;
CREATE TABLE `absen_import` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `LEBIH_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `STT_LEMBUR` bigint(6) DEFAULT '0' COMMENT '0=tidak di hitung lembur; 1=dihitung lembur; seterusnya IJIN dianggap masuk',
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `VAL_MAKAN` decimal(50,2) DEFAULT '0.00' COMMENT 'setelah jam 23 tau 11 malam',
  `VAL_POTONGAN_TELAT` decimal(50,2) DEFAULT '0.00' COMMENT 'per-45 menit 1%',
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `POT_PERSEN` decimal(10,0) DEFAULT '100',
  `CLOSING_IN_TGL1` date DEFAULT NULL COMMENT 'TANGGAL START CLOSING',
  `CLOSING_IN_TGL2` date DEFAULT NULL COMMENT 'TANGGAL END CLOSING',
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STT_UPDATE` bigint(20) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT '1' COMMENT '0=SAVE DB; 1=CLOSING; 2=PAYMENT; ',
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2172 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_import
-- ----------------------------
INSERT INTO `absen_import` VALUES ('2141', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Jumat', '2017-09-22', '08:00:00', '2017-09-23', '01:00:00', '00:00:00', null, '1', '70000.00', '1.00', '1.75', '10000.00', '0.00', '70000.00', '122500.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2142', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Jumat', '2017-09-22', '08:00:00', '2017-09-23', '07:00:00', '00:00:00', null, '1', '65000.00', '1.00', '3.25', '10000.00', '0.00', '65000.00', '211250.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2143', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Jumat', '2017-09-22', '08:15:00', '2017-09-22', '17:00:00', '00:00:07', null, '7', '65000.00', '1.00', '0.00', '0.00', '0.00', '65000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2144', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Jumat', '2017-09-22', '09:46:00', '2017-09-22', '17:00:00', '00:00:07', null, '7', '65000.00', '0.60', '0.00', '0.00', '0.40', '39000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2145', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Sabtu', '2017-09-23', '08:00:00', '2017-09-24', '02:00:00', '00:00:00', null, '1', '70000.00', '1.00', '2.00', '10000.00', '0.00', '70000.00', '140000.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2146', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Sabtu', '2017-09-23', '08:00:00', '2017-09-23', '09:00:00', '00:00:07', null, '7', '65000.00', '0.13', '0.00', '0.00', '0.00', '8125.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2147', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Sabtu', '2017-09-23', '08:16:00', '2017-09-23', '17:00:00', '00:00:07', null, '7', '65000.00', '0.90', '0.00', '0.00', '0.10', '58500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2148', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Sabtu', '2017-09-23', '10:30:00', '2017-09-23', '17:00:00', '00:00:07', null, '7', '65000.00', '0.60', '0.00', '0.00', '0.40', '39000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2149', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Minggu', '2017-09-24', '08:00:00', '2017-09-25', '03:00:00', '00:00:00', null, '1', '70000.00', '1.00', '2.25', '10000.00', '0.00', '70000.00', '157500.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2150', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Minggu', '2017-09-24', '08:00:00', '2017-09-24', '10:00:00', '00:00:07', null, '7', '65000.00', '0.25', '0.00', '0.00', '0.00', '16250.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2151', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Minggu', '2017-09-24', '08:45:00', '2017-09-24', '17:00:00', '00:00:07', null, '7', '65000.00', '0.90', '0.00', '0.00', '0.10', '58500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2152', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Minggu', '2017-09-24', '10:31:00', '2017-09-24', '17:00:00', '00:00:07', null, '7', '65000.00', '0.60', '0.00', '0.00', '0.40', '39000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2153', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Senin', '2017-09-25', '08:00:00', '2017-09-26', '04:00:00', '00:00:00', null, '1', '70000.00', '1.00', '2.50', '10000.00', '0.00', '70000.00', '175000.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2154', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Senin', '2017-09-25', '08:00:00', '2017-09-25', '11:00:00', '00:00:07', null, '7', '65000.00', '0.38', '0.00', '0.00', '0.00', '24375.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2155', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Senin', '2017-09-25', '08:46:00', '2017-09-25', '17:00:00', '00:00:07', null, '7', '65000.00', '0.80', '0.00', '0.00', '0.20', '52000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2156', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Senin', '2017-09-25', '11:15:00', '2017-09-25', '17:00:00', '00:00:07', null, '7', '65000.00', '0.50', '0.00', '0.00', '0.50', '32500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2157', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Selasa', '2017-09-26', '08:00:00', '2017-09-27', '05:00:00', '00:00:00', null, '1', '70000.00', '1.00', '2.75', '10000.00', '0.00', '70000.00', '192500.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2158', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Selasa', '2017-09-26', '08:00:00', '2017-09-26', '12:00:00', '00:00:07', null, '7', '65000.00', '0.50', '0.00', '0.00', '0.00', '32500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2159', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Selasa', '2017-09-26', '09:15:00', '2017-09-26', '17:00:00', '00:00:07', null, '7', '65000.00', '0.80', '0.00', '0.00', '0.20', '52000.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2160', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Selasa', '2017-09-26', '12:16:00', '2017-09-26', '17:00:00', '00:00:07', null, '7', '65000.00', '0.50', '0.00', '0.00', '0.50', '32500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2161', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Rabu', '2017-09-27', '08:00:00', '2017-09-28', '06:00:00', '00:00:00', null, '1', '70000.00', '1.00', '3.00', '10000.00', '0.00', '70000.00', '210000.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2162', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Rabu', '2017-09-27', '08:00:00', '2017-09-27', '13:00:00', '00:00:07', null, '7', '65000.00', '0.50', '0.00', '0.00', '0.00', '32500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2163', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Rabu', '2017-09-27', '09:16:00', '2017-09-27', '17:00:00', '00:00:07', null, '7', '65000.00', '0.70', '0.00', '0.00', '0.30', '45500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2164', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Rabu', '2017-09-27', '13:00:00', '2017-09-27', '17:00:00', '00:00:07', null, '7', '65000.00', '0.50', '0.00', '0.00', '0.50', '32500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2165', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Kamis', '2017-09-28', '08:00:00', '2017-09-29', '07:00:00', '00:00:00', null, '1', '70000.00', '1.00', '3.25', '10000.00', '0.00', '70000.00', '227500.00', '100', null, null, null, null, null, '2017-10-13 02:26:28', '1', '2', null);
INSERT INTO `absen_import` VALUES ('2166', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Kamis', '2017-09-28', '08:00:00', '2017-09-28', '14:00:00', '00:00:07', null, '7', '65000.00', '0.63', '0.00', '0.00', '0.00', '40625.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2167', '3454653270019', '5634', 'Semanan-Plan1', '3.0915.0003', 'AIRIL USMAN', '2', 'MESIN', 'Kamis', '2017-09-28', '09:45:00', '2017-09-28', '17:00:00', '00:00:07', null, '7', '65000.00', '0.70', '0.00', '0.00', '0.30', '45500.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:06:23', '1', '1', null);
INSERT INTO `absen_import` VALUES ('2168', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Kamis', '2017-09-28', '13:01:00', '2017-09-28', '17:00:00', '00:00:07', null, '7', '65000.00', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', '100', null, null, null, null, null, '2017-10-13 02:26:59', '1', '2', null);

-- ----------------------------
-- Table structure for `absen_importx`
-- ----------------------------
DROP TABLE IF EXISTS `absen_importx`;
CREATE TABLE `absen_importx` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `STT_LEMBUR` smallint(6) DEFAULT '0' COMMENT '0=tidak di hitung lembur; 1=dihitung lembur',
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `VAL_MAKAN` decimal(50,2) DEFAULT '0.00' COMMENT 'setelah jam 23 tau 11 malam',
  `VAL_POTONGAN_TELAT` decimal(50,2) DEFAULT '0.00' COMMENT 'per-45 menit 1%',
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `CLOSING_IN_TGL1` date DEFAULT NULL COMMENT 'TANGGAL START CLOSING',
  `CLOSING_IN_TGL2` date DEFAULT NULL COMMENT 'TANGGAL END CLOSING',
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` smallint(6) DEFAULT '1' COMMENT '0=SAVE DB; 1=CLOSING; 2=PAYMENT; ',
  `STATUS_CHECK` bigint(20) DEFAULT NULL,
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1132 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_importx
-- ----------------------------
INSERT INTO `absen_importx` VALUES ('1029', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Kamis', '2017-07-20', '12:00:01', '2017-07-20', '23:00:00', null, '1', '60000.00', null, '1.25', '10000.00', '0.50', null, '75000.00', null, null, null, null, null, '2017-09-24 10:50:54', '1', null, null);
INSERT INTO `absen_importx` VALUES ('1030', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '17:06:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1031', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '17:05:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1032', '3454653270019', '5302', 'Semanan-Plan1', '3.0915.0005', ' SOPIAN', '3', 'UMUM', 'Kamis', '2017-07-20', '07:58:00', '2017-07-20', '17:20:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1033', '3454653270019', '5504', 'Semanan-Plan1', '3.0915.0006', ' SAHRUDIN', '3', 'UMUM', 'Kamis', '2017-07-20', '08:00:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1034', '3454653270019', '5505', 'Semanan-Plan1', '3.0915.0007', ' SAMAN', '3', 'UMUM', 'Kamis', '2017-07-20', '07:33:00', '2017-07-20', '17:20:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1035', '3454653270019', '2023', 'Semanan-Plan1', '3.0915.0008', ' ANDA', '4', 'DRIVER', 'Kamis', '2017-07-20', '07:54:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1036', '3454653270019', '2028', 'Semanan-Plan1', '3.0915.0009', 'NURDIN', '4', 'DRIVER', 'Kamis', '2017-07-20', '07:12:00', '2017-07-20', '22:19:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1037', '3454653270019', '2030', 'Semanan-Plan1', '3.0915.0010', 'JARIMAN', '4', 'DRIVER', 'Kamis', '2017-07-20', '08:08:00', '2017-07-20', '19:02:00', null, '0', '0.00', '1.00', '0.25', null, '0.00', '60000.00', '15000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1038', '3454653270019', '2031', 'Semanan-Plan1', '3.0915.0011', 'DEDI MUHTADI', '4', 'DRIVER', 'Kamis', '2017-07-20', '08:04:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1039', '3454653270019', '2033', 'Semanan-Plan1', '3.0915.0013', 'IKHWANUDIN', '4', 'DRIVER', 'Kamis', '2017-07-20', '08:03:00', '2017-07-20', '23:27:00', null, '0', '0.00', '1.00', '1.25', null, '0.00', '60000.00', '75000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1040', '3454653270019', '2034', 'Semanan-Plan1', '3.0915.0014', 'SUDAR', '4', 'DRIVER', 'Kamis', '2017-07-20', '06:55:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1041', '3454653270019', '2035', 'Semanan-Plan1', '3.0915.0015', 'SARDI', '4', 'DRIVER', 'Kamis', '2017-07-20', '07:42:00', '2017-07-20', '16:59:00', null, '0', '0.00', '0.88', '0.00', null, '0.00', '52500.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1042', '3454653270019', '5604', 'Semanan-Plan1', '3.0915.0016', ' ENDAN SUWANDI', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:48:00', '2017-07-20', '17:05:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1043', '3454653270019', '5059', 'Semanan-Plan1', '3.0915.0017', 'MIRZA SUBUR', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1044', '3454653270019', '5503', 'Semanan-Plan1', '3.0915.0018', ' MAJENI', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:30:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1045', '3454653270019', '5506', 'Semanan-Plan1', '3.0915.0019', ' DEDE KARMA', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1046', '3454653270019', '5509', 'Semanan-Plan1', '3.0915.0020', 'YANDI', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:41:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1047', '3454653270019', '5684', 'Semanan-Plan1', '3.0915.0021', 'ARI', '5', 'LOGISTIK', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1048', '3454653270019', '5107', 'Semanan-Plan1', '3.0915.0023', ' HASAN BASRI', '6', 'PLKP', 'Kamis', '2017-07-20', '07:25:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1049', '3454653270019', '5114', 'Semanan-Plan1', '3.0915.0024', ' UMET', '6', 'PLKP', 'Kamis', '2017-07-20', '06:42:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1050', '3454653270019', '5115', 'Semanan-Plan1', '3.0915.0025', ' SOFIUDIN', '6', 'PLKP', 'Kamis', '2017-07-20', '07:31:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1051', '3454653270019', '5118', 'Semanan-Plan1', '3.0915.0026', ' SEPTIAN', '6', 'PLKP', 'Kamis', '2017-07-20', '07:51:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1052', '3454653270019', '5701', 'Semanan-Plan1', '3.0915.0027', ' UBAIDILAH', '6', 'PLKP', 'Kamis', '2017-07-20', '06:54:00', '2017-07-20', '17:01:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1053', '3454653270019', '5601', 'Semanan-Plan1', '3.0915.0028', ' HASANUDIN', '7', 'KARPET', 'Kamis', '2017-07-20', '06:38:00', '2017-07-20', '17:18:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1054', '3454653270019', '5603', 'Semanan-Plan1', '3.0915.0029', ' ABDUL KHOLIK', '7', 'KARPET', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '17:06:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1055', '3454653270019', '1259', 'Semanan-Plan1', '3.0915.0030', ' SETIA PRATAMA', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:05:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1056', '3454653270019', '4036', 'Semanan-Plan1', '3.0915.0031', ' JULI SURYONO', '8', 'LISTRIK', 'Kamis', '2017-07-20', '07:38:00', '2017-07-20', '17:05:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1057', '3454653270019', '4037', 'Semanan-Plan1', '3.0915.0032', ' REKI', '8', 'LISTRIK', 'Kamis', '2017-07-20', '07:29:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1058', '3454653270019', '4046', 'Semanan-Plan1', '3.0915.0034', ' IWAN SETIAWAN', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:08:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1059', '3454653270019', '5741', 'Semanan-Plan1', '3.0915.0035', 'ANDI IRAWAN', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:05:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1060', '3454653270019', '5747', 'Semanan-Plan1', '3.0915.0036', 'MUHAMAD ENUR', '8', 'LISTRIK', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1061', '3454653270019', '5765', 'Semanan-Plan1', '3.0915.0037', 'SYAHRONI', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:05:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1062', '3454653270019', '5766', 'Semanan-Plan1', '3.0915.0038', 'WAWAN', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:08:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1063', '3454653270019', '5767', 'Semanan-Plan1', '3.0915.0039', 'AGUNG', '8', 'LISTRIK', 'Kamis', '2017-07-20', '08:04:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1064', '3454653270019', '5769', 'Semanan-Plan1', '3.0915.0040', 'AHMAD FATIKHIN', '8', 'LISTRIK', 'Kamis', '2017-07-20', '07:44:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1065', '3454653270019', '3012', 'Semanan-Plan1', '3.0915.0041', ' MUHAMAD SUGIAR', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:13:00', '2017-07-20', '17:07:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1066', '3454653270019', '3015', 'Semanan-Plan1', '3.0915.0042', ' SUHAMAN', '9', 'GRAFIS', 'Kamis', '2017-07-20', '08:04:00', '2017-07-20', '17:11:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1067', '3454653270019', '3025', 'Semanan-Plan1', '3.0915.0043', ' A.ABDUL', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:53:00', '2017-07-20', '17:01:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1068', '3454653270019', '3026', 'Semanan-Plan1', '3.0915.0044', ' RISKI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1069', '3454653270019', '3029', 'Semanan-Plan1', '3.0915.0045', ' BEKI BASUKI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:53:00', '2017-07-20', '22:20:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1070', '3454653270019', '3030', 'Semanan-Plan1', '3.0915.0046', ' DEDI  SUPRIYADI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:58:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1071', '3454653270019', '3032', 'Semanan-Plan1', '3.0915.0048', ' SAEFUL AMRI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:52:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1072', '3454653270019', '3033', 'Semanan-Plan1', '3.0915.0049', ' DEDI ISKANDAR', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:08:00', '2017-07-20', '17:05:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1073', '3454653270019', '3038', 'Semanan-Plan1', '3.0915.0050', ' JUNED', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:44:00', '2017-07-20', '17:06:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1074', '3454653270019', '4057', 'Semanan-Plan1', '3.0915.0051', 'MAD ALI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:41:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1075', '3454653270019', '4058', 'Semanan-Plan1', '3.0915.0052', 'ATMA', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:52:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1076', '3454653270019', '5770', 'Semanan-Plan1', '3.0915.0055', 'AGUS FAUZI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:53:00', '2017-07-20', '17:00:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1077', '3454653270019', '5772', 'Semanan-Plan1', '3.0915.0056', 'SYAIFUL', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:44:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1078', '3454653270019', '5774', 'Semanan-Plan1', '3.0915.0057', 'MULYADI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '12:46:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1079', '3454653270019', '5787', 'Semanan-Plan1', '3.0915.0060', 'ANGGA', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1080', '3454653270019', '5788', 'Semanan-Plan1', '3.0915.0061', 'RAUL', '9', 'GRAFIS', 'Kamis', '2017-07-20', '08:07:00', '2017-07-20', '22:11:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1081', '3454653270019', '5789', 'Semanan-Plan1', '3.0915.0062', ' HASAN', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:24:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1082', '3454653270019', '5790', 'Semanan-Plan1', '3.0915.0063', 'ANWAR FERDYANSYAH', '9', 'GRAFIS', 'Kamis', '2017-07-20', '08:00:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1083', '3454653270019', '5791', 'Semanan-Plan1', '3.0915.0064', 'HENDRIYANSAH', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '17:01:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1084', '3454653270019', '5792', 'Semanan-Plan1', '3.0915.0065', 'ROSMANI', '9', 'GRAFIS', 'Kamis', '2017-07-20', '07:24:00', '2017-07-20', '17:03:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1085', '3454653270019', '7038', 'Semanan-Plan1', '3.0915.0066', ' MULYONO', '10', 'KAYU', 'Kamis', '2017-07-20', '07:42:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1086', '3454653270019', '7046', 'Semanan-Plan1', '3.0915.0069', ' TEGUH  EFRIYANTO', '10', 'KAYU', 'Kamis', '2017-07-20', '12:50:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1087', '3454653270019', '7049', 'Semanan-Plan1', '3.0915.0070', ' SAHRUL ANWAR', '10', 'KAYU', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1088', '3454653270019', '8000', 'Semanan-Plan1', '3.0915.0071', 'NURKHOLIS', '10', 'KAYU', 'Kamis', '2017-07-20', '08:03:00', '2017-07-20', '20:14:00', null, '0', '0.00', '1.00', '0.50', null, '0.00', '60000.00', '30000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1089', '3454653270019', '1253', 'Semanan-Plan1', '3.0915.0072', ' FADULAH', '10', 'KAYU', 'Kamis', '2017-07-20', '08:14:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1090', '3454653270019', '1263', 'Semanan-Plan1', '3.0915.0073', 'APUNG', '10', 'KAYU', 'Kamis', '2017-07-20', '07:44:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1091', '3454653270019', '5303', 'Semanan-Plan1', '3.0915.0074', ' DERI DWI SAPUTRA', '10', 'KAYU', 'Kamis', '2017-07-20', '07:44:00', '2017-07-20', '22:23:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1092', '3454653270019', '9018', 'Semanan-Plan1', '3.0915.0076', ' HENDRA HERDIANSYAH', '10', 'KAYU', 'Kamis', '2017-07-20', '07:56:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1093', '3454653270019', '9025', 'Semanan-Plan1', '3.0915.0077', 'NURALAMIN', '10', 'KAYU', 'Kamis', '2017-07-20', '07:59:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1094', '3454653270019', '9035', 'Semanan-Plan1', '3.0915.0080', 'Aziz', '10', 'KAYU', 'Kamis', '2017-07-20', '07:59:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1095', '3454653270019', '9036', 'Semanan-Plan1', '3.0915.0081', ' NASIHIN', '10', 'KAYU', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1096', '3454653270019', '9037', 'Semanan-Plan1', '3.0915.0082', 'GUNAWAN', '10', 'KAYU', 'Kamis', '2017-07-20', '07:42:00', '2017-07-20', '21:59:00', null, '0', '0.00', '1.00', '0.75', null, '0.00', '60000.00', '45000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1097', '3454653270019', '9038', 'Semanan-Plan1', '3.0915.0083', 'DENY', '10', 'KAYU', 'Kamis', '2017-07-20', '08:04:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1098', '3454653270019', '9044', 'Semanan-Plan1', '3.0915.0088', 'MARPENDI', '10', 'KAYU', 'Kamis', '2017-07-20', '07:43:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1099', '3454653270019', '9047', 'Semanan-Plan1', '3.0915.0090', ' RIKY', '11', 'CAT', 'Kamis', '2017-07-20', '07:40:00', '2017-07-20', '17:02:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1100', '3454653270019', '9048', 'Semanan-Plan1', '3.0915.0091', ' NURUL', '11', 'CAT', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1101', '3454653270019', '9049', 'Semanan-Plan1', '3.0915.0092', 'AMIR MA\'RIP', '11', 'CAT', 'Kamis', '2017-07-20', '07:54:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1102', '3454653270019', '9050', 'Semanan-Plan1', '3.0915.0093', 'CUCU', '11', 'CAT', 'Kamis', '2017-07-20', '07:54:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1103', '3454653270019', '90', 'Semanan-Plan1', '3.0915.0094', 'AJAHRUDIN', '11', 'CAT', 'Kamis', '2017-07-20', '07:30:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1104', '3454653270019', '9052', 'Semanan-Plan1', '3.0915.0095', 'AJO', '11', 'CAT', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1105', '3454653270019', '1063', 'Semanan-Plan1', '3.0915.0096', 'SOLEH', '11', 'CAT', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1106', '3454653270019', '5668', 'Semanan-Plan1', '3.0915.0097', ' EKO ISMANTO', '11', 'CAT', 'Kamis', '2017-07-20', '07:49:00', '2017-07-20', '22:04:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1107', '3454653270019', '8006', 'Semanan-Plan1', '3.0915.0098', ' IMAM', '11', 'CAT', 'Kamis', '2017-07-20', '07:59:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1108', '3454653270019', '8016', 'Semanan-Plan1', '3.0915.0099', ' SENO SASONGKO', '11', 'CAT', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1109', '3454653270019', '8032', 'Semanan-Plan1', '3.0915.0100', ' SETIYO', '11', 'CAT', 'Kamis', '2017-07-20', '07:41:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1110', '3454653270019', '8033', 'Semanan-Plan1', '3.0915.0101', ' BUDI NURYANTO', '11', 'CAT', 'Kamis', '2017-07-20', '07:42:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1111', '3454653270019', '8034', 'Semanan-Plan1', '3.0915.0102', ' USMANUDIN', '11', 'CAT', 'Kamis', '2017-07-20', '07:58:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1112', '3454653270019', '8041', 'Semanan-Plan1', '3.0915.0103', ' ANGKI WIJAYA', '11', 'CAT', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1113', '3454653270019', '8046', 'Semanan-Plan1', '3.0915.0104', ' RERE SADEWA', '11', 'CAT', 'Kamis', '2017-07-20', '07:36:00', '2017-07-20', '21:59:00', null, '0', '0.00', '1.00', '0.75', null, '0.00', '60000.00', '45000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1114', '3454653270019', '8052', 'Semanan-Plan1', '3.0915.0105', ' SUGENG ', '11', 'CAT', 'Kamis', '2017-07-20', '07:43:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1115', '3454653270019', '8059', 'Semanan-Plan1', '3.0915.0107', 'LUTFI', '11', 'CAT', 'Kamis', '2017-07-20', '07:52:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1116', '3454653270019', '8060', 'Semanan-Plan1', '3.0915.0108', ' SUBIYANTONO', '11', 'CAT', 'Kamis', '2017-07-20', '07:58:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1117', '3454653270019', '8063', 'Semanan-Plan1', '3.0915.0109', 'GINUNG', '11', 'CAT', 'Kamis', '2017-07-20', '07:43:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1118', '3454653270019', '8670', 'Semanan-Plan1', '3.0915.0110', 'BASIRUN', '11', 'CAT', 'Kamis', '2017-07-20', '07:58:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1119', '3454653270019', '8071', 'Semanan-Plan1', '3.0915.0112', 'ARIANTO', '11', 'CAT', 'Kamis', '2017-07-20', '07:59:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1120', '3454653270019', '8074', 'Semanan-Plan1', '3.0915.0113', 'ADE HENDRIK', '11', 'CAT', 'Kamis', '2017-07-20', '07:57:00', '2017-07-20', '17:04:00', null, '0', '0.00', '1.00', '0.00', null, '0.00', '60000.00', '0.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1121', '3454653270019', '8076', 'Semanan-Plan1', '3.0915.0114', 'IKHSAN', '11', 'CAT', 'Kamis', '2017-07-20', '06:39:00', '2017-07-20', '22:02:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1122', '3454653270019', '8079', 'Semanan-Plan1', '3.0915.0116', 'AHMAT ZAKIRMAN', '11', 'CAT', 'Kamis', '2017-07-20', '07:48:00', '2017-07-20', '21:59:00', null, '0', '0.00', '1.00', '0.75', null, '0.00', '60000.00', '45000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1123', '3454653270019', '8080', 'Semanan-Plan1', '3.0915.0117', 'FUAT', '11', 'CAT', 'Kamis', '2017-07-20', '07:55:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1124', '3454653270019', '8081', 'Semanan-Plan1', '3.0915.0118', 'TRI HARIANTO', '11', 'CAT', 'Kamis', '2017-07-20', '07:45:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1125', '3454653270019', '8082', 'Semanan-Plan1', '3.0915.0119', 'DIDIK', '11', 'CAT', 'Kamis', '2017-07-20', '07:38:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1126', '3454653270019', '8083', 'Semanan-Plan1', '3.0915.0120', 'EKO P', '11', 'CAT', 'Kamis', '2017-07-20', '07:50:00', '2017-07-20', '22:16:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1127', '3454653270019', '8084', 'Semanan-Plan1', '3.0915.0121', 'AGUNG', '11', 'CAT', 'Kamis', '2017-07-20', '07:51:00', '2017-07-20', '22:03:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1128', '3454653270019', '8085', 'Semanan-Plan1', '3.0915.0122', 'MUKTI', '11', 'CAT', 'Kamis', '2017-07-20', '07:51:00', '2017-07-20', '22:04:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1129', '3454653270019', '8283', 'Semanan-Plan1', '3.0915.0123', 'FRENDY', '11', 'CAT', 'Kamis', '2017-07-20', '07:51:00', '2017-07-20', '22:00:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1130', '3454653270019', '8285', 'Semanan-Plan1', '3.0915.0125', 'EKO PRASETYO', '11', 'CAT', 'Kamis', '2017-07-20', '07:51:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);
INSERT INTO `absen_importx` VALUES ('1131', '3454653270019', '8286', 'Semanan-Plan1', '3.0915.0126', 'PRIYANTO', '11', 'CAT', 'Kamis', '2017-07-20', '07:54:00', '2017-07-20', '22:01:00', null, '0', '0.00', '1.00', '1.00', null, '0.00', '60000.00', '60000.00', null, null, null, null, null, null, '1', null, null);

-- ----------------------------
-- Table structure for `absen_import_copy`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import_copy`;
CREATE TABLE `absen_import_copy` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `STT_LEMBUR` smallint(6) DEFAULT '0' COMMENT '0=tidak di hitung lembur; 1=dihitung lembur',
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `VAL_MAKAN` decimal(50,2) DEFAULT '0.00' COMMENT 'setelah jam 23 tau 11 malam',
  `VAL_POTONGAN_TELAT` decimal(50,2) DEFAULT '0.00' COMMENT 'per-45 menit 1%',
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `CLOSING_IN_TGL1` date DEFAULT NULL COMMENT 'TANGGAL START CLOSING',
  `CLOSING_IN_TGL2` date DEFAULT NULL COMMENT 'TANGGAL END CLOSING',
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STT_UPDATE` bigint(20) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT '1' COMMENT '0=SAVE DB; 1=CLOSING; 2=PAYMENT; ',
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=113113 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_import_copy
-- ----------------------------
INSERT INTO `absen_import_copy` VALUES ('102912', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Jumat', '2017-07-14', '12:00:01', '2017-07-14', '23:00:00', null, '1', '70000.00', '0.50', '1.25', '10000.00', '0.50', '35000.00', '87500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103012', '3454653270019', '5633', 'Semanan-Plan1', '3.0915.0002', 'BENO ADITYA', '2', 'MESIN', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '17:06:00', null, '0', '65000.00', '1.00', '0.00', '10000.00', '0.00', '65000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103112', '3454653270019', '5636', 'Semanan-Plan1', '3.0915.0004', 'DEDE ANDRI', '2', 'MESIN', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '17:05:00', null, '0', '65000.00', '1.00', '0.00', '10000.00', '0.00', '65000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103212', '3454653270019', '5302', 'Semanan-Plan1', '3.0915.0005', ' SOPIAN', '3', 'UMUM', 'Jumat', '2017-07-14', '07:58:00', '2017-07-14', '17:20:00', null, '0', '80000.00', '1.00', '0.00', '10000.00', '0.00', '80000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103312', '3454653270019', '5504', 'Semanan-Plan1', '3.0915.0006', ' SAHRUDIN', '3', 'UMUM', 'Jumat', '2017-07-14', '08:00:00', '2017-07-14', '17:02:00', null, '0', '76500.00', '1.00', '0.00', '10000.00', '0.00', '76500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103412', '3454653270019', '5505', 'Semanan-Plan1', '3.0915.0007', ' SAMAN', '3', 'UMUM', 'Jumat', '2017-07-14', '07:33:00', '2017-07-14', '17:20:00', null, '0', '78000.00', '1.00', '0.00', '10000.00', '0.00', '78000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103512', '3454653270019', '2023', 'Semanan-Plan1', '3.0915.0008', ' ANDA', '4', 'DRIVER', 'Jumat', '2017-07-14', '07:54:00', '2017-07-14', '22:02:00', null, '0', '90000.00', '1.00', '1.00', '10000.00', '0.00', '90000.00', '90000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103612', '3454653270019', '2028', 'Semanan-Plan1', '3.0915.0009', 'NURDIN', '4', 'DRIVER', 'Jumat', '2017-07-14', '07:12:00', '2017-07-14', '22:19:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103712', '3454653270019', '2030', 'Semanan-Plan1', '3.0915.0010', 'JARIMAN', '4', 'DRIVER', 'Jumat', '2017-07-14', '08:08:00', '2017-07-14', '19:02:00', null, '0', '70000.00', '1.00', '0.25', '10000.00', '0.00', '70000.00', '17500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103812', '3454653270019', '2031', 'Semanan-Plan1', '3.0915.0011', 'DEDI MUHTADI', '4', 'DRIVER', 'Jumat', '2017-07-14', '08:04:00', '2017-07-14', '17:04:00', null, '0', '70000.00', '1.00', '0.00', '10000.00', '0.00', '70000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('103912', '3454653270019', '2033', 'Semanan-Plan1', '3.0915.0013', 'IKHWANUDIN', '4', 'DRIVER', 'Jumat', '2017-07-14', '08:03:00', '2017-07-14', '23:27:00', null, '0', '65000.00', '1.00', '1.25', '10000.00', '0.00', '65000.00', '81250.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104012', '3454653270019', '2034', 'Semanan-Plan1', '3.0915.0014', 'SUDAR', '4', 'DRIVER', 'Jumat', '2017-07-14', '06:55:00', '2017-07-14', '22:00:00', null, '0', '100000.00', '1.00', '1.00', '10000.00', '0.00', '100000.00', '100000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104112', '3454653270019', '2035', 'Semanan-Plan1', '3.0915.0015', 'SARDI', '4', 'DRIVER', 'Jumat', '2017-07-14', '07:42:00', '2017-07-14', '16:59:00', null, '0', '65000.00', '0.88', '0.00', '10000.00', '0.00', '56875.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104212', '3454653270019', '5604', 'Semanan-Plan1', '3.0915.0016', ' ENDAN SUWANDI', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:48:00', '2017-07-14', '17:05:00', null, '0', '75000.00', '1.00', '0.00', '10000.00', '0.00', '75000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104312', '3454653270019', '5059', 'Semanan-Plan1', '3.0915.0017', 'MIRZA SUBUR', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '17:04:00', null, '0', '65000.00', '1.00', '0.00', '10000.00', '0.00', '65000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104412', '3454653270019', '5503', 'Semanan-Plan1', '3.0915.0018', ' MAJENI', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:30:00', '2017-07-14', '17:00:00', null, '0', '85000.00', '1.00', '0.00', '10000.00', '0.00', '85000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104512', '3454653270019', '5506', 'Semanan-Plan1', '3.0915.0019', ' DEDE KARMA', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '17:02:00', null, '0', '71500.00', '1.00', '0.00', '10000.00', '0.00', '71500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104612', '3454653270019', '5509', 'Semanan-Plan1', '3.0915.0020', 'YANDI', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:41:00', '2017-07-14', '17:02:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104712', '3454653270019', '5684', 'Semanan-Plan1', '3.0915.0021', 'ARI', '5', 'LOGISTIK', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '17:02:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104812', '3454653270019', '5107', 'Semanan-Plan1', '3.0915.0023', ' HASAN BASRI', '6', 'PLKP', 'Jumat', '2017-07-14', '07:25:00', '2017-07-14', '17:03:00', null, '0', '74000.00', '1.00', '0.00', '10000.00', '0.00', '74000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('104912', '3454653270019', '5114', 'Semanan-Plan1', '3.0915.0024', ' UMET', '6', 'PLKP', 'Jumat', '2017-07-14', '06:42:00', '2017-07-14', '17:02:00', null, '0', '70000.00', '1.00', '0.00', '10000.00', '0.00', '70000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105012', '3454653270019', '5115', 'Semanan-Plan1', '3.0915.0025', ' SOFIUDIN', '6', 'PLKP', 'Jumat', '2017-07-14', '07:31:00', '2017-07-14', '17:00:00', null, '0', '68000.00', '1.00', '0.00', '10000.00', '0.00', '68000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105112', '3454653270019', '5118', 'Semanan-Plan1', '3.0915.0026', ' SEPTIAN', '6', 'PLKP', 'Jumat', '2017-07-14', '07:51:00', '2017-07-14', '17:03:00', null, '0', '80000.00', '1.00', '0.00', '10000.00', '0.00', '80000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105212', '3454653270019', '5701', 'Semanan-Plan1', '3.0915.0027', ' UBAIDILAH', '6', 'PLKP', 'Jumat', '2017-07-14', '06:54:00', '2017-07-14', '17:01:00', null, '0', '68000.00', '1.00', '0.00', '10000.00', '0.00', '68000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105312', '3454653270019', '5601', 'Semanan-Plan1', '3.0915.0028', ' HASANUDIN', '7', 'KARPET', 'Jumat', '2017-07-14', '06:38:00', '2017-07-14', '17:18:00', null, '0', '85000.00', '1.00', '0.00', '10000.00', '0.00', '85000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105412', '3454653270019', '5603', 'Semanan-Plan1', '3.0915.0029', ' ABDUL KHOLIK', '7', 'KARPET', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '17:06:00', null, '0', '82500.00', '1.00', '0.00', '10000.00', '0.00', '82500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105512', '3454653270019', '1259', 'Semanan-Plan1', '3.0915.0030', ' SETIA PRATAMA', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:05:00', '2017-07-14', '17:03:00', null, '0', '80000.00', '1.00', '0.00', '10000.00', '0.00', '80000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105612', '3454653270019', '4036', 'Semanan-Plan1', '3.0915.0031', ' JULI SURYONO', '8', 'LISTRIK', 'Jumat', '2017-07-14', '07:38:00', '2017-07-14', '17:05:00', null, '0', '80000.00', '1.00', '0.00', '10000.00', '0.00', '80000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105712', '3454653270019', '4037', 'Semanan-Plan1', '3.0915.0032', ' REKI', '8', 'LISTRIK', 'Jumat', '2017-07-14', '07:29:00', '2017-07-14', '17:03:00', null, '0', '90000.00', '1.00', '0.00', '10000.00', '0.00', '90000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105812', '3454653270019', '4046', 'Semanan-Plan1', '3.0915.0034', ' IWAN SETIAWAN', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:08:00', '2017-07-14', '17:04:00', null, '0', '87000.00', '1.00', '0.00', '10000.00', '0.00', '87000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('105912', '3454653270019', '5741', 'Semanan-Plan1', '3.0915.0035', 'ANDI IRAWAN', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:05:00', '2017-07-14', '17:04:00', null, '0', '68000.00', '1.00', '0.00', '10000.00', '0.00', '68000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106012', '3454653270019', '5747', 'Semanan-Plan1', '3.0915.0036', 'MUHAMAD ENUR', '8', 'LISTRIK', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '17:03:00', null, '0', '68000.00', '1.00', '0.00', '10000.00', '0.00', '68000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106112', '3454653270019', '5765', 'Semanan-Plan1', '3.0915.0037', 'SYAHRONI', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:05:00', '2017-07-14', '17:03:00', null, '0', '65000.00', '1.00', '0.00', '10000.00', '0.00', '65000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106212', '3454653270019', '5766', 'Semanan-Plan1', '3.0915.0038', 'WAWAN', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:08:00', '2017-07-14', '17:03:00', null, '0', '0.00', '1.00', '0.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106312', '3454653270019', '5767', 'Semanan-Plan1', '3.0915.0039', 'AGUNG', '8', 'LISTRIK', 'Jumat', '2017-07-14', '08:04:00', '2017-07-14', '17:03:00', null, '0', '65000.00', '1.00', '0.00', '10000.00', '0.00', '65000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106412', '3454653270019', '5769', 'Semanan-Plan1', '3.0915.0040', 'AHMAD FATIKHIN', '8', 'LISTRIK', 'Jumat', '2017-07-14', '07:44:00', '2017-07-14', '17:04:00', null, '0', '80000.00', '1.00', '0.00', '10000.00', '0.00', '80000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106512', '3454653270019', '3012', 'Semanan-Plan1', '3.0915.0041', ' MUHAMAD SUGIAR', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:13:00', '2017-07-14', '17:07:00', null, '0', '98000.00', '1.00', '0.00', '10000.00', '0.00', '98000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106612', '3454653270019', '3015', 'Semanan-Plan1', '3.0915.0042', ' SUHAMAN', '9', 'GRAFIS', 'Jumat', '2017-07-14', '08:04:00', '2017-07-14', '17:11:00', null, '0', '95000.00', '1.00', '0.00', '10000.00', '0.00', '95000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106712', '3454653270019', '3025', 'Semanan-Plan1', '3.0915.0043', ' A.ABDUL', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:53:00', '2017-07-14', '17:01:00', null, '0', '81500.00', '1.00', '0.00', '10000.00', '0.00', '81500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106812', '3454653270019', '3026', 'Semanan-Plan1', '3.0915.0044', ' RISKI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '17:00:00', null, '0', '90000.00', '1.00', '0.00', '10000.00', '0.00', '90000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('106912', '3454653270019', '3029', 'Semanan-Plan1', '3.0915.0045', ' BEKI BASUKI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:53:00', '2017-07-14', '22:20:00', null, '0', '88500.00', '1.00', '1.00', '10000.00', '0.00', '88500.00', '88500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107012', '3454653270019', '3030', 'Semanan-Plan1', '3.0915.0046', ' DEDI  SUPRIYADI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:58:00', '2017-07-14', '22:16:00', null, '0', '75000.00', '1.00', '1.00', '10000.00', '0.00', '75000.00', '75000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107112', '3454653270019', '3032', 'Semanan-Plan1', '3.0915.0048', ' SAEFUL AMRI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:52:00', '2017-07-14', '17:00:00', null, '0', '87500.00', '1.00', '0.00', '10000.00', '0.00', '87500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107212', '3454653270019', '3033', 'Semanan-Plan1', '3.0915.0049', ' DEDI ISKANDAR', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:08:00', '2017-07-14', '17:05:00', null, '0', '86000.00', '1.00', '0.00', '10000.00', '0.00', '86000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107312', '3454653270019', '3038', 'Semanan-Plan1', '3.0915.0050', ' JUNED', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:44:00', '2017-07-14', '17:06:00', null, '0', '76500.00', '1.00', '0.00', '10000.00', '0.00', '76500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107412', '3454653270019', '4057', 'Semanan-Plan1', '3.0915.0051', 'MAD ALI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:41:00', '2017-07-14', '17:00:00', null, '0', '76500.00', '1.00', '0.00', '10000.00', '0.00', '76500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107512', '3454653270019', '4058', 'Semanan-Plan1', '3.0915.0052', 'ATMA', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:52:00', '2017-07-14', '17:02:00', null, '0', '73500.00', '1.00', '0.00', '10000.00', '0.00', '73500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107612', '3454653270019', '5770', 'Semanan-Plan1', '3.0915.0055', 'AGUS FAUZI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:53:00', '2017-07-14', '17:00:00', null, '0', '70000.00', '1.00', '0.00', '10000.00', '0.00', '70000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107712', '3454653270019', '5772', 'Semanan-Plan1', '3.0915.0056', 'SYAIFUL', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:44:00', '2017-07-14', '17:03:00', null, '0', '69000.00', '1.00', '0.00', '10000.00', '0.00', '69000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107812', '3454653270019', '5774', 'Semanan-Plan1', '3.0915.0057', 'MULYADI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '12:46:00', '2017-07-14', '17:04:00', null, '0', '69500.00', '1.00', '0.00', '10000.00', '0.00', '69500.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('107912', '3454653270019', '5787', 'Semanan-Plan1', '3.0915.0060', 'ANGGA', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '22:16:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108012', '3454653270019', '5788', 'Semanan-Plan1', '3.0915.0061', 'RAUL', '9', 'GRAFIS', 'Jumat', '2017-07-14', '08:07:00', '2017-07-14', '22:11:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108112', '3454653270019', '5789', 'Semanan-Plan1', '3.0915.0062', ' HASAN', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:24:00', '2017-07-14', '22:16:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108212', '3454653270019', '5790', 'Semanan-Plan1', '3.0915.0063', 'ANWAR FERDYANSYAH', '9', 'GRAFIS', 'Jumat', '2017-07-14', '08:00:00', '2017-07-14', '17:02:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108312', '3454653270019', '5791', 'Semanan-Plan1', '3.0915.0064', 'HENDRIYANSAH', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '17:01:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108412', '3454653270019', '5792', 'Semanan-Plan1', '3.0915.0065', 'ROSMANI', '9', 'GRAFIS', 'Jumat', '2017-07-14', '07:24:00', '2017-07-14', '17:03:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108512', '3454653270019', '7038', 'Semanan-Plan1', '3.0915.0066', ' MULYONO', '10', 'KAYU', 'Jumat', '2017-07-14', '07:42:00', '2017-07-14', '22:03:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108612', '3454653270019', '7046', 'Semanan-Plan1', '3.0915.0069', ' TEGUH  EFRIYANTO', '10', 'KAYU', 'Jumat', '2017-07-14', '12:50:00', '2017-07-14', '22:00:00', null, '0', '79000.00', '1.00', '1.00', '10000.00', '0.00', '79000.00', '79000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108712', '3454653270019', '7049', 'Semanan-Plan1', '3.0915.0070', ' SAHRUL ANWAR', '10', 'KAYU', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '22:02:00', null, '0', '94000.00', '1.00', '1.00', '10000.00', '0.00', '94000.00', '94000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108812', '3454653270019', '8000', 'Semanan-Plan1', '3.0915.0071', 'NURKHOLIS', '10', 'KAYU', 'Jumat', '2017-07-14', '08:03:00', '2017-07-14', '20:14:00', null, '0', '75500.00', '1.00', '0.50', '10000.00', '0.00', '75500.00', '37750.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('108912', '3454653270019', '1253', 'Semanan-Plan1', '3.0915.0072', ' FADULAH', '10', 'KAYU', 'Jumat', '2017-07-14', '08:14:00', '2017-07-14', '22:00:00', null, '0', '89500.00', '1.00', '1.00', '10000.00', '0.00', '89500.00', '89500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109012', '3454653270019', '1263', 'Semanan-Plan1', '3.0915.0073', 'APUNG', '10', 'KAYU', 'Jumat', '2017-07-14', '07:44:00', '2017-07-14', '22:02:00', null, '0', '68000.00', '1.00', '1.00', '10000.00', '0.00', '68000.00', '68000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109112', '3454653270019', '5303', 'Semanan-Plan1', '3.0915.0074', ' DERI DWI SAPUTRA', '10', 'KAYU', 'Jumat', '2017-07-14', '07:44:00', '2017-07-14', '22:23:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109212', '3454653270019', '9018', 'Semanan-Plan1', '3.0915.0076', ' HENDRA HERDIANSYAH', '10', 'KAYU', 'Jumat', '2017-07-14', '07:56:00', '2017-07-14', '22:03:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109312', '3454653270019', '9025', 'Semanan-Plan1', '3.0915.0077', 'NURALAMIN', '10', 'KAYU', 'Jumat', '2017-07-14', '07:59:00', '2017-07-14', '22:00:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109412', '3454653270019', '9035', 'Semanan-Plan1', '3.0915.0080', 'Aziz', '10', 'KAYU', 'Jumat', '2017-07-14', '07:59:00', '2017-07-14', '22:01:00', null, '0', '68500.00', '1.00', '1.00', '10000.00', '0.00', '68500.00', '68500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109512', '3454653270019', '9036', 'Semanan-Plan1', '3.0915.0081', ' NASIHIN', '10', 'KAYU', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '22:01:00', null, '0', '68500.00', '1.00', '1.00', '10000.00', '0.00', '68500.00', '68500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109612', '3454653270019', '9037', 'Semanan-Plan1', '3.0915.0082', 'GUNAWAN', '10', 'KAYU', 'Jumat', '2017-07-14', '07:42:00', '2017-07-14', '21:59:00', null, '0', '70000.00', '1.00', '0.75', '10000.00', '0.00', '70000.00', '52500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109712', '3454653270019', '9038', 'Semanan-Plan1', '3.0915.0083', 'DENY', '10', 'KAYU', 'Jumat', '2017-07-14', '08:04:00', '2017-07-14', '22:02:00', null, '0', '80000.00', '1.00', '1.00', '10000.00', '0.00', '80000.00', '80000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109812', '3454653270019', '9044', 'Semanan-Plan1', '3.0915.0088', 'MARPENDI', '10', 'KAYU', 'Jumat', '2017-07-14', '07:43:00', '2017-07-14', '22:16:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('109912', '3454653270019', '9047', 'Semanan-Plan1', '3.0915.0090', ' RIKY', '11', 'CAT', 'Jumat', '2017-07-14', '07:40:00', '2017-07-14', '17:02:00', null, '0', '60000.00', '1.00', '0.00', '10000.00', '0.00', '60000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110012', '3454653270019', '9048', 'Semanan-Plan1', '3.0915.0091', ' NURUL', '11', 'CAT', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '22:00:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110112', '3454653270019', '9049', 'Semanan-Plan1', '3.0915.0092', 'AMIR MA\'RIP', '11', 'CAT', 'Jumat', '2017-07-14', '07:54:00', '2017-07-14', '22:02:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110212', '3454653270019', '9050', 'Semanan-Plan1', '3.0915.0093', 'CUCU', '11', 'CAT', 'Jumat', '2017-07-14', '07:54:00', '2017-07-14', '22:02:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110312', '3454653270019', '90', 'Semanan-Plan1', '3.0915.0094', 'AJAHRUDIN', '11', 'CAT', 'Jumat', '2017-07-14', '07:30:00', '2017-07-14', '22:00:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110412', '3454653270019', '9052', 'Semanan-Plan1', '3.0915.0095', 'AJO', '11', 'CAT', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '22:00:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110512', '3454653270019', '1063', 'Semanan-Plan1', '3.0915.0096', 'SOLEH', '11', 'CAT', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '22:00:00', null, '0', '75000.00', '1.00', '1.00', '10000.00', '0.00', '75000.00', '75000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110612', '3454653270019', '5668', 'Semanan-Plan1', '3.0915.0097', ' EKO ISMANTO', '11', 'CAT', 'Jumat', '2017-07-14', '07:49:00', '2017-07-14', '22:04:00', null, '0', '95000.00', '1.00', '1.00', '10000.00', '0.00', '95000.00', '95000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110712', '3454653270019', '8006', 'Semanan-Plan1', '3.0915.0098', ' IMAM', '11', 'CAT', 'Jumat', '2017-07-14', '07:59:00', '2017-07-14', '22:03:00', null, '0', '95000.00', '1.00', '1.00', '10000.00', '0.00', '95000.00', '95000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110812', '3454653270019', '8016', 'Semanan-Plan1', '3.0915.0099', ' SENO SASONGKO', '11', 'CAT', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '22:01:00', null, '0', '93000.00', '1.00', '1.00', '10000.00', '0.00', '93000.00', '93000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('110912', '3454653270019', '8032', 'Semanan-Plan1', '3.0915.0100', ' SETIYO', '11', 'CAT', 'Jumat', '2017-07-14', '07:41:00', '2017-07-14', '22:02:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111012', '3454653270019', '8033', 'Semanan-Plan1', '3.0915.0101', ' BUDI NURYANTO', '11', 'CAT', 'Jumat', '2017-07-14', '07:42:00', '2017-07-14', '22:01:00', null, '0', '89000.00', '1.00', '1.00', '10000.00', '0.00', '89000.00', '89000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111112', '3454653270019', '8034', 'Semanan-Plan1', '3.0915.0102', ' USMANUDIN', '11', 'CAT', 'Jumat', '2017-07-14', '07:58:00', '2017-07-14', '22:03:00', null, '0', '90000.00', '1.00', '1.00', '10000.00', '0.00', '90000.00', '90000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111212', '3454653270019', '8041', 'Semanan-Plan1', '3.0915.0103', ' ANGKI WIJAYA', '11', 'CAT', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '22:01:00', null, '0', '80000.00', '1.00', '1.00', '10000.00', '0.00', '80000.00', '80000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111312', '3454653270019', '8046', 'Semanan-Plan1', '3.0915.0104', ' RERE SADEWA', '11', 'CAT', 'Jumat', '2017-07-14', '07:36:00', '2017-07-14', '21:59:00', null, '0', '75000.00', '1.00', '0.75', '10000.00', '0.00', '75000.00', '56250.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111412', '3454653270019', '8052', 'Semanan-Plan1', '3.0915.0105', ' SUGENG ', '11', 'CAT', 'Jumat', '2017-07-14', '07:43:00', '2017-07-14', '22:03:00', null, '0', '95000.00', '1.00', '1.00', '10000.00', '0.00', '95000.00', '95000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111512', '3454653270019', '8059', 'Semanan-Plan1', '3.0915.0107', 'LUTFI', '11', 'CAT', 'Jumat', '2017-07-14', '07:52:00', '2017-07-14', '22:01:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111612', '3454653270019', '8060', 'Semanan-Plan1', '3.0915.0108', ' SUBIYANTONO', '11', 'CAT', 'Jumat', '2017-07-14', '07:58:00', '2017-07-14', '22:01:00', null, '0', '69500.00', '1.00', '1.00', '10000.00', '0.00', '69500.00', '69500.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111712', '3454653270019', '8063', 'Semanan-Plan1', '3.0915.0109', 'GINUNG', '11', 'CAT', 'Jumat', '2017-07-14', '07:43:00', '2017-07-14', '22:01:00', null, '0', '66000.00', '1.00', '1.00', '10000.00', '0.00', '66000.00', '66000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111812', '3454653270019', '8670', 'Semanan-Plan1', '3.0915.0110', 'BASIRUN', '11', 'CAT', 'Jumat', '2017-07-14', '07:58:00', '2017-07-14', '22:00:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('111912', '3454653270019', '8071', 'Semanan-Plan1', '3.0915.0112', 'ARIANTO', '11', 'CAT', 'Jumat', '2017-07-14', '07:59:00', '2017-07-14', '22:16:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112012', '3454653270019', '8074', 'Semanan-Plan1', '3.0915.0113', 'ADE HENDRIK', '11', 'CAT', 'Jumat', '2017-07-14', '07:57:00', '2017-07-14', '17:04:00', null, '0', '75000.00', '1.00', '0.00', '10000.00', '0.00', '75000.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112112', '3454653270019', '8076', 'Semanan-Plan1', '3.0915.0114', 'IKHSAN', '11', 'CAT', 'Jumat', '2017-07-14', '06:39:00', '2017-07-14', '22:02:00', null, '0', '75000.00', '1.00', '1.00', '10000.00', '0.00', '75000.00', '75000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112212', '3454653270019', '8079', 'Semanan-Plan1', '3.0915.0116', 'AHMAT ZAKIRMAN', '11', 'CAT', 'Jumat', '2017-07-14', '07:48:00', '2017-07-14', '21:59:00', null, '0', '65000.00', '1.00', '0.75', '10000.00', '0.00', '65000.00', '48750.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112312', '3454653270019', '8080', 'Semanan-Plan1', '3.0915.0117', 'FUAT', '11', 'CAT', 'Jumat', '2017-07-14', '07:55:00', '2017-07-14', '22:03:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112412', '3454653270019', '8081', 'Semanan-Plan1', '3.0915.0118', 'TRI HARIANTO', '11', 'CAT', 'Jumat', '2017-07-14', '07:45:00', '2017-07-14', '22:00:00', null, '0', '0.00', '1.00', '1.00', '10000.00', '0.00', '0.00', '0.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112512', '3454653270019', '8082', 'Semanan-Plan1', '3.0915.0119', 'DIDIK', '11', 'CAT', 'Jumat', '2017-07-14', '07:38:00', '2017-07-14', '22:00:00', null, '0', '65000.00', '1.00', '1.00', '10000.00', '0.00', '65000.00', '65000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112612', '3454653270019', '8083', 'Semanan-Plan1', '3.0915.0120', 'EKO P', '11', 'CAT', 'Jumat', '2017-07-14', '07:50:00', '2017-07-14', '22:16:00', null, '0', '65000.00', '1.00', '1.00', '10000.00', '0.00', '65000.00', '65000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112712', '3454653270019', '8084', 'Semanan-Plan1', '3.0915.0121', 'AGUNG', '11', 'CAT', 'Jumat', '2017-07-14', '07:51:00', '2017-07-14', '22:03:00', null, '0', '75000.00', '1.00', '1.00', '10000.00', '0.00', '75000.00', '75000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112812', '3454653270019', '8085', 'Semanan-Plan1', '3.0915.0122', 'MUKTI', '11', 'CAT', 'Jumat', '2017-07-14', '07:51:00', '2017-07-14', '22:04:00', null, '0', '65000.00', '1.00', '1.00', '10000.00', '0.00', '65000.00', '65000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('112912', '3454653270019', '8283', 'Semanan-Plan1', '3.0915.0123', 'FRENDY', '11', 'CAT', 'Jumat', '2017-07-14', '07:51:00', '2017-07-14', '22:00:00', null, '0', '65000.00', '1.00', '1.00', '10000.00', '0.00', '65000.00', '65000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('113012', '3454653270019', '8285', 'Semanan-Plan1', '3.0915.0125', 'EKO PRASETYO', '11', 'CAT', 'Jumat', '2017-07-14', '07:51:00', '2017-07-14', '22:01:00', null, '0', '60000.00', '1.00', '1.00', '10000.00', '0.00', '60000.00', '60000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);
INSERT INTO `absen_import_copy` VALUES ('113112', '3454653270019', '8286', 'Semanan-Plan1', '3.0915.0126', 'PRIYANTO', '11', 'CAT', 'Jumat', '2017-07-14', '07:54:00', '2017-07-14', '22:01:00', null, '0', '70000.00', '1.00', '1.00', '10000.00', '0.00', '70000.00', '70000.00', null, null, null, null, null, '2017-09-25 21:03:48', null, '1', null);

-- ----------------------------
-- Table structure for `absen_import_file`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import_file`;
CREATE TABLE `absen_import_file` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(50) DEFAULT NULL,
  `FILE_PATH` varchar(255) DEFAULT NULL,
  `FILE_NM` varchar(255) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=635 DEFAULT CHARSET=latin1 COMMENT='LIST IMPORT FILE USER';

-- ----------------------------
-- Records of absen_import_file
-- ----------------------------
INSERT INTO `absen_import_file` VALUES ('474', null, null, 'absen_import2017-09-27-200331.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('475', null, null, 'absen_import2017-09-27-200423.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('476', null, null, 'absen_import2017-09-27-200932.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('477', null, null, 'absen_import2017-09-27-201339.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('478', null, null, 'absen_import2017-09-27-201609.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('479', null, null, 'absen_import2017-09-27-201856.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('480', null, null, 'absen_import2017-09-27-221609.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('481', null, null, 'absen_import2017-09-27-221812.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('482', null, null, 'absen_import2017-09-27-224155.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('483', null, null, 'absen_import2017-09-27-224347.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('484', null, null, 'absen_import2017-09-28-040852.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('485', null, null, 'absen_import2017-09-28-041109.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('486', null, null, 'absen_import2017-09-28-041120.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('487', null, null, 'absen_import2017-09-28-041306.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('488', null, null, 'absen_import2017-09-28-041611.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('489', null, null, 'absen_import2017-09-28-041846.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('490', null, null, 'absen_import2017-09-28-041929.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('491', null, null, 'absen_import2017-09-28-042027.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('492', null, null, 'absen_import2017-09-28-042412.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('493', null, null, 'absen_import2017-09-28-082502.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('494', null, null, 'absen_import2017-09-28-082604.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('495', null, null, 'absen_import2017-09-28-083526.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('496', null, null, 'absen_import2017-09-28-083646.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('497', null, null, 'absen_import2017-09-28-083831.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('498', null, null, 'absen_import2017-09-28-084617.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('499', null, null, 'absen_import2017-09-28-084907.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('500', null, null, 'absen_import2017-09-28-093834.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('501', null, null, 'absen_import2017-09-28-095715.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('502', null, null, 'absen_import2017-09-28-101415.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('503', null, null, 'absen_import2017-09-28-101518.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('504', null, null, 'absen_import2017-09-28-111318.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('505', null, null, 'absen_import2017-09-28-111629.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('506', null, null, 'absen_import2017-09-28-111912.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('507', null, null, 'absen_import2017-09-28-112020.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('508', null, null, 'absen_import2017-09-28-112130.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('509', null, null, 'absen_import2017-09-28-112325.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('510', null, null, 'absen_import2017-09-28-112505.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('511', null, null, 'absen_import2017-09-28-112614.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('512', null, null, 'absen_import2017-09-28-112932.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('513', null, null, 'absen_import2017-09-28-113108.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('514', null, null, 'absen_import2017-09-28-121216.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('515', null, null, 'absen_import2017-09-28-121230.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('516', null, null, 'absen_import2017-09-28-121645.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('517', null, null, 'absen_import2017-09-28-121821.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('518', null, null, 'absen_import2017-09-28-121938.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('519', null, null, 'absen_import2017-09-28-122148.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('520', null, null, 'absen_import2017-09-28-122518.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('521', null, null, 'absen_import2017-09-28-122635.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('522', null, null, 'absen_import2017-09-28-122742.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('523', null, null, 'absen_import2017-09-28-124039.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('524', null, null, 'absen_import2017-09-28-124904.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('525', null, null, 'absen_import2017-09-28-143230.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('526', null, null, 'absen_import2017-09-28-145044.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('527', null, null, 'absen_import2017-09-28-145245.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('528', null, null, 'absen_import2017-09-28-163427.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('529', null, null, 'absen_import2017-09-28-163546.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('530', null, null, 'absen_import2017-09-29-221231.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('531', null, null, 'absen_import2017-09-29-221828.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('532', null, null, 'absen_import2017-09-29-222026.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('533', null, null, 'absen_import2017-09-29-222747.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('534', null, null, 'absen_import2017-09-29-223438.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('535', null, null, 'absen_import2017-09-29-223648.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('536', null, null, 'absen_import2017-09-29-224607.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('537', null, null, 'absen_import2017-09-29-224954.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('538', null, null, 'absen_import2017-09-29-225014.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('539', null, null, 'absen_import2017-09-29-232546.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('540', null, null, 'absen_import2017-09-30-004713.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('541', null, null, 'absen_import2017-09-30-004918.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('542', null, null, 'absen_import2017-09-30-005144.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('543', null, null, null, null);
INSERT INTO `absen_import_file` VALUES ('544', null, null, 'absen_import2017-09-30-005310.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('545', null, null, 'absen_import2017-09-30-023838.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('546', null, null, 'absen_import2017-09-30-024952.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('547', null, null, 'absen_import2017-09-30-025919.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('548', null, null, 'absen_import2017-09-30-034732.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('549', null, null, 'absen_import2017-09-30-035216.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('550', null, null, 'absen_import2017-09-30-040114.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('551', null, null, 'absen_import2017-09-30-112818.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('552', null, null, 'absen_import2017-09-30-113057.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('553', null, null, 'absen_import2017-09-30-115556.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('554', null, null, 'absen_import2017-09-30-122439.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('555', null, null, 'absen_import2017-09-30-145631.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('556', null, null, 'absen_import2017-10-02-183132.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('557', null, null, 'absen_import2017-10-02-183214.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('558', null, null, 'absen_import2017-10-02-183227.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('559', null, null, 'absen_import2017-10-02-183237.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('560', null, null, 'absen_import2017-10-02-183941.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('561', null, null, 'absen_import2017-10-02-184456.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('562', null, null, 'absen_import2017-10-02-184616.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('563', null, null, 'absen_import2017-10-02-191404.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('564', null, null, 'absen_import2017-10-02-191612.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('565', null, null, 'absen_import2017-10-02-191705.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('566', null, null, 'absen_import2017-10-02-191806.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('567', null, null, 'absen_import2017-10-02-193623.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('568', null, null, 'absen_import2017-10-02-195753.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('569', null, null, 'absen_import2017-10-02-200534.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('570', null, null, 'absen_import2017-10-02-201041.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('571', null, null, 'absen_import2017-10-02-201550.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('572', null, null, 'absen_import2017-10-02-201715.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('573', null, null, 'absen_import2017-10-02-201806.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('574', null, null, 'absen_import2017-10-02-202149.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('575', null, null, 'absen_import2017-10-02-202453.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('576', null, null, 'absen_import2017-10-02-203547.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('577', null, null, 'absen_import2017-10-02-210052.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('578', null, null, 'absen_import2017-10-02-221830.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('579', null, null, 'absen_import2017-10-03-090449.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('580', null, null, 'absen_import2017-10-03-110647.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('581', null, null, 'absen_import2017-10-04-161959.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('582', null, null, 'absen_import2017-10-04-180320.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('583', null, null, 'absen_import2017-10-04-190148.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('584', null, null, 'absen_import2017-10-04-190252.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('585', null, null, 'absen_import2017-10-04-190337.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('586', null, null, 'absen_import2017-10-04-191023.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('587', null, null, null, null);
INSERT INTO `absen_import_file` VALUES ('588', null, null, 'absen_import2017-10-04-191355.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('589', null, null, 'absen_import2017-10-04-191537.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('590', null, null, 'absen_import2017-10-04-191813.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('591', null, null, 'absen_import2017-10-04-192115.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('592', null, null, 'absen_import2017-10-04-192629.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('593', null, null, 'absen_import2017-10-04-194011.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('594', null, null, 'absen_import2017-10-04-194649.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('595', null, null, 'absen_import2017-10-04-195156.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('596', null, null, 'absen_import2017-10-04-200724.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('597', null, null, 'absen_import2017-10-04-201033.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('598', null, null, 'absen_import2017-10-04-202553.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('599', null, null, 'absen_import2017-10-04-202843.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('600', null, null, 'absen_import2017-10-04-202931.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('601', null, null, 'absen_import2017-10-04-203131.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('602', null, null, 'absen_import2017-10-04-203254.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('603', null, null, 'absen_import2017-10-04-203349.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('604', null, null, 'absen_import2017-10-04-203456.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('605', null, null, 'absen_import2017-10-04-204253.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('606', null, null, 'absen_import2017-10-04-204827.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('607', null, null, 'absen_import2017-10-04-205142.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('608', null, null, 'absen_import2017-10-04-205235.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('609', null, null, 'absen_import2017-10-04-205407.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('610', null, null, 'absen_import2017-10-04-205739.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('611', null, null, 'absen_import2017-10-04-210223.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('612', null, null, 'absen_import2017-10-04-210902.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('613', null, null, 'absen_import2017-10-04-211058.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('614', null, null, 'absen_import2017-10-04-211218.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('615', null, null, 'absen_import2017-10-04-211332.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('616', null, null, 'absen_import2017-10-04-211418.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('617', null, null, 'absen_import2017-10-04-211607.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('618', null, null, 'absen_import2017-10-04-211727.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('619', null, null, 'absen_import2017-10-04-211817.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('620', null, null, 'absen_import2017-10-04-211957.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('621', null, null, 'absen_import2017-10-04-212148.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('622', null, null, 'absen_import2017-10-04-212422.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('623', null, null, 'absen_import2017-10-04-212628.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('624', null, null, 'absen_import2017-10-04-213129.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('625', null, null, 'absen_import2017-10-04-213634.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('626', null, null, 'absen_import2017-10-04-213719.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('627', null, null, 'absen_import2017-10-04-213841.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('628', null, null, 'absen_import2017-10-04-214148.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('629', null, null, 'absen_import2017-10-13-013555.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('630', null, null, 'absen_import2017-10-13-013851.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('631', null, null, 'absen_import2017-10-13-014220.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('632', null, null, 'absen_import2017-10-13-014730.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('633', null, null, 'absen_import2017-10-13-014918.xlsx', null);
INSERT INTO `absen_import_file` VALUES ('634', null, null, 'absen_import2017-10-13-015825.xlsx', null);

-- ----------------------------
-- Table structure for `absen_import_periode`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import_periode`;
CREATE TABLE `absen_import_periode` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AKTIF` smallint(6) DEFAULT NULL COMMENT '1=Aktif; 0=Inactive (1 aktif yang lain harus lain 0)=type',
  `TIPE` smallint(6) DEFAULT NULL COMMENT '0=Harian;1=office',
  `TGL_START` date DEFAULT NULL,
  `TGL_END` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_import_periode
-- ----------------------------
INSERT INTO `absen_import_periode` VALUES ('1', '1', '0', '2017-09-22', '2017-09-28');
INSERT INTO `absen_import_periode` VALUES ('2', '1', '1', '2017-09-22', '2017-09-28');

-- ----------------------------
-- Table structure for `absen_import_tmp`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import_tmp`;
CREATE TABLE `absen_import_tmp` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `LEBIH_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `STT_LEMBUR` bigint(20) DEFAULT NULL COMMENT '0=tidak di hitung lembur; 1=dihitung lembur; seterusnya IJIN dianggap masuk',
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `VAL_POTONGAN_TELAT` decimal(50,2) DEFAULT NULL,
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` smallint(6) DEFAULT '0',
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_import_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for `absen_import_tmp_copy`
-- ----------------------------
DROP TABLE IF EXISTS `absen_import_tmp_copy`;
CREATE TABLE `absen_import_tmp_copy` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` smallint(6) DEFAULT '0',
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_import_tmp_copy
-- ----------------------------
INSERT INTO `absen_import_tmp_copy` VALUES ('125', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '08:45:00', null, '08:45:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:46', '100', '');
INSERT INTO `absen_import_tmp_copy` VALUES ('126', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Jumat', '2017-09-08', '07:00:00', '2017-09-07', '02:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:46', '101', '');
INSERT INTO `absen_import_tmp_copy` VALUES ('127', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Senin', '2017-05-08', '11:05:58', '2017-05-08', '11:05:58', null, '0.00', '0.38', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:46', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('128', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Kamis', '1970-01-01', '01:00:00', '1970-01-01', '01:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:46', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('129', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Kamis', '1970-01-01', '01:00:00', '1970-01-01', '01:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:46', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('130', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Kamis', '1970-01-01', '01:00:00', '1970-01-01', '01:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:47', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('131', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Kamis', '1970-01-01', '01:00:00', '1970-01-01', '01:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:47', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('132', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '12:00:56', '1970-01-01', '01:00:00', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:47', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('133', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '11:55:07', '2017-09-05', '05:25:07', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:47', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('135', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '03:55:12', '2017-09-09', '03:35:12', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:01:47', '101', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('136', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '04:00:23', '2017-09-09', '07:35:23', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:41:15', '102', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('137', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '04:30:15', '2017-09-09', '06:30:15', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:41:15', '102', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('138', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '06:30:06', '2017-09-09', '07:05:06', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:41:15', '102', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('139', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '08:40:35', '2017-09-09', '11:10:35', null, '0.00', '0.38', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:41:15', '102', null);
INSERT INTO `absen_import_tmp_copy` VALUES ('140', '3454653270019', '5628', 'Semanan-Plan1', '3.1215.0003', 'TEDDY', '15', 'MAINTENANCE', 'Sabtu', '2017-09-09', '04:25:08', '2017-09-09', '05:25:08', null, '0.00', '0.00', '0.00', '0.00', '0.00', null, null, null, '2017-09-10 01:41:15', '102', null);

-- ----------------------------
-- Table structure for `absen_payroll`
-- ----------------------------
DROP TABLE IF EXISTS `absen_payroll`;
CREATE TABLE `absen_payroll` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TERMINAL_ID` varchar(100) DEFAULT NULL,
  `FINGER_ID` varchar(255) DEFAULT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `KAR_NM` varchar(100) DEFAULT NULL,
  `DEP_ID` varchar(5) DEFAULT NULL,
  `DEP_NM` varchar(50) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL,
  `IN_TGL` date DEFAULT NULL,
  `IN_WAKTU` time DEFAULT NULL,
  `OUT_TGL` date DEFAULT NULL,
  `OUT_WAKTU` time DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `STT_LEMBUR` smallint(6) DEFAULT '0' COMMENT '0=tidak di hitung lembur; 1=dihitung lembur',
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `VAL_PAGI` decimal(50,2) DEFAULT NULL,
  `VAL_LEMBUR` decimal(50,2) DEFAULT NULL,
  `VAL_MAKAN` decimal(50,2) DEFAULT '0.00' COMMENT 'setelah jam 23 tau 11 malam',
  `VAL_POTONGAN_TELAT` decimal(50,2) DEFAULT '0.00' COMMENT 'per-45 menit 1%',
  `PAY_PAGI` decimal(50,2) DEFAULT NULL,
  `PAY_LEMBUR` decimal(50,2) DEFAULT NULL,
  `CLOSING_IN_TGL1` date DEFAULT NULL COMMENT 'TANGGAL START CLOSING',
  `CLOSING_IN_TGL2` date DEFAULT NULL COMMENT 'TANGGAL END CLOSING',
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` smallint(6) DEFAULT '1' COMMENT '0=SAVE DB; 1=CLOSING; 2=PAYMENT; ',
  `DCRP_DETIL` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absen_payroll
-- ----------------------------
INSERT INTO `absen_payroll` VALUES ('1029', '3454653270019', '5628', 'Semanan-Plan1', '3.0915.0001', ' TEDDY', '1', 'TEKHNISI', 'Kamis', '2017-07-20', '12:00:01', '2017-07-20', '23:00:00', null, '1', '60000.00', '0.50', '1.25', '10000.00', '0.50', '30000.00', '75000.00', null, null, null, null, null, '2017-09-23 13:52:19', '1', null);

-- ----------------------------
-- Table structure for `agama`
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `AGAMA_ID` int(30) NOT NULL AUTO_INCREMENT,
  `AGAMA_NM` varchar(100) DEFAULT NULL,
  `USER` varchar(30) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AGAMA_ID`),
  UNIQUE KEY `id` (`AGAMA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama
-- ----------------------------
INSERT INTO `agama` VALUES ('1', 'ISLAM', 'admin', '2009-06-28 00:03:39');
INSERT INTO `agama` VALUES ('2', 'KRISTEN', 'admin', '2009-06-28 00:03:51');
INSERT INTO `agama` VALUES ('3', 'KATHOLIK', 'admin', '2009-06-28 00:03:57');
INSERT INTO `agama` VALUES ('4', 'BUDHA', 'admin', '2009-06-28 00:04:15');
INSERT INTO `agama` VALUES ('5', 'HINDU', 'root', '2014-12-31 09:25:05');

-- ----------------------------
-- Table structure for `agama_copy`
-- ----------------------------
DROP TABLE IF EXISTS `agama_copy`;
CREATE TABLE `agama_copy` (
  `AGAMA_ID` int(30) NOT NULL AUTO_INCREMENT,
  `AGAMA_NM` varchar(100) DEFAULT NULL,
  `USER` varchar(30) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AGAMA_ID`),
  UNIQUE KEY `id` (`AGAMA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama_copy
-- ----------------------------
INSERT INTO `agama_copy` VALUES ('1', 'ISLAM', 'admin', '2009-06-28 00:03:39');
INSERT INTO `agama_copy` VALUES ('2', 'KRISTEN', 'admin', '2009-06-28 00:03:51');
INSERT INTO `agama_copy` VALUES ('3', 'KATHOLIK', 'admin', '2009-06-28 00:03:57');
INSERT INTO `agama_copy` VALUES ('4', 'BUDHA', 'admin', '2009-06-28 00:04:15');
INSERT INTO `agama_copy` VALUES ('5', 'HINDU', 'root', '2014-12-31 09:25:05');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('ACCT_OWNER', '1', '1432807683');
INSERT INTO `auth_assignment` VALUES ('DASHBOARD_REPORT_OWNER', '1', '1432812417');
INSERT INTO `auth_assignment` VALUES ('DEFAULT_MENU', '1', '1432802950');
INSERT INTO `auth_assignment` VALUES ('DESIGN_OWNER', '1', '1432808942');
INSERT INTO `auth_assignment` VALUES ('FNC_OWNER', '1', '1432807795');
INSERT INTO `auth_assignment` VALUES ('GA_OWNER', '1', '1432808097');
INSERT INTO `auth_assignment` VALUES ('HRD_OWNER', '1', '1432795531');
INSERT INTO `auth_assignment` VALUES ('IT_OWNER', '1', '1432810536');
INSERT INTO `auth_assignment` VALUES ('Permission_Absensi', '3', '1505037346');
INSERT INTO `auth_assignment` VALUES ('Permission_ACC_Full', '1', '1432807665');
INSERT INTO `auth_assignment` VALUES ('Permission_HRD_Full', '1', '1432795464');
INSERT INTO `auth_assignment` VALUES ('Permission_HRD_Full', '2', '1505036803');
INSERT INTO `auth_assignment` VALUES ('Permission_IT', '4', '1505037607');

-- ----------------------------
-- Table structure for `auth_assignment_copy`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment_copy`;
CREATE TABLE `auth_assignment_copy` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_copy_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment_copy
-- ----------------------------
INSERT INTO `auth_assignment_copy` VALUES ('ACCT_OWNER', '1', '1432807683');
INSERT INTO `auth_assignment_copy` VALUES ('DASHBOARD_REPORT_OWNER', '1', '1432812417');
INSERT INTO `auth_assignment_copy` VALUES ('DEFAULT_MENU', '1', '1432802950');
INSERT INTO `auth_assignment_copy` VALUES ('DESIGN_OWNER', '1', '1432808942');
INSERT INTO `auth_assignment_copy` VALUES ('FNC_OWNER', '1', '1432807795');
INSERT INTO `auth_assignment_copy` VALUES ('GA_OWNER', '1', '1432808097');
INSERT INTO `auth_assignment_copy` VALUES ('HRD_OWNER', '1', '1432795531');
INSERT INTO `auth_assignment_copy` VALUES ('IT_OWNER', '1', '1432810536');
INSERT INTO `auth_assignment_copy` VALUES ('Permission_Absensi', '3', '1505037346');
INSERT INTO `auth_assignment_copy` VALUES ('Permission_ACC_Full', '1', '1432807665');
INSERT INTO `auth_assignment_copy` VALUES ('Permission_HRD_Full', '1', '1432795464');
INSERT INTO `auth_assignment_copy` VALUES ('Permission_HRD_Full', '2', '1505036803');
INSERT INTO `auth_assignment_copy` VALUES ('Permission_IT', '4', '1505037607');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/absensi/absen-import/index', '2', null, null, null, '1505033664', '1505033664');
INSERT INTO `auth_item` VALUES ('/admin', '2', null, null, null, '1436204436', '1436204436');
INSERT INTO `auth_item` VALUES ('/dashboard/absensi', '2', null, null, null, '1457798623', '1457798623');
INSERT INTO `auth_item` VALUES ('/dashboard/absensi-log', '2', null, null, null, '1457800858', '1457800858');
INSERT INTO `auth_item` VALUES ('/dashboard/export-import', '2', null, null, null, '1457799870', '1457799870');
INSERT INTO `auth_item` VALUES ('/dashboard/master-data', '2', null, null, null, '1457797992', '1457797992');
INSERT INTO `auth_item` VALUES ('/dashboard/master-machine', '2', null, null, null, '1457798148', '1457798148');
INSERT INTO `auth_item` VALUES ('/dashboard/modul', '2', null, null, null, '1457798659', '1457798659');
INSERT INTO `auth_item` VALUES ('/dashboard/personalia', '2', null, null, null, '1457798647', '1457798647');
INSERT INTO `auth_item` VALUES ('/dashboard/rekrutmen', '2', null, null, null, '1457798823', '1457798823');
INSERT INTO `auth_item` VALUES ('/master/absen-maintain/index', '2', null, null, null, '1505032944', '1505032944');
INSERT INTO `auth_item` VALUES ('/master/agama/index', '2', null, null, null, '1505035928', '1505035928');
INSERT INTO `auth_item` VALUES ('/master/cbg/index', '2', null, null, null, '1505035914', '1505035914');
INSERT INTO `auth_item` VALUES ('/master/dept/index', '2', null, null, null, '1505032919', '1505032919');
INSERT INTO `auth_item` VALUES ('/master/employe/index', '2', null, null, null, '1505032869', '1505032869');
INSERT INTO `auth_item` VALUES ('/master/finger/index', '2', null, null, null, '1505034400', '1505034400');
INSERT INTO `auth_item` VALUES ('/master/formula-overtime/index', '2', null, null, null, '1505035945', '1505035945');
INSERT INTO `auth_item` VALUES ('/master/grading/index', '2', null, null, null, '1505035935', '1505035935');
INSERT INTO `auth_item` VALUES ('/master/ijin-detail/*', '2', null, null, null, '1505033016', '1505033016');
INSERT INTO `auth_item` VALUES ('/master/ijin-detail/index', '2', null, null, null, '1505033275', '1505033275');
INSERT INTO `auth_item` VALUES ('/master/kepangkatan/index', '2', null, null, null, '1505035909', '1505035909');
INSERT INTO `auth_item` VALUES ('/master/payroll-jamsos-formula/index', '2', null, null, null, '1505035292', '1505035292');
INSERT INTO `auth_item` VALUES ('/master/payroll-loan-header/index', '2', null, null, null, '1505035325', '1505035325');
INSERT INTO `auth_item` VALUES ('/master/payroll-salary/index', '2', null, null, null, '1505034818', '1505034818');
INSERT INTO `auth_item` VALUES ('/master/payroll-tax/index', '2', null, null, null, '1505035145', '1505035145');
INSERT INTO `auth_item` VALUES ('/master/pendidikan/index', '2', null, null, null, '1505036457', '1505036457');
INSERT INTO `auth_item` VALUES ('/master/timetable-normal/index', '2', null, null, null, '1505033524', '1505033524');
INSERT INTO `auth_item` VALUES ('/payroll/absen-daily/index', '2', null, null, null, '1505032239', '1505032239');
INSERT INTO `auth_item` VALUES ('ACCT_OWNER', '1', null, 'OWNER', null, '1432804872', '1432807641');
INSERT INTO `auth_item` VALUES ('BASIC_SETTING', '1', null, 'OWNER', null, '1439369554', '1439369747');
INSERT INTO `auth_item` VALUES ('DASHBOARD_REPORT_OWNER', '1', 'DASHBOARD REPORT', 'OWNER', null, '1432812393', '1432812393');
INSERT INTO `auth_item` VALUES ('DEFAULT_MENU', '1', 'Menu Untuk Semua login User', 'OWNER', null, '1432802919', '1432804794');
INSERT INTO `auth_item` VALUES ('DESIGN_OWNER', '1', null, 'OWNER', null, '1432808921', '1432808921');
INSERT INTO `auth_item` VALUES ('FNC_OWNER', '1', null, null, null, '1432807768', '1432807785');
INSERT INTO `auth_item` VALUES ('GA_OWNER', '1', 'GENERAL AFFAIR', 'OWNER', null, '1432808082', '1432808082');
INSERT INTO `auth_item` VALUES ('HRD_OWNER', '1', null, 'OWNER', null, '1432795501', '1432795501');
INSERT INTO `auth_item` VALUES ('IT_OWNER', '1', 'IT Show ALL', 'OWNER', null, '1432810516', '1439116357');
INSERT INTO `auth_item` VALUES ('Permission_Absensi', '2', 'Admin Absensi', null, null, '1432808020', '1505037195');
INSERT INTO `auth_item` VALUES ('Permission_ACC_Full', '2', 'Dept. Accounting - All Menu ', null, null, '1432804684', '1457799086');
INSERT INTO `auth_item` VALUES ('Permission_Basic_Setting', '2', 'Setting Application Software', 'OWNER', null, '1439369520', '1457800906');
INSERT INTO `auth_item` VALUES ('Permission_HRD_Full', '2', 'Dept. HRD - All Menu ', null, null, '1432795442', '1505036877');
INSERT INTO `auth_item` VALUES ('Permission_IT', '2', 'Permission IT Maintain', null, null, '1432810444', '1505037534');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('ACCT_OWNER', 'Permission_ACC_Full');
INSERT INTO `auth_item_child` VALUES ('BASIC_SETTING', 'Permission_Basic_Setting');
INSERT INTO `auth_item_child` VALUES ('GA_OWNER', 'Permission_Absensi');
INSERT INTO `auth_item_child` VALUES ('HRD_OWNER', 'Permission_HRD_Full');
INSERT INTO `auth_item_child` VALUES ('IT_OWNER', 'Permission_IT');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/absensi/absen-import/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/absen-maintain/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/agama/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/cbg/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/dept/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/employe/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/finger/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/formula-overtime/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/grading/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/ijin-detail/*');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/ijin-detail/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/kepangkatan/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/pendidikan/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Absensi', '/master/timetable-normal/index');
INSERT INTO `auth_item_child` VALUES ('Permission_Basic_Setting', '/dashboard/absensi-log');
INSERT INTO `auth_item_child` VALUES ('Permission_Basic_Setting', '/dashboard/master-data');
INSERT INTO `auth_item_child` VALUES ('Permission_Basic_Setting', '/dashboard/master-machine');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/absensi/absen-import/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/admin');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/absensi');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/absensi-log');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/master-data');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/master-machine');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/modul');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/personalia');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/dashboard/rekrutmen');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/absen-maintain/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/agama/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/cbg/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/dept/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/employe/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/finger/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/formula-overtime/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/grading/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/ijin-detail/*');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/ijin-detail/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/kepangkatan/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/payroll-jamsos-formula/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/payroll-loan-header/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/payroll-salary/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/payroll-tax/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/pendidikan/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/master/timetable-normal/index');
INSERT INTO `auth_item_child` VALUES ('Permission_HRD_Full', '/payroll/absen-daily/index');
INSERT INTO `auth_item_child` VALUES ('Permission_IT', '/admin');
INSERT INTO `auth_item_child` VALUES ('Permission_IT', '/dashboard/absensi-log');
INSERT INTO `auth_item_child` VALUES ('Permission_IT', '/dashboard/export-import');
INSERT INTO `auth_item_child` VALUES ('Permission_IT', '/dashboard/master-data');
INSERT INTO `auth_item_child` VALUES ('Permission_IT', '/dashboard/master-machine');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('CEO', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:3:\"CEO\";s:9:\"createdAt\";i:1432663909;s:9:\"updatedAt\";i:1432663909;}', '1432663909', '1432663909');
INSERT INTO `auth_rule` VALUES ('DM', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:2:\"DM\";s:9:\"createdAt\";i:1432663960;s:9:\"updatedAt\";i:1432663960;}', '1432663960', '1432663960');
INSERT INTO `auth_rule` VALUES ('GM', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:2:\"GM\";s:9:\"createdAt\";i:1432663921;s:9:\"updatedAt\";i:1432663921;}', '1432663921', '1432663921');
INSERT INTO `auth_rule` VALUES ('KOMISARIS', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:9:\"KOMISARIS\";s:9:\"createdAt\";i:1432663897;s:9:\"updatedAt\";i:1432663897;}', '1432663897', '1432663897');
INSERT INTO `auth_rule` VALUES ('MANAGER', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:7:\"MANAGER\";s:9:\"createdAt\";i:1432663935;s:9:\"updatedAt\";i:1432663935;}', '1432663935', '1432663935');
INSERT INTO `auth_rule` VALUES ('OPS', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:3:\"OPS\";s:9:\"createdAt\";i:1432663982;s:9:\"updatedAt\";i:1432663982;}', '1432663982', '1432663982');
INSERT INTO `auth_rule` VALUES ('OWNER', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:5:\"OWNER\";s:9:\"createdAt\";i:1432663885;s:9:\"updatedAt\";i:1432663885;}', '1432663885', '1432663885');
INSERT INTO `auth_rule` VALUES ('STAFF', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:5:\"STAFF\";s:9:\"createdAt\";i:1432663970;s:9:\"updatedAt\";i:1432781070;}', '1432663970', '1432781070');
INSERT INTO `auth_rule` VALUES ('SUVERVISOR', 'O:22:\"yii\\rbac\\UserGroupRule\":3:{s:4:\"name\";s:10:\"SUVERVISOR\";s:9:\"createdAt\";i:1432663950;s:9:\"updatedAt\";i:1432663950;}', '1432663950', '1432663950');

-- ----------------------------
-- Table structure for `cabang`
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `CAB_ID` varchar(5) NOT NULL,
  `CAB_NM` varchar(50) DEFAULT NULL,
  `CAB_STS` tinyint(4) DEFAULT NULL,
  `CAB_ALM_NM` varchar(60) DEFAULT NULL,
  `CAB_ALM_JLN` varchar(60) DEFAULT NULL,
  `CAB_ALM_CTY` varchar(60) DEFAULT NULL,
  `CAB_TLP1` varchar(20) DEFAULT NULL,
  `CAB_TLP2` varchar(20) DEFAULT NULL,
  `CAB_FAX1` varchar(20) DEFAULT NULL,
  `CAB_FAX2` varchar(20) DEFAULT NULL,
  `CAB_WEB` varchar(100) DEFAULT NULL,
  `CAB_MAIL` varchar(100) DEFAULT NULL,
  `CORP_ID` varchar(5) DEFAULT NULL,
  `CAB_LOGO` varchar(100) DEFAULT NULL,
  `CAB_TYPE_ID` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES ('1', 'DADAP-Plant2', '1', null, null, null, null, null, null, null, null, null, 'WAN', null, 'CAB');
INSERT INTO `cabang` VALUES ('2', 'DADAP-Xisco', '1', null, null, null, null, null, null, null, null, null, 'WAN', null, 'CAB');
INSERT INTO `cabang` VALUES ('3', 'SEMANAN-Plan1', '1', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'WAN', 'XXX', 'HO');
INSERT INTO `cabang` VALUES ('4', 'MERUYA-Senindo', '1', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'WAN', 'XXX', 'CAB');
INSERT INTO `cabang` VALUES ('5', 'SURABAYA', '1', null, null, null, null, null, null, null, null, null, 'WAN', null, 'CAB');

-- ----------------------------
-- Table structure for `corp`
-- ----------------------------
DROP TABLE IF EXISTS `corp`;
CREATE TABLE `corp` (
  `CORP_ID` varchar(5) NOT NULL,
  `CORP_NM` varchar(50) NOT NULL,
  `CORP_STS` tinyint(4) DEFAULT NULL,
  `CORP_ALM_NM` varchar(60) DEFAULT NULL,
  `CORP_TLP1` varchar(20) DEFAULT NULL,
  `CORP_FAX1` varchar(20) DEFAULT NULL,
  `CORP_WEB` varchar(100) DEFAULT NULL,
  `CORP_MAIL` varchar(100) DEFAULT NULL,
  `CORP_ALM_JLN` varchar(60) DEFAULT NULL,
  `CORP_ALM_CTY` varchar(60) DEFAULT NULL,
  `CORP_TLP2` varchar(20) DEFAULT NULL,
  `CORP_FAX2` varchar(20) DEFAULT NULL,
  `CORP_LOGO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CORP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of corp
-- ----------------------------
INSERT INTO `corp` VALUES ('WAN', 'PT. WANINDO', '1', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX');

-- ----------------------------
-- Table structure for `departemen`
-- ----------------------------
DROP TABLE IF EXISTS `departemen`;
CREATE TABLE `departemen` (
  `DEP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEP_NM` varchar(30) DEFAULT NULL,
  `EmployeeAmount` bigint(20) DEFAULT NULL,
  `USER` varchar(50) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`DEP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departemen
-- ----------------------------
INSERT INTO `departemen` VALUES ('1', 'TEKHNISI', null, null, '2017-09-15 18:47:17');
INSERT INTO `departemen` VALUES ('2', 'MESIN', null, null, '2017-09-15 18:47:24');
INSERT INTO `departemen` VALUES ('3', 'UMUM', null, null, '2017-09-15 18:47:25');
INSERT INTO `departemen` VALUES ('4', 'DRIVER', null, null, '2017-09-15 18:47:26');
INSERT INTO `departemen` VALUES ('5', 'LOGISTIK', null, null, '2017-09-15 18:47:27');
INSERT INTO `departemen` VALUES ('6', 'PLKP', null, null, '2017-09-15 18:47:28');
INSERT INTO `departemen` VALUES ('7', 'KARPET', null, null, '2017-09-15 18:47:29');
INSERT INTO `departemen` VALUES ('8', 'LISTRIK', null, null, '2017-09-15 18:47:31');
INSERT INTO `departemen` VALUES ('9', 'GRAFIS', null, null, '2017-09-15 18:47:32');
INSERT INTO `departemen` VALUES ('10', 'KAYU', null, null, '2017-09-15 18:47:33');
INSERT INTO `departemen` VALUES ('11', 'CAT', null, null, '2017-09-15 18:47:50');

-- ----------------------------
-- Table structure for `grading`
-- ----------------------------
DROP TABLE IF EXISTS `grading`;
CREATE TABLE `grading` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GF_ID` varchar(10) DEFAULT NULL,
  `JOBGRADE_ID` varchar(5) NOT NULL,
  `JOBGRADE_NM` varchar(100) DEFAULT NULL,
  `JOBGRADE_DCRP` text,
  `JOBGRADE_STS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`,`JOBGRADE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='GRADEING/JABATAN/GOLONGAN';

-- ----------------------------
-- Records of grading
-- ----------------------------
INSERT INTO `grading` VALUES ('1', 'A', 'A1', 'SENIOR VICE PRESIDENT', null, '0', '', '', '2016-07-17 13:47:13');
INSERT INTO `grading` VALUES ('2', 'A', 'A2', 'VICE PRESIDENT', null, '0', '', '', '2016-06-14 22:31:41');
INSERT INTO `grading` VALUES ('3', 'B', 'B1', 'SENIOR GENERAL MANAGER', null, '0', '', '', '2016-06-14 22:31:59');
INSERT INTO `grading` VALUES ('4', 'B', 'B2', 'GENERAL MANAGER', null, '0', '', '', '2016-06-14 22:32:01');
INSERT INTO `grading` VALUES ('5', 'C', 'C1', 'SENIOR MANAGER', null, '0', '', '', '2016-06-14 22:32:03');
INSERT INTO `grading` VALUES ('6', 'C', 'C2', 'MANAGER', null, '0', '', '', '2016-06-14 22:32:04');
INSERT INTO `grading` VALUES ('7', 'D', 'D1', 'SUPERVISOR/ ASSISTANT MANAGER', null, '0', '', '', '2016-06-14 22:32:06');
INSERT INTO `grading` VALUES ('8', 'D', 'D2', 'ASSISTANT SUPERVISOR', null, '0', '', '', '2016-06-14 22:32:07');
INSERT INTO `grading` VALUES ('9', 'E', 'E1', 'SENIOR STAFF', null, '0', '', '', '2016-06-14 22:32:10');
INSERT INTO `grading` VALUES ('10', 'E', 'E2', 'STAFF', null, '0', '', '', '2016-06-14 22:32:11');
INSERT INTO `grading` VALUES ('11', 'E', 'E3', 'JUNIOR STAFF', null, '0', '', '', '2016-06-14 22:32:13');
INSERT INTO `grading` VALUES ('12', 'F', 'F1', 'SENIOR STAFF ASSISTANT', null, '0', '', '', '2016-06-14 22:32:14');
INSERT INTO `grading` VALUES ('15', 'F', 'F2', 'JUNIOR STAFF ASSISTANT', '', '0', 'indri@lukison.com', 'none', '2016-06-14 22:32:16');
INSERT INTO `grading` VALUES ('16', 'G', 'G1', 'TUKANG SENIOR', null, '0', 'none', 'none', '2016-06-14 22:32:17');
INSERT INTO `grading` VALUES ('17', 'G', 'G2', 'TUKANG  ', null, '0', 'none', 'none', '2016-06-14 22:32:19');
INSERT INTO `grading` VALUES ('18', 'G', 'G3', 'TUKANG YUNIOR', null, '0', 'none', 'none', '2016-06-14 22:32:20');
INSERT INTO `grading` VALUES ('19', 'G', 'G4', 'HELPER SENIOR', null, '0', 'none', 'none', '2016-06-14 22:32:21');
INSERT INTO `grading` VALUES ('20', 'G', 'G5', 'HELPER YUNIOR', null, '0', 'none', 'none', '2016-06-14 22:32:25');
INSERT INTO `grading` VALUES ('25', 'D', 'D3', 'test', null, '0', 'none', 'none', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `holiday`
-- ----------------------------
DROP TABLE IF EXISTS `holiday`;
CREATE TABLE `holiday` (
  `LBR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN` varchar(4) DEFAULT NULL,
  `LBR_SDATE` date DEFAULT NULL,
  `LBR_EDATE` date DEFAULT NULL,
  `LBR_NM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`LBR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of holiday
-- ----------------------------
INSERT INTO `holiday` VALUES ('1', '2014', '2014-12-25', '2014-12-25', 'HARI RAYA NATAL ');
INSERT INTO `holiday` VALUES ('2', '2015', '2015-01-01', '2015-01-01', 'TAHUN BARU 2015');
INSERT INTO `holiday` VALUES ('3', '2015', '2015-03-22', '2015-03-22', 'Nyepi');

-- ----------------------------
-- Table structure for `ijin_detail`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_detail`;
CREATE TABLE `ijin_detail` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `CAB_ID` varchar(5) DEFAULT NULL,
  `DEP_ID` bigint(20) DEFAULT NULL,
  `IJN_SDATE` datetime DEFAULT NULL,
  `IJN_EDATE` datetime DEFAULT NULL,
  `IJN_ID` int(11) NOT NULL,
  `IJN_NOTE` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_detail
-- ----------------------------
INSERT INTO `ijin_detail` VALUES ('1', '4.1215.0001', '4', '1', '2016-06-25 01:05:33', '2016-06-25 01:05:33', '1', 'test111221');
INSERT INTO `ijin_detail` VALUES ('2', '1.1215.0002', '1', '1', '2016-06-02 12:45:49', '2016-06-23 02:45:49', '2', 'Bandung');
INSERT INTO `ijin_detail` VALUES ('3', '5.1215.0004', '5', '1', '2016-06-16 12:05:50', '2016-06-25 06:45:50', '3', 'kaka');
INSERT INTO `ijin_detail` VALUES ('4', '3.1215.0002', '3', '1', '2016-06-25 12:00:04', '2016-06-26 12:00:04', '4', 'anak\r\n');
INSERT INTO `ijin_detail` VALUES ('5', '2.1215.0001', '2', '1', '2016-06-25 02:10:52', '2016-06-25 02:10:52', '1', 'aa');
INSERT INTO `ijin_detail` VALUES ('6', '1.1215.0006', '1', '1', '2016-06-25 02:10:43', '2016-06-25 03:25:43', '6', 'as');
INSERT INTO `ijin_detail` VALUES ('7', '1.1215.0003', '1', '1', '2016-06-28 01:15:54', '2016-06-29 01:05:54', '1', 'ok test');
INSERT INTO `ijin_detail` VALUES ('8', '1.1215.0001', '1', '1', '2016-07-01 01:40:14', '2016-07-11 01:40:14', '2', 'ok1');
INSERT INTO `ijin_detail` VALUES ('9', '2.1215.0001', '2', '2', '2016-07-14 11:05:46', '2016-07-14 11:05:46', '1', 'asd');

-- ----------------------------
-- Table structure for `ijin_header`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_header`;
CREATE TABLE `ijin_header` (
  `IJN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IIJN_NM` varchar(100) DEFAULT NULL,
  `IJIN_KET` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IJN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_header
-- ----------------------------
INSERT INTO `ijin_header` VALUES ('0', 'NORMAL', 'HITUNG NORMAL (PAGI)');
INSERT INTO `ijin_header` VALUES ('1', 'LEMBUR', 'HITUNG LEMBUR');
INSERT INTO `ijin_header` VALUES ('2', 'OFF', 'LIBUR  (Dianggap tidak Masuk )');
INSERT INTO `ijin_header` VALUES ('3', 'ALFA', 'ALFA   (Dianggap Tidak Masuk )');
INSERT INTO `ijin_header` VALUES ('4', 'SAKIT', 'SAKIT, (Dianggap Masuk )');
INSERT INTO `ijin_header` VALUES ('5', 'LK', 'KELUAR KOTA (Dianggap tidak Masuk )');
INSERT INTO `ijin_header` VALUES ('6', 'IJIN', 'IJIN  (Dianggap tidak Masuk )');

-- ----------------------------
-- Table structure for `ijin_header_copy`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_header_copy`;
CREATE TABLE `ijin_header_copy` (
  `IJN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IIJN_NM` varchar(100) DEFAULT NULL,
  `IJIN_KET` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IJN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_header_copy
-- ----------------------------
INSERT INTO `ijin_header_copy` VALUES ('1', 'SAKIT', 'Ijin Sakit');
INSERT INTO `ijin_header_copy` VALUES ('2', 'DINAS', 'Keluar Kota');
INSERT INTO `ijin_header_copy` VALUES ('3', 'PERBIKAHAN', null);
INSERT INTO `ijin_header_copy` VALUES ('4', 'MELAHIRKAN', null);
INSERT INTO `ijin_header_copy` VALUES ('5', 'HEALTH CHECK UP', null);
INSERT INTO `ijin_header_copy` VALUES ('6', 'SCHOOL', null);
INSERT INTO `ijin_header_copy` VALUES ('7', 'FUNERAL', null);
INSERT INTO `ijin_header_copy` VALUES ('8', 'MEETING', null);
INSERT INTO `ijin_header_copy` VALUES ('9', 'EXCHANGE  PROG', null);
INSERT INTO `ijin_header_copy` VALUES ('10', 'URUSAN KELUARGA', null);
INSERT INTO `ijin_header_copy` VALUES ('11', 'CUTI', null);
INSERT INTO `ijin_header_copy` VALUES ('12', 'LAIN-LAIN', 'lain-Lain other exceptions');

-- ----------------------------
-- Table structure for `jabatanx`
-- ----------------------------
DROP TABLE IF EXISTS `jabatanx`;
CREATE TABLE `jabatanx` (
  `JAB_ID` int(11) NOT NULL COMMENT '0',
  `JAB_NM` varchar(30) NOT NULL,
  `USER` varchar(50) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`JAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatanx
-- ----------------------------
INSERT INTO `jabatanx` VALUES ('1', 'GENERAL MANAGER', null, null);
INSERT INTO `jabatanx` VALUES ('2', 'MANAGER', 'root', '0000-00-00 00:00:00');
INSERT INTO `jabatanx` VALUES ('3', 'SUPERVISOR', null, null);
INSERT INTO `jabatanx` VALUES ('4', 'STAFF', null, null);
INSERT INTO `jabatanx` VALUES ('5', 'GROUP HEAD', null, null);
INSERT INTO `jabatanx` VALUES ('6', 'HEAD', null, null);
INSERT INTO `jabatanx` VALUES ('7', 'BRANCH MANAGER', null, '0000-00-00 00:00:00');
INSERT INTO `jabatanx` VALUES ('8', 'HARIAN', null, null);

-- ----------------------------
-- Table structure for `karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `KAR_ID` varchar(15) NOT NULL,
  `KAR_NM` varchar(50) DEFAULT NULL,
  `DEP_ID` int(11) DEFAULT NULL,
  `GF_ID` varchar(10) DEFAULT NULL COMMENT 'GROUP FUNCTION',
  `JOBGRADE_ID` varchar(10) DEFAULT NULL COMMENT 'GREADING',
  `CAB_ID` varchar(5) DEFAULT NULL,
  `CORP_ID` varchar(5) DEFAULT NULL,
  `GRP_ID` int(11) DEFAULT NULL,
  `LVL_ID` int(11) DEFAULT NULL,
  `JAB_ID` int(11) DEFAULT NULL,
  `KAR_STS` int(11) DEFAULT '0' COMMENT 'STATUS KARYAWAN tetap, kontrak dll\r\n',
  `KAR_KTP` varchar(18) DEFAULT NULL,
  `KAR_ALMT` longtext,
  `KAR_TLP` varchar(18) DEFAULT NULL,
  `KAR_HP` varchar(18) DEFAULT NULL,
  `KAR_TGL` datetime DEFAULT NULL,
  `KAR_AGM` varchar(15) DEFAULT NULL,
  `KAR_STSK` varchar(15) DEFAULT NULL,
  `KAR_TGLM` datetime DEFAULT '0000-00-00 00:00:00',
  `KAR_TGLK` datetime DEFAULT NULL,
  `KAR_STSP` varchar(15) DEFAULT NULL,
  `KAR_MAILP` varchar(50) DEFAULT NULL,
  `KAR_MAILK` varchar(50) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `KAR_KOTA` varchar(50) DEFAULT NULL,
  `KAR_TMP_LAHIR` varchar(50) DEFAULT NULL,
  `KAR_TGL_LAHIR` date DEFAULT NULL,
  `KAR_JK` varchar(20) DEFAULT NULL,
  `KAR_DARAH` varchar(3) DEFAULT NULL,
  `KAR_PEN` varchar(50) DEFAULT NULL,
  `BANK` varchar(50) DEFAULT NULL,
  `NO_REK` varchar(50) DEFAULT NULL,
  `NPWP` varchar(50) DEFAULT NULL,
  `NO_JAMSOS` varchar(50) DEFAULT NULL,
  `JAMSOS` varchar(50) DEFAULT NULL,
  `PTKP_NM` varchar(3) DEFAULT NULL,
  `STT_ID` varchar(3) DEFAULT NULL,
  `JML_ANAK` int(11) DEFAULT NULL,
  `NO_ASR` varchar(50) DEFAULT NULL,
  `ASR_ID` varchar(20) DEFAULT NULL,
  `STT_OT_DPN` smallint(6) DEFAULT NULL,
  `PEN_ID` int(11) DEFAULT '0',
  `KAR_KET` text,
  `AGAMA_ID` int(11) DEFAULT NULL,
  `IMG64` longtext,
  `EMP_IMG` varchar(100) DEFAULT 'default.jpg',
  `EMP_STS` smallint(6) DEFAULT '1',
  PRIMARY KEY (`KAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('1.1215.0001', 'tesr', null, null, null, '1', null, null, null, null, '0', null, null, null, null, null, null, null, '2017-09-28 00:00:00', null, null, null, null, '2017-09-28 15:38:03', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, '', 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('2.1215.0001', 'ddd', null, null, null, '2', null, null, null, null, '0', null, null, null, null, null, null, null, '2017-09-28 00:00:00', null, null, null, null, '2017-09-28 15:39:03', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, '', 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0001', ' TEDDY', '1', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0002', 'BENO ADITYA', '2', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0003', 'AIRIL USMAN', '2', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0004', 'DEDE ANDRI', '2', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0005', ' SOPIAN', '3', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0006', ' SAHRUDIN', '3', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0007', ' SAMAN', '3', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0008', ' ANDA', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0009', 'NURDIN', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0010', 'JARIMAN', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0011', 'DEDI MUHTADI', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0012', 'UCU SAMSUDIN', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0013', 'IKHWANUDIN', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0014', 'SUDAR', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0015', 'SARDI', '4', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0016', ' ENDAN SUWANDI', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0017', 'MIRZA SUBUR', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0018', ' MAJENI', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0019', ' DEDE KARMA', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0020', 'YANDI', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0021', 'ARI', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0022', 'NANDAR', '5', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0023', ' HASAN BASRI', '6', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0024', ' UMET', '6', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0025', ' SOFIUDIN', '6', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0026', ' SEPTIAN', '6', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0027', ' UBAIDILAH', '6', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0028', ' HASANUDIN', '7', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0029', ' ABDUL KHOLIK', '7', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0030', ' SETIA PRATAMA', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0031', ' JULI SURYONO', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0032', ' REKI', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0033', ' M SYAMSUL BASRI', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0034', ' IWAN SETIAWAN', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0035', 'ANDI IRAWAN', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0036', 'MUHAMAD ENUR', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0037', 'SYAHRONI', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0038', 'WAWAN', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0039', 'AGUNG', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0040', 'AHMAD FATIKHIN', '8', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0041', ' MUHAMAD SUGIAR', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0042', ' SUHAMAN', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0043', ' A.ABDUL', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0044', ' RISKI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0045', ' BEKI BASUKI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0046', ' DEDI  SUPRIYADI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0047', ' TONI NOVIAN', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0048', ' SAEFUL AMRI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0049', ' DEDI ISKANDAR', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0050', ' JUNED', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0051', 'MAD ALI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0052', 'ATMA', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0053', 'DENI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0054', 'HADRI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0055', 'AGUS FAUZI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0056', 'SYAIFUL', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0057', 'MULYADI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0058', 'ADAY', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0059', 'ASMAT', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0060', 'ANGGA', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0061', 'RAUL', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0062', ' HASAN', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0063', 'ANWAR FERDYANSYAH', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0064', 'HENDRIYANSAH', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0065', 'ROSMANI', '9', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0066', ' MULYONO', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0067', ' AGUS SUPANTO', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0068', 'GARIS ATMAJAYA', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0069', ' TEGUH  EFRIYANTO', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0070', ' SAHRUL ANWAR', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0071', 'NURKHOLIS', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0072', ' FADULAH', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0073', 'APUNG', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0074', ' DERI DWI SAPUTRA', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0075', 'TRIATMOKO', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0076', ' HENDRA HERDIANSYAH', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0077', 'NURALAMIN', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0078', 'M. SIDIK', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0079', 'REZA', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0080', 'Aziz', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0081', ' NASIHIN', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0082', 'GUNAWAN', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0083', 'DENY', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0084', 'AMIN P', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0085', 'IVAN ADI PRAYOGA', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0086', 'HARI KURNIAWAN', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0087', 'YOGI', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0088', 'MARPENDI', '10', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0089', 'M SOLEH', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0090', ' RIKY', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0091', ' NURUL', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0092', 'AMIR MA\'RIP', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0093', 'CUCU', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0094', 'AJAHRUDIN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0095', 'AJO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0096', 'SOLEH', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0097', ' EKO ISMANTO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0098', ' IMAM', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0099', ' SENO SASONGKO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0100', ' SETIYO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0101', ' BUDI NURYANTO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0102', ' USMANUDIN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0103', ' ANGKI WIJAYA', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0104', ' RERE SADEWA', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0105', ' SUGENG ', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0106', ' SARNO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0107', 'LUTFI', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0108', ' SUBIYANTONO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0109', 'GINUNG', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0110', 'BASIRUN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0111', 'AMJA', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0112', 'ARIANTO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0113', 'ADE HENDRIK', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0114', 'IKHSAN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0115', 'GIMAN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0116', 'AHMAT ZAKIRMAN', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0117', 'FUAT', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0118', 'TRI HARIANTO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0119', 'DIDIK', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0120', 'EKO P', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0121', 'AGUNG', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0122', 'MUKTI', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0123', 'FRENDY', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0124', 'SUMAR', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0125', 'EKO PRASETYO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0126', 'PRIYANTO', '11', null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '0000-00-00 00:00:00', null, null, null, null, '2017-09-25 00:11:15', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0127', 'Suryadi', null, null, null, '3', null, '2', null, null, '0', null, null, null, null, null, null, null, '2017-09-28 00:00:00', null, null, null, null, '2017-09-28 15:37:12', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, '', 'default.jpg', '1');
INSERT INTO `karyawan` VALUES ('3.0915.0128', 'NURSHOIM', null, null, null, '3', null, null, null, null, '0', null, null, null, null, null, null, null, '2017-10-02 00:00:00', null, null, null, null, '2017-10-02 20:21:08', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, '', 'default.jpg', '1');

-- ----------------------------
-- Table structure for `kar_finger`
-- ----------------------------
DROP TABLE IF EXISTS `kar_finger`;
CREATE TABLE `kar_finger` (
  `NO_URUT` bigint(20) NOT NULL AUTO_INCREMENT,
  `TerminalID` varchar(100) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `FingerPrintID` varchar(100) DEFAULT NULL,
  `FingerTmpl` longtext,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`NO_URUT`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kar_finger
-- ----------------------------
INSERT INTO `kar_finger` VALUES ('2', '3454653270019', '3.0915.0001', '5628', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('3', '3454653270019', '3.0915.0002', '5633', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('4', '3454653270019', '3.0915.0003', '5634', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('5', '3454653270019', '3.0915.0004', '5636', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('6', '3454653270019', '3.0915.0005', '5302', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('7', '3454653270019', '3.0915.0006', '5504', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('8', '3454653270019', '3.0915.0007', '5505', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('9', '3454653270019', '3.0915.0008', '2023', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('10', '3454653270019', '3.0915.0009', '2028', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('11', '3454653270019', '3.0915.0010', '2030', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('12', '3454653270019', '3.0915.0011', '2031', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('13', '3454653270019', '3.0915.0012', '2032', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('14', '3454653270019', '3.0915.0013', '2033', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('15', '3454653270019', '3.0915.0014', '2034', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('16', '3454653270019', '3.0915.0015', '2035', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('17', '3454653270019', '3.0915.0016', '5604', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('18', '3454653270019', '3.0915.0017', '5059', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('19', '3454653270019', '3.0915.0018', '5503', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('20', '3454653270019', '3.0915.0019', '5506', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('21', '3454653270019', '3.0915.0020', '5509', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('22', '3454653270019', '3.0915.0021', '5684', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('23', '3454653270019', '3.0915.0022', '5689', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('24', '3454653270019', '3.0915.0023', '5107', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('25', '3454653270019', '3.0915.0024', '5114', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('26', '3454653270019', '3.0915.0025', '5115', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('27', '3454653270019', '3.0915.0026', '5118', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('28', '3454653270019', '3.0915.0027', '5701', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('29', '3454653270019', '3.0915.0028', '5601', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('30', '3454653270019', '3.0915.0029', '5603', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('31', '3454653270019', '3.0915.0030', '1259', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('32', '3454653270019', '3.0915.0031', '4036', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('33', '3454653270019', '3.0915.0032', '4037', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('34', '3454653270019', '3.0915.0033', '4038', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('35', '3454653270019', '3.0915.0034', '4046', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('36', '3454653270019', '3.0915.0035', '5741', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('37', '3454653270019', '3.0915.0036', '5747', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('38', '3454653270019', '3.0915.0037', '5765', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('39', '3454653270019', '3.0915.0038', '5766', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('40', '3454653270019', '3.0915.0039', '5767', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('41', '3454653270019', '3.0915.0040', '5769', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('42', '3454653270019', '3.0915.0041', '3012', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('43', '3454653270019', '3.0915.0042', '3015', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('44', '3454653270019', '3.0915.0043', '3025', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('45', '3454653270019', '3.0915.0044', '3026', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('46', '3454653270019', '3.0915.0045', '3029', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('47', '3454653270019', '3.0915.0046', '3030', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('48', '3454653270019', '3.0915.0047', '3031', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('49', '3454653270019', '3.0915.0048', '3032', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('50', '3454653270019', '3.0915.0049', '3033', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('51', '3454653270019', '3.0915.0050', '3038', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('52', '3454653270019', '3.0915.0051', '4057', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('53', '3454653270019', '3.0915.0052', '4058', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('54', '3454653270019', '3.0915.0053', '5710', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('55', '3454653270019', '3.0915.0054', '5716', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('56', '3454653270019', '3.0915.0055', '5770', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('57', '3454653270019', '3.0915.0056', '5772', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('58', '3454653270019', '3.0915.0057', '5774', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('59', '3454653270019', '3.0915.0058', '5776', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('60', '3454653270019', '3.0915.0059', '5786', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('61', '3454653270019', '3.0915.0060', '5787', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('62', '3454653270019', '3.0915.0061', '5788', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('63', '3454653270019', '3.0915.0062', '5789', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('64', '3454653270019', '3.0915.0063', '5790', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('65', '3454653270019', '3.0915.0064', '5791', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('66', '3454653270019', '3.0915.0065', '5792', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('67', '3454653270019', '3.0915.0066', '7038', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('68', '3454653270019', '3.0915.0067', '7040', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('69', '3454653270019', '3.0915.0068', '7043', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('70', '3454653270019', '3.0915.0069', '7046', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('71', '3454653270019', '3.0915.0070', '7049', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('72', '3454653270019', '3.0915.0071', '8000', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('73', '3454653270019', '3.0915.0072', '1253', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('74', '3454653270019', '3.0915.0073', '1263', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('75', '3454653270019', '3.0915.0074', '5303', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('76', '3454653270019', '3.0915.0075', '5631', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('77', '3454653270019', '3.0915.0076', '9018', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('78', '3454653270019', '3.0915.0077', '9025', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('79', '3454653270019', '3.0915.0078', '9026', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('80', '3454653270019', '3.0915.0079', '9030', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('81', '3454653270019', '3.0915.0080', '9035', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('82', '3454653270019', '3.0915.0081', '9036', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('83', '3454653270019', '3.0915.0082', '9037', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('84', '3454653270019', '3.0915.0083', '9038', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('85', '3454653270019', '3.0915.0084', '9039', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('86', '3454653270019', '3.0915.0085', '9041', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('87', '3454653270019', '3.0915.0086', '9042', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('88', '3454653270019', '3.0915.0087', '9043', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('89', '3454653270019', '3.0915.0088', '9044', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('90', '3454653270019', '3.0915.0089', '9046', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('91', '3454653270019', '3.0915.0090', '9047', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('92', '3454653270019', '3.0915.0091', '9048', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('93', '3454653270019', '3.0915.0092', '9049', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('94', '3454653270019', '3.0915.0093', '9050', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('95', '3454653270019', '3.0915.0094', '90', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('96', '3454653270019', '3.0915.0095', '9052', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('97', '3454653270019', '3.0915.0096', '1063', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('98', '3454653270019', '3.0915.0097', '5668', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('99', '3454653270019', '3.0915.0098', '8006', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('100', '3454653270019', '3.0915.0099', '8016', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('101', '3454653270019', '3.0915.0100', '8032', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('102', '3454653270019', '3.0915.0101', '8033', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('103', '3454653270019', '3.0915.0102', '8034', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('104', '3454653270019', '3.0915.0103', '8041', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('105', '3454653270019', '3.0915.0104', '8046', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('106', '3454653270019', '3.0915.0105', '8052', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('107', '3454653270019', '3.0915.0106', '8055', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('108', '3454653270019', '3.0915.0107', '8059', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('109', '3454653270019', '3.0915.0108', '8060', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('110', '3454653270019', '3.0915.0109', '8063', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('111', '3454653270019', '3.0915.0110', '8670', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('112', '3454653270019', '3.0915.0111', '8070', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('113', '3454653270019', '3.0915.0112', '8071', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('114', '3454653270019', '3.0915.0113', '8074', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('115', '3454653270019', '3.0915.0114', '8076', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('116', '3454653270019', '3.0915.0115', '8077', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('117', '3454653270019', '3.0915.0116', '8079', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('118', '3454653270019', '3.0915.0117', '8080', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('119', '3454653270019', '3.0915.0118', '8081', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('120', '3454653270019', '3.0915.0119', '8082', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('121', '3454653270019', '3.0915.0120', '8083', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('122', '3454653270019', '3.0915.0121', '8084', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('123', '3454653270019', '3.0915.0122', '8085', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('124', '3454653270019', '3.0915.0123', '8283', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('125', '3454653270019', '3.0915.0124', '8284', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('126', '3454653270019', '3.0915.0125', '8285', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('127', '3454653270019', '3.0915.0126', '8286', null, '2017-09-15 19:26:22');
INSERT INTO `kar_finger` VALUES ('128', '3454653270019', '3.0915.0128', '8287', null, '2017-10-02 20:21:37');

-- ----------------------------
-- Table structure for `kar_fingerx`
-- ----------------------------
DROP TABLE IF EXISTS `kar_fingerx`;
CREATE TABLE `kar_fingerx` (
  `NO_URUT` bigint(20) NOT NULL AUTO_INCREMENT,
  `TerminalID` varchar(100) DEFAULT NULL,
  `KAR_ID` varchar(15) DEFAULT NULL,
  `FingerPrintID` varchar(100) DEFAULT NULL,
  `FingerTmpl` longtext,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`NO_URUT`)
) ENGINE=InnoDB AUTO_INCREMENT=764 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kar_fingerx
-- ----------------------------
INSERT INTO `kar_fingerx` VALUES ('390', '6421150400333', '1.1215.5680', '5680', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('391', '6421150400333', '1.1215.1232', '1232', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('392', '6421150400333', '1.1215.1051', '1051', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('393', '6421150400333', '1.1215.1018', '1018', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('394', '6421150400333', '1.1215.1072', '1072', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('395', '6421150400333', '1.1215.1028', '1028', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('396', '6421150400333', '1.1215.1038', '1038', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('397', '6421150400333', '1.1215.1030', '1030', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('398', '6421150400333', '1.1215.1140', '1140', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('399', '6421150400333', '1.1215.1195', '1195', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('400', '6421150400333', '1.1215.1021', '1021', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('401', '6421150400333', '1.1215.1001', '1001', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('402', '6421150400333', '1.1215.1210', '1210', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('403', '6421150400333', '1.1215.1050', '1050', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('404', '6421150400333', '1.1215.1029', '1029', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('405', '6421150400333', '1.1215.2633', '2633', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('406', '6421150400333', '1.1215.2634', '2634', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('407', '6421150400333', '1.1215.134', '134', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('408', '6421150400333', '1.1215.1076', '1076', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('409', '6421150400333', '1.1215.3007', '3007', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('410', '6421150400333', '1.1215.3005', '3005', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('411', '6421150400333', '1.1215.3016', '3016', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('412', '6421150400333', '1.1215.116', '116', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('413', '6421150400333', '1.1215.1197', '1197', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('414', '6421150400333', '1.1215.5636', '5636', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('415', '6421150400333', '1.1215.1055', '1055', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('416', '6421150400333', '1.1215.1116', '1116', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('417', '6421150400333', '1.1215.1144', '1144', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('418', '6421150400333', '1.1215.1229', '1229', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('419', '6421150400333', '1.1215.1057', '1057', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('420', '6421150400333', '1.1215.5650', '5650', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('421', '6421150400333', '1.1215.1261', '1261', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('422', '6421150400333', '1.1215.1234', '1234', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('423', '6421150400333', '1.1215.1004', '1004', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('424', '6421150400333', '1.1215.1054', '1054', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('425', '6421150400333', '1.1215.240', '240', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('426', '6421150400333', '1.1215.1019', '1019', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('427', '6421150400333', '1.1215.1202', '1202', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('428', '6421150400333', '1.1215.5671', '5671', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('429', '6421150400333', '1.1215.1165', '1165', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('430', '6421150400333', '1.1215.1085', '1085', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('431', '6421150400333', '1.1215.1127', '1127', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('432', '6421150400333', '1.1215.1071', '1071', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('433', '6421150400333', '1.1215.1188', '1188', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('434', '6421150400333', '1.1215.1193', '1193', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('435', '6421150400333', '1.1215.1180', '1180', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('436', '6421150400333', '1.1215.1173', '1173', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('437', '6421150400333', '1.1215.1196', '1196', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('438', '6421150400333', '1.1215.5661', '5661', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('439', '6421150400333', '1.1215.5662', '5662', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('440', '6421150400333', '1.1215.5682', '5682', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('441', '6421150400333', '1.1215.1219', '1219', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('442', '6421150400333', '1.1215.1233', '1233', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('443', '6421150400333', '1.1215.1047', '1047', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('444', '6421150400333', '1.1215.1157', '1157', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('445', '6421150400333', '1.1215.1244', '1244', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('446', '6421150400333', '1.1215.1017', '1017', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('447', '6421150400333', '1.1215.1227', '1227', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('448', '6421150400333', '1.1215.1177', '1177', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('449', '6421150400333', '1.1215.2626', '2626', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('450', '6421150400333', '1.1215.5654', '5654', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('451', '6421150400333', '1.1215.5683', '5683', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('452', '6421150400333', '1.1215.5619', '5619', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('453', '6421150400333', '1.1215.1044', '1044', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('454', '6421150400333', '1.1215.1053', '1053', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('455', '6421150400333', '1.1215.5618', '5618', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('456', '6421150400333', '1.1215.5678', '5678', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('457', '6421150400333', '1.1215.1235', '1235', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('458', '6421150400333', '1.1215.1164', '1164', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('459', '6421150400333', '1.1215.1125', '1125', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('460', '6421150400333', '1.1215.1148', '1148', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('461', '6421150400333', '1.1215.5635', '5635', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('462', '6421150400333', '1.1215.1183', '1183', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('463', '6421150400333', '1.1215.5614', '5614', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('464', '6421150400333', '1.1215.2629', '2629', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('465', '6421150400333', '1.1215.4046', '4046', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('466', '6421150400333', '1.1215.1026', '1026', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('467', '6421150400333', '1.1215.2632', '2632', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('468', '6421150400333', '1.1215.5634', '5634', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('469', '6421150400333', '1.1215.5010', '5010', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('470', '6421150400333', '1.1215.1246', '1246', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('471', '6421150400333', '1.1215.1228', '1228', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('472', '6421150400333', '1.1215.2005', '2005', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('473', '6421150400333', '1.1215.2012', '2012', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('474', '6421150400333', '1.1215.2011', '2011', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('475', '6421150400333', '1.1215.2018', '2018', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('476', '6421150400333', '1.1215.2020', '2020', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('477', '6421150400333', '1.1215.2022', '2022', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('478', '6421150400333', '1.1215.1245', '1245', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('479', '6421150400333', '1.1215.1103', '1103', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('480', '6421150400333', '1.1215.1107', '1107', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('481', '6421150400333', '1.1215.5503', '5503', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('482', '6421150400333', '1.1215.5504', '5504', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('483', '6421150400333', '1.1215.5505', '5505', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('484', '6421150400333', '1.1215.5506', '5506', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('485', '6421150400333', '1.1215.5302', '5302', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('486', '6421150400333', '1.1215.5667', '5667', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('487', '6421150400333', '1.1215.5638', '5638', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('488', '6421150400333', '1.1215.5306', '5306', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('489', '6421150400333', '1.1215.5303', '5303', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('490', '6421150400333', '1.1215.5604', '5604', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('491', '6421150400333', '1.1215.5647', '5647', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('492', '6421150400333', '1.1215.5603', '5603', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('493', '6421150400333', '1.1215.5107', '5107', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('494', '6421150400333', '1.1215.5114', '5114', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('495', '6421150400333', '1.1215.1109', '1109', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('496', '6421150400333', '1.1215.5118', '5118', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('497', '6421150400333', '1.1215.5067', '5067', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('498', '6421150400333', '1.1215.8006', '8006', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('499', '6421150400333', '1.1215.8034', '8034', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('500', '6421150400333', '1.1215.8041', '8041', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('501', '6421150400333', '1.1215.8045', '8045', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('502', '6421150400333', '1.1215.8046', '8046', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('503', '6421150400333', '1.1215.8047', '8047', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('504', '6421150400333', '1.1215.7053', '7053', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('505', '6421150400333', '1.1215.8051', '8051', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('506', '6421150400333', '1.1215.4056', '4056', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('507', '6421150400333', '1.1215.1062', '1062', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('508', '6421150400333', '1.1215.1063', '1063', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('509', '6421150400333', '1.1215.5622', '5622', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('510', '6421150400333', '1.1215.8055', '8055', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('511', '6421150400333', '1.1215.8057', '8057', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('512', '6421150400333', '1.1215.8058', '8058', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('513', '6421150400333', '1.1215.8060', '8060', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('514', '6421150400333', '1.1215.5668', '5668', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('515', '6421150400333', '1.1215.3012', '3012', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('516', '6421150400333', '1.1215.3014', '3014', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('517', '6421150400333', '1.1215.3015', '3015', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('518', '6421150400333', '1.1215.3025', '3025', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('519', '6421150400333', '1.1215.3026', '3026', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('520', '6421150400333', '1.1215.3029', '3029', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('521', '6421150400333', '1.1215.3030', '3030', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('522', '6421150400333', '1.1215.3031', '3031', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('523', '6421150400333', '1.1215.3032', '3032', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('524', '6421150400333', '1.1215.3033', '3033', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('525', '6421150400333', '1.1215.3038', '3038', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('526', '6421150400333', '1.1215.1251', '1251', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('527', '6421150400333', '1.1215.4057', '4057', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('528', '6421150400333', '1.1215.4058', '4058', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('529', '6421150400333', '1.1215.4059', '4059', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('530', '6421150400333', '1.1215.5620', '5620', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('531', '6421150400333', '1.1215.5624', '5624', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('532', '6421150400333', '1.1215.5644', '5644', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('533', '6421150400333', '1.1215.5651', '5651', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('534', '6421150400333', '1.1215.7013', '7013', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('535', '6421150400333', '1.1215.4039', '4039', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('536', '6421150400333', '1.1215.7038', '7038', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('537', '6421150400333', '1.1215.7040', '7040', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('538', '6421150400333', '1.1215.7041', '7041', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('539', '6421150400333', '1.1215.7043', '7043', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('540', '6421150400333', '1.1215.7046', '7046', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('541', '6421150400333', '1.1215.7047', '7047', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('542', '6421150400333', '1.1215.7049', '7049', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('543', '6421150400333', '1.1215.1249', '1249', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('544', '6421150400333', '1.1215.1039', '1039', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('545', '6421150400333', '1.1215.1049', '1049', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('546', '6421150400333', '1.1215.1052', '1052', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('547', '6421150400333', '1.1215.1253', '1253', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('548', '6421150400333', '1.1215.1263', '1263', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('549', '6421150400333', '1.1215.1265', '1265', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('550', '6421150400333', '1.1215.1266', '1266', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('551', '6421150400333', '1.1215.1264', '1264', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('552', '6421150400333', '1.1215.5762', '5762', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('553', '6421150400333', '1.1215.4031', '4031', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('554', '6421150400333', '1.1215.4035', '4035', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('555', '6421150400333', '1.1215.4036', '4036', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('556', '6421150400333', '1.1215.4037', '4037', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('557', '6421150400333', '1.1215.4038', '4038', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('558', '6421150400333', '1.1215.5631', '5631', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('559', '6421150400333', '1.1215.5627', '5627', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('560', '6421150400333', '1.1215.4047', '4047', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('561', '6421150400333', '1.1215.1058', '1058', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('562', '6421150400333', '1.1215.1259', '1259', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('563', '6421150400333', '1.1215.8024', '8024', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('564', '6421150400333', '1.1215.4040', '4040', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('565', '6421150400333', '1.1215.5649', '5649', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('566', '6421150400333', '1.1215.5646', '5646', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('567', '6421150400333', '1.1215.5648', '5648', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('568', '6421150400333', '1.1215.5643', '5643', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('569', '2268922110030', '2.1215.1003', '1003', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('570', '2268922110030', '2.1215.1001', '1001', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('571', '2268922110030', '2.1215.1142', '1142', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('572', '2268922110030', '2.1215.1100', '1100', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('573', '2268922110030', '2.1215.1034', '1034', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('574', '2268922110030', '2.1215.1119', '1119', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('575', '2268922110030', '2.1215.1067', '1067', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('576', '2268922110030', '2.1215.1064', '1064', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('577', '2268922110030', '2.1215.1164', '1164', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('578', '2268922110030', '2.1215.1103', '1103', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('579', '2268922110030', '2.1215.1035', '1035', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('580', '2268922110030', '2.1215.1036', '1036', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('581', '2268922110030', '2.1215.1038', '1038', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('582', '2268922110030', '2.1215.1039', '1039', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('583', '2268922110030', '2.1215.1040', '1040', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('584', '2268922110030', '2.1215.1041', '1041', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('585', '2268922110030', '2.1215.1042', '1042', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('586', '2268922110030', '2.1215.1043', '1043', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('587', '2268922110030', '2.1215.1044', '1044', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('588', '2268922110030', '2.1215.1049', '1049', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('589', '2268922110030', '2.1215.1069', '1069', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('590', '2268922110030', '2.1215.1125', '1125', null, '2016-02-17 23:28:28');
INSERT INTO `kar_fingerx` VALUES ('591', '2268922110030', '2.1215.1126', '1126', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('592', '2268922110030', '2.1215.1148', '1148', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('593', '2268922110030', '2.1215.1150', '1150', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('594', '2268922110030', '2.1215.1149', '1149', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('595', '2268922110030', '2.1215.1151', '1151', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('596', '2268922110030', '2.1215.1162', '1162', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('597', '2268922110030', '2.1215.1025', '1025', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('598', '2268922110030', '2.1215.1028', '1028', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('599', '2268922110030', '2.1215.1029', '1029', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('600', '2268922110030', '2.1215.1027', '1027', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('601', '2268922110030', '2.1215.1031', '1031', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('602', '2268922110030', '2.1215.1032', '1032', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('603', '2268922110030', '2.1215.1030', '1030', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('604', '2268922110030', '2.1215.1026', '1026', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('605', '2268922110030', '2.1215.1006', '1006', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('606', '2268922110030', '2.1215.1007', '1007', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('607', '2268922110030', '2.1215.1008', '1008', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('608', '2268922110030', '2.1215.1116', '1116', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('609', '2268922110030', '2.1215.1147', '1147', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('610', '2268922110030', '2.1215.1013', '1013', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('611', '2268922110030', '2.1215.1166', '1166', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('612', '2268922110030', '2.1215.1167', '1167', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('613', '2268922110030', '2.1215.1163', '1163', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('614', '2268922110030', '2.1215.1146', '1146', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('615', '2268922110030', '2.1215.1161', '1161', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('616', '2268922110030', '2.1215.1017', '1017', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('617', '2268922110030', '2.1215.1152', '1152', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('618', '2268922110030', '2.1215.1155', '1155', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('619', '2268922110030', '2.1215.1061', '1061', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('620', '2268922110030', '2.1215.1062', '1062', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('621', '2268922110030', '2.1215.1129', '1129', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('622', '2268922110030', '2.1215.1130', '1130', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('623', '3454653270019', '3.1215.0028', '0028', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('624', '3454653270019', '3.1215.0022', '0022', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('625', '3454653270019', '3.1215.0138', '0138', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('626', '3454653270019', '3.1215.0124', '0124', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('627', '3454653270019', '3.1215.0125', '0125', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('628', '3454653270019', '3.1215.0135', '0135', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('629', '3454653270019', '3.1215.0012', '0012', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('630', '3454653270019', '3.1215.0080', '0080', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('631', '3454653270019', '3.1215.0077', '0077', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('632', '3454653270019', '3.1215.0108', '0108', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('633', '3454653270019', '3.1215.0139', '0139', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('634', '3454653270019', '3.1215.0106', '0106', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('635', '3454653270019', '3.1215.0101', '0101', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('636', '3454653270019', '3.1215.0132', '0132', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('637', '3454653270019', '3.1215.0190', '0190', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('638', '3454653270019', '3.1215.0078', '0078', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('639', '3454653270019', '3.1215.0120', '0120', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('640', '3454653270019', '3.1215.0109', '0109', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('641', '3454653270019', '3.1215.0075', '0075', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('642', '3454653270019', '3.1215.0164', '0164', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('643', '3454653270019', '3.1215.0092', '0092', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('644', '3454653270019', '3.1215.0147', '0147', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('645', '3454653270019', '3.1215.0252', '0252', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('646', '3454653270019', '3.1215.0131', '0131', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('647', '3454653270019', '3.1215.0121', '0121', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('648', '3454653270019', '3.1215.0049', '0049', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('649', '3454653270019', '3.1215.0086', '0086', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('650', '3454653270019', '3.1215.0232', '0232', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('651', '3454653270019', '3.1215.0110', '0110', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('652', '3454653270019', '3.1215.0273', '0273', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('653', '3454653270019', '3.1215.0274', '0274', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('654', '3454653270019', '3.1215.0115', '0115', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('655', '3454653270019', '3.1215.0103', '0103', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('656', '3454653270019', '3.1215.0158', '0158', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('657', '3454653270019', '3.1215.0194', '0194', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('658', '3454653270019', '3.1215.0146', '0146', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('659', '3454653270019', '3.1215.0173', '0173', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('660', '3454653270019', '3.1215.0160', '0160', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('661', '3454653270019', '3.1215.0141', '0141', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('662', '3454653270019', '3.1215.0126', '0126', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('663', '3454653270019', '3.1215.0004', '0004', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('664', '3454653270019', '3.1215.0248', '0248', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('665', '3454653270019', '3.1215.0007', '0007', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('666', '3454653270019', '3.1215.0031', '0031', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('667', '3454653270019', '3.1215.0051', '0051', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('668', '3454653270019', '3.1215.0052', '0052', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('669', '3454653270019', '3.1215.0054', '0054', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('670', '3454653270019', '3.1215.0063', '0063', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('671', '3454653270019', '3.1215.0064', '0064', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('672', '3454653270019', '3.1215.0067', '0067', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('673', '3454653270019', '3.1215.0027', '0027', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('674', '3454653270019', '3.1215.0081', '0081', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('675', '3454653270019', '3.1215.0272', '0272', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('676', '3454653270019', '3.1215.0243', '0243', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('677', '3454653270019', '3.1215.0235', '0235', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('678', '3454653270019', '3.1215.0245', '0245', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('679', '3454653270019', '3.1215.0168', '0168', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('680', '3454653270019', '3.1215.0214', '0214', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('681', '3454653270019', '3.1215.0002', '0002', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('682', '3454653270019', '3.1215.0261', '0261', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('683', '3454653270019', '3.1215.0006', '0006', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('684', '3454653270019', '3.1215.0161', '0161', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('685', '3454653270019', '3.1215.0222', '0222', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('686', '3454653270019', '3.1215.0233', '0233', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('687', '3454653270019', '3.1215.102', '102', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('688', '3454653270019', '3.1215.0237', '0237', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('689', '3454653270019', '3.1215.0001', '0001', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('690', '3454653270019', '3.1215.0068', '0068', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('691', '3454653270019', '3.1215.0023', '0023', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('692', '3454653270019', '3.1215.0010', '0010', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('693', '3454653270019', '3.1215.0042', '0042', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('694', '3454653270019', '3.1215.0065', '0065', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('695', '3454653270019', '3.1215.0155', '0155', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('696', '3454653270019', '3.1215.0030', '0030', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('697', '3454653270019', '3.1215.0014', '0014', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('698', '3454653270019', '3.1215.0013', '0013', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('699', '3454653270019', '3.1215.0020', '0020', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('700', '3454653270019', '3.1215.0234', '0234', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('701', '3454653270019', '3.1215.0018', '0018', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('702', '3454653270019', '3.1215.0019', '0019', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('703', '3454653270019', '3.1215.0037', '0037', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('704', '3454653270019', '3.1215.0145', '0145', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('705', '3454653270019', '3.1215.0156', '0156', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('706', '2268922110038', '4.1215.0502', '0502', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('707', '2268922110038', '4.1215.0503', '0503', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('708', '2268922110038', '4.1215.0507', '0507', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('709', '2268922110038', '4.1215.0508', '0508', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('710', '2268922110038', '4.1215.0504', '0504', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('711', '2268922110038', '4.1215.0511', '0511', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('712', '2268922110038', '4.1215.0509', '0509', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('713', '2268922110038', '4.1215.0506', '0506', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('714', '2268922110038', '4.1215.0510', '0510', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('715', '2268922110038', '4.1215.0512', '0512', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('716', '2268922110038', '4.1215.0501', '0501', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('717', '2268922110038', '4.1215.0513', '0513', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('718', '2268922110038', '4.1215.0514', '0514', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('719', '2268922110038', '4.1215.0521', '0521', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('720', '2268922110038', '4.1215.0517', '0517', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('721', '2268922110038', '4.1215.0519', '0519', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('722', '2268922110038', '4.1215.0515', '0515', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('723', '2268922110038', '4.1215.0518', '0518', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('724', '2268922110038', '4.1215.0516', '0516', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('725', '2268922110038', '4.1215.0522', '0522', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('726', '2268922110038', '4.1215.0577', '0577', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('727', '2268922110038', '4.1215.0550', '0550', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('728', '2268922110038', '4.1215.0551', '0551', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('729', '2268922110038', '4.1215.0549', '0549', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('730', '2268922110038', '4.1215.0526', '0526', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('731', '2268922110038', '4.1215.0527', '0527', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('732', '2268922110038', '4.1215.0530', '0530', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('733', '2268922110038', '4.1215.0523', '0523', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('734', '2268922110038', '4.1215.0525', '0525', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('735', '2268922110038', '4.1215.0529', '0529', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('736', '2268922110038', '4.1215.0528', '0528', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('737', '2268922110038', '4.1215.0537', '0537', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('738', '2268922110038', '4.1215.0531', '0531', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('739', '2268922110038', '4.1215.0555', '0555', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('740', '2268922110038', '4.1215.0533', '0533', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('741', '2268922110038', '4.1215.0572', '0572', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('742', '2268922110038', '4.1215.0574', '0574', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('743', '2268922110038', '4.1215.0576', '0576', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('744', '2268922110038', '4.1215.0534', '0534', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('745', '2268922110038', '4.1215.0535', '0535', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('746', '2268922110038', '4.1215.0556', '0556', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('747', '2268922110038', '4.1215.0558', '0558', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('748', '2268922110038', '4.1215.0540', '0540', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('749', '2268922110038', '4.1215.0539', '0539', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('750', '2268922110038', '4.1215.0542', '0542', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('751', '2268922110038', '4.1215.0543', '0543', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('752', '2268922110038', '4.1215.0546', '0546', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('753', '2268922110038', '4.1215.0545', '0545', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('754', '2268922110038', '4.1215.0548', '0548', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('755', '2268922110038', '4.1215.0544', '0544', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('756', '3454653270044', '5.1215.0001', '0001', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('757', '3454653270044', '5.1215.0002', '0002', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('758', '3454653270044', '5.1215.0003', '0003', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('759', '3454653270044', '5.1215.0005', '0005', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('760', '3454653270044', '5.1215.0004', '0004', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('761', '3454653270044', '5.1215.0006', '0006', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('762', '3454653270044', '5.1215.0007', '0007', null, '2016-01-30 11:29:05');
INSERT INTO `kar_fingerx` VALUES ('763', '3454653270044', '5.1215.0008', '0008', null, '2016-01-30 11:29:05');

-- ----------------------------
-- Table structure for `kar_jk`
-- ----------------------------
DROP TABLE IF EXISTS `kar_jk`;
CREATE TABLE `kar_jk` (
  `JK_ID` int(11) NOT NULL COMMENT '0',
  `JK_NM` varchar(10) NOT NULL,
  PRIMARY KEY (`JK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kar_jk
-- ----------------------------
INSERT INTO `kar_jk` VALUES ('1', 'PRIA');
INSERT INTO `kar_jk` VALUES ('2', 'WANITA');

-- ----------------------------
-- Table structure for `kar_stt`
-- ----------------------------
DROP TABLE IF EXISTS `kar_stt`;
CREATE TABLE `kar_stt` (
  `KAR_STS_ID` int(11) NOT NULL COMMENT '0',
  `KAR_STS_NM` varchar(30) NOT NULL,
  PRIMARY KEY (`KAR_STS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kar_stt
-- ----------------------------
INSERT INTO `kar_stt` VALUES ('1', 'TETAP');
INSERT INTO `kar_stt` VALUES ('2', 'KONTRAK');
INSERT INTO `kar_stt` VALUES ('3', 'RESIGN');

-- ----------------------------
-- Table structure for `kepangkatan`
-- ----------------------------
DROP TABLE IF EXISTS `kepangkatan`;
CREATE TABLE `kepangkatan` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `GF_ID` varchar(10) NOT NULL,
  `GF_NM` varchar(30) DEFAULT NULL,
  `GF_DCRP` text,
  `STATUS` smallint(6) NOT NULL DEFAULT '0',
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Group Function/Kepangkatan/Level';

-- ----------------------------
-- Records of kepangkatan
-- ----------------------------
INSERT INTO `kepangkatan` VALUES ('1', 'A', 'DIRECTOR', null, '0', '', '', '2016-07-16 23:27:34');
INSERT INTO `kepangkatan` VALUES ('2', 'B', 'GENERAL MANAGER', null, '0', '', '', '2016-06-14 19:43:33');
INSERT INTO `kepangkatan` VALUES ('3', 'C', 'MANAGER', null, '0', '', '', '2016-06-14 19:43:33');
INSERT INTO `kepangkatan` VALUES ('4', 'D', 'SUPERVISOR', null, '0', '', '', '2016-06-14 19:43:35');
INSERT INTO `kepangkatan` VALUES ('5', 'E', 'STAFF / LEADER GROUP', 'Staf adalah', '0', '', 'admin', '2016-06-14 19:43:36');
INSERT INTO `kepangkatan` VALUES ('6', 'F', 'DATA ENTRY / CLERICAL ', '', '0', 'indri@lukison.com', 'indri@lukison.com', '2016-06-14 19:43:37');
INSERT INTO `kepangkatan` VALUES ('7', 'G', 'DAILY WORKER', null, '0', 'none', 'none', '2016-06-14 19:43:40');
INSERT INTO `kepangkatan` VALUES ('8', 'X', 'test', null, '0', 'none', 'none', '0000-00-00 00:00:00');
INSERT INTO `kepangkatan` VALUES ('9', 'y', 'xxx', null, '0', 'none', 'none', '0000-00-00 00:00:00');
INSERT INTO `kepangkatan` VALUES ('10', 'z', 'z', null, '0', 'none', 'none', '0000-00-00 00:00:00');
INSERT INTO `kepangkatan` VALUES ('11', 'S', 'SSSS', null, '0', 'none', 'none', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `key_list`
-- ----------------------------
DROP TABLE IF EXISTS `key_list`;
CREATE TABLE `key_list` (
  `FunctionKey` int(11) NOT NULL,
  `FunctionKeyNM` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`FunctionKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of key_list
-- ----------------------------
INSERT INTO `key_list` VALUES ('0', 'CheckIN');
INSERT INTO `key_list` VALUES ('1', 'CheckOUT');
INSERT INTO `key_list` VALUES ('2', 'OverTimeIN');
INSERT INTO `key_list` VALUES ('3', 'OverTimeOUT');
INSERT INTO `key_list` VALUES ('4', 'BreakIN');
INSERT INTO `key_list` VALUES ('5', 'BreakOUT');
INSERT INTO `key_list` VALUES ('6', 'BackOUT');
INSERT INTO `key_list` VALUES ('7', 'BackIN');

-- ----------------------------
-- Table structure for `m1000`
-- ----------------------------
DROP TABLE IF EXISTS `m1000`;
CREATE TABLE `m1000` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kd_menu` varchar(50) NOT NULL,
  `nm_menu` varchar(200) NOT NULL,
  `jval` longtext,
  `note` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`,`kd_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m1000
-- ----------------------------
INSERT INTO `m1000` VALUES ('1', 'sss_berita_acara', 'Berita Acara', '[{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> New\",\"url\":[\"new\"]},{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> PM <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"pm\"]},{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Inbox\",\"url\":[\"inbox\"]},{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Sent\",\"url\":[\"sent\"]},{\"label\":\"<i class=\\\"fa fa-folder-o\\\"></i> Draft\",\"url\":[\"draft\"]}]', '', null, null, null, '2015-06-13 17:10:22', '1');
INSERT INTO `m1000` VALUES ('2', 'sss_po', 'Purchase Order', '[{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> New\",\"url\":[\"new\"]},{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> PO List<span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"list\"]},{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Setup\",\"url\":[\"setup\"]}]', null, null, null, null, '2015-06-12 11:23:40', '1');
INSERT INTO `m1000` VALUES ('3', 'hrd', 'hrd', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Dashboard\",\"url\":[\"/hrd/dashboard\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Employee List \",\"url\":[\"/master/employe\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> Department <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/hrd/dept/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Jabatan\",\"url\":[\"/hrd/jabatan/index\"]}\r\n]', null, null, null, null, '2016-03-13 01:56:34', '1');
INSERT INTO `m1000` VALUES ('4', 'ESM', 'ESM', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Prodak\",\"url\":[\"/esm/barang/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> Unit<span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/esm/unitbarang/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i>Distributor\",\"url\":[\"/esm/distributor/index\"]}\r\n]', null, null, null, null, '2015-07-04 02:09:27', '1');
INSERT INTO `m1000` VALUES ('5', 'mdefault', 'Default Menu', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Help\",\"url\":[\"/bantuan/help\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i>Setting <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"#\"]}\r\n]', null, null, null, null, '2016-06-20 21:20:45', '1');
INSERT INTO `m1000` VALUES ('6', 'admin', 'admin', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Route\",\"url\":[\"/admin/route\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Menu\",\"url\":[\"/admin/menu\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i>Permission \",\"url\":[\"/admin/permission\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> Rule<span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/admin/rule\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Roles\",\"url\":[\"/admin/role\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> User Login\",\"url\":[\"/admin\"]},\r\n{\"label\":\"<i class=\\\"fa fa-folder-o\\\"></i> User Profile\",\"url\":[\"/system/user\"]}\r\n]', null, null, null, null, '2015-07-07 02:49:47', '1');
INSERT INTO `m1000` VALUES ('7', 'gsn', 'gosent', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Province \",\"url\":[\"/gsn/province/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i>  City <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/gsn/city/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> City\",\"url\":[\"/hrd/jabatan/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Modul\",\"url\":[\"/hrd/modulhrd/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Modul Setting\",\"url\":[\"/hrd/modulset/index\"]}\r\n]', null, null, null, null, '2015-07-29 17:21:02', '1');
INSERT INTO `m1000` VALUES ('8', 'api_gsn_forwarder', 'Forwarder Gosend', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Province\",\"url\":[\"api/gsn/province/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> Department <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/hrd/dept/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Jabatan\",\"url\":[\"/hrd/jabatan/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Modul\",\"url\":[\"/hrd/modulhrd/index\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Modul Setting\",\"url\":[\"/hrd/modulset/index\"]}\r\n]', null, null, null, null, '2015-08-04 15:33:45', '1');
INSERT INTO `m1000` VALUES ('9', 'api_gsn_formula', 'Formula Gosend', null, null, null, null, null, '2015-08-04 15:10:14', '1');
INSERT INTO `m1000` VALUES ('10', 'setting', 'Setting App', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site\"]},\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Dashboard\",\"url\":[\"/basic\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Corp\",\"url\":[\"/master/corp\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Cabang\",\"url\":[\"/master/cbg\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Agama\",\"url\":[\"/master/agama\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i>  Formula <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/master/formula\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Pendidikan\",\"url\":[\"/basic/pendidikan\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Tipe\",\"url\":[\"/master/typekerja\"]},\r\n{\"label\":\"<i class=\\\"fa fa-send\\\"></i> Finger Mesin\",\"url\":[\"/master/mesin\"]}\r\n]', null, null, null, null, '2016-03-12 22:28:13', '1');
INSERT INTO `m1000` VALUES ('11', 'absensi', 'absensi', '[\r\n{\"label\":\"<i class=\\\"fa fa-home\\\"></i> Home \",\"url\":[\"/site\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Dashboard\",\"url\":[\"/hrd/absensi/dashboard\"]},\r\n{\"label\":\"<i class=\\\"fa fa-pencil\\\"></i> Employee Finger \",\"url\":[\"/hrd/absensi/finger\"]},\r\n{\"label\":\"<i class=\\\"fa fa-suitcase\\\"></i> Employee Exception <span id=\\\"menu-badge-1\\\" class=\\\"badge badge-purple\\\" style=\\\"float: right\\\"></span>\",\"url\":[\"/hrd/absensi/ijin\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i>Holiday\",\"url\":[\"/hrd/absensi/libur\"]},\r\n{\"label\":\"<i class=\\\"fa fa-inbox\\\"></i> Work Time\",\"url\":[\"/hrd/absensi/jamkerja\"]}\r\n]', null, null, null, null, '2015-08-21 19:47:11', '1');

-- ----------------------------
-- Table structure for `machine`
-- ----------------------------
DROP TABLE IF EXISTS `machine`;
CREATE TABLE `machine` (
  `TerminalID` varchar(100) NOT NULL,
  `MESIN_NM` varchar(20) DEFAULT NULL,
  `MESIN_SN` varchar(50) DEFAULT NULL,
  `CAB_ID` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`TerminalID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of machine
-- ----------------------------
INSERT INTO `machine` VALUES ('2268922110030', 'Dadap--XIsco', '2268922110030', '2');
INSERT INTO `machine` VALUES ('2268922110038', 'Meruya-Senindo', '2268922110038', '4');
INSERT INTO `machine` VALUES ('3454653270019', 'Semanan-Plan1', '3454653270019', '3');
INSERT INTO `machine` VALUES ('3454653270044', 'Surabaya', '3454653270044', '5');
INSERT INTO `machine` VALUES ('6421150400333', 'Dadap-Plant2', '6421150400333', '1');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('26', 'Accounting', '27', null, '2', null);
INSERT INTO `menu` VALUES ('27', 'Department', null, null, '2', null);
INSERT INTO `menu` VALUES ('28', 'Finance', '26', '/dashboard/finance', '3', null);
INSERT INTO `menu` VALUES ('30', 'Dashboard', null, null, '1', null);
INSERT INTO `menu` VALUES ('68', 'HRD', '27', null, '1', null);
INSERT INTO `menu` VALUES ('71', 'IT Dept', '27', null, '6', null);
INSERT INTO `menu` VALUES ('74', 'Personalia', '68', '/master/employe/index', '0', null);
INSERT INTO `menu` VALUES ('76', 'Exceptions', '68', '/master/ijin-detail/index', '3', null);
INSERT INTO `menu` VALUES ('77', 'Timetable', '68', '/master/timetable-normal/index', '2', null);
INSERT INTO `menu` VALUES ('78', 'Absensi Import', '68', '/absensi/absen-import/index', '5', null);
INSERT INTO `menu` VALUES ('79', 'Department', '68', '/master/dept/index', '4', null);
INSERT INTO `menu` VALUES ('95', 'Export/import', '71', '/dashboard/export-import', '6', null);
INSERT INTO `menu` VALUES ('107', 'Setting Machine', '121', '/dashboard/master-machine', '7', null);
INSERT INTO `menu` VALUES ('115', 'admin', '71', '/admin', '0', null);
INSERT INTO `menu` VALUES ('121', 'Basic', null, null, '0', null);
INSERT INTO `menu` VALUES ('122', 'Setting Data', '121', '/dashboard/master-data', '8', null);
INSERT INTO `menu` VALUES ('123', 'Absen Log', '121', '/dashboard/absensi-log', '9', null);
INSERT INTO `menu` VALUES ('124', 'Payroll', null, null, '3', null);
INSERT INTO `menu` VALUES ('125', 'Rekap Daily Absensi', '124', '/payroll/absen-daily/index', '2', null);
INSERT INTO `menu` VALUES ('126', 'Component', '124', '/master/payroll-salary/index', '1', null);
INSERT INTO `menu` VALUES ('127', 'Finger Machine ', '68', '/master/finger/index', '2', null);
INSERT INTO `menu` VALUES ('128', 'Salary', '126', '/master/payroll-salary/index', null, null);
INSERT INTO `menu` VALUES ('129', 'Taxs', '126', '/master/payroll-tax/index', '2', null);
INSERT INTO `menu` VALUES ('130', 'Jamsostek', '126', '/master/payroll-jamsos-formula/index', '3', null);
INSERT INTO `menu` VALUES ('131', 'Loan', '126', '/master/payroll-loan-header/index', '4', null);
INSERT INTO `menu` VALUES ('132', 'Cabang', '121', '/master/cbg/index', '0', null);
INSERT INTO `menu` VALUES ('133', 'Grading', '121', '/master/grading/index', '1', null);
INSERT INTO `menu` VALUES ('134', 'Kepangkatan', '121', '/master/kepangkatan/index', '2', null);
INSERT INTO `menu` VALUES ('135', 'Absence Formula', '121', '/master/formula-overtime/index', '4', null);
INSERT INTO `menu` VALUES ('136', 'Agama', '121', '/master/agama/index', '5', null);
INSERT INTO `menu` VALUES ('137', 'Pendidikan', '121', '/master/pendidikan/index', '6', null);

-- ----------------------------
-- Table structure for `modul`
-- ----------------------------
DROP TABLE IF EXISTS `modul`;
CREATE TABLE `modul` (
  `MODUL_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MODUL_NM` varchar(100) NOT NULL DEFAULT 'none',
  `MODUL_DCRP` text,
  `MODUL_STS` smallint(6) DEFAULT '1',
  `SORT` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`MODUL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modul
-- ----------------------------
INSERT INTO `modul` VALUES ('1', 'RO', 'Request Order', '1', null);
INSERT INTO `modul` VALUES ('2', 'SO', 'Sales Order', '1', null);
INSERT INTO `modul` VALUES ('3', 'PO', 'Purchase Order', '1', null);
INSERT INTO `modul` VALUES ('4', 'TERM', 'Term Plan (TIPRO)', '1', null);
INSERT INTO `modul` VALUES ('5', 'request term', 'Request Investment', '1', null);
INSERT INTO `modul` VALUES ('6', 'TERM_DATA', 'Data Term Investment', '1', null);
INSERT INTO `modul` VALUES ('7', 'g', 's', '1', null);
INSERT INTO `modul` VALUES ('8', 'g', 's', '1', null);

-- ----------------------------
-- Table structure for `modul_permission`
-- ----------------------------
DROP TABLE IF EXISTS `modul_permission`;
CREATE TABLE `modul_permission` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) DEFAULT '0',
  `MODUL_ID` bigint(20) DEFAULT NULL,
  `STATUS` smallint(6) NOT NULL DEFAULT '0',
  `BTN_CREATE` smallint(6) NOT NULL DEFAULT '0',
  `BTN_EDIT` smallint(6) NOT NULL DEFAULT '0' COMMENT 'EDITING | Customize ',
  `BTN_DELETE` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Menu Delete | STATUS=0',
  `BTN_VIEW` smallint(6) NOT NULL DEFAULT '0' COMMENT 'View general | Can''t Insert|update|delete',
  `BTN_REVIEW` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Menu Revew For Signature\r\nMengetahui/Approved',
  `BTN_PROCESS1` smallint(6) NOT NULL DEFAULT '0',
  `BTN_PROCESS2` smallint(6) NOT NULL DEFAULT '0',
  `BTN_PROCESS3` smallint(6) NOT NULL DEFAULT '0',
  `BTN_PROCESS4` smallint(6) NOT NULL DEFAULT '0',
  `BTN_PROCESS5` smallint(6) NOT NULL DEFAULT '0',
  `BTN_SIGN1` smallint(6) NOT NULL DEFAULT '0',
  `BTN_SIGN2` smallint(6) NOT NULL DEFAULT '0',
  `BTN_SIGN3` smallint(6) NOT NULL DEFAULT '0',
  `BTN_SIGN4` smallint(6) NOT NULL DEFAULT '0',
  `BTN_SIGN5` smallint(6) NOT NULL DEFAULT '0',
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `STT_NOTIFY` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modul_permission
-- ----------------------------
INSERT INTO `modul_permission` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '', '', '2016-01-20 22:15:35', '1');
INSERT INTO `modul_permission` VALUES ('2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '', '', '2016-01-27 10:53:23', '1');
INSERT INTO `modul_permission` VALUES ('3', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '', '', '2016-01-25 14:55:38', '1');
INSERT INTO `modul_permission` VALUES ('4', '28', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 10:49:12', '1');
INSERT INTO `modul_permission` VALUES ('5', '26', '3', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-01-14 14:33:29', '1');
INSERT INTO `modul_permission` VALUES ('6', '23', '1', '1', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-03-31 21:24:05', '1');
INSERT INTO `modul_permission` VALUES ('7', '32', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', 'none', 'none', '2016-01-14 14:35:10', '1');
INSERT INTO `modul_permission` VALUES ('8', '23', '2', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', 'none', 'none', '2016-01-14 14:35:12', '1');
INSERT INTO `modul_permission` VALUES ('9', '32', '2', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', 'none', 'none', '2016-01-14 14:35:12', '1');
INSERT INTO `modul_permission` VALUES ('10', '32', '3', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', 'none', 'none', '2016-03-31 21:23:35', '1');
INSERT INTO `modul_permission` VALUES ('11', '23', '3', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', 'none', 'none', '2016-03-31 21:24:48', '1');
INSERT INTO `modul_permission` VALUES ('12', '26', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', 'none', 'none', '2016-01-20 22:34:22', '1');
INSERT INTO `modul_permission` VALUES ('13', '26', '2', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', 'none', 'none', '2016-03-28 14:16:47', '1');
INSERT INTO `modul_permission` VALUES ('14', '25', '1', '1', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', 'none', 'none', '2016-01-20 22:33:36', '1');
INSERT INTO `modul_permission` VALUES ('15', '25', '2', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-01-14 14:33:41', '1');
INSERT INTO `modul_permission` VALUES ('16', '25', '3', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', 'none', 'none', '2016-01-15 18:58:14', '1');
INSERT INTO `modul_permission` VALUES ('17', '2', '3', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-01-14 14:33:43', '1');
INSERT INTO `modul_permission` VALUES ('18', '28', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 10:49:19', '1');
INSERT INTO `modul_permission` VALUES ('21', '24', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-01-31 14:29:54', '1');
INSERT INTO `modul_permission` VALUES ('22', '36', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-02-24 15:27:38', '1');
INSERT INTO `modul_permission` VALUES ('24', '35', '2', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-11 17:06:07', '1');
INSERT INTO `modul_permission` VALUES ('25', '24', '2', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-01 09:33:02', '1');
INSERT INTO `modul_permission` VALUES ('26', '24', '3', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-01 09:34:29', '1');
INSERT INTO `modul_permission` VALUES ('27', '38', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-11 10:05:53', '1');
INSERT INTO `modul_permission` VALUES ('28', '38', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-04 14:29:07', '1');
INSERT INTO `modul_permission` VALUES ('29', '38', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', 'none', 'none', '2016-04-01 14:45:36', '1');
INSERT INTO `modul_permission` VALUES ('30', '38', '4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '0', 'none', 'none', '2016-04-01 14:46:31', '1');
INSERT INTO `modul_permission` VALUES ('31', '25', '4', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', 'none', 'none', '2016-04-03 17:19:25', '1');
INSERT INTO `modul_permission` VALUES ('32', '23', '4', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', 'none', 'none', '2016-05-28 16:43:36', '0');
INSERT INTO `modul_permission` VALUES ('33', '32', '4', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('34', '5', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('35', '5', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('36', '5', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('37', '5', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('38', '15', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('39', '15', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('40', '15', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('41', '15', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('42', '22', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:03:20', '1');
INSERT INTO `modul_permission` VALUES ('43', '22', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('44', '22', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('45', '22', '4', '0', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', 'none', 'none', '2016-05-25 10:09:44', '1');
INSERT INTO `modul_permission` VALUES ('46', '24', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('47', '27', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:06:16', '1');
INSERT INTO `modul_permission` VALUES ('48', '27', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('49', '27', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('50', '27', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('51', '30', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('52', '30', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('53', '30', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('54', '30', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('55', '35', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('56', '35', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('57', '1', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('58', '1', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('59', '1', '4', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '2016-05-20 11:50:50', '1');
INSERT INTO `modul_permission` VALUES ('60', '26', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('61', '31', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('62', '31', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('63', '31', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('64', '31', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('65', '35', '1', '0', '1', '1', '0', '1', '1', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-11 17:07:38', '1');
INSERT INTO `modul_permission` VALUES ('66', '41', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:04:51', '1');
INSERT INTO `modul_permission` VALUES ('67', '41', '2', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:04:55', '1');
INSERT INTO `modul_permission` VALUES ('68', '41', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('69', '41', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('70', null, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('71', null, '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('72', null, '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('73', null, '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('74', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('75', '6', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('76', '6', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('77', '6', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('78', '3', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:02:36', '1');
INSERT INTO `modul_permission` VALUES ('79', '3', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('80', '3', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('81', '3', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('82', '2', '4', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-05-28 17:02:21', '1');
INSERT INTO `modul_permission` VALUES ('83', '40', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('84', '40', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('85', '40', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('86', '40', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('87', '4', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:03:12', '1');
INSERT INTO `modul_permission` VALUES ('88', '4', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('89', '4', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('90', '4', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('91', '28', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('92', '28', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('93', '28', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('94', '44', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:09:29', '1');
INSERT INTO `modul_permission` VALUES ('95', '44', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('96', '44', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('97', '44', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('98', '45', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:10:32', '1');
INSERT INTO `modul_permission` VALUES ('99', '45', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('100', '45', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('101', '45', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('102', '46', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-05-04 16:22:27', '1');
INSERT INTO `modul_permission` VALUES ('103', '46', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('104', '46', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('105', '46', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('106', '47', '1', '0', '1', '1', '0', '1', '0', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-11 16:53:59', '1');
INSERT INTO `modul_permission` VALUES ('107', '47', '2', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-11 17:17:45', '1');
INSERT INTO `modul_permission` VALUES ('108', '47', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('109', '47', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('110', '48', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:12:03', '1');
INSERT INTO `modul_permission` VALUES ('111', '48', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('112', '48', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('113', '48', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('114', '49', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:12:40', '1');
INSERT INTO `modul_permission` VALUES ('115', '49', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('116', '49', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('117', '49', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('118', '50', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:13:09', '1');
INSERT INTO `modul_permission` VALUES ('119', '50', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('120', '50', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('121', '50', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('122', '29', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('123', '29', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('124', '29', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('125', '29', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('126', '34', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:08:11', '1');
INSERT INTO `modul_permission` VALUES ('127', '34', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('128', '34', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('129', '34', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('130', '36', '2', '0', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', 'none', 'none', '2016-04-12 10:12:08', '1');
INSERT INTO `modul_permission` VALUES ('131', '36', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('132', '36', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('133', '51', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', 'none', 'none', '2016-04-25 11:13:36', '1');
INSERT INTO `modul_permission` VALUES ('134', '51', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('135', '51', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('136', '51', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('137', '52', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('138', '52', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('139', '52', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('140', '52', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('141', '53', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('142', '53', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('143', '53', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('144', '53', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('145', '1', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('146', '2', '5', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', 'piter@lukison.com', 'none', '2016-05-27 18:57:21', '1');
INSERT INTO `modul_permission` VALUES ('147', '3', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('148', '4', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('149', '5', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('150', '6', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('151', '15', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('152', '22', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('153', '23', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '2016-05-28 16:41:59', '0');
INSERT INTO `modul_permission` VALUES ('154', '24', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('155', '25', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('156', '26', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('157', '27', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('158', '28', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('159', '29', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('160', '30', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('161', '31', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('162', '32', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('163', '34', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('164', '35', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('165', '36', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('166', '38', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('167', '40', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('168', '41', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('169', '42', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('170', '43', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('171', '44', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('172', '45', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('173', '46', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('174', '47', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('175', '48', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('176', '49', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('177', '50', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('178', '51', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('179', '52', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('180', '53', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'piter@lukison.com', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('181', null, '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '0000-00-00 00:00:00', '1');
INSERT INTO `modul_permission` VALUES ('182', '2', '6', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', 'none', '2016-05-29 14:03:27', '1');

-- ----------------------------
-- Table structure for `ot_formula`
-- ----------------------------
DROP TABLE IF EXISTS `ot_formula`;
CREATE TABLE `ot_formula` (
  `FOT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_GRP_ID` int(11) DEFAULT NULL,
  `FOT_NM` varchar(50) DEFAULT NULL,
  `FOT_JAM1` time DEFAULT NULL,
  `FOT_JAM2` time DEFAULT NULL,
  `FOT_PERSEN` float DEFAULT NULL,
  `START` bigint(20) DEFAULT NULL,
  `SEQ` bigint(20) DEFAULT NULL,
  `DCRIP` text,
  PRIMARY KEY (`FOT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ot_formula
-- ----------------------------
INSERT INTO `ot_formula` VALUES ('1', '2', 'JAM1', '00:00:01', '01:00:00', '0.25', '17', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('2', '2', 'JAM2', '01:00:01', '02:00:00', '0.25', '18', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('3', '2', 'JAM3', '02:00:01', '03:00:00', '0.25', '19', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('4', '2', 'JAM4', '03:00:01', '04:00:00', '0.25', '20', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('5', '2', 'JAM5', '04:00:01', '05:00:00', '0.25', '21', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('6', '2', 'JAM6', '05:00:01', '06:00:00', '0.25', '22', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('7', '2', 'JAM7', '06:00:01', '07:00:00', '0.25', '23', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('8', '2', 'JAM8', '07:00:01', '08:00:00', '0.25', '24', '1', 'Overtime');
INSERT INTO `ot_formula` VALUES ('9', '2', 'JAM9', '08:00:01', '09:00:00', '0.125', '1', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('10', '2', 'JAM10', '09:00:01', '10:00:00', '0.125', '2', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('11', '2', 'JAM11', '10:00:01', '11:00:00', '0.125', '3', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('12', '2', 'JAM12', '11:00:01', '12:00:00', '0.125', '4', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('13', '2', 'JAM13', '12:00:01', '13:00:00', '0', '5', '0', 'ISTIRAHAT');
INSERT INTO `ot_formula` VALUES ('14', '2', 'JAM14', '13:00:01', '14:00:00', '0.125', '6', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('15', '2', 'JAM15', '14:00:01', '15:00:00', '0.125', '7', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('16', '2', 'JAM16', '15:00:01', '16:00:00', '0.125', '8', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('17', '2', 'JAM17', '16:00:01', '17:00:00', '0.125', '9', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('18', '2', 'JAM18', '17:00:01', '18:00:00', '0', '10', '0', 'ISTIRAHAT');
INSERT INTO `ot_formula` VALUES ('19', '2', 'JAM19', '18:00:01', '19:00:00', '0.25', '11', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('20', '2', 'JAM20', '19:00:01', '20:00:00', '0.25', '12', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('21', '2', 'JAM21', '20:00:01', '21:00:00', '0.25', '13', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('22', '2', 'JAM22', '21:00:01', '22:00:00', '0.25', '14', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('23', '2', 'JAM23', '22:00:01', '23:00:00', '0.25', '15', '0', 'Overtime');
INSERT INTO `ot_formula` VALUES ('24', '2', 'JAM24', '23:00:01', '24:00:00', '0.25', '16', '0', 'Overtime');

-- ----------------------------
-- Table structure for `payroll_asuransi`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_asuransi`;
CREATE TABLE `payroll_asuransi` (
  `KAR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sDate` date DEFAULT NULL,
  `eDate` date DEFAULT NULL,
  `ASR_NM` varchar(100) DEFAULT NULL,
  `ASR_PAY_MONTH` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`KAR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_asuransi
-- ----------------------------
INSERT INTO `payroll_asuransi` VALUES ('1', null, null, null, '0');
INSERT INTO `payroll_asuransi` VALUES ('2', null, null, null, '0');
INSERT INTO `payroll_asuransi` VALUES ('3', null, null, null, '0');
INSERT INTO `payroll_asuransi` VALUES ('4', null, null, null, '0');

-- ----------------------------
-- Table structure for `payroll_asuransi_formula`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_asuransi_formula`;
CREATE TABLE `payroll_asuransi_formula` (
  `ASR_ID` varchar(20) NOT NULL DEFAULT '',
  `ASR_NM` varchar(100) DEFAULT NULL,
  `ASR_PAY_MONTH` float NOT NULL,
  PRIMARY KEY (`ASR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_asuransi_formula
-- ----------------------------
INSERT INTO `payroll_asuransi_formula` VALUES ('ASKES', 'ASKES', '100000');

-- ----------------------------
-- Table structure for `payroll_jamsos`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_jamsos`;
CREATE TABLE `payroll_jamsos` (
  `KAR_ID` varchar(30) NOT NULL,
  `sDate` date DEFAULT NULL,
  `eDate` date DEFAULT NULL,
  `SOS_ID` varchar(11) DEFAULT NULL,
  `DATA UPAH` float(100,0) NOT NULL DEFAULT '0',
  `JKK` float NOT NULL DEFAULT '0',
  `JKM` float NOT NULL DEFAULT '0',
  `JPK` float NOT NULL DEFAULT '0',
  `JHT_TK` float NOT NULL DEFAULT '0',
  `JHT` float NOT NULL DEFAULT '0',
  `SOS_TTL` float NOT NULL DEFAULT '0',
  `PERSEN_JKK` decimal(11,2) NOT NULL DEFAULT '0.00',
  `PERSEN_JKM` decimal(11,2) NOT NULL,
  `PERSEN_JPK` decimal(11,2) NOT NULL,
  `PERSEN_JHT_TK` decimal(11,2) NOT NULL,
  `PERSEN_JHT` decimal(11,2) NOT NULL,
  PRIMARY KEY (`KAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_jamsos
-- ----------------------------

-- ----------------------------
-- Table structure for `payroll_jamsos_formula`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_jamsos_formula`;
CREATE TABLE `payroll_jamsos_formula` (
  `SOS_ID` varchar(11) NOT NULL,
  `DATA_UPAH` float(100,0) NOT NULL DEFAULT '0',
  `JML_SOS` float NOT NULL DEFAULT '0',
  `JKK` float NOT NULL DEFAULT '0',
  `JKM` float NOT NULL DEFAULT '0',
  `JPK` float NOT NULL DEFAULT '0',
  `JHT_TK` float NOT NULL DEFAULT '0',
  `JHT` float NOT NULL DEFAULT '0',
  `SOS_TTL` float NOT NULL DEFAULT '0',
  `PERSEN_JKK` decimal(11,2) NOT NULL DEFAULT '0.00',
  `PERSEN_JKM` decimal(11,2) NOT NULL DEFAULT '0.00',
  `PERSEN_JPK` decimal(11,2) NOT NULL DEFAULT '0.00',
  `PERSEN_JHT_TK` decimal(11,2) NOT NULL DEFAULT '0.00',
  `PERSEN_JHT` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`SOS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_jamsos_formula
-- ----------------------------
INSERT INTO `payroll_jamsos_formula` VALUES ('MGR', '3000000', '187200', '7200', '9000', '0', '60000', '111000', '0', '0.24', '0.30', '0.00', '2.00', '3.70');
INSERT INTO `payroll_jamsos_formula` VALUES ('OPS', '2300000', '143520', '5520', '6900', '0', '46000', '85100', '0', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `payroll_jamsos_formula` VALUES ('UMR', '2400000', '149760', '5760', '7200', '0', '48000', '88800', '0', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `payroll_jamsos_formula` VALUES ('UMUM', '2500000', '156000', '6000', '7500', '0', '50000', '92500', '0', '0.00', '0.00', '0.00', '0.00', '0.00');

-- ----------------------------
-- Table structure for `payroll_pinjaman_detail`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_pinjaman_detail`;
CREATE TABLE `payroll_pinjaman_detail` (
  `KAR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TGL` date DEFAULT NULL,
  `PNJ_NM` varchar(100) DEFAULT NULL,
  `PNJ_PAY` float NOT NULL DEFAULT '0',
  `PNJ_FLT` int(11) DEFAULT NULL,
  PRIMARY KEY (`KAR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_pinjaman_detail
-- ----------------------------
INSERT INTO `payroll_pinjaman_detail` VALUES ('1', null, '500000', '0', '5');

-- ----------------------------
-- Table structure for `payroll_pinjaman_header`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_pinjaman_header`;
CREATE TABLE `payroll_pinjaman_header` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `KAR_ID` varchar(20) DEFAULT NULL,
  `TGL` date DEFAULT NULL,
  `PNJ_NM` varchar(100) DEFAULT NULL,
  `PNJ_PAY_REGULASI` int(11) DEFAULT NULL,
  `PNJ_PAY_MONTH` float NOT NULL DEFAULT '0',
  `PNJ_PAY` float NOT NULL DEFAULT '0',
  `STT` int(11) DEFAULT NULL,
  `KET` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_pinjaman_header
-- ----------------------------
INSERT INTO `payroll_pinjaman_header` VALUES ('1', 'WAN.HO.000087', '2015-03-01', '5000000', '10', '500000', '0', null, null);

-- ----------------------------
-- Table structure for `payroll_pph21`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_pph21`;
CREATE TABLE `payroll_pph21` (
  `KAR_ID` varchar(20) NOT NULL,
  `sDate` date DEFAULT NULL,
  `eDate` date DEFAULT NULL,
  `TTL_UPAH` float NOT NULL DEFAULT '0',
  `PTKP_NM` varchar(15) DEFAULT NULL,
  `PTKP_VALUE` float NOT NULL DEFAULT '0',
  `UPAH_PTKP` float NOT NULL DEFAULT '0',
  `TTL_PTKP` float NOT NULL DEFAULT '0',
  `PPH21` float(11,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`KAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_pph21
-- ----------------------------
INSERT INTO `payroll_pph21` VALUES ('1', null, null, '0', null, '0', '0', '0', '0.0000');
INSERT INTO `payroll_pph21` VALUES ('2', null, null, '0', null, '0', '0', '0', '0.0000');
INSERT INTO `payroll_pph21` VALUES ('3', null, null, '0', null, '0', '0', '0', '0.0000');
INSERT INTO `payroll_pph21` VALUES ('4', null, null, '0', null, '0', '0', '0', '0.0000');

-- ----------------------------
-- Table structure for `payroll_ptkp_formula`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_ptkp_formula`;
CREATE TABLE `payroll_ptkp_formula` (
  `NO` int(11) NOT NULL,
  `PTKP_NM` varchar(3) DEFAULT NULL,
  `STT_ID` varchar(3) DEFAULT NULL COMMENT 'Menika Single',
  `ANAK` int(11) DEFAULT NULL,
  `PTKP_VALUE` float NOT NULL DEFAULT '0',
  `PPH21` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_ptkp_formula
-- ----------------------------
INSERT INTO `payroll_ptkp_formula` VALUES ('1', 'TK', 'TK', '0', '67500', '0.06');
INSERT INTO `payroll_ptkp_formula` VALUES ('2', 'K', 'K', '0', '73125', '0.06');
INSERT INTO `payroll_ptkp_formula` VALUES ('3', 'K1', 'K', '1', '78750', '0.06');
INSERT INTO `payroll_ptkp_formula` VALUES ('4', 'K2', 'K', '2', '84375', '0.06');
INSERT INTO `payroll_ptkp_formula` VALUES ('5', 'K3', 'K', '3', '90000', '0.06');

-- ----------------------------
-- Table structure for `payroll_ptkp_stt`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_ptkp_stt`;
CREATE TABLE `payroll_ptkp_stt` (
  `STT_ID` varchar(2) NOT NULL,
  `STT_NM` varchar(15) DEFAULT NULL COMMENT 'Menika Single',
  PRIMARY KEY (`STT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_ptkp_stt
-- ----------------------------
INSERT INTO `payroll_ptkp_stt` VALUES ('K', 'KAWIN');
INSERT INTO `payroll_ptkp_stt` VALUES ('TK', 'TIDAK KAWIN');

-- ----------------------------
-- Table structure for `payroll_salary`
-- ----------------------------
DROP TABLE IF EXISTS `payroll_salary`;
CREATE TABLE `payroll_salary` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `KAR_ID` varchar(20) NOT NULL,
  `PAY_DAY` decimal(50,2) DEFAULT '0.00',
  `PAY_MONTH` decimal(50,2) DEFAULT '0.00',
  `PAY_TUNJANGAN` decimal(50,2) DEFAULT '0.00',
  `PAY_TRANPORT` decimal(50,2) DEFAULT '0.00',
  `PAY_EAT` decimal(50,2) DEFAULT '0.00',
  `BONUS` decimal(50,2) DEFAULT '0.00',
  `PAY_ENTERTAIN` decimal(50,2) DEFAULT '0.00',
  `STATUS_ACTIVE` smallint(6) DEFAULT '0',
  `NOTE` text,
  `CREATE_BY` varchar(50) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_BY` varchar(50) DEFAULT NULL,
  `UPDATE_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payroll_salary
-- ----------------------------
INSERT INTO `payroll_salary` VALUES ('2', '3.0915.0001', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-25 21:00:11');
INSERT INTO `payroll_salary` VALUES ('3', '3.0915.0002', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('4', '3.0915.0003', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('5', '3.0915.0004', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('6', '3.0915.0005', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('7', '3.0915.0006', '76500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('8', '3.0915.0007', '78000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('9', '3.0915.0008', '90000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('10', '3.0915.0009', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('11', '3.0915.0010', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('12', '3.0915.0011', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('13', '3.0915.0012', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('14', '3.0915.0013', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('15', '3.0915.0014', '100000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('16', '3.0915.0015', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('17', '3.0915.0016', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('18', '3.0915.0017', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('19', '3.0915.0018', '85000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('20', '3.0915.0019', '71500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('21', '3.0915.0020', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('22', '3.0915.0021', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('23', '3.0915.0022', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('24', '3.0915.0023', '74000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('25', '3.0915.0024', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('26', '3.0915.0025', '68000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('27', '3.0915.0026', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('28', '3.0915.0027', '68000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('29', '3.0915.0028', '85000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('30', '3.0915.0029', '82500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('31', '3.0915.0030', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('32', '3.0915.0031', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('33', '3.0915.0032', '90000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('34', '3.0915.0033', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('35', '3.0915.0034', '87000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('36', '3.0915.0035', '68000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('37', '3.0915.0036', '68000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('38', '3.0915.0037', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('39', '3.0915.0038', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('40', '3.0915.0039', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('41', '3.0915.0040', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('42', '3.0915.0041', '98000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('43', '3.0915.0042', '95000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('44', '3.0915.0043', '81500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('45', '3.0915.0044', '90000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('46', '3.0915.0045', '88500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('47', '3.0915.0046', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('48', '3.0915.0047', '87500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('49', '3.0915.0048', '87500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('50', '3.0915.0049', '86000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('51', '3.0915.0050', '76500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('52', '3.0915.0051', '76500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('53', '3.0915.0052', '73500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('54', '3.0915.0053', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('55', '3.0915.0054', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('56', '3.0915.0055', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('57', '3.0915.0056', '69000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('58', '3.0915.0057', '69500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('59', '3.0915.0058', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('60', '3.0915.0059', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('61', '3.0915.0060', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('62', '3.0915.0061', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('63', '3.0915.0062', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('64', '3.0915.0063', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('65', '3.0915.0064', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('66', '3.0915.0065', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('67', '3.0915.0066', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('68', '3.0915.0067', '89000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('69', '3.0915.0068', '89000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('70', '3.0915.0069', '79000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('71', '3.0915.0070', '94000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('72', '3.0915.0071', '75500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('73', '3.0915.0072', '89500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('74', '3.0915.0073', '68000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('75', '3.0915.0074', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('76', '3.0915.0075', '72000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('77', '3.0915.0076', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('78', '3.0915.0077', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('79', '3.0915.0078', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('80', '3.0915.0079', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('81', '3.0915.0080', '68500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('82', '3.0915.0081', '68500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('83', '3.0915.0082', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('84', '3.0915.0083', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('85', '3.0915.0084', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('86', '3.0915.0085', '85000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('87', '3.0915.0086', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('88', '3.0915.0087', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('89', '3.0915.0088', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('90', '3.0915.0089', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('91', '3.0915.0090', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('92', '3.0915.0091', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('93', '3.0915.0092', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('94', '3.0915.0093', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('95', '3.0915.0094', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('96', '3.0915.0095', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('97', '3.0915.0096', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('98', '3.0915.0097', '95000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('99', '3.0915.0098', '95000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('100', '3.0915.0099', '93000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('101', '3.0915.0100', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('102', '3.0915.0101', '89000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('103', '3.0915.0102', '90000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('104', '3.0915.0103', '80000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('105', '3.0915.0104', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('106', '3.0915.0105', '95000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('107', '3.0915.0106', '87000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('108', '3.0915.0107', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('109', '3.0915.0108', '69500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('110', '3.0915.0109', '66000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('111', '3.0915.0110', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('112', '3.0915.0111', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('113', '3.0915.0112', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('114', '3.0915.0113', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('115', '3.0915.0114', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('116', '3.0915.0115', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('117', '3.0915.0116', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('118', '3.0915.0117', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('119', '3.0915.0118', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('120', '3.0915.0119', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('121', '3.0915.0120', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('122', '3.0915.0121', '75000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('123', '3.0915.0122', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('124', '3.0915.0123', '65000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('125', '3.0915.0124', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('126', '3.0915.0125', '60000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('127', '3.0915.0126', '70000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');
INSERT INTO `payroll_salary` VALUES ('128', '', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1', null, null, null, null, '2017-09-15 20:39:11');

-- ----------------------------
-- Table structure for `pendidikan`
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `PEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEN_NM` varchar(100) DEFAULT NULL,
  `USER` varchar(30) DEFAULT NULL,
  `UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES ('1', 'SD', 'root', '2015-01-02 11:45:17');
INSERT INTO `pendidikan` VALUES ('2', 'SLTP', 'root', '2015-01-02 11:45:28');
INSERT INTO `pendidikan` VALUES ('3', 'SMA', 'root', '2015-01-02 11:45:24');
INSERT INTO `pendidikan` VALUES ('6', 'D3', 'root', '2015-01-02 11:45:41');
INSERT INTO `pendidikan` VALUES ('7', 'S1', 'root', '2015-01-02 11:45:45');
INSERT INTO `pendidikan` VALUES ('8', 'S2', 'root', '2015-01-02 11:45:58');
INSERT INTO `pendidikan` VALUES ('9', 'S3', 'root', '2015-01-02 11:46:15');
INSERT INTO `pendidikan` VALUES ('10', 'None', 'root', '2016-06-14 02:34:02');

-- ----------------------------
-- Table structure for `personallog`
-- ----------------------------
DROP TABLE IF EXISTS `personallog`;
CREATE TABLE `personallog` (
  `idno` bigint(20) NOT NULL AUTO_INCREMENT,
  `TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  `UserID` varchar(50) DEFAULT NULL,
  `FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  `Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  `UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  `FlagAbsence` varchar(100) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=31883 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';

-- ----------------------------
-- Records of personallog
-- ----------------------------
INSERT INTO `personallog` VALUES ('29682', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-23 06:55:01', '2016-02-23', '06:55:01');
INSERT INTO `personallog` VALUES ('29683', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 06:55:06', '2016-02-23', '06:55:06');
INSERT INTO `personallog` VALUES ('29684', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-23 08:02:59', '2016-02-23', '08:02:59');
INSERT INTO `personallog` VALUES ('29685', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 08:05:48', '2016-02-23', '08:05:48');
INSERT INTO `personallog` VALUES ('29686', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-23 08:07:55', '2016-02-23', '08:07:55');
INSERT INTO `personallog` VALUES ('29687', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 08:09:50', '2016-02-23', '08:09:50');
INSERT INTO `personallog` VALUES ('29688', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 08:12:33', '2016-02-23', '08:12:33');
INSERT INTO `personallog` VALUES ('29689', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 08:12:57', '2016-02-23', '08:12:57');
INSERT INTO `personallog` VALUES ('29690', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-23 08:13:03', '2016-02-23', '08:13:03');
INSERT INTO `personallog` VALUES ('29691', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-23 08:20:05', '2016-02-23', '08:20:05');
INSERT INTO `personallog` VALUES ('29692', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 08:20:25', '2016-02-23', '08:20:25');
INSERT INTO `personallog` VALUES ('29693', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-23 08:22:35', '2016-02-23', '08:22:35');
INSERT INTO `personallog` VALUES ('29694', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 08:24:22', '2016-02-23', '08:24:22');
INSERT INTO `personallog` VALUES ('29695', '2268922110030', '35', '5', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-23 08:25:10', '2016-02-23', '08:25:10');
INSERT INTO `personallog` VALUES ('29696', '2268922110030', '35', '5', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-23 08:25:12', '2016-02-23', '08:25:12');
INSERT INTO `personallog` VALUES ('29697', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 08:30:15', '2016-02-23', '08:30:15');
INSERT INTO `personallog` VALUES ('29698', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 08:30:37', '2016-02-23', '08:30:37');
INSERT INTO `personallog` VALUES ('29699', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-23 08:33:41', '2016-02-23', '08:33:41');
INSERT INTO `personallog` VALUES ('29700', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 08:35:36', '2016-02-23', '08:35:36');
INSERT INTO `personallog` VALUES ('29701', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-23 08:42:44', '2016-02-23', '08:42:44');
INSERT INTO `personallog` VALUES ('29702', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-23 08:42:48', '2016-02-23', '08:42:48');
INSERT INTO `personallog` VALUES ('29703', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 08:47:32', '2016-02-23', '08:47:32');
INSERT INTO `personallog` VALUES ('29704', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-02-23 08:49:28', '2016-02-23', '08:49:28');
INSERT INTO `personallog` VALUES ('29705', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-23 08:56:07', '2016-02-23', '08:56:07');
INSERT INTO `personallog` VALUES ('29706', '2268922110030', '52', '0', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-02-23 09:02:40', '2016-02-23', '09:02:40');
INSERT INTO `personallog` VALUES ('29707', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 09:07:46', '2016-02-23', '09:07:46');
INSERT INTO `personallog` VALUES ('29708', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-23 09:07:52', '2016-02-23', '09:07:52');
INSERT INTO `personallog` VALUES ('29709', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-23 09:07:53', '2016-02-23', '09:07:53');
INSERT INTO `personallog` VALUES ('29710', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-23 09:07:55', '2016-02-23', '09:07:55');
INSERT INTO `personallog` VALUES ('29711', '2268922110030', '44', '0', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 09:16:15', '2016-02-23', '09:16:15');
INSERT INTO `personallog` VALUES ('29712', '2268922110030', '18', '0', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-23 09:18:09', '2016-02-23', '09:18:09');
INSERT INTO `personallog` VALUES ('29713', '2268922110030', '52', '0', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-02-23 09:20:18', '2016-02-23', '09:20:18');
INSERT INTO `personallog` VALUES ('29714', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 09:21:29', '2016-02-23', '09:21:29');
INSERT INTO `personallog` VALUES ('29715', '2268922110030', '23', '0', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-23 09:23:01', '2016-02-23', '09:23:01');
INSERT INTO `personallog` VALUES ('29716', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 09:28:18', '2016-02-23', '09:28:18');
INSERT INTO `personallog` VALUES ('29717', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 09:28:19', '2016-02-23', '09:28:19');
INSERT INTO `personallog` VALUES ('29718', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 09:31:28', '2016-02-23', '09:31:28');
INSERT INTO `personallog` VALUES ('29719', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 09:34:21', '2016-02-23', '09:34:21');
INSERT INTO `personallog` VALUES ('29720', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-23 09:42:18', '2016-02-23', '09:42:18');
INSERT INTO `personallog` VALUES ('29721', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 09:47:03', '2016-02-23', '09:47:03');
INSERT INTO `personallog` VALUES ('29722', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 09:54:32', '2016-02-23', '09:54:32');
INSERT INTO `personallog` VALUES ('29723', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-23 10:05:49', '2016-02-23', '10:05:49');
INSERT INTO `personallog` VALUES ('29724', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 10:05:51', '2016-02-23', '10:05:51');
INSERT INTO `personallog` VALUES ('29725', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-23 10:07:58', '2016-02-23', '10:07:58');
INSERT INTO `personallog` VALUES ('29726', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 10:10:00', '2016-02-23', '10:10:00');
INSERT INTO `personallog` VALUES ('29727', '2268922110030', '52', '5', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-02-23 10:15:29', '2016-02-23', '10:15:29');
INSERT INTO `personallog` VALUES ('29728', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 10:15:45', '2016-02-23', '10:15:45');
INSERT INTO `personallog` VALUES ('29729', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 10:21:26', '2016-02-23', '10:21:26');
INSERT INTO `personallog` VALUES ('29730', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 10:24:22', '2016-02-23', '10:24:22');
INSERT INTO `personallog` VALUES ('29731', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-23 10:25:04', '2016-02-23', '10:25:04');
INSERT INTO `personallog` VALUES ('29732', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 10:27:09', '2016-02-23', '10:27:09');
INSERT INTO `personallog` VALUES ('29733', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-23 10:27:25', '2016-02-23', '10:27:25');
INSERT INTO `personallog` VALUES ('29734', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 10:28:52', '2016-02-23', '10:28:52');
INSERT INTO `personallog` VALUES ('29735', '2268922110030', '18', '5', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-23 10:29:52', '2016-02-23', '10:29:52');
INSERT INTO `personallog` VALUES ('29736', '2268922110030', '54', '5', '2016-06-17 01:50:09', 'Card.Ailey', 'Online', '2016-02-23 10:33:40', '2016-02-23', '10:33:40');
INSERT INTO `personallog` VALUES ('29737', '2268922110030', '54', '0', '2016-06-17 01:50:09', 'Card.Ailey', 'Online', '2016-02-23 10:34:03', '2016-02-23', '10:34:03');
INSERT INTO `personallog` VALUES ('29738', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 10:38:10', '2016-02-23', '10:38:10');
INSERT INTO `personallog` VALUES ('29739', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 10:39:59', '2016-02-23', '10:39:59');
INSERT INTO `personallog` VALUES ('29740', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 10:56:49', '2016-02-23', '10:56:49');
INSERT INTO `personallog` VALUES ('29741', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-23 11:23:33', '2016-02-23', '11:23:33');
INSERT INTO `personallog` VALUES ('29742', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 11:25:33', '2016-02-23', '11:25:33');
INSERT INTO `personallog` VALUES ('29743', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 11:36:52', '2016-02-23', '11:36:52');
INSERT INTO `personallog` VALUES ('29744', '2268922110030', '49', '0', '2016-06-17 01:50:09', 'Heri', 'Online', '2016-02-23 11:48:02', '2016-02-23', '11:48:02');
INSERT INTO `personallog` VALUES ('29745', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 11:49:56', '2016-02-23', '11:49:56');
INSERT INTO `personallog` VALUES ('29746', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-23 11:54:51', '2016-02-23', '11:54:51');
INSERT INTO `personallog` VALUES ('29747', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 11:59:19', '2016-02-23', '11:59:19');
INSERT INTO `personallog` VALUES ('29748', '2268922110030', '44', '0', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 12:02:12', '2016-02-23', '12:02:12');
INSERT INTO `personallog` VALUES ('29749', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 12:04:47', '2016-02-23', '12:04:47');
INSERT INTO `personallog` VALUES ('29750', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-23 12:06:12', '2016-02-23', '12:06:12');
INSERT INTO `personallog` VALUES ('29751', '2268922110030', '54', '0', '2016-06-17 01:50:09', 'Card.Ailey', 'Online', '2016-02-23 12:12:11', '2016-02-23', '12:12:11');
INSERT INTO `personallog` VALUES ('29752', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-23 12:15:03', '2016-02-23', '12:15:03');
INSERT INTO `personallog` VALUES ('29753', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 12:16:20', '2016-02-23', '12:16:20');
INSERT INTO `personallog` VALUES ('29754', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 12:18:34', '2016-02-23', '12:18:34');
INSERT INTO `personallog` VALUES ('29755', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 12:22:43', '2016-02-23', '12:22:43');
INSERT INTO `personallog` VALUES ('29756', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-23 12:30:44', '2016-02-23', '12:30:44');
INSERT INTO `personallog` VALUES ('29757', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 12:31:26', '2016-02-23', '12:31:26');
INSERT INTO `personallog` VALUES ('29758', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 12:34:11', '2016-02-23', '12:34:11');
INSERT INTO `personallog` VALUES ('29759', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-23 12:47:33', '2016-02-23', '12:47:33');
INSERT INTO `personallog` VALUES ('29760', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 12:48:07', '2016-02-23', '12:48:07');
INSERT INTO `personallog` VALUES ('29761', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 12:49:57', '2016-02-23', '12:49:57');
INSERT INTO `personallog` VALUES ('29762', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 12:54:16', '2016-02-23', '12:54:16');
INSERT INTO `personallog` VALUES ('29763', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 12:55:32', '2016-02-23', '12:55:32');
INSERT INTO `personallog` VALUES ('29764', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 13:08:45', '2016-02-23', '13:08:45');
INSERT INTO `personallog` VALUES ('29765', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 13:24:29', '2016-02-23', '13:24:29');
INSERT INTO `personallog` VALUES ('29766', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 13:25:57', '2016-02-23', '13:25:57');
INSERT INTO `personallog` VALUES ('29767', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 13:30:14', '2016-02-23', '13:30:14');
INSERT INTO `personallog` VALUES ('29768', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-23 13:32:54', '2016-02-23', '13:32:54');
INSERT INTO `personallog` VALUES ('29769', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 13:33:31', '2016-02-23', '13:33:31');
INSERT INTO `personallog` VALUES ('29770', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 13:36:45', '2016-02-23', '13:36:45');
INSERT INTO `personallog` VALUES ('29771', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 13:41:43', '2016-02-23', '13:41:43');
INSERT INTO `personallog` VALUES ('29772', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 13:42:06', '2016-02-23', '13:42:06');
INSERT INTO `personallog` VALUES ('29773', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 13:51:34', '2016-02-23', '13:51:34');
INSERT INTO `personallog` VALUES ('29774', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 13:52:52', '2016-02-23', '13:52:52');
INSERT INTO `personallog` VALUES ('29775', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 13:53:28', '2016-02-23', '13:53:28');
INSERT INTO `personallog` VALUES ('29776', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 14:14:11', '2016-02-23', '14:14:11');
INSERT INTO `personallog` VALUES ('29777', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 14:16:06', '2016-02-23', '14:16:06');
INSERT INTO `personallog` VALUES ('29778', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-23 14:20:52', '2016-02-23', '14:20:52');
INSERT INTO `personallog` VALUES ('29779', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 14:21:14', '2016-02-23', '14:21:14');
INSERT INTO `personallog` VALUES ('29780', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 14:21:16', '2016-02-23', '14:21:16');
INSERT INTO `personallog` VALUES ('29781', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-23 14:24:06', '2016-02-23', '14:24:06');
INSERT INTO `personallog` VALUES ('29782', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 14:24:48', '2016-02-23', '14:24:48');
INSERT INTO `personallog` VALUES ('29783', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 14:31:52', '2016-02-23', '14:31:52');
INSERT INTO `personallog` VALUES ('29784', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 14:34:01', '2016-02-23', '14:34:01');
INSERT INTO `personallog` VALUES ('29785', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 14:41:34', '2016-02-23', '14:41:34');
INSERT INTO `personallog` VALUES ('29786', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 14:55:12', '2016-02-23', '14:55:12');
INSERT INTO `personallog` VALUES ('29787', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 15:07:12', '2016-02-23', '15:07:12');
INSERT INTO `personallog` VALUES ('29788', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 15:22:25', '2016-02-23', '15:22:25');
INSERT INTO `personallog` VALUES ('29789', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 15:24:18', '2016-02-23', '15:24:18');
INSERT INTO `personallog` VALUES ('29790', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-23 15:27:03', '2016-02-23', '15:27:03');
INSERT INTO `personallog` VALUES ('29791', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-23 15:32:01', '2016-02-23', '15:32:01');
INSERT INTO `personallog` VALUES ('29792', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-23 15:36:21', '2016-02-23', '15:36:21');
INSERT INTO `personallog` VALUES ('29793', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 15:41:41', '2016-02-23', '15:41:41');
INSERT INTO `personallog` VALUES ('29794', '2268922110030', '15', '5', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-23 15:55:32', '2016-02-23', '15:55:32');
INSERT INTO `personallog` VALUES ('29795', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 15:57:32', '2016-02-23', '15:57:32');
INSERT INTO `personallog` VALUES ('29796', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 16:08:30', '2016-02-23', '16:08:30');
INSERT INTO `personallog` VALUES ('29797', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 16:12:56', '2016-02-23', '16:12:56');
INSERT INTO `personallog` VALUES ('29798', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 16:13:51', '2016-02-23', '16:13:51');
INSERT INTO `personallog` VALUES ('29799', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 16:19:51', '2016-02-23', '16:19:51');
INSERT INTO `personallog` VALUES ('29800', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 16:24:28', '2016-02-23', '16:24:28');
INSERT INTO `personallog` VALUES ('29801', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-23 16:24:59', '2016-02-23', '16:24:59');
INSERT INTO `personallog` VALUES ('29802', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 16:25:45', '2016-02-23', '16:25:45');
INSERT INTO `personallog` VALUES ('29803', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 16:28:25', '2016-02-23', '16:28:25');
INSERT INTO `personallog` VALUES ('29804', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 16:30:40', '2016-02-23', '16:30:40');
INSERT INTO `personallog` VALUES ('29805', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 16:38:24', '2016-02-23', '16:38:24');
INSERT INTO `personallog` VALUES ('29806', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 16:52:52', '2016-02-23', '16:52:52');
INSERT INTO `personallog` VALUES ('29807', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 16:58:31', '2016-02-23', '16:58:31');
INSERT INTO `personallog` VALUES ('29808', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-23 17:04:52', '2016-02-23', '17:04:52');
INSERT INTO `personallog` VALUES ('29809', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-23 17:06:49', '2016-02-23', '17:06:49');
INSERT INTO `personallog` VALUES ('29810', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-23 17:09:33', '2016-02-23', '17:09:33');
INSERT INTO `personallog` VALUES ('29811', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 17:12:46', '2016-02-23', '17:12:46');
INSERT INTO `personallog` VALUES ('29812', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-23 17:27:49', '2016-02-23', '17:27:49');
INSERT INTO `personallog` VALUES ('29813', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 17:30:04', '2016-02-23', '17:30:04');
INSERT INTO `personallog` VALUES ('29814', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 17:30:10', '2016-02-23', '17:30:10');
INSERT INTO `personallog` VALUES ('29815', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-23 17:30:50', '2016-02-23', '17:30:50');
INSERT INTO `personallog` VALUES ('29816', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-23 17:31:42', '2016-02-23', '17:31:42');
INSERT INTO `personallog` VALUES ('29817', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-23 17:33:30', '2016-02-23', '17:33:30');
INSERT INTO `personallog` VALUES ('29818', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-23 17:33:48', '2016-02-23', '17:33:48');
INSERT INTO `personallog` VALUES ('29819', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-23 17:33:55', '2016-02-23', '17:33:55');
INSERT INTO `personallog` VALUES ('29820', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-23 17:37:35', '2016-02-23', '17:37:35');
INSERT INTO `personallog` VALUES ('29821', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-23 17:37:52', '2016-02-23', '17:37:52');
INSERT INTO `personallog` VALUES ('29822', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 17:43:33', '2016-02-23', '17:43:33');
INSERT INTO `personallog` VALUES ('29823', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-23 17:43:35', '2016-02-23', '17:43:35');
INSERT INTO `personallog` VALUES ('29824', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-23 17:43:39', '2016-02-23', '17:43:39');
INSERT INTO `personallog` VALUES ('29825', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-23 18:03:54', '2016-02-23', '18:03:54');
INSERT INTO `personallog` VALUES ('29826', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-23 18:04:53', '2016-02-23', '18:04:53');
INSERT INTO `personallog` VALUES ('29827', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-23 18:04:55', '2016-02-23', '18:04:55');
INSERT INTO `personallog` VALUES ('29828', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-23 19:09:49', '2016-02-23', '19:09:49');
INSERT INTO `personallog` VALUES ('29829', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-23 19:09:58', '2016-02-23', '19:09:58');
INSERT INTO `personallog` VALUES ('29830', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-23 19:16:54', '2016-02-23', '19:16:54');
INSERT INTO `personallog` VALUES ('29831', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-24 07:40:25', '2016-02-24', '07:40:25');
INSERT INTO `personallog` VALUES ('29832', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 07:43:28', '2016-02-24', '07:43:28');
INSERT INTO `personallog` VALUES ('29833', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-24 07:43:32', '2016-02-24', '07:43:32');
INSERT INTO `personallog` VALUES ('29834', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-24 07:43:38', '2016-02-24', '07:43:38');
INSERT INTO `personallog` VALUES ('29835', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-24 08:02:23', '2016-02-24', '08:02:23');
INSERT INTO `personallog` VALUES ('29836', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-24 08:07:43', '2016-02-24', '08:07:43');
INSERT INTO `personallog` VALUES ('29837', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 08:09:49', '2016-02-24', '08:09:49');
INSERT INTO `personallog` VALUES ('29838', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 08:15:33', '2016-02-24', '08:15:33');
INSERT INTO `personallog` VALUES ('29839', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-24 08:19:07', '2016-02-24', '08:19:07');
INSERT INTO `personallog` VALUES ('29840', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-24 08:22:43', '2016-02-24', '08:22:43');
INSERT INTO `personallog` VALUES ('29841', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-24 08:22:48', '2016-02-24', '08:22:48');
INSERT INTO `personallog` VALUES ('29842', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-02-24 08:24:22', '2016-02-24', '08:24:22');
INSERT INTO `personallog` VALUES ('29843', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-24 08:24:58', '2016-02-24', '08:24:58');
INSERT INTO `personallog` VALUES ('29844', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-24 08:25:00', '2016-02-24', '08:25:00');
INSERT INTO `personallog` VALUES ('29845', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 08:26:04', '2016-02-24', '08:26:04');
INSERT INTO `personallog` VALUES ('29846', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-24 08:26:14', '2016-02-24', '08:26:14');
INSERT INTO `personallog` VALUES ('29847', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-24 08:29:57', '2016-02-24', '08:29:57');
INSERT INTO `personallog` VALUES ('29848', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-24 08:32:00', '2016-02-24', '08:32:00');
INSERT INTO `personallog` VALUES ('29849', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 08:32:47', '2016-02-24', '08:32:47');
INSERT INTO `personallog` VALUES ('29850', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-24 08:35:41', '2016-02-24', '08:35:41');
INSERT INTO `personallog` VALUES ('29851', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-24 08:39:09', '2016-02-24', '08:39:09');
INSERT INTO `personallog` VALUES ('29852', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 08:39:29', '2016-02-24', '08:39:29');
INSERT INTO `personallog` VALUES ('29853', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 08:44:23', '2016-02-24', '08:44:23');
INSERT INTO `personallog` VALUES ('29854', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-24 08:46:43', '2016-02-24', '08:46:43');
INSERT INTO `personallog` VALUES ('29855', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-24 08:52:19', '2016-02-24', '08:52:19');
INSERT INTO `personallog` VALUES ('29856', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 08:56:30', '2016-02-24', '08:56:30');
INSERT INTO `personallog` VALUES ('29857', '2268922110030', '23', '4', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-24 08:57:39', '2016-02-24', '08:57:39');
INSERT INTO `personallog` VALUES ('29858', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 09:07:35', '2016-02-24', '09:07:35');
INSERT INTO `personallog` VALUES ('29859', '2268922110030', '12', '4', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 09:09:19', '2016-02-24', '09:09:19');
INSERT INTO `personallog` VALUES ('29860', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 09:30:14', '2016-02-24', '09:30:14');
INSERT INTO `personallog` VALUES ('29861', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-24 09:40:29', '2016-02-24', '09:40:29');
INSERT INTO `personallog` VALUES ('29862', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-24 09:52:04', '2016-02-24', '09:52:04');
INSERT INTO `personallog` VALUES ('29863', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-24 09:52:48', '2016-02-24', '09:52:48');
INSERT INTO `personallog` VALUES ('29864', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 10:17:58', '2016-02-24', '10:17:58');
INSERT INTO `personallog` VALUES ('29865', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 10:19:17', '2016-02-24', '10:19:17');
INSERT INTO `personallog` VALUES ('29866', '2268922110030', '18', '4', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-24 10:21:54', '2016-02-24', '10:21:54');
INSERT INTO `personallog` VALUES ('29867', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 10:23:29', '2016-02-24', '10:23:29');
INSERT INTO `personallog` VALUES ('29868', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 10:25:17', '2016-02-24', '10:25:17');
INSERT INTO `personallog` VALUES ('29869', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-24 10:26:25', '2016-02-24', '10:26:25');
INSERT INTO `personallog` VALUES ('29870', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 10:39:00', '2016-02-24', '10:39:00');
INSERT INTO `personallog` VALUES ('29871', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 10:41:14', '2016-02-24', '10:41:14');
INSERT INTO `personallog` VALUES ('29872', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 10:41:46', '2016-02-24', '10:41:46');
INSERT INTO `personallog` VALUES ('29873', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 10:47:11', '2016-02-24', '10:47:11');
INSERT INTO `personallog` VALUES ('29874', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-24 11:08:37', '2016-02-24', '11:08:37');
INSERT INTO `personallog` VALUES ('29875', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-24 11:15:35', '2016-02-24', '11:15:35');
INSERT INTO `personallog` VALUES ('29876', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 11:16:47', '2016-02-24', '11:16:47');
INSERT INTO `personallog` VALUES ('29877', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 11:45:40', '2016-02-24', '11:45:40');
INSERT INTO `personallog` VALUES ('29878', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-24 11:46:06', '2016-02-24', '11:46:06');
INSERT INTO `personallog` VALUES ('29879', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 11:52:32', '2016-02-24', '11:52:32');
INSERT INTO `personallog` VALUES ('29880', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 11:57:46', '2016-02-24', '11:57:46');
INSERT INTO `personallog` VALUES ('29881', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-24 11:59:48', '2016-02-24', '11:59:48');
INSERT INTO `personallog` VALUES ('29882', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-24 12:02:16', '2016-02-24', '12:02:16');
INSERT INTO `personallog` VALUES ('29883', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-24 12:03:59', '2016-02-24', '12:03:59');
INSERT INTO `personallog` VALUES ('29884', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-24 12:08:30', '2016-02-24', '12:08:30');
INSERT INTO `personallog` VALUES ('29885', '2268922110030', '49', '5', '2016-06-17 01:50:09', 'Heri', 'Online', '2016-02-24 12:26:52', '2016-02-24', '12:26:52');
INSERT INTO `personallog` VALUES ('29886', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 13:01:32', '2016-02-24', '13:01:32');
INSERT INTO `personallog` VALUES ('29887', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 13:20:48', '2016-02-24', '13:20:48');
INSERT INTO `personallog` VALUES ('29888', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-24 13:25:58', '2016-02-24', '13:25:58');
INSERT INTO `personallog` VALUES ('29889', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 13:29:28', '2016-02-24', '13:29:28');
INSERT INTO `personallog` VALUES ('29890', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 13:54:26', '2016-02-24', '13:54:26');
INSERT INTO `personallog` VALUES ('29891', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 14:13:09', '2016-02-24', '14:13:09');
INSERT INTO `personallog` VALUES ('29892', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 14:37:20', '2016-02-24', '14:37:20');
INSERT INTO `personallog` VALUES ('29893', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-24 14:38:49', '2016-02-24', '14:38:49');
INSERT INTO `personallog` VALUES ('29894', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 14:43:10', '2016-02-24', '14:43:10');
INSERT INTO `personallog` VALUES ('29895', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 14:48:38', '2016-02-24', '14:48:38');
INSERT INTO `personallog` VALUES ('29896', '2268922110030', '53', '5', '2016-06-17 01:50:09', 'Card.Stephen', 'Online', '2016-02-24 14:49:54', '2016-02-24', '14:49:54');
INSERT INTO `personallog` VALUES ('29897', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 14:52:10', '2016-02-24', '14:52:10');
INSERT INTO `personallog` VALUES ('29898', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-24 14:53:05', '2016-02-24', '14:53:05');
INSERT INTO `personallog` VALUES ('29899', '2268922110030', '54', '5', '2016-06-17 01:50:09', 'Card.Ailey', 'Online', '2016-02-24 15:21:49', '2016-02-24', '15:21:49');
INSERT INTO `personallog` VALUES ('29900', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-24 15:33:17', '2016-02-24', '15:33:17');
INSERT INTO `personallog` VALUES ('29901', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-24 15:48:10', '2016-02-24', '15:48:10');
INSERT INTO `personallog` VALUES ('29902', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 16:02:23', '2016-02-24', '16:02:23');
INSERT INTO `personallog` VALUES ('29903', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-24 16:02:36', '2016-02-24', '16:02:36');
INSERT INTO `personallog` VALUES ('29904', '2268922110030', '18', '5', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-24 16:08:05', '2016-02-24', '16:08:05');
INSERT INTO `personallog` VALUES ('29905', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 16:21:29', '2016-02-24', '16:21:29');
INSERT INTO `personallog` VALUES ('29906', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 16:22:49', '2016-02-24', '16:22:49');
INSERT INTO `personallog` VALUES ('29907', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 16:25:04', '2016-02-24', '16:25:04');
INSERT INTO `personallog` VALUES ('29908', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 16:25:05', '2016-02-24', '16:25:05');
INSERT INTO `personallog` VALUES ('29909', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 16:39:44', '2016-02-24', '16:39:44');
INSERT INTO `personallog` VALUES ('29910', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 16:51:38', '2016-02-24', '16:51:38');
INSERT INTO `personallog` VALUES ('29911', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-24 16:54:39', '2016-02-24', '16:54:39');
INSERT INTO `personallog` VALUES ('29912', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-24 16:55:02', '2016-02-24', '16:55:02');
INSERT INTO `personallog` VALUES ('29913', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 17:00:18', '2016-02-24', '17:00:18');
INSERT INTO `personallog` VALUES ('29914', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-24 17:06:35', '2016-02-24', '17:06:35');
INSERT INTO `personallog` VALUES ('29915', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-24 17:07:07', '2016-02-24', '17:07:07');
INSERT INTO `personallog` VALUES ('29916', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 17:09:11', '2016-02-24', '17:09:11');
INSERT INTO `personallog` VALUES ('29917', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 17:17:29', '2016-02-24', '17:17:29');
INSERT INTO `personallog` VALUES ('29918', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-24 17:18:29', '2016-02-24', '17:18:29');
INSERT INTO `personallog` VALUES ('29919', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-24 17:26:56', '2016-02-24', '17:26:56');
INSERT INTO `personallog` VALUES ('29920', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-24 17:33:20', '2016-02-24', '17:33:20');
INSERT INTO `personallog` VALUES ('29921', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-24 17:34:48', '2016-02-24', '17:34:48');
INSERT INTO `personallog` VALUES ('29922', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-24 17:35:35', '2016-02-24', '17:35:35');
INSERT INTO `personallog` VALUES ('29923', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-24 17:37:54', '2016-02-24', '17:37:54');
INSERT INTO `personallog` VALUES ('29924', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-24 17:40:21', '2016-02-24', '17:40:21');
INSERT INTO `personallog` VALUES ('29925', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-24 17:40:52', '2016-02-24', '17:40:52');
INSERT INTO `personallog` VALUES ('29926', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-24 17:41:37', '2016-02-24', '17:41:37');
INSERT INTO `personallog` VALUES ('29927', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-24 17:42:21', '2016-02-24', '17:42:21');
INSERT INTO `personallog` VALUES ('29928', '2268922110030', '13', '1', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-24 17:45:30', '2016-02-24', '17:45:30');
INSERT INTO `personallog` VALUES ('29929', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-24 17:48:59', '2016-02-24', '17:48:59');
INSERT INTO `personallog` VALUES ('29930', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-24 17:49:08', '2016-02-24', '17:49:08');
INSERT INTO `personallog` VALUES ('29931', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-24 17:50:38', '2016-02-24', '17:50:38');
INSERT INTO `personallog` VALUES ('29932', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 17:51:23', '2016-02-24', '17:51:23');
INSERT INTO `personallog` VALUES ('29933', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-24 17:52:07', '2016-02-24', '17:52:07');
INSERT INTO `personallog` VALUES ('29934', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-24 17:52:11', '2016-02-24', '17:52:11');
INSERT INTO `personallog` VALUES ('29935', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-24 18:13:48', '2016-02-24', '18:13:48');
INSERT INTO `personallog` VALUES ('29936', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-24 18:56:55', '2016-02-24', '18:56:55');
INSERT INTO `personallog` VALUES ('29937', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-24 20:11:30', '2016-02-24', '20:11:30');
INSERT INTO `personallog` VALUES ('29938', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-24 20:11:38', '2016-02-24', '20:11:38');
INSERT INTO `personallog` VALUES ('29939', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-24 20:11:40', '2016-02-24', '20:11:40');
INSERT INTO `personallog` VALUES ('29940', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 07:11:32', '2016-02-25', '07:11:32');
INSERT INTO `personallog` VALUES ('29941', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-25 07:11:37', '2016-02-25', '07:11:37');
INSERT INTO `personallog` VALUES ('29942', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 07:35:41', '2016-02-25', '07:35:41');
INSERT INTO `personallog` VALUES ('29943', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 07:42:04', '2016-02-25', '07:42:04');
INSERT INTO `personallog` VALUES ('29944', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 07:50:11', '2016-02-25', '07:50:11');
INSERT INTO `personallog` VALUES ('29945', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-25 07:50:54', '2016-02-25', '07:50:54');
INSERT INTO `personallog` VALUES ('29946', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-25 08:01:36', '2016-02-25', '08:01:36');
INSERT INTO `personallog` VALUES ('29947', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-25 08:07:18', '2016-02-25', '08:07:18');
INSERT INTO `personallog` VALUES ('29948', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-25 08:10:39', '2016-02-25', '08:10:39');
INSERT INTO `personallog` VALUES ('29949', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-25 08:10:41', '2016-02-25', '08:10:41');
INSERT INTO `personallog` VALUES ('29950', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-02-25 08:17:38', '2016-02-25', '08:17:38');
INSERT INTO `personallog` VALUES ('29951', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-25 08:21:43', '2016-02-25', '08:21:43');
INSERT INTO `personallog` VALUES ('29952', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-25 08:22:04', '2016-02-25', '08:22:04');
INSERT INTO `personallog` VALUES ('29953', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 08:29:31', '2016-02-25', '08:29:31');
INSERT INTO `personallog` VALUES ('29954', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-25 08:30:45', '2016-02-25', '08:30:45');
INSERT INTO `personallog` VALUES ('29955', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-25 08:31:45', '2016-02-25', '08:31:45');
INSERT INTO `personallog` VALUES ('29956', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 08:33:53', '2016-02-25', '08:33:53');
INSERT INTO `personallog` VALUES ('29957', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-25 08:36:17', '2016-02-25', '08:36:17');
INSERT INTO `personallog` VALUES ('29958', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 08:36:32', '2016-02-25', '08:36:32');
INSERT INTO `personallog` VALUES ('29959', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-25 08:39:06', '2016-02-25', '08:39:06');
INSERT INTO `personallog` VALUES ('29960', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-25 08:39:08', '2016-02-25', '08:39:08');
INSERT INTO `personallog` VALUES ('29961', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 08:39:16', '2016-02-25', '08:39:16');
INSERT INTO `personallog` VALUES ('29962', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-25 08:52:23', '2016-02-25', '08:52:23');
INSERT INTO `personallog` VALUES ('29963', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-25 08:54:31', '2016-02-25', '08:54:31');
INSERT INTO `personallog` VALUES ('29964', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-25 08:55:53', '2016-02-25', '08:55:53');
INSERT INTO `personallog` VALUES ('29965', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 08:56:16', '2016-02-25', '08:56:16');
INSERT INTO `personallog` VALUES ('29966', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 08:58:02', '2016-02-25', '08:58:02');
INSERT INTO `personallog` VALUES ('29967', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-25 09:13:59', '2016-02-25', '09:13:59');
INSERT INTO `personallog` VALUES ('29968', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 09:23:20', '2016-02-25', '09:23:20');
INSERT INTO `personallog` VALUES ('29969', '2268922110030', '50', '5', '2016-06-17 01:50:09', 'Card.Alfari', 'Online', '2016-02-25 09:25:25', '2016-02-25', '09:25:25');
INSERT INTO `personallog` VALUES ('29970', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-25 09:27:48', '2016-02-25', '09:27:48');
INSERT INTO `personallog` VALUES ('29971', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-25 09:31:27', '2016-02-25', '09:31:27');
INSERT INTO `personallog` VALUES ('29972', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-25 09:32:51', '2016-02-25', '09:32:51');
INSERT INTO `personallog` VALUES ('29973', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 09:50:02', '2016-02-25', '09:50:02');
INSERT INTO `personallog` VALUES ('29974', '2268922110030', '24', '5', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-25 09:51:36', '2016-02-25', '09:51:36');
INSERT INTO `personallog` VALUES ('29975', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-25 09:53:40', '2016-02-25', '09:53:40');
INSERT INTO `personallog` VALUES ('29976', '2268922110030', '23', '5', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-25 09:54:28', '2016-02-25', '09:54:28');
INSERT INTO `personallog` VALUES ('29977', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-25 09:56:04', '2016-02-25', '09:56:04');
INSERT INTO `personallog` VALUES ('29978', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 10:09:29', '2016-02-25', '10:09:29');
INSERT INTO `personallog` VALUES ('29979', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 10:09:51', '2016-02-25', '10:09:51');
INSERT INTO `personallog` VALUES ('29980', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 10:24:05', '2016-02-25', '10:24:05');
INSERT INTO `personallog` VALUES ('29981', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-25 10:40:18', '2016-02-25', '10:40:18');
INSERT INTO `personallog` VALUES ('29982', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 10:45:29', '2016-02-25', '10:45:29');
INSERT INTO `personallog` VALUES ('29983', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-25 10:52:35', '2016-02-25', '10:52:35');
INSERT INTO `personallog` VALUES ('29984', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 10:55:50', '2016-02-25', '10:55:50');
INSERT INTO `personallog` VALUES ('29985', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 11:01:27', '2016-02-25', '11:01:27');
INSERT INTO `personallog` VALUES ('29986', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 11:02:00', '2016-02-25', '11:02:00');
INSERT INTO `personallog` VALUES ('29987', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 11:06:40', '2016-02-25', '11:06:40');
INSERT INTO `personallog` VALUES ('29988', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-25 11:07:07', '2016-02-25', '11:07:07');
INSERT INTO `personallog` VALUES ('29989', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 11:13:54', '2016-02-25', '11:13:54');
INSERT INTO `personallog` VALUES ('29990', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-25 11:16:13', '2016-02-25', '11:16:13');
INSERT INTO `personallog` VALUES ('29991', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 11:25:00', '2016-02-25', '11:25:00');
INSERT INTO `personallog` VALUES ('29992', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 11:35:55', '2016-02-25', '11:35:55');
INSERT INTO `personallog` VALUES ('29993', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 11:36:08', '2016-02-25', '11:36:08');
INSERT INTO `personallog` VALUES ('29994', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 11:37:23', '2016-02-25', '11:37:23');
INSERT INTO `personallog` VALUES ('29995', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 11:48:19', '2016-02-25', '11:48:19');
INSERT INTO `personallog` VALUES ('29996', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 11:48:54', '2016-02-25', '11:48:54');
INSERT INTO `personallog` VALUES ('29997', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-25 11:50:44', '2016-02-25', '11:50:44');
INSERT INTO `personallog` VALUES ('29998', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 11:53:09', '2016-02-25', '11:53:09');
INSERT INTO `personallog` VALUES ('29999', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-25 11:53:51', '2016-02-25', '11:53:51');
INSERT INTO `personallog` VALUES ('30000', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 11:58:51', '2016-02-25', '11:58:51');
INSERT INTO `personallog` VALUES ('30001', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-25 12:02:53', '2016-02-25', '12:02:53');
INSERT INTO `personallog` VALUES ('30002', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 12:15:40', '2016-02-25', '12:15:40');
INSERT INTO `personallog` VALUES ('30003', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-25 12:16:38', '2016-02-25', '12:16:38');
INSERT INTO `personallog` VALUES ('30004', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 12:51:35', '2016-02-25', '12:51:35');
INSERT INTO `personallog` VALUES ('30005', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 13:01:01', '2016-02-25', '13:01:01');
INSERT INTO `personallog` VALUES ('30006', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-25 13:01:31', '2016-02-25', '13:01:31');
INSERT INTO `personallog` VALUES ('30007', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-25 13:04:39', '2016-02-25', '13:04:39');
INSERT INTO `personallog` VALUES ('30008', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-25 13:06:01', '2016-02-25', '13:06:01');
INSERT INTO `personallog` VALUES ('30009', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 13:09:08', '2016-02-25', '13:09:08');
INSERT INTO `personallog` VALUES ('30010', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 13:18:16', '2016-02-25', '13:18:16');
INSERT INTO `personallog` VALUES ('30011', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 13:52:26', '2016-02-25', '13:52:26');
INSERT INTO `personallog` VALUES ('30012', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 13:55:13', '2016-02-25', '13:55:13');
INSERT INTO `personallog` VALUES ('30013', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-25 14:04:46', '2016-02-25', '14:04:46');
INSERT INTO `personallog` VALUES ('30014', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-25 14:11:52', '2016-02-25', '14:11:52');
INSERT INTO `personallog` VALUES ('30015', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-25 14:17:32', '2016-02-25', '14:17:32');
INSERT INTO `personallog` VALUES ('30016', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 14:23:28', '2016-02-25', '14:23:28');
INSERT INTO `personallog` VALUES ('30017', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-25 14:28:03', '2016-02-25', '14:28:03');
INSERT INTO `personallog` VALUES ('30018', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 14:40:51', '2016-02-25', '14:40:51');
INSERT INTO `personallog` VALUES ('30019', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 14:56:39', '2016-02-25', '14:56:39');
INSERT INTO `personallog` VALUES ('30020', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 14:56:40', '2016-02-25', '14:56:40');
INSERT INTO `personallog` VALUES ('30021', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-25 15:05:00', '2016-02-25', '15:05:00');
INSERT INTO `personallog` VALUES ('30022', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 15:10:00', '2016-02-25', '15:10:00');
INSERT INTO `personallog` VALUES ('30023', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-25 15:14:06', '2016-02-25', '15:14:06');
INSERT INTO `personallog` VALUES ('30024', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 15:15:46', '2016-02-25', '15:15:46');
INSERT INTO `personallog` VALUES ('30025', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 15:23:40', '2016-02-25', '15:23:40');
INSERT INTO `personallog` VALUES ('30026', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 15:32:06', '2016-02-25', '15:32:06');
INSERT INTO `personallog` VALUES ('30027', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 15:41:23', '2016-02-25', '15:41:23');
INSERT INTO `personallog` VALUES ('30028', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 15:41:37', '2016-02-25', '15:41:37');
INSERT INTO `personallog` VALUES ('30029', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 15:46:36', '2016-02-25', '15:46:36');
INSERT INTO `personallog` VALUES ('30030', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-25 16:01:07', '2016-02-25', '16:01:07');
INSERT INTO `personallog` VALUES ('30031', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 16:22:11', '2016-02-25', '16:22:11');
INSERT INTO `personallog` VALUES ('30032', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-25 16:28:31', '2016-02-25', '16:28:31');
INSERT INTO `personallog` VALUES ('30033', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 16:29:18', '2016-02-25', '16:29:18');
INSERT INTO `personallog` VALUES ('30034', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-25 16:31:42', '2016-02-25', '16:31:42');
INSERT INTO `personallog` VALUES ('30035', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 16:37:41', '2016-02-25', '16:37:41');
INSERT INTO `personallog` VALUES ('30036', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 16:38:14', '2016-02-25', '16:38:14');
INSERT INTO `personallog` VALUES ('30037', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-25 16:43:57', '2016-02-25', '16:43:57');
INSERT INTO `personallog` VALUES ('30038', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 16:49:22', '2016-02-25', '16:49:22');
INSERT INTO `personallog` VALUES ('30039', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 16:55:50', '2016-02-25', '16:55:50');
INSERT INTO `personallog` VALUES ('30040', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-25 17:03:00', '2016-02-25', '17:03:00');
INSERT INTO `personallog` VALUES ('30041', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-25 17:05:21', '2016-02-25', '17:05:21');
INSERT INTO `personallog` VALUES ('30042', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 17:10:11', '2016-02-25', '17:10:11');
INSERT INTO `personallog` VALUES ('30043', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 17:18:45', '2016-02-25', '17:18:45');
INSERT INTO `personallog` VALUES ('30044', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-25 17:23:34', '2016-02-25', '17:23:34');
INSERT INTO `personallog` VALUES ('30045', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-25 17:25:12', '2016-02-25', '17:25:12');
INSERT INTO `personallog` VALUES ('30046', '2268922110030', '32', '5', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-25 17:30:27', '2016-02-25', '17:30:27');
INSERT INTO `personallog` VALUES ('30047', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-25 17:31:37', '2016-02-25', '17:31:37');
INSERT INTO `personallog` VALUES ('30048', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 17:36:11', '2016-02-25', '17:36:11');
INSERT INTO `personallog` VALUES ('30049', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-25 17:38:04', '2016-02-25', '17:38:04');
INSERT INTO `personallog` VALUES ('30050', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-25 17:38:10', '2016-02-25', '17:38:10');
INSERT INTO `personallog` VALUES ('30051', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-25 17:38:27', '2016-02-25', '17:38:27');
INSERT INTO `personallog` VALUES ('30052', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-25 17:38:32', '2016-02-25', '17:38:32');
INSERT INTO `personallog` VALUES ('30053', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-25 17:38:37', '2016-02-25', '17:38:37');
INSERT INTO `personallog` VALUES ('30054', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-25 17:45:45', '2016-02-25', '17:45:45');
INSERT INTO `personallog` VALUES ('30055', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-25 17:45:47', '2016-02-25', '17:45:47');
INSERT INTO `personallog` VALUES ('30056', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-25 17:52:02', '2016-02-25', '17:52:02');
INSERT INTO `personallog` VALUES ('30057', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-25 17:56:42', '2016-02-25', '17:56:42');
INSERT INTO `personallog` VALUES ('30058', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 18:53:05', '2016-02-25', '18:53:05');
INSERT INTO `personallog` VALUES ('30059', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 20:49:40', '2016-02-25', '20:49:40');
INSERT INTO `personallog` VALUES ('30060', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-25 20:49:41', '2016-02-25', '20:49:41');
INSERT INTO `personallog` VALUES ('30061', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-26 07:51:35', '2016-02-26', '07:51:35');
INSERT INTO `personallog` VALUES ('30062', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 08:02:41', '2016-02-26', '08:02:41');
INSERT INTO `personallog` VALUES ('30063', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-26 08:13:28', '2016-02-26', '08:13:28');
INSERT INTO `personallog` VALUES ('30064', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-26 08:17:19', '2016-02-26', '08:17:19');
INSERT INTO `personallog` VALUES ('30065', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-26 08:17:51', '2016-02-26', '08:17:51');
INSERT INTO `personallog` VALUES ('30066', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-26 08:18:41', '2016-02-26', '08:18:41');
INSERT INTO `personallog` VALUES ('30067', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-26 08:20:11', '2016-02-26', '08:20:11');
INSERT INTO `personallog` VALUES ('30068', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-26 08:20:13', '2016-02-26', '08:20:13');
INSERT INTO `personallog` VALUES ('30069', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 08:21:22', '2016-02-26', '08:21:22');
INSERT INTO `personallog` VALUES ('30070', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 08:24:55', '2016-02-26', '08:24:55');
INSERT INTO `personallog` VALUES ('30071', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 08:26:18', '2016-02-26', '08:26:18');
INSERT INTO `personallog` VALUES ('30072', '2268922110030', '26', '4', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-26 08:33:59', '2016-02-26', '08:33:59');
INSERT INTO `personallog` VALUES ('30073', '2268922110030', '43', '4', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-02-26 08:34:22', '2016-02-26', '08:34:22');
INSERT INTO `personallog` VALUES ('30074', '2268922110030', '23', '4', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-26 08:36:34', '2016-02-26', '08:36:34');
INSERT INTO `personallog` VALUES ('30075', '2268922110030', '36', '4', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-26 08:45:50', '2016-02-26', '08:45:50');
INSERT INTO `personallog` VALUES ('30076', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-26 08:46:12', '2016-02-26', '08:46:12');
INSERT INTO `personallog` VALUES ('30077', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-26 08:47:38', '2016-02-26', '08:47:38');
INSERT INTO `personallog` VALUES ('30078', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-26 08:47:40', '2016-02-26', '08:47:40');
INSERT INTO `personallog` VALUES ('30079', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-26 08:49:49', '2016-02-26', '08:49:49');
INSERT INTO `personallog` VALUES ('30080', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-26 08:51:54', '2016-02-26', '08:51:54');
INSERT INTO `personallog` VALUES ('30081', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-26 08:59:23', '2016-02-26', '08:59:23');
INSERT INTO `personallog` VALUES ('30082', '2268922110030', '12', '0', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-26 09:07:49', '2016-02-26', '09:07:49');
INSERT INTO `personallog` VALUES ('30083', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-26 09:12:54', '2016-02-26', '09:12:54');
INSERT INTO `personallog` VALUES ('30084', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 09:21:10', '2016-02-26', '09:21:10');
INSERT INTO `personallog` VALUES ('30085', '2268922110030', '23', '0', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-26 09:21:20', '2016-02-26', '09:21:20');
INSERT INTO `personallog` VALUES ('30086', '2268922110030', '23', '0', '2016-06-17 01:50:09', 'Card.Julius', 'Online', '2016-02-26 09:25:47', '2016-02-26', '09:25:47');
INSERT INTO `personallog` VALUES ('30087', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-26 09:31:19', '2016-02-26', '09:31:19');
INSERT INTO `personallog` VALUES ('30088', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-26 09:31:21', '2016-02-26', '09:31:21');
INSERT INTO `personallog` VALUES ('30089', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-26 09:34:11', '2016-02-26', '09:34:11');
INSERT INTO `personallog` VALUES ('30090', '2268922110030', '44', '0', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-02-26 09:35:07', '2016-02-26', '09:35:07');
INSERT INTO `personallog` VALUES ('30091', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-26 09:48:19', '2016-02-26', '09:48:19');
INSERT INTO `personallog` VALUES ('30092', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 09:55:39', '2016-02-26', '09:55:39');
INSERT INTO `personallog` VALUES ('30093', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 10:02:34', '2016-02-26', '10:02:34');
INSERT INTO `personallog` VALUES ('30094', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-26 10:05:08', '2016-02-26', '10:05:08');
INSERT INTO `personallog` VALUES ('30095', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-26 10:09:55', '2016-02-26', '10:09:55');
INSERT INTO `personallog` VALUES ('30096', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 10:16:38', '2016-02-26', '10:16:38');
INSERT INTO `personallog` VALUES ('30097', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-26 10:17:17', '2016-02-26', '10:17:17');
INSERT INTO `personallog` VALUES ('30098', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-26 10:39:21', '2016-02-26', '10:39:21');
INSERT INTO `personallog` VALUES ('30099', '2268922110030', '18', '4', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-26 10:58:27', '2016-02-26', '10:58:27');
INSERT INTO `personallog` VALUES ('30100', '2268922110030', '18', '4', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-02-26 11:00:17', '2016-02-26', '11:00:17');
INSERT INTO `personallog` VALUES ('30101', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-26 11:17:52', '2016-02-26', '11:17:52');
INSERT INTO `personallog` VALUES ('30102', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 11:24:02', '2016-02-26', '11:24:02');
INSERT INTO `personallog` VALUES ('30103', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 11:26:53', '2016-02-26', '11:26:53');
INSERT INTO `personallog` VALUES ('30104', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-26 11:39:04', '2016-02-26', '11:39:04');
INSERT INTO `personallog` VALUES ('30105', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-26 11:49:12', '2016-02-26', '11:49:12');
INSERT INTO `personallog` VALUES ('30106', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 11:50:26', '2016-02-26', '11:50:26');
INSERT INTO `personallog` VALUES ('30107', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-26 11:51:57', '2016-02-26', '11:51:57');
INSERT INTO `personallog` VALUES ('30108', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-26 11:56:10', '2016-02-26', '11:56:10');
INSERT INTO `personallog` VALUES ('30109', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-26 12:13:23', '2016-02-26', '12:13:23');
INSERT INTO `personallog` VALUES ('30110', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-26 12:53:22', '2016-02-26', '12:53:22');
INSERT INTO `personallog` VALUES ('30111', '2268922110030', '49', '5', '2016-06-17 01:50:09', 'Heri', 'Online', '2016-02-26 12:56:40', '2016-02-26', '12:56:40');
INSERT INTO `personallog` VALUES ('30112', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-26 13:05:28', '2016-02-26', '13:05:28');
INSERT INTO `personallog` VALUES ('30113', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 13:09:06', '2016-02-26', '13:09:06');
INSERT INTO `personallog` VALUES ('30114', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 13:20:29', '2016-02-26', '13:20:29');
INSERT INTO `personallog` VALUES ('30115', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 13:22:51', '2016-02-26', '13:22:51');
INSERT INTO `personallog` VALUES ('30116', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-26 13:29:07', '2016-02-26', '13:29:07');
INSERT INTO `personallog` VALUES ('30117', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 13:47:20', '2016-02-26', '13:47:20');
INSERT INTO `personallog` VALUES ('30118', '2268922110030', '52', '5', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-02-26 14:06:38', '2016-02-26', '14:06:38');
INSERT INTO `personallog` VALUES ('30119', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-26 14:08:01', '2016-02-26', '14:08:01');
INSERT INTO `personallog` VALUES ('30120', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 14:19:19', '2016-02-26', '14:19:19');
INSERT INTO `personallog` VALUES ('30121', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-26 14:22:38', '2016-02-26', '14:22:38');
INSERT INTO `personallog` VALUES ('30122', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 14:32:25', '2016-02-26', '14:32:25');
INSERT INTO `personallog` VALUES ('30123', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 14:32:36', '2016-02-26', '14:32:36');
INSERT INTO `personallog` VALUES ('30124', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-26 15:18:07', '2016-02-26', '15:18:07');
INSERT INTO `personallog` VALUES ('30125', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-26 15:19:47', '2016-02-26', '15:19:47');
INSERT INTO `personallog` VALUES ('30126', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-26 15:22:23', '2016-02-26', '15:22:23');
INSERT INTO `personallog` VALUES ('30127', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-26 15:25:44', '2016-02-26', '15:25:44');
INSERT INTO `personallog` VALUES ('30128', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-26 15:32:31', '2016-02-26', '15:32:31');
INSERT INTO `personallog` VALUES ('30129', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 15:33:16', '2016-02-26', '15:33:16');
INSERT INTO `personallog` VALUES ('30130', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 15:37:01', '2016-02-26', '15:37:01');
INSERT INTO `personallog` VALUES ('30131', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 15:39:16', '2016-02-26', '15:39:16');
INSERT INTO `personallog` VALUES ('30132', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 15:41:07', '2016-02-26', '15:41:07');
INSERT INTO `personallog` VALUES ('30133', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 15:48:53', '2016-02-26', '15:48:53');
INSERT INTO `personallog` VALUES ('30134', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 15:52:41', '2016-02-26', '15:52:41');
INSERT INTO `personallog` VALUES ('30135', '2268922110030', '53', '5', '2016-06-17 01:50:09', 'Card.Stephen', 'Online', '2016-02-26 15:57:19', '2016-02-26', '15:57:19');
INSERT INTO `personallog` VALUES ('30136', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 16:10:13', '2016-02-26', '16:10:13');
INSERT INTO `personallog` VALUES ('30137', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-26 16:20:07', '2016-02-26', '16:20:07');
INSERT INTO `personallog` VALUES ('30138', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 16:24:50', '2016-02-26', '16:24:50');
INSERT INTO `personallog` VALUES ('30139', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 16:29:06', '2016-02-26', '16:29:06');
INSERT INTO `personallog` VALUES ('30140', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-26 16:32:33', '2016-02-26', '16:32:33');
INSERT INTO `personallog` VALUES ('30141', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 16:45:47', '2016-02-26', '16:45:47');
INSERT INTO `personallog` VALUES ('30142', '2268922110030', '12', '5', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-26 16:47:54', '2016-02-26', '16:47:54');
INSERT INTO `personallog` VALUES ('30143', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-26 16:56:23', '2016-02-26', '16:56:23');
INSERT INTO `personallog` VALUES ('30144', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-26 17:16:37', '2016-02-26', '17:16:37');
INSERT INTO `personallog` VALUES ('30145', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-26 17:18:01', '2016-02-26', '17:18:01');
INSERT INTO `personallog` VALUES ('30146', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 17:27:04', '2016-02-26', '17:27:04');
INSERT INTO `personallog` VALUES ('30147', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 17:29:29', '2016-02-26', '17:29:29');
INSERT INTO `personallog` VALUES ('30148', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-26 17:31:31', '2016-02-26', '17:31:31');
INSERT INTO `personallog` VALUES ('30149', '2268922110030', '14', '1', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-26 17:31:42', '2016-02-26', '17:31:42');
INSERT INTO `personallog` VALUES ('30150', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-26 17:32:00', '2016-02-26', '17:32:00');
INSERT INTO `personallog` VALUES ('30151', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-26 17:35:05', '2016-02-26', '17:35:05');
INSERT INTO `personallog` VALUES ('30152', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-26 17:35:14', '2016-02-26', '17:35:14');
INSERT INTO `personallog` VALUES ('30153', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-26 17:38:15', '2016-02-26', '17:38:15');
INSERT INTO `personallog` VALUES ('30154', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-26 17:47:54', '2016-02-26', '17:47:54');
INSERT INTO `personallog` VALUES ('30155', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-26 18:27:28', '2016-02-26', '18:27:28');
INSERT INTO `personallog` VALUES ('30156', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-26 18:27:40', '2016-02-26', '18:27:40');
INSERT INTO `personallog` VALUES ('30157', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-26 19:10:36', '2016-02-26', '19:10:36');
INSERT INTO `personallog` VALUES ('30158', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-26 19:10:37', '2016-02-26', '19:10:37');
INSERT INTO `personallog` VALUES ('30159', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-26 19:10:57', '2016-02-26', '19:10:57');
INSERT INTO `personallog` VALUES ('30160', '2268922110030', '11', '1', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-27 13:12:40', '2016-02-27', '13:12:40');
INSERT INTO `personallog` VALUES ('30161', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-28 15:20:18', '2016-02-28', '15:20:18');
INSERT INTO `personallog` VALUES ('30162', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-29 07:01:19', '2016-02-29', '07:01:19');
INSERT INTO `personallog` VALUES ('30163', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 07:20:52', '2016-02-29', '07:20:52');
INSERT INTO `personallog` VALUES ('30164', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 07:22:33', '2016-02-29', '07:22:33');
INSERT INTO `personallog` VALUES ('30165', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-02-29 07:28:15', '2016-02-29', '07:28:15');
INSERT INTO `personallog` VALUES ('30166', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-02-29 07:40:39', '2016-02-29', '07:40:39');
INSERT INTO `personallog` VALUES ('30167', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-29 07:55:42', '2016-02-29', '07:55:42');
INSERT INTO `personallog` VALUES ('30168', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 08:03:19', '2016-02-29', '08:03:19');
INSERT INTO `personallog` VALUES ('30169', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-29 08:04:28', '2016-02-29', '08:04:28');
INSERT INTO `personallog` VALUES ('30170', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 08:12:40', '2016-02-29', '08:12:40');
INSERT INTO `personallog` VALUES ('30171', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-29 08:17:46', '2016-02-29', '08:17:46');
INSERT INTO `personallog` VALUES ('30172', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-02-29 08:19:19', '2016-02-29', '08:19:19');
INSERT INTO `personallog` VALUES ('30173', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-29 08:21:42', '2016-02-29', '08:21:42');
INSERT INTO `personallog` VALUES ('30174', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-29 08:24:26', '2016-02-29', '08:24:26');
INSERT INTO `personallog` VALUES ('30175', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-29 08:26:27', '2016-02-29', '08:26:27');
INSERT INTO `personallog` VALUES ('30176', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-29 08:36:52', '2016-02-29', '08:36:52');
INSERT INTO `personallog` VALUES ('30177', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-29 08:37:15', '2016-02-29', '08:37:15');
INSERT INTO `personallog` VALUES ('30178', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-29 08:38:55', '2016-02-29', '08:38:55');
INSERT INTO `personallog` VALUES ('30179', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 08:44:05', '2016-02-29', '08:44:05');
INSERT INTO `personallog` VALUES ('30180', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-29 08:47:29', '2016-02-29', '08:47:29');
INSERT INTO `personallog` VALUES ('30181', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-29 08:47:31', '2016-02-29', '08:47:31');
INSERT INTO `personallog` VALUES ('30182', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 08:49:15', '2016-02-29', '08:49:15');
INSERT INTO `personallog` VALUES ('30183', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 08:55:10', '2016-02-29', '08:55:10');
INSERT INTO `personallog` VALUES ('30184', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 09:00:01', '2016-02-29', '09:00:01');
INSERT INTO `personallog` VALUES ('30185', '2268922110030', '52', '0', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-02-29 09:02:33', '2016-02-29', '09:02:33');
INSERT INTO `personallog` VALUES ('30186', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 09:05:01', '2016-02-29', '09:05:01');
INSERT INTO `personallog` VALUES ('30187', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 09:07:14', '2016-02-29', '09:07:14');
INSERT INTO `personallog` VALUES ('30188', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 09:08:43', '2016-02-29', '09:08:43');
INSERT INTO `personallog` VALUES ('30189', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 09:14:55', '2016-02-29', '09:14:55');
INSERT INTO `personallog` VALUES ('30190', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 09:20:01', '2016-02-29', '09:20:01');
INSERT INTO `personallog` VALUES ('30191', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 09:21:34', '2016-02-29', '09:21:34');
INSERT INTO `personallog` VALUES ('30192', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 09:26:35', '2016-02-29', '09:26:35');
INSERT INTO `personallog` VALUES ('30193', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 09:36:18', '2016-02-29', '09:36:18');
INSERT INTO `personallog` VALUES ('30194', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 09:43:29', '2016-02-29', '09:43:29');
INSERT INTO `personallog` VALUES ('30195', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-29 09:52:38', '2016-02-29', '09:52:38');
INSERT INTO `personallog` VALUES ('30196', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 09:54:25', '2016-02-29', '09:54:25');
INSERT INTO `personallog` VALUES ('30197', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 09:55:25', '2016-02-29', '09:55:25');
INSERT INTO `personallog` VALUES ('30198', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 09:57:26', '2016-02-29', '09:57:26');
INSERT INTO `personallog` VALUES ('30199', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 10:00:34', '2016-02-29', '10:00:34');
INSERT INTO `personallog` VALUES ('30200', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 10:04:58', '2016-02-29', '10:04:58');
INSERT INTO `personallog` VALUES ('30201', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 10:10:15', '2016-02-29', '10:10:15');
INSERT INTO `personallog` VALUES ('30202', '2268922110030', '15', '4', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-29 10:13:32', '2016-02-29', '10:13:32');
INSERT INTO `personallog` VALUES ('30203', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 10:15:00', '2016-02-29', '10:15:00');
INSERT INTO `personallog` VALUES ('30204', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 10:15:25', '2016-02-29', '10:15:25');
INSERT INTO `personallog` VALUES ('30205', '2268922110030', '46', '4', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-02-29 10:19:46', '2016-02-29', '10:19:46');
INSERT INTO `personallog` VALUES ('30206', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 10:21:27', '2016-02-29', '10:21:27');
INSERT INTO `personallog` VALUES ('30207', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-29 10:21:56', '2016-02-29', '10:21:56');
INSERT INTO `personallog` VALUES ('30208', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 10:23:50', '2016-02-29', '10:23:50');
INSERT INTO `personallog` VALUES ('30209', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 10:36:32', '2016-02-29', '10:36:32');
INSERT INTO `personallog` VALUES ('30210', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 10:44:57', '2016-02-29', '10:44:57');
INSERT INTO `personallog` VALUES ('30211', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 10:48:07', '2016-02-29', '10:48:07');
INSERT INTO `personallog` VALUES ('30212', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-02-29 10:53:22', '2016-02-29', '10:53:22');
INSERT INTO `personallog` VALUES ('30213', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-29 10:58:40', '2016-02-29', '10:58:40');
INSERT INTO `personallog` VALUES ('30214', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-29 11:01:30', '2016-02-29', '11:01:30');
INSERT INTO `personallog` VALUES ('30215', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 11:05:37', '2016-02-29', '11:05:37');
INSERT INTO `personallog` VALUES ('30216', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 11:12:48', '2016-02-29', '11:12:48');
INSERT INTO `personallog` VALUES ('30217', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 11:22:53', '2016-02-29', '11:22:53');
INSERT INTO `personallog` VALUES ('30218', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 11:41:29', '2016-02-29', '11:41:29');
INSERT INTO `personallog` VALUES ('30219', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 11:43:33', '2016-02-29', '11:43:33');
INSERT INTO `personallog` VALUES ('30220', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-02-29 11:46:03', '2016-02-29', '11:46:03');
INSERT INTO `personallog` VALUES ('30221', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 11:49:21', '2016-02-29', '11:49:21');
INSERT INTO `personallog` VALUES ('30222', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 12:05:11', '2016-02-29', '12:05:11');
INSERT INTO `personallog` VALUES ('30223', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 12:44:32', '2016-02-29', '12:44:32');
INSERT INTO `personallog` VALUES ('30224', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 12:56:25', '2016-02-29', '12:56:25');
INSERT INTO `personallog` VALUES ('30225', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-29 13:06:52', '2016-02-29', '13:06:52');
INSERT INTO `personallog` VALUES ('30226', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-29 13:10:08', '2016-02-29', '13:10:08');
INSERT INTO `personallog` VALUES ('30227', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 13:20:53', '2016-02-29', '13:20:53');
INSERT INTO `personallog` VALUES ('30228', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 13:24:06', '2016-02-29', '13:24:06');
INSERT INTO `personallog` VALUES ('30229', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 13:26:57', '2016-02-29', '13:26:57');
INSERT INTO `personallog` VALUES ('30230', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 13:27:35', '2016-02-29', '13:27:35');
INSERT INTO `personallog` VALUES ('30231', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 13:37:07', '2016-02-29', '13:37:07');
INSERT INTO `personallog` VALUES ('30232', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 13:45:48', '2016-02-29', '13:45:48');
INSERT INTO `personallog` VALUES ('30233', '2268922110030', '12', '4', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-29 14:13:40', '2016-02-29', '14:13:40');
INSERT INTO `personallog` VALUES ('30234', '2268922110030', '12', '4', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-29 14:31:00', '2016-02-29', '14:31:00');
INSERT INTO `personallog` VALUES ('30235', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 14:43:41', '2016-02-29', '14:43:41');
INSERT INTO `personallog` VALUES ('30236', '2268922110030', '4', '4', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-02-29 14:58:33', '2016-02-29', '14:58:33');
INSERT INTO `personallog` VALUES ('30237', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 15:08:23', '2016-02-29', '15:08:23');
INSERT INTO `personallog` VALUES ('30238', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 15:16:32', '2016-02-29', '15:16:32');
INSERT INTO `personallog` VALUES ('30239', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 15:36:08', '2016-02-29', '15:36:08');
INSERT INTO `personallog` VALUES ('30240', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-02-29 15:37:56', '2016-02-29', '15:37:56');
INSERT INTO `personallog` VALUES ('30241', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-02-29 15:43:11', '2016-02-29', '15:43:11');
INSERT INTO `personallog` VALUES ('30242', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 15:46:12', '2016-02-29', '15:46:12');
INSERT INTO `personallog` VALUES ('30243', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 15:48:18', '2016-02-29', '15:48:18');
INSERT INTO `personallog` VALUES ('30244', '2268922110030', '15', '4', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-02-29 15:48:19', '2016-02-29', '15:48:19');
INSERT INTO `personallog` VALUES ('30245', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 16:19:55', '2016-02-29', '16:19:55');
INSERT INTO `personallog` VALUES ('30246', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-29 16:20:16', '2016-02-29', '16:20:16');
INSERT INTO `personallog` VALUES ('30247', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 16:31:40', '2016-02-29', '16:31:40');
INSERT INTO `personallog` VALUES ('30248', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 16:39:37', '2016-02-29', '16:39:37');
INSERT INTO `personallog` VALUES ('30249', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-02-29 16:40:02', '2016-02-29', '16:40:02');
INSERT INTO `personallog` VALUES ('30250', '2268922110030', '12', '4', '2016-06-17 01:50:09', 'Card.Sisca', 'Online', '2016-02-29 16:49:53', '2016-02-29', '16:49:53');
INSERT INTO `personallog` VALUES ('30251', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 16:51:51', '2016-02-29', '16:51:51');
INSERT INTO `personallog` VALUES ('30252', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 17:00:40', '2016-02-29', '17:00:40');
INSERT INTO `personallog` VALUES ('30253', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 17:03:13', '2016-02-29', '17:03:13');
INSERT INTO `personallog` VALUES ('30254', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-02-29 17:03:14', '2016-02-29', '17:03:14');
INSERT INTO `personallog` VALUES ('30255', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-02-29 17:08:27', '2016-02-29', '17:08:27');
INSERT INTO `personallog` VALUES ('30256', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 17:12:19', '2016-02-29', '17:12:19');
INSERT INTO `personallog` VALUES ('30257', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 17:13:22', '2016-02-29', '17:13:22');
INSERT INTO `personallog` VALUES ('30258', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-02-29 17:20:30', '2016-02-29', '17:20:30');
INSERT INTO `personallog` VALUES ('30259', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 17:21:50', '2016-02-29', '17:21:50');
INSERT INTO `personallog` VALUES ('30260', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 17:27:10', '2016-02-29', '17:27:10');
INSERT INTO `personallog` VALUES ('30261', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 17:29:31', '2016-02-29', '17:29:31');
INSERT INTO `personallog` VALUES ('30262', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-02-29 17:31:01', '2016-02-29', '17:31:01');
INSERT INTO `personallog` VALUES ('30263', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-02-29 17:36:23', '2016-02-29', '17:36:23');
INSERT INTO `personallog` VALUES ('30264', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-02-29 17:40:08', '2016-02-29', '17:40:08');
INSERT INTO `personallog` VALUES ('30265', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-02-29 17:40:17', '2016-02-29', '17:40:17');
INSERT INTO `personallog` VALUES ('30266', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-29 17:40:24', '2016-02-29', '17:40:24');
INSERT INTO `personallog` VALUES ('30267', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-02-29 17:40:33', '2016-02-29', '17:40:33');
INSERT INTO `personallog` VALUES ('30268', '2268922110030', '11', '1', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-02-29 17:42:26', '2016-02-29', '17:42:26');
INSERT INTO `personallog` VALUES ('30269', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-02-29 17:43:21', '2016-02-29', '17:43:21');
INSERT INTO `personallog` VALUES ('30270', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-02-29 17:43:26', '2016-02-29', '17:43:26');
INSERT INTO `personallog` VALUES ('30271', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-02-29 17:45:29', '2016-02-29', '17:45:29');
INSERT INTO `personallog` VALUES ('30272', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-02-29 17:57:39', '2016-02-29', '17:57:39');
INSERT INTO `personallog` VALUES ('30273', '2268922110030', '42', '1', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-02-29 17:57:42', '2016-02-29', '17:57:42');
INSERT INTO `personallog` VALUES ('30274', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-02-29 18:23:04', '2016-02-29', '18:23:04');
INSERT INTO `personallog` VALUES ('30275', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-02-29 18:23:12', '2016-02-29', '18:23:12');
INSERT INTO `personallog` VALUES ('30276', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-01 07:44:53', '2016-03-01', '07:44:53');
INSERT INTO `personallog` VALUES ('30277', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-01 07:45:07', '2016-03-01', '07:45:07');
INSERT INTO `personallog` VALUES ('30278', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-01 07:50:44', '2016-03-01', '07:50:44');
INSERT INTO `personallog` VALUES ('30279', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-01 08:08:11', '2016-03-01', '08:08:11');
INSERT INTO `personallog` VALUES ('30280', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-01 08:14:13', '2016-03-01', '08:14:13');
INSERT INTO `personallog` VALUES ('30281', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 08:18:19', '2016-03-01', '08:18:19');
INSERT INTO `personallog` VALUES ('30282', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-01 08:19:51', '2016-03-01', '08:19:51');
INSERT INTO `personallog` VALUES ('30283', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-01 08:29:48', '2016-03-01', '08:29:48');
INSERT INTO `personallog` VALUES ('30284', '2268922110030', '35', '5', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-01 08:31:10', '2016-03-01', '08:31:10');
INSERT INTO `personallog` VALUES ('30285', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 08:33:00', '2016-03-01', '08:33:00');
INSERT INTO `personallog` VALUES ('30286', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-01 08:35:09', '2016-03-01', '08:35:09');
INSERT INTO `personallog` VALUES ('30287', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-01 08:35:14', '2016-03-01', '08:35:14');
INSERT INTO `personallog` VALUES ('30288', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 08:36:13', '2016-03-01', '08:36:13');
INSERT INTO `personallog` VALUES ('30289', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-01 08:38:30', '2016-03-01', '08:38:30');
INSERT INTO `personallog` VALUES ('30290', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-01 08:40:27', '2016-03-01', '08:40:27');
INSERT INTO `personallog` VALUES ('30291', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 08:45:43', '2016-03-01', '08:45:43');
INSERT INTO `personallog` VALUES ('30292', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-01 08:57:01', '2016-03-01', '08:57:01');
INSERT INTO `personallog` VALUES ('30293', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 09:00:32', '2016-03-01', '09:00:32');
INSERT INTO `personallog` VALUES ('30294', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-01 09:04:07', '2016-03-01', '09:04:07');
INSERT INTO `personallog` VALUES ('30295', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 09:06:28', '2016-03-01', '09:06:28');
INSERT INTO `personallog` VALUES ('30296', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 09:17:40', '2016-03-01', '09:17:40');
INSERT INTO `personallog` VALUES ('30297', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 09:29:05', '2016-03-01', '09:29:05');
INSERT INTO `personallog` VALUES ('30298', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 09:36:43', '2016-03-01', '09:36:43');
INSERT INTO `personallog` VALUES ('30299', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 09:37:27', '2016-03-01', '09:37:27');
INSERT INTO `personallog` VALUES ('30300', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 09:38:34', '2016-03-01', '09:38:34');
INSERT INTO `personallog` VALUES ('30301', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-01 09:48:21', '2016-03-01', '09:48:21');
INSERT INTO `personallog` VALUES ('30302', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-01 09:53:17', '2016-03-01', '09:53:17');
INSERT INTO `personallog` VALUES ('30303', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 09:54:38', '2016-03-01', '09:54:38');
INSERT INTO `personallog` VALUES ('30304', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 09:59:44', '2016-03-01', '09:59:44');
INSERT INTO `personallog` VALUES ('30305', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 10:10:39', '2016-03-01', '10:10:39');
INSERT INTO `personallog` VALUES ('30306', '2268922110030', '54', '5', '2016-06-17 01:50:09', 'Card.Ailey', 'Online', '2016-03-01 10:20:08', '2016-03-01', '10:20:08');
INSERT INTO `personallog` VALUES ('30307', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-01 10:24:04', '2016-03-01', '10:24:04');
INSERT INTO `personallog` VALUES ('30308', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 10:24:51', '2016-03-01', '10:24:51');
INSERT INTO `personallog` VALUES ('30309', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 10:27:12', '2016-03-01', '10:27:12');
INSERT INTO `personallog` VALUES ('30310', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-01 10:44:51', '2016-03-01', '10:44:51');
INSERT INTO `personallog` VALUES ('30311', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 10:56:05', '2016-03-01', '10:56:05');
INSERT INTO `personallog` VALUES ('30312', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 11:17:04', '2016-03-01', '11:17:04');
INSERT INTO `personallog` VALUES ('30313', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 11:35:06', '2016-03-01', '11:35:06');
INSERT INTO `personallog` VALUES ('30314', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-01 11:39:56', '2016-03-01', '11:39:56');
INSERT INTO `personallog` VALUES ('30315', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 11:46:57', '2016-03-01', '11:46:57');
INSERT INTO `personallog` VALUES ('30316', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 11:52:56', '2016-03-01', '11:52:56');
INSERT INTO `personallog` VALUES ('30317', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 11:55:33', '2016-03-01', '11:55:33');
INSERT INTO `personallog` VALUES ('30318', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 11:56:18', '2016-03-01', '11:56:18');
INSERT INTO `personallog` VALUES ('30319', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 11:57:32', '2016-03-01', '11:57:32');
INSERT INTO `personallog` VALUES ('30320', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 11:58:30', '2016-03-01', '11:58:30');
INSERT INTO `personallog` VALUES ('30321', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-01 12:08:38', '2016-03-01', '12:08:38');
INSERT INTO `personallog` VALUES ('30322', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 12:29:01', '2016-03-01', '12:29:01');
INSERT INTO `personallog` VALUES ('30323', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 12:31:19', '2016-03-01', '12:31:19');
INSERT INTO `personallog` VALUES ('30324', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 12:31:35', '2016-03-01', '12:31:35');
INSERT INTO `personallog` VALUES ('30325', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 12:35:25', '2016-03-01', '12:35:25');
INSERT INTO `personallog` VALUES ('30326', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-01 12:38:01', '2016-03-01', '12:38:01');
INSERT INTO `personallog` VALUES ('30327', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 12:38:40', '2016-03-01', '12:38:40');
INSERT INTO `personallog` VALUES ('30328', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 12:42:37', '2016-03-01', '12:42:37');
INSERT INTO `personallog` VALUES ('30329', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-01 12:44:21', '2016-03-01', '12:44:21');
INSERT INTO `personallog` VALUES ('30330', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 13:01:15', '2016-03-01', '13:01:15');
INSERT INTO `personallog` VALUES ('30331', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 13:05:24', '2016-03-01', '13:05:24');
INSERT INTO `personallog` VALUES ('30332', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 13:08:03', '2016-03-01', '13:08:03');
INSERT INTO `personallog` VALUES ('30333', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-01 13:08:44', '2016-03-01', '13:08:44');
INSERT INTO `personallog` VALUES ('30334', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 13:09:32', '2016-03-01', '13:09:32');
INSERT INTO `personallog` VALUES ('30335', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-01 13:09:51', '2016-03-01', '13:09:51');
INSERT INTO `personallog` VALUES ('30336', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 13:10:21', '2016-03-01', '13:10:21');
INSERT INTO `personallog` VALUES ('30337', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 13:13:48', '2016-03-01', '13:13:48');
INSERT INTO `personallog` VALUES ('30338', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 13:22:19', '2016-03-01', '13:22:19');
INSERT INTO `personallog` VALUES ('30339', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 13:22:33', '2016-03-01', '13:22:33');
INSERT INTO `personallog` VALUES ('30340', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-01 13:26:41', '2016-03-01', '13:26:41');
INSERT INTO `personallog` VALUES ('30341', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-01 13:37:06', '2016-03-01', '13:37:06');
INSERT INTO `personallog` VALUES ('30342', '2268922110030', '47', '5', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-01 13:47:03', '2016-03-01', '13:47:03');
INSERT INTO `personallog` VALUES ('30343', '2268922110030', '33', '5', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-01 13:52:47', '2016-03-01', '13:52:47');
INSERT INTO `personallog` VALUES ('30344', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 13:55:22', '2016-03-01', '13:55:22');
INSERT INTO `personallog` VALUES ('30345', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-01 13:58:08', '2016-03-01', '13:58:08');
INSERT INTO `personallog` VALUES ('30346', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-01 14:06:48', '2016-03-01', '14:06:48');
INSERT INTO `personallog` VALUES ('30347', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 14:14:41', '2016-03-01', '14:14:41');
INSERT INTO `personallog` VALUES ('30348', '2268922110030', '53', '5', '2016-06-17 01:50:09', 'Card.Stephen', 'Online', '2016-03-01 14:24:24', '2016-03-01', '14:24:24');
INSERT INTO `personallog` VALUES ('30349', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 14:25:15', '2016-03-01', '14:25:15');
INSERT INTO `personallog` VALUES ('30350', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 14:25:43', '2016-03-01', '14:25:43');
INSERT INTO `personallog` VALUES ('30351', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-01 14:31:16', '2016-03-01', '14:31:16');
INSERT INTO `personallog` VALUES ('30352', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-01 14:40:26', '2016-03-01', '14:40:26');
INSERT INTO `personallog` VALUES ('30353', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 14:42:47', '2016-03-01', '14:42:47');
INSERT INTO `personallog` VALUES ('30354', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-01 14:55:08', '2016-03-01', '14:55:08');
INSERT INTO `personallog` VALUES ('30355', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-01 15:16:08', '2016-03-01', '15:16:08');
INSERT INTO `personallog` VALUES ('30356', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 15:48:40', '2016-03-01', '15:48:40');
INSERT INTO `personallog` VALUES ('30357', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 15:50:21', '2016-03-01', '15:50:21');
INSERT INTO `personallog` VALUES ('30358', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 15:50:25', '2016-03-01', '15:50:25');
INSERT INTO `personallog` VALUES ('30359', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 15:58:49', '2016-03-01', '15:58:49');
INSERT INTO `personallog` VALUES ('30360', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 16:06:54', '2016-03-01', '16:06:54');
INSERT INTO `personallog` VALUES ('30361', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-01 16:08:05', '2016-03-01', '16:08:05');
INSERT INTO `personallog` VALUES ('30362', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-01 16:12:42', '2016-03-01', '16:12:42');
INSERT INTO `personallog` VALUES ('30363', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 16:20:14', '2016-03-01', '16:20:14');
INSERT INTO `personallog` VALUES ('30364', '2268922110030', '45', '5', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-01 16:20:56', '2016-03-01', '16:20:56');
INSERT INTO `personallog` VALUES ('30365', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 16:22:40', '2016-03-01', '16:22:40');
INSERT INTO `personallog` VALUES ('30366', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 16:23:33', '2016-03-01', '16:23:33');
INSERT INTO `personallog` VALUES ('30367', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-01 16:25:13', '2016-03-01', '16:25:13');
INSERT INTO `personallog` VALUES ('30368', '2268922110030', '4', '5', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-01 16:26:17', '2016-03-01', '16:26:17');
INSERT INTO `personallog` VALUES ('30369', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-01 16:39:44', '2016-03-01', '16:39:44');
INSERT INTO `personallog` VALUES ('30370', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-01 16:53:34', '2016-03-01', '16:53:34');
INSERT INTO `personallog` VALUES ('30371', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-01 17:00:33', '2016-03-01', '17:00:33');
INSERT INTO `personallog` VALUES ('30372', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-01 17:07:57', '2016-03-01', '17:07:57');
INSERT INTO `personallog` VALUES ('30373', '2268922110030', '40', '5', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-01 17:10:38', '2016-03-01', '17:10:38');
INSERT INTO `personallog` VALUES ('30374', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-01 17:26:00', '2016-03-01', '17:26:00');
INSERT INTO `personallog` VALUES ('30375', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-01 17:31:34', '2016-03-01', '17:31:34');
INSERT INTO `personallog` VALUES ('30376', '2268922110030', '6', '1', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-01 17:32:18', '2016-03-01', '17:32:18');
INSERT INTO `personallog` VALUES ('30377', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-01 17:34:50', '2016-03-01', '17:34:50');
INSERT INTO `personallog` VALUES ('30378', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-01 17:36:51', '2016-03-01', '17:36:51');
INSERT INTO `personallog` VALUES ('30379', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-01 17:42:24', '2016-03-01', '17:42:24');
INSERT INTO `personallog` VALUES ('30380', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-01 17:42:56', '2016-03-01', '17:42:56');
INSERT INTO `personallog` VALUES ('30381', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-01 17:44:45', '2016-03-01', '17:44:45');
INSERT INTO `personallog` VALUES ('30382', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-01 17:44:47', '2016-03-01', '17:44:47');
INSERT INTO `personallog` VALUES ('30383', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-01 17:45:31', '2016-03-01', '17:45:31');
INSERT INTO `personallog` VALUES ('30384', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-01 17:45:41', '2016-03-01', '17:45:41');
INSERT INTO `personallog` VALUES ('30385', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-01 17:52:35', '2016-03-01', '17:52:35');
INSERT INTO `personallog` VALUES ('30386', '2268922110030', '51', '1', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-01 17:52:40', '2016-03-01', '17:52:40');
INSERT INTO `personallog` VALUES ('30387', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-01 18:20:30', '2016-03-01', '18:20:30');
INSERT INTO `personallog` VALUES ('30388', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-01 19:44:38', '2016-03-01', '19:44:38');
INSERT INTO `personallog` VALUES ('30389', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 19:44:42', '2016-03-01', '19:44:42');
INSERT INTO `personallog` VALUES ('30390', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-01 19:48:22', '2016-03-01', '19:48:22');
INSERT INTO `personallog` VALUES ('30391', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-01 19:51:44', '2016-03-01', '19:51:44');
INSERT INTO `personallog` VALUES ('30392', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-02 07:59:28', '2016-03-02', '07:59:28');
INSERT INTO `personallog` VALUES ('30393', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-02 07:59:33', '2016-03-02', '07:59:33');
INSERT INTO `personallog` VALUES ('30394', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-02 08:02:38', '2016-03-02', '08:02:38');
INSERT INTO `personallog` VALUES ('30395', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-02 08:03:22', '2016-03-02', '08:03:22');
INSERT INTO `personallog` VALUES ('30396', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-02 08:05:48', '2016-03-02', '08:05:48');
INSERT INTO `personallog` VALUES ('30397', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 08:10:55', '2016-03-02', '08:10:55');
INSERT INTO `personallog` VALUES ('30398', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-02 08:15:09', '2016-03-02', '08:15:09');
INSERT INTO `personallog` VALUES ('30399', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 08:17:52', '2016-03-02', '08:17:52');
INSERT INTO `personallog` VALUES ('30400', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-02 08:22:13', '2016-03-02', '08:22:13');
INSERT INTO `personallog` VALUES ('30401', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 08:24:51', '2016-03-02', '08:24:51');
INSERT INTO `personallog` VALUES ('30402', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-02 08:28:32', '2016-03-02', '08:28:32');
INSERT INTO `personallog` VALUES ('30403', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 08:30:29', '2016-03-02', '08:30:29');
INSERT INTO `personallog` VALUES ('30404', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 08:31:06', '2016-03-02', '08:31:06');
INSERT INTO `personallog` VALUES ('30405', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-02 08:34:48', '2016-03-02', '08:34:48');
INSERT INTO `personallog` VALUES ('30406', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-02 08:39:20', '2016-03-02', '08:39:20');
INSERT INTO `personallog` VALUES ('30407', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 08:39:36', '2016-03-02', '08:39:36');
INSERT INTO `personallog` VALUES ('30408', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 08:41:39', '2016-03-02', '08:41:39');
INSERT INTO `personallog` VALUES ('30409', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 08:41:47', '2016-03-02', '08:41:47');
INSERT INTO `personallog` VALUES ('30410', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-02 08:42:28', '2016-03-02', '08:42:28');
INSERT INTO `personallog` VALUES ('30411', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-02 08:42:53', '2016-03-02', '08:42:53');
INSERT INTO `personallog` VALUES ('30412', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-02 08:44:13', '2016-03-02', '08:44:13');
INSERT INTO `personallog` VALUES ('30413', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 08:44:40', '2016-03-02', '08:44:40');
INSERT INTO `personallog` VALUES ('30414', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-02 08:45:19', '2016-03-02', '08:45:19');
INSERT INTO `personallog` VALUES ('30415', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 08:46:30', '2016-03-02', '08:46:30');
INSERT INTO `personallog` VALUES ('30416', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 08:48:23', '2016-03-02', '08:48:23');
INSERT INTO `personallog` VALUES ('30417', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 08:55:37', '2016-03-02', '08:55:37');
INSERT INTO `personallog` VALUES ('30418', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 08:57:02', '2016-03-02', '08:57:02');
INSERT INTO `personallog` VALUES ('30419', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 09:00:15', '2016-03-02', '09:00:15');
INSERT INTO `personallog` VALUES ('30420', '2268922110030', '35', '5', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-02 09:01:59', '2016-03-02', '09:01:59');
INSERT INTO `personallog` VALUES ('30421', '2268922110030', '35', '5', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-02 09:02:02', '2016-03-02', '09:02:02');
INSERT INTO `personallog` VALUES ('30422', '2268922110030', '43', '5', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-02 09:18:35', '2016-03-02', '09:18:35');
INSERT INTO `personallog` VALUES ('30423', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-02 09:19:18', '2016-03-02', '09:19:18');
INSERT INTO `personallog` VALUES ('30424', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 09:23:20', '2016-03-02', '09:23:20');
INSERT INTO `personallog` VALUES ('30425', '2268922110030', '46', '5', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-02 09:28:32', '2016-03-02', '09:28:32');
INSERT INTO `personallog` VALUES ('30426', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 09:28:51', '2016-03-02', '09:28:51');
INSERT INTO `personallog` VALUES ('30427', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 09:45:15', '2016-03-02', '09:45:15');
INSERT INTO `personallog` VALUES ('30428', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-02 09:46:39', '2016-03-02', '09:46:39');
INSERT INTO `personallog` VALUES ('30429', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-02 09:56:50', '2016-03-02', '09:56:50');
INSERT INTO `personallog` VALUES ('30430', '2268922110030', '43', '5', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-02 09:59:35', '2016-03-02', '09:59:35');
INSERT INTO `personallog` VALUES ('30431', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-02 10:08:18', '2016-03-02', '10:08:18');
INSERT INTO `personallog` VALUES ('30432', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 10:13:13', '2016-03-02', '10:13:13');
INSERT INTO `personallog` VALUES ('30433', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 10:17:53', '2016-03-02', '10:17:53');
INSERT INTO `personallog` VALUES ('30434', '2268922110030', '43', '5', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-02 10:19:13', '2016-03-02', '10:19:13');
INSERT INTO `personallog` VALUES ('30435', '2268922110030', '43', '5', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-02 10:24:02', '2016-03-02', '10:24:02');
INSERT INTO `personallog` VALUES ('30436', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 10:34:31', '2016-03-02', '10:34:31');
INSERT INTO `personallog` VALUES ('30437', '2268922110030', '46', '5', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-02 10:36:20', '2016-03-02', '10:36:20');
INSERT INTO `personallog` VALUES ('30438', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 10:37:13', '2016-03-02', '10:37:13');
INSERT INTO `personallog` VALUES ('30439', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-02 10:41:39', '2016-03-02', '10:41:39');
INSERT INTO `personallog` VALUES ('30440', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-02 10:50:19', '2016-03-02', '10:50:19');
INSERT INTO `personallog` VALUES ('30441', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-02 11:01:55', '2016-03-02', '11:01:55');
INSERT INTO `personallog` VALUES ('30442', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 11:04:47', '2016-03-02', '11:04:47');
INSERT INTO `personallog` VALUES ('30443', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 11:15:22', '2016-03-02', '11:15:22');
INSERT INTO `personallog` VALUES ('30444', '2268922110030', '44', '5', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-02 11:25:35', '2016-03-02', '11:25:35');
INSERT INTO `personallog` VALUES ('30445', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 11:30:39', '2016-03-02', '11:30:39');
INSERT INTO `personallog` VALUES ('30446', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 11:38:32', '2016-03-02', '11:38:32');
INSERT INTO `personallog` VALUES ('30447', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 11:40:50', '2016-03-02', '11:40:50');
INSERT INTO `personallog` VALUES ('30448', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 11:50:56', '2016-03-02', '11:50:56');
INSERT INTO `personallog` VALUES ('30449', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 12:00:52', '2016-03-02', '12:00:52');
INSERT INTO `personallog` VALUES ('30450', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 12:02:40', '2016-03-02', '12:02:40');
INSERT INTO `personallog` VALUES ('30451', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 12:03:03', '2016-03-02', '12:03:03');
INSERT INTO `personallog` VALUES ('30452', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-02 12:12:54', '2016-03-02', '12:12:54');
INSERT INTO `personallog` VALUES ('30453', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 12:13:15', '2016-03-02', '12:13:15');
INSERT INTO `personallog` VALUES ('30454', '2268922110030', '49', '5', '2016-06-17 01:50:09', 'Heri', 'Online', '2016-03-02 12:35:36', '2016-03-02', '12:35:36');
INSERT INTO `personallog` VALUES ('30455', '2268922110030', '51', '5', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-02 12:51:26', '2016-03-02', '12:51:26');
INSERT INTO `personallog` VALUES ('30456', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-02 12:51:38', '2016-03-02', '12:51:38');
INSERT INTO `personallog` VALUES ('30457', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 12:55:29', '2016-03-02', '12:55:29');
INSERT INTO `personallog` VALUES ('30458', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 12:58:11', '2016-03-02', '12:58:11');
INSERT INTO `personallog` VALUES ('30459', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 13:03:06', '2016-03-02', '13:03:06');
INSERT INTO `personallog` VALUES ('30460', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 13:10:27', '2016-03-02', '13:10:27');
INSERT INTO `personallog` VALUES ('30461', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 13:44:00', '2016-03-02', '13:44:00');
INSERT INTO `personallog` VALUES ('30462', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 14:10:24', '2016-03-02', '14:10:24');
INSERT INTO `personallog` VALUES ('30463', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 14:20:59', '2016-03-02', '14:20:59');
INSERT INTO `personallog` VALUES ('30464', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 14:33:33', '2016-03-02', '14:33:33');
INSERT INTO `personallog` VALUES ('30465', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 14:45:39', '2016-03-02', '14:45:39');
INSERT INTO `personallog` VALUES ('30466', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 14:49:35', '2016-03-02', '14:49:35');
INSERT INTO `personallog` VALUES ('30467', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 15:07:19', '2016-03-02', '15:07:19');
INSERT INTO `personallog` VALUES ('30468', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 15:10:59', '2016-03-02', '15:10:59');
INSERT INTO `personallog` VALUES ('30469', '2268922110030', '18', '5', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-03-02 15:16:40', '2016-03-02', '15:16:40');
INSERT INTO `personallog` VALUES ('30470', '2268922110030', '16', '5', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-02 15:20:42', '2016-03-02', '15:20:42');
INSERT INTO `personallog` VALUES ('30471', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 16:00:13', '2016-03-02', '16:00:13');
INSERT INTO `personallog` VALUES ('30472', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 16:06:16', '2016-03-02', '16:06:16');
INSERT INTO `personallog` VALUES ('30473', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-02 16:09:33', '2016-03-02', '16:09:33');
INSERT INTO `personallog` VALUES ('30474', '2268922110030', '18', '5', '2016-06-17 01:50:09', 'Card.Ridwan', 'Online', '2016-03-02 16:12:54', '2016-03-02', '16:12:54');
INSERT INTO `personallog` VALUES ('30475', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-02 16:13:07', '2016-03-02', '16:13:07');
INSERT INTO `personallog` VALUES ('30476', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 16:13:55', '2016-03-02', '16:13:55');
INSERT INTO `personallog` VALUES ('30477', '2268922110030', '42', '5', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-02 16:14:27', '2016-03-02', '16:14:27');
INSERT INTO `personallog` VALUES ('30478', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-02 16:21:47', '2016-03-02', '16:21:47');
INSERT INTO `personallog` VALUES ('30479', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 16:26:53', '2016-03-02', '16:26:53');
INSERT INTO `personallog` VALUES ('30480', '2268922110030', '20', '5', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-02 16:30:42', '2016-03-02', '16:30:42');
INSERT INTO `personallog` VALUES ('30481', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 16:36:55', '2016-03-02', '16:36:55');
INSERT INTO `personallog` VALUES ('30482', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 16:37:08', '2016-03-02', '16:37:08');
INSERT INTO `personallog` VALUES ('30483', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 16:37:39', '2016-03-02', '16:37:39');
INSERT INTO `personallog` VALUES ('30484', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 16:48:15', '2016-03-02', '16:48:15');
INSERT INTO `personallog` VALUES ('30485', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 17:00:47', '2016-03-02', '17:00:47');
INSERT INTO `personallog` VALUES ('30486', '2268922110030', '6', '5', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-02 17:04:13', '2016-03-02', '17:04:13');
INSERT INTO `personallog` VALUES ('30487', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 17:08:03', '2016-03-02', '17:08:03');
INSERT INTO `personallog` VALUES ('30488', '2268922110030', '14', '5', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-02 17:18:41', '2016-03-02', '17:18:41');
INSERT INTO `personallog` VALUES ('30489', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 17:23:17', '2016-03-02', '17:23:17');
INSERT INTO `personallog` VALUES ('30490', '2268922110030', '13', '5', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-02 17:25:31', '2016-03-02', '17:25:31');
INSERT INTO `personallog` VALUES ('30491', '2268922110030', '11', '5', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 17:30:20', '2016-03-02', '17:30:20');
INSERT INTO `personallog` VALUES ('30492', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-02 17:31:08', '2016-03-02', '17:31:08');
INSERT INTO `personallog` VALUES ('30493', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-02 17:33:56', '2016-03-02', '17:33:56');
INSERT INTO `personallog` VALUES ('30494', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 17:38:44', '2016-03-02', '17:38:44');
INSERT INTO `personallog` VALUES ('30495', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-02 17:38:49', '2016-03-02', '17:38:49');
INSERT INTO `personallog` VALUES ('30496', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-02 17:40:11', '2016-03-02', '17:40:11');
INSERT INTO `personallog` VALUES ('30497', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-02 17:43:26', '2016-03-02', '17:43:26');
INSERT INTO `personallog` VALUES ('30498', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-02 17:43:33', '2016-03-02', '17:43:33');
INSERT INTO `personallog` VALUES ('30499', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-02 17:43:44', '2016-03-02', '17:43:44');
INSERT INTO `personallog` VALUES ('30500', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-02 17:43:48', '2016-03-02', '17:43:48');
INSERT INTO `personallog` VALUES ('30501', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-02 17:58:53', '2016-03-02', '17:58:53');
INSERT INTO `personallog` VALUES ('30502', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-02 17:58:57', '2016-03-02', '17:58:57');
INSERT INTO `personallog` VALUES ('30503', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-02 17:58:59', '2016-03-02', '17:58:59');
INSERT INTO `personallog` VALUES ('30504', '2268922110030', '42', '1', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-02 18:01:49', '2016-03-02', '18:01:49');
INSERT INTO `personallog` VALUES ('30505', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-02 18:22:59', '2016-03-02', '18:22:59');
INSERT INTO `personallog` VALUES ('30506', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-02 18:24:31', '2016-03-02', '18:24:31');
INSERT INTO `personallog` VALUES ('30507', '2268922110030', '11', '1', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-02 21:19:43', '2016-03-02', '21:19:43');
INSERT INTO `personallog` VALUES ('30508', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-02 23:51:45', '2016-03-02', '23:51:45');
INSERT INTO `personallog` VALUES ('30509', '2268922110030', '63', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 07:27:57', '2016-03-03', '07:27:57');
INSERT INTO `personallog` VALUES ('30510', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-03 07:41:27', '2016-03-03', '07:41:27');
INSERT INTO `personallog` VALUES ('30511', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-03 07:42:06', '2016-03-03', '07:42:06');
INSERT INTO `personallog` VALUES ('30512', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-03 07:48:09', '2016-03-03', '07:48:09');
INSERT INTO `personallog` VALUES ('30513', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 07:53:38', '2016-03-03', '07:53:38');
INSERT INTO `personallog` VALUES ('30514', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 07:53:40', '2016-03-03', '07:53:40');
INSERT INTO `personallog` VALUES ('30515', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-03 08:06:39', '2016-03-03', '08:06:39');
INSERT INTO `personallog` VALUES ('30516', '2268922110030', '65', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:09:19', '2016-03-03', '08:09:19');
INSERT INTO `personallog` VALUES ('30517', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-03 08:10:01', '2016-03-03', '08:10:01');
INSERT INTO `personallog` VALUES ('30518', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 08:17:30', '2016-03-03', '08:17:30');
INSERT INTO `personallog` VALUES ('30519', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-03 08:17:57', '2016-03-03', '08:17:57');
INSERT INTO `personallog` VALUES ('30520', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-03 08:22:03', '2016-03-03', '08:22:03');
INSERT INTO `personallog` VALUES ('30521', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:22:49', '2016-03-03', '08:22:49');
INSERT INTO `personallog` VALUES ('30522', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:22:52', '2016-03-03', '08:22:52');
INSERT INTO `personallog` VALUES ('30523', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-03 08:23:16', '2016-03-03', '08:23:16');
INSERT INTO `personallog` VALUES ('30524', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-03 08:23:44', '2016-03-03', '08:23:44');
INSERT INTO `personallog` VALUES ('30525', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 08:27:36', '2016-03-03', '08:27:36');
INSERT INTO `personallog` VALUES ('30526', '2268922110030', '67', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:28:23', '2016-03-03', '08:28:23');
INSERT INTO `personallog` VALUES ('30527', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-03 08:28:29', '2016-03-03', '08:28:29');
INSERT INTO `personallog` VALUES ('30528', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-03 08:32:08', '2016-03-03', '08:32:08');
INSERT INTO `personallog` VALUES ('30529', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-03 08:32:19', '2016-03-03', '08:32:19');
INSERT INTO `personallog` VALUES ('30530', '2268922110030', '68', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:42:12', '2016-03-03', '08:42:12');
INSERT INTO `personallog` VALUES ('30531', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:43:43', '2016-03-03', '08:43:43');
INSERT INTO `personallog` VALUES ('30532', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:43:47', '2016-03-03', '08:43:47');
INSERT INTO `personallog` VALUES ('30533', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-03 08:45:02', '2016-03-03', '08:45:02');
INSERT INTO `personallog` VALUES ('30534', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-03 08:48:35', '2016-03-03', '08:48:35');
INSERT INTO `personallog` VALUES ('30535', '2268922110030', '70', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 08:52:02', '2016-03-03', '08:52:02');
INSERT INTO `personallog` VALUES ('30536', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 09:02:37', '2016-03-03', '09:02:37');
INSERT INTO `personallog` VALUES ('30537', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-03 09:03:21', '2016-03-03', '09:03:21');
INSERT INTO `personallog` VALUES ('30538', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-03 09:03:59', '2016-03-03', '09:03:59');
INSERT INTO `personallog` VALUES ('30539', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 09:04:14', '2016-03-03', '09:04:14');
INSERT INTO `personallog` VALUES ('30540', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 09:05:58', '2016-03-03', '09:05:58');
INSERT INTO `personallog` VALUES ('30541', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 09:07:58', '2016-03-03', '09:07:58');
INSERT INTO `personallog` VALUES ('30542', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-03 09:17:57', '2016-03-03', '09:17:57');
INSERT INTO `personallog` VALUES ('30543', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-03 09:18:53', '2016-03-03', '09:18:53');
INSERT INTO `personallog` VALUES ('30544', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 09:30:58', '2016-03-03', '09:30:58');
INSERT INTO `personallog` VALUES ('30545', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 09:34:56', '2016-03-03', '09:34:56');
INSERT INTO `personallog` VALUES ('30546', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-03 09:39:52', '2016-03-03', '09:39:52');
INSERT INTO `personallog` VALUES ('30547', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 09:46:37', '2016-03-03', '09:46:37');
INSERT INTO `personallog` VALUES ('30548', '2268922110030', '44', '4', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-03 09:46:48', '2016-03-03', '09:46:48');
INSERT INTO `personallog` VALUES ('30549', '2268922110030', '43', '4', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-03 09:51:42', '2016-03-03', '09:51:42');
INSERT INTO `personallog` VALUES ('30550', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 09:53:24', '2016-03-03', '09:53:24');
INSERT INTO `personallog` VALUES ('30551', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 09:58:50', '2016-03-03', '09:58:50');
INSERT INTO `personallog` VALUES ('30552', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-03 09:59:57', '2016-03-03', '09:59:57');
INSERT INTO `personallog` VALUES ('30553', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 10:05:12', '2016-03-03', '10:05:12');
INSERT INTO `personallog` VALUES ('30554', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 10:07:50', '2016-03-03', '10:07:50');
INSERT INTO `personallog` VALUES ('30555', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-03 10:23:09', '2016-03-03', '10:23:09');
INSERT INTO `personallog` VALUES ('30556', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-03 10:25:33', '2016-03-03', '10:25:33');
INSERT INTO `personallog` VALUES ('30557', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 10:34:49', '2016-03-03', '10:34:49');
INSERT INTO `personallog` VALUES ('30558', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-03 10:36:54', '2016-03-03', '10:36:54');
INSERT INTO `personallog` VALUES ('30559', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-03 10:37:54', '2016-03-03', '10:37:54');
INSERT INTO `personallog` VALUES ('30560', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-03 10:40:03', '2016-03-03', '10:40:03');
INSERT INTO `personallog` VALUES ('30561', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-03 10:43:03', '2016-03-03', '10:43:03');
INSERT INTO `personallog` VALUES ('30562', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-03 11:18:48', '2016-03-03', '11:18:48');
INSERT INTO `personallog` VALUES ('30563', '2268922110030', '49', '4', '2016-06-17 01:50:09', 'Heri', 'Online', '2016-03-03 11:25:58', '2016-03-03', '11:25:58');
INSERT INTO `personallog` VALUES ('30564', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 11:29:26', '2016-03-03', '11:29:26');
INSERT INTO `personallog` VALUES ('30565', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-03 11:44:14', '2016-03-03', '11:44:14');
INSERT INTO `personallog` VALUES ('30566', '2268922110030', '4', '4', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-03 11:59:04', '2016-03-03', '11:59:04');
INSERT INTO `personallog` VALUES ('30567', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 12:00:37', '2016-03-03', '12:00:37');
INSERT INTO `personallog` VALUES ('30568', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 12:01:26', '2016-03-03', '12:01:26');
INSERT INTO `personallog` VALUES ('30569', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 12:03:00', '2016-03-03', '12:03:00');
INSERT INTO `personallog` VALUES ('30570', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-03 12:08:52', '2016-03-03', '12:08:52');
INSERT INTO `personallog` VALUES ('30571', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-03 13:03:03', '2016-03-03', '13:03:03');
INSERT INTO `personallog` VALUES ('30572', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 13:11:14', '2016-03-03', '13:11:14');
INSERT INTO `personallog` VALUES ('30573', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-03 13:13:33', '2016-03-03', '13:13:33');
INSERT INTO `personallog` VALUES ('30574', '2268922110030', '72', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:13:35', '2016-03-03', '13:13:35');
INSERT INTO `personallog` VALUES ('30575', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 13:17:43', '2016-03-03', '13:17:43');
INSERT INTO `personallog` VALUES ('30576', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-03 13:21:21', '2016-03-03', '13:21:21');
INSERT INTO `personallog` VALUES ('30577', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 13:22:37', '2016-03-03', '13:22:37');
INSERT INTO `personallog` VALUES ('30578', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 13:31:17', '2016-03-03', '13:31:17');
INSERT INTO `personallog` VALUES ('30579', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:32:28', '2016-03-03', '13:32:28');
INSERT INTO `personallog` VALUES ('30580', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:35:41', '2016-03-03', '13:35:41');
INSERT INTO `personallog` VALUES ('30581', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:35:43', '2016-03-03', '13:35:43');
INSERT INTO `personallog` VALUES ('30582', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:36:49', '2016-03-03', '13:36:49');
INSERT INTO `personallog` VALUES ('30583', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:36:53', '2016-03-03', '13:36:53');
INSERT INTO `personallog` VALUES ('30584', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:48:09', '2016-03-03', '13:48:09');
INSERT INTO `personallog` VALUES ('30585', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:49:01', '2016-03-03', '13:49:01');
INSERT INTO `personallog` VALUES ('30586', '2268922110030', '78', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:50:09', '2016-03-03', '13:50:09');
INSERT INTO `personallog` VALUES ('30587', '2268922110030', '79', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 13:58:16', '2016-03-03', '13:58:16');
INSERT INTO `personallog` VALUES ('30588', '2268922110030', '4', '4', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-03 14:09:15', '2016-03-03', '14:09:15');
INSERT INTO `personallog` VALUES ('30589', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 14:09:31', '2016-03-03', '14:09:31');
INSERT INTO `personallog` VALUES ('30590', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-03 14:09:48', '2016-03-03', '14:09:48');
INSERT INTO `personallog` VALUES ('30591', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-03 14:11:07', '2016-03-03', '14:11:07');
INSERT INTO `personallog` VALUES ('30592', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 14:24:24', '2016-03-03', '14:24:24');
INSERT INTO `personallog` VALUES ('30593', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 14:31:11', '2016-03-03', '14:31:11');
INSERT INTO `personallog` VALUES ('30594', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 14:56:06', '2016-03-03', '14:56:06');
INSERT INTO `personallog` VALUES ('30595', '2268922110030', '4', '4', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-03 15:24:39', '2016-03-03', '15:24:39');
INSERT INTO `personallog` VALUES ('30596', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-03 15:37:34', '2016-03-03', '15:37:34');
INSERT INTO `personallog` VALUES ('30597', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 15:44:17', '2016-03-03', '15:44:17');
INSERT INTO `personallog` VALUES ('30598', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-03 15:56:51', '2016-03-03', '15:56:51');
INSERT INTO `personallog` VALUES ('30599', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 15:58:09', '2016-03-03', '15:58:09');
INSERT INTO `personallog` VALUES ('30600', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:08:52', '2016-03-03', '16:08:52');
INSERT INTO `personallog` VALUES ('30601', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:08:55', '2016-03-03', '16:08:55');
INSERT INTO `personallog` VALUES ('30602', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 16:16:36', '2016-03-03', '16:16:36');
INSERT INTO `personallog` VALUES ('30603', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:17:02', '2016-03-03', '16:17:02');
INSERT INTO `personallog` VALUES ('30604', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:17:05', '2016-03-03', '16:17:05');
INSERT INTO `personallog` VALUES ('30605', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 16:30:47', '2016-03-03', '16:30:47');
INSERT INTO `personallog` VALUES ('30606', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 16:36:12', '2016-03-03', '16:36:12');
INSERT INTO `personallog` VALUES ('30607', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:42:00', '2016-03-03', '16:42:00');
INSERT INTO `personallog` VALUES ('30608', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 16:42:02', '2016-03-03', '16:42:02');
INSERT INTO `personallog` VALUES ('30609', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 16:43:12', '2016-03-03', '16:43:12');
INSERT INTO `personallog` VALUES ('30610', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-03 16:46:41', '2016-03-03', '16:46:41');
INSERT INTO `personallog` VALUES ('30611', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 16:47:35', '2016-03-03', '16:47:35');
INSERT INTO `personallog` VALUES ('30612', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 17:01:35', '2016-03-03', '17:01:35');
INSERT INTO `personallog` VALUES ('30613', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 17:05:51', '2016-03-03', '17:05:51');
INSERT INTO `personallog` VALUES ('30614', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 17:05:53', '2016-03-03', '17:05:53');
INSERT INTO `personallog` VALUES ('30615', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 17:07:07', '2016-03-03', '17:07:07');
INSERT INTO `personallog` VALUES ('30616', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 17:08:45', '2016-03-03', '17:08:45');
INSERT INTO `personallog` VALUES ('30617', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-03 17:11:08', '2016-03-03', '17:11:08');
INSERT INTO `personallog` VALUES ('30618', '2268922110030', '6', '4', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-03 17:11:45', '2016-03-03', '17:11:45');
INSERT INTO `personallog` VALUES ('30619', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 17:15:01', '2016-03-03', '17:15:01');
INSERT INTO `personallog` VALUES ('30620', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 17:15:03', '2016-03-03', '17:15:03');
INSERT INTO `personallog` VALUES ('30621', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 17:19:55', '2016-03-03', '17:19:55');
INSERT INTO `personallog` VALUES ('30622', '2268922110030', '37', '4', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-03 17:25:53', '2016-03-03', '17:25:53');
INSERT INTO `personallog` VALUES ('30623', '2268922110030', '42', '4', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-03 17:28:01', '2016-03-03', '17:28:01');
INSERT INTO `personallog` VALUES ('30624', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-03 17:30:34', '2016-03-03', '17:30:34');
INSERT INTO `personallog` VALUES ('30625', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-03 17:32:47', '2016-03-03', '17:32:47');
INSERT INTO `personallog` VALUES ('30626', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-03 17:43:50', '2016-03-03', '17:43:50');
INSERT INTO `personallog` VALUES ('30627', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-03 17:43:54', '2016-03-03', '17:43:54');
INSERT INTO `personallog` VALUES ('30628', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-03 17:44:50', '2016-03-03', '17:44:50');
INSERT INTO `personallog` VALUES ('30629', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 17:47:08', '2016-03-03', '17:47:08');
INSERT INTO `personallog` VALUES ('30630', '2268922110030', '34', '5', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-03 17:49:20', '2016-03-03', '17:49:20');
INSERT INTO `personallog` VALUES ('30631', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-03 17:49:24', '2016-03-03', '17:49:24');
INSERT INTO `personallog` VALUES ('30632', '2268922110030', '36', '5', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-03 17:51:44', '2016-03-03', '17:51:44');
INSERT INTO `personallog` VALUES ('30633', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-03 17:51:54', '2016-03-03', '17:51:54');
INSERT INTO `personallog` VALUES ('30634', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-03 17:51:57', '2016-03-03', '17:51:57');
INSERT INTO `personallog` VALUES ('30635', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-03 18:28:40', '2016-03-03', '18:28:40');
INSERT INTO `personallog` VALUES ('30636', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-03 18:38:39', '2016-03-03', '18:38:39');
INSERT INTO `personallog` VALUES ('30637', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-03 18:38:41', '2016-03-03', '18:38:41');
INSERT INTO `personallog` VALUES ('30638', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 19:50:40', '2016-03-03', '19:50:40');
INSERT INTO `personallog` VALUES ('30639', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 19:50:43', '2016-03-03', '19:50:43');
INSERT INTO `personallog` VALUES ('30640', '2268922110030', '81', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 20:04:03', '2016-03-03', '20:04:03');
INSERT INTO `personallog` VALUES ('30641', '2268922110030', '82', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 20:36:13', '2016-03-03', '20:36:13');
INSERT INTO `personallog` VALUES ('30642', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:03:26', '2016-03-03', '22:03:26');
INSERT INTO `personallog` VALUES ('30643', '2268922110030', '77', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:07:05', '2016-03-03', '22:07:05');
INSERT INTO `personallog` VALUES ('30644', '2268922110030', '79', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:07:25', '2016-03-03', '22:07:25');
INSERT INTO `personallog` VALUES ('30645', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:07:49', '2016-03-03', '22:07:49');
INSERT INTO `personallog` VALUES ('30646', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:07:52', '2016-03-03', '22:07:52');
INSERT INTO `personallog` VALUES ('30647', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:08:03', '2016-03-03', '22:08:03');
INSERT INTO `personallog` VALUES ('30648', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:08:06', '2016-03-03', '22:08:06');
INSERT INTO `personallog` VALUES ('30649', '2268922110030', '73', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:09:19', '2016-03-03', '22:09:19');
INSERT INTO `personallog` VALUES ('30650', '2268922110030', '78', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:11:11', '2016-03-03', '22:11:11');
INSERT INTO `personallog` VALUES ('30651', '2268922110030', '63', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:22:06', '2016-03-03', '22:22:06');
INSERT INTO `personallog` VALUES ('30652', '2268922110030', '68', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:27:48', '2016-03-03', '22:27:48');
INSERT INTO `personallog` VALUES ('30653', '2268922110030', '70', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-03 22:37:12', '2016-03-03', '22:37:12');
INSERT INTO `personallog` VALUES ('30654', '2268922110030', '83', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:05:52', '2016-03-04', '07:05:52');
INSERT INTO `personallog` VALUES ('30655', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-04 07:10:49', '2016-03-04', '07:10:49');
INSERT INTO `personallog` VALUES ('30656', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 07:11:03', '2016-03-04', '07:11:03');
INSERT INTO `personallog` VALUES ('30657', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:34:23', '2016-03-04', '07:34:23');
INSERT INTO `personallog` VALUES ('30658', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:35:28', '2016-03-04', '07:35:28');
INSERT INTO `personallog` VALUES ('30659', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:35:31', '2016-03-04', '07:35:31');
INSERT INTO `personallog` VALUES ('30660', '2268922110030', '65', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:35:37', '2016-03-04', '07:35:37');
INSERT INTO `personallog` VALUES ('30661', '2268922110030', '85', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 07:40:28', '2016-03-04', '07:40:28');
INSERT INTO `personallog` VALUES ('30662', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-04 07:41:08', '2016-03-04', '07:41:08');
INSERT INTO `personallog` VALUES ('30663', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-04 07:43:12', '2016-03-04', '07:43:12');
INSERT INTO `personallog` VALUES ('30664', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-04 07:52:22', '2016-03-04', '07:52:22');
INSERT INTO `personallog` VALUES ('30665', '2268922110030', '29', '0', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-04 08:00:37', '2016-03-04', '08:00:37');
INSERT INTO `personallog` VALUES ('30666', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-04 08:02:54', '2016-03-04', '08:02:54');
INSERT INTO `personallog` VALUES ('30667', '2268922110030', '67', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 08:06:32', '2016-03-04', '08:06:32');
INSERT INTO `personallog` VALUES ('30668', '2268922110030', '14', '0', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 08:06:46', '2016-03-04', '08:06:46');
INSERT INTO `personallog` VALUES ('30669', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 08:12:46', '2016-03-04', '08:12:46');
INSERT INTO `personallog` VALUES ('30670', '2268922110030', '34', '0', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 08:14:04', '2016-03-04', '08:14:04');
INSERT INTO `personallog` VALUES ('30671', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-04 08:14:10', '2016-03-04', '08:14:10');
INSERT INTO `personallog` VALUES ('30672', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-04 08:15:22', '2016-03-04', '08:15:22');
INSERT INTO `personallog` VALUES ('30673', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 08:20:10', '2016-03-04', '08:20:10');
INSERT INTO `personallog` VALUES ('30674', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-04 08:20:29', '2016-03-04', '08:20:29');
INSERT INTO `personallog` VALUES ('30675', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 08:23:27', '2016-03-04', '08:23:27');
INSERT INTO `personallog` VALUES ('30676', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 08:28:45', '2016-03-04', '08:28:45');
INSERT INTO `personallog` VALUES ('30677', '2268922110030', '28', '4', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-04 08:30:18', '2016-03-04', '08:30:18');
INSERT INTO `personallog` VALUES ('30678', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-04 08:30:26', '2016-03-04', '08:30:26');
INSERT INTO `personallog` VALUES ('30679', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 08:32:44', '2016-03-04', '08:32:44');
INSERT INTO `personallog` VALUES ('30680', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-04 08:33:04', '2016-03-04', '08:33:04');
INSERT INTO `personallog` VALUES ('30681', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-04 08:34:34', '2016-03-04', '08:34:34');
INSERT INTO `personallog` VALUES ('30682', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-04 08:34:36', '2016-03-04', '08:34:36');
INSERT INTO `personallog` VALUES ('30683', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-04 08:38:00', '2016-03-04', '08:38:00');
INSERT INTO `personallog` VALUES ('30684', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-04 08:38:05', '2016-03-04', '08:38:05');
INSERT INTO `personallog` VALUES ('30685', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-04 08:38:57', '2016-03-04', '08:38:57');
INSERT INTO `personallog` VALUES ('30686', '2268922110030', '70', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 08:39:05', '2016-03-04', '08:39:05');
INSERT INTO `personallog` VALUES ('30687', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-04 08:39:18', '2016-03-04', '08:39:18');
INSERT INTO `personallog` VALUES ('30688', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 08:47:55', '2016-03-04', '08:47:55');
INSERT INTO `personallog` VALUES ('30689', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-04 08:48:08', '2016-03-04', '08:48:08');
INSERT INTO `personallog` VALUES ('30690', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 08:51:11', '2016-03-04', '08:51:11');
INSERT INTO `personallog` VALUES ('30691', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 08:55:00', '2016-03-04', '08:55:00');
INSERT INTO `personallog` VALUES ('30692', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 08:55:02', '2016-03-04', '08:55:02');
INSERT INTO `personallog` VALUES ('30693', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 08:55:56', '2016-03-04', '08:55:56');
INSERT INTO `personallog` VALUES ('30694', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 08:56:08', '2016-03-04', '08:56:08');
INSERT INTO `personallog` VALUES ('30695', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 08:59:25', '2016-03-04', '08:59:25');
INSERT INTO `personallog` VALUES ('30696', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 08:59:41', '2016-03-04', '08:59:41');
INSERT INTO `personallog` VALUES ('30697', '2268922110030', '43', '4', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-04 09:02:40', '2016-03-04', '09:02:40');
INSERT INTO `personallog` VALUES ('30698', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-04 09:03:47', '2016-03-04', '09:03:47');
INSERT INTO `personallog` VALUES ('30699', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 09:04:16', '2016-03-04', '09:04:16');
INSERT INTO `personallog` VALUES ('30700', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 09:04:18', '2016-03-04', '09:04:18');
INSERT INTO `personallog` VALUES ('30701', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 09:05:43', '2016-03-04', '09:05:43');
INSERT INTO `personallog` VALUES ('30702', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 09:07:37', '2016-03-04', '09:07:37');
INSERT INTO `personallog` VALUES ('30703', '2268922110030', '86', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 09:08:07', '2016-03-04', '09:08:07');
INSERT INTO `personallog` VALUES ('30704', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 09:18:01', '2016-03-04', '09:18:01');
INSERT INTO `personallog` VALUES ('30705', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 09:23:40', '2016-03-04', '09:23:40');
INSERT INTO `personallog` VALUES ('30706', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-04 09:25:11', '2016-03-04', '09:25:11');
INSERT INTO `personallog` VALUES ('30707', '2268922110030', '44', '4', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-04 09:28:49', '2016-03-04', '09:28:49');
INSERT INTO `personallog` VALUES ('30708', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-04 09:30:47', '2016-03-04', '09:30:47');
INSERT INTO `personallog` VALUES ('30709', '2268922110030', '43', '4', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-04 09:38:30', '2016-03-04', '09:38:30');
INSERT INTO `personallog` VALUES ('30710', '2268922110030', '43', '4', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-04 09:40:33', '2016-03-04', '09:40:33');
INSERT INTO `personallog` VALUES ('30711', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 09:41:28', '2016-03-04', '09:41:28');
INSERT INTO `personallog` VALUES ('30712', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 09:44:25', '2016-03-04', '09:44:25');
INSERT INTO `personallog` VALUES ('30713', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 09:48:02', '2016-03-04', '09:48:02');
INSERT INTO `personallog` VALUES ('30714', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 09:49:42', '2016-03-04', '09:49:42');
INSERT INTO `personallog` VALUES ('30715', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 09:52:50', '2016-03-04', '09:52:50');
INSERT INTO `personallog` VALUES ('30716', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 09:55:43', '2016-03-04', '09:55:43');
INSERT INTO `personallog` VALUES ('30717', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 09:58:16', '2016-03-04', '09:58:16');
INSERT INTO `personallog` VALUES ('30718', '2268922110030', '44', '4', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-04 10:01:21', '2016-03-04', '10:01:21');
INSERT INTO `personallog` VALUES ('30719', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-04 10:02:22', '2016-03-04', '10:02:22');
INSERT INTO `personallog` VALUES ('30720', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 10:06:11', '2016-03-04', '10:06:11');
INSERT INTO `personallog` VALUES ('30721', '2268922110030', '20', '4', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-04 10:06:55', '2016-03-04', '10:06:55');
INSERT INTO `personallog` VALUES ('30722', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-04 10:15:22', '2016-03-04', '10:15:22');
INSERT INTO `personallog` VALUES ('30723', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 10:15:54', '2016-03-04', '10:15:54');
INSERT INTO `personallog` VALUES ('30724', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 10:32:34', '2016-03-04', '10:32:34');
INSERT INTO `personallog` VALUES ('30725', '2268922110030', '47', '4', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-04 10:32:47', '2016-03-04', '10:32:47');
INSERT INTO `personallog` VALUES ('30726', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 10:40:19', '2016-03-04', '10:40:19');
INSERT INTO `personallog` VALUES ('30727', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 10:48:51', '2016-03-04', '10:48:51');
INSERT INTO `personallog` VALUES ('30728', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 11:05:25', '2016-03-04', '11:05:25');
INSERT INTO `personallog` VALUES ('30729', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 11:24:18', '2016-03-04', '11:24:18');
INSERT INTO `personallog` VALUES ('30730', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 11:37:22', '2016-03-04', '11:37:22');
INSERT INTO `personallog` VALUES ('30731', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-04 11:42:22', '2016-03-04', '11:42:22');
INSERT INTO `personallog` VALUES ('30732', '2268922110030', '30', '4', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-04 11:45:38', '2016-03-04', '11:45:38');
INSERT INTO `personallog` VALUES ('30733', '2268922110030', '4', '4', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-04 11:57:45', '2016-03-04', '11:57:45');
INSERT INTO `personallog` VALUES ('30734', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 12:03:27', '2016-03-04', '12:03:27');
INSERT INTO `personallog` VALUES ('30735', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 12:15:27', '2016-03-04', '12:15:27');
INSERT INTO `personallog` VALUES ('30736', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 12:33:58', '2016-03-04', '12:33:58');
INSERT INTO `personallog` VALUES ('30737', '2268922110030', '47', '4', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-04 13:15:18', '2016-03-04', '13:15:18');
INSERT INTO `personallog` VALUES ('30738', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:19:02', '2016-03-04', '13:19:02');
INSERT INTO `personallog` VALUES ('30739', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:19:05', '2016-03-04', '13:19:05');
INSERT INTO `personallog` VALUES ('30740', '2268922110030', '63', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:23:26', '2016-03-04', '13:23:26');
INSERT INTO `personallog` VALUES ('30741', '2268922110030', '51', '4', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-04 13:25:48', '2016-03-04', '13:25:48');
INSERT INTO `personallog` VALUES ('30742', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:26:26', '2016-03-04', '13:26:26');
INSERT INTO `personallog` VALUES ('30743', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:26:28', '2016-03-04', '13:26:28');
INSERT INTO `personallog` VALUES ('30744', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 13:32:18', '2016-03-04', '13:32:18');
INSERT INTO `personallog` VALUES ('30745', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 13:37:21', '2016-03-04', '13:37:21');
INSERT INTO `personallog` VALUES ('30746', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-04 13:37:49', '2016-03-04', '13:37:49');
INSERT INTO `personallog` VALUES ('30747', '2268922110030', '87', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:37:54', '2016-03-04', '13:37:54');
INSERT INTO `personallog` VALUES ('30748', '2268922110030', '87', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:37:57', '2016-03-04', '13:37:57');
INSERT INTO `personallog` VALUES ('30749', '2268922110030', '45', '4', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-04 13:39:34', '2016-03-04', '13:39:34');
INSERT INTO `personallog` VALUES ('30750', '2268922110030', '78', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:43:31', '2016-03-04', '13:43:31');
INSERT INTO `personallog` VALUES ('30751', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 13:45:45', '2016-03-04', '13:45:45');
INSERT INTO `personallog` VALUES ('30752', '2268922110030', '88', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:47:43', '2016-03-04', '13:47:43');
INSERT INTO `personallog` VALUES ('30753', '2268922110030', '47', '4', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-04 13:48:08', '2016-03-04', '13:48:08');
INSERT INTO `personallog` VALUES ('30754', '2268922110030', '68', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:49:24', '2016-03-04', '13:49:24');
INSERT INTO `personallog` VALUES ('30755', '2268922110030', '79', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:50:36', '2016-03-04', '13:50:36');
INSERT INTO `personallog` VALUES ('30756', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:50:44', '2016-03-04', '13:50:44');
INSERT INTO `personallog` VALUES ('30757', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:52:21', '2016-03-04', '13:52:21');
INSERT INTO `personallog` VALUES ('30758', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:52:31', '2016-03-04', '13:52:31');
INSERT INTO `personallog` VALUES ('30759', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 13:52:34', '2016-03-04', '13:52:34');
INSERT INTO `personallog` VALUES ('30760', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 14:16:22', '2016-03-04', '14:16:22');
INSERT INTO `personallog` VALUES ('30761', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 14:18:21', '2016-03-04', '14:18:21');
INSERT INTO `personallog` VALUES ('30762', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 14:24:33', '2016-03-04', '14:24:33');
INSERT INTO `personallog` VALUES ('30763', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 14:30:41', '2016-03-04', '14:30:41');
INSERT INTO `personallog` VALUES ('30764', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-04 14:47:25', '2016-03-04', '14:47:25');
INSERT INTO `personallog` VALUES ('30765', '2268922110030', '14', '4', '2016-06-17 01:50:09', 'Card.Renita', 'Online', '2016-03-04 14:58:23', '2016-03-04', '14:58:23');
INSERT INTO `personallog` VALUES ('30766', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 15:00:28', '2016-03-04', '15:00:28');
INSERT INTO `personallog` VALUES ('30767', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 15:02:16', '2016-03-04', '15:02:16');
INSERT INTO `personallog` VALUES ('30768', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-04 15:31:17', '2016-03-04', '15:31:17');
INSERT INTO `personallog` VALUES ('30769', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 15:33:39', '2016-03-04', '15:33:39');
INSERT INTO `personallog` VALUES ('30770', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 15:37:43', '2016-03-04', '15:37:43');
INSERT INTO `personallog` VALUES ('30771', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 15:47:20', '2016-03-04', '15:47:20');
INSERT INTO `personallog` VALUES ('30772', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 16:02:44', '2016-03-04', '16:02:44');
INSERT INTO `personallog` VALUES ('30773', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 16:08:19', '2016-03-04', '16:08:19');
INSERT INTO `personallog` VALUES ('30774', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:10:30', '2016-03-04', '16:10:30');
INSERT INTO `personallog` VALUES ('30775', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:10:32', '2016-03-04', '16:10:32');
INSERT INTO `personallog` VALUES ('30776', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:10:55', '2016-03-04', '16:10:55');
INSERT INTO `personallog` VALUES ('30777', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:10:58', '2016-03-04', '16:10:58');
INSERT INTO `personallog` VALUES ('30778', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:12:50', '2016-03-04', '16:12:50');
INSERT INTO `personallog` VALUES ('30779', '2268922110030', '85', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 16:12:57', '2016-03-04', '16:12:57');
INSERT INTO `personallog` VALUES ('30780', '2268922110030', '24', '4', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-04 16:14:05', '2016-03-04', '16:14:05');
INSERT INTO `personallog` VALUES ('30781', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 16:46:17', '2016-03-04', '16:46:17');
INSERT INTO `personallog` VALUES ('30782', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 16:47:39', '2016-03-04', '16:47:39');
INSERT INTO `personallog` VALUES ('30783', '2268922110030', '34', '4', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 16:48:00', '2016-03-04', '16:48:00');
INSERT INTO `personallog` VALUES ('30784', '2268922110030', '40', '4', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-04 16:48:36', '2016-03-04', '16:48:36');
INSERT INTO `personallog` VALUES ('30785', '2268922110030', '16', '4', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-04 16:48:49', '2016-03-04', '16:48:49');
INSERT INTO `personallog` VALUES ('30786', '2268922110030', '13', '4', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-04 17:02:04', '2016-03-04', '17:02:04');
INSERT INTO `personallog` VALUES ('30787', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:04:18', '2016-03-04', '17:04:18');
INSERT INTO `personallog` VALUES ('30788', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:04:20', '2016-03-04', '17:04:20');
INSERT INTO `personallog` VALUES ('30789', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:05:13', '2016-03-04', '17:05:13');
INSERT INTO `personallog` VALUES ('30790', '2268922110030', '11', '4', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-04 17:08:12', '2016-03-04', '17:08:12');
INSERT INTO `personallog` VALUES ('30791', '2268922110030', '26', '5', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-04 17:10:34', '2016-03-04', '17:10:34');
INSERT INTO `personallog` VALUES ('30792', '2268922110030', '33', '4', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 17:11:38', '2016-03-04', '17:11:38');
INSERT INTO `personallog` VALUES ('30793', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:13:11', '2016-03-04', '17:13:11');
INSERT INTO `personallog` VALUES ('30794', '2268922110030', '83', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:13:49', '2016-03-04', '17:13:49');
INSERT INTO `personallog` VALUES ('30795', '2268922110030', '36', '4', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-04 17:14:16', '2016-03-04', '17:14:16');
INSERT INTO `personallog` VALUES ('30796', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:17:13', '2016-03-04', '17:17:13');
INSERT INTO `personallog` VALUES ('30797', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 17:17:15', '2016-03-04', '17:17:15');
INSERT INTO `personallog` VALUES ('30798', '2268922110030', '31', '1', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-04 17:31:10', '2016-03-04', '17:31:10');
INSERT INTO `personallog` VALUES ('30799', '2268922110030', '32', '1', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-04 17:32:53', '2016-03-04', '17:32:53');
INSERT INTO `personallog` VALUES ('30800', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-04 17:33:01', '2016-03-04', '17:33:01');
INSERT INTO `personallog` VALUES ('30801', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-04 17:33:03', '2016-03-04', '17:33:03');
INSERT INTO `personallog` VALUES ('30802', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-04 17:38:58', '2016-03-04', '17:38:58');
INSERT INTO `personallog` VALUES ('30803', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-04 17:39:03', '2016-03-04', '17:39:03');
INSERT INTO `personallog` VALUES ('30804', '2268922110030', '34', '1', '2016-06-17 01:50:09', 'Sisca Sopiani', 'Online', '2016-03-04 17:39:05', '2016-03-04', '17:39:05');
INSERT INTO `personallog` VALUES ('30805', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-04 17:39:36', '2016-03-04', '17:39:36');
INSERT INTO `personallog` VALUES ('30806', '2268922110030', '29', '1', '2016-06-17 01:50:09', 'renita Pratiwi', 'Online', '2016-03-04 17:39:42', '2016-03-04', '17:39:42');
INSERT INTO `personallog` VALUES ('30807', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-04 17:40:23', '2016-03-04', '17:40:23');
INSERT INTO `personallog` VALUES ('30808', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-04 17:40:28', '2016-03-04', '17:40:28');
INSERT INTO `personallog` VALUES ('30809', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-04 17:40:30', '2016-03-04', '17:40:30');
INSERT INTO `personallog` VALUES ('30810', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-04 18:16:58', '2016-03-04', '18:16:58');
INSERT INTO `personallog` VALUES ('30811', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-04 18:17:04', '2016-03-04', '18:17:04');
INSERT INTO `personallog` VALUES ('30812', '2268922110030', '30', '1', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-04 18:38:38', '2016-03-04', '18:38:38');
INSERT INTO `personallog` VALUES ('30813', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 19:43:52', '2016-03-04', '19:43:52');
INSERT INTO `personallog` VALUES ('30814', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 19:43:54', '2016-03-04', '19:43:54');
INSERT INTO `personallog` VALUES ('30815', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 20:12:20', '2016-03-04', '20:12:20');
INSERT INTO `personallog` VALUES ('30816', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 20:12:22', '2016-03-04', '20:12:22');
INSERT INTO `personallog` VALUES ('30817', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:01:12', '2016-03-04', '22:01:12');
INSERT INTO `personallog` VALUES ('30818', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:01:16', '2016-03-04', '22:01:16');
INSERT INTO `personallog` VALUES ('30819', '2268922110030', '78', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:01:26', '2016-03-04', '22:01:26');
INSERT INTO `personallog` VALUES ('30820', '2268922110030', '88', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:01:48', '2016-03-04', '22:01:48');
INSERT INTO `personallog` VALUES ('30821', '2268922110030', '87', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:01:54', '2016-03-04', '22:01:54');
INSERT INTO `personallog` VALUES ('30822', '2268922110030', '87', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:02:01', '2016-03-04', '22:02:01');
INSERT INTO `personallog` VALUES ('30823', '2268922110030', '73', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:02:08', '2016-03-04', '22:02:08');
INSERT INTO `personallog` VALUES ('30824', '2268922110030', '77', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:02:16', '2016-03-04', '22:02:16');
INSERT INTO `personallog` VALUES ('30825', '2268922110030', '79', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:03:02', '2016-03-04', '22:03:02');
INSERT INTO `personallog` VALUES ('30826', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:03:49', '2016-03-04', '22:03:49');
INSERT INTO `personallog` VALUES ('30827', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:10:28', '2016-03-04', '22:10:28');
INSERT INTO `personallog` VALUES ('30828', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:10:31', '2016-03-04', '22:10:31');
INSERT INTO `personallog` VALUES ('30829', '2268922110030', '68', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:12:51', '2016-03-04', '22:12:51');
INSERT INTO `personallog` VALUES ('30830', '2268922110030', '70', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:17:15', '2016-03-04', '22:17:15');
INSERT INTO `personallog` VALUES ('30831', '2268922110030', '63', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-04 22:17:59', '2016-03-04', '22:17:59');
INSERT INTO `personallog` VALUES ('30832', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:33:36', '2016-03-05', '07:33:36');
INSERT INTO `personallog` VALUES ('30833', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:33:39', '2016-03-05', '07:33:39');
INSERT INTO `personallog` VALUES ('30834', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:36:01', '2016-03-05', '07:36:01');
INSERT INTO `personallog` VALUES ('30835', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:36:08', '2016-03-05', '07:36:08');
INSERT INTO `personallog` VALUES ('30836', '2268922110030', '85', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:41:29', '2016-03-05', '07:41:29');
INSERT INTO `personallog` VALUES ('30837', '2268922110030', '67', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:56:02', '2016-03-05', '07:56:02');
INSERT INTO `personallog` VALUES ('30838', '2268922110030', '65', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:57:42', '2016-03-05', '07:57:42');
INSERT INTO `personallog` VALUES ('30839', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:57:47', '2016-03-05', '07:57:47');
INSERT INTO `personallog` VALUES ('30840', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 07:57:50', '2016-03-05', '07:57:50');
INSERT INTO `personallog` VALUES ('30841', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:32:08', '2016-03-05', '08:32:08');
INSERT INTO `personallog` VALUES ('30842', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:32:10', '2016-03-05', '08:32:10');
INSERT INTO `personallog` VALUES ('30843', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:41:39', '2016-03-05', '08:41:39');
INSERT INTO `personallog` VALUES ('30844', '2268922110030', '70', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:46:04', '2016-03-05', '08:46:04');
INSERT INTO `personallog` VALUES ('30845', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:49:53', '2016-03-05', '08:49:53');
INSERT INTO `personallog` VALUES ('30846', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:50:00', '2016-03-05', '08:50:00');
INSERT INTO `personallog` VALUES ('30847', '2268922110030', '68', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 08:53:11', '2016-03-05', '08:53:11');
INSERT INTO `personallog` VALUES ('30848', '2268922110030', '86', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 09:14:16', '2016-03-05', '09:14:16');
INSERT INTO `personallog` VALUES ('30849', '2268922110030', '79', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 09:19:39', '2016-03-05', '09:19:39');
INSERT INTO `personallog` VALUES ('30850', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 11:51:43', '2016-03-05', '11:51:43');
INSERT INTO `personallog` VALUES ('30851', '2268922110030', '72', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:03:54', '2016-03-05', '13:03:54');
INSERT INTO `personallog` VALUES ('30852', '2268922110030', '63', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:30:21', '2016-03-05', '13:30:21');
INSERT INTO `personallog` VALUES ('30853', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:30:24', '2016-03-05', '13:30:24');
INSERT INTO `personallog` VALUES ('30854', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:30:27', '2016-03-05', '13:30:27');
INSERT INTO `personallog` VALUES ('30855', '2268922110030', '78', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:33:16', '2016-03-05', '13:33:16');
INSERT INTO `personallog` VALUES ('30856', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:33:33', '2016-03-05', '13:33:33');
INSERT INTO `personallog` VALUES ('30857', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:34:30', '2016-03-05', '13:34:30');
INSERT INTO `personallog` VALUES ('30858', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:34:32', '2016-03-05', '13:34:32');
INSERT INTO `personallog` VALUES ('30859', '2268922110030', '88', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:38:36', '2016-03-05', '13:38:36');
INSERT INTO `personallog` VALUES ('30860', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:44:33', '2016-03-05', '13:44:33');
INSERT INTO `personallog` VALUES ('30861', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 13:44:35', '2016-03-05', '13:44:35');
INSERT INTO `personallog` VALUES ('30862', '2268922110030', '83', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 14:17:05', '2016-03-05', '14:17:05');
INSERT INTO `personallog` VALUES ('30863', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:04:03', '2016-03-05', '16:04:03');
INSERT INTO `personallog` VALUES ('30864', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:08:41', '2016-03-05', '16:08:41');
INSERT INTO `personallog` VALUES ('30865', '2268922110030', '85', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:08:51', '2016-03-05', '16:08:51');
INSERT INTO `personallog` VALUES ('30866', '2268922110030', '85', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:08:59', '2016-03-05', '16:08:59');
INSERT INTO `personallog` VALUES ('30867', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:17:04', '2016-03-05', '16:17:04');
INSERT INTO `personallog` VALUES ('30868', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:17:06', '2016-03-05', '16:17:06');
INSERT INTO `personallog` VALUES ('30869', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:17:12', '2016-03-05', '16:17:12');
INSERT INTO `personallog` VALUES ('30870', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 16:17:14', '2016-03-05', '16:17:14');
INSERT INTO `personallog` VALUES ('30871', '2268922110030', '79', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 17:04:38', '2016-03-05', '17:04:38');
INSERT INTO `personallog` VALUES ('30872', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 17:09:44', '2016-03-05', '17:09:44');
INSERT INTO `personallog` VALUES ('30873', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 17:09:46', '2016-03-05', '17:09:46');
INSERT INTO `personallog` VALUES ('30874', '2268922110030', '68', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 17:41:16', '2016-03-05', '17:41:16');
INSERT INTO `personallog` VALUES ('30875', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 19:48:26', '2016-03-05', '19:48:26');
INSERT INTO `personallog` VALUES ('30876', '2268922110030', '82', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 19:48:29', '2016-03-05', '19:48:29');
INSERT INTO `personallog` VALUES ('30877', '2268922110030', '89', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 20:04:45', '2016-03-05', '20:04:45');
INSERT INTO `personallog` VALUES ('30878', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 20:05:30', '2016-03-05', '20:05:30');
INSERT INTO `personallog` VALUES ('30879', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 20:05:32', '2016-03-05', '20:05:32');
INSERT INTO `personallog` VALUES ('30880', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 20:21:14', '2016-03-05', '20:21:14');
INSERT INTO `personallog` VALUES ('30881', '2268922110030', '77', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 20:21:22', '2016-03-05', '20:21:22');
INSERT INTO `personallog` VALUES ('30882', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:01:32', '2016-03-05', '22:01:32');
INSERT INTO `personallog` VALUES ('30883', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:01:49', '2016-03-05', '22:01:49');
INSERT INTO `personallog` VALUES ('30884', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:01:51', '2016-03-05', '22:01:51');
INSERT INTO `personallog` VALUES ('30885', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:04:26', '2016-03-05', '22:04:26');
INSERT INTO `personallog` VALUES ('30886', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:04:29', '2016-03-05', '22:04:29');
INSERT INTO `personallog` VALUES ('30887', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:04:49', '2016-03-05', '22:04:49');
INSERT INTO `personallog` VALUES ('30888', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:04:51', '2016-03-05', '22:04:51');
INSERT INTO `personallog` VALUES ('30889', '2268922110030', '83', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:07:13', '2016-03-05', '22:07:13');
INSERT INTO `personallog` VALUES ('30890', '2268922110030', '73', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:12:25', '2016-03-05', '22:12:25');
INSERT INTO `personallog` VALUES ('30891', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:16:55', '2016-03-05', '22:16:55');
INSERT INTO `personallog` VALUES ('30892', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:16:58', '2016-03-05', '22:16:58');
INSERT INTO `personallog` VALUES ('30893', '2268922110030', '88', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:18:02', '2016-03-05', '22:18:02');
INSERT INTO `personallog` VALUES ('30894', '2268922110030', '87', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:19:24', '2016-03-05', '22:19:24');
INSERT INTO `personallog` VALUES ('30895', '2268922110030', '70', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:31:02', '2016-03-05', '22:31:02');
INSERT INTO `personallog` VALUES ('30896', '2268922110030', '78', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:31:26', '2016-03-05', '22:31:26');
INSERT INTO `personallog` VALUES ('30897', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:31:36', '2016-03-05', '22:31:36');
INSERT INTO `personallog` VALUES ('30898', '2268922110030', '72', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:45:21', '2016-03-05', '22:45:21');
INSERT INTO `personallog` VALUES ('30899', '2268922110030', '63', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-05 22:45:30', '2016-03-05', '22:45:30');
INSERT INTO `personallog` VALUES ('30900', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:28:33', '2016-03-06', '07:28:33');
INSERT INTO `personallog` VALUES ('30901', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:28:35', '2016-03-06', '07:28:35');
INSERT INTO `personallog` VALUES ('30902', '2268922110030', '67', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:37:51', '2016-03-06', '07:37:51');
INSERT INTO `personallog` VALUES ('30903', '2268922110030', '85', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:41:42', '2016-03-06', '07:41:42');
INSERT INTO `personallog` VALUES ('30904', '2268922110030', '81', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:52:00', '2016-03-06', '07:52:00');
INSERT INTO `personallog` VALUES ('30905', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:55:46', '2016-03-06', '07:55:46');
INSERT INTO `personallog` VALUES ('30906', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:55:48', '2016-03-06', '07:55:48');
INSERT INTO `personallog` VALUES ('30907', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:55:51', '2016-03-06', '07:55:51');
INSERT INTO `personallog` VALUES ('30908', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 07:55:53', '2016-03-06', '07:55:53');
INSERT INTO `personallog` VALUES ('30909', '2268922110030', '65', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:04:15', '2016-03-06', '08:04:15');
INSERT INTO `personallog` VALUES ('30910', '2268922110030', '90', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:12:31', '2016-03-06', '08:12:31');
INSERT INTO `personallog` VALUES ('30911', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:36:31', '2016-03-06', '08:36:31');
INSERT INTO `personallog` VALUES ('30912', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:36:35', '2016-03-06', '08:36:35');
INSERT INTO `personallog` VALUES ('30913', '2268922110030', '76', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:50:13', '2016-03-06', '08:50:13');
INSERT INTO `personallog` VALUES ('30914', '2268922110030', '68', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 08:51:00', '2016-03-06', '08:51:00');
INSERT INTO `personallog` VALUES ('30915', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 09:01:02', '2016-03-06', '09:01:02');
INSERT INTO `personallog` VALUES ('30916', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 09:01:04', '2016-03-06', '09:01:04');
INSERT INTO `personallog` VALUES ('30917', '2268922110030', '79', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 09:06:51', '2016-03-06', '09:06:51');
INSERT INTO `personallog` VALUES ('30918', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 09:59:06', '2016-03-06', '09:59:06');
INSERT INTO `personallog` VALUES ('30919', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 09:59:08', '2016-03-06', '09:59:08');
INSERT INTO `personallog` VALUES ('30920', '2268922110030', '72', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 10:14:03', '2016-03-06', '10:14:03');
INSERT INTO `personallog` VALUES ('30921', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 11:50:30', '2016-03-06', '11:50:30');
INSERT INTO `personallog` VALUES ('30922', '2268922110030', '88', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:24:27', '2016-03-06', '13:24:27');
INSERT INTO `personallog` VALUES ('30923', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:28:57', '2016-03-06', '13:28:57');
INSERT INTO `personallog` VALUES ('30924', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:28:59', '2016-03-06', '13:28:59');
INSERT INTO `personallog` VALUES ('30925', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:40:19', '2016-03-06', '13:40:19');
INSERT INTO `personallog` VALUES ('30926', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:40:21', '2016-03-06', '13:40:21');
INSERT INTO `personallog` VALUES ('30927', '2268922110030', '78', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:41:35', '2016-03-06', '13:41:35');
INSERT INTO `personallog` VALUES ('30928', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:41:43', '2016-03-06', '13:41:43');
INSERT INTO `personallog` VALUES ('30929', '2268922110030', '87', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:49:46', '2016-03-06', '13:49:46');
INSERT INTO `personallog` VALUES ('30930', '2268922110030', '87', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:49:49', '2016-03-06', '13:49:49');
INSERT INTO `personallog` VALUES ('30931', '2268922110030', '11', '1', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-06 13:50:45', '2016-03-06', '13:50:45');
INSERT INTO `personallog` VALUES ('30932', '2268922110030', '63', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:54:17', '2016-03-06', '13:54:17');
INSERT INTO `personallog` VALUES ('30933', '2268922110030', '70', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 13:56:03', '2016-03-06', '13:56:03');
INSERT INTO `personallog` VALUES ('30934', '2268922110030', '83', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 14:02:25', '2016-03-06', '14:02:25');
INSERT INTO `personallog` VALUES ('30935', '2268922110030', '86', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 14:27:58', '2016-03-06', '14:27:58');
INSERT INTO `personallog` VALUES ('30936', '2268922110030', '85', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:05:17', '2016-03-06', '16:05:17');
INSERT INTO `personallog` VALUES ('30937', '2268922110030', '85', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:05:42', '2016-03-06', '16:05:42');
INSERT INTO `personallog` VALUES ('30938', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:09:56', '2016-03-06', '16:09:56');
INSERT INTO `personallog` VALUES ('30939', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:09:58', '2016-03-06', '16:09:58');
INSERT INTO `personallog` VALUES ('30940', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:15:50', '2016-03-06', '16:15:50');
INSERT INTO `personallog` VALUES ('30941', '2268922110030', '64', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:15:53', '2016-03-06', '16:15:53');
INSERT INTO `personallog` VALUES ('30942', '2268922110030', '64', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 16:16:04', '2016-03-06', '16:16:04');
INSERT INTO `personallog` VALUES ('30943', '2268922110030', '79', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 17:05:04', '2016-03-06', '17:05:04');
INSERT INTO `personallog` VALUES ('30944', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 17:21:19', '2016-03-06', '17:21:19');
INSERT INTO `personallog` VALUES ('30945', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 17:21:21', '2016-03-06', '17:21:21');
INSERT INTO `personallog` VALUES ('30946', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 17:33:07', '2016-03-06', '17:33:07');
INSERT INTO `personallog` VALUES ('30947', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 17:33:09', '2016-03-06', '17:33:09');
INSERT INTO `personallog` VALUES ('30948', '2268922110030', '90', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 18:03:14', '2016-03-06', '18:03:14');
INSERT INTO `personallog` VALUES ('30949', '2268922110030', '80', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 19:55:53', '2016-03-06', '19:55:53');
INSERT INTO `personallog` VALUES ('30950', '2268922110030', '82', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 19:55:59', '2016-03-06', '19:55:59');
INSERT INTO `personallog` VALUES ('30951', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 20:04:43', '2016-03-06', '20:04:43');
INSERT INTO `personallog` VALUES ('30952', '2268922110030', '84', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 20:04:45', '2016-03-06', '20:04:45');
INSERT INTO `personallog` VALUES ('30953', '2268922110030', '81', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 20:05:35', '2016-03-06', '20:05:35');
INSERT INTO `personallog` VALUES ('30954', '2268922110030', '89', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 20:09:57', '2016-03-06', '20:09:57');
INSERT INTO `personallog` VALUES ('30955', '2268922110030', '72', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 21:16:36', '2016-03-06', '21:16:36');
INSERT INTO `personallog` VALUES ('30956', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:08', '2016-03-06', '22:01:08');
INSERT INTO `personallog` VALUES ('30957', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:10', '2016-03-06', '22:01:10');
INSERT INTO `personallog` VALUES ('30958', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:16', '2016-03-06', '22:01:16');
INSERT INTO `personallog` VALUES ('30959', '2268922110030', '76', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:22', '2016-03-06', '22:01:22');
INSERT INTO `personallog` VALUES ('30960', '2268922110030', '77', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:26', '2016-03-06', '22:01:26');
INSERT INTO `personallog` VALUES ('30961', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:31', '2016-03-06', '22:01:31');
INSERT INTO `personallog` VALUES ('30962', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:33', '2016-03-06', '22:01:33');
INSERT INTO `personallog` VALUES ('30963', '2268922110030', '87', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:41', '2016-03-06', '22:01:41');
INSERT INTO `personallog` VALUES ('30964', '2268922110030', '87', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:43', '2016-03-06', '22:01:43');
INSERT INTO `personallog` VALUES ('30965', '2268922110030', '78', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:46', '2016-03-06', '22:01:46');
INSERT INTO `personallog` VALUES ('30966', '2268922110030', '83', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:50', '2016-03-06', '22:01:50');
INSERT INTO `personallog` VALUES ('30967', '2268922110030', '83', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:53', '2016-03-06', '22:01:53');
INSERT INTO `personallog` VALUES ('30968', '2268922110030', '88', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:01:59', '2016-03-06', '22:01:59');
INSERT INTO `personallog` VALUES ('30969', '2268922110030', '73', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:02:09', '2016-03-06', '22:02:09');
INSERT INTO `personallog` VALUES ('30970', '2268922110030', '88', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:02:12', '2016-03-06', '22:02:12');
INSERT INTO `personallog` VALUES ('30971', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:02:17', '2016-03-06', '22:02:17');
INSERT INTO `personallog` VALUES ('30972', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:02:19', '2016-03-06', '22:02:19');
INSERT INTO `personallog` VALUES ('30973', '2268922110030', '68', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:03:48', '2016-03-06', '22:03:48');
INSERT INTO `personallog` VALUES ('30974', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:20:53', '2016-03-06', '22:20:53');
INSERT INTO `personallog` VALUES ('30975', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:20:55', '2016-03-06', '22:20:55');
INSERT INTO `personallog` VALUES ('30976', '2268922110030', '70', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:24:27', '2016-03-06', '22:24:27');
INSERT INTO `personallog` VALUES ('30977', '2268922110030', '63', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-06 22:24:43', '2016-03-06', '22:24:43');
INSERT INTO `personallog` VALUES ('31729', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-07 09:37:23', '2016-03-07', '09:37:23');
INSERT INTO `personallog` VALUES ('31730', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-07 11:59:30', '2016-03-07', '11:59:30');
INSERT INTO `personallog` VALUES ('31731', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-07 14:46:22', '2016-03-07', '14:46:22');
INSERT INTO `personallog` VALUES ('31732', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-07 16:56:24', '2016-03-07', '16:56:24');
INSERT INTO `personallog` VALUES ('31733', '2268922110030', '4', '0', '2016-06-17 01:50:09', 'Card.Dahlia', 'Online', '2016-03-07 17:35:53', '2016-03-07', '17:35:53');
INSERT INTO `personallog` VALUES ('31734', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-07 08:31:23', '2016-03-07', '08:31:23');
INSERT INTO `personallog` VALUES ('31735', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-07 13:46:51', '2016-03-07', '13:46:51');
INSERT INTO `personallog` VALUES ('31736', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-07 13:59:14', '2016-03-07', '13:59:14');
INSERT INTO `personallog` VALUES ('31737', '2268922110030', '6', '0', '2016-06-17 01:50:09', 'Card.Yosika', 'Online', '2016-03-07 17:17:52', '2016-03-07', '17:17:52');
INSERT INTO `personallog` VALUES ('31738', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 10:30:39', '2016-03-07', '10:30:39');
INSERT INTO `personallog` VALUES ('31739', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 10:35:14', '2016-03-07', '10:35:14');
INSERT INTO `personallog` VALUES ('31740', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 10:36:01', '2016-03-07', '10:36:01');
INSERT INTO `personallog` VALUES ('31741', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 11:23:25', '2016-03-07', '11:23:25');
INSERT INTO `personallog` VALUES ('31742', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 11:39:34', '2016-03-07', '11:39:34');
INSERT INTO `personallog` VALUES ('31743', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 12:30:36', '2016-03-07', '12:30:36');
INSERT INTO `personallog` VALUES ('31744', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 13:41:20', '2016-03-07', '13:41:20');
INSERT INTO `personallog` VALUES ('31745', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 14:06:41', '2016-03-07', '14:06:41');
INSERT INTO `personallog` VALUES ('31746', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 17:19:26', '2016-03-07', '17:19:26');
INSERT INTO `personallog` VALUES ('31747', '2268922110030', '11', '0', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 17:34:35', '2016-03-07', '17:34:35');
INSERT INTO `personallog` VALUES ('31748', '2268922110030', '11', '1', '2016-06-17 01:50:09', 'Card.Narudin', 'Online', '2016-03-07 17:45:19', '2016-03-07', '17:45:19');
INSERT INTO `personallog` VALUES ('31749', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 09:00:10', '2016-03-07', '09:00:10');
INSERT INTO `personallog` VALUES ('31750', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 09:14:26', '2016-03-07', '09:14:26');
INSERT INTO `personallog` VALUES ('31751', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 09:28:02', '2016-03-07', '09:28:02');
INSERT INTO `personallog` VALUES ('31752', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 10:08:28', '2016-03-07', '10:08:28');
INSERT INTO `personallog` VALUES ('31753', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 12:33:15', '2016-03-07', '12:33:15');
INSERT INTO `personallog` VALUES ('31754', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 14:36:10', '2016-03-07', '14:36:10');
INSERT INTO `personallog` VALUES ('31755', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 14:41:24', '2016-03-07', '14:41:24');
INSERT INTO `personallog` VALUES ('31756', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 15:03:48', '2016-03-07', '15:03:48');
INSERT INTO `personallog` VALUES ('31757', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 16:33:40', '2016-03-07', '16:33:40');
INSERT INTO `personallog` VALUES ('31758', '2268922110030', '13', '0', '2016-06-17 01:50:09', 'Card.Indri', 'Online', '2016-03-07 16:39:42', '2016-03-07', '16:39:42');
INSERT INTO `personallog` VALUES ('31759', '2268922110030', '15', '0', '2016-06-17 01:50:09', 'Card.Alam', 'Online', '2016-03-07 15:43:44', '2016-03-07', '15:43:44');
INSERT INTO `personallog` VALUES ('31760', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-07 10:56:00', '2016-03-07', '10:56:00');
INSERT INTO `personallog` VALUES ('31761', '2268922110030', '16', '0', '2016-06-17 01:50:09', 'Card.Bambang', 'Online', '2016-03-07 15:29:57', '2016-03-07', '15:29:57');
INSERT INTO `personallog` VALUES ('31762', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 09:41:41', '2016-03-07', '09:41:41');
INSERT INTO `personallog` VALUES ('31763', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 12:46:27', '2016-03-07', '12:46:27');
INSERT INTO `personallog` VALUES ('31764', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 13:07:49', '2016-03-07', '13:07:49');
INSERT INTO `personallog` VALUES ('31765', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 14:27:46', '2016-03-07', '14:27:46');
INSERT INTO `personallog` VALUES ('31766', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 15:07:15', '2016-03-07', '15:07:15');
INSERT INTO `personallog` VALUES ('31767', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 15:42:25', '2016-03-07', '15:42:25');
INSERT INTO `personallog` VALUES ('31768', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 16:30:36', '2016-03-07', '16:30:36');
INSERT INTO `personallog` VALUES ('31769', '2268922110030', '20', '0', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 16:41:26', '2016-03-07', '16:41:26');
INSERT INTO `personallog` VALUES ('31770', '2268922110030', '20', '1', '2016-06-17 01:50:09', 'Card.Steve', 'Online', '2016-03-07 17:45:08', '2016-03-07', '17:45:08');
INSERT INTO `personallog` VALUES ('31771', '2268922110030', '24', '0', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-07 08:39:10', '2016-03-07', '08:39:10');
INSERT INTO `personallog` VALUES ('31772', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-07 17:37:16', '2016-03-07', '17:37:16');
INSERT INTO `personallog` VALUES ('31773', '2268922110030', '24', '1', '2016-06-17 01:50:09', 'Akhmad Ridwan', 'Online', '2016-03-07 17:37:22', '2016-03-07', '17:37:22');
INSERT INTO `personallog` VALUES ('31774', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-07 08:46:07', '2016-03-07', '08:46:07');
INSERT INTO `personallog` VALUES ('31775', '2268922110030', '25', '0', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-07 17:36:12', '2016-03-07', '17:36:12');
INSERT INTO `personallog` VALUES ('31776', '2268922110030', '25', '1', '2016-06-17 01:50:09', 'Steve lieqy', 'Online', '2016-03-07 17:45:04', '2016-03-07', '17:45:04');
INSERT INTO `personallog` VALUES ('31777', '2268922110030', '26', '0', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-07 08:08:23', '2016-03-07', '08:08:23');
INSERT INTO `personallog` VALUES ('31778', '2268922110030', '26', '1', '2016-06-17 01:50:09', 'Indri Lestari', 'Online', '2016-03-07 18:06:08', '2016-03-07', '18:06:08');
INSERT INTO `personallog` VALUES ('31779', '2268922110030', '28', '5', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-07 08:38:23', '2016-03-07', '08:38:23');
INSERT INTO `personallog` VALUES ('31780', '2268922110030', '28', '0', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-07 08:38:30', '2016-03-07', '08:38:30');
INSERT INTO `personallog` VALUES ('31781', '2268922110030', '28', '1', '2016-06-17 01:50:09', 'Piter', 'Online', '2016-03-07 22:20:11', '2016-03-07', '22:20:11');
INSERT INTO `personallog` VALUES ('31782', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-07 08:15:00', '2016-03-07', '08:15:00');
INSERT INTO `personallog` VALUES ('31783', '2268922110030', '30', '5', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-07 08:38:05', '2016-03-07', '08:38:05');
INSERT INTO `personallog` VALUES ('31784', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-07 12:59:37', '2016-03-07', '12:59:37');
INSERT INTO `personallog` VALUES ('31785', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-07 13:33:11', '2016-03-07', '13:33:11');
INSERT INTO `personallog` VALUES ('31786', '2268922110030', '30', '0', '2016-06-17 01:50:09', 'Alam Mafian', 'Online', '2016-03-07 13:42:50', '2016-03-07', '13:42:50');
INSERT INTO `personallog` VALUES ('31787', '2268922110030', '31', '0', '2016-06-17 01:50:09', 'Bambang Setyadi', 'Online', '2016-03-07 07:39:03', '2016-03-07', '07:39:03');
INSERT INTO `personallog` VALUES ('31788', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-07 08:18:20', '2016-03-07', '08:18:20');
INSERT INTO `personallog` VALUES ('31789', '2268922110030', '32', '0', '2016-06-17 01:50:09', 'Radumta Sitepu', 'Online', '2016-03-07 17:35:32', '2016-03-07', '17:35:32');
INSERT INTO `personallog` VALUES ('31790', '2268922110030', '33', '0', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-07 08:18:39', '2016-03-07', '08:18:39');
INSERT INTO `personallog` VALUES ('31791', '2268922110030', '33', '1', '2016-06-17 01:50:09', 'Yosika', 'Online', '2016-03-07 17:37:31', '2016-03-07', '17:37:31');
INSERT INTO `personallog` VALUES ('31792', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-07 08:34:45', '2016-03-07', '08:34:45');
INSERT INTO `personallog` VALUES ('31793', '2268922110030', '35', '0', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-07 08:34:50', '2016-03-07', '08:34:50');
INSERT INTO `personallog` VALUES ('31794', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-07 17:45:16', '2016-03-07', '17:45:16');
INSERT INTO `personallog` VALUES ('31795', '2268922110030', '35', '1', '2016-06-17 01:50:09', 'Adetya Kurniawan', 'Online', '2016-03-07 17:45:18', '2016-03-07', '17:45:18');
INSERT INTO `personallog` VALUES ('31796', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-07 08:16:55', '2016-03-07', '08:16:55');
INSERT INTO `personallog` VALUES ('31797', '2268922110030', '36', '0', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-07 08:16:57', '2016-03-07', '08:16:57');
INSERT INTO `personallog` VALUES ('31798', '2268922110030', '36', '1', '2016-06-17 01:50:09', 'Dahlia', 'Online', '2016-03-07 17:37:27', '2016-03-07', '17:37:27');
INSERT INTO `personallog` VALUES ('31799', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-07 07:41:28', '2016-03-07', '07:41:28');
INSERT INTO `personallog` VALUES ('31800', '2268922110030', '37', '0', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-07 17:35:18', '2016-03-07', '17:35:18');
INSERT INTO `personallog` VALUES ('31801', '2268922110030', '37', '1', '2016-06-17 01:50:09', 'Narudin', 'Online', '2016-03-07 17:53:13', '2016-03-07', '17:53:13');
INSERT INTO `personallog` VALUES ('31802', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-07 10:10:16', '2016-03-07', '10:10:16');
INSERT INTO `personallog` VALUES ('31803', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-07 13:17:00', '2016-03-07', '13:17:00');
INSERT INTO `personallog` VALUES ('31804', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-07 15:00:40', '2016-03-07', '15:00:40');
INSERT INTO `personallog` VALUES ('31805', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-07 15:30:10', '2016-03-07', '15:30:10');
INSERT INTO `personallog` VALUES ('31806', '2268922110030', '40', '0', '2016-06-17 01:50:09', 'Yudhistira Tjahjadi', 'Online', '2016-03-07 16:06:22', '2016-03-07', '16:06:22');
INSERT INTO `personallog` VALUES ('31807', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-07 08:38:52', '2016-03-07', '08:38:52');
INSERT INTO `personallog` VALUES ('31808', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-07 13:00:45', '2016-03-07', '13:00:45');
INSERT INTO `personallog` VALUES ('31809', '2268922110030', '42', '0', '2016-06-17 01:50:09', 'Melissa Waluyan', 'Online', '2016-03-07 16:19:46', '2016-03-07', '16:19:46');
INSERT INTO `personallog` VALUES ('31810', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-07 08:24:44', '2016-03-07', '08:24:44');
INSERT INTO `personallog` VALUES ('31811', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-07 08:59:44', '2016-03-07', '08:59:44');
INSERT INTO `personallog` VALUES ('31812', '2268922110030', '43', '0', '2016-06-17 01:50:09', 'Julius Setiono', 'Online', '2016-03-07 09:31:58', '2016-03-07', '09:31:58');
INSERT INTO `personallog` VALUES ('31813', '2268922110030', '44', '0', '2016-06-17 01:50:09', 'Card.Bayu', 'Online', '2016-03-07 09:07:41', '2016-03-07', '09:07:41');
INSERT INTO `personallog` VALUES ('31814', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-07 09:38:01', '2016-03-07', '09:38:01');
INSERT INTO `personallog` VALUES ('31815', '2268922110030', '45', '0', '2016-06-17 01:50:09', 'Gilbert Tony G', 'Online', '2016-03-07 11:58:34', '2016-03-07', '11:58:34');
INSERT INTO `personallog` VALUES ('31816', '2268922110030', '46', '0', '2016-06-17 01:50:09', 'Bayu Adhi Wicaksono', 'Online', '2016-03-07 08:34:26', '2016-03-07', '08:34:26');
INSERT INTO `personallog` VALUES ('31817', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-07 07:43:39', '2016-03-07', '07:43:39');
INSERT INTO `personallog` VALUES ('31818', '2268922110030', '47', '0', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-07 08:21:10', '2016-03-07', '08:21:10');
INSERT INTO `personallog` VALUES ('31819', '2268922110030', '47', '1', '2016-06-17 01:50:09', 'Budi Setia', 'Online', '2016-03-07 18:06:14', '2016-03-07', '18:06:14');
INSERT INTO `personallog` VALUES ('31820', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 08:16:44', '2016-03-07', '08:16:44');
INSERT INTO `personallog` VALUES ('31821', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 09:28:19', '2016-03-07', '09:28:19');
INSERT INTO `personallog` VALUES ('31822', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 10:47:44', '2016-03-07', '10:47:44');
INSERT INTO `personallog` VALUES ('31823', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 11:09:59', '2016-03-07', '11:09:59');
INSERT INTO `personallog` VALUES ('31824', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 12:01:12', '2016-03-07', '12:01:12');
INSERT INTO `personallog` VALUES ('31825', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 12:52:05', '2016-03-07', '12:52:05');
INSERT INTO `personallog` VALUES ('31826', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 14:59:54', '2016-03-07', '14:59:54');
INSERT INTO `personallog` VALUES ('31827', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 17:17:38', '2016-03-07', '17:17:38');
INSERT INTO `personallog` VALUES ('31828', '2268922110030', '51', '0', '2016-06-17 01:50:09', 'Alfari', 'Online', '2016-03-07 17:36:06', '2016-03-07', '17:36:06');
INSERT INTO `personallog` VALUES ('31829', '2268922110030', '52', '0', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-03-07 09:36:20', '2016-03-07', '09:36:20');
INSERT INTO `personallog` VALUES ('31830', '2268922110030', '52', '0', '2016-06-17 01:50:09', 'Tano Ria Saragih', 'Online', '2016-03-07 13:17:35', '2016-03-07', '13:17:35');
INSERT INTO `personallog` VALUES ('31831', '2268922110030', '63', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:57:49', '2016-03-07', '13:57:49');
INSERT INTO `personallog` VALUES ('31832', '2268922110030', '63', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:15:50', '2016-03-07', '22:15:50');
INSERT INTO `personallog` VALUES ('31833', '2268922110030', '65', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 16:04:34', '2016-03-07', '16:04:34');
INSERT INTO `personallog` VALUES ('31834', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:27:41', '2016-03-07', '08:27:41');
INSERT INTO `personallog` VALUES ('31835', '2268922110030', '66', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:27:44', '2016-03-07', '08:27:44');
INSERT INTO `personallog` VALUES ('31836', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 17:11:51', '2016-03-07', '17:11:51');
INSERT INTO `personallog` VALUES ('31837', '2268922110030', '66', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 17:11:53', '2016-03-07', '17:11:53');
INSERT INTO `personallog` VALUES ('31838', '2268922110030', '67', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:00:40', '2016-03-07', '08:00:40');
INSERT INTO `personallog` VALUES ('31839', '2268922110030', '67', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 16:04:12', '2016-03-07', '16:04:12');
INSERT INTO `personallog` VALUES ('31840', '2268922110030', '68', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:53:53', '2016-03-07', '08:53:53');
INSERT INTO `personallog` VALUES ('31841', '2268922110030', '68', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 17:39:19', '2016-03-07', '17:39:19');
INSERT INTO `personallog` VALUES ('31842', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:59:57', '2016-03-07', '08:59:57');
INSERT INTO `personallog` VALUES ('31843', '2268922110030', '69', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:59:59', '2016-03-07', '08:59:59');
INSERT INTO `personallog` VALUES ('31844', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 17:08:47', '2016-03-07', '17:08:47');
INSERT INTO `personallog` VALUES ('31845', '2268922110030', '69', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 17:08:49', '2016-03-07', '17:08:49');
INSERT INTO `personallog` VALUES ('31846', '2268922110030', '70', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:52:52', '2016-03-07', '13:52:52');
INSERT INTO `personallog` VALUES ('31847', '2268922110030', '70', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:16:16', '2016-03-07', '22:16:16');
INSERT INTO `personallog` VALUES ('31848', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 09:05:47', '2016-03-07', '09:05:47');
INSERT INTO `personallog` VALUES ('31849', '2268922110030', '71', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 09:05:49', '2016-03-07', '09:05:49');
INSERT INTO `personallog` VALUES ('31850', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:04:23', '2016-03-07', '22:04:23');
INSERT INTO `personallog` VALUES ('31851', '2268922110030', '71', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:04:25', '2016-03-07', '22:04:25');
INSERT INTO `personallog` VALUES ('31852', '2268922110030', '72', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 18:41:50', '2016-03-07', '18:41:50');
INSERT INTO `personallog` VALUES ('31853', '2268922110030', '73', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:21:26', '2016-03-07', '13:21:26');
INSERT INTO `personallog` VALUES ('31854', '2268922110030', '73', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:01:53', '2016-03-07', '22:01:53');
INSERT INTO `personallog` VALUES ('31855', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:49:17', '2016-03-07', '13:49:17');
INSERT INTO `personallog` VALUES ('31856', '2268922110030', '74', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:49:21', '2016-03-07', '13:49:21');
INSERT INTO `personallog` VALUES ('31857', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:00:37', '2016-03-07', '22:00:37');
INSERT INTO `personallog` VALUES ('31858', '2268922110030', '74', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:00:40', '2016-03-07', '22:00:40');
INSERT INTO `personallog` VALUES ('31859', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:57:39', '2016-03-07', '13:57:39');
INSERT INTO `personallog` VALUES ('31860', '2268922110030', '75', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:57:41', '2016-03-07', '13:57:41');
INSERT INTO `personallog` VALUES ('31861', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:04:16', '2016-03-07', '22:04:16');
INSERT INTO `personallog` VALUES ('31862', '2268922110030', '75', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:04:18', '2016-03-07', '22:04:18');
INSERT INTO `personallog` VALUES ('31863', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:44:48', '2016-03-07', '13:44:48');
INSERT INTO `personallog` VALUES ('31864', '2268922110030', '77', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:47:42', '2016-03-07', '13:47:42');
INSERT INTO `personallog` VALUES ('31865', '2268922110030', '77', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:02:01', '2016-03-07', '22:02:01');
INSERT INTO `personallog` VALUES ('31866', '2268922110030', '78', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:41:15', '2016-03-07', '13:41:15');
INSERT INTO `personallog` VALUES ('31867', '2268922110030', '78', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:04:10', '2016-03-07', '22:04:10');
INSERT INTO `personallog` VALUES ('31868', '2268922110030', '81', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 07:56:56', '2016-03-07', '07:56:56');
INSERT INTO `personallog` VALUES ('31869', '2268922110030', '81', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 20:05:07', '2016-03-07', '20:05:07');
INSERT INTO `personallog` VALUES ('31870', '2268922110030', '83', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 13:17:02', '2016-03-07', '13:17:02');
INSERT INTO `personallog` VALUES ('31871', '2268922110030', '83', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:05:12', '2016-03-07', '22:05:12');
INSERT INTO `personallog` VALUES ('31872', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 19:46:24', '2016-03-07', '19:46:24');
INSERT INTO `personallog` VALUES ('31873', '2268922110030', '84', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 19:46:25', '2016-03-07', '19:46:25');
INSERT INTO `personallog` VALUES ('31874', '2268922110030', '85', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 07:48:34', '2016-03-07', '07:48:34');
INSERT INTO `personallog` VALUES ('31875', '2268922110030', '85', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 16:07:39', '2016-03-07', '16:07:39');
INSERT INTO `personallog` VALUES ('31876', '2268922110030', '86', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 14:07:35', '2016-03-07', '14:07:35');
INSERT INTO `personallog` VALUES ('31877', '2268922110030', '86', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 14:07:38', '2016-03-07', '14:07:38');
INSERT INTO `personallog` VALUES ('31878', '2268922110030', '86', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 22:13:34', '2016-03-07', '22:13:34');
INSERT INTO `personallog` VALUES ('31879', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 19:23:03', '2016-03-07', '19:23:03');
INSERT INTO `personallog` VALUES ('31880', '2268922110030', '89', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 19:23:05', '2016-03-07', '19:23:05');
INSERT INTO `personallog` VALUES ('31881', '2268922110030', '90', '0', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 08:07:13', '2016-03-07', '08:07:13');
INSERT INTO `personallog` VALUES ('31882', '2268922110030', '90', '1', '2016-06-17 01:50:09', ' ', 'Online', '2016-03-07 18:12:41', '2016-03-07', '18:12:41');

-- ----------------------------
-- Table structure for `personallog_inout`
-- ----------------------------
DROP TABLE IF EXISTS `personallog_inout`;
CREATE TABLE `personallog_inout` (
  `idno` bigint(20) NOT NULL AUTO_INCREMENT,
  `TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  `UserID` varchar(50) DEFAULT NULL,
  `FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  `Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  `UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  `FlagAbsence` varchar(100) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=3132 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';

-- ----------------------------
-- Records of personallog_inout
-- ----------------------------
INSERT INTO `personallog_inout` VALUES ('2048', '2268922110030', '28', '5', '2016-06-17 01:48:14', 'Piter', 'Online', null, null, null);
INSERT INTO `personallog_inout` VALUES ('2049', '2268922110030', '28', '5', '2016-06-17 01:48:14', 'Piter', 'Online', null, null, null);
INSERT INTO `personallog_inout` VALUES ('2568', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-23 08:33:41', '2016-02-23', '08:33:41');
INSERT INTO `personallog_inout` VALUES ('2569', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-23 18:03:54', '2016-02-23', '18:03:54');
INSERT INTO `personallog_inout` VALUES ('2570', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-24 08:32:00', '2016-02-24', '08:32:00');
INSERT INTO `personallog_inout` VALUES ('2571', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-24 17:49:08', '2016-02-24', '17:49:08');
INSERT INTO `personallog_inout` VALUES ('2572', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-25 08:31:45', '2016-02-25', '08:31:45');
INSERT INTO `personallog_inout` VALUES ('2573', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-25 17:56:42', '2016-02-25', '17:56:42');
INSERT INTO `personallog_inout` VALUES ('2574', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-26 08:46:12', '2016-02-26', '08:46:12');
INSERT INTO `personallog_inout` VALUES ('2575', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-26 17:32:00', '2016-02-26', '17:32:00');
INSERT INTO `personallog_inout` VALUES ('2576', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-02-29 08:19:19', '2016-02-29', '08:19:19');
INSERT INTO `personallog_inout` VALUES ('2577', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-01 08:38:30', '2016-03-01', '08:38:30');
INSERT INTO `personallog_inout` VALUES ('2578', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-01 17:42:56', '2016-03-01', '17:42:56');
INSERT INTO `personallog_inout` VALUES ('2579', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-02 08:45:19', '2016-03-02', '08:45:19');
INSERT INTO `personallog_inout` VALUES ('2580', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-02 17:58:53', '2016-03-02', '17:58:53');
INSERT INTO `personallog_inout` VALUES ('2587', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-23 08:13:03', '2016-02-23', '08:13:03');
INSERT INTO `personallog_inout` VALUES ('2588', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-23 17:33:30', '2016-02-23', '17:33:30');
INSERT INTO `personallog_inout` VALUES ('2589', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-24 07:43:32', '2016-02-24', '07:43:32');
INSERT INTO `personallog_inout` VALUES ('2590', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-24 17:50:38', '2016-02-24', '17:50:38');
INSERT INTO `personallog_inout` VALUES ('2591', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-25 07:50:54', '2016-02-25', '07:50:54');
INSERT INTO `personallog_inout` VALUES ('2592', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-25 17:38:37', '2016-02-25', '17:38:37');
INSERT INTO `personallog_inout` VALUES ('2593', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-26 07:51:35', '2016-02-26', '07:51:35');
INSERT INTO `personallog_inout` VALUES ('2594', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-02-29 07:40:39', '2016-02-29', '07:40:39');
INSERT INTO `personallog_inout` VALUES ('2595', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-01 07:50:44', '2016-03-01', '07:50:44');
INSERT INTO `personallog_inout` VALUES ('2596', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-01 19:51:44', '2016-03-01', '19:51:44');
INSERT INTO `personallog_inout` VALUES ('2597', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-02 08:02:38', '2016-03-02', '08:02:38');
INSERT INTO `personallog_inout` VALUES ('2598', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-02 18:22:59', '2016-03-02', '18:22:59');
INSERT INTO `personallog_inout` VALUES ('2605', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-23 08:20:25', '2016-02-23', '08:20:25');
INSERT INTO `personallog_inout` VALUES ('2606', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-23 17:33:48', '2016-02-23', '17:33:48');
INSERT INTO `personallog_inout` VALUES ('2607', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-24 08:29:57', '2016-02-24', '08:29:57');
INSERT INTO `personallog_inout` VALUES ('2608', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-24 17:52:07', '2016-02-24', '17:52:07');
INSERT INTO `personallog_inout` VALUES ('2609', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-25 08:22:04', '2016-02-25', '08:22:04');
INSERT INTO `personallog_inout` VALUES ('2610', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-26 18:27:28', '2016-02-26', '18:27:28');
INSERT INTO `personallog_inout` VALUES ('2611', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-29 08:26:27', '2016-02-29', '08:26:27');
INSERT INTO `personallog_inout` VALUES ('2612', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-02-29 17:57:39', '2016-02-29', '17:57:39');
INSERT INTO `personallog_inout` VALUES ('2613', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-01 08:29:48', '2016-03-01', '08:29:48');
INSERT INTO `personallog_inout` VALUES ('2614', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-01 17:52:35', '2016-03-01', '17:52:35');
INSERT INTO `personallog_inout` VALUES ('2615', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-02 08:15:09', '2016-03-02', '08:15:09');
INSERT INTO `personallog_inout` VALUES ('2616', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-02 17:38:49', '2016-03-02', '17:38:49');
INSERT INTO `personallog_inout` VALUES ('2622', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-23 19:09:49', '2016-02-23', '19:09:49');
INSERT INTO `personallog_inout` VALUES ('2623', '2268922110030', '28', '1', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-23 19:16:54', '2016-02-23', '19:16:54');
INSERT INTO `personallog_inout` VALUES ('2624', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-24 08:39:09', '2016-02-24', '08:39:09');
INSERT INTO `personallog_inout` VALUES ('2625', '2268922110030', '28', '1', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-24 20:11:30', '2016-02-24', '20:11:30');
INSERT INTO `personallog_inout` VALUES ('2626', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-25 08:36:17', '2016-02-25', '08:36:17');
INSERT INTO `personallog_inout` VALUES ('2627', '2268922110030', '28', '1', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-02-29 18:23:12', '2016-02-29', '18:23:12');
INSERT INTO `personallog_inout` VALUES ('2628', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-03-02 08:42:28', '2016-03-02', '08:42:28');
INSERT INTO `personallog_inout` VALUES ('2629', '2268922110030', '28', '1', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-03-02 23:51:45', '2016-03-02', '23:51:45');
INSERT INTO `personallog_inout` VALUES ('2634', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-23 08:02:59', '2016-02-23', '08:02:59');
INSERT INTO `personallog_inout` VALUES ('2635', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-23 17:37:35', '2016-02-23', '17:37:35');
INSERT INTO `personallog_inout` VALUES ('2636', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-24 08:02:23', '2016-02-24', '08:02:23');
INSERT INTO `personallog_inout` VALUES ('2637', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-24 17:37:54', '2016-02-24', '17:37:54');
INSERT INTO `personallog_inout` VALUES ('2638', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-25 08:01:36', '2016-02-25', '08:01:36');
INSERT INTO `personallog_inout` VALUES ('2639', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-25 17:38:32', '2016-02-25', '17:38:32');
INSERT INTO `personallog_inout` VALUES ('2640', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-26 08:13:28', '2016-02-26', '08:13:28');
INSERT INTO `personallog_inout` VALUES ('2641', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-26 17:38:15', '2016-02-26', '17:38:15');
INSERT INTO `personallog_inout` VALUES ('2642', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-29 07:55:42', '2016-02-29', '07:55:42');
INSERT INTO `personallog_inout` VALUES ('2643', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-02-29 17:40:33', '2016-02-29', '17:40:33');
INSERT INTO `personallog_inout` VALUES ('2644', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-01 07:44:53', '2016-03-01', '07:44:53');
INSERT INTO `personallog_inout` VALUES ('2645', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-01 17:45:31', '2016-03-01', '17:45:31');
INSERT INTO `personallog_inout` VALUES ('2646', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-02 07:59:33', '2016-03-02', '07:59:33');
INSERT INTO `personallog_inout` VALUES ('2647', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-02 17:43:44', '2016-03-02', '17:43:44');
INSERT INTO `personallog_inout` VALUES ('2652', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-23 08:12:33', '2016-02-23', '08:12:33');
INSERT INTO `personallog_inout` VALUES ('2653', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-23 17:31:42', '2016-02-23', '17:31:42');
INSERT INTO `personallog_inout` VALUES ('2654', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-24 08:15:33', '2016-02-24', '08:15:33');
INSERT INTO `personallog_inout` VALUES ('2655', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-24 17:52:11', '2016-02-24', '17:52:11');
INSERT INTO `personallog_inout` VALUES ('2656', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-25 07:50:11', '2016-02-25', '07:50:11');
INSERT INTO `personallog_inout` VALUES ('2657', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-25 17:38:27', '2016-02-25', '17:38:27');
INSERT INTO `personallog_inout` VALUES ('2658', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-26 08:21:22', '2016-02-26', '08:21:22');
INSERT INTO `personallog_inout` VALUES ('2659', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-26 19:10:57', '2016-02-26', '19:10:57');
INSERT INTO `personallog_inout` VALUES ('2660', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-28 15:20:18', '2016-02-28', '15:20:18');
INSERT INTO `personallog_inout` VALUES ('2661', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-29 08:03:19', '2016-02-29', '08:03:19');
INSERT INTO `personallog_inout` VALUES ('2662', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-02-29 17:40:17', '2016-02-29', '17:40:17');
INSERT INTO `personallog_inout` VALUES ('2663', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-01 08:36:13', '2016-03-01', '08:36:13');
INSERT INTO `personallog_inout` VALUES ('2664', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-01 19:48:22', '2016-03-01', '19:48:22');
INSERT INTO `personallog_inout` VALUES ('2665', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-02 08:31:06', '2016-03-02', '08:31:06');
INSERT INTO `personallog_inout` VALUES ('2666', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-02 18:24:31', '2016-03-02', '18:24:31');
INSERT INTO `personallog_inout` VALUES ('2671', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-23 06:55:01', '2016-02-23', '06:55:01');
INSERT INTO `personallog_inout` VALUES ('2672', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-23 17:30:50', '2016-02-23', '17:30:50');
INSERT INTO `personallog_inout` VALUES ('2673', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-24 07:40:25', '2016-02-24', '07:40:25');
INSERT INTO `personallog_inout` VALUES ('2674', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-24 17:35:35', '2016-02-24', '17:35:35');
INSERT INTO `personallog_inout` VALUES ('2675', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-25 07:11:37', '2016-02-25', '07:11:37');
INSERT INTO `personallog_inout` VALUES ('2676', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-25 17:31:37', '2016-02-25', '17:31:37');
INSERT INTO `personallog_inout` VALUES ('2677', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-29 07:01:19', '2016-02-29', '07:01:19');
INSERT INTO `personallog_inout` VALUES ('2678', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-02-29 17:31:01', '2016-02-29', '17:31:01');
INSERT INTO `personallog_inout` VALUES ('2679', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-01 07:45:07', '2016-03-01', '07:45:07');
INSERT INTO `personallog_inout` VALUES ('2680', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-01 17:31:34', '2016-03-01', '17:31:34');
INSERT INTO `personallog_inout` VALUES ('2681', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-02 07:59:28', '2016-03-02', '07:59:28');
INSERT INTO `personallog_inout` VALUES ('2682', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-02 17:31:08', '2016-03-02', '17:31:08');
INSERT INTO `personallog_inout` VALUES ('2688', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-23 08:20:05', '2016-02-23', '08:20:05');
INSERT INTO `personallog_inout` VALUES ('2689', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-23 17:37:52', '2016-02-23', '17:37:52');
INSERT INTO `personallog_inout` VALUES ('2690', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-24 08:22:43', '2016-02-24', '08:22:43');
INSERT INTO `personallog_inout` VALUES ('2691', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-24 17:48:59', '2016-02-24', '17:48:59');
INSERT INTO `personallog_inout` VALUES ('2692', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-25 08:21:43', '2016-02-25', '08:21:43');
INSERT INTO `personallog_inout` VALUES ('2693', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-26 08:18:41', '2016-02-26', '08:18:41');
INSERT INTO `personallog_inout` VALUES ('2694', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-26 17:31:31', '2016-02-26', '17:31:31');
INSERT INTO `personallog_inout` VALUES ('2695', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-29 08:04:28', '2016-02-29', '08:04:28');
INSERT INTO `personallog_inout` VALUES ('2696', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-02-29 17:36:23', '2016-02-29', '17:36:23');
INSERT INTO `personallog_inout` VALUES ('2697', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-01 08:19:51', '2016-03-01', '08:19:51');
INSERT INTO `personallog_inout` VALUES ('2698', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-01 17:34:50', '2016-03-01', '17:34:50');
INSERT INTO `personallog_inout` VALUES ('2699', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-02 08:28:32', '2016-03-02', '08:28:32');
INSERT INTO `personallog_inout` VALUES ('2700', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-02 17:33:56', '2016-03-02', '17:33:56');
INSERT INTO `personallog_inout` VALUES ('2706', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-23 08:22:35', '2016-02-23', '08:22:35');
INSERT INTO `personallog_inout` VALUES ('2707', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-23 17:33:55', '2016-02-23', '17:33:55');
INSERT INTO `personallog_inout` VALUES ('2708', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-24 08:26:14', '2016-02-24', '08:26:14');
INSERT INTO `personallog_inout` VALUES ('2709', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-24 17:40:21', '2016-02-24', '17:40:21');
INSERT INTO `personallog_inout` VALUES ('2710', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-25 08:30:45', '2016-02-25', '08:30:45');
INSERT INTO `personallog_inout` VALUES ('2711', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-25 17:38:04', '2016-02-25', '17:38:04');
INSERT INTO `personallog_inout` VALUES ('2712', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-26 08:24:55', '2016-02-26', '08:24:55');
INSERT INTO `personallog_inout` VALUES ('2713', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-26 17:47:54', '2016-02-26', '17:47:54');
INSERT INTO `personallog_inout` VALUES ('2714', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-29 08:38:55', '2016-02-29', '08:38:55');
INSERT INTO `personallog_inout` VALUES ('2715', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-02-29 17:40:08', '2016-02-29', '17:40:08');
INSERT INTO `personallog_inout` VALUES ('2716', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-01 08:40:27', '2016-03-01', '08:40:27');
INSERT INTO `personallog_inout` VALUES ('2717', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-01 17:45:41', '2016-03-01', '17:45:41');
INSERT INTO `personallog_inout` VALUES ('2718', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-02 08:34:48', '2016-03-02', '08:34:48');
INSERT INTO `personallog_inout` VALUES ('2719', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-02 17:43:48', '2016-03-02', '17:43:48');
INSERT INTO `personallog_inout` VALUES ('2726', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-23 08:05:48', '2016-02-23', '08:05:48');
INSERT INTO `personallog_inout` VALUES ('2727', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-23 17:43:35', '2016-02-23', '17:43:35');
INSERT INTO `personallog_inout` VALUES ('2728', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-24 08:19:07', '2016-02-24', '08:19:07');
INSERT INTO `personallog_inout` VALUES ('2729', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-24 17:42:21', '2016-02-24', '17:42:21');
INSERT INTO `personallog_inout` VALUES ('2730', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-25 08:07:18', '2016-02-25', '08:07:18');
INSERT INTO `personallog_inout` VALUES ('2731', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-25 17:52:02', '2016-02-25', '17:52:02');
INSERT INTO `personallog_inout` VALUES ('2732', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-26 08:17:19', '2016-02-26', '08:17:19');
INSERT INTO `personallog_inout` VALUES ('2733', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-26 17:35:14', '2016-02-26', '17:35:14');
INSERT INTO `personallog_inout` VALUES ('2734', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-29 08:24:26', '2016-02-29', '08:24:26');
INSERT INTO `personallog_inout` VALUES ('2735', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-02-29 17:43:26', '2016-02-29', '17:43:26');
INSERT INTO `personallog_inout` VALUES ('2736', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-01 08:18:19', '2016-03-01', '08:18:19');
INSERT INTO `personallog_inout` VALUES ('2737', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-01 17:36:51', '2016-03-01', '17:36:51');
INSERT INTO `personallog_inout` VALUES ('2738', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-02 08:17:52', '2016-03-02', '08:17:52');
INSERT INTO `personallog_inout` VALUES ('2739', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-02 17:43:26', '2016-03-02', '17:43:26');
INSERT INTO `personallog_inout` VALUES ('2744', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-23 18:04:55', '2016-02-23', '18:04:55');
INSERT INTO `personallog_inout` VALUES ('2745', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-24 08:24:58', '2016-02-24', '08:24:58');
INSERT INTO `personallog_inout` VALUES ('2746', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-24 20:11:40', '2016-02-24', '20:11:40');
INSERT INTO `personallog_inout` VALUES ('2747', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-25 08:39:06', '2016-02-25', '08:39:06');
INSERT INTO `personallog_inout` VALUES ('2748', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-26 08:47:38', '2016-02-26', '08:47:38');
INSERT INTO `personallog_inout` VALUES ('2749', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-26 19:10:37', '2016-02-26', '19:10:37');
INSERT INTO `personallog_inout` VALUES ('2750', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-29 08:47:29', '2016-02-29', '08:47:29');
INSERT INTO `personallog_inout` VALUES ('2751', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-02-29 18:23:04', '2016-02-29', '18:23:04');
INSERT INTO `personallog_inout` VALUES ('2752', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-01 17:44:47', '2016-03-01', '17:44:47');
INSERT INTO `personallog_inout` VALUES ('2753', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-02 17:58:59', '2016-03-02', '17:58:59');
INSERT INTO `personallog_inout` VALUES ('2760', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-23 08:42:44', '2016-02-23', '08:42:44');
INSERT INTO `personallog_inout` VALUES ('2761', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-23 17:43:39', '2016-02-23', '17:43:39');
INSERT INTO `personallog_inout` VALUES ('2762', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-24 08:46:43', '2016-02-24', '08:46:43');
INSERT INTO `personallog_inout` VALUES ('2763', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-24 17:41:37', '2016-02-24', '17:41:37');
INSERT INTO `personallog_inout` VALUES ('2764', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-25 08:54:31', '2016-02-25', '08:54:31');
INSERT INTO `personallog_inout` VALUES ('2765', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-25 17:38:10', '2016-02-25', '17:38:10');
INSERT INTO `personallog_inout` VALUES ('2766', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-26 17:35:05', '2016-02-26', '17:35:05');
INSERT INTO `personallog_inout` VALUES ('2767', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-29 08:36:52', '2016-02-29', '08:36:52');
INSERT INTO `personallog_inout` VALUES ('2768', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-02-29 17:43:21', '2016-02-29', '17:43:21');
INSERT INTO `personallog_inout` VALUES ('2769', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-01 17:42:24', '2016-03-01', '17:42:24');
INSERT INTO `personallog_inout` VALUES ('2770', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-02 08:46:30', '2016-03-02', '08:46:30');
INSERT INTO `personallog_inout` VALUES ('2771', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-02 17:43:33', '2016-03-02', '17:43:33');
INSERT INTO `personallog_inout` VALUES ('2777', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-23 08:07:55', '2016-02-23', '08:07:55');
INSERT INTO `personallog_inout` VALUES ('2778', '2268922110030', '37', '1', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-24 17:34:48', '2016-02-24', '17:34:48');
INSERT INTO `personallog_inout` VALUES ('2779', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-25 08:10:39', '2016-02-25', '08:10:39');
INSERT INTO `personallog_inout` VALUES ('2780', '2268922110030', '37', '1', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-25 17:45:47', '2016-02-25', '17:45:47');
INSERT INTO `personallog_inout` VALUES ('2781', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-26 08:20:11', '2016-02-26', '08:20:11');
INSERT INTO `personallog_inout` VALUES ('2782', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-02-29 07:28:15', '2016-02-29', '07:28:15');
INSERT INTO `personallog_inout` VALUES ('2783', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-01 08:14:13', '2016-03-01', '08:14:13');
INSERT INTO `personallog_inout` VALUES ('2784', '2268922110030', '37', '1', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-01 18:20:30', '2016-03-01', '18:20:30');
INSERT INTO `personallog_inout` VALUES ('2785', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-02 08:03:22', '2016-03-02', '08:03:22');
INSERT INTO `personallog_inout` VALUES ('2786', '2268922110030', '37', '1', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-02 17:40:11', '2016-03-02', '17:40:11');
INSERT INTO `personallog_inout` VALUES ('2792', '2268922110030', '40', '0', '2016-06-17 01:48:14', 'Yudhistira Tjahjadi', 'Online', '2016-02-23 10:39:59', '2016-02-23', '10:39:59');
INSERT INTO `personallog_inout` VALUES ('2794', '2268922110030', '42', '0', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-02-23 08:56:07', '2016-02-23', '08:56:07');
INSERT INTO `personallog_inout` VALUES ('2795', '2268922110030', '42', '0', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-02-25 08:52:23', '2016-02-25', '08:52:23');
INSERT INTO `personallog_inout` VALUES ('2796', '2268922110030', '42', '0', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-02-26 08:51:54', '2016-02-26', '08:51:54');
INSERT INTO `personallog_inout` VALUES ('2797', '2268922110030', '42', '1', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-02-29 17:57:42', '2016-02-29', '17:57:42');
INSERT INTO `personallog_inout` VALUES ('2798', '2268922110030', '42', '1', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-03-02 18:01:49', '2016-03-02', '18:01:49');
INSERT INTO `personallog_inout` VALUES ('2802', '2268922110030', '43', '0', '2016-06-17 01:48:14', 'Julius Setiono', 'Online', '2016-02-23 08:49:28', '2016-02-23', '08:49:28');
INSERT INTO `personallog_inout` VALUES ('2803', '2268922110030', '43', '0', '2016-06-17 01:48:14', 'Julius Setiono', 'Online', '2016-02-24 08:24:22', '2016-02-24', '08:24:22');
INSERT INTO `personallog_inout` VALUES ('2804', '2268922110030', '43', '0', '2016-06-17 01:48:14', 'Julius Setiono', 'Online', '2016-02-25 08:17:38', '2016-02-25', '08:17:38');
INSERT INTO `personallog_inout` VALUES ('2807', '2268922110030', '44', '0', '2016-06-17 01:48:14', 'Card.Bayu', 'Online', '2016-02-23 09:16:15', '2016-02-23', '09:16:15');
INSERT INTO `personallog_inout` VALUES ('2808', '2268922110030', '44', '0', '2016-06-17 01:48:14', 'Card.Bayu', 'Online', '2016-02-26 09:35:07', '2016-02-26', '09:35:07');
INSERT INTO `personallog_inout` VALUES ('2810', '2268922110030', '45', '0', '2016-06-17 01:48:14', 'Gilbert Tony G', 'Online', '2016-02-23 11:23:33', '2016-02-23', '11:23:33');
INSERT INTO `personallog_inout` VALUES ('2811', '2268922110030', '45', '0', '2016-06-17 01:48:14', 'Gilbert Tony G', 'Online', '2016-02-24 08:32:47', '2016-02-24', '08:32:47');
INSERT INTO `personallog_inout` VALUES ('2812', '2268922110030', '45', '0', '2016-06-17 01:48:14', 'Gilbert Tony G', 'Online', '2016-02-26 08:49:49', '2016-02-26', '08:49:49');
INSERT INTO `personallog_inout` VALUES ('2813', '2268922110030', '45', '0', '2016-06-17 01:48:14', 'Gilbert Tony G', 'Online', '2016-02-29 08:17:46', '2016-02-29', '08:17:46');
INSERT INTO `personallog_inout` VALUES ('2815', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-23 08:12:57', '2016-02-23', '08:12:57');
INSERT INTO `personallog_inout` VALUES ('2816', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-24 08:07:43', '2016-02-24', '08:07:43');
INSERT INTO `personallog_inout` VALUES ('2817', '2268922110030', '47', '1', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-24 18:56:55', '2016-02-24', '18:56:55');
INSERT INTO `personallog_inout` VALUES ('2818', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-25 07:42:04', '2016-02-25', '07:42:04');
INSERT INTO `personallog_inout` VALUES ('2819', '2268922110030', '47', '1', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-25 20:49:41', '2016-02-25', '20:49:41');
INSERT INTO `personallog_inout` VALUES ('2820', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-26 08:17:51', '2016-02-26', '08:17:51');
INSERT INTO `personallog_inout` VALUES ('2821', '2268922110030', '47', '1', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-26 18:27:40', '2016-02-26', '18:27:40');
INSERT INTO `personallog_inout` VALUES ('2822', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-29 08:21:42', '2016-02-29', '08:21:42');
INSERT INTO `personallog_inout` VALUES ('2823', '2268922110030', '47', '1', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-02-29 17:45:29', '2016-02-29', '17:45:29');
INSERT INTO `personallog_inout` VALUES ('2824', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-03-01 08:08:11', '2016-03-01', '08:08:11');
INSERT INTO `personallog_inout` VALUES ('2825', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-03-02 08:05:48', '2016-03-02', '08:05:48');
INSERT INTO `personallog_inout` VALUES ('2831', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-02-23 06:55:06', '2016-02-23', '06:55:06');
INSERT INTO `personallog_inout` VALUES ('2832', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-02-25 07:11:32', '2016-02-25', '07:11:32');
INSERT INTO `personallog_inout` VALUES ('2833', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-02-26 08:02:41', '2016-02-26', '08:02:41');
INSERT INTO `personallog_inout` VALUES ('2834', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-02-29 07:20:52', '2016-02-29', '07:20:52');
INSERT INTO `personallog_inout` VALUES ('2835', '2268922110030', '51', '1', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-03-01 17:52:40', '2016-03-01', '17:52:40');
INSERT INTO `personallog_inout` VALUES ('2836', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-03-02 08:42:53', '2016-03-02', '08:42:53');
INSERT INTO `personallog_inout` VALUES ('2839', '2268922110030', '52', '0', '2016-06-17 01:48:14', 'Tano Ria Saragih', 'Online', '2016-02-23 09:02:40', '2016-02-23', '09:02:40');
INSERT INTO `personallog_inout` VALUES ('2840', '2268922110030', '52', '0', '2016-06-17 01:48:14', 'Tano Ria Saragih', 'Online', '2016-02-29 09:02:33', '2016-02-29', '09:02:33');
INSERT INTO `personallog_inout` VALUES ('3079', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-03 08:23:44', '2016-03-03', '08:23:44');
INSERT INTO `personallog_inout` VALUES ('3080', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-03 17:44:50', '2016-03-03', '17:44:50');
INSERT INTO `personallog_inout` VALUES ('3081', '2268922110030', '24', '0', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-04 08:48:08', '2016-03-04', '08:48:08');
INSERT INTO `personallog_inout` VALUES ('3082', '2268922110030', '24', '1', '2016-06-17 01:48:14', 'Akhmad Ridwan', 'Online', '2016-03-04 17:40:23', '2016-03-04', '17:40:23');
INSERT INTO `personallog_inout` VALUES ('3083', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-03 07:48:09', '2016-03-03', '07:48:09');
INSERT INTO `personallog_inout` VALUES ('3084', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-03 18:38:39', '2016-03-03', '18:38:39');
INSERT INTO `personallog_inout` VALUES ('3085', '2268922110030', '25', '0', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-04 07:41:08', '2016-03-04', '07:41:08');
INSERT INTO `personallog_inout` VALUES ('3086', '2268922110030', '25', '1', '2016-06-17 01:48:14', 'Steve lieqy', 'Online', '2016-03-04 18:16:58', '2016-03-04', '18:16:58');
INSERT INTO `personallog_inout` VALUES ('3087', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-03 08:23:16', '2016-03-03', '08:23:16');
INSERT INTO `personallog_inout` VALUES ('3088', '2268922110030', '26', '0', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-04 08:02:54', '2016-03-04', '08:02:54');
INSERT INTO `personallog_inout` VALUES ('3089', '2268922110030', '26', '1', '2016-06-17 01:48:14', 'Indri Lestari', 'Online', '2016-03-04 17:39:36', '2016-03-04', '17:39:36');
INSERT INTO `personallog_inout` VALUES ('3090', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-03-03 08:48:35', '2016-03-03', '08:48:35');
INSERT INTO `personallog_inout` VALUES ('3091', '2268922110030', '28', '0', '2016-06-17 01:48:14', 'Piter', 'Online', '2016-03-04 08:30:26', '2016-03-04', '08:30:26');
INSERT INTO `personallog_inout` VALUES ('3092', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-03 07:42:06', '2016-03-03', '07:42:06');
INSERT INTO `personallog_inout` VALUES ('3093', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-03 17:51:54', '2016-03-03', '17:51:54');
INSERT INTO `personallog_inout` VALUES ('3094', '2268922110030', '29', '0', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-04 08:00:37', '2016-03-04', '08:00:37');
INSERT INTO `personallog_inout` VALUES ('3095', '2268922110030', '29', '1', '2016-06-17 01:48:14', 'renita Pratiwi', 'Online', '2016-03-04 17:39:42', '2016-03-04', '17:39:42');
INSERT INTO `personallog_inout` VALUES ('3096', '2268922110030', '30', '0', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-03 08:22:03', '2016-03-03', '08:22:03');
INSERT INTO `personallog_inout` VALUES ('3097', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-03 18:38:41', '2016-03-03', '18:38:41');
INSERT INTO `personallog_inout` VALUES ('3098', '2268922110030', '30', '1', '2016-06-17 01:48:14', 'Alam Mafian', 'Online', '2016-03-04 18:38:38', '2016-03-04', '18:38:38');
INSERT INTO `personallog_inout` VALUES ('3099', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-03 07:41:27', '2016-03-03', '07:41:27');
INSERT INTO `personallog_inout` VALUES ('3100', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-03 17:30:34', '2016-03-03', '17:30:34');
INSERT INTO `personallog_inout` VALUES ('3101', '2268922110030', '31', '0', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-04 07:10:49', '2016-03-04', '07:10:49');
INSERT INTO `personallog_inout` VALUES ('3102', '2268922110030', '31', '1', '2016-06-17 01:48:14', 'Bambang Setyadi', 'Online', '2016-03-04 17:31:10', '2016-03-04', '17:31:10');
INSERT INTO `personallog_inout` VALUES ('3103', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-03 08:06:39', '2016-03-03', '08:06:39');
INSERT INTO `personallog_inout` VALUES ('3104', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-03 17:32:47', '2016-03-03', '17:32:47');
INSERT INTO `personallog_inout` VALUES ('3105', '2268922110030', '32', '0', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-04 08:20:29', '2016-03-04', '08:20:29');
INSERT INTO `personallog_inout` VALUES ('3106', '2268922110030', '32', '1', '2016-06-17 01:48:14', 'Radumta Sitepu', 'Online', '2016-03-04 17:32:53', '2016-03-04', '17:32:53');
INSERT INTO `personallog_inout` VALUES ('3107', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-03 08:32:19', '2016-03-03', '08:32:19');
INSERT INTO `personallog_inout` VALUES ('3108', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-03 17:51:57', '2016-03-03', '17:51:57');
INSERT INTO `personallog_inout` VALUES ('3109', '2268922110030', '33', '0', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-04 08:20:10', '2016-03-04', '08:20:10');
INSERT INTO `personallog_inout` VALUES ('3110', '2268922110030', '33', '1', '2016-06-17 01:48:14', 'Yosika', 'Online', '2016-03-04 17:38:58', '2016-03-04', '17:38:58');
INSERT INTO `personallog_inout` VALUES ('3111', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-03 08:17:30', '2016-03-03', '08:17:30');
INSERT INTO `personallog_inout` VALUES ('3112', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-03 17:47:08', '2016-03-03', '17:47:08');
INSERT INTO `personallog_inout` VALUES ('3113', '2268922110030', '34', '0', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-04 08:14:04', '2016-03-04', '08:14:04');
INSERT INTO `personallog_inout` VALUES ('3114', '2268922110030', '34', '1', '2016-06-17 01:48:14', 'Sisca Sopiani', 'Online', '2016-03-04 17:39:05', '2016-03-04', '17:39:05');
INSERT INTO `personallog_inout` VALUES ('3115', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-03 08:28:29', '2016-03-03', '08:28:29');
INSERT INTO `personallog_inout` VALUES ('3116', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-03 17:43:54', '2016-03-03', '17:43:54');
INSERT INTO `personallog_inout` VALUES ('3117', '2268922110030', '35', '0', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-04 08:38:00', '2016-03-04', '08:38:00');
INSERT INTO `personallog_inout` VALUES ('3118', '2268922110030', '35', '1', '2016-06-17 01:48:14', 'Adetya Kurniawan', 'Online', '2016-03-04 17:40:30', '2016-03-04', '17:40:30');
INSERT INTO `personallog_inout` VALUES ('3119', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-03 08:32:08', '2016-03-03', '08:32:08');
INSERT INTO `personallog_inout` VALUES ('3120', '2268922110030', '36', '0', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-04 08:14:10', '2016-03-04', '08:14:10');
INSERT INTO `personallog_inout` VALUES ('3121', '2268922110030', '36', '1', '2016-06-17 01:48:14', 'Dahlia', 'Online', '2016-03-04 17:39:03', '2016-03-04', '17:39:03');
INSERT INTO `personallog_inout` VALUES ('3122', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-03 08:27:36', '2016-03-03', '08:27:36');
INSERT INTO `personallog_inout` VALUES ('3123', '2268922110030', '37', '0', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-04 08:15:22', '2016-03-04', '08:15:22');
INSERT INTO `personallog_inout` VALUES ('3124', '2268922110030', '37', '1', '2016-06-17 01:48:14', 'Narudin', 'Online', '2016-03-04 17:33:03', '2016-03-04', '17:33:03');
INSERT INTO `personallog_inout` VALUES ('3125', '2268922110030', '42', '0', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-03-03 08:17:57', '2016-03-03', '08:17:57');
INSERT INTO `personallog_inout` VALUES ('3126', '2268922110030', '42', '0', '2016-06-17 01:48:14', 'Melissa Waluyan', 'Online', '2016-03-04 08:39:18', '2016-03-04', '08:39:18');
INSERT INTO `personallog_inout` VALUES ('3127', '2268922110030', '43', '0', '2016-06-17 01:48:14', 'Julius Setiono', 'Online', '2016-03-03 09:03:21', '2016-03-03', '09:03:21');
INSERT INTO `personallog_inout` VALUES ('3128', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-03-03 08:10:01', '2016-03-03', '08:10:01');
INSERT INTO `personallog_inout` VALUES ('3129', '2268922110030', '47', '1', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-03-03 18:28:40', '2016-03-03', '18:28:40');
INSERT INTO `personallog_inout` VALUES ('3130', '2268922110030', '47', '0', '2016-06-17 01:48:14', 'Budi Setia', 'Online', '2016-03-04 07:52:22', '2016-03-04', '07:52:22');
INSERT INTO `personallog_inout` VALUES ('3131', '2268922110030', '51', '0', '2016-06-17 01:48:14', 'Alfari', 'Online', '2016-03-04 07:11:03', '2016-03-04', '07:11:03');

-- ----------------------------
-- Table structure for `personallog_ot`
-- ----------------------------
DROP TABLE IF EXISTS `personallog_ot`;
CREATE TABLE `personallog_ot` (
  `idno` bigint(20) NOT NULL AUTO_INCREMENT,
  `TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  `UserID` varchar(50) DEFAULT NULL,
  `FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  `Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  `UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  `FlagAbsence` varchar(100) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=2673 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';

-- ----------------------------
-- Records of personallog_ot
-- ----------------------------
INSERT INTO `personallog_ot` VALUES ('2568', '6427154700025', '24', '5', null, 'Akhmad Ridwan', 'Online', '2016-02-25 09:51:36', '2016-02-25', '09:51:36');
INSERT INTO `personallog_ot` VALUES ('2569', '6427154700025', '24', '4', null, 'Akhmad Ridwan', 'Online', '2016-03-04 16:14:05', '2016-03-04', '16:14:05');
INSERT INTO `personallog_ot` VALUES ('2570', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-02-23 13:52:52', '2016-02-23', '13:52:52');
INSERT INTO `personallog_ot` VALUES ('2571', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-02-25 09:56:04', '2016-02-25', '09:56:04');
INSERT INTO `personallog_ot` VALUES ('2572', '6427154700025', '26', '4', null, 'Indri Lestari', 'Online', '2016-02-26 08:33:59', '2016-02-26', '08:33:59');
INSERT INTO `personallog_ot` VALUES ('2573', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-02-29 08:37:15', '2016-02-29', '08:37:15');
INSERT INTO `personallog_ot` VALUES ('2574', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-03-02 16:09:33', '2016-03-02', '16:09:33');
INSERT INTO `personallog_ot` VALUES ('2575', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-03-03 17:49:24', '2016-03-03', '17:49:24');
INSERT INTO `personallog_ot` VALUES ('2576', '6427154700025', '26', '5', null, 'Indri Lestari', 'Online', '2016-03-04 17:10:34', '2016-03-04', '17:10:34');
INSERT INTO `personallog_ot` VALUES ('2577', '6427154700025', '28', '5', null, 'Piter', 'Online', '2016-02-24 15:33:17', '2016-02-24', '15:33:17');
INSERT INTO `personallog_ot` VALUES ('2578', '6427154700025', '28', '5', null, 'Piter', 'Online', '2016-02-26 15:19:47', '2016-02-26', '15:19:47');
INSERT INTO `personallog_ot` VALUES ('2579', '6427154700025', '28', '5', null, 'Piter', 'Online', '2016-03-02 11:01:55', '2016-03-02', '11:01:55');
INSERT INTO `personallog_ot` VALUES ('2580', '6427154700025', '28', '4', null, 'Piter', 'Online', '2016-03-04 08:30:18', '2016-03-04', '08:30:18');
INSERT INTO `personallog_ot` VALUES ('2581', '6427154700025', '28', '5', null, 'Piter', 'Online', '2016-03-04 08:38:57', '2016-03-04', '08:38:57');
INSERT INTO `personallog_ot` VALUES ('2582', '6427154700025', '28', '5', null, 'Piter', 'Online', '2016-03-07 08:38:23', '2016-03-07', '08:38:23');
INSERT INTO `personallog_ot` VALUES ('2583', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-02-23 17:30:04', '2016-02-23', '17:30:04');
INSERT INTO `personallog_ot` VALUES ('2584', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-02-24 16:51:38', '2016-02-24', '16:51:38');
INSERT INTO `personallog_ot` VALUES ('2585', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-02-25 16:49:22', '2016-02-25', '16:49:22');
INSERT INTO `personallog_ot` VALUES ('2586', '6427154700025', '30', '4', null, 'Alam Mafian', 'Online', '2016-02-26 10:16:38', '2016-02-26', '10:16:38');
INSERT INTO `personallog_ot` VALUES ('2587', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-02-26 17:29:29', '2016-02-26', '17:29:29');
INSERT INTO `personallog_ot` VALUES ('2588', '6427154700025', '30', '4', null, 'Alam Mafian', 'Online', '2016-02-29 11:12:48', '2016-02-29', '11:12:48');
INSERT INTO `personallog_ot` VALUES ('2589', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-02-29 08:55:10', '2016-02-29', '08:55:10');
INSERT INTO `personallog_ot` VALUES ('2590', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-03-01 14:25:15', '2016-03-01', '14:25:15');
INSERT INTO `personallog_ot` VALUES ('2591', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-03-02 16:37:39', '2016-03-02', '16:37:39');
INSERT INTO `personallog_ot` VALUES ('2592', '6427154700025', '30', '4', null, 'Alam Mafian', 'Online', '2016-03-03 10:43:03', '2016-03-03', '10:43:03');
INSERT INTO `personallog_ot` VALUES ('2593', '6427154700025', '30', '4', null, 'Alam Mafian', 'Online', '2016-03-04 09:03:47', '2016-03-04', '09:03:47');
INSERT INTO `personallog_ot` VALUES ('2594', '6427154700025', '30', '5', null, 'Alam Mafian', 'Online', '2016-03-07 08:38:05', '2016-03-07', '08:38:05');
INSERT INTO `personallog_ot` VALUES ('2595', '6427154700025', '32', '5', null, 'Radumta Sitepu', 'Online', '2016-02-25 17:30:27', '2016-02-25', '17:30:27');
INSERT INTO `personallog_ot` VALUES ('2596', '6427154700025', '33', '5', null, 'Yosika', 'Online', '2016-02-23 10:27:25', '2016-02-23', '10:27:25');
INSERT INTO `personallog_ot` VALUES ('2597', '6427154700025', '33', '4', null, 'Yosika', 'Online', '2016-02-24 08:52:19', '2016-02-24', '08:52:19');
INSERT INTO `personallog_ot` VALUES ('2598', '6427154700025', '33', '4', null, 'Yosika', 'Online', '2016-02-26 08:26:18', '2016-02-26', '08:26:18');
INSERT INTO `personallog_ot` VALUES ('2599', '6427154700025', '33', '5', null, 'Yosika', 'Online', '2016-02-26 13:20:29', '2016-02-26', '13:20:29');
INSERT INTO `personallog_ot` VALUES ('2600', '6427154700025', '33', '5', null, 'Yosika', 'Online', '2016-03-01 13:52:47', '2016-03-01', '13:52:47');
INSERT INTO `personallog_ot` VALUES ('2601', '6427154700025', '33', '4', null, 'Yosika', 'Online', '2016-03-03 15:56:51', '2016-03-03', '15:56:51');
INSERT INTO `personallog_ot` VALUES ('2602', '6427154700025', '33', '4', null, 'Yosika', 'Online', '2016-03-04 08:59:25', '2016-03-04', '08:59:25');
INSERT INTO `personallog_ot` VALUES ('2603', '6427154700025', '34', '5', null, 'Sisca Sopiani', 'Online', '2016-02-23 14:34:01', '2016-02-23', '14:34:01');
INSERT INTO `personallog_ot` VALUES ('2604', '6427154700025', '34', '5', null, 'Sisca Sopiani', 'Online', '2016-02-25 12:16:38', '2016-02-25', '12:16:38');
INSERT INTO `personallog_ot` VALUES ('2605', '6427154700025', '34', '4', null, 'Sisca Sopiani', 'Online', '2016-02-29 13:10:08', '2016-02-29', '13:10:08');
INSERT INTO `personallog_ot` VALUES ('2606', '6427154700025', '34', '5', null, 'Sisca Sopiani', 'Online', '2016-03-01 16:22:40', '2016-03-01', '16:22:40');
INSERT INTO `personallog_ot` VALUES ('2607', '6427154700025', '34', '5', null, 'Sisca Sopiani', 'Online', '2016-03-02 16:13:55', '2016-03-02', '16:13:55');
INSERT INTO `personallog_ot` VALUES ('2608', '6427154700025', '34', '4', null, 'Sisca Sopiani', 'Online', '2016-03-03 09:46:37', '2016-03-03', '09:46:37');
INSERT INTO `personallog_ot` VALUES ('2609', '6427154700025', '34', '5', null, 'Sisca Sopiani', 'Online', '2016-03-03 17:49:20', '2016-03-03', '17:49:20');
INSERT INTO `personallog_ot` VALUES ('2610', '6427154700025', '34', '4', null, 'Sisca Sopiani', 'Online', '2016-03-04 08:23:27', '2016-03-04', '08:23:27');
INSERT INTO `personallog_ot` VALUES ('2611', '6427154700025', '35', '5', null, 'Adetya Kurniawan', 'Online', '2016-02-23 08:25:12', '2016-02-23', '08:25:12');
INSERT INTO `personallog_ot` VALUES ('2612', '6427154700025', '35', '5', null, 'Adetya Kurniawan', 'Online', '2016-03-01 08:31:10', '2016-03-01', '08:31:10');
INSERT INTO `personallog_ot` VALUES ('2613', '6427154700025', '35', '5', null, 'Adetya Kurniawan', 'Online', '2016-03-02 09:02:02', '2016-03-02', '09:02:02');
INSERT INTO `personallog_ot` VALUES ('2614', '6427154700025', '36', '4', null, 'Dahlia', 'Online', '2016-02-26 08:45:50', '2016-02-26', '08:45:50');
INSERT INTO `personallog_ot` VALUES ('2615', '6427154700025', '36', '5', null, 'Dahlia', 'Online', '2016-02-26 12:53:22', '2016-02-26', '12:53:22');
INSERT INTO `personallog_ot` VALUES ('2616', '6427154700025', '36', '5', null, 'Dahlia', 'Online', '2016-03-01 08:35:14', '2016-03-01', '08:35:14');
INSERT INTO `personallog_ot` VALUES ('2617', '6427154700025', '36', '5', null, 'Dahlia', 'Online', '2016-03-02 16:06:16', '2016-03-02', '16:06:16');
INSERT INTO `personallog_ot` VALUES ('2618', '6427154700025', '36', '5', null, 'Dahlia', 'Online', '2016-03-03 17:51:44', '2016-03-03', '17:51:44');
INSERT INTO `personallog_ot` VALUES ('2619', '6427154700025', '36', '4', null, 'Dahlia', 'Online', '2016-03-04 17:14:16', '2016-03-04', '17:14:16');
INSERT INTO `personallog_ot` VALUES ('2620', '6427154700025', '37', '4', null, 'Narudin', 'Online', '2016-02-26 10:09:55', '2016-02-26', '10:09:55');
INSERT INTO `personallog_ot` VALUES ('2621', '6427154700025', '37', '4', null, 'Narudin', 'Online', '2016-03-03 10:07:50', '2016-03-03', '10:07:50');
INSERT INTO `personallog_ot` VALUES ('2622', '6427154700025', '40', '5', null, 'Yudhistira Tjahjadi', 'Online', '2016-02-23 16:52:52', '2016-02-23', '16:52:52');
INSERT INTO `personallog_ot` VALUES ('2623', '6427154700025', '40', '4', null, 'Yudhistira Tjahjadi', 'Online', '2016-02-24 09:52:04', '2016-02-24', '09:52:04');
INSERT INTO `personallog_ot` VALUES ('2624', '6427154700025', '40', '5', null, 'Yudhistira Tjahjadi', 'Online', '2016-02-24 11:46:06', '2016-02-24', '11:46:06');
INSERT INTO `personallog_ot` VALUES ('2625', '6427154700025', '40', '5', null, 'Yudhistira Tjahjadi', 'Online', '2016-02-25 13:06:01', '2016-02-25', '13:06:01');
INSERT INTO `personallog_ot` VALUES ('2626', '6427154700025', '40', '4', null, 'Yudhistira Tjahjadi', 'Online', '2016-02-29 10:21:27', '2016-02-29', '10:21:27');
INSERT INTO `personallog_ot` VALUES ('2627', '6427154700025', '40', '5', null, 'Yudhistira Tjahjadi', 'Online', '2016-03-01 17:10:38', '2016-03-01', '17:10:38');
INSERT INTO `personallog_ot` VALUES ('2628', '6427154700025', '40', '4', null, 'Yudhistira Tjahjadi', 'Online', '2016-03-03 10:37:54', '2016-03-03', '10:37:54');
INSERT INTO `personallog_ot` VALUES ('2629', '6427154700025', '40', '4', null, 'Yudhistira Tjahjadi', 'Online', '2016-03-04 09:25:11', '2016-03-04', '09:25:11');
INSERT INTO `personallog_ot` VALUES ('2630', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-02-23 12:47:33', '2016-02-23', '12:47:33');
INSERT INTO `personallog_ot` VALUES ('2631', '6427154700025', '42', '4', null, 'Melissa Waluyan', 'Online', '2016-02-24 09:52:48', '2016-02-24', '09:52:48');
INSERT INTO `personallog_ot` VALUES ('2632', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-02-24 12:08:30', '2016-02-24', '12:08:30');
INSERT INTO `personallog_ot` VALUES ('2633', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-02-25 17:23:34', '2016-02-25', '17:23:34');
INSERT INTO `personallog_ot` VALUES ('2634', '6427154700025', '42', '4', null, 'Melissa Waluyan', 'Online', '2016-02-26 10:17:17', '2016-02-26', '10:17:17');
INSERT INTO `personallog_ot` VALUES ('2635', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-02-26 11:56:10', '2016-02-26', '11:56:10');
INSERT INTO `personallog_ot` VALUES ('2636', '6427154700025', '42', '4', null, 'Melissa Waluyan', 'Online', '2016-02-29 13:06:52', '2016-02-29', '13:06:52');
INSERT INTO `personallog_ot` VALUES ('2637', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-03-01 17:00:33', '2016-03-01', '17:00:33');
INSERT INTO `personallog_ot` VALUES ('2638', '6427154700025', '42', '5', null, 'Melissa Waluyan', 'Online', '2016-03-02 16:14:27', '2016-03-02', '16:14:27');
INSERT INTO `personallog_ot` VALUES ('2639', '6427154700025', '42', '4', null, 'Melissa Waluyan', 'Online', '2016-03-03 10:25:33', '2016-03-03', '10:25:33');
INSERT INTO `personallog_ot` VALUES ('2640', '6427154700025', '43', '4', null, 'Julius Setiono', 'Online', '2016-02-26 08:34:22', '2016-02-26', '08:34:22');
INSERT INTO `personallog_ot` VALUES ('2641', '6427154700025', '43', '5', null, 'Julius Setiono', 'Online', '2016-03-02 10:24:02', '2016-03-02', '10:24:02');
INSERT INTO `personallog_ot` VALUES ('2642', '6427154700025', '43', '4', null, 'Julius Setiono', 'Online', '2016-03-03 09:51:42', '2016-03-03', '09:51:42');
INSERT INTO `personallog_ot` VALUES ('2643', '6427154700025', '43', '4', null, 'Julius Setiono', 'Online', '2016-03-04 09:02:40', '2016-03-04', '09:02:40');
INSERT INTO `personallog_ot` VALUES ('2644', '6427154700025', '44', '5', null, 'Card.Bayu', 'Online', '2016-02-23 14:24:06', '2016-02-23', '14:24:06');
INSERT INTO `personallog_ot` VALUES ('2645', '6427154700025', '44', '5', null, 'Card.Bayu', 'Online', '2016-03-02 11:25:35', '2016-03-02', '11:25:35');
INSERT INTO `personallog_ot` VALUES ('2646', '6427154700025', '44', '4', null, 'Card.Bayu', 'Online', '2016-03-03 09:46:48', '2016-03-03', '09:46:48');
INSERT INTO `personallog_ot` VALUES ('2647', '6427154700025', '44', '4', null, 'Card.Bayu', 'Online', '2016-03-04 09:28:49', '2016-03-04', '09:28:49');
INSERT INTO `personallog_ot` VALUES ('2648', '6427154700025', '45', '4', null, 'Gilbert Tony G', 'Online', '2016-02-24 08:56:30', '2016-02-24', '08:56:30');
INSERT INTO `personallog_ot` VALUES ('2649', '6427154700025', '45', '5', null, 'Gilbert Tony G', 'Online', '2016-02-24 16:55:02', '2016-02-24', '16:55:02');
INSERT INTO `personallog_ot` VALUES ('2650', '6427154700025', '45', '5', null, 'Gilbert Tony G', 'Online', '2016-02-25 10:40:18', '2016-02-25', '10:40:18');
INSERT INTO `personallog_ot` VALUES ('2651', '6427154700025', '45', '4', null, 'Gilbert Tony G', 'Online', '2016-02-26 10:05:08', '2016-02-26', '10:05:08');
INSERT INTO `personallog_ot` VALUES ('2652', '6427154700025', '45', '5', null, 'Gilbert Tony G', 'Online', '2016-02-26 15:32:31', '2016-02-26', '15:32:31');
INSERT INTO `personallog_ot` VALUES ('2653', '6427154700025', '45', '4', null, 'Gilbert Tony G', 'Online', '2016-02-29 10:21:56', '2016-02-29', '10:21:56');
INSERT INTO `personallog_ot` VALUES ('2654', '6427154700025', '45', '5', null, 'Gilbert Tony G', 'Online', '2016-03-01 16:20:56', '2016-03-01', '16:20:56');
INSERT INTO `personallog_ot` VALUES ('2655', '6427154700025', '45', '4', null, 'Gilbert Tony G', 'Online', '2016-03-03 10:36:54', '2016-03-03', '10:36:54');
INSERT INTO `personallog_ot` VALUES ('2656', '6427154700025', '45', '4', null, 'Gilbert Tony G', 'Online', '2016-03-04 09:30:47', '2016-03-04', '09:30:47');
INSERT INTO `personallog_ot` VALUES ('2657', '6427154700025', '47', '5', null, 'Budi Setia', 'Online', '2016-02-23 10:15:45', '2016-02-23', '10:15:45');
INSERT INTO `personallog_ot` VALUES ('2658', '6427154700025', '47', '5', null, 'Budi Setia', 'Online', '2016-02-24 11:08:37', '2016-02-24', '11:08:37');
INSERT INTO `personallog_ot` VALUES ('2659', '6427154700025', '47', '5', null, 'Budi Setia', 'Online', '2016-02-25 13:01:01', '2016-02-25', '13:01:01');
INSERT INTO `personallog_ot` VALUES ('2660', '6427154700025', '47', '5', null, 'Budi Setia', 'Online', '2016-02-26 15:25:44', '2016-02-26', '15:25:44');
INSERT INTO `personallog_ot` VALUES ('2661', '6427154700025', '47', '5', null, 'Budi Setia', 'Online', '2016-03-01 13:47:03', '2016-03-01', '13:47:03');
INSERT INTO `personallog_ot` VALUES ('2662', '6427154700025', '47', '4', null, 'Budi Setia', 'Online', '2016-03-04 10:32:47', '2016-03-04', '10:32:47');
INSERT INTO `personallog_ot` VALUES ('2663', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-02-23 16:24:59', '2016-02-23', '16:24:59');
INSERT INTO `personallog_ot` VALUES ('2664', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-02-24 16:54:39', '2016-02-24', '16:54:39');
INSERT INTO `personallog_ot` VALUES ('2665', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-02-25 14:28:03', '2016-02-25', '14:28:03');
INSERT INTO `personallog_ot` VALUES ('2666', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-02-26 17:16:37', '2016-02-26', '17:16:37');
INSERT INTO `personallog_ot` VALUES ('2667', '6427154700025', '51', '4', null, 'Alfari', 'Online', '2016-02-29 10:15:00', '2016-02-29', '10:15:00');
INSERT INTO `personallog_ot` VALUES ('2668', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-03-01 16:20:14', '2016-03-01', '16:20:14');
INSERT INTO `personallog_ot` VALUES ('2669', '6427154700025', '51', '5', null, 'Alfari', 'Online', '2016-03-02 12:51:26', '2016-03-02', '12:51:26');
INSERT INTO `personallog_ot` VALUES ('2670', '6427154700025', '51', '4', null, 'Alfari', 'Online', '2016-03-04 09:07:37', '2016-03-04', '09:07:37');
INSERT INTO `personallog_ot` VALUES ('2671', '6427154700025', '52', '5', null, 'Tano Ria Saragih', 'Online', '2016-02-23 10:15:29', '2016-02-23', '10:15:29');
INSERT INTO `personallog_ot` VALUES ('2672', '6427154700025', '52', '5', null, 'Tano Ria Saragih', 'Online', '2016-02-26 14:06:38', '2016-02-26', '14:06:38');

-- ----------------------------
-- Table structure for `personallog_usb`
-- ----------------------------
DROP TABLE IF EXISTS `personallog_usb`;
CREATE TABLE `personallog_usb` (
  `TerminalID` int(100) DEFAULT NULL COMMENT 'Terminal Number',
  `FingerPrintID` varchar(100) DEFAULT NULL COMMENT 'Fingerprint ID (Fingerprint Number) for do Attendance',
  `FunctionKey` varchar(100) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  `DateTime` datetime DEFAULT NULL,
  `FlagAbsence` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personallog_usb
-- ----------------------------

-- ----------------------------
-- Table structure for `timetable_grp`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_grp`;
CREATE TABLE `timetable_grp` (
  `TT_GRP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_GRP_NM` varchar(15) DEFAULT NULL,
  `TT_GRP_STT` int(11) DEFAULT '1',
  `TT_GRP_DEF` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`TT_GRP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetable_grp
-- ----------------------------
INSERT INTO `timetable_grp` VALUES ('1', 'STAFF', '1', 'STAFF');
INSERT INTO `timetable_grp` VALUES ('2', 'HARIAN', '1', 'HARIAN');
INSERT INTO `timetable_grp` VALUES ('3', 'SHIFT', '1', 'SHIFT');
INSERT INTO `timetable_grp` VALUES ('4', 'DRIVER', '1', null);

-- ----------------------------
-- Table structure for `timetable_ktg`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_ktg`;
CREATE TABLE `timetable_ktg` (
  `TT_TYPE_KTG` int(11) NOT NULL AUTO_INCREMENT,
  `TT_TYPE` varchar(50) DEFAULT NULL,
  `TT_PERCENT` decimal(11,4) DEFAULT NULL,
  PRIMARY KEY (`TT_TYPE_KTG`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='kategori Time Table\r\n1. Normal\r\n2. Lembur\r\n';

-- ----------------------------
-- Records of timetable_ktg
-- ----------------------------
INSERT INTO `timetable_ktg` VALUES ('1', 'Normal', null);
INSERT INTO `timetable_ktg` VALUES ('2', 'Lembur1', null);
INSERT INTO `timetable_ktg` VALUES ('3', 'Lembur2', null);
INSERT INTO `timetable_ktg` VALUES ('4', 'Lembur3', null);
INSERT INTO `timetable_ktg` VALUES ('5', 'Lembur4', null);
INSERT INTO `timetable_ktg` VALUES ('6', 'Lembur5', null);
INSERT INTO `timetable_ktg` VALUES ('7', 'Lembur6', null);
INSERT INTO `timetable_ktg` VALUES ('8', 'Lembur7', null);

-- ----------------------------
-- Table structure for `timetable_level`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_level`;
CREATE TABLE `timetable_level` (
  `LVL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LVL_NM` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`LVL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Time Table Overtime Level';

-- ----------------------------
-- Records of timetable_level
-- ----------------------------
INSERT INTO `timetable_level` VALUES ('1', 'LOW');
INSERT INTO `timetable_level` VALUES ('2', 'MIDDLE');
INSERT INTO `timetable_level` VALUES ('3', 'HARD');

-- ----------------------------
-- Table structure for `timetable_normal`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_normal`;
CREATE TABLE `timetable_normal` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_GRP_ID` int(11) DEFAULT NULL,
  `TT_TYP_KTG` int(11) DEFAULT NULL COMMENT 'Kategory\r\n1=normal\r\n2 atau lebih = Lembur',
  `TT_SDAYS` int(11) DEFAULT NULL,
  `TT_EDAYS` int(11) DEFAULT NULL,
  `TT_SDATE` date DEFAULT NULL,
  `TT_EDATE` date DEFAULT NULL,
  `TT_NOTE` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `TT_UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TT_ACTIVE` smallint(6) DEFAULT '1',
  `RULE_IN` time DEFAULT NULL,
  `RULE_OUT` time DEFAULT NULL,
  `RULE_TOL_IN` time DEFAULT NULL,
  `RULE_TOL_OUT` time DEFAULT NULL,
  `RULE_BRK_OUT` time DEFAULT NULL,
  `RULE_BRK_IN` time DEFAULT NULL,
  `RULE_DRT_OT_DPN` time DEFAULT NULL,
  `RULE_DRT_OT_BLK` time DEFAULT NULL,
  `RULE_DURATION` int(11) DEFAULT NULL,
  `RULE_FRK_DAY` int(11) DEFAULT NULL,
  `LEV1_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX_TIME` time DEFAULT NULL,
  `LEV2_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_MAX_TIME` time DEFAULT NULL,
  `LEV3_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_MAX_TIME` time DEFAULT NULL,
  `KOMPENSASI` int(11) DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of timetable_normal
-- ----------------------------
INSERT INTO `timetable_normal` VALUES ('1', '1', '1', '2', '6', '2014-12-22', '2015-12-05', 'OFFICE HOUR', '2016-06-23 01:56:27', '1', '08:00:00', '07:00:00', '08:15:00', '12:00:00', '12:00:00', '12:00:00', '01:00:00', '01:00:00', '8', null, '0.2500', null, null, null, null, null, null, null, null, null, null, null, '0');
INSERT INTO `timetable_normal` VALUES ('2', '1', '1', '7', '7', '2014-12-22', '2019-12-01', 'OFFICE HOUR', '2015-09-05 13:29:56', '1', '08:00:00', '12:00:00', '08:15:00', '12:00:00', '12:00:00', '13:00:00', '01:00:00', '01:00:00', '4', null, '0.1250', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('11', '2', '1', '1', '7', '2014-12-22', '2019-12-30', 'OFFICE HOUR', '2015-09-05 13:27:14', '1', '08:00:00', '17:00:00', '08:15:00', '17:00:00', '12:00:00', '13:00:00', '01:00:00', '01:00:00', '8', null, '0.1250', '0.1250', '1.0000', null, '0.0625', '0.1250', '1.0000', null, '0.0625', '0.1250', '1.0000', null, null);
INSERT INTO `timetable_normal` VALUES ('21', '3', '1', '1', '7', '2014-12-22', '2019-06-01', 'SHIFT 1', '2015-03-26 22:32:09', '1', '07:00:00', '19:00:00', '07:15:00', '15:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '8', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('22', '3', '1', '1', '7', '2014-12-22', '2019-06-01', 'SHIFT 2', '2015-03-26 22:32:11', '1', '19:00:00', '07:00:00', '19:15:00', '07:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '8', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('23', '4', '1', '1', '7', '2014-12-22', '2019-06-01', 'OFFICE HOUR', '2015-03-26 22:31:19', '1', '08:00:00', '17:00:00', '08:15:00', '17:00:00', '12:00:00', '13:00:00', '01:00:00', '01:00:00', '8', null, '0.1250', '0.1250', '1.0000', '00:00:00', '0.0625', '0.1250', '1.0000', '00:00:00', '0.0625', '0.1250', '1.0000', '00:00:00', null);
INSERT INTO `timetable_normal` VALUES ('24', '4', '1', '1', '1', '0000-00-00', '0000-00-00', 'test', '2016-06-22 00:53:07', '0', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('25', '4', '1', '2', '2', '0000-00-00', '0000-00-00', 'test ok\r\n', '2016-06-22 00:58:14', '0', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('26', '4', '1', '2', '3', '2016-06-19', '2016-06-26', 'ok\r\n', '2016-06-22 00:59:19', '0', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', '12:45:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `timetable_normal` VALUES ('27', '4', '1', '2', '1', '2016-06-28', '2016-06-29', 'k', '2016-06-22 01:23:55', '0', '01:15:00', '01:15:00', '01:15:00', '01:15:00', '01:15:00', '01:15:00', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `timetable_ot`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_ot`;
CREATE TABLE `timetable_ot` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_GRP_ID` int(11) DEFAULT NULL,
  `TT_TYP_KTG` int(11) DEFAULT NULL,
  `TT_SDAYS` int(11) DEFAULT NULL,
  `TT_EDAYS` int(11) DEFAULT NULL,
  `TT_SDATE` date DEFAULT NULL,
  `TT_EDATE` date DEFAULT NULL,
  `TT_NOTE` varchar(15) DEFAULT NULL,
  `TT_UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TT_ACTIVE` smallint(6) DEFAULT '1',
  `RULE_IN` time DEFAULT NULL,
  `RULE_OUT` time DEFAULT NULL,
  `RULE_DURATION` int(11) DEFAULT NULL,
  `RULE_FRK_DAY` int(11) DEFAULT NULL,
  `LEV1_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX_TIME` time DEFAULT NULL,
  `KOMPENSASI` int(11) DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetable_ot
-- ----------------------------
INSERT INTO `timetable_ot` VALUES ('7', '1', '2', '2', '7', '2014-12-22', '2015-12-31', 'LEMBUR1', '2015-03-13 20:57:15', '1', '17:00:01', '21:00:00', '4', '1', '0.2500', '0.5000', '1.5000', '03:00:00', '0');
INSERT INTO `timetable_ot` VALUES ('15', '2', '8', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR7', '2016-06-22 22:34:09', '1', '12:00:01', '17:00:00', '8', '3', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('17', '2', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR1', '2016-06-22 22:33:38', '1', '17:00:01', '18:00:00', '4', '1', '0.1250', '0.2500', '0.1250', '00:30:00', null);
INSERT INTO `timetable_ot` VALUES ('18', '2', '3', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR2', '2016-06-22 22:33:41', '1', '18:00:01', '22:00:00', '4', '1', '0.1250', '0.2500', '0.8750', '03:30:00', null);
INSERT INTO `timetable_ot` VALUES ('19', '2', '4', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR3', '2016-06-22 22:33:48', '1', '22:00:01', '02:00:00', '4', '2', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('20', '2', '5', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR4', '2016-06-22 22:33:51', '1', '02:00:01', '06:00:00', '4', '3', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('30', '4', '2', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR1', '2015-03-26 23:13:41', '1', '17:01:00', '22:00:00', '5', '1', '0.1250', '0.2500', '1.2500', '05:00:00', null);
INSERT INTO `timetable_ot` VALUES ('31', '4', '3', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR2', '2016-06-24 02:28:04', '1', '22:01:00', '02:00:00', '4', '2', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('32', '4', '4', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR3', '2016-06-24 02:28:06', '1', '02:01:00', '06:00:00', '4', '3', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('33', '4', '5', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR4', '2016-06-24 02:28:07', '1', '06:01:00', '08:00:00', '4', '3', '0.1250', '0.2500', '0.5000', '02:00:00', null);
INSERT INTO `timetable_ot` VALUES ('34', '2', '6', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR5', '2016-06-22 22:33:52', '1', '06:00:01', '08:00:00', '4', '3', '0.1250', '0.2500', '0.5000', '02:00:00', null);
INSERT INTO `timetable_ot` VALUES ('35', '2', '7', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR6', '2016-06-22 22:33:54', '1', '08:00:01', '12:00:00', '4', '3', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('36', '4', '6', '1', '7', '2014-12-22', '2019-12-31', 'LEMBUR5', '2016-06-24 02:28:09', '1', '08:01:00', '12:00:00', '4', '3', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('37', '4', '7', '1', '7', '2014-12-22', '2019-12-31', 'LEMBUR6', '2016-06-24 02:28:13', '1', '12:01:00', '17:00:00', '8', '3', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot` VALUES ('42', '1', '7', null, null, null, null, '', '2016-06-24 13:25:25', null, '01:15:00', '01:15:00', null, null, null, null, null, null, null);
INSERT INTO `timetable_ot` VALUES ('43', '3', '2', null, null, null, null, '', '2016-06-24 13:25:48', null, '01:15:00', '01:15:00', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `timetable_ot_old`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_ot_old`;
CREATE TABLE `timetable_ot_old` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_GRP_ID` int(11) DEFAULT NULL,
  `TT_TYP` varchar(10) DEFAULT NULL,
  `TT_TYP_KTG` int(11) DEFAULT NULL,
  `TT_SDAYS` int(11) DEFAULT NULL,
  `TT_EDAYS` int(11) DEFAULT NULL,
  `TT_SDATE` date DEFAULT NULL,
  `TT_EDATE` date DEFAULT NULL,
  `TT_NOTE` varchar(15) DEFAULT NULL,
  `TT_UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TT_ACTIVE` smallint(6) DEFAULT '1',
  `RULE_IN` time DEFAULT NULL,
  `RULE_OUT` time DEFAULT NULL,
  `RULE_TOL_IN` time DEFAULT NULL,
  `RULE_TOL_OUT` time DEFAULT NULL,
  `RULE_BRK_OUT` time DEFAULT NULL,
  `RULE_BRK_IN` time DEFAULT NULL,
  `RULE_DRT_OT_DPN` time DEFAULT NULL,
  `RULE_DRT_OT_BLK` time DEFAULT NULL,
  `RULE_DURATION` int(11) DEFAULT NULL,
  `RULE_FRK_DAY` int(11) DEFAULT NULL,
  `LEV1_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV1_FOT_MAX_TIME` time DEFAULT NULL,
  `LEV2_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV2_FOT_MAX_TIME` time DEFAULT NULL,
  `LEV3_FOT_HALF` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_HOUR` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_MAX` decimal(11,4) DEFAULT NULL,
  `LEV3_FOT_MAX_TIME` time DEFAULT NULL,
  `KOMPENSASI` int(11) DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetable_ot_old
-- ----------------------------
INSERT INTO `timetable_ot_old` VALUES ('7', '1', 'LEMBUR1', '2', '2', '7', '2014-12-22', '2015-12-31', 'LEMBUR1', '2015-03-13 20:57:15', '1', '17:00:01', '21:00:00', '17:00:01', '21:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '4', '1', '0.2500', '0.5000', '1.5000', '03:00:00', '0.2500', '1.5000', '1.5000', '03:00:00', '0.2500', '1.5000', '1.5000', '03:00:00', '0');
INSERT INTO `timetable_ot_old` VALUES ('15', '2', 'LEMBUR7', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR7', '2015-03-13 10:27:40', '1', '12:00:01', '17:00:00', '12:00:01', '17:00:00', '12:00:00', '13:00:00', '01:00:00', '01:00:00', '8', '3', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('17', '2', 'LEMBUR1', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR1', '2015-03-03 23:05:43', '1', '17:00:01', '18:00:00', '17:00:01', '18:00:00', '00:00:00', '00:00:00', '01:00:00', '00:00:00', '4', '1', '0.1250', '0.2500', '0.1250', '00:30:00', '0.1250', '0.2500', '0.1250', '00:30:00', '0.1250', '0.2500', '0.1250', '00:30:00', null);
INSERT INTO `timetable_ot_old` VALUES ('18', '2', 'LEMBUR2', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR2', '2015-03-03 20:29:18', '1', '18:00:01', '22:00:00', '18:00:01', '22:00:00', '00:00:00', '00:00:00', '01:00:00', '00:00:00', '4', '1', '0.1250', '0.2500', '0.8750', '03:30:00', '0.1250', '0.2500', '0.8750', '03:30:00', '0.1250', '0.2500', '0.8750', '03:30:00', null);
INSERT INTO `timetable_ot_old` VALUES ('19', '2', 'LEMBUR3', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR3', '2015-03-03 20:29:19', '1', '22:00:01', '02:00:00', '22:00:01', '02:00:00', '00:00:00', '00:00:00', '01:00:00', '00:00:00', '4', '2', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('20', '2', 'LEMBUR4', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR4', '2015-03-13 10:27:37', '1', '02:00:01', '06:00:00', '02:00:01', '06:00:00', '00:00:00', '00:00:00', '01:00:00', '00:00:00', '4', '3', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('30', '4', 'LEMBUR1', '2', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR1', '2015-03-26 23:13:41', '1', '17:01:00', '22:00:00', '18:00:00', '22:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '5', '1', '0.1250', '0.2500', '1.2500', '05:00:00', '0.1250', '0.2500', '1.2500', '05:00:00', '0.1250', '0.2500', '1.2500', '05:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('31', '4', 'LEMBUR2', '2', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR2', '2015-03-26 23:14:54', '1', '22:01:00', '02:00:00', '00:01:00', '02:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '4', '2', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('32', '4', 'LEMBUR3', '2', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR3', '2015-03-26 23:15:28', '1', '02:01:00', '06:00:00', '02:01:00', '06:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '4', '3', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', '0.1250', '0.2500', '1.0000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('33', '4', 'LEMBUR4', '2', '2', '7', '2014-12-22', '2019-12-31', 'LEMBUR4', '2015-03-26 23:16:03', '1', '06:01:00', '08:00:00', '06:00:00', '12:00:00', '00:00:00', '00:00:00', '01:00:00', '01:00:00', '4', '3', '0.1250', '0.2500', '0.5000', '02:00:00', '0.1250', '0.2500', '0.5000', '02:00:00', '0.1250', '0.2500', '0.5000', '02:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('34', '2', 'LEMBUR5', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR5', '2015-03-13 10:27:37', '1', '06:00:01', '08:00:00', '06:00:01', '08:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '4', '3', '0.1250', '0.2500', '0.5000', '02:00:00', '0.1250', '0.2500', '0.5000', '02:00:00', '0.1250', '0.2500', '0.5000', '02:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('35', '2', 'LEMBUR6', '2', '1', '7', '2014-12-22', '2016-12-31', 'LEMBUR6', '2015-03-13 10:27:38', '1', '08:00:01', '12:00:00', '08:00:01', '12:01:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '4', '3', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('36', '4', 'LEMBUR5', '2', '1', '7', '2014-12-22', '2019-12-31', 'LEMBUR5', '2015-03-26 23:16:45', '1', '08:01:00', '12:00:00', '06:00:01', '08:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '4', '3', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', null);
INSERT INTO `timetable_ot_old` VALUES ('37', '4', 'LEMBUR6', '2', '1', '7', '2014-12-22', '2019-12-31', 'LEMBUR6', '2015-03-26 23:17:16', '1', '12:01:00', '17:00:00', '08:00:01', '12:01:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '8', '3', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', '0.0625', '0.1250', '0.5000', '04:00:00', null);

-- ----------------------------
-- Table structure for `timetable_ot_stt`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_ot_stt`;
CREATE TABLE `timetable_ot_stt` (
  `STT_OT_DPN` smallint(11) NOT NULL COMMENT '0',
  `STT_OT_DPN_NM` varchar(8) NOT NULL,
  PRIMARY KEY (`STT_OT_DPN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetable_ot_stt
-- ----------------------------
INSERT INTO `timetable_ot_stt` VALUES ('0', 'DISABLE');
INSERT INTO `timetable_ot_stt` VALUES ('1', 'ENABLE');

-- ----------------------------
-- Table structure for `u0001x`
-- ----------------------------
DROP TABLE IF EXISTS `u0001x`;
CREATE TABLE `u0001x` (
  `CORP_ID` varchar(5) NOT NULL,
  `CORP_NM` varchar(30) DEFAULT NULL,
  `CORP_STS` smallint(6) NOT NULL DEFAULT '0',
  `CORP_AVATAR` varchar(50) DEFAULT NULL,
  `CORP_DCRP` text,
  `SORT` bigint(20) DEFAULT NULL,
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CORP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TABLE COORP';

-- ----------------------------
-- Records of u0001x
-- ----------------------------
INSERT INTO `u0001x` VALUES ('ALG', 'PT. Arta Lipat Ganda', '1', null, null, '2', '', '', '2016-01-24 18:48:13');
INSERT INTO `u0001x` VALUES ('ESM', 'PT. Efenbi Sukses Makmur', '1', null, null, '3', '', '', '2016-01-24 18:48:15');
INSERT INTO `u0001x` VALUES ('GSN', 'PT. Gosent', '1', null, null, '4', '', '', '2016-01-24 18:48:18');
INSERT INTO `u0001x` VALUES ('LG', 'PT. Lukison Group', '1', null, null, '0', '', '', '2016-01-24 18:48:20');
INSERT INTO `u0001x` VALUES ('MM', 'Baverage', '1', null, null, '5', 'none', 'none', '0000-00-00 00:00:00');
INSERT INTO `u0001x` VALUES ('SSS', 'PT. Sarana Sinar Surya', '1', null, null, '1', '', '', '2016-01-24 18:48:24');

-- ----------------------------
-- Table structure for `u0002ax`
-- ----------------------------
DROP TABLE IF EXISTS `u0002ax`;
CREATE TABLE `u0002ax` (
  `DEP_ID` varchar(5) NOT NULL,
  `DEP_NM` varchar(30) DEFAULT NULL,
  `DEP_STS` smallint(6) NOT NULL DEFAULT '0',
  `DEP_AVATAR` varchar(50) DEFAULT NULL,
  `DEP_DCRP` text,
  `SORT` bigint(20) DEFAULT NULL,
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`DEP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TABLE DEPARTEMEN';

-- ----------------------------
-- Records of u0002ax
-- ----------------------------
INSERT INTO `u0002ax` VALUES ('ACT', 'Accounting', '1', null, 'Accounting', '3', '', 'admin', '2015-10-21 04:32:02');
INSERT INTO `u0002ax` VALUES ('BD', 'Business Development', '0', null, '', '5', '', '', '2015-10-21 04:30:38');
INSERT INTO `u0002ax` VALUES ('DRC', 'Direction', '0', null, null, '0', '', '', '2015-10-21 04:30:39');
INSERT INTO `u0002ax` VALUES ('GM', 'General Manager', '0', null, '', '1', '', '', '2015-10-21 04:30:40');
INSERT INTO `u0002ax` VALUES ('HRD', 'Human Resource Department', '1', null, null, '2', '', '', '2015-10-21 04:17:35');
INSERT INTO `u0002ax` VALUES ('IT', 'Information Technologi', '1', null, null, '4', '', '', '2015-10-21 04:17:35');
INSERT INTO `u0002ax` VALUES ('ok', 'ok dept', '3', null, 'percobaan habis', '3', 'admin', 'admin', '2015-10-21 04:41:56');
INSERT INTO `u0002ax` VALUES ('OPS', 'Operational', '0', null, '', '6', '', '', '2015-10-21 04:30:40');
INSERT INTO `u0002ax` VALUES ('S&M', 'Sales & Marketing', '0', null, '', '7', '', '', '2015-10-21 04:30:46');

-- ----------------------------
-- Table structure for `u0002bx`
-- ----------------------------
DROP TABLE IF EXISTS `u0002bx`;
CREATE TABLE `u0002bx` (
  `DEP_SUB_ID` varchar(6) NOT NULL,
  `DEP_ID` varchar(20) NOT NULL,
  `DEP_SUB_NM` varchar(50) DEFAULT NULL,
  `DEP_SUB_STS` smallint(6) NOT NULL DEFAULT '0',
  `DEP_SUB_AVATAR` varchar(50) DEFAULT NULL,
  `DEP_SUB_DCRP` text,
  `SORT` bigint(20) DEFAULT NULL,
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`DEP_SUB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TABLE SUB DEPARTEMEN';

-- ----------------------------
-- Records of u0002bx
-- ----------------------------
INSERT INTO `u0002bx` VALUES ('AC-00', 'ACT', 'Accounting', '1', null, null, '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('BD-00', 'BDV', 'Business Development', '0', null, '', '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('DR-00', 'DRC', 'Owner', '0', null, null, '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('GM-00', 'GM', 'General Manager Operational', '0', null, '', '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('GM-01', 'GM', 'General Manager Bisnis', '0', null, null, '2', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('HR-00', 'HRD', 'HRD', '1', null, null, '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('HR-01', 'HRD', 'Legal', '0', null, null, '2', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('HR-02', 'HRD', 'General Affair', '1', null, null, '3', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-00', 'IT', 'IT', '0', null, null, '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-01', 'IT', 'DBE', '0', null, null, '2', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-02', 'IT', 'Scurity', '0', null, null, '3', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-03', 'IT', 'Analize', '0', null, null, '4', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-04', 'IT', 'Programer', '0', null, null, '5', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-05', 'IT', 'Network&Server', '0', null, null, '6', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-06', 'IT', 'Support', '0', null, null, '7', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('ITS-07', 'IT', 'Audit', '0', null, null, '8', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('OP-00', 'OPS', 'Operational', '0', null, '', '1', '', '', '2015-10-21 09:10:00');
INSERT INTO `u0002bx` VALUES ('SM-00', 'S&M', 'Sales', '0', null, '', '1', '', '', '2016-03-14 15:44:55');
INSERT INTO `u0002bx` VALUES ('SM-01', 'S&M', 'Marketing', '0', null, null, null, 'none', 'none', '2016-03-14 15:44:52');

-- ----------------------------
-- Table structure for `u0003bx`
-- ----------------------------
DROP TABLE IF EXISTS `u0003bx`;
CREATE TABLE `u0003bx` (
  `SEQ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEQ_NM` varchar(25) DEFAULT NULL,
  `SEQ_DCRP` text,
  `SORT` int(11) NOT NULL,
  `STATUS` smallint(6) NOT NULL DEFAULT '0',
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SEQ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Group Seqmen';

-- ----------------------------
-- Records of u0003bx
-- ----------------------------
INSERT INTO `u0003bx` VALUES ('1', 'Support', 'membantu kebutuhan bisnis', '1', '0', 'none', '', '2015-10-21 03:17:34');
INSERT INTO `u0003bx` VALUES ('2', 'Businis', 'mencapai target bisnis', '2', '0', 'none', '', '2015-10-21 03:17:39');

-- ----------------------------
-- Table structure for `u0003mx`
-- ----------------------------
DROP TABLE IF EXISTS `u0003mx`;
CREATE TABLE `u0003mx` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GF_ID` int(11) DEFAULT NULL,
  `SEQ_ID` int(11) NOT NULL,
  `JOBGRADE_ID` varchar(5) NOT NULL,
  `JOBGRADE_NM` varchar(100) DEFAULT NULL,
  `SORT` int(11) DEFAULT '0',
  `JOBGRADE_STS` int(11) NOT NULL DEFAULT '0',
  `JOBGRADE_DCRP` text,
  `CREATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_BY` varchar(50) NOT NULL DEFAULT 'none',
  `UPDATED_TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Modul JobsGrade kepangkatan- JABATAN';

-- ----------------------------
-- Records of u0003mx
-- ----------------------------
INSERT INTO `u0003mx` VALUES ('1', '2', '1', 'EVP', 'Executive  Vice President', '1', '0', 'adalah', '', 'admin', '2015-12-07 10:00:09');
INSERT INTO `u0003mx` VALUES ('2', '2', '1', 'SVP', 'Senior  Vice President', '2', '0', 'adalah sssss1 ddd', 'admin', 'admin', '2015-12-07 10:00:10');
INSERT INTO `u0003mx` VALUES ('3', '2', '1', 'VP', 'Vice President', '3', '0', 'adalah', '', 'admin', '2015-12-07 10:00:11');
INSERT INTO `u0003mx` VALUES ('4', '3', '1', 'AVP', 'Assistant Vice President', '4', '0', 'test', '', 'admin', '2015-12-07 09:57:08');
INSERT INTO `u0003mx` VALUES ('5', '3', '1', 'SM', 'Senior Manager', '5', '0', null, '', '', '2015-12-07 09:57:09');
INSERT INTO `u0003mx` VALUES ('6', '3', '1', 'M', 'Manager', '6', '0', null, '', '', '2015-12-07 09:57:10');
INSERT INTO `u0003mx` VALUES ('7', '4', '1', 'AM', 'Assistant Manager', '7', '0', null, '', '', '2015-12-07 09:57:12');
INSERT INTO `u0003mx` VALUES ('8', '4', '1', 'S', 'Supervisor', '8', '0', null, '', '', '2015-12-07 09:57:14');
INSERT INTO `u0003mx` VALUES ('9', '4', '1', 'SO', 'Senior Officer', '8', '0', null, '', '', '2015-12-07 09:57:17');
INSERT INTO `u0003mx` VALUES ('10', '5', '1', 'SO', 'Senior Officer', '10', '0', null, '', '', '2015-12-07 09:57:19');
INSERT INTO `u0003mx` VALUES ('11', '5', '1', 'O', 'Officer', '11', '0', null, 'none', 'none', '2015-12-07 09:57:21');
INSERT INTO `u0003mx` VALUES ('12', '5', '1', 'JO', 'Junior Officer', '12', '0', null, 'none', 'none', '2015-12-07 09:57:23');
INSERT INTO `u0003mx` VALUES ('13', '2', '2', 'SEVP', 'Senior Executive Vice President', '1', '0', null, '', '', '2015-12-07 09:52:07');
INSERT INTO `u0003mx` VALUES ('14', '2', '2', 'EVP', 'Executive Vice President', '2', '0', null, '', '', '2015-12-07 09:58:54');
INSERT INTO `u0003mx` VALUES ('15', '2', '2', 'SVP', 'Senior  Vice President', '3', '0', null, '', '', '2015-12-07 09:58:57');
INSERT INTO `u0003mx` VALUES ('16', '3', '2', 'SVP', 'Senior  Vice President', '4', '0', null, '', '', '2015-12-07 09:58:58');
INSERT INTO `u0003mx` VALUES ('17', '3', '2', 'VP', 'Vice President', '5', '0', null, '', '', '2015-12-07 09:59:43');
INSERT INTO `u0003mx` VALUES ('18', '3', '2', 'AVP', 'Assistant Vice President', '6', '0', null, '', '', '2015-12-07 09:59:44');
INSERT INTO `u0003mx` VALUES ('19', '4', '2', 'SM', 'Senior Manager', '7', '0', null, '', '', '2015-12-07 09:59:46');
INSERT INTO `u0003mx` VALUES ('20', '4', '2', 'M', 'Manager', '8', '0', null, '', '', '2015-12-07 09:59:49');
INSERT INTO `u0003mx` VALUES ('21', '4', '2', 'SPV', 'Supervisor', '9', '0', null, '', '', '2015-12-07 09:59:50');
INSERT INTO `u0003mx` VALUES ('22', '5', '2', 'SO', 'Senior Officer', '10', '0', null, '', '', '2015-12-07 09:59:51');
INSERT INTO `u0003mx` VALUES ('23', '5', '2', 'O', 'Officer', '11', '0', null, '', '', '2015-12-07 09:59:52');
INSERT INTO `u0003mx` VALUES ('24', '5', '2', 'JO', 'Junior Officer', '12', '0', null, '', '', '2015-12-07 09:59:54');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `EMP_ID` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `avatar` text COLLATE utf8_unicode_ci,
  `TEMPLATE` bigint(20) DEFAULT '0',
  `avatarImage` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'superadmin', 'azLSTAYr7Y7TLsEAML-LsVq9cAXLyAWa', '$2y$13$Pfi69D74WzIJBtcy8JddLuJhMO8poTcNZsKjvXGgSLA4ruTA0AASC', null, 'admin@lukison.com', '10', '1431765676', '1431765676', '1.1215.1227', ' Yii::getAlias(\"@vendor/sintret/yii2-chat-adminlte/assets/img/avatar.png\");', '2', ' Yii::getAlias(\"@vendor/sintret/yii2-chat-adminlte/assets/img/avatar.png\");');
INSERT INTO `user` VALUES ('2', 'support', 'Uv-9xj_BA3sFvZbDOTRE19P_6Ki-0Fw9', '$2y$13$xOJzTYsgB5TwpKm928b.TOYG5J9dLl6rvBBh6KnDcfTm7Us3L9ObG', null, 'piter@lukison.com', '10', '1431766262', '1431766262', '1.1215.1227', null, '2', null);
INSERT INTO `user` VALUES ('3', 'admin', '5tj3p0tIpVEOVDEAsVzzsHCv29g_GFhU', '$2y$13$tzacpGyZhzACFFtklAq7iuyr08NuiVX4LFRzrjPj4QiOCO9qkVYq2', null, 'devandro@lukison.com', '10', '1431963597', '1431963597', '0.0000.0000', null, '2', null);
INSERT INTO `user` VALUES ('4', 'it', '5tj3p0tIpVEOVDEAsVzzsHCv29g_GFhU', '$2y$13$xgjcyOHkzIl4pJNsPUo/euIAkq7F8qChcKl5TwVXYI8S5JRnTDn12', null, 'indri@lukison.com', '10', '1436148436', '1436148436', '1.1215.1227', null, '0', null);

-- ----------------------------
-- Procedure structure for `absensi_calender`
-- ----------------------------
DROP PROCEDURE IF EXISTS `absensi_calender`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `absensi_calender`(IN periode varchar(20),IN dateClose Datetime)
BEGIN
#================================================
#==					ADMS CONVERT REKAP								===
#== personallog_inout RIGHT JOIN kar_finger		===
#== @author ptrnov [ptr.nov@gmail.com]  			===
#== @since 1.2                          			===
#================================================

	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000; #Panjang String GROUP_CONCAT
  #VARIABLE SUPPORT  -ptr.nov-
	SET @sqlRslt = NULL;
	SET @sqlText = NULL;

	IF periode = 'bulan' THEN 
		#----------------------------
		#--   	PERIODE BULAN  		---
		#-- 'bulan','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)MONTH + INTERVAL(1)DAY;
  ELSEIF periode = 'minggu' THEN 
		#----------------------------
		#--   	PERIODE MINGGU   	---
		#-- 'minggu','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)WEEK + INTERVAL(1)DAY;
	  #SET @tglold = @tgllast-INTERVAL(1)WEEK - INTERVAL(1)DAY;
	END IF;
		
	#SELECT DATE RANGE @tglold, @tgllast
	DROP TEMPORARY TABLE IF EXISTS Range_Tgl;
	CREATE TEMPORARY TABLE Range_Tgl as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tgllast - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglold and @tgllast ORDER BY a.Date
	);

	#SPLIT FunctionKey BY DATE;
	SELECT
		GROUP_CONCAT(DISTINCT
			 # CHECK IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=0",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'IN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # CHECK OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='1'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"					
			 ),
			 # LEMBUR IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=4",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTIN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # LEMBUR OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='5'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTOUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"'	"					
			 )
		)	
	INTO @sqlText
	from Range_Tgl;	
	#SELECT @sqlText;
	
	#SELECT *,@sqlText FROM personallog_inout T1;
	#------------------------------------------
	#--   		CALENDER RESULT			 					---
	#-- IN|OUT|OTIN|OTOUT					 					---
	#-- personallog_inout VS kar_finger  		---
	#-- IDEAL 															---
	#-- personallog_inout IN|OUT|OTIN|OTOUT	---
	#-- T1.userid=T2.FingerPrintID 					---
	#------------------------------------------
	SET @sqlRslt = CONCAT('SELECT T1.TerminalID,T2.EMP_NM,',@sqlText,' 
												 FROM personallog_inout T1 RIGHT JOIN
														(	SELECT x1.TerminalID,x1.FingerPrintID,
																		 x2.KAR_ID,CONCAT(x2.KAR_NM) AS EMP_NM
															FROM kar_finger x1 Left Join karyawan x2 on x2.KAR_ID=x1.KAR_ID
														) T2 ON T1.userid=T2.FingerPrintID AND T1.TerminalID=T2.TerminalID
												 WHERE T1.userid<>'' AND T2.FingerPrintID <>'' AND T1.TerminalID<>'' AND T2.TerminalID<>''
												 GROUP BY T2.KAR_ID
											');
	#SELECT  @sqlRslt;

	#CREATE TEMPORARY TABLE CALENDER_RESULT
	DROP TEMPORARY TABLE IF EXISTS CALENDER_RESULT;
	SET @tmpTbl =CONCAT("CREATE TEMPORARY TABLE CALENDER_RESULT as (",@sqlRslt," )");
	#SELECT  @tmpTbl;
	
  #EXECUTE MYSQL STMT
	PREPARE stmt FROM @tmpTbl; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

	SELECT * FROM CALENDER_RESULT;



	#--------------------------------
	#--   	REFRENCE TABLE				---
	#-- userid=FingerPrintID			---
	#-- AND TerminalID=TerminalID	---
	#--------------------------------
  #CREATE TABLE `personallog_inout` (
  #`idno` bigint(20) NOT NULL AUTO_INCREMENT,
  #`TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  #`UserID` varchar(50) DEFAULT NULL,
  #`FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  #`Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  #`UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  #`FlagAbsence` varchar(100) DEFAULT NULL,
  #`DateTime` datetime DEFAULT NULL,
  #`tgl` date DEFAULT NULL,
  #`waktu` time DEFAULT NULL,
  #PRIMARY KEY (`idno`)
	#) ENGINE=InnoDB AUTO_INCREMENT=4596425 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';
	
	#CREATE TABLE `kar_finger` (
	#	`NO_URUT` bigint(20) NOT NULL AUTO_INCREMENT,
	#	`TerminalID` varchar(100) DEFAULT NULL,
	#	`KAR_ID` varchar(15) DEFAULT NULL,
	#	`FingerPrintID` varchar(100) DEFAULT NULL, 
	#	`FingerTmpl` longtext,
	#	`UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	#	PRIMARY KEY (`NO_URUT`)
	#) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `absensi_calender_ot`
-- ----------------------------
DROP PROCEDURE IF EXISTS `absensi_calender_ot`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `absensi_calender_ot`(IN periode varchar(20),IN dateClose Datetime)
BEGIN
#================================================
#==					ADMS CONVERT REKAP								===
#== personallog_ot RIGHT JOIN kar_finger			===
#== @author ptrnov [ptr.nov@gmail.com]  			===
#== @since 1.2                          			===
#================================================

	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000; #Panjang String GROUP_CONCAT
  #VARIABLE SUPPORT  -ptr.nov-
	SET @sqlRslt = NULL;
	SET @sqlText = NULL;

	IF periode = 'bulan' THEN 
		#----------------------------
		#--   	PERIODE BULAN  		---
		#-- 'bulan','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)MONTH + INTERVAL(1)DAY;
  ELSEIF periode = 'minggu' THEN 
		#----------------------------
		#--   	PERIODE MINGGU   	---
		#-- 'minggu','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)WEEK + INTERVAL(1)DAY;
	  #SET @tglold = @tgllast-INTERVAL(1)WEEK - INTERVAL(1)DAY;
	END IF;
		
	#SELECT DATE RANGE @tglold, @tgllast
	DROP TEMPORARY TABLE IF EXISTS Range_Tgl;
	CREATE TEMPORARY TABLE Range_Tgl as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tgllast - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglold and @tgllast ORDER BY a.Date
	);

	#SPLIT FunctionKey BY DATE;
	SELECT
		GROUP_CONCAT(DISTINCT
			 # CHECK IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=0",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'IN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # CHECK OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='1'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"					
			 ),
			 # LEMBUR IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=4",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTIN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # LEMBUR OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='5'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTOUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"'	"					
			 )
		)	
	INTO @sqlText
	from Range_Tgl;	
	#SELECT @sqlText;
	
	#SELECT *,@sqlText FROM personallog_ot T1;
	#------------------------------------------
	#--   		CALENDER RESULT			 					---
	#-- IN|OUT|OTIN|OTOUT					 					---
	#-- personallog_ot VS kar_finger  			---
	#-- IDEAL 															---
	#-- personallog_ot IN|OUT|OTIN|OTOUT		---
	#-- T1.userid=T2.FingerPrintID 					---
	#------------------------------------------
	SET @sqlRslt = CONCAT('SELECT T1.TerminalID,T2.EMP_NM,',@sqlText,' 
												 FROM personallog_ot T1 RIGHT JOIN
														(	SELECT x1.TerminalID,x1.FingerPrintID,
																		 x2.KAR_ID,CONCAT(x2.KAR_NM) AS EMP_NM
															FROM kar_finger x1 Left Join karyawan x2 on x2.KAR_ID=x1.KAR_ID
														) T2 ON T1.userid=T2.FingerPrintID AND T1.TerminalID=T2.TerminalID
												 WHERE T1.userid<>'' AND T2.FingerPrintID <>'' AND T1.TerminalID<>'' AND T2.TerminalID<>''
												 GROUP BY T2.KAR_ID
											');
	#SELECT  @sqlRslt;

	#CREATE TEMPORARY TABLE CALENDER_RESULT
	DROP TEMPORARY TABLE IF EXISTS CALENDER_RESULT;
	SET @tmpTbl =CONCAT("CREATE TEMPORARY TABLE CALENDER_RESULT as (",@sqlRslt," )");
	#SELECT  @tmpTbl;
	
  #EXECUTE MYSQL STMT
	PREPARE stmt FROM @tmpTbl; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

	SELECT * FROM CALENDER_RESULT;



	#--------------------------------
	#--   	REFRENCE TABLE				---
	#-- userid=FingerPrintID			---
	#-- AND TerminalID=TerminalID	---
	#--------------------------------
  #CREATE TABLE `personallog_ot` (
  #`idno` bigint(20) NOT NULL AUTO_INCREMENT,
  #`TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  #`UserID` varchar(50) DEFAULT NULL,
  #`FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  #`Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  #`UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  #`FlagAbsence` varchar(100) DEFAULT NULL,
  #`DateTime` datetime DEFAULT NULL,
  #`tgl` date DEFAULT NULL,
  #`waktu` time DEFAULT NULL,
  #PRIMARY KEY (`idno`)
	#) ENGINE=InnoDB AUTO_INCREMENT=4596425 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';
	
	#CREATE TABLE `kar_finger` (
	#	`NO_URUT` bigint(20) NOT NULL AUTO_INCREMENT,
	#	`TerminalID` varchar(100) DEFAULT NULL,
	#	`KAR_ID` varchar(15) DEFAULT NULL,
	#	`FingerPrintID` varchar(100) DEFAULT NULL, 
	#	`FingerTmpl` longtext,
	#	`UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	#	PRIMARY KEY (`NO_URUT`)
	#) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `absensi_calender_user`
-- ----------------------------
DROP PROCEDURE IF EXISTS `absensi_calender_user`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `absensi_calender_user`(IN periode varchar(20),IN dateClose Datetime,IN USER_ID_IN varchar(200))
BEGIN
#================================================
#==					ADMS CONVERT REKAP								===
#== personallog_inout RIGHT JOIN kar_finger		===
#== @author ptrnov [ptr.nov@gmail.com]  			===
#== @since 1.2                          			===
#================================================

	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000; #Panjang String GROUP_CONCAT
  #VARIABLE SUPPORT  -ptr.nov-
	SET @sqlRslt = NULL;
	SET @sqlText = NULL;
	SET @EMP_ID=(SELECT GET_EMPLOYE_ID(USER_ID_IN));
  SET @kondisiWhere ='';
			IF @EMP_ID<>'' THEN 
					SET @kondisiWhere=CONCAT("T1.userid<>'' AND T2.FingerPrintID <>'' AND T1.TerminalID<>'' AND T2.TerminalID<>'' AND T2.EMP_ID=","'",@EMP_ID,"'");
			ELSE
					SET @kondisiWhere="T1.userid<>'' AND T2.FingerPrintID <>'' AND T1.TerminalID<>'' AND T2.TerminalID<>''";
			END IF;


	IF periode = 'bulan' THEN 
		#------------------------------------------
		#--('periode','dateClose','USER_ID_IN') ---
		#-- PERIODE BULAN  											---
		#-- 'bulan','2016-03-22','2'						---
		#------------------------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)MONTH + INTERVAL(1)DAY;
  ELSEIF periode = 'minggu' THEN 
		#----------------------------
		#--   	PERIODE MINGGU   	---
		#-- 'minggu','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)WEEK + INTERVAL(1)DAY;
	  #SET @tglold = @tgllast-INTERVAL(1)WEEK - INTERVAL(1)DAY;
	END IF;
		
	#SELECT DATE RANGE @tglold, @tgllast
	DROP TEMPORARY TABLE IF EXISTS Range_Tgl;
	CREATE TEMPORARY TABLE Range_Tgl as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tgllast - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglold and @tgllast ORDER BY a.Date
	);

	#SPLIT FunctionKey BY DATE;
	SELECT
		GROUP_CONCAT(DISTINCT
			 # CHECK IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=0",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'IN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # CHECK OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='1'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"					
			 ),
			 # LEMBUR IN
			 CONCAT(
					"MIN(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey=4",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTIN.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"',"												
			 ),
			 # LEMBUR OUT
		   CONCAT(
					"max(CASE WHEN DATE_FORMAT(T1.DateTime,'%Y-%m-%d') = '",
					DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"' and T1.FunctionKey='5'",
					" THEN date_format(T1.DateTime,'%H:%i') END) AS '",'OTOUT.',DATE_FORMAT(TGL_RUN,'%Y-%m-%d'),"'	"					
			 )
		)	
	INTO @sqlText
	from Range_Tgl;	
	#SELECT @sqlText;
	
	#SELECT *,@sqlText FROM personallog_inout T1;
	#------------------------------------------
	#--   		CALENDER RESULT			 					---
	#-- IN|OUT|OTIN|OTOUT					 					---
	#-- personallog_inout VS kar_finger  		---
	#-- IDEAL 															---
	#-- personallog_inout IN|OUT|OTIN|OTOUT	---
	#-- T1.userid=T2.FingerPrintID 					---
	#------------------------------------------
	#'bulan','2016-03-22','2'	
	SET @sqlRslt = CONCAT('SELECT T1.TerminalID,T2.EMP_NM,T2.EMP_ID,',@sqlText,' 
												 FROM personallog_inout T1 RIGHT JOIN
														(	SELECT x1.TerminalID,x1.FingerPrintID,
																		 x2.EMP_ID,CONCAT(x2.EMP_NM," ",x2.EMP_NM_BLK) AS EMP_NM
															FROM kar_finger x1 Left Join a0001 x2 on x2.EMP_ID=x1.KAR_ID
														) T2 ON T1.userid=T2.FingerPrintID AND T1.TerminalID=T2.TerminalID
												 ',' WHERE ',@kondisiWhere,' 
												 GROUP BY T2.EMP_ID
											');
	#T1.userid<>'' AND T2.FingerPrintID <>'' AND T1.TerminalID<>'' AND T2.TerminalID<>'' @pilihUser
	#SELECT  @sqlRslt;

	#CREATE TEMPORARY TABLE CALENDER_RESULT
	DROP TEMPORARY TABLE IF EXISTS CALENDER_RESULT;
	SET @tmpTbl =CONCAT("CREATE TEMPORARY TABLE CALENDER_RESULT as (",@sqlRslt," )");
	#SELECT  @tmpTbl;
	
  #EXECUTE MYSQL STMT
	PREPARE stmt FROM @tmpTbl; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

	SELECT * FROM CALENDER_RESULT;
	SELECT @kondisiWhere;


	#--------------------------------
	#--   	REFRENCE TABLE				---
	#-- userid=FingerPrintID			---
	#-- AND TerminalID=TerminalID	---
	#--------------------------------
  #CREATE TABLE `personallog_inout` (
  #`idno` bigint(20) NOT NULL AUTO_INCREMENT,
  #`TerminalID` varchar(100) DEFAULT NULL COMMENT 'Terminal Number',
  #`UserID` varchar(50) DEFAULT NULL,
  #`FunctionKey` varchar(15) DEFAULT NULL COMMENT 'Attendance Falg, 0 = Check In, 1 = Check Out, 2 = Out, 3 = Back, 7 = No Function Key',
  #`Edited` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Time Log Edited',
  #`UserName` varchar(100) DEFAULT NULL COMMENT 'User Name Log Edited',
  #`FlagAbsence` varchar(100) DEFAULT NULL,
  #`DateTime` datetime DEFAULT NULL,
  #`tgl` date DEFAULT NULL,
  #`waktu` time DEFAULT NULL,
  #PRIMARY KEY (`idno`)
	#) ENGINE=InnoDB AUTO_INCREMENT=4596425 DEFAULT CHARSET=latin1 COMMENT='checkinout<>userinfo';
	
	#CREATE TABLE `kar_finger` (
	#	`NO_URUT` bigint(20) NOT NULL AUTO_INCREMENT,
	#	`TerminalID` varchar(100) DEFAULT NULL,
	#	`KAR_ID` varchar(15) DEFAULT NULL,
	#	`FingerPrintID` varchar(100) DEFAULT NULL, 
	#	`FingerTmpl` longtext,
	#	`UPDT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	#	PRIMARY KEY (`NO_URUT`)
	#) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `absensi_log`
-- ----------------------------
DROP PROCEDURE IF EXISTS `absensi_log`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `absensi_log`(IN periode varchar(10),IN dateClose Datetime)
    COMMENT 'DATA LOG FINGER-EMPLOYE->FIND EMP_NM'
BEGIN
#==========================================
#==					ADMS CONVERT LOG ALL				===
#== PERSONAL-LOG LEFT JOIN kar_finger		===
#== kar_finger EDITING userID|KAR_ID		===
#== @author ptrnov [ptr.nov@gmail.com]  ===
#== @since 1.2                          ===
#==========================================
  IF periode = 'bulan' THEN 
		#----------------------------
		#--   	PERIODE BULAN  		---
		#-- 'bulan','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)MONTH + INTERVAL(1)DAY;
  ELSEIF periode = 'minggu' THEN 
		#----------------------------
		#--   	PERIODE MINGGU   	---
		#-- 'minggu','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)WEEK + INTERVAL(1)DAY;
	  #SET @tglold = @tgllast-INTERVAL(1)WEEK - INTERVAL(1)DAY;
	END IF;


	SELECT X.idno,X.TerminalID,X.UserID,X.FunctionKey,X.Edited,X.FlagAbsence,X.DateTime,X.DateTime as DateTimeLate,X.tgl,X.waktu,
			 X.UserName,Y.EMP_NM
	FROM personallog X LEFT JOIN 
			(	SELECT x1.TerminalID,x1.FingerPrintID,
					 x2.EMP_ID,CONCAT(x2.EMP_NM," ",x2.EMP_NM_BLK) AS EMP_NM
				FROM kar_finger x1 Left Join a0001 x2 on x2.EMP_ID=x1.KAR_ID
			) Y ON Y.FingerPrintID=X.UserID AND X.TerminalID=Y.TerminalID
	WHERE X.TerminalID<>'' AND X.DateTime BETWEEN  @tglold and @tgllast ORDER BY X.DateTime;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `absensi_maintain`
-- ----------------------------
DROP PROCEDURE IF EXISTS `absensi_maintain`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `absensi_maintain`()
    COMMENT 'DATA LOG FINGER-EMPLOYE->FIND EMP_NM'
BEGIN
	SELECT X.idno,X.TerminalID,X.UserID,X.FunctionKey,X.Edited,X.FlagAbsence,X.DateTime,X.DateTime as DateTimeLate,X.tgl,X.waktu,
			 X.UserName,Y.NAMA
	FROM personallog X LEFT JOIN
	(	SELECT A.TerminalID,A.FingerPrintID,CONCAT(B.KAR_NM) AS NAMA 
		FROM kar_finger A LEFT JOIN Karyawan B ON B.KAR_ID=A.KAR_ID) Y 
	ON Y.FingerPrintID=X.UserID AND X.TerminalID=Y.TerminalID
	WHERE X.TerminalID<>''
	GROUP BY X.UserID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `CHEDULE RUN``CHEDULE RUN``CHEDULE RUN``CHEDULE RUN`
-- ----------------------------
DROP PROCEDURE IF EXISTS `CHEDULE RUN``CHEDULE RUN``CHEDULE RUN``CHEDULE RUN`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CHEDULE RUN``CHEDULE RUN``CHEDULE RUN``CHEDULE RUN`()
BEGIN
		#conf add mysql.ini
	#--event-scheduler=ON

SET GLOBAL event_scheduler = OFF;
SET @@global.event_scheduler = OFF;
SET GLOBAL event_scheduler = 0;
SET @@global.event_scheduler = 0;

SET GLOBAL event_scheduler = ON;
SET @@global.event_scheduler = ON;
SET GLOBAL event_scheduler = 1;
SET @@global.event_scheduler = 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `CHEDULE_personallog`
-- ----------------------------
DROP PROCEDURE IF EXISTS `CHEDULE_personallog`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CHEDULE_personallog`(IN menu int,IN IntervalDay int)
BEGIN
#==========================================
#== CRONJOB PERSONAL-LOG                ===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
# RUN IN EVENTS : Schadule-Personallog
SET @intervalHari=IntervalDay;
SET @Menu=menu;
	#'0','1'
	IF @Menu=0 THEN
    #----------------------------------
    #----Personal log IMPORT ONLINE ---
    #----------------------------------
		DELETE FROM personallog 
		WHERE (Edited is null) AND FlagAbsence='Online' 
					AND (date(DateTime) BETWEEN  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());

		INSERT INTO personallog(TerminalID,UserID,FunctionKey,username,FlagAbsence,DateTime,tgl,waktu)
		#SELECT A.SN,A.userid,B.badgenumber,
		#				(Case When A.checktype="I" THEN 0 ELSE (
		#				 Case When A.checktype="O" THEN 1 Else A.checktype END)
		#				END) AS checktype,
		#				B.name,"Online",A.checktime,date(A.checktime),time(A.checktime)
		#FROM checkinout A LEFT JOIN userinfo B on CONVERT(B.userid, SIGNED INTEGER)=CONVERT(A.userid, SIGNED INTEGER)
		#WHERE A.userid<>'' AND (A.verifycode=1) AND
		#			(date(A.checktime) between  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());
		SELECT 
			x2.SN AS TerminalID,x2.userid,
			(Case When x1.checktype="I" THEN 0 ELSE (
			 Case When x1.checktype="O" THEN 1 Else x1.checktype END)
			END) AS checktype,
			x2.name as NAMA,"Online",x1.checktime,date(x1.checktime),time(x1.checktime)
		FROM checkinout x1 LEFT JOIN userinfo x2 ON x1.userid=x2.userid AND x1.SN=x2.SN
		WHERE x1.userid<>'' AND x2.SN<>'' AND #AND (x1.verifycode=1) 
				(date(x1.checktime) between  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());
END IF;

	IF @Menu=1 THEN
		#---------------------------------------
    #----Personal log IMPORT USB -----------
		#----- IMPORT LANGSUNG DARI FILE TEXT --
    #---------------------------------------		
		DELETE FROM personallog 
		WHERE (Edited is null) AND FlagAbsence='USB' 
					AND (date(DateTime) between  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());
		INSERT INTO personallog(TerminalID,UserID,FunctionKey,username,FlagAbsence,DateTime,tgl,waktu)
			SELECT DISTINCT TerminalID, FingerPrintID,FunctionKey,'USB',DateTime,date(DateTime),time(DateTime)
			FROM tab_personal_log_usb
			WHERE (date(DateTime) BETWEEN  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());
	END IF;
#'ONLINE',0
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `CHEDULE_personallog_inout`
-- ----------------------------
DROP PROCEDURE IF EXISTS `CHEDULE_personallog_inout`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CHEDULE_personallog_inout`(IN menu int,IN IntervalDay int)
BEGIN
#==========================================
#== CRONJOB personallog_inout        		===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
# RUN IN EVENTS : Schadule-Personallog-filter
SET @intervalHari=IntervalDay;
SET @Menu=menu;
#'0','1'
	IF @Menu=0 THEN
		DELETE FROM personallog_inout 
		WHERE (Edited is null) AND FlagAbsence='Online' 
					AND (date(DateTime) BETWEEN  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());

		INSERT INTO personallog_inout(TerminalID,UserID,FunctionKey,username,FlagAbsence,DateTime,tgl,waktu)
			SELECT x1.TerminalID,x1.UserID,x1.FunctionKey,x1.username,x1.FlagAbsence,
					 (CASE WHEN x1.FunctionKey=0 AND  x1.UserID=x2.FingerPrintID THEN MIN(x1.DateTime) 
						ELSE (CASE WHEN x1.FunctionKey=1 THEN MAX(x1.DateTime) END)						
						END ) as DateTime,
           (CASE WHEN x1.FunctionKey=0 THEN date(MIN(x1.DateTime)) 
						ELSE (CASE WHEN x1.FunctionKey=1 THEN date(MAX(x1.DateTime)) END)						
						END )  as tgl,
           (CASE WHEN x1.FunctionKey=0 THEN time(MIN(x1.DateTime)) 
						ELSE (CASE WHEN x1.FunctionKey=1 THEN time(MAX(x1.DateTime)) END)						
						END )  as waktu
		FROM personallog x1 INNER JOIN kar_finger x2 ON x1.UserID=x2.FingerPrintID
		WHERE (date(x1.DateTime) between  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE()) AND (x1.FunctionKey=0 OR x1.FunctionKey=1)
		GROUP BY x1.UserID,date(x1.DateTime),x1.FunctionKey;		
	END IF;

	#CHECK QUERY
	#SELECT x1.TerminalID,x1.UserID,x1.FunctionKey,x1.username,x1.FlagAbsence,
	#				 (CASE WHEN x1.FunctionKey=0 AND  x1.UserID=x2.FingerPrintID THEN MIN(x1.DateTime) 
	#					ELSE (CASE WHEN x1.FunctionKey=1 THEN MAX(x1.DateTime) END)						
	#					END ) as DateTime,
  #         (CASE WHEN x1.FunctionKey=0 THEN date(MIN(x1.DateTime)) 
	#					ELSE (CASE WHEN x1.FunctionKey=1 THEN date(MAX(x1.DateTime)) END)						
	#					END )  as tgl,
  #         (CASE WHEN x1.FunctionKey=0 THEN time(MIN(x1.DateTime)) 
	#					ELSE (CASE WHEN x1.FunctionKey=1 THEN time(MAX(x1.DateTime)) END)						
	#					END )  as waktu,
	#					x1.DateTime as tanggal,
	#					x1.waktu as jam
	#	FROM personallog x1 INNER JOIN kar_finger x2 ON x1.UserID=x2.FingerPrintID
	#	WHERE (date(x1.DateTime) between  SUBDATE(CURDATE(),INTERVAL 4 day) AND CURDATE()) AND (x1.FunctionKey=0 OR x1.FunctionKey=1)
	#	GROUP BY x1.UserID,date(x1.DateTime),x1.FunctionKey;



END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `CHEDULE_personallog_ot`
-- ----------------------------
DROP PROCEDURE IF EXISTS `CHEDULE_personallog_ot`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CHEDULE_personallog_ot`(IN menu int,IN IntervalDay int)
BEGIN
#==========================================
#== CRONJOB personallog_inout        		===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
# RUN IN EVENTS : Schadule-Personallog-filter
SET @intervalHari=IntervalDay;
SET @Menu=menu;
#'0','1'
	IF @Menu=0 THEN
		DELETE FROM personallog_ot
		WHERE (Edited is null) AND FlagAbsence='Online' 
					AND (date(DateTime) BETWEEN  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE());

		INSERT INTO personallog_ot(TerminalID,UserID,FunctionKey,username,FlagAbsence,DateTime,tgl,waktu)
		SELECT x1.TerminalID,x1.UserID,x1.FunctionKey,x1.username,x1.FlagAbsence,
					 (CASE WHEN x1.FunctionKey=4 THEN MIN(x1.DateTime) 
						ELSE (CASE WHEN x1.FunctionKey=5 THEN MAX(x1.DateTime) END)						
						END ) as DateTime,
           (CASE WHEN x1.FunctionKey=4 THEN date(MIN(x1.DateTime)) 
						ELSE (CASE WHEN x1.FunctionKey=5 THEN date(MAX(x1.DateTime)) END)						
						END )  as tgl,
           (CASE WHEN x1.FunctionKey=4 THEN time(MIN(x1.DateTime)) 
						ELSE (CASE WHEN x1.FunctionKey=5 THEN time(MAX(x1.DateTime)) END)						
						END )  as waktu
		FROM personallog x1 INNER JOIN kar_finger x2 ON x1.UserID=x2.FingerPrintID
		WHERE (date(x1.DateTime) between  SUBDATE(CURDATE(),INTERVAL @intervalHari day) AND CURDATE()) AND (x1.FunctionKey=4 OR x1.FunctionKey=5)
		GROUP BY x1.UserID,date(x1.DateTime),x1.FunctionKey;	
	END IF;

	#CHECK QUERY
	#SELECT x1.TerminalID,x1.UserID,x1.FunctionKey,x1.username,x1.FlagAbsence,
	#				 (CASE WHEN x1.FunctionKey=4 THEN MIN(x1.DateTime) 
	#					ELSE (CASE WHEN x1.FunctionKey=5 THEN MAX(x1.DateTime) END)						
	#					END ) as DateTime,
  #         (CASE WHEN x1.FunctionKey=4 THEN date(MIN(x1.DateTime)) 
	#					ELSE (CASE WHEN x1.FunctionKey=5 THEN date(MAX(x1.DateTime)) END)						
	#					END )  as tgl,
  #         (CASE WHEN x1.FunctionKey=4 THEN time(MIN(x1.DateTime)) 
	#					ELSE (CASE WHEN x1.FunctionKey=5 THEN time(MAX(x1.DateTime)) END)						
	#					END )  as waktu,
	#					x1.DateTime as tanggal,
	#					x1.waktu as jam
	#	FROM personallog x1 INNER JOIN kar_finger x2 ON x1.UserID=x2.FingerPrintID
	#	WHERE (date(x1.DateTime) between  SUBDATE(CURDATE(),INTERVAL 4 day) AND CURDATE()) AND (x1.FunctionKey=4 OR x1.FunctionKey=5)
	#	GROUP BY x1.UserID,date(x1.DateTime),x1.FunctionKey;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `filter_formula`
-- ----------------------------
DROP PROCEDURE IF EXISTS `filter_formula`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_formula`(IN IN_TGL date,IN IN_WAKTU time, IN OUT_TGL date, IN OUT_WAKTU time)
BEGIN
	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
  #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	OPEN field_cursor;	 
		GET_PERULANGAN: LOOP
				
				FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
				IF fnsh THEN 
					LEAVE GET_PERULANGAN;
				END IF;
        SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
				SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
				SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
				#SPLIT TIME TABLE NORMAL
				IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN
				  
					#HARIAN SOPIR
					IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
							SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
					END IF;
					#HARIAN PEKERJA LUAR
					IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
							SET @harian=@harian+IN_FOT_PERSEN;
					END IF;
				END IF;

				#SPLIT TIME TABLE OT
				IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
							 SET @ot=@ot+IN_FOT_PERSEN;
				END IF;
		END LOOP;
	CLOSE field_cursor;
				
  #SELECT @sopirOb,@harian,@ot;
  


#SELECT @tglRule;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `MANUAL_personallogl_ByDate`
-- ----------------------------
DROP PROCEDURE IF EXISTS `MANUAL_personallogl_ByDate`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MANUAL_personallogl_ByDate`(IN periode varchar(20),IN dateClose Datetime)
BEGIN
#==========================================
#== MANUAL  PERSONAL-LOG                ===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
	IF periode = 'bulan' THEN 
		#----------------------------
		#--   	PERIODE BULAN  		---
		#-- 'bulan','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)MONTH + INTERVAL(1)DAY;
  ELSEIF periode = 'minggu' THEN 
		#----------------------------
		#--   	PERIODE MINGGU   	---
		#-- 'minggu','2016-03-22'	---
		#----------------------------
		SET @tgllast = dateClose ;
		SET @tglold = @tgllast-INTERVAL(1)WEEK + INTERVAL(1)DAY;
	  #SET @tglold = @tgllast-INTERVAL(1)WEEK - INTERVAL(1)DAY;
	END IF;

	#DELETE BETWEEN DATE RANGE
	DELETE FROM personallog 
	WHERE (Edited is null) AND FlagAbsence='Online' 
				AND date(DateTime) BETWEEN  @tglold and @tgllast;

	#INSERT BETWEEN DATE RANGE
	INSERT INTO personallog(TerminalID,UserID,FunctionKey,username,FlagAbsence,DateTime,tgl,waktu)

	#SELECT BETWEEN DATE RANGE
	SELECT 
			x2.SN AS TerminalID,x2.userid,
			(Case When x1.checktype="I" THEN 0 ELSE (
			 Case When x1.checktype="O" THEN 1 Else x1.checktype END)
			END) AS checktype,
			x2.name as NAMA,"Online",x1.checktime,date(x1.checktime),time(x1.checktime)
	FROM checkinout x1 LEFT JOIN userinfo x2 ON x1.userid=x2.userid AND x1.SN=x2.SN
	WHERE date(x1.checktime) BETWEEN  @tglold and @tgllast ORDER BY x1.checktime;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `MANUAL_personallogusb`
-- ----------------------------
DROP PROCEDURE IF EXISTS `MANUAL_personallogusb`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MANUAL_personallogusb`(IN AryDataUSB varchar(255))
BEGIN
#==========================================
#== MANUAL  PERSONAL-LOG   USB          ===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
SET @TID=(SELECT getsplit1(AryDataUSB ,'=',1));
SET @FID=(SELECT getsplit1(AryDataUSB ,'=',2));
SET @FKey=(SELECT getsplit1(AryDataUSB ,'=',3));
SET @DT=(SELECT getsplit1(AryDataUSB ,'=',4));

	INSERT INTO tab_personal_log_USB (TerminalID, FingerPrintID,FunctionKey,DateTime,FlagAbsence)
	VALUES (@TID,@FID,@FKey,@DT,'USB');
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_EXCEL`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_EXCEL`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_EXCEL`(IN TGL_START DATE, IN TGL_END DATE)
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END;
  #PARAMETER'2017-07-20','2017-07-20'
	DROP TEMPORARY TABLE IF EXISTS periode_excel;
	CREATE TEMPORARY TABLE periode_excel as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' AND (STT_LEMBUR=1 OR STT_LEMBUR=0 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8) THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' AND x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_excel) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.KAR_NM,x2.MESIN_NM AS CABANG,x2.DEP_NM AS DEPARTMENT,x2.PAY_DAY AS UPAH_HARIAN,
				#CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as PERIODE_MULAI,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as PERIODE_AKHIR, 
        #PEMASUKAN TTL PAGI DAN OT
         #sum(x2.VAL_PAGI) as PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.VAL_PAGI ELSE 0 END) as PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS  LEMBUR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 #SUM(x2.PAY_PAGI) as TTL_PAGI, 
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI ELSE 0 END) as TTL_PAGI,
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE '0' END) AS  TTL_LEMBUR, 
        #POTOGAN
				 #(sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN,
         #sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POT_TELAT,
         sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POT_TELAT,
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END)	-
         (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) AS POT_DIVISI,
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 #SUM(x2.PAY_PAGI) + 
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI ELSE 0 END) +
         #SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) +  
				 (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) +
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TOTAL
         
	FROM (
				SELECT * FROM	absen_import 
				WHERE (IN_TGL BETWEEN @tglStart AND @tglEnd) AND STATUS=2
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.MESIN_NM ASC,x2.KAR_ID ASC,x2.DEP_NM ASC
");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_EXCEL_LIST`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_EXCEL_LIST`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_EXCEL_LIST`(IN TGL_START DATE, IN TGL_END DATE)
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END;
  #PARAMETER'2017-07-20','2017-07-20'
	DROP TEMPORARY TABLE IF EXISTS periode_excel;
	CREATE TEMPORARY TABLE periode_excel as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' AND (STT_LEMBUR=1 OR STT_LEMBUR=0 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8) THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' AND x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_excel) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.KAR_NM,x2.MESIN_NM AS CABANG,x2.DEP_NM AS DEPARTMENT,x2.PAY_DAY AS UPAH_HARIAN,
				#CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as PERIODE_MULAI,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as PERIODE_AKHIR, 
        #PEMASUKAN TTL PAGI DAN OT
         #sum(x2.VAL_PAGI) as PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.VAL_PAGI ELSE 0 END) as PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS  LEMBUR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 #SUM(x2.PAY_PAGI) as TTL_PAGI, 
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI ELSE 0 END) as TTL_PAGI,
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE '0' END) AS  TTL_LEMBUR, 
        #POTOGAN
				 #(sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN,
         #sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POT_TELAT,
         sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POT_TELAT,
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END)	-
         (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) AS POT_DIVISI,
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 #SUM(x2.PAY_PAGI) + 
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI ELSE 0 END) +
         #SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) +  
				 (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) +
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TOTAL
         
	FROM (
				SELECT * FROM	absen_import 
				WHERE (IN_TGL BETWEEN @tglStart AND @tglEnd) AND STATUS=1
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.MESIN_NM ASC,x2.KAR_ID ASC,x2.DEP_NM ASC
");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_PAID`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_PAID`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_PAID`(IN TGL_START DATE, IN TGL_END DATE)
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END ;
  #PARAMETER('2017-09-08','2017-09-14')
	# ('2017-07-20','2017-07-20','1')
	DROP TEMPORARY TABLE IF EXISTS periode_paid;
	CREATE TEMPORARY TABLE periode_paid as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' AND (x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8) THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' AND x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_paid) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.MESIN_NM,x2.KAR_NM,x2.DEP_NM,x2.PAY_DAY,x2.STATUS AS STT,x2.STATUS,
        #CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as TGL_STARTING,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as TGL_CLOSING, 
        #PEMASUKAN TTL PAGI DAN OT
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.VAL_PAGI ELSE 0 END) as TTL_PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS  TTL_LBR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) as SUB_PAY_PAGI, #add Fomula Potongan
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE '0' END) AS  SUB_PAY_LBR, 
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) + 
         (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) +  
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TTL_PAY, 
				#SPLIT PER-DAY
				",@fildText,",			
				#POTONGAN
				  #sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  '0' AS TTL_PINJAMAN,
						'0' AS TTL_PPH,
					#sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POTONGAN,
					sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN,
				  #(sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN,
					SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END)	-
          (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) AS POT_DIVISI,
				x2.STT_LEMBUR
	FROM (
				SELECT * FROM	absen_import 
				WHERE STATUS=2 AND IN_TGL BETWEEN @tglStart AND @tglEnd
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.KAR_ID ASC

");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_PAYROLL`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_PAYROLL`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_PAYROLL`(IN TGL_START DATE, IN TGL_END DATE)
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END ;
  #PARAMETER('2017-09-08','2017-09-14')
	# ('2017-07-20','2017-07-20','1')
	DROP TEMPORARY TABLE IF EXISTS periode_payroll;
	CREATE TEMPORARY TABLE periode_payroll as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' AND (x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8) THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' AND x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_payroll) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.MESIN_NM,x2.KAR_NM,x2.DEP_NM,x2.PAY_DAY,x2.STATUS AS STT,x2.STATUS,
        #CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as TGL_STARTING,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as TGL_CLOSING, 
        #PEMASUKAN TTL PAGI DAN OT
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.VAL_PAGI ELSE 0 END) as TTL_PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS  TTL_LBR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) as SUB_PAY_PAGI, #add Fomula Potongan
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE '0' END) AS  SUB_PAY_LBR, 
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) + 
         (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) +  
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TTL_PAY, 
				#SPLIT PER-DAY
				",@fildText,",			
				#POTONGAN
				  #sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  '0' AS TTL_PINJAMAN,
						'0' AS TTL_PPH,
					#sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_POTONGAN_TELAT ELSE 0 END) * x2.PAY_DAY AS TTL_POTONGAN,
					sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN,
				  #(sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN,
					SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END)	-
          (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) AS POT_DIVISI,
				x2.STT_LEMBUR
	FROM (
				SELECT * FROM	absen_import 
				WHERE STATUS=1 AND IN_TGL BETWEEN @tglStart AND @tglEnd
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.KAR_ID ASC

");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_PAYROLL_copy`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_PAYROLL_copy`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_PAYROLL_copy`(IN TGL_START DATE, IN TGL_END DATE)
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END ;
  #PARAMETER('2017-09-08','2017-09-14')
	# ('2017-07-20','2017-07-20','1')
	DROP TEMPORARY TABLE IF EXISTS periode_payroll;
	CREATE TEMPORARY TABLE periode_payroll as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_payroll) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.MESIN_NM,x2.KAR_NM,x2.DEP_NM,x2.PAY_DAY,x2.STATUS AS STT,x2.STATUS,
        #CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as TGL_STARTING,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as TGL_CLOSING, 
        #PEMASUKAN TTL PAGI DAN OT
          sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 THEN x2.VAL_PAGI ELSE 0 END) as TTL_PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_LEMBUR ELSE 0 END) AS  TTL_LBR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 SUM(x2.PAY_PAGI) as SUB_PAY_PAGI, #add Fomula Potongan
				 SUM(CASE WHEN x2.STT_LEMBUR=1 THEN x2.PAY_LEMBUR ELSE '0' END) AS  SUB_PAY_LBR, 
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 SUM(x2.PAY_PAGI) + SUM(CASE WHEN x2.STT_LEMBUR=1 THEN x2.PAY_LEMBUR ELSE 0 END) +  sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TTL_PAY, 
				#SPLIT PER-DAY
				",@fildText,",			
				#POTONGAN
				  sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  '0' AS TTL_PINJAMAN,
						'0' AS TTL_PPH,
				  (sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN
	FROM (
				SELECT * FROM	absen_import 
				WHERE STATUS=1 AND IN_TGL BETWEEN @tglStart AND @tglEnd
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.KAR_ID ASC

");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `NEW_RPT_FROMAT_PRINT`
-- ----------------------------
DROP PROCEDURE IF EXISTS `NEW_RPT_FROMAT_PRINT`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_RPT_FROMAT_PRINT`(IN TGL_START DATE, IN TGL_END DATE, IN ARY_KARID NVARCHAR(5000))
BEGIN
	SET SESSION GROUP_CONCAT_MAX_LEN = 1000000;
	SET @tglStart=TGL_START;
	SET @tglEnd=TGL_END;
  #SET @aryKarId="('3.0915.0001','3.0915.0002')";
  SET @aryKarId=ARY_KARID;
  #PARAMETER('2017-09-08','2017-09-14')
	# ('2017-07-20','2017-07-20','("3.0915.0001","3.0915.0002")')
	# ("2017-07-20","2017-07-20","('3.0915.0001','3.0915.0002')")
	DROP TEMPORARY TABLE IF EXISTS periode_print;
	CREATE TEMPORARY TABLE periode_print as( 
		SELECT a.Date as TGL_RUN
		FROM (
				select @tglEnd - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		) a
		#WHERE a.Date BETWEEN date('2016-02-23') and date(z)
		WHERE a.Date BETWEEN  @tglStart AND @tglEnd ORDER BY a.Date ASC
	);
	SELECT
		GROUP_CONCAT(DISTINCT
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					#"' THEN concat(x2.VAL_PAGI,'/',x2.VAL_POTONGAN_TELAT) ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
					"' AND (x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8) THEN x2.VAL_PAGI ELSE 0 END) AS 'PAGI_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"',"												
			),
			CONCAT(
					"MAX(CASE WHEN DATE_FORMAT(x2.IN_TGL,'%Y-%m-%d') = '",
					DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),
					"' AND x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS 'LBR_",DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d'),"'"												
			)
		) into @fildText
	FROM 
	(SELECT * FROM periode_print) x1; #ORDER BY x1.TGL_RUN ASC;

	#SELECT @fildText;
	SET @sqlRslt = CONCAT("  
		SELECT x2.KAR_ID,x2.MESIN_NM,x2.KAR_NM,x2.DEP_NM,x2.PAY_DAY,x2.STATUS AS STT,x2.STATUS,
        #CLOSING TIME
         DATE_FORMAT('",@tglStart,"','%Y-%m-%d') as TGL_STARTING,
				 DATE_FORMAT('",@tglEnd,"','%Y-%m-%d') as TGL_CLOSING, 
        #PEMASUKAN TTL PAGI DAN OT
         sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.VAL_PAGI ELSE 0 END) as TTL_PAGI,
         sum(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.VAL_LEMBUR ELSE 0 END) AS  TTL_LBR,
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS  UANG_MAKAN,
        #SUB TOTAL BAYARAN 
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) as SUB_PAY_PAGI, #add Fomula Potongan
				 SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE '0' END) AS  SUB_PAY_LBR, 
        #GRAND TOTAL PAGI+LEMBUR+UANG MAKAN
				 sum(CASE WHEN x2.STT_LEMBUR=0 OR x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=7 OR x2.STT_LEMBUR=8 THEN x2.PAY_PAGI  ELSE 0 END) + 
         (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) +  
         sum(CASE WHEN x2.STT_LEMBUR=1 THEN x2.VAL_MAKAN ELSE 0 END) AS TTL_PAY, 
				#SPLIT PER-DAY
				",@fildText,",			
				#POTONGAN
				  sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN_PAGI,				
				  '0' AS TTL_PINJAMAN,
						'0' AS TTL_PPH,
					sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY AS TTL_POTONGAN,
				  #(sum(x2.VAL_POTONGAN_TELAT) * x2.PAY_DAY) AS TTL_POTONGAN,
					SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END)	-
          (SUM(CASE WHEN x2.STT_LEMBUR=1 OR x2.STT_LEMBUR=8 THEN x2.PAY_LEMBUR ELSE 0 END) * (x2.POT_PERSEN/100)) AS POT_DIVISI,
				x2.STT_LEMBUR
	FROM (
				SELECT * FROM	absen_import 
				WHERE (IN_TGL BETWEEN @tglStart AND @tglEnd) AND KAR_ID IN ",@aryKarId,"
				GROUP BY IN_TGL,KAR_ID ORDER BY IN_TGL ASC
			 ) x2 GROUP BY x2.KAR_ID ORDER BY x2.KAR_ID ASC

");

	PREPARE stmt FROM @sqlRslt; 
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SISTEM_login_option`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SISTEM_login_option`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SISTEM_login_option`()
BEGIN
#==========================================
#== 		SISTEM Data User Login     			===
#== @author ptrnov [piter@lukison.com]  ===
#== @since 1.2                          ===
#==========================================
	SELECT DISTINCT * ,
	(CASE WHEN x2.GF_ID<>'' THEN (SELECT GF_NM FROM kepangkatan WHERE GF_ID=x2.GF_ID LIMIT 1) ELSE 'none' END) AS GF_NM,
	(CASE WHEN x2.JOBGRADE_ID<>'' THEN (SELECT JOBGRADE_NM FROM grading WHERE JOBGRADE_ID=x2.JOBGRADE_ID LIMIT 1) ELSE 'none' END) AS GRADING_NM,
	(CASE WHEN x2.DEP_ID<>'' THEN (SELECT DEP_NM FROM departemen WHERE DEP_ID=x2.DEP_ID LIMIT 1) ELSE 'none' END) AS DEP_NM,
	(CASE WHEN x2.CAB_ID<>'' THEN (SELECT CAB_NM FROM cabang WHERE CAB_ID=x2.CAB_ID LIMIT 1) ELSE 'none' END) AS CAB_NM,
	(CASE WHEN x2.KAR_STS<>'' THEN (SELECT KAR_STS_NM FROM kar_stt WHERE KAR_STS_ID=x2.KAR_STS LIMIT 1) ELSE 'none' END) AS KAR_STS_NM,
	(CASE WHEN x2.PEN_ID<>'' THEN (SELECT PEN_NM FROM pendidikan WHERE PEN_ID=x2.PEN_ID LIMIT 1) ELSE 'none' END) AS PEN_NM,
	(CASE WHEN x2.AGAMA_ID<>'' THEN (SELECT AGAMA_NM FROM agama WHERE AGAMA_ID=x2.AGAMA_ID LIMIT 1) ELSE 'none' END) AS AGAMA,
	(CASE WHEN x2.STT_ID='K' THEN 'KAWIN' ELSE 'TIDAK KAWIN' END) AS STT_NIKAH,
	(CASE WHEN x2.KAR_JK='1' THEN 'PRIA' ELSE 'WANITA' END) AS GENDER,
		x2.JOBGRADE_ID as Title,
	  DATE_FORMAT(x2.KAR_TGLM,'%d-%m-%Y') as JoinDate
		#FROM user x1 RIGHT JOIN karyawan x2 ON x2.KAR_ID=x1.EMP_ID
		FROM karyawan x2;
	#WHERE EMP_ID <>'';
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `COMPONEN_hari`
-- ----------------------------
DROP FUNCTION IF EXISTS `COMPONEN_hari`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `COMPONEN_hari`(TGL_RUN Date) RETURNS varchar(20) CHARSET latin1
BEGIN
 DECLARE Rslt VARCHAR(20);





IF (DAYOFWEEK(TGL_RUN)=1) THEN
		SET Rslt="Minggu";
ELSEIF (DAYOFWEEK(TGL_RUN)=2) THEN
		SET Rslt="Senin";
ELSEIF (DAYOFWEEK(TGL_RUN)=3) THEN
		SET Rslt="Selasa";
ELSEIF (DAYOFWEEK(TGL_RUN)=4) THEN
		SET Rslt="Rabu";
ELSEIF (DAYOFWEEK(TGL_RUN)=5) THEN
		SET Rslt="Kamis";
ELSEIF (DAYOFWEEK(TGL_RUN)=6) THEN
		SET Rslt="Jumat";
ELSEIF (DAYOFWEEK(TGL_RUN)=7) THEN
		SET Rslt="Sabtu";
END IF;

RETURN Rslt;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `fnc_split`
-- ----------------------------
DROP FUNCTION IF EXISTS `fnc_split`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fnc_split`(x VARCHAR(255),
  delim VARCHAR(12),
  pos INT) RETURNS varchar(255) CHARSET latin1
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '')
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `GET_EMPLOYE_ID`
-- ----------------------------
DROP FUNCTION IF EXISTS `GET_EMPLOYE_ID`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GET_EMPLOYE_ID`(USER_ID varchar(100)) RETURNS varchar(100) CHARSET latin1
BEGIN
	#'1'
	DECLARE Rslt VARCHAR(100);
	IF(SELECT EXISTS(SELECT DISTINCT EMP_ID FROM dbm001.user	WHERE id=USER_ID LIMIT 1))
	THEN
		SELECT DISTINCT EMP_ID INTO Rslt FROM dbm001.user WHERE id=USER_ID LIMIT 1;
	ELSE
		SET Rslt ='';
	END IF;
	RETURN Rslt;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeInsert`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeInsert` BEFORE INSERT ON `absen_import` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL AND  new.FINGER_ID IS NOT NULL THEN 
  
    SELECT 
             #x1.TerminalID,x1.FingerPrintID
             x1.KAR_ID
             ,x2.MESIN_NM
            ,x3.KAR_NM,x3.DEP_ID
           ,x4.DEP_NM
   INTO @karId,@mesinNm,@karNm,@depId,@depNm
   FROM kar_finger x1 LEFT JOIN machine x2 on x2.TerminalID=x1.TerminalID
   LEFT JOIN karyawan x3 on x3.KAR_ID=x1.KAR_ID
   LEFT JOIN departemen x4 on x4.DEP_ID=x3.DEP_ID
   WHERE x1.TerminalID=new.TERMINAL_ID AND x1.FingerPrintID=new.FINGER_ID;

    SET new.MESIN_NM=@mesinNm;    
    SET new.KAR_ID=@karId;  
    SET new.KAR_NM=@karNm;  
    SET new.DEP_ID=@depId;  
    SET new.DEP_NM=@depNm;  
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);

    IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

                             #UANG MAKAN
                             IF (@waktu2>=(CONCAT(new.IN_TGL,' ','23:00:00'))) THEN
                                 SET new.VAL_MAKAN=10000;
                             END IF;

                           #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 #IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','13:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 END IF;

                                IF (@waktu1 >CONCAT(new.IN_TGL,' ','13:00:00')) THEN
                                        SET new.VAL_POTONGAN_TELAT='1';
                                        SET @potonganTelat='1';
                                 END IF;

                             #ELSE
                              #    SET new.VAL_POTONGAN_TELAT='0';
                               #   SET @potonganTelat='0';
                             END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
        
         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;

        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-new.VAL_POTONGAN_TELAT;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * (@harian-new.VAL_POTONGAN_TELAT);
        SET new.PAY_LEMBUR=@payday * @ot;
   END;

  END IF;
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeUpdate`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeUpdate` BEFORE UPDATE ON `absen_import` FOR EACH ROW IF (new.STATUS<>2) AND ((new.IN_TGL  IS NOT NULL) AND  (new.IN_WAKTU  IS NOT NULL) AND (new.OUT_TGL IS NOT NULL) AND (new.OUT_WAKTU IS NOT NULL))  THEN 
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);

    #DRIVER REGULATION
       SELECT DEP_ID  into @deptID FROM  karyawan WHERE KAR_ID=new.KAR_ID;
       IF @deptID=4 THEN
           SET new.POT_PERSEN=70;
        END IF;

     BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	         END IF;

                           #UANG MAKAN
                             IF (@waktu2>=(CONCAT(new.IN_TGL,' ','23:00:00'))) THEN
                                 SET new.VAL_MAKAN=10000;
                             END IF;

                           #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 #IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','13:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 END IF;

                                IF (@waktu1 >CONCAT(new.IN_TGL,' ','13:00:00')) THEN
                                        SET new.VAL_POTONGAN_TELAT='1';
                                        SET @potonganTelat='1';
                                 END IF;

                             ELSE
                                  SET new.VAL_POTONGAN_TELAT='0';
                                  SET @potonganTelat='0';
                             END IF;


        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;

         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=new.KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;
         SET new.PAY_DAY=@payday;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-new.VAL_POTONGAN_TELAT;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * (@harian-new.VAL_POTONGAN_TELAT);
        SET new.PAY_LEMBUR=@payday * @ot;

      
   END;

END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeInsert_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeInsert_copy` BEFORE INSERT ON `absen_import_copy` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL AND  new.FINGER_ID IS NOT NULL THEN 
  
    SELECT 
             #x1.TerminalID,x1.FingerPrintID
             x1.KAR_ID
             ,x2.MESIN_NM
            ,x3.KAR_NM,x3.DEP_ID
           ,x4.DEP_NM
   INTO @karId,@mesinNm,@karNm,@depId,@depNm
   FROM kar_finger x1 LEFT JOIN machine x2 on x2.TerminalID=x1.TerminalID
   LEFT JOIN karyawan x3 on x3.KAR_ID=x1.KAR_ID
   LEFT JOIN departemen x4 on x4.DEP_ID=x3.DEP_ID
   WHERE x1.TerminalID=new.TERMINAL_ID AND x1.FingerPrintID=new.FINGER_ID;

    SET new.MESIN_NM=@mesinNm;    
    SET new.KAR_ID=@karId;  
    SET new.KAR_NM=@karNm;  
    SET new.DEP_ID=@depId;  
    SET new.DEP_NM=@depNm;  
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);

    IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
        
         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;

        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * @harian;
        SET new.PAY_LEMBUR=@payday * @ot;
   END;

  END IF;
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeUpdate_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeUpdate_copy` BEFORE UPDATE ON `absen_import_copy` FOR EACH ROW IF (new.STATUS<>2) AND ((new.IN_TGL  IS NOT NULL) AND  (new.IN_WAKTU  IS NOT NULL) AND (new.OUT_TGL IS NOT NULL) AND (new.OUT_WAKTU IS NOT NULL))  THEN 
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	         END IF;

                           #UANG MAKAN
                             IF (@waktu2>=(CONCAT(new.IN_TGL,' ','23:00:00'))) THEN
                                 SET new.VAL_MAKAN=10000;
                             END IF;

                           #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 #ELSE
                                 #        SET new.VAL_POTONGAN_TELAT='0.5';
                                 END IF;
                             ELSE
                                  SET new.VAL_POTONGAN_TELAT='0';
                                  SET @potonganTelat='0';
                             END IF;


        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;

         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=new.KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;
         SET new.PAY_DAY=@payday;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-new.VAL_POTONGAN_TELAT;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * (@harian-new.VAL_POTONGAN_TELAT);
        SET new.PAY_LEMBUR=@payday * @ot;
   END;

END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImportTmp_BeforeInsert`;
DELIMITER ;;
CREATE TRIGGER `AbsenImportTmp_BeforeInsert` BEFORE INSERT ON `absen_import_tmp` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL  THEN 
  
    SELECT 
             #x1.TerminalID,x1.FingerPrintID
             x1.KAR_ID
             ,x2.MESIN_NM
            ,x3.KAR_NM,x3.DEP_ID
           ,x4.DEP_NM
   INTO @karId,@mesinNm,@karNm,@depId,@depNm
   FROM kar_finger x1 LEFT JOIN machine x2 on x2.TerminalID=x1.TerminalID
   LEFT JOIN karyawan x3 on x3.KAR_ID=x1.KAR_ID
   LEFT JOIN departemen x4 on x4.DEP_ID=x3.DEP_ID
   WHERE x1.TerminalID=new.TERMINAL_ID AND x1.FingerPrintID=new.FINGER_ID;

    SET new.MESIN_NM=@mesinNm;    
    SET new.KAR_ID=@karId;  
    SET new.KAR_NM=@karNm;  
    SET new.DEP_ID=@depId;  
    SET new.DEP_NM=@depNm;  
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);

    IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

                            #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 #IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','13:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 END IF;

                                IF (@waktu1 >CONCAT(new.IN_TGL,' ','13:00:00')) THEN
                                        SET new.VAL_POTONGAN_TELAT='1';
                                        SET @potonganTelat='1';
                                 END IF;

                             ELSE
                                 SET new.VAL_POTONGAN_TELAT='0';
                                 SET @potonganTelat='0';
                             END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-new.VAL_POTONGAN_TELAT;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=new.PAY_DAY * @harian;
        SET new.PAY_LEMBUR=new.PAY_DAY * @ot;
   END;

  END IF;
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImportTmp_BeforeUpdate`;
DELIMITER ;;
CREATE TRIGGER `AbsenImportTmp_BeforeUpdate` BEFORE UPDATE ON `absen_import_tmp` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL  THEN 
  #IF new.TERMINAL_ID   IS NOT NULL AND  new.FINGER_ID  IS NOT NULL THEN 
 
    SET new.HARI=COMPONEN_hari(new.IN_TGL);
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

                             #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 #IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','13:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 END IF;

                                IF (@waktu1 >CONCAT(new.IN_TGL,' ','13:00:00')) THEN
                                        SET new.VAL_POTONGAN_TELAT='1';
                                        SET @potonganTelat='1';
                                 END IF;

                             ELSE
                                 SET new.VAL_POTONGAN_TELAT='0';
                                 SET @potonganTelat='0';
                             END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-new.VAL_POTONGAN_TELAT;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=new.PAY_DAY * @harian;
        SET new.PAY_LEMBUR=new.PAY_DAY * @ot;
   END;

END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImportTmp_BeforeInsert_copy_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImportTmp_BeforeInsert_copy_copy` BEFORE INSERT ON `absen_import_tmp_copy` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL  THEN 
  
    SELECT 
             #x1.TerminalID,x1.FingerPrintID
             x1.KAR_ID
             ,x2.MESIN_NM
            ,x3.KAR_NM,x3.DEP_ID
           ,x4.DEP_NM
   INTO @karId,@mesinNm,@karNm,@depId,@depNm
   FROM kar_finger x1 LEFT JOIN machine x2 on x2.TerminalID=x1.TerminalID
   LEFT JOIN karyawan x3 on x3.KAR_ID=x1.KAR_ID
   LEFT JOIN departemen x4 on x4.DEP_ID=x3.DEP_ID
   WHERE x1.TerminalID=new.TERMINAL_ID AND x1.FingerPrintID=new.FINGER_ID;

    SET new.MESIN_NM=@mesinNm;    
    SET new.KAR_ID=@karId;  
    SET new.KAR_NM=@karNm;  
    SET new.DEP_ID=@depId;  
    SET new.DEP_NM=@depNm;  
    
    IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=new.PAY_DAY * @harian;
        SET new.PAY_LEMBUR=new.PAY_DAY * @ot;
   END;

  END IF;
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImportTmp_BeforeUpdate_copy_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImportTmp_BeforeUpdate_copy_copy` BEFORE UPDATE ON `absen_import_tmp_copy` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL  THEN 
  #IF new.TERMINAL_ID   IS NOT NULL AND  new.FINGER_ID  IS NOT NULL THEN 
 
    SET new.HARI=COMPONEN_hari(new.IN_TGL);
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=new.PAY_DAY * @harian;
        SET new.PAY_LEMBUR=new.PAY_DAY * @ot;
   END;

END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeInsert_copy1_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeInsert_copy1_copy` BEFORE INSERT ON `absen_payroll` FOR EACH ROW IF new.TERMINAL_ID   IS NOT NULL AND  new.FINGER_ID IS NOT NULL THEN 
  
    SELECT 
             #x1.TerminalID,x1.FingerPrintID
             x1.KAR_ID
             ,x2.MESIN_NM
            ,x3.KAR_NM,x3.DEP_ID
           ,x4.DEP_NM
   INTO @karId,@mesinNm,@karNm,@depId,@depNm
   FROM kar_finger x1 LEFT JOIN machine x2 on x2.TerminalID=x1.TerminalID
   LEFT JOIN karyawan x3 on x3.KAR_ID=x1.KAR_ID
   LEFT JOIN departemen x4 on x4.DEP_ID=x3.DEP_ID
   WHERE x1.TerminalID=new.TERMINAL_ID AND x1.FingerPrintID=new.FINGER_ID;

    SET new.MESIN_NM=@mesinNm;    
    SET new.KAR_ID=@karId;  
    SET new.KAR_NM=@karNm;  
    SET new.DEP_ID=@depId;  
    SET new.DEP_NM=@depNm;  
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);

    IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	            END IF;

        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;
        
         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;

        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * @harian;
        SET new.PAY_LEMBUR=@payday * @ot;
   END;

  END IF;
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `AbsenImport_BeforeUpdate_copy1_copy`;
DELIMITER ;;
CREATE TRIGGER `AbsenImport_BeforeUpdate_copy1_copy` BEFORE UPDATE ON `absen_payroll` FOR EACH ROW IF new.IN_TGL   IS NOT NULL AND  new.IN_WAKTU  IS NOT NULL AND new.OUT_TGL IS NOT NULL AND new.OUT_WAKTU IS NOT NULL THEN 
    
    SET new.HARI=COMPONEN_hari(new.IN_TGL);
    BEGIN
    	DECLARE fnsh,IN_SEQ INTEGER DEFAULT 0;
                   #PARAM
	#'2017-09-04','08:00:00','2017-09-05','02:00:00'
	DECLARE x VARCHAR(255) DEFAULT NOT NULL;
	DECLARE IN_FOT_JAM1,IN_FOT_JAM2 time;
	DECLARE IN_FOT_PERSEN FLOAT;
	
	DEClARE field_cursor CURSOR FOR SELECT FOT_JAM1,FOT_JAM2,FOT_PERSEN,SEQ FROM ot_formula ORDER BY START ASC;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fnsh = TRUE;
	SET @sopirOb='0';
	SET @harian='0';
	SET @ot='0';
  	
                  OPEN field_cursor;	 
	GET_PERULANGAN: LOOP
	         FETCH field_cursor INTO IN_FOT_JAM1,IN_FOT_JAM2,IN_FOT_PERSEN,IN_SEQ;
	         IF fnsh THEN 
		LEAVE GET_PERULANGAN;
	         END IF;
                    
                          SET @tglRule=DATE_ADD(new.IN_TGL, INTERVAL IN_SEQ DAY);
	       SET @waktu1=CONCAT(new.IN_TGL,' ',new.IN_WAKTU); 		#'2017-09-04 08:00:00';
	       SET @waktu2=CONCAT(new.OUT_TGL,' ',new.OUT_WAKTU);	#'2017-09-04 22:00:00';
				
     	       #SPLIT TIME TABLE NORMAL
	         IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>= (CONCAT(new.IN_TGL,' ','06:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=(CONCAT(new.IN_TGL,' ','17:00:00')) THEN			  
		#HARIAN SOPIR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','06:30:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @sopirOb=@sopirOb+IN_FOT_PERSEN;
		END IF;
		
                                     #HARIAN PEKERJA LUAR
		IF (CONCAT(new.IN_TGL,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','08:00:00')) AND (CONCAT(new.IN_TGL,' ',IN_FOT_JAM2))<=@waktu2 THEN
		     SET @harian=@harian+IN_FOT_PERSEN;
		END IF;
	         END IF;

                           #UANG MAKAN
                             IF (@waktu2>=(CONCAT(new.IN_TGL,' ','23:00:00'))) THEN
                                 SET new.VAL_MAKAN=10000;
                             END IF;

                           #POTONGAN TELAT
                             IF (@waktu1>(CONCAT(new.IN_TGL,' ','08:15:00'))) THEN

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','08:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.1';
                                        SET @potonganTelat='0.1';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','08:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:15:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.2';
                                        SET @potonganTelat='0.2';
                                  END IF;

                                  IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:15:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','09:45:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.3';
                                        SET @potonganTelat='0.3';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','09:45:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','10:35:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.4';
                                        SET @potonganTelat='0.4';
                                  END IF;

                                 IF (@waktu1 > (CONCAT(new.IN_TGL,' ','10:35:00')) AND (@waktu1 <= CONCAT(new.IN_TGL,' ','12:00:00'))) THEN
                                        SET new.VAL_POTONGAN_TELAT='0.5';
                                        SET @potonganTelat='0.5';
                                 #ELSE
                                 #        SET new.VAL_POTONGAN_TELAT='0.5';
                                 END IF;
                             ELSE
                                  SET new.VAL_POTONGAN_TELAT=0;
                                  SET @potonganTelat=0;
                             END IF;


        	        #SPLIT TIME TABLE OT
	         IF  (CONCAT(@tglRule,' ',IN_FOT_JAM1))>=(CONCAT(new.IN_TGL,' ','17:00:00')) AND (CONCAT(@tglRule,' ',IN_FOT_JAM2)<=@waktu2) THEN
		 SET @ot=@ot+IN_FOT_PERSEN;
	         END IF;
             END LOOP;
        CLOSE field_cursor;

         #AMBIL GAJI HARIAN
         SELECT PAY_DAY INTO @payday FROM payroll_salary WHERE KAR_ID=KAR_ID AND STATUS_ACTIVE=1 LIMIT 1;
         SET new.PAY_DAY=@payday;
				
        #SELECT @sopirOb,@harian,@ot;
        SET new.VAL_PAGI=@harian-@potonganTelat;
        SET new.VAL_LEMBUR=@ot;
        SET new.PAY_PAGI=@payday * (@harian-@potonganTelat);
        SET new.PAY_LEMBUR=@payday * @ot;
   END;

END IF
;;
DELIMITER ;

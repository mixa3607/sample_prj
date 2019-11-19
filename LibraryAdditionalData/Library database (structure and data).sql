/*
 Navicat Premium Data Transfer

 Source Server         : localhost_empty
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : library

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 19/11/2019 23:13:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `names`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 396 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES (1, 'Аакер Дэвид');
INSERT INTO `authors` VALUES (2, 'Аббондио Сара');
INSERT INTO `authors` VALUES (3, 'Абдуллаев Марат Равильевич');
INSERT INTO `authors` VALUES (4, 'Абдуллаев Чингиз Акифович');
INSERT INTO `authors` VALUES (5, 'Абдуразаков Ораз Рахимджанович');
INSERT INTO `authors` VALUES (6, 'Абекассис Элиэтт');
INSERT INTO `authors` VALUES (7, 'Аберкан Идрисс');
INSERT INTO `authors` VALUES (8, 'Аберкромби Джо');
INSERT INTO `authors` VALUES (9, 'Абигнейл Фрэнк');
INSERT INTO `authors` VALUES (10, 'Абоян Виталий Эдуардович');
INSERT INTO `authors` VALUES (11, 'Абрамов Борис Николаевич');
INSERT INTO `authors` VALUES (12, 'Абрамов Евгений Петрович');
INSERT INTO `authors` VALUES (13, 'Абрамов Федор Александрович');
INSERT INTO `authors` VALUES (14, 'Абрамс Джей Джей');
INSERT INTO `authors` VALUES (15, 'Абрашкин Анатолий Александрович');
INSERT INTO `authors` VALUES (16, 'Абрикосова Инна Вадимовна');
INSERT INTO `authors` VALUES (17, 'Абросимова Наталья');
INSERT INTO `authors` VALUES (18, 'Абузяров Ильдар Анвярович');
INSERT INTO `authors` VALUES (19, 'Авдеев Роман');
INSERT INTO `authors` VALUES (20, 'Авдеева Екатерина Алексеевна');
INSERT INTO `authors` VALUES (21, 'Авдиш Рана');
INSERT INTO `authors` VALUES (22, 'Авдонкин Виталий Сергеевич');
INSERT INTO `authors` VALUES (23, 'Аверин Владимир');
INSERT INTO `authors` VALUES (24, 'Аверин Никита Владимирович');
INSERT INTO `authors` VALUES (25, 'Аверина Мария Александровна');
INSERT INTO `authors` VALUES (26, 'Аверченко Аркадий Тимофеевич');
INSERT INTO `authors` VALUES (27, 'Аветисьянц Ольга Владимировна');
INSERT INTO `authors` VALUES (28, 'Аветисян Самвел Альбертович');
INSERT INTO `authors` VALUES (29, 'Аветов Григорий Михайлович');
INSERT INTO `authors` VALUES (30, 'Авеярд Виктория');
INSERT INTO `authors` VALUES (31, 'Авласенко Геннадий Петрович');
INSERT INTO `authors` VALUES (32, 'Аврилов Константин Валериевич');
INSERT INTO `authors` VALUES (33, 'Агабеков Георгий');
INSERT INTO `authors` VALUES (34, 'Агалаков Дмитрий Валентинович');
INSERT INTO `authors` VALUES (35, 'Агалаков Павел');
INSERT INTO `authors` VALUES (36, 'Агапкин Сергей Николаевич');
INSERT INTO `authors` VALUES (37, 'Агапова Инара Валерьевна');
INSERT INTO `authors` VALUES (38, 'Агашина Маргарита Константинов');
INSERT INTO `authors` VALUES (39, 'Агешкина Наталия Александровна');
INSERT INTO `authors` VALUES (40, 'Агзамов Ренат Лимарович');
INSERT INTO `authors` VALUES (41, 'Агирре Энн');
INSERT INTO `authors` VALUES (42, 'Агишева Татьяна Анатольевна');
INSERT INTO `authors` VALUES (43, 'Агравал Рома');
INSERT INTO `authors` VALUES (44, 'Аграваль Мики');
INSERT INTO `authors` VALUES (45, 'Агронский Валерий Исаакович');
INSERT INTO `authors` VALUES (46, 'Агус Дэвид');
INSERT INTO `authors` VALUES (47, 'Агуэро Серхио Кун');
INSERT INTO `authors` VALUES (48, 'Адам Эрик');
INSERT INTO `authors` VALUES (49, 'Адамов Григорий Борисович');
INSERT INTO `authors` VALUES (50, 'Адамович Алесь Михайлович');
INSERT INTO `authors` VALUES (51, 'Адамс Гай');
INSERT INTO `authors` VALUES (52, 'Адамс Джорджи');
INSERT INTO `authors` VALUES (53, 'Адамс Кристина А.');
INSERT INTO `authors` VALUES (54, 'Адамс Кэт');
INSERT INTO `authors` VALUES (55, 'Адамс Ричард');
INSERT INTO `authors` VALUES (56, 'Адамс Скотт');
INSERT INTO `authors` VALUES (57, 'Адамян Лейла Вагоевна');
INSERT INTO `authors` VALUES (58, 'Аддарио Линси');
INSERT INTO `authors` VALUES (59, 'Адес Гарри');
INSERT INTO `authors` VALUES (60, 'Адизес Ихцак Калдерон');
INSERT INTO `authors` VALUES (61, 'Адинцова Ю.; Рудницкая Л.; Онищенко Н.');
INSERT INTO `authors` VALUES (62, 'Адичи Нгози Чимаманда');
INSERT INTO `authors` VALUES (63, 'Адлер Йаэль');
INSERT INTO `authors` VALUES (65, 'Адлер-мл Билл');
INSERT INTO `authors` VALUES (64, 'Адлер-Ольсен Юсси');
INSERT INTO `authors` VALUES (66, 'Адорнетто Александра');
INSERT INTO `authors` VALUES (67, 'Адра Фред');
INSERT INTO `authors` VALUES (68, 'Адриа Ферран');
INSERT INTO `authors` VALUES (391, 'аз-Забиди Ахмад ибн ‘Абд аль-Лятиф');
INSERT INTO `authors` VALUES (69, 'Азаренок Мария Александровна');
INSERT INTO `authors` VALUES (70, 'Азаров Юрий Петрович');
INSERT INTO `authors` VALUES (71, 'Азарова Екатерина');
INSERT INTO `authors` VALUES (72, 'Азиз Шайен Джой');
INSERT INTO `authors` VALUES (73, 'Азизова Екатерина Сергеевна');
INSERT INTO `authors` VALUES (74, 'Азимов Айзек');
INSERT INTO `authors` VALUES (75, 'Азнаурян Игорь Эрикович');
INSERT INTO `authors` VALUES (76, 'Азнаурян Ованес');
INSERT INTO `authors` VALUES (77, 'Азольский Анатолий Алексеевич');
INSERT INTO `authors` VALUES (78, 'Азорская Инна');
INSERT INTO `authors` VALUES (79, 'Аист Марина Михайловна');
INSERT INTO `authors` VALUES (80, 'Айенгар Беллур Кришнамачар Сундарараджа');
INSERT INTO `authors` VALUES (81, 'Айенгар Дипак');
INSERT INTO `authors` VALUES (82, 'Айзацкая Надежда Ивановна');
INSERT INTO `authors` VALUES (83, 'Айзек Дон');
INSERT INTO `authors` VALUES (84, 'Айзенк Ганс Юрген');
INSERT INTO `authors` VALUES (85, 'Айзеншпис Юрий Шмильевич');
INSERT INTO `authors` VALUES (86, 'Айкен Мери');
INSERT INTO `authors` VALUES (87, 'Айсмен Литрис');
INSERT INTO `authors` VALUES (88, 'Айтматов Чингиз Торекулович');
INSERT INTO `authors` VALUES (89, 'Акамацу Кэн');
INSERT INTO `authors` VALUES (90, 'Акасс Сьюзен');
INSERT INTO `authors` VALUES (91, 'Акийол Мустафа');
INSERT INTO `authors` VALUES (92, 'Аким Яков Лазаревич');
INSERT INTO `authors` VALUES (93, 'Акимов Антон');
INSERT INTO `authors` VALUES (94, 'Акимов Борис Константинович');
INSERT INTO `authors` VALUES (95, 'Акимова Евгения Олеговна');
INSERT INTO `authors` VALUES (96, 'Акишин Аскольд');
INSERT INTO `authors` VALUES (97, 'Акопян Амаяк Арутюнович');
INSERT INTO `authors` VALUES (98, 'Акопян Ирина Жораевна');
INSERT INTO `authors` VALUES (99, 'Акопян Карен Завенович');
INSERT INTO `authors` VALUES (100, 'Акопян Мариам');
INSERT INTO `authors` VALUES (101, 'Аксаков Иван Сергеевич');
INSERT INTO `authors` VALUES (102, 'Аксаков Сергей Тимофеевич');
INSERT INTO `authors` VALUES (103, 'Аксельрод Алан');
INSERT INTO `authors` VALUES (104, 'Аксенов Василий Павлович');
INSERT INTO `authors` VALUES (105, 'Аксенова Алина Сергеевна');
INSERT INTO `authors` VALUES (106, 'Аксенова Анна');
INSERT INTO `authors` VALUES (107, 'Аксенова Анна Андреевна');
INSERT INTO `authors` VALUES (108, 'Аксенова Оксана Валерьевна');
INSERT INTO `authors` VALUES (109, 'Акта Акта');
INSERT INTO `authors` VALUES (110, 'Алан Вейсман');
INSERT INTO `authors` VALUES (111, 'Албретчсен Никки');
INSERT INTO `authors` VALUES (112, 'Алданов Марк Александрович');
INSERT INTO `authors` VALUES (113, 'Алдонин Евгений Валерьевич');
INSERT INTO `authors` VALUES (114, 'Алдрич Уинифред');
INSERT INTO `authors` VALUES (115, 'Алейникова Юлия');
INSERT INTO `authors` VALUES (116, 'Алекс Кош');
INSERT INTO `authors` VALUES (117, 'Алекс Ланг');
INSERT INTO `authors` VALUES (118, 'Алекс Ровира');
INSERT INTO `authors` VALUES (119, 'Александер Александр');
INSERT INTO `authors` VALUES (120, 'Александер Эбен');
INSERT INTO `authors` VALUES (121, 'Александер-Гарретт Лейла');
INSERT INTO `authors` VALUES (125, 'Александр и Николь Гратовски');
INSERT INTO `authors` VALUES (122, 'Александр Карл');
INSERT INTO `authors` VALUES (123, 'Александр Македонский');
INSERT INTO `authors` VALUES (124, 'Александр Невский');
INSERT INTO `authors` VALUES (126, 'Александров Александр Александрович');
INSERT INTO `authors` VALUES (127, 'Александров Юрий Иосифович');
INSERT INTO `authors` VALUES (128, 'Александрова Александра');
INSERT INTO `authors` VALUES (129, 'Александрова Алена');
INSERT INTO `authors` VALUES (130, 'Александрова Зинаида Николаевна');
INSERT INTO `authors` VALUES (131, 'Александрова Наталья Николаевна');
INSERT INTO `authors` VALUES (132, 'Александрова Ольга Викторовна');
INSERT INTO `authors` VALUES (133, 'Александрова Ольга Юрьевна');
INSERT INTO `authors` VALUES (134, 'Александрова-Зорина Елизавета Борисовна');
INSERT INTO `authors` VALUES (135, 'Александрова-Игнатьева Пелагея Павловна');
INSERT INTO `authors` VALUES (136, 'Алексеев А. П.');
INSERT INTO `authors` VALUES (137, 'Алексеев Владимир');
INSERT INTO `authors` VALUES (138, 'Алексеев Дмитрий');
INSERT INTO `authors` VALUES (139, 'Алексеев Дмитрий Сергеевич');
INSERT INTO `authors` VALUES (140, 'Алексеев Игорь Андреевич');
INSERT INTO `authors` VALUES (141, 'Алексеев Юрий Георгиевич');
INSERT INTO `authors` VALUES (142, 'Алексеева Людмила Ивановна');
INSERT INTO `authors` VALUES (143, 'Алексеева Наталья Николаевна');
INSERT INTO `authors` VALUES (144, 'Алексеева Татьяна Сергеевна');
INSERT INTO `authors` VALUES (145, 'Алексеева-Бескина Татьяна');
INSERT INTO `authors` VALUES (146, 'Алексин Анатолий Георгиевич');
INSERT INTO `authors` VALUES (147, 'Алендер Кэти');
INSERT INTO `authors` VALUES (148, 'Алехин Евгений Игоревич');
INSERT INTO `authors` VALUES (149, 'Алешкина Мария Юрьевна');
INSERT INTO `authors` VALUES (150, 'Алешковский Юз');
INSERT INTO `authors` VALUES (151, 'Али Мосараф');
INSERT INTO `authors` VALUES (152, 'Аливерти Паоло');
INSERT INTO `authors` VALUES (153, 'Алигьери Данте');
INSERT INTO `authors` VALUES (154, 'Алиев Ростислав Владимирович');
INSERT INTO `authors` VALUES (155, 'Алиев Хасай');
INSERT INTO `authors` VALUES (156, 'Аликина Татьяна Васильевна');
INSERT INTO `authors` VALUES (157, 'Аллам Пол');
INSERT INTO `authors` VALUES (158, 'Аллен Марти');
INSERT INTO `authors` VALUES (159, 'Аллен Пол');
INSERT INTO `authors` VALUES (160, 'Аллен Рейчел');
INSERT INTO `authors` VALUES (161, 'Аллен Сара Эдисон');
INSERT INTO `authors` VALUES (162, 'Аллен Стивен');
INSERT INTO `authors` VALUES (163, 'Аллен-Карон Лорен');
INSERT INTO `authors` VALUES (164, 'Аллор Пол');
INSERT INTO `authors` VALUES (165, 'Алмазов Борис Александрови');
INSERT INTO `authors` VALUES (166, 'Алтер Адам');
INSERT INTO `authors` VALUES (167, 'Алфеева Валерия Анатольева');
INSERT INTO `authors` VALUES (168, 'Алфеева Лина');
INSERT INTO `authors` VALUES (169, 'Алферова Елена Владимировна');
INSERT INTO `authors` VALUES (170, 'Алхимова Ванда');
INSERT INTO `authors` VALUES (392, 'аль-Карни \'Аид ибн \'Абдуллах');
INSERT INTO `authors` VALUES (393, 'аль-Мубаракфури Сафи ар-Рахман');
INSERT INTO `authors` VALUES (394, 'аль-Хасани Салим Т. С.');
INSERT INTO `authors` VALUES (171, 'Аль-Шимари Елена Вячеславовна');
INSERT INTO `authors` VALUES (172, 'Альба Джессика');
INSERT INTO `authors` VALUES (173, 'Альберти Леон Баттиста');
INSERT INTO `authors` VALUES (174, 'Альбертини Эмили');
INSERT INTO `authors` VALUES (175, 'Альбрехт Уве');
INSERT INTO `authors` VALUES (176, 'Альварез Мелисса');
INSERT INTO `authors` VALUES (177, 'Альварес Селин');
INSERT INTO `authors` VALUES (178, 'Альмодовар Мигель Анхель');
INSERT INTO `authors` VALUES (179, 'Альмоссави Али');
INSERT INTO `authors` VALUES (180, 'Альпер Мэтью');
INSERT INTO `authors` VALUES (181, 'Альтанов Андрей');
INSERT INTO `authors` VALUES (182, 'Альторфер Франсис');
INSERT INTO `authors` VALUES (183, 'Альтхофф Кори');
INSERT INTO `authors` VALUES (184, 'Альфредо Терцано');
INSERT INTO `authors` VALUES (185, 'Альчато Алессандро');
INSERT INTO `authors` VALUES (186, 'Алюкова Мария Шамилевна');
INSERT INTO `authors` VALUES (187, 'Алюшина Татьяна Александровна');
INSERT INTO `authors` VALUES (188, 'Амаду Жоржи');
INSERT INTO `authors` VALUES (189, 'Амар Патрик');
INSERT INTO `authors` VALUES (190, 'Амара ХизерАш');
INSERT INTO `authors` VALUES (191, 'Амаринго Пабло');
INSERT INTO `authors` VALUES (192, 'Амбарцумова Элеонора Мкртычевна');
INSERT INTO `authors` VALUES (193, 'Амберли Лу');
INSERT INTO `authors` VALUES (194, 'Амезьян Амазин');
INSERT INTO `authors` VALUES (195, 'Амелина Елена Владимировна');
INSERT INTO `authors` VALUES (196, 'Амен Дэниэл Дж.');
INSERT INTO `authors` VALUES (197, 'Амен Тана');
INSERT INTO `authors` VALUES (198, 'Амери Х.; Доэрти Д.');
INSERT INTO `authors` VALUES (199, 'Амиллс Росер');
INSERT INTO `authors` VALUES (200, 'Амис Яна');
INSERT INTO `authors` VALUES (201, 'Амодт Сандра');
INSERT INTO `authors` VALUES (202, 'Аморузо София');
INSERT INTO `authors` VALUES (203, 'Амундсен Руаль');
INSERT INTO `authors` VALUES (204, 'Амфилохиева Екатерина Вальтеровна');
INSERT INTO `authors` VALUES (205, 'Амфт Алена');
INSERT INTO `authors` VALUES (206, 'Анаис Нин');
INSERT INTO `authors` VALUES (207, 'Ананд Анита');
INSERT INTO `authors` VALUES (208, 'Ананьева Елена Германовна');
INSERT INTO `authors` VALUES (209, 'Ананьева Татьяна Евгеньевна');
INSERT INTO `authors` VALUES (210, 'Ангарская Светлана');
INSERT INTO `authors` VALUES (211, 'Ангелов Андрей Петрович');
INSERT INTO `authors` VALUES (212, 'Ангеловская Ольга');
INSERT INTO `authors` VALUES (213, 'Анделин Обри');
INSERT INTO `authors` VALUES (214, 'Анделин Хелен');
INSERT INTO `authors` VALUES (215, 'Андельман Боб');
INSERT INTO `authors` VALUES (216, 'Андержанов Федор Борисович');
INSERT INTO `authors` VALUES (217, 'Андерсен Брауэр Кейт');
INSERT INTO `authors` VALUES (218, 'Андерсен Сара');
INSERT INTO `authors` VALUES (219, 'Андерсен Ханс Кристиан');
INSERT INTO `authors` VALUES (220, 'Андерсон Крис');
INSERT INTO `authors` VALUES (221, 'Андерсон Пол');
INSERT INTO `authors` VALUES (222, 'Андерсон Шервуд');
INSERT INTO `authors` VALUES (223, 'Андерссон Пер Дж.');
INSERT INTO `authors` VALUES (224, 'Анджелини Джозефина');
INSERT INTO `authors` VALUES (225, 'Анджелис Барбара де');
INSERT INTO `authors` VALUES (226, 'Андре Кристоф');
INSERT INTO `authors` VALUES (227, 'Андре Сильвия');
INSERT INTO `authors` VALUES (228, 'Андреев Арнольд Максимович');
INSERT INTO `authors` VALUES (229, 'Андреев Даниил Леонидович');
INSERT INTO `authors` VALUES (230, 'Андреев Леонид Николаевич');
INSERT INTO `authors` VALUES (231, 'Андреев Николай Владимирович');
INSERT INTO `authors` VALUES (232, 'Андреева Дарья Алексеевна');
INSERT INTO `authors` VALUES (233, 'Андреева Елена Валериевна');
INSERT INTO `authors` VALUES (234, 'Андреева Инна Валерьевна');
INSERT INTO `authors` VALUES (235, 'Андреева Ирина Валерьевна');
INSERT INTO `authors` VALUES (236, 'Андреева Надя');
INSERT INTO `authors` VALUES (237, 'Андреева Наталья');
INSERT INTO `authors` VALUES (238, 'Андреева Наталья Вячеславовна');
INSERT INTO `authors` VALUES (239, 'Андреева Ольга Владимировна');
INSERT INTO `authors` VALUES (240, 'Андреева Ольга Петровна');
INSERT INTO `authors` VALUES (241, 'Андрианова Елена Анатольевна');
INSERT INTO `authors` VALUES (242, 'Андрианова Наталья Аркадьевна');
INSERT INTO `authors` VALUES (243, 'Андрияхина Надежда Валентиновна');
INSERT INTO `authors` VALUES (244, 'Андрушевич Петр Юрьевич');
INSERT INTO `authors` VALUES (245, 'Андрушкевич Юрий Петрович');
INSERT INTO `authors` VALUES (246, 'Андрюкова Екатерина Александровна');
INSERT INTO `authors` VALUES (247, 'Аникеева Лариса Шиковна');
INSERT INTO `authors` VALUES (248, 'Аникитина-Юнгблюд Сусанна');
INSERT INTO `authors` VALUES (249, 'Анина Людмила');
INSERT INTO `authors` VALUES (250, 'Анисимов Сергей Владимирович');
INSERT INTO `authors` VALUES (251, 'Анич');
INSERT INTO `authors` VALUES (252, 'Анич Федор');
INSERT INTO `authors` VALUES (253, 'Аничкова Ольга');
INSERT INTO `authors` VALUES (254, 'Анкетиль Стефан');
INSERT INTO `authors` VALUES (255, 'Анненков Павел Александрович');
INSERT INTO `authors` VALUES (256, 'Анненков Павел Васильевич');
INSERT INTO `authors` VALUES (257, 'Анненский Иннокентий Федорович');
INSERT INTO `authors` VALUES (258, 'Аннибали Джозеф А.');
INSERT INTO `authors` VALUES (259, 'Аннинский Лев Александрович');
INSERT INTO `authors` VALUES (260, 'Анохина Елена Александровна');
INSERT INTO `authors` VALUES (261, 'Антарова Конкордия Евгеньевна');
INSERT INTO `authors` VALUES (262, 'Антипова Дарьяна');
INSERT INTO `authors` VALUES (263, 'Антипова Людмила Васильевна');
INSERT INTO `authors` VALUES (264, 'Антипова Марина Геннадьевна');
INSERT INTO `authors` VALUES (265, 'Антонов Дмитрий Алексеевич');
INSERT INTO `authors` VALUES (266, 'Антонов Игорь Викторович');
INSERT INTO `authors` VALUES (267, 'Антонов Сергей Валентинович');
INSERT INTO `authors` VALUES (268, 'Антонова Анна Евгеньевна');
INSERT INTO `authors` VALUES (269, 'Антонова Наталия Николаевна');
INSERT INTO `authors` VALUES (270, 'Антошин Андрей Эдуардович');
INSERT INTO `authors` VALUES (271, 'Антунес Елена Ангуло');
INSERT INTO `authors` VALUES (272, 'Анурьев С.');
INSERT INTO `authors` VALUES (273, 'Ануфриева Мария Борисовна');
INSERT INTO `authors` VALUES (274, 'Анфилофьева Мария Андреевна');
INSERT INTO `authors` VALUES (275, 'Анцелиович Леонид Липманович');
INSERT INTO `authors` VALUES (276, 'Анчелотти Карло');
INSERT INTO `authors` VALUES (277, 'Аоно Билльсон Хироко');
INSERT INTO `authors` VALUES (278, 'Апанасик Валерий');
INSERT INTO `authors` VALUES (279, 'Аповиан Кэролайн');
INSERT INTO `authors` VALUES (280, 'Аполлинер Гийом');
INSERT INTO `authors` VALUES (281, 'Апраксин Иван');
INSERT INTO `authors` VALUES (282, 'Аптулаева Татьяна Гавриловна');
INSERT INTO `authors` VALUES (283, 'Апулей');
INSERT INTO `authors` VALUES (284, 'Аракава Хирому');
INSERT INTO `authors` VALUES (285, 'Аракчеев Алексей Андреевич');
INSERT INTO `authors` VALUES (286, 'Аракчеева Екатерина Валерьевна');
INSERT INTO `authors` VALUES (287, 'Арбаби Шон');
INSERT INTO `authors` VALUES (288, 'Арбузов Владимир Васильевич');
INSERT INTO `authors` VALUES (289, 'Арбутнотт Ванесса');
INSERT INTO `authors` VALUES (290, 'Аргайл Эмбер');
INSERT INTO `authors` VALUES (291, 'Аргашоков Роман Асланович');
INSERT INTO `authors` VALUES (292, 'Аргов Шерри');
INSERT INTO `authors` VALUES (293, 'Ардашев Алексей Николаевич');
INSERT INTO `authors` VALUES (294, 'Арден Джон Б.');
INSERT INTO `authors` VALUES (295, 'Ардова Алиса');
INSERT INTO `authors` VALUES (296, 'Арес Хосе Анхель');
INSERT INTO `authors` VALUES (297, 'Арзаканян Марина Цолаковна');
INSERT INTO `authors` VALUES (298, 'Арзон Робин');
INSERT INTO `authors` VALUES (299, 'Аристархова Маргарита');
INSERT INTO `authors` VALUES (300, 'Аристова Оксана Алексеевна');
INSERT INTO `authors` VALUES (301, 'Аристотель');
INSERT INTO `authors` VALUES (302, 'Арканов Аркадий Михайлович');
INSERT INTO `authors` VALUES (303, 'Аркуччи Даниэль');
INSERT INTO `authors` VALUES (304, 'Армани Н.; Энтис Д.');
INSERT INTO `authors` VALUES (305, 'Армстронг Джеффри');
INSERT INTO `authors` VALUES (306, 'Армстронг Карен');
INSERT INTO `authors` VALUES (307, 'Армстронг Майкл');
INSERT INTO `authors` VALUES (308, 'Армфельд Джина Росси');
INSERT INTO `authors` VALUES (309, 'Арнаутова Дана');
INSERT INTO `authors` VALUES (310, 'Арндт Иоганн');
INSERT INTO `authors` VALUES (311, 'Арнольд Ким');
INSERT INTO `authors` VALUES (312, 'Арнольд Шварцнеггер');
INSERT INTO `authors` VALUES (313, 'Арнопп Джейсон');
INSERT INTO `authors` VALUES (314, 'Арнтц Уильям');
INSERT INTO `authors` VALUES (315, 'Аросев Григорий Леонидович');
INSERT INTO `authors` VALUES (316, 'Арриета Мари-Клэр');
INSERT INTO `authors` VALUES (317, 'Арсак Елена');
INSERT INTO `authors` VALUES (318, 'Арсан Эммануэль');
INSERT INTO `authors` VALUES (319, 'Арсенина Е. Н.');
INSERT INTO `authors` VALUES (320, 'Арсенов Олег Орестович');
INSERT INTO `authors` VALUES (321, 'Арсентьев Александр Сергеевич');
INSERT INTO `authors` VALUES (322, 'Арсентьева Ольга');
INSERT INTO `authors` VALUES (323, 'Арсеньев Владимир Клавдиевич');
INSERT INTO `authors` VALUES (324, 'Арсеньев Сергей');
INSERT INTO `authors` VALUES (325, 'Арсеньева Елена Арсеньевна');
INSERT INTO `authors` VALUES (326, 'Артамонова Елена Вадимовна');
INSERT INTO `authors` VALUES (327, 'Артасов Игорь Анатольевич');
INSERT INTO `authors` VALUES (328, 'Артемова Наталья Александровна');
INSERT INTO `authors` VALUES (329, 'Артемьев Максим Анатольевич');
INSERT INTO `authors` VALUES (330, 'Артемьева Галина');
INSERT INTO `authors` VALUES (331, 'Артемьева Мария Геннадьевна');
INSERT INTO `authors` VALUES (332, 'Артемьева Татьяна');
INSERT INTO `authors` VALUES (333, 'Артиньян Жан');
INSERT INTO `authors` VALUES (334, 'Артюхин Сергей Анатольевич');
INSERT INTO `authors` VALUES (335, 'Арумагам Надя');
INSERT INTO `authors` VALUES (336, 'Арутюнов Сергей Сергеевич');
INSERT INTO `authors` VALUES (337, 'Архиепископ Аверкий (Таушев)');
INSERT INTO `authors` VALUES (338, 'Архиепископ Андрей Кесарийский');
INSERT INTO `authors` VALUES (339, 'Архимандрит Спиридон (Кисляков)');
INSERT INTO `authors` VALUES (340, 'Архипенко Федор Федорович');
INSERT INTO `authors` VALUES (341, 'Архипкина Галина Дмитриевна');
INSERT INTO `authors` VALUES (342, 'Архиреев Виталий Борисович');
INSERT INTO `authors` VALUES (343, 'Аршамбо Ариана');
INSERT INTO `authors` VALUES (344, 'Арье Вера');
INSERT INTO `authors` VALUES (345, 'Арье Лев');
INSERT INTO `authors` VALUES (395, 'ас-Саади Абд ар-Рахман бин Насир');
INSERT INTO `authors` VALUES (346, 'Асадов Эдуард Аркадьевич');
INSERT INTO `authors` VALUES (347, 'Асвинн Фрейя');
INSERT INTO `authors` VALUES (348, 'Асеев Николай Николаевич');
INSERT INTO `authors` VALUES (349, 'Аска Кацура');
INSERT INTO `authors` VALUES (350, 'Аскинози Хизер');
INSERT INTO `authors` VALUES (351, 'Асмар Джо');
INSERT INTO `authors` VALUES (352, 'Асмус Джеймс');
INSERT INTO `authors` VALUES (353, 'Астамирова Хавра Саидовна');
INSERT INTO `authors` VALUES (354, 'Астафьев Виктор Петрович');
INSERT INTO `authors` VALUES (355, 'Астахов Павел Алексеевич');
INSERT INTO `authors` VALUES (356, 'Астахова Ах');
INSERT INTO `authors` VALUES (357, 'Астахова Л.');
INSERT INTO `authors` VALUES (358, 'Астахова Людмила В.');
INSERT INTO `authors` VALUES (359, 'Асфаров Олег');
INSERT INTO `authors` VALUES (360, 'Атай Елена Георгиевна');
INSERT INTO `authors` VALUES (361, 'Атаманов Михаил');
INSERT INTO `authors` VALUES (362, 'Атамашкин Валерий Владимирович');
INSERT INTO `authors` VALUES (363, 'Аткинс Карла');
INSERT INTO `authors` VALUES (364, 'Аткинсон Нэнси');
INSERT INTO `authors` VALUES (365, 'Аткинсон Уильям');
INSERT INTO `authors` VALUES (366, 'Аттенберг Джеми');
INSERT INTO `authors` VALUES (367, 'Аттли Элисон');
INSERT INTO `authors` VALUES (368, 'Атьков Олег Юрьевич');
INSERT INTO `authors` VALUES (369, 'Аувинен Карен');
INSERT INTO `authors` VALUES (370, 'Аурель Бронте');
INSERT INTO `authors` VALUES (371, 'Ауэл Джин М.');
INSERT INTO `authors` VALUES (372, 'Афанасьев Александр');
INSERT INTO `authors` VALUES (373, 'Афанасьев Александр Николаевич');
INSERT INTO `authors` VALUES (374, 'Афанасьев Валерий');
INSERT INTO `authors` VALUES (375, 'Афанасьев Владимир Владимирович');
INSERT INTO `authors` VALUES (376, 'Афанасьев Роман Сергеевич');
INSERT INTO `authors` VALUES (377, 'Афанасьева Наталия');
INSERT INTO `authors` VALUES (378, 'Афанасьева Ольга Васильевна');
INSERT INTO `authors` VALUES (379, 'Афанасьева Светлана Александровна');
INSERT INTO `authors` VALUES (380, 'Афинка');
INSERT INTO `authors` VALUES (381, 'Афлатуни Сухбат');
INSERT INTO `authors` VALUES (382, 'Афонина Алла Владимировна');
INSERT INTO `authors` VALUES (383, 'Ахмадулина Белла Ахатовна');
INSERT INTO `authors` VALUES (384, 'Ахманов Михаил Сергеевич');
INSERT INTO `authors` VALUES (385, 'Ахматова Анна Андреевна');
INSERT INTO `authors` VALUES (386, 'Ахметов Михаил');
INSERT INTO `authors` VALUES (387, 'Ахонен Юсси JP');
INSERT INTO `authors` VALUES (388, 'Ахременко Денис Анатольевич');
INSERT INTO `authors` VALUES (389, 'Ахремко Варвара Александровна');
INSERT INTO `authors` VALUES (396, 'аш-Шариф Мухаммад ибн Шакир');
INSERT INTO `authors` VALUES (390, 'Ашер Йэн');

-- ----------------------------
-- Table structure for book_authors
-- ----------------------------
DROP TABLE IF EXISTS `book_authors`;
CREATE TABLE `book_authors`  (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`author_id`, `book_id`) USING BTREE,
  INDEX `book_authors_books_FK`(`book_id`) USING BTREE,
  CONSTRAINT `book_authors_authors_FK` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `book_authors_books_FK` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_authors
-- ----------------------------
INSERT INTO `book_authors` VALUES (1, 10);
INSERT INTO `book_authors` VALUES (8, 10);
INSERT INTO `book_authors` VALUES (5, 11);
INSERT INTO `book_authors` VALUES (10, 11);

-- ----------------------------
-- Table structure for book_genres
-- ----------------------------
DROP TABLE IF EXISTS `book_genres`;
CREATE TABLE `book_genres`  (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`, `genre_id`) USING BTREE,
  INDEX `book_genres_genres_FK`(`genre_id`) USING BTREE,
  CONSTRAINT `book_genres_books_FK` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `book_genres_genres_FK` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_genres
-- ----------------------------
INSERT INTO `book_genres` VALUES (11, 4);
INSERT INTO `book_genres` VALUES (10, 7);
INSERT INTO `book_genres` VALUES (11, 8);
INSERT INTO `book_genres` VALUES (11, 10);

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `add_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `pic_id` int(11) NOT NULL,
  `publish_date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `books_name_INDEX`(`name`) USING BTREE,
  INDEX `books_pictures_FK`(`pic_id`) USING BTREE,
  CONSTRAINT `books_pictures_FK` FOREIGN KEY (`pic_id`) REFERENCES `pictures` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES (10, 'test2', '2019-11-19 23:02:44', 1, '2019-10-08');
INSERT INTO `books` VALUES (11, 'na', '2019-11-19 16:00:50', 1, '2019-11-14');

-- ----------------------------
-- Table structure for genres
-- ----------------------------
DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `genres`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genres
-- ----------------------------
INSERT INTO `genres` VALUES (2, 'Бизнес-книги');
INSERT INTO `genres` VALUES (16, 'Боевики, остросюжетная литература');
INSERT INTO `genres` VALUES (7, 'Детективы');
INSERT INTO `genres` VALUES (6, 'Детские книги');
INSERT INTO `genres` VALUES (21, 'Дом, семья, хобби и досуг');
INSERT INTO `genres` VALUES (4, 'Зарубежная литература');
INSERT INTO `genres` VALUES (33, 'Исторический роман');
INSERT INTO `genres` VALUES (3, 'Классическая литература');
INSERT INTO `genres` VALUES (14, 'Книги для подростков');
INSERT INTO `genres` VALUES (17, 'Книги по психологии');
INSERT INTO `genres` VALUES (22, 'Комиксы, манга');
INSERT INTO `genres` VALUES (29, 'Компьютерная литература');
INSERT INTO `genres` VALUES (28, 'Красота и здоровье');
INSERT INTO `genres` VALUES (24, 'Культура и искусство');
INSERT INTO `genres` VALUES (35, 'ЛГБТ');
INSERT INTO `genres` VALUES (15, 'Любовные романы');
INSERT INTO `genres` VALUES (34, 'Магический реализм');
INSERT INTO `genres` VALUES (20, 'Наука и образование');
INSERT INTO `genres` VALUES (31, 'Периодические издания');
INSERT INTO `genres` VALUES (18, 'Повести, рассказы');
INSERT INTO `genres` VALUES (19, 'Поэзия и драматургия');
INSERT INTO `genres` VALUES (11, 'Приключения');
INSERT INTO `genres` VALUES (13, 'Публицистическая литература');
INSERT INTO `genres` VALUES (26, 'Религия');
INSERT INTO `genres` VALUES (5, 'Русская литература');
INSERT INTO `genres` VALUES (27, 'Словари, справочники');
INSERT INTO `genres` VALUES (10, 'Современная проза');
INSERT INTO `genres` VALUES (12, 'Ужасы, мистика');
INSERT INTO `genres` VALUES (32, 'Учебная литература');
INSERT INTO `genres` VALUES (9, 'Фантастика');
INSERT INTO `genres` VALUES (8, 'Фэнтези');
INSERT INTO `genres` VALUES (23, 'Эзотерика');
INSERT INTO `genres` VALUES (30, 'Эротика и секс');
INSERT INTO `genres` VALUES (25, 'Юмористическая литература');

-- ----------------------------
-- Table structure for pictures
-- ----------------------------
DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storage_id` int(11) NOT NULL,
  `upload_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pictures_storages_FK`(`storage_id`) USING BTREE,
  CONSTRAINT `pictures_storages_FK` FOREIGN KEY (`storage_id`) REFERENCES `storages` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pictures
-- ----------------------------
INSERT INTO `pictures` VALUES (1, 1, '2019-11-17 16:43:07', 'default.png');

-- ----------------------------
-- Table structure for storages
-- ----------------------------
DROP TABLE IF EXISTS `storages`;
CREATE TABLE `storages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of storages
-- ----------------------------
INSERT INTO `storages` VALUES (1, '/static/images/');

SET FOREIGN_KEY_CHECKS = 1;

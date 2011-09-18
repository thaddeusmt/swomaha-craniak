-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2011 at 01:36 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swomaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `answer` text NOT NULL,
  `correct` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_answer_question1` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer`, `correct`) VALUES
(1, 1, '61', 0),
(2, 1, '53', 1),
(3, 1, '10', 0),
(4, 1, '1337', 0),
(5, 2, 'Titan', 1),
(6, 2, 'Rhea', 0),
(9, 2, 'Phoebe', 0),
(10, 2, 'Ijiraq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE IF NOT EXISTS `app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Course module' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `name`, `image`) VALUES
(1, 'Solar System', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('quiz','freeform') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_assessment_task1` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `task_id`, `name`, `type`) VALUES
(1, 1, 'Saturn Moons Quiz', 'quiz'),
(2, 2, 'Essay on our place in the universe', 'freeform');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_freeform`
--

CREATE TABLE IF NOT EXISTS `assessment_freeform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_id` int(10) unsigned NOT NULL,
  `prompt` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assessment_freeform_assessment1` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assessment_freeform`
--

INSERT INTO `assessment_freeform` (`id`, `assessment_id`, `prompt`) VALUES
(1, 2, 'Tell us about the scale of the solar system, and how the Earth fits in compared to the other planets.');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_question`
--

CREATE TABLE IF NOT EXISTS `assessment_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_id` int(10) unsigned NOT NULL,
  `points` int(11) NOT NULL,
  `prompt` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assessment_question_assessment1` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assessment_question`
--

INSERT INTO `assessment_question` (`id`, `assessment_id`, `points`, `prompt`) VALUES
(1, 1, 12, 'How many moons does Saturn have?'),
(2, 1, 15, 'Which moon is the biggest?');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_award_app1` (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `app_id`, `name`, `image`) VALUES
(1, 1, 'First Place', '/images/badges/first_place.png'),
(2, 1, 'Early Riser', '/images/badges/early_riser.png'),
(3, 1, 'Mystery', '/images/badges/mystery.png'),
(4, 1, 'Speed Demon', '/images/badges/speed_demon.png'),
(5, 1, 'Super Win', '/images/badges/super_win.png');

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE IF NOT EXISTS `challenge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` enum('video','reading','link','lecture') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_challenge_app1` (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `app_id`, `name`, `description`, `type`) VALUES
(1, 1, 'Explore the Moons of Saturn', '<p>Read the Wikipedia article below and answer the questions that follow.</p> <p> 	<a href="http://en.wikipedia.org/wiki/Moons_of_Saturn">http://en.wikipedia.org/wiki/Moons_of_Saturn</a></p>', 'reading'),
(2, 1, 'Scale of the Solar System', '<iframe width="420" height="315" src="http://www.youtube.com/embed/BS88G5WBcfQ" frameborder="0" allowfullscreen></iframe>', 'video');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE IF NOT EXISTS `criteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_freeform_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_criteria_task_assessment_freeform1` (`assessment_freeform_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `assessment_freeform_id`, `title`, `description`, `points`) VALUES
(1, 1, 'Talked about size of earth', 'Compared to other planets', 10),
(2, 1, 'Covered all planets', '', 10),
(3, 1, 'Good spelling and grammar', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Group of students' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'My Students');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `app_id` int(10) unsigned NOT NULL,
  `assessment_id` int(10) unsigned NOT NULL,
  `points` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_points_student1` (`student_id`),
  KEY `fk_points_app1` (`app_id`),
  KEY `fk_points_assessment1` (`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `points`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `first_name`, `last_name`, `avatar`) VALUES
(1, 1, 'Earthworm', 'Jim', NULL),
(2, 3, 'Sonic', 'Hedgehog', NULL),
(3, 4, 'Gordon', 'Freeman', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE IF NOT EXISTS `student_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `assessment_id` int(10) unsigned NOT NULL,
  `assessment_question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_answer_answer1` (`answer_id`),
  KEY `fk_student_answer_student1` (`student_id`),
  KEY `fk_student_answer_assessment1` (`assessment_id`),
  KEY `fk_student_answer_assessment_question1` (`assessment_question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_app`
--

CREATE TABLE IF NOT EXISTS `student_app` (
  `student_id` int(10) unsigned NOT NULL,
  `app_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`student_id`,`app_id`),
  KEY `fk_student_has_app_app1` (`app_id`),
  KEY `fk_student_has_app_student1` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_app`
--

INSERT INTO `student_app` (`student_id`, `app_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_award`
--

CREATE TABLE IF NOT EXISTS `student_award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `award_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_award_award1` (`award_id`),
  KEY `fk_student_award_student1` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_award`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_freeform`
--

CREATE TABLE IF NOT EXISTS `student_freeform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `submission` text NOT NULL,
  `assessment_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_freeform_assessment1` (`assessment_id`),
  KEY `fk_student_freeform_student1` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_freeform`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE IF NOT EXISTS `student_group` (
  `student_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`student_id`,`group_id`),
  KEY `fk_student_has_group_group1` (`group_id`),
  KEY `fk_student_has_group_student1` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`student_id`, `group_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_user1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher_app`
--

CREATE TABLE IF NOT EXISTS `teacher_app` (
  `teacher_id` int(10) unsigned NOT NULL,
  `app_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`teacher_id`,`app_id`),
  KEY `fk_teacher_has_app_app1` (`app_id`),
  KEY `fk_teacher_has_app_teacher` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_app`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher_group`
--

CREATE TABLE IF NOT EXISTS `teacher_group` (
  `teacher_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`teacher_id`,`group_id`),
  KEY `fk_teacher_has_group_group1` (`group_id`),
  KEY `fk_teacher_has_group_teacher1` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `type` enum('teacher','student') NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `type`, `password`) VALUES
(1, 'student@email.com', 'student', 'student'),
(2, 'teacher@email.com', 'teacher', 'student'),
(3, 'student2@email.com', 'student', 'student2'),
(4, 'student3@email.com', 'student', 'student3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `assessment_question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `fk_task_assessment_task1` FOREIGN KEY (`task_id`) REFERENCES `challenge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessment_freeform`
--
ALTER TABLE `assessment_freeform`
  ADD CONSTRAINT `fk_assessment_freeform_assessment1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessment_question`
--
ALTER TABLE `assessment_question`
  ADD CONSTRAINT `fk_assessment_question_assessment1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `fk_award_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `fk_challenge_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `fk_criteria_task_assessment_freeform1` FOREIGN KEY (`assessment_freeform_id`) REFERENCES `assessment_freeform` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_points_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_points_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_points_assessment1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD CONSTRAINT `fk_student_answer_assessment_question1` FOREIGN KEY (`assessment_question_id`) REFERENCES `assessment_question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_answer_answer1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_answer_assessment1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_answer_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_app`
--
ALTER TABLE `student_app`
  ADD CONSTRAINT `fk_student_has_app_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_has_app_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_award`
--
ALTER TABLE `student_award`
  ADD CONSTRAINT `fk_student_award_award1` FOREIGN KEY (`award_id`) REFERENCES `award` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_award_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_freeform`
--
ALTER TABLE `student_freeform`
  ADD CONSTRAINT `fk_student_freeform_assessment1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_freeform_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_group`
--
ALTER TABLE `student_group`
  ADD CONSTRAINT `fk_student_has_group_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_has_group_group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_app`
--
ALTER TABLE `teacher_app`
  ADD CONSTRAINT `fk_teacher_has_app_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_has_app_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_group`
--
ALTER TABLE `teacher_group`
  ADD CONSTRAINT `fk_teacher_has_group_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_has_group_group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON UPDATE CASCADE;

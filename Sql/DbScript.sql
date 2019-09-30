-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema campusmitra
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema campusmitra
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `campusmitra` DEFAULT CHARACTER SET utf8 ;
USE `campusmitra` ;

-- -----------------------------------------------------
-- Table `campusmitra`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`User` (
  `userid` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `userfirstname` VARCHAR(45) NOT NULL,
  `userlastname` VARCHAR(45) NULL,
  `userdob` VARCHAR(45) NULL,
  `userpassword` VARCHAR(45) NULL,
  `usertype` VARCHAR(45) NULL,
  `useremail` VARCHAR(60) NULL,
  `userpersonalmail` VARCHAR(60) NULL,
  `userimage` VARCHAR(100) NULL,
  `userfb` VARCHAR(150) NULL,
  `userlinkedin` VARCHAR(150) NULL,
  PRIMARY KEY (`userid`),
  UNIQUE INDEX `userid_UNIQUE` (`userid` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`user_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`user_contact` (
  `contactid` INT NOT NULL AUTO_INCREMENT,
  `usercontactnumber` VARCHAR(45) NULL,
  `userid` INT NOT NULL,
  PRIMARY KEY (`contactid`),
  INDEX `fk_user_contact_User_idx` (`userid` ASC) VISIBLE,
  CONSTRAINT `fk_user_contact_User`
    FOREIGN KEY (`userid`)
    REFERENCES `campusmitra`.`User` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`faculty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`faculty` (
  `facultyid` INT NOT NULL AUTO_INCREMENT,
  `User_userid` INT NOT NULL,
  `faculty_profile` VARCHAR(100) NULL,
  `availability_status` INT NULL,
  PRIMARY KEY (`facultyid`),
  INDEX `fk_faculty_User1_idx` (`User_userid` ASC) VISIBLE,
  CONSTRAINT `fk_faculty_User1`
    FOREIGN KEY (`User_userid`)
    REFERENCES `campusmitra`.`User` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Room` (
  `Roomid` INT NOT NULL AUTO_INCREMENT,
  `RoomNumber` VARCHAR(30) NOT NULL,
  `RoomBuilding` VARCHAR(45) NOT NULL,
  `RoomType` VARCHAR(45) NOT NULL,
  `RoomImage` VARCHAR(150) NULL,
  PRIMARY KEY (`Roomid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Lab`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Lab` (
  `Labid` INT NOT NULL AUTO_INCREMENT,
  `LabName` VARCHAR(45) NOT NULL,
  `LabPage` VARCHAR(45) NULL,
  `Lab_image` VARCHAR(100) NULL,
  `Room_Roomid` INT NOT NULL,
  `system_count` INT NULL,
  PRIMARY KEY (`Labid`),
  INDEX `fk_Lab_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  CONSTRAINT `fk_Lab_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`DiscussionRoom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`DiscussionRoom` (
  `DiscussionRoomid` INT NOT NULL AUTO_INCREMENT,
  `DiscussionRoomCapacity` INT NULL,
  `Room_Roomid` INT NOT NULL,
  PRIMARY KEY (`DiscussionRoomid`),
  INDEX `fk_DiscussionRoom_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  CONSTRAINT `fk_DiscussionRoom_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`LectureRoom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`LectureRoom` (
  `LectureRoomid` INT NOT NULL AUTO_INCREMENT,
  `LectureRoomCapacity` INT NULL,
  `LectureRoomcol` VARCHAR(150) NULL,
  `Room_Roomid` INT NOT NULL,
  PRIMARY KEY (`LectureRoomid`),
  INDEX `fk_LectureRoom_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  CONSTRAINT `fk_LectureRoom_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`ResearchLabs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`ResearchLabs` (
  `researchLabsid` INT NOT NULL AUTO_INCREMENT,
  `researchLabName` VARCHAR(45) NULL,
  `researchLabimage` VARCHAR(45) NULL,
  `researchLabVideo` VARCHAR(45) NULL,
  `researchLabWebpage` VARCHAR(100) NULL,
  `Room_Roomid` INT NOT NULL,
  `faculty_facultyid` INT NOT NULL,
  PRIMARY KEY (`researchLabsid`),
  INDEX `fk_ResearchLabs_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  INDEX `fk_ResearchLabs_faculty1_idx` (`faculty_facultyid` ASC) VISIBLE,
  CONSTRAINT `fk_ResearchLabs_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResearchLabs_faculty1`
    FOREIGN KEY (`faculty_facultyid`)
    REFERENCES `campusmitra`.`faculty` (`facultyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`faculty_office`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`faculty_office` (
  `facultyofficeid` INT NOT NULL AUTO_INCREMENT,
  `Roomid` INT NOT NULL,
  `facultyid` INT NOT NULL,
  PRIMARY KEY (`facultyofficeid`),
  INDEX `fk_faculty_office_Room1_idx` (`Roomid` ASC) VISIBLE,
  INDEX `fk_faculty_office_faculty1_idx` (`facultyid` ASC) VISIBLE,
  CONSTRAINT `fk_faculty_office_Room1`
    FOREIGN KEY (`Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_office_faculty1`
    FOREIGN KEY (`facultyid`)
    REFERENCES `campusmitra`.`faculty` (`facultyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`MeetingRoom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`MeetingRoom` (
  `meetingRoomId` INT NOT NULL AUTO_INCREMENT,
  `MeetingRoomCapacity` INT NULL,
  `Room_Roomid` INT NOT NULL,
  PRIMARY KEY (`meetingRoomId`),
  INDEX `fk_MeetingRoom_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  CONSTRAINT `fk_MeetingRoom_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Office_hours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Office_hours` (
  `office_hourid` INT NOT NULL AUTO_INCREMENT,
  `start_time` VARCHAR(45) NULL,
  `end_time` VARCHAR(45) NULL,
  `day` VARCHAR(45) NULL,
  `facultyid` INT NOT NULL,
  `DND` INT NULL,
  PRIMARY KEY (`office_hourid`),
  INDEX `fk_Office_hours_faculty1_idx` (`facultyid` ASC) VISIBLE,
  CONSTRAINT `fk_Office_hours_faculty1`
    FOREIGN KEY (`facultyid`)
    REFERENCES `campusmitra`.`faculty` (`facultyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Courses` (
  `course_id` INT NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(100) NULL,
  `faculty_facultyid` INT NOT NULL,
  PRIMARY KEY (`course_id`),
  INDEX `fk_Courses_faculty1_idx` (`faculty_facultyid` ASC) VISIBLE,
  CONSTRAINT `fk_Courses_faculty1`
    FOREIGN KEY (`faculty_facultyid`)
    REFERENCES `campusmitra`.`faculty` (`facultyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`TimeTable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`TimeTable` (
  `timetableid` INT NOT NULL AUTO_INCREMENT,
  `start_time` VARCHAR(45) NULL,
  `end_time` VARCHAR(45) NULL,
  `TimeTablecol` VARCHAR(45) NULL,
  `course_id` INT NOT NULL,
  `lectureRoomid` INT NOT NULL,
  PRIMARY KEY (`timetableid`),
  INDEX `fk_TimeTable_Courses1_idx` (`course_id` ASC) VISIBLE,
  INDEX `fk_TimeTable_LectureRoom1_idx` (`lectureRoomid` ASC) VISIBLE,
  CONSTRAINT `fk_TimeTable_Courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `campusmitra`.`Courses` (`course_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TimeTable_LectureRoom1`
    FOREIGN KEY (`lectureRoomid`)
    REFERENCES `campusmitra`.`LectureRoom` (`LectureRoomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Student` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `student_rollnumber` VARCHAR(45) NOT NULL,
  `area_interest` VARCHAR(150) NULL,
  `User_userid` INT NOT NULL,
  `resume` VARCHAR(50) NULL,
  PRIMARY KEY (`student_id`),
  INDEX `fk_Student_User1_idx` (`User_userid` ASC) VISIBLE,
  CONSTRAINT `fk_Student_User1`
    FOREIGN KEY (`User_userid`)
    REFERENCES `campusmitra`.`User` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Appointment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Appointment` (
  `appointmentid` INT NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(45) NULL,
  `time` VARCHAR(45) NULL,
  `facultyid` INT NOT NULL,
  `appointment_status` INT NULL,
  `Student_student_id` INT NOT NULL,
  `appointment_remarks` VARCHAR(200) NULL,
  PRIMARY KEY (`appointmentid`),
  INDEX `fk_Appointment_faculty1_idx` (`facultyid` ASC) VISIBLE,
  INDEX `fk_Appointment_Student1_idx` (`Student_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_Appointment_faculty1`
    FOREIGN KEY (`facultyid`)
    REFERENCES `campusmitra`.`faculty` (`facultyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Appointment_Student1`
    FOREIGN KEY (`Student_student_id`)
    REFERENCES `campusmitra`.`Student` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Booking` (
  `booking_id` INT NOT NULL AUTO_INCREMENT,
  `booking_remarks` VARCHAR(45) NULL,
  `Room_Roomid` INT NOT NULL,
  `book_start_time` VARCHAR(45) NULL,
  `book_end_time` VARCHAR(45) NULL,
  `book_date` VARCHAR(45) NULL,
  PRIMARY KEY (`booking_id`),
  INDEX `fk_Booking_Room1_idx` (`Room_Roomid` ASC) VISIBLE,
  CONSTRAINT `fk_Booking_Room1`
    FOREIGN KEY (`Room_Roomid`)
    REFERENCES `campusmitra`.`Room` (`Roomid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Project` (
  `projectid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `description` VARCHAR(150) NULL,
  `project_link` VARCHAR(45) NULL,
  `ResearchLabs_researchLabsid` INT NOT NULL,
  `project_image` VARCHAR(150) NULL,
  `project_video` VARCHAR(150) NULL,
  PRIMARY KEY (`projectid`),
  INDEX `fk_Project_ResearchLabs1_idx` (`ResearchLabs_researchLabsid` ASC) VISIBLE,
  CONSTRAINT `fk_Project_ResearchLabs1`
    FOREIGN KEY (`ResearchLabs_researchLabsid`)
    REFERENCES `campusmitra`.`ResearchLabs` (`researchLabsid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campusmitra`.`Student_in_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campusmitra`.`Student_in_courses` (
  `Student_student_id` INT NOT NULL,
  `Courses_course_id` INT NOT NULL,
  PRIMARY KEY (`Student_student_id`, `Courses_course_id`),
  INDEX `fk_Student_has_Courses_Courses1_idx` (`Courses_course_id` ASC) VISIBLE,
  INDEX `fk_Student_has_Courses_Student1_idx` (`Student_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_Student_has_Courses_Student1`
    FOREIGN KEY (`Student_student_id`)
    REFERENCES `campusmitra`.`Student` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_has_Courses_Courses1`
    FOREIGN KEY (`Courses_course_id`)
    REFERENCES `campusmitra`.`Courses` (`course_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

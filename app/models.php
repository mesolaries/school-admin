<?php

/**
 *
 */
class Student
{
  function add_student($db, $name)
  {
    $sql = "INSERT INTO `students` (`name`) VALUES ('$name')";
    $db->query($sql);
  }

  function get_students($db)
  {
    $sql = "SELECT * FROM `students`";
    $result = $db->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  function edit_student($db, $id, $name)
  {
    $sql = "UPDATE `students` SET `name`='$name' WHERE `id` = '$id'";
    $db->query($sql);
  }

  function delete_student($db, $id)
  {
    $sql = "DELETE FROM `students` WHERE `id` = '$id'";
    $db->query($sql);
  }

  function get_student_by_id($db, $id)
  {
    $sql = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = $db->query($sql);
    $row = $result->fetch();
    return $row;
  }
}


class Subject
{
  function add_subject($db, $name)
  {
    $sql = "INSERT INTO `subjects` (`name`) VALUES ('$name')";
    $db->query($sql);
  }

  function get_subjects($db)
  {
    $sql = "SELECT * FROM `subjects`";
    $result = $db->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  function edit_subject($db, $id, $name)
  {
    $sql = "UPDATE `subjects` SET `name`='$name' WHERE `id` = '$id'";
    $db->query($sql);
  }

  function subject_exists($db, $name)
  {
    $sql = "SELECT * FROM `subjects` WHERE `name` = '$name'";
    $check = $db->query($sql);
    $count = $check->rowCount();
    if ($count > 0) {
      return true;
    }
    return false;
  }

  function delete_subject($db, $id)
  {
    $sql = "DELETE FROM `subjects` WHERE `id` = '$id'";
    $db->query($sql);
  }

  function get_subject_by_id($db, $id)
  {
    $sql = "SELECT * FROM `subjects` WHERE `id` = '$id'";
    $result = $db->query($sql);
    $row = $result->fetch();
    return $row;
  }
}



class Ratings
{
  function get_ratings($db, $st_id, $sb_id, $start_date, $end_date)
  {
    $sql = "SELECT * FROM `ratings` ";
    $sql .= "WHERE `student` = '$st_id' AND `subject` = '$sb_id' ";
    $sql .= "AND `date` BETWEEN '$start_date' AND '$end_date' ";
    $sql .= "ORDER BY `date` DESC";
    $result = $db->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  function get_rating_by_date($db, $st_id, $sb_id, $date)
  {
    $sql = "SELECT * FROM `ratings` WHERE `date` = '$date' AND `student` = '$st_id' AND `subject` = '$sb_id'";
    $result = $db->query($sql);
    $row = $result->fetch();
    return $row;
  }

  function get_all_ratings($db, $st_id, $start_date, $end_date) {
    $sql = "SELECT * FROM `ratings` WHERE `student` = '$st_id'";
    $sql .= "AND `date` BETWEEN '$start_date' AND '$end_date'";
    $result = $db->query($sql);
    $row = $result->fetchAll();
    return $row;
  }

  function get_rating_average($db, $st_id, $sb_array, $start_date, $end_date) {
    foreach ($sb_array as $sb) {
      $ratings = $this->get_ratings($db, $st_id, $sb['id'], $start_date, $end_date);
      foreach ($ratings as $rating) {
        if ($rating['rating'] != "") {
          $rating_array[] = $rating['rating'];
        }
      }
    }
    if ($rating_array) {
      $avg = array_sum($rating_array) / count($rating_array);
      return round($avg * 100) / 100;
    }
    return " ";
  }

  function get_ra_by_subject($db, $st_id, $sb_id, $start_date, $end_date) {
    $ratings = $this->get_ratings($db, $st_id, $sb_id, $start_date, $end_date);
    foreach ($ratings as $rating) {
      if ($rating['rating'] != "") {
        $rating_array[] = $rating['rating'];
      }
    }
    if ($rating_array) {
      $avg = array_sum($rating_array) / count($rating_array);
      return round($avg * 100) / 100;
    }
    return " ";
  }

  function check($db, $st_id, $sb_id, $date) {
    $sql = "SELECT * FROM `ratings` WHERE `student` = '$st_id' ";
    $sql .= "AND `subject` = '$sb_id' AND `date` = '$date'";
    $result = $db->query($sql);
    $row = $result->fetch();
    if ($row) {
       return true;
    }
     return false;
  }

  function add_rating($db, $st_id, $sb_id, $date, $rate)
  {
    $vld = new Validator;
    $not_valid = $vld->rating_is_not_valid($rate);
    if (!$not_valid) {
      if ($this->check($db, $st_id, $sb_id, $date)) {
        $sql = "UPDATE `ratings` SET `rating` = '$rate' ";
        $sql .= "WHERE `student` = '$st_id' AND `subject` = '$sb_id' ";
        $sql .= "AND `date` = '$date'";
      } else {
        $sql = "INSERT INTO `ratings` (`student`, `subject`, `rating`, `date`) ";
        $sql .= "VALUES ('$st_id', '$sb_id', '$rate', '$date')";
      }
      $db->query($sql);
    } else {
      echo $not_valid;
    }
  }
}


class Validator
{
  function rating_is_not_valid($rate) {
    if ($rate == "") {
      return false;
    } else {
      if (!($rate <= 5 && $rate >= 2)) {
        return "Enter rating between 2 and 5";
      } else {
        return false;
      }
    }
  }
}

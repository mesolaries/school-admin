<?php
include 'db.php';
include 'models.php';

if (isset($_POST['add'])) {
  $add = $_POST['add'];
} elseif (isset($_POST['edit'])) {
  $edit = $_POST['edit'];
} elseif (isset($_POST['delete'])) {
  $delete = $_POST['delete'];
} elseif ($_POST['rating_student'] == true) {
  $ratings = new Ratings;
  $date = $_POST['date'];
  $rate = $_POST['rate'];
  $student = $_POST['student_id'];
  $subject = $_POST['subject_id'];
  $ratings->add_rating($db, $student, $subject, $date, $rate);
}

if (isset($add)) {
  switch ($add) {
    case 'student':
      $student = new Student;
      $name = $_POST['name'];
      $student->add_student($db, $name);
      break;
    case 'subject':
      $subject = new Subject;
      $name = $_POST['name'];
      if (!$subject->subject_exists($db, $name)) {
        $subject->add_subject($db, $name);
      } else {
        echo 'exists';
      }
      break;
  }
} elseif (isset($edit)) {
    switch ($edit) {
      case 'student':
        $student = new Student;
        $name = $_POST['name'];
        $id = $_POST['id'];
        $student->edit_student($db, $id, $name);
        break;
      case 'subject':
        $subject = new Subject;
        $name = $_POST['name'];
        $id = $_POST['id'];
        if (!$subject->subject_exists($db, $name)) {
          $subject->edit_subject($db, $id, $name);
        } else {
          echo 'exists';
        }
    }
} elseif (isset($delete)) {
    switch ($delete) {
      case 'student':
        $student = new Student;
        $id = $_POST['id'];
        $student->delete_student($db, $id);
        break;
      case 'subject':
      $subject = new Subject;
      $id = $_POST['id'];
      $subject->delete_subject($db, $id);
      break;
    }
}

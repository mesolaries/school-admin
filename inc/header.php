<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php' ?>
<?php include PATH . '/app/db.php'; ?>
<?php include PATH . '/app/models.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>School</title>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/style.css">
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="/">School</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item
              <?php if ($_SERVER['SCRIPT_NAME'] == '/index.php'): ?>
                active
              <?php endif; ?>">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item
              <?php if ($_SERVER['SCRIPT_NAME'] == '/rate_student.php'): ?>
                active
              <?php endif; ?>">
                <a id='rate-student-nav' class="nav-link" href="#" data-toggle="modal" data-target="#rateStudentModal">
                  Rate students
                </a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <span class="navbar-text" href="#">
                  Students
                </span>
                  <a class="d-inline nav-link" href="#" data-toggle="modal" data-target="#addStudentModal"><i class="fa fa-plus"></i></a>
                  <a id='edit-student-nav' class="d-inline nav-link" href="#" data-toggle="modal" data-target="#editStudentModal"><i class="fa fa-pencil"></i></a>
                  <a id='delete-student-nav' class="d-inline nav-link" href="#" data-toggle="modal" data-target="#deleteStudentModal"><i class="fa fa-times"></i></a>
              </li>
              <li class="nav-item border-left pl-2">
                <span class="navbar-text" href="#">
                  Subjects
                </span>
                  <a class="d-inline nav-link" href="#" data-toggle="modal" data-target="#addSubjectModal"><i class="fa fa-plus"></i></a>
                  <a id="edit-subject-nav" class="d-inline nav-link" href="#" data-toggle="modal" data-target="#editSubjectModal"><i class="fa fa-pencil"></i></a>
                  <a id="delete-subject-nav" class="d-inline nav-link" href="#" data-toggle="modal" data-target="#deleteSubjectModal"><i class="fa fa-times"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php' ?>
<?php include_once PATH . '/app/db.php'; ?>
<?php include_once PATH . '/app/models.php'; ?>
<?php $studentClass = new Student; ?>
<?php $students = $studentClass->get_students($db); ?>
<?php foreach ($students as $student): ?>
  <option value="<?php echo $student['id'] ?>"><?php echo $student['name']; ?></option>
<?php endforeach; ?>

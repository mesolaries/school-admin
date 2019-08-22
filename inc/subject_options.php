<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php' ?>
<?php include_once PATH . '/app/db.php'; ?>
<?php include_once PATH . '/app/models.php'; ?>
<?php $subjectClass = new Subject; ?>
<?php $subjects = $subjectClass->get_subjects($db); ?>
<?php foreach ($subjects as $subject): ?>
  <option value="<?php echo $subject['id'] ?>"><?php echo $subject['name']; ?></option>
<?php endforeach; ?>

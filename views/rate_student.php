<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php' ?>
<?php include PATH . '/inc/header.php'; ?>
<?php include_once PATH . '/app/models.php'; ?>
<?php
$student_id = $_GET['student_id'];
$subject_id = $_GET['subject_id'];
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$rtgs = new Ratings;
$stdnt = new Student;
$sbjct = new Subject;
$ratings = $rtgs->get_ratings($db, $student_id, $subject_id, $start_date, $end_date);
$student = $stdnt->get_student_by_id($db, $student_id);
$subject = $sbjct->get_subject_by_id($db, $subject_id);
$student_name = $student['name'];
$subject_name = $subject['name'];






 ?>


<div class="table-responsive">
  <table class="table text-nowrap">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student</th>
        <th scope="col">Subject</th>
        <?php for ($i = $end_date; $i >= $start_date; $i = date("Y-m-d", strtotime($i . ' -1 day'))): ?>
          <th scope="col">
            <?php echo date("d M Y", strtotime($i . ' -1 day')); ?>
          </th>
          <?php if ($rtgs->check($db, $student_id, $subject_id, $i)): ?>
            <?php $rating_by_date = $rtgs->get_rating_by_date($db, $student_id, $subject_id, $i); ?>
            <?php $rating_array[] = array('rate' => $rating_by_date['rating'], 'date' => $rating_by_date['date']); ?>
          <?php else: ?>
            <?php $rating_array[] = ['rate' => "", 'date' => $i]; ?>
          <?php endif; ?>
        <?php endfor; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td><?php echo $student_name; ?></td>
        <td><?php echo $subject_name; ?></td>
        <?php foreach ($rating_array as $rating): ?>
          <td class="hover text-center white-tooltip" data-toggle="tooltip" data-placement="right" title="Double click to rate">
            <span class="text"><?php echo $rating['rate']; ?></span>
            <input class="st_id" type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
            <input class="sb_id" type="hidden" name="subject_id" value="<?php echo $subject['id']; ?>">
            <input class="date" type="hidden" name="date" value="<?php echo $rating['date']; ?>">
            <input class="edit_rating w-100" type="number" min="2" max="5" name="rating" value="<?php echo $rating['rate']; ?>">
          </td>
        <?php endforeach; ?>
      </tr>
    </tbody>
  </table>
</div>
<div class="alert alert-danger alert-dismissible invisible" role="alert">
  Enter valid rating <span class="font-weight-bold">between 2 and 5</span>.
</div>









<?php include PATH . '/inc/footer.php'; ?>

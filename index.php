<?php include 'inc/header.php'; ?>
<?php include_once 'app/models.php'; ?>
<?php


$stdnt = new Student;
$sbjct = new Subject;
$rtgs = new Ratings;

if (isset($_GET['students'])) {
  $students = $_GET['students'];
  foreach ($students as $st_id) {
    $student = $stdnt->get_student_by_id($db, $st_id);
    $student_array[] = $student;
  }
} else {
  $student_array = $stdnt->get_students($db);
}


if (isset($_GET['subjects'])) {
  $subjects = $_GET['subjects'];
  foreach ($subjects as $sb_id) {
    $subject = $sbjct->get_subject_by_id($db, $sb_id);
    $subject_array[] = $subject;
  }
} else {
  $subject_array = $sbjct->get_subjects($db);
}


$today = date("Y-m-d", time()); // End date
$start_date = date("Y-m-d", strtotime($today . ' -60 day')); // Default: 60 days ago

if (isset($_GET['start_date'], $_GET['end_date'])) {
  $today = $_GET['end_date'];
  $start_date = $_GET['start_date'];
}



 ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <h1 class="display-4">Ratings report</h1>
    </div>
    <div class="col-6 align-self-end text-right mb-2">
      <button id="filter_report_btn" class="btn btn-light" type="button" data-toggle="modal" data-target="#filterReportModal">Filter</button>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-light text-nowrap">
    <thead class="thead-dark">
      <tr>
        <th scope="col" rowspan="2" class="align-middle">#</th>
        <th scope="col" rowspan="2" class="align-middle">Students</th>
        <?php $count_date=0; ?>
        <?php for ($i = $today; $i >= $start_date; $i = date("Y-m-d", strtotime($i . ' -1 day'))): ?>
          <th class="text-center" scope="col" colspan="<?php echo count($subject_array); ?>"><?php echo date("d M Y", strtotime($i)) ?></th>
          <?php $count_date++ ?>
        <?php endfor; ?>
        <th scope="col" class="text-center" colspan="<?php echo count($subject_array); ?>">RA by subject</th>
        <th rowspan="2" class="text-center align-middle">Rating Average</th>
      </tr>
      <tr class="">
        <?php for ($i = 0; $i <= $count_date; $i++): ?>
          <?php foreach ($subject_array as $subject): ?>
            <th class="font-weight-light text-center"><?php echo $subject['name']; ?></th>
          <?php endforeach; ?>
        <?php endfor; ?>
      </tr>
    </thead>
    <tbody>
      <?php $count = 0; ?>
      <?php foreach ($student_array as $student): ?>
        <?php $count++; ?>
        <tr class="text-center">
          <th scope="row"><?php echo $count; ?></th>
          <td class="text-left"><?php echo $student['name']; ?></td>
          <?php for ($i = $today; $i >= $start_date; $i = date("Y-m-d", strtotime($i . ' -1 day'))): ?>
          <?php foreach ($subject_array as $subject): ?>

              <?php $rating = $rtgs->get_rating_by_date($db, $student['id'], $subject['id'], $i) ?>
              <td>
                <?php echo $rating['rating']; ?>
              </td>

          <?php endforeach; ?>
          <?php endfor; ?>
          <?php foreach ($subject_array as $subject): ?>

              <?php $ra_by_subject = $rtgs->get_ra_by_subject($db, $student['id'], $subject['id'], $start_date, $today) ?>
              <td class="font-italic text-center">
                <?php echo $ra_by_subject; ?>
              </td>

          <?php endforeach; ?>
          <?php $rating_average = $rtgs->get_rating_average($db, $student['id'], $subject_array, $start_date, $today); ?>
          <td class="font-italic font-weight-bold text-center">
            <?php echo $rating_average ?>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
  </div>



</div>

<?php include 'inc/footer.php'; ?>

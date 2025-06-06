<?php
// index.php - Input Form Page
/*
    Program: Computation of Grades using Function
    Programmer: Aliyah Belleza
    Section: AN21
    Start Date: May 31, 2025
    End Date: June 6, 2025
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Grade Input</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f3faff;
      padding: 30px;
      color: #333;
    }
    .container {
      max-width: 800px;
      margin: auto;
      background-color: #fff;
      border-radius: 10px;
      padding: 20px 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #2196f3;
    }
    label {
      display: block;
      margin-top: 12px;
    }
    input[type="number"], input[type="text"] {
      width: 95%;
      padding: 8px;
      margin-top: 4px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    input[type="submit"] {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #43a047;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Student Grade Calculator</h2>

  <?php if (!isset($_POST['student_count'])): ?>
  <!-- Step 1: If student_count is not yet set, ask how many students the user wants to input -->
  <form method="post">
    <label for="student_count">How many students? (max 5)</label>
    <input type="number" name="student_count" min="1" max="5" required>
    <input type="submit" value="Next">
  </form>

<?php else: 
  // Step 2: student_count is set, convert it to an integer
  $count = (int)$_POST['student_count'];
?>

  <!-- Show the grade input form for each student -->
  <form method="post" action="an21_ABelleza_machineProblem1_results.php">
    <!-- Pass along the student count to results.php -->
    <input type="hidden" name="student_count" value="<?= $count ?>">

    <?php for ($i = 1; $i <= $count; $i++): ?>
      <!-- Repeat this fieldset for each student -->
      <fieldset style="margin-top: 20px; padding: 15px; border: 1px solid #ccc;">
        <legend><strong>Student <?= $i ?></strong></legend>

        <!-- Input field for student name -->
        <label>Name:</label>
        <input type="text" name="name[]" required>

        <!-- Input fields for 5 enabling assessments -->
        <label>Enabling Assessments (5):</label>
        <?php for ($j = 0; $j < 5; $j++): ?>
          <!-- Grouped by student index (i - 1) -->
          <input type="number" name="enabling[<?= $i - 1 ?>][]" min="0" max="100" required>
        <?php endfor; ?>

        <!-- Input fields for 3 summative assessments -->
        <label>Summative Assessments (3):</label>
        <?php for ($j = 0; $j < 3; $j++): ?>
          <!-- Grouped by student index (i - 1) -->
          <input type="number" name="summative[<?= $i - 1 ?>][]" min="0" max="100" required>
        <?php endfor; ?>

        <!-- Input field for final exam grade -->
        <label>Final Exam:</label>
        <input type="number" name="exam[]" min="0" max="100" required>
      </fieldset>
    <?php endfor; ?>

    <!-- Submit button to calculate grades -->
    <input type="submit" value="Calculate Grades">
  </form>
<?php endif; ?>

</div>
</body>
</html>

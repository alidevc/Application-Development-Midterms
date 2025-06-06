<?php
// results.php - Grade Calculation Page
/*
    Program: Computation of Grades using Function
    Programmer: Aliyah Belleza
    Section: AN21
    Start Date: May 31, 2025
    End Date: June 6, 2025
*/

// User-defined function to compute average
define("MAX_GRADE", 100);
function compute_average($grades) {
  return round(array_sum($grades) / count($grades));
}

// User-defined function to get letter grade
function get_letter_grade($score) {
  if ($score >= 90) return 'A';
  elseif ($score >= 80) return 'B';
  elseif ($score >= 70) return 'C';
  elseif ($score >= 60) return 'D';
  else return 'F';
}

// Extract POST data
$names = $_POST['name'];
$enabling = $_POST['enabling'];
$summative = $_POST['summative'];
$exams = $_POST['exam'];
$student_count = $_POST['student_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Grade Results</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      padding: 30px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #e91e63;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }
    th, td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ddd;
    }
    th {
      background-color: #fce4ec;
      color: #880e4f;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #2196f3;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Student Grade Report</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Class Participation</th>
      <th>Summative Grade</th>
      <th>Exam Grade</th>
      <th>Grade Score</th>
      <th>Letter Grade</th>
    </tr>
    <?php 
        // Loop through each student
        for ($i = 0; $i < $student_count; $i++): 

        // Compute average of the 5 enabling assessments for student $i
        $cp = compute_average($enabling[$i]);

        // Compute average of the 3 summative assessments for student $i
        $sg = compute_average($summative[$i]);

        // Get the final exam grade for student $i
        $exam = $exams[$i];

        // Calculate the final grade using the formula:
        // 30% Class Participation + 30% Summative + 40% Final Exam
        $final = round(($cp * 0.3) + ($sg * 0.3) + ($exam * 0.4));

        // Determine the letter grade based on the final score
        $letter = get_letter_grade($final);
        ?>

        <!-- Display student data as a row in the result table -->
        <tr>
            <!-- Escape name to prevent XSS -->
            <td><?= htmlspecialchars($names[$i]) ?></td>
            <td><?= $cp ?></td>
            <td><?= $sg ?></td>
            <td><?= $exam ?></td>
            <td><?= $final ?></td>
            <td><?= $letter ?></td>
        </tr>
    <?php endfor; ?>

  </table>
  <a href="an21_ABelleza_machineProblem1.php">&larr; Go Back</a>
</div>
</body>
</html>

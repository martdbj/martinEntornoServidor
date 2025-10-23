<?php
$students = [
    ['name' => 'Alice', 'grades' => [85, 78, 92]],
    ['name' => 'Bob', 'grades' => [58, 62, 48]],
    ['name' => 'Charlie', 'grades' => [95, 100, 97]],
    ['name' => 'Diana', 'grades' => [60, 70, 65]],
    ['name' => 'Eve', 'grades' => [40, 50, 55]],
];
$studentAverage = [];
foreach ($students as $student) {
    $totalGrades = 0;
    $gradeNumber = 0;

    $totalGrades = array_sum($student['grades']);
    $average = averageScore($totalGrades, count($student['grades']));
    
    echo $student['name'] . " " . round($average, 2) . "\n";
    
    $studentAverage[$student['name']] = round($average, 2);
}

uasort($studentAverage, "sortDesc");
print_r($studentAverage);

function sortDesc($a, $b) {
    if ($a == $b) return 0;
    return ($a < $b) ? 1 : -1;
}

function averageScore($totalScore, $numberSubjects) {
    return $totalScore / $numberSubjects;
}

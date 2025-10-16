<?php
$studentMarks = [
    "Jhon" => [
        "Biology" => 7.9,
        "Maths" => 10
    ],
    "Matthew" => [
        "Biology" => 3.9,
        "Maths" => 10
    ]
];

//extractStudentNames($studentMarks);

//averageSubject($studentMarks, "Maths");

//studentAverage($studentMarks, "Matthew");

showMarks2($studentMarks, "Matthew");

// Function that extract student names
function extractStudentNames($studentMarks) {
    $arrayNames = [];
    foreach ($studentMarks as $name => $mark) {
        array_push($arrayNames, $name);            
    }
    print_r($arrayNames);
}

// Function that calculates the average of a specific subject
function averageSubject($studentMarks, $inputSubject) {
    $totalMark = 0;
    $counter = 0;
    foreach ($studentMarks as $name => $subjectArray) {
        foreach ($subjectArray as $subject => $mark) {
            if ($inputSubject == $subject) {
                $totalMark += $mark;
                $counter ++;
            }
        }
    }
    $average = $totalMark / $counter;
    echo "The average of $inputSubject is $average";
}

// Calculates the average of a student
function studentAverage($studentMarks, $studentName) {
    $numberSubject = 0;
    $totalMark = 0;
    foreach ($studentMarks as $name => $subjectArray) {
        foreach ($subjectArray as $subject => $mark) {
            if ($name == $studentName) {
                $totalMark += $mark;
                $numberSubject ++;
            } 
        }
    }
    $studentAverage = $totalMark / $numberSubject;
    echo "$studentName average is $studentAverage";
}

// Check if student exists and if so, show it's marks
function showMarks2($studentMarks, $studentName) {
    if (array_key_exists($studentName, $studentMarks)){
        $alum = $studentMarks[$studentName];
        foreach ($alum as $subject => $mark) {
                echo "$subject = $mark \n";
            }
    }else{
        echo "Error. The student doesn't exist";
    }
}

// Check if student exists and if so, show it's marks
function showMarks($studentMarks, $studentName) {
    $studentExistance = false;
    foreach ($studentMarks as $name => $subjectArray) {
        foreach ($subjectArray as $subject => $mark) {
            if ($name == $studentName) {
                echo "$subject = $mark \n";
                $studentExistance = true;
            } 
        }
    }
    if (!$studentExistance) {
        echo "Error. The student doesn't exist";
    }
}
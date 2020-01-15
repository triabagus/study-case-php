<?php
//sumber : https://stackoverflow.com/questions/33221325/php-html-timetable-with-messed-up-html-cells
$days   = [
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu'
];

$times  =  [
    '08.00 - 09.00',
    '09.00 - 10.00',
    '10.00 - 11.00',
    '11.00 - 12.00',
    '12.00 - 13.00',
];

$class = [
    'Kelas 1',    
    'Kelas 2',    
    'Kelas 3',    
    'Kelas 4',    
    'Kelas 5'    
];

$guru = [
    'Guru 1',
    'Guru 2',
    'Guru 3',
    'Guru 4',
    'Guru 5'
];

$timetable   = [
    [
        'Senin',
        '08.00 - 09.00',
        'Guru 1',
        'Kelas 1',
        'Pelajaran 1'
    ],

    [
        'Senin',
        '10.00 - 11.00',
        'Guru 2',
        'Kelas 2',
        'Pelajaran 2'
    ],

    [
        'Kamis',
        '10.00 - 11.00',
        'Guru 3',
        'Kelas 3',
        'Pelajaran 3'
    ],

    [
        'Jumat',
        '10.00 - 11.00',
        'Guru 4',
        'Kelas 4',
        'Pelajaran 4'
    ],

    [
        'Sabtu',
        '11.00 - 12.00',
        'Guru 5',
        'Kelas 5',
        'Pelajaran 5'
    ]

];

$schedule = [];

foreach ($timetable as $tt) {
    // $schedule[] = $tt[0];  // day in timetable
    foreach($days as $x) {
        if ( $tt[0] == $x)
        {
            // $schedule[] = $x; // day in days
            $schedule["{$x}"][$tt[1]][] = $tt[2];
        }

    }

}

$scheduleWhereKelas = [];
$scheduleWhereKelasPelajaran = [];

foreach ($class as $c) {
    // $scheduleWhereKelas[] = $c;  // kelas
    foreach ($timetable as $tt) {
        // $schedule[] = $tt[0];  // day in timetable
        foreach($days as $x) {
            if ( $tt[0] == $x && $tt[3] == $c)
            {
                $scheduleWhereKelas["{$x}"]["{$c}"][$tt[1]][] = $tt[2];
                $scheduleWhereKelasPelajaran["{$x}"]["{$c}"][$tt[1]][] = $tt[4];
            }
    
        }
    
    }
}

$scheduleWhereGuru = [];
foreach ($guru as $g) {
    // $scheduleWhereGuru[] = $g;  // guru
    foreach ($timetable as $tt) {
        // $schedule[] = $tt[0];  // day in timetable
        foreach($days as $x) {
            if ( $tt[0] == $x && $tt[2] == $g)
            {
                // $scheduleWhereGuru[] = $tt[2];  // day in timetable
                $scheduleWhereGuru["{$x}"]["{$g}"][$tt[1]][] = $tt[3];
            }
    
        }
    }
}

var_dump($schedule);
echo "<br><br>";
var_dump($scheduleWhereKelas);
echo "<br><br>";
var_dump($scheduleWhereKelasPelajaran);
echo "<br><br>";
var_dump($scheduleWhereGuru);
?>
<br>
<br>
<br>
<table border="1">
    <tr><td align="center"></td>

<?php 
foreach ( $times as $t ) {
    echo "<td>  $t </td>";
}
    echo "</tr>";

foreach ( $days as $x => $x_value) {
    echo "<tr><td>$x_value</td>";

    // roll through days
    foreach ( $times as $t ) {
        echo '<td align="center">';
        // check for subjects in this slot
        if ( isset($schedule[$x_value][$t]) ) {
            // and display each
            foreach ( $schedule[$x_value][$t] as $subject ) {
                echo "$subject<br>";
            }

        }else{
            echo '-';
        }
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>

<br>
<br>
<br>
<div style="width:50%;float:left;">
<?php
foreach ($class as $c) {
?>
<table border="1">
    <tr><td align="center"><b><?= $c; ?></b></td>

<?php 
foreach ( $times as $t ) {
    echo "<td>  $t </td>";
}
    echo "</tr>";

foreach ( $days as $x => $x_value) {
    echo "<tr><td>$x_value</td>";

    // roll through days
    foreach ( $times as $t ) {
        echo '<td align="center">';
        // check for subjects in this slot
        if ( isset($scheduleWhereKelas[$x_value][$c][$t]) ) {
            // and display each
            foreach ( $scheduleWhereKelas[$x_value][$c][$t] as $subject ) {
                echo "$subject<br>";
            }
            foreach ( $scheduleWhereKelasPelajaran[$x_value][$c][$t] as $pelajaran ) {
                echo "$pelajaran<br>";
            }

        }else{
            echo '-';
        }
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table><br>';

}
?>
</div>
<div style="width:50%;float:left;">
<?php
foreach ($guru as $g) {
?>
<table border="1">
    <tr><td align="center"><b><?= $g; ?></b></td>

<?php 
foreach ( $times as $t ) {
    echo "<td>  $t </td>";
}
    echo "</tr>";

foreach ( $days as $x => $x_value) {
    echo "<tr><td>$x_value</td>";

    // roll through days
    foreach ( $times as $t ) {
        echo '<td align="center">';
        // check for subjects in this slot
        if ( isset($scheduleWhereGuru[$x_value][$g][$t]) ) {
            // and display each
            foreach ( $scheduleWhereGuru[$x_value][$g][$t] as $subject ) {
                echo "$subject<br>";
            }

        }else{
            echo '-';
        }
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table><br>';

}
?>
</div>
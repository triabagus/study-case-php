<?php
global $schedules, $start, $leap, $duration, $leapWidth;
 
$start = '00:00'; // waktu kolom pertama
$leap = 60; // jumlah menit antar kolom
$duration = 60 * 24;  //jumlah menit total = 24 jam
$leapWidth = 120; // pixel, lebar per kolom waktu
$totalWidth = $leapWidth * (($duration / $leap) + 1);
 
// format data, diasumsikan sudah jadi, tentunya data ini bisa diambil dari db atau apapun itu
$schedules = array(
    'stasiun 1' => array(
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '120',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '180',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '90',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
    ),
    'stasiun 2' => array(
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '120',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '180',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '30',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        ),
        array(
            'duration' => '60',
            'title' => 'Programme Name',
            'description' => 'whatever...'
        )
    )
);
 
function displayTime($start, $leapOver)
{
    list($h, $m) = explode(':', $start);
    $hplus = floor($leapOver / 60);
    $mplus = $leapOver - ($hplus * 60);
 
    $h = sprintf("%02d", intval($h) + $hplus);
    $m = sprintf("%02d", intval($m) + $mplus);
 
    return "$h:$m";
}
 
function renderHeaderCell()
{
    global $start, $leap, $duration, $leapWidth;
    $cells = "";
    $column = "";
 
    $currentTime = 0;
    $cells .= "<div class='slotHeader' style='width:{$leapWidth}px'>&nbsp;</div>";        
    while($currentTime < $duration)
    {    
        $cells .= "<div class='slotHeader' style='width:{$leapWidth}px'>" . displayTime($start, $currentTime). "</div>";        
        $currentTime += $leap;
    }
 
    $cells .= "</tr>";
    return $cells;
}
 
function renderSchedule()
{
    global $schedules, $start, $leap, $duration, $leapWidth;
 
    $rows = "";
    $colspan = $duration / $leap;
    foreach($schedules as $channel => $detail)
    {
        $rows .= "<tr><td>";
        $rows .= "<div class='show' style='width:{$leapWidth}px'>$channel</div>";
 
        $totDur = 0;
        $oneDay = 24 * 60; // jumlah menit dalam satu hari
        foreach($detail as $show)
        {
            $dur = $show['duration'];
            $title = $show['title'];
            $desc = $show['description'];
            $totDur += $dur;
 
            if($totDur > $oneDay)
            {
                // terserah mau ngapain disini, validasi aja
            }
 
            $columnWidth = $dur / $leap * $leapWidth;
            $rows .= "<div class='show' style='width:{$columnWidth}px' title='$desc'>$title $dur</div>";
        }
 
        $rows .= "</td></tr>";
    }
 
    return $rows;
}
?>
<html>
<head>
    <title>time table</title>
    <style type='text/css'>
    .slotHeader
    {
        position: relative;
        float: left;
        background-color: #000;
        color: #FFF;
        border: solid 1px;
    }
 
    .show
    {
        position: relative;
        float: left;
        border: solid 1px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        border-radius: 5px;
        background-color: #DDD;
        height: 60px;
    }
 
    #headerCellWrapper
    {
        position: relative;
        /*60 ini angka asal aja, yang penting cukup untuk kelebihan space akibat border kiri-kanan*/
        width: <?php echo $totalWidth + 60;?>px; 
    }
    </style>
</head>
<body>
    <table border=1>
        <tr>
            <td>
                <div id='headerCellWrapper'>
                    <?php echo renderHeaderCell();?>
                </div>
            </td>
        </tr>
        <?php echo renderSchedule();?>
    </table>
</body>
</html>
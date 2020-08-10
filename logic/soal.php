<h1>Soal 1</h1>
<p>
    Dimana tabel y dan x saling berhubung kita gunakan logic menyamakan data y & x sama maka akan diberi * jika tidak maka dikasih tanda _ kemudian dibagian for perlunya <u>br</u> agar membuat paragraf baru.
</p>
<?php
    for ($y=0; $y <= 10 ; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # logic code
            if($x == $y){
                echo "*"; 
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>

<h1>Soal 2</h1>
<p>
    Soal hampir sama dengan tingkat soal 1 hanya berbeda arah, kita bisa menggunakan logic tercepat yaitu sama dengan logic satu hanya saja kita kurangi angka agar nilai y dan x sama.
</p>
<?php
    for ($y=0; $y <= 10 ; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # logic code
            if($x == 9 - ($y - 1)){
                echo "*";
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>

<h1>Soal 3</h1>
<p>
    Tips dari soal 3 hanya kita gabungkan dengan cara || pada kodisinya. Atau bisa juga menggunakan elseif pada kondisi kedua.
</p>
<?php
for ($y=0; $y <= 10 ; $y++) { 
    for ($x=0; $x <= 10 ; $x++) { 
        # logic code
        if($x == $y || $x == 9 - ($y - 1)){
            echo "*"; 
        }else{
            echo "_";
        }

        // if($x == $y){
        //     echo "*"; 
        // }elseif($x == 9 - ($y - 1)){
        //     echo "*"; 
        // }else{
        //     echo "_";
        // } 
        // Cara kedua.
    }
    echo "<br>";
}
?>

<h1>Soal 4</h1>
<p>
Kita focus pada angka lima bagian x dan y, jadi tinggal kita check aja kalau x = 5 dan y = 5 
</p>
<?php
for ($y=0; $y <= 10 ; $y++) { 
    for ($x=0; $x <= 10 ; $x++) { 
        # logic code
        if($x == $y){
            echo "*"; 
        }elseif($x == 9 - ($y - 1)){
            echo "*";
        }elseif($x == 5 ){
            echo "*";
        }elseif($y == 5 ){
            echo "*";
        }else{
            echo "_";
        }
    }
    echo "<br>";
}
?>

<h1>Soal 5</h1>
<p>
    Perhatikan x dan y dimana x <= dari y.
</p>
<?php
    for ($y=0; $y <= 10; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # code logic
            if ($x <= $y ) {
                echo "*";
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>

<h1>Soal 6</h1>
<p>
    Jadi sebaliknya perhatikan x dan y dimana x >= dari y.
</p>
<?php
    for ($y=0; $y <= 10; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # code logic
            if ($x >= 9 - ($y - 1)) {
                echo "*";
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>

<h1>Soal 7</h1>
<p> 
    Pengabungan antara 5 dan 6. dibedakan dari lihat anatar x dan y. 
    Tanda <= berlawanan.
</p>

<?php
    for ($y=0; $y <= 10; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # code logic
            if ($x >= $y && $x <= 9 - ($y - 1)) {
                echo "*";
            }elseif($x <= $y && $x >= 9 - ($y - 1)) {
                echo "*";
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>

<h1>Soal 8</h1>
<p> 
    Hampir sama dengan soal 7 cuma membedakan tanda >= disamakan.
</p>

<?php
    for ($y=0; $y <= 10; $y++) { 
        for ($x=0; $x <= 10 ; $x++) { 
            # code logic
            if ($x >= $y && $x >= 9 - ($y - 1)) {
                echo "*";
            }elseif($x <= $y && $x <= 9 - ($y - 1)) {
                echo "*";
            }else{
                echo "_";
            }
        }
        echo "<br>";
    }
?>
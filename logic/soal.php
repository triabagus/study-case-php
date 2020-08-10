<h1>Soal 1</h1>
<p>
    Dimana tabel y dan x saling berhubung kita gunakan logic menyamakan data y & x sama maka akan diberi * jika tidak maka dikasih tanda _ kemudian dibagian for perlunya <u>br</u> agar membuat paragraf baru.
</p>
<?php
    for ($y=0; $y < 10 ; $y++) { 
        for ($x=0; $x < 10 ; $x++) { 
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
    for ($y=0; $y < 10 ; $y++) { 
        for ($x=0; $x < 10 ; $x++) { 
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
<?php
    /**
     * Input : link data website yang di grabbing , bisa di coba di link berikut.
     * Output : Menampilkan data grabbing pada link website.
     * 
     * Documentation : 
     *  file_get_contents -> mengambil data pada link yang dituju.
     *  
     */
    $grab   = file_get_contents('http://cuaca.mirbig.net/id/ID/30/1648473_Kota+Bogor'); 
    $start  = '<h1 class="pL9" id="H1"> Cuaca. Kota Bogor </h1>';
    $end    = '<h3 class="mapTitle fleft"> Kota Bogor on Google Maps</h3>';

    $startPosition  = strpos($grab,$start);
    $endPosition    = strpos($grab,$end);
    $longText       = $endPosition - $startPosition;

    $result         = substr($grab, $startPosition ,$longText);
    $result = $result;

    echo $result;
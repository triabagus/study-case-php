/**
 * Javascript Script object -> JSON (satu file)
 */
// let mahasiswa = {
//     'nama': 'tria'
// }
// console.log(JSON.stringify(mahasiswa));

/**
 * Javascript vanilla Script JSON -> object (beda file)
 */

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

/**
 * JQUERY 
 * Pastikan sudah ada jquery cdn atau file nya 
 * Kalau paka JQUERY datanya sudah di parse / parsing
 */

$.getJSON('coba.json', function (data) {
    console.log(data);
});
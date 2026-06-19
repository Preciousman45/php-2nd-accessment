<?php

function initial(){
   
print_r("+----+------------------+----------+--------+
| ID | Name             | Quantity | Price  |
+----+------------------+----------+--------+");

};





function footer(){
   print_r("+----+------------------+----------+--------+");
};



function ViewAll (){
   global $filename;
   $f = fopen($filename, 'r');
// 
            initial();
            while(( $viewALL = fgetcsv($f))!== false){
              echo implode(" | ", $viewALL) . "\n";  
            };

            print_r ($viewALL) ;
            footer();

        fclose($f);
};






function openingCSV (){
   global $newOpen ;
   global $allArray;
   while (($row = fgetcsv($newOpen)) !== false) {
   $allArray []= $row;
};
};


function closing($value){
   initial();
echo "\n";
echo implode(" | ", $value) . "\n";

footer();
};




?>
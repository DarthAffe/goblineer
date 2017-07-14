<?php

include 'dbh.php';





function marketValue($item, $conn) {
   $sql =  'SELECT owner, buyout, quantity, (buyout / quantity) AS unit_price
            FROM auctions
            WHERE item='.$item.'
            ORDER BY unit_price ASC';

   $result2 = mysqli_query($conn, $sql);

   $marketArray = array();
   $marketValueArray = array();

   //Puts each unit_price into the marketArray (if quantity = 100 it will put the unit_price in 100 times)
   while ($row2 = mysqli_fetch_assoc($result2)) {
      for($i = 0; $i < $row2['quantity']; $i++){
         array_push($marketArray, number_format($row2['unit_price']/10000, 2));
      }
   }

   //After it is through 15% of the auctions, any increase of 20% or more in price from one auction to the next will trigger the algorithm to throw out that auction and any above it. It will consider at most the lowest 30% of the auctions.
   for($i = round(count($marketArray)*0.15, 0); $i < round(count($marketArray)*0.30, 0); $i++){
      if($marketArray[$i]*1.30 >= $marketArray[$i+1]){
         $marketValueArray = array_slice($marketArray, 0, $i);
      }
   }

   //Calculations
   $standardDeviation = stats_standard_deviation($marketValueArray);
   $marketValueArrayAverage = array_sum($marketValueArray) / count($marketValueArray);
   $devBreakLow = $marketValueArrayAverage - $standardDeviation*1.5;
   $devBreakHigh = $marketValueArrayAverage + $standardDeviation*1.5;


   //Throws out data with is lower/higher than the average +- standard deviation * 1.5
   for($i = 0; $i < count($marketValueArray); $i++){
      if($marketValueArray[$i] < $devBreakLow || $marketValueArray[$i] > $devBreakHigh){
         unset($marketValueArray[$i]);
      }
   }

   //Gets the market value of the item
   $marketValue = array_sum($marketValueArray) / count($marketValueArray);

   return $marketValue;

}


if (!function_exists('stats_standard_deviation')) {
    /**
     * This user-land implementation follows the implementation quite strictly;
     * it does not attempt to improve the code or algorithm in any way. It will
     * raise a warning if you have fewer than 2 values in your array, just like
     * the extension does (although as an E_USER_WARNING, not E_WARNING).
     *
     * @param array $a
     * @param bool $sample [optional] Defaults to false
     * @return float|bool The standard deviation or false on error.
     */
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error('The array has zero elements', E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error('The array has only 1 element', E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
}
?>

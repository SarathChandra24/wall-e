
<table class="table table-striped table-bordered"><thead>
<tr><th>S.No</th><th>Subject</th><th>I Mid</th><th>II Mid</th><th>Average</th><th>End Sem Marks</th></tr>
</thead>

<tbody id="tbody">


<!--    save input here  -->

</tbody>

<?php
  
  $conn=mysqli_connect("localhost","root","","cms");;
  //$db=mysqli_select_db("cms",$conn);
  $url="";
  $sem_word="";
  $count=1;
  $sbid="";
?> 

<!-- SQL query goes here -->
<?php 

  //$rs = mysqli_query($conn,$strSQL)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $rs");
 $counter=1;
 $branch="SELECT branch from student where sid='".$sid."'";
$branch1=mysqli_query($conn,$branch)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $branch");
while($row=mysqli_fetch_array($branch1))
$branch=$row['branch'];
switch ($branch) {
    case 'cse':$strSQL = "SELECT a.subject_id, mid_1,mid_2,avg,end_sem_marks FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, mid_1,mid_2,avg,end_sem_marks FROM cse_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        break;
    case 'ece':$strSQL = "SELECT a.subject_id, mid_1,mid_2,avg,end_sem_marks FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, mid_1,mid_2,avg,end_sem_marks FROM ece_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'eee':$strSQL = "SELECT a.subject_id, mid_1,mid_2,avg,end_sem_marks FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, mid_1,mid_2,avg,end_sem_marks FROM eee_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'it':$strSQL = "SELECT a.subject_id, mid_1,mid_2,avg,end_sem_marks FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, mid_1,mid_2,avg,end_sem_marks FROM it_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'mech':$strSQL = "SELECT a.subject_id, mid_1,mid_2,avg,end_sem_marks FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, mid_1,mid_2,avg,end_sem_marks FROM mech_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
}

$rs = mysqli_query($conn,$strSQL);
$batch="SELECT batch from student where sid='".$sid."'";
$batch1=mysqli_query($conn,$batch);
while($row=mysqli_fetch_array($batch1))
$batch=$row['batch'];
//echo $batch;

 while($row = mysqli_fetch_array($rs)) {
  $subject_id=$row['subject_id'];
  
  //$subject_id=$batch;

   
   if($batch=="2016-20"||$batch=="2017-21"){
      switch($branch)
        {case "cse":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;

                            }
                            break;
        case "ece":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "eee":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "it":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "mech":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Mathematics-II";
                                break;
                        case 113:
                                $sbid="Engineering Physics";
                                break;
                        case 114:
                                $sbid="Computer Programming in C";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Engineering Graphics";
                                break;
                        case 117:
                                $sbid="Engineering Physics Lab";
                                break;
                        case 118:
                                $sbid="Computer Programming in C Lab";
                                break;
                            }
                            break;                                                                                
                          }
                        }

else if($batch=="2018-22"||$batch=="2019-23"){
  
    switch($branch)
        {case "cse":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;
        case "ece":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Applied Physics";
                                break;
                        case 113:
                                $sbid="Programming for problem solving";
                                break;
                        case 114:
                                $sbid="Engineering Graphics";
                            break;
                        case 115:
                                $sbid="Applied Physics Lab";
                                break;
                        case 116:
                                $sbid="Programming for problem solving Lab";
                                break;
                            }
                            break;                    
        case "eee":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;    
        case "it":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;
        case "mech":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Physics";
                                break;
                        case 113:
                                $sbid="Programming for problem solving";
                                break;
                        case 114:
                                $sbid="Engineering Graphics";
                            break;
                        case 115:
                                $sbid="Engineering Physics Lab";
                                break;
                        case 116:
                                $sbid="Programming for problem solving Lab";
                                break;
                            }
                            break;                             
                          }
                        }                         
                 
                 






  $mid_1= $row['mid_1'];
  $mid_2= $row['mid_2'];
  $avg=$row['avg'];
  $end_sem_marks = $row['end_sem_marks'];?>
  <tr id="w1-filters" class="filters">
    <td> <?php  echo $count++   ?></td>
    <td> <?php  echo $sbid   ?></td>
    <td><?php  echo $mid_1   ?><a/></td>
    <td><?php  echo $mid_2 ?></td>
    <td><?php  echo $avg   ?></td>
    <td><?php  echo $end_sem_marks   ?></td>
</tr>
<?php }
?>

<!--    save input here  -->

</tbody>
</table>
<br>
<table class="table table-striped table-bordered"><thead>
<tr><th>S.No</th><th>Subject</th><th>F1</th><th>F2</th><th>F3</th><th>F4</th><th>F5</th><th>F6</th><th>F7</th><th>F8</th>
<th>F9</th>
</tr>
</thead>

<tbody id="tbody">


<!--    save input here  -->

</tbody>

<?php
  
  $conn=mysqli_connect("localhost","root","","cms");;
  //$db=mysqli_select_db("cms",$conn);
  $url="";
  $sem_word="";
  $fn1=0;
  $fn2=0;
  $fn3=0;
  $fn4=0;
  $fn5=0;
  $fn6=0;
  $fn7=0;
  $fn8=0;
  $fn9=0;
  $count=1;
  $sbid="";
?> 

<!-- SQL query goes here -->
<?php 

  //$rs = mysqli_query($conn,$strSQL)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $rs");
 $counter=1;
 $branch="SELECT branch from student where sid='".$sid."'";
$branch1=mysqli_query($conn,$branch)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $branch");
while($row=mysqli_fetch_array($branch1))
$branch=$row['branch'];
switch ($branch) {
    case 'cse':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM cse_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        break;
    case 'ece':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM ece_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'eee':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM eee_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'it':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM it_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'mech':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=1) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM mech_ma where sid='".$sid."') b
ON a.subject_id =b.subject_id";
        
        break;
}

$rs = mysqli_query($conn,$strSQL)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $rs");
$batch="SELECT batch from student where sid='".$sid."'";
$batch1=mysqli_query($conn,$batch);
while($row=mysqli_fetch_array($batch1))
$batch=$row['batch'];


 while($row = mysqli_fetch_array($rs)) {
  $subject_id=$row['subject_id'];
  
  //$subject_id=$batch;

   
   if($batch=="2016-20"||$batch=="2017-21"){
      switch($branch)
        {case "cse":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;

                            }
                            break;
        case "ece":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "eee":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "it":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Chemistry";
                                break;
                        case 113:
                                $sbid="Engineering Physics-I";
                                break;
                        case 114:
                                $sbid="Professional Communication in English";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Basic Electrical and Electronics Engineering ";
                                break;
                        case 117:
                                $sbid="English Language Communications Skills Lab";
                                break;
                        case 118:
                                $sbid="Engineering Workshop";
                                break;
                            }
                            break;
        case "mech":
                     switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Mathematics-II";
                                break;
                        case 113:
                                $sbid="Engineering Physics";
                                break;
                        case 114:
                                $sbid="Computer Programming in C";
                            break;
                        case 115:
                                $sbid="Engineering Mechanics";
                                break;
                        case 116:
                                $sbid="Engineering Graphics";
                                break;
                        case 117:
                                $sbid="Engineering Physics Lab";
                                break;
                        case 118:
                                $sbid="Computer Programming in C Lab";
                                break;
                            }
                            break;                                                                                
                          }
                        }

else if($batch=="2018-22"||$batch=="2019-23"){
  
    switch($branch)
        {case "cse":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;
        case "ece":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Applied Physics";
                                break;
                        case 113:
                                $sbid="Programming for problem solving";
                                break;
                        case 114:
                                $sbid="Engineering Graphics";
                            break;
                        case 115:
                                $sbid="Applied Physics Lab";
                                break;
                        case 116:
                                $sbid="Programming for problem solving Lab";
                                break;
                            }
                            break;                    
        case "eee":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;    
        case "it":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Chemistry";
                                break;
                        case 113:
                                $sbid="Basic Electrical Engineering";
                                break;
                        case 114:
                                $sbid="Engineering Workshop";
                            break;
                        case 115:
                                $sbid="English";
                                break;
                        case 116:
                                $sbid="Engineering Chemistry Lab";
                                break;
                        case 117:
                                $sbid="Engineering Language and Communication Skills Lab";
                                break;
                        case 118:
                                $sbid="Basic Electrical Engineering lab";
                                break;
                            }
                            break;
        case "mech":
                    switch($subject_id){
                        case 111:
                                  $sbid="Mathematics-I";
                                  break;
                        case 112:
                                $sbid="Engineering Physics";
                                break;
                        case 113:
                                $sbid="Programming for problem solving";
                                break;
                        case 114:
                                $sbid="Engineering Graphics";
                            break;
                        case 115:
                                $sbid="Engineering Physics Lab";
                                break;
                        case 116:
                                $sbid="Programming for problem solving Lab";
                                break;
                            }
                            break;                             
                          }
                        }                         
                 
                 






  $f1= $row['f1'];
  $fn1=$fn1+$f1;
  $f2= $row['f2'];
  $fn2=$fn2+$f2;
  $f3= $row['f3'];
  $fn3=$fn3+$f3;
  $f4= $row['f4'];
  $fn4=$fn4+$f4;
  $f5= $row['f5'];
  $fn5=$fn5+$f5;
  $f6= $row['f6'];
  $fn6=$fn6+$f6;
  $f7= $row['f7'];
  $fn7=$fn7+$f7;
  $f8= $row['f8'];
  $fn8=$fn2+$f8;
  $f9= $row['f9'];
  $fn9=$fn9+$f9;?>
  <tr id="w1-filters" class="filters">
    <td> <?php  echo $count++   ?></td>
    <td> <?php  echo $sbid   ?></td>
    <td><?php  echo $f1  ?><a/></td>

    <td><?php  echo $f2 ?></td>
      <td><?php  echo $f3 ?></td>
        <td><?php  echo $f4 ?></td>
      <td><?php  echo $f5 ?></td>
        <td><?php  echo $f6 ?></td>
          <td><?php  echo $f7 ?></td>
    <td><?php  echo $f8   ?></td>
    <td><?php  echo $f9   ?></td>
</tr>
<?php }
?>
<tr>
    
    <th colspan="2"><h3>Average</h3></th>
    <td><?php $tsub=$count-1;
     echo $fn1/($tsub) ?></td>

<td><?php echo $fn2/($tsub)?></td>
<td><?php echo $fn3/($tsub)?></td>
<td><?php echo $fn4/($tsub)?></td>
<td><?php echo $fn5/($tsub)?></td>
<td><?php echo $fn6/($tsub)?></td>
<td><?php echo $fn7/($tsub)?></td>
<td><?php echo $fn8/($tsub)?></td>
<td><?php echo $fn9/($tsub)?></td>
</tr>
<!--    save input here  -->

</tbody>
</table>
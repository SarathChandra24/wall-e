<?php

include_once("php_includes/common_frame_s.php");
include_once("php_includes/check_login_status.php");
include_once("php_includes/include_student_column.php");
$id = $_SESSION['userid'];

?>
        <aside class="right-side">

        <ul class="breadcrumb"><li><a href="student.php"><i class="fa fa-dashboard"></i>Home</a></li>
</ul>

    <section class="content">
        
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i>Select Semester</h3></div>
  <div class="col-xs-4"></div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
    <div class="stu-master-form">
    <form id="stu-master-form" action="/readyMadeCodestudent.php?r=student%2Fstu-master%2Fcreate" method="post">
<input type="hidden" name="_csrf" value="NHBnY0dyWktnPD8oLyEJHQxdBCkjNmonZ0hXAHEzKxplIg0GMUEbBQ==">    
  
    <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
     
<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
 <div class="col-xs-9 col-sm-4">
    <div class="form-group field-stuinfo-stu_unique_id">
<label class="control-label" for="stuinfo-stu_unique_id">Student ID</label><input type="text" id="id" class="form-control" name="id" value="<?php echo $id; ?>" readonly><div class="help-block"></div>
</div>    </div>
</div>
<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
    <div class="stu-master-index">
        <div id="w0">       <div id="w1" class="grid-view">
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
 $branch="SELECT branch from student where sid='".$id."'";
$branch1=mysqli_query($conn,$branch)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $branch");
while($row=mysqli_fetch_array($branch1))
$branch=$row['branch'];
switch ($branch) {
    case 'cse':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=4) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM cse_ma where sid='".$id."') b
ON a.subject_id =b.subject_id";
        break;
    case 'ece':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=4) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM ece_ma where sid='".$id."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'eee':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=4) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM eee_ma where sid='".$id."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'it':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=4) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM it_ma where sid='".$id."') b
ON a.subject_id =b.subject_id";
        
        break;
    case 'mech':$strSQL = "SELECT a.subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM 
(SELECT subject_id FROM semester_courses where sem_id=4) a
INNER JOIN (SELECT subject_id, f1,f2,f3,f4,f5,f6,f7,f8,f9 FROM mech_ma where sid='".$id."') b
ON a.subject_id =b.subject_id";
        
        break;
}

$rs = mysqli_query($conn,$strSQL)or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $rs");
$batch="SELECT batch from student where sid='".$id."'";
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
                        case 221:
                                  $sbid="Computer Organization";
                                  break;
                        case 222:
                                $sbid="Database Management Systems";
                                break;
                        case 223:
                                $sbid="Operating Systems";
                                break;
                        case 224:
                                $sbid="Formal Languages and Automata Theory";
                            break;
                        case 225:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 226:
                                $sbid="Computer Organization Lab";
                                break;
                        case 227:
                                $sbid="Database Management Systems Lab";
                                break;
                        case 228:
                                $sbid="Operating Systems Lab";
                                break;
                            }break;
        case "ece":
                    switch($subject_id){
                        case 221:
                                  $sbid="Switching Theory and Logic Design";
                                  break;
                        case 222:
                                $sbid="Pulse and Digital Circuits";
                                break;
                        case 223:
                                $sbid="Control Systems";
                                break;
                        case 224:
                                $sbid="Analog Communications";
                            break;
                        case 225:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 226:
                                $sbid="Analog Communications Lab";
                                break;
                        case 227:
                                $sbid="Pulse and Digital Circuits Lab";
                                break;
                        case 228:
                                $sbid="Analog Electronics Lab";
                                break;
                            }break;
        case "eee":
                    switch($subject_id){
                        case 221:
                                  $sbid="Switching Theory & Logic Design";
                                  break;
                        case 222:
                                $sbid="Power Systems-I";
                                break;
                        case 223:
                                $sbid="Electrical Machines-II";
                                break;
                        case 224:
                                $sbid="Control Systems";
                            break;
                        case 225:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 226:
                                $sbid="Control Systems Lab";
                                break;        
                        case 227:
                                $sbid="Electrical Machines Lab -II";
                                break;
                        case 228:
                                $sbid="Electronic Circuits Lab";
                                break;
                            }break;
        case "it":
                 switch($subject_id){
                        case 221:
                                  $sbid="Computer Organization";
                                  break;
                        case 222:
                                $sbid="Database Management Systems";
                                break;
                        case 223:
                                $sbid="Operating Systems";
                                break;
                        case 224:
                                $sbid="Formal Languages and Automata Theory";
                            break;
                        case 225:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 226:
                                $sbid="Computer Organization Lab";
                                break;
                        case 227:
                                $sbid="Database Management Systems Lab";
                                break;
                        case 228:
                                $sbid="Operating Systems Lab";
                                break;
                            }break;
        case "mech":
                    switch($subject_id){
                        case 221:
                                $sbid="Production Technology";
                                  break;
                        case 222:
                                $sbid="Design of Machine Members-I";
                                break;
                        case 223:
                                $sbid="Fluid Mechanics and Hydraulic Machines";
                                break;
                        case 224:
                                $sbid="Dynamics of Machines";
                            break;
                        case 225:    
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 226:
                                $sbid="Production Technology Lab";
                                break;
                        case 227:
                                $sbid="Fluid Mechanics and Hydraulic Machines Lab ";
                                break;
                        case 228:
                                $sbid="Dynamics of Machines Labs";
                                break;
                            }break;

                          }
                        }


else if($batch=="2018-22"||$batch=="2019-23"){
      switch($branch)
        {case "cse":
                    switch($subject_id){
                        case 221:
                                $sbid="Discrete Mathematics";
                                  break;
                        case 222:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 223:
                                $sbid="Operating Systems";
                                break;
                        case 224:
                                $sbid="Database Management Systems";
                            break;
                        case 225:
                                $sbid="Java Programming";
                                break;
                        case 226:
                                $sbid="Operating Systems Lab";
                                break;
                        case 227:
                                $sbid="Database Management Systems Lab";
                                break;
                        case 228:
                                $sbid="Java Programming Lab";
                                break;                             
                            }break;
         case "ece":
                    switch($subject_id){
                        case 221:
                                $sbid="Laplace Transforms,Numerical Methods & Complex Variables";
                                  break;
                        case 222:
                                $sbid="Electromagnetic Fields and Waves";
                                break;
                        case 223:
                                $sbid="Analog and Digital Communications";
                                break;
                        case 224:
                                $sbid="Linear IC Applications";
                            break;
                        case 225:
                                $sbid="Electronic Circuit Analysis";
                                break;
                        case 226:
                                $sbid="Analog and Digital Communications Lab";
                                break;
                        case 227:
                                $sbid="IC Applications Lab";
                                break;
                        case 228:
                                $sbid="Electronic Circuit Analysis Lab";
                                break;       
                            }break;
         case "eee":
                    switch($subject_id){
                        case 221:
                                $sbid="Laplace Transforms,Numerical Methods & Complex Variables";
                                  break;
                        case 222:
                                $sbid="Electrical Machines-II";
                                break;
                        case 223:
                                $sbid="Digital Electronics";
                                break;
                        case 224:
                                $sbid="Control Systems";
                            break;
                        case 225:
                                $sbid="Power Systems-I";
                                break;
                        case 226:
                                $sbid="Digital Electronics Lab";
                                break;
                        case 227:
                                $sbid="Electrical Machines Lab-II";
                                break;
                        case 228:
                                $sbid="Control Systems Lab";
                                break;        
                            }break;
         case "it":
                  switch($subject_id){
                        case 221:
                                $sbid="Discrete Mathematics";
                                  break;
                        case 222:
                                $sbid="Business Economics and Financial Analysis";
                                break;
                        case 223:
                                $sbid="Operating Systems";
                                break;
                        case 224:
                                $sbid="Database Management Systems";
                            break;
                        case 225:
                                $sbid="Java Programming";
                                break;
                        case 226:
                                $sbid="Operating Systems Lab";
                                break;
                        case 227:
                                $sbid="Database Management Systems Lab";
                                break;
                        case 228:
                                $sbid="Java Programming Lab";
                                break;       
                            }break;
         case "mech":
                    switch($subject_id){
                        case 221:
                                $sbid="Basic Electrical and Electronics Engineering";
                                  break;
                        case 222:
                                $sbid="Kinematics of Machinery";
                                break;
                        case 223:
                                $sbid="Thermal Engineering-I";
                                break;
                        case 224:
                                $sbid="Fluid Mechanics and Hydraulic Machines";
                            break;
                        case 225:
                                $sbid="Instrumentation and Control Systems";
                                break;
                        case 226:
                                $sbid="Basic Electrical and Electronics Engineering Lab";
                                break;
                        case 227:
                                $sbid="Fluid Mechanics and Hydraulic Machines Lab";
                                break;
                        case 228:
                                $sbid="Instrumentation and Control Systems Lab";
                                break;        
                            }break;
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
</div>  </div>
</div>
</div>
      </div>
      </form>
      </div>
    </div>
</div>
    </section>

    
<?php

include_once("php_includes/footer.php");

 ?>
</aside>

  
      </div>
    <script src="js/yii_002.js"></script>
<script src="js/jquery_002.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w1').yiiGridView({"filterUrl":"student.php?r=student%2Fstu-master%2Findex","filterSelector":"#w1-filters input, #w1-filters select"});
jQuery(document).pjax("#w0 a", "#w0", {"push":false,"replace":false,"timeout":1000,"scrollTo":false});
jQuery(document).on('submit', "#w0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, '#w0', {"push":false,"replace":false,"timeout":1000,"scrollTo":false});});
});</script>    
    
    </body></html>

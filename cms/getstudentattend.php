<?php

include_once("php_includes/common_frame_f.php");
include_once("php_includes/check_login_status.php");
include_once("php_includes/include_faculty_column.php");
?>
<script src="js/app.js
"></script>
<script src="Manage%20Students_files/bootstrapx-clickover.js"></script>    </head>
    <body style="min-height: 1161px;" class="skin-black  pace-done"><div class="pace  pace-inactive"><div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    	
	
        <aside class="right-side">

        <ul class="breadcrumb"><li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="faculty.php">Faculty</a></li>
<li class="active">Upload Grade</li>
</ul>

    <section style="min-height: 573px;" class="content">
        
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><!--<i class="fa fa-th-list"></i>-->Upload Grade</h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	
	<!--<div class="col-xs-4 left-padding">
		<a class="btn btn-block btn-primary" href="http://localhost/cms1/index.php?r=export-data%2Fexport-excel&amp;model=app%5Cmodules%5Cstudent%5Cmodels%5CStuMasterSearch" target="_blank">EXCEL</a>		</div> -->
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="stu-master-index">
		<div id="w0">	    <div id="w1" class="grid-view">
<?php
$conn=mysqli_connect("localhost","root","","cms");;
$table_id='';
//mysql_select_db("students") or die("Unable to select database");
 $acadyear=$_GET['acadyear'];
 $course_id=$_GET['course_id'];
 $branch=$_GET['branch'];
 $section=$_GET['section'];
switch ($branch) {
       case 'cse':$query = "SELECT s.branch,c.sid/*,c.mid_1,c.mid_2,c.avg,c.end_sem_marks*/,c.f1,c.f2,c.f3,c.f4,c.f5,c.f6,c.f7,c.f8,c.f9 FROM student s,cse_ma c   WHERE s.batch='".$acadyear."'and c.sid=s.sid and s.section='".$section."' and c.subject_id='".$course_id."'";
        
           break;
       case 'ece':$query = "SELECT s.branch,c.sid/*,c.mid_1,c.mid_2,c.avg,c.end_sem_marks*/,c.f1,c.f2,c.f3,c.f4,c.f5,c.f6,c.f7,c.f8,c.f9 FROM student s,ece_ma c   WHERE s.batch='".$acadyear."'and c.sid=s.sid and s.section='".$section."' and c.subject_id='".$course_id."'";
           break;
        case 'eee':$query = "SELECT s.branch,c.sid/*,c.mid_1,c.mid_2,c.avg,c.end_sem_marks*/,c.f1,c.f2,c.f3,c.f4,c.f5,c.f6,c.f7,c.f8,c.f9 FROM student s,eee_ma c   WHERE s.batch='".$acadyear."'and c.sid=s.sid and s.section='".$section."' and c.subject_id='".$course_id."'";
        
           break;
        case 'mech':$query = "SELECT s.branch,c.sid/*,c.mid_1,c.mid_2,c.avg,c.end_sem_marks*/,c.f1,c.f2,c.f3,c.f4,c.f5,c.f6,c.f7,c.f8,c.f9 FROM student s,mech_ma c   WHERE s.batch='".$acadyear."'and c.sid=s.sid and s.section='".$section."' and c.subject_id='".$course_id."'";
           break;
        case 'it':$query = "SELECT s.branch,c.sid/*,c.mid_1,c.mid_2,c.avg,c.end_sem_marks*/,c.f1,c.f2,c.f3,c.f4,c.f5,c.f6,c.f7,c.f8,c.f9 FROM student s,it_ma c   WHERE s.batch='".$acadyear."'and c.sid=s.sid and s.section='".$section."' and c.subject_id='".$course_id."'";
        break;

        
           }


$result = mysqli_query($conn,$query) or die($query."<br/><br/>".mysqli_error($conn));
 
$i = 0;
 
echo '<table class="table table-striped table-bordered">';
echo '<thead>';
echo '<th>ROLL NO</th>';
echo '<th>F1</th>';
echo '<th>F2</th>';
echo '<th>F3</th>';
echo '<th>f4</th>';
echo '<th>f5</th>';
echo '<th>f6</th>';
echo '<th>f7</th>';
echo '<th>f8</th>';
echo '<th>f9</th>';
echo '</thead>';
 
echo "<form name='form_update' method='post' action='submit_attend.php'>\n";
while ($students = mysqli_fetch_array($result)) {
	echo '<tr id="w1-filters" class="filters">';
	echo "<td>{$students['sid']}<input type='hidden' name='sid[$i]' value='{$students['sid']}' /></td>";
 echo "<input type='hidden' name='branch[$i]' value='{$students['branch']}' />";
  

	echo "<td><input type='text' size='5' name='f1[$i]' value='{$students['f1']}' /></td>";
	echo "<td><input type='text' size='5' name='f2[$i]' value='{$students['f2']}' /></td>";
	echo "<td><input type='text' size='5' name='f3[$i]' value='{$students['f3']}' /></td>";
	echo "<td><input type='text' size='5' name='f4[$i]' value='{$students['f4']}' /></td>";
  echo "<td><input type='text' size='5' name='f5[$i]' value='{$students['f5']}' /></td>";
  echo "<td><input type='text' size='5' name='f6[$i]' value='{$students['f6']}' /></td>";
  echo "<td><input type='text' size='5' name='f7[$i]' value='{$students['f7']}' /></td>";
  echo "<td><input type='text' size='5' name='f8[$i]' value='{$students['f8']}' /></td>";
  echo "<td><input type='text' size='5' name='f9[$i]' value='{$students['f9']}' /></td>";
  
  echo '</tr>';
	++$i;
}
echo '<tr>';
echo "<td><input type='submit' value='submit' /></td>";
echo '</tr>';
echo "</form>";
echo '</table>';
?>
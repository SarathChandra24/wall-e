<?php


include_once("php_includes/check_login_status.php");
if($log_userType=='admin')
{
include_once("php_includes/common_frame_a.php");
include_once("php_includes/include_admin_column.php");
}
else
header("location: index.php");


 ?>
        <aside class="right-side">
<script src="js/app.js"></script>
        <ul class="breadcrumb"><li><a href="?controller=pages&action=home"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">complains</li>
</ul>

   <section class="content">
 <!--       <div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> Request of status</h3></div>
  <div class="col-xs-4"></div>
 <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
        <a class="btn btn-block btn-success" href="http://localhost:8081/CMS/index.php?r=dashboard%2Fmsg-of-day%2Fcreate">ADD</a>	</div>
	<div class="col-xs-4 left-padding">
	<a class="btn btn-block btn-warning" href="http://localhost:8081/CMS/index.php?r=export-data%2Fexport-to-pdf&amp;model=app%5Cmodules%5Cdashboard%5Cmodels%5CMsgOfDaySearch" target="_blank">PDF</a>	</div>
	<div class="col-xs-4 left-padding">
	<a class="btn btn-block btn-primary" href="http://localhost:8081/CMS/index.php?r=export-data%2Fexport-excel&amp;model=app%5Cmodules%5Cdashboard%5Cmodels%5CMsgOfDaySearch" target="_blank">EXCEL</a>	</div>
  </div>
</div>
-->



<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="msg-of-day-index">
	<div id="w0">	    <style>
.glyphicon-remove-circle {
  color : #C9302C;
}
.glyphicon-ok-circle {
  color : #449D44;
}
</style>
<div id="w1" class="grid-view">
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th><a href="#">Complaint Description</a></th><th><a>Student Id</a></th><th><a>subject type</a></th><th><a>Days form submission</a></th><th><a href="#">apply Date</a></th>
    <th><a>Status</a></th><th><a>resolved/not resolved<a></th><th><a>Confirm</a></th><th><a>Reply</a></th></tr>
<tbody>
    
<?php   $counter=0; ?>
<!--    save input here  -->

<?php if(is_array($posts))
 foreach($posts as $post) { 
    
    ?>   
<tr> 
    <form method="get" action="">
    <input type="hidden" name="controller" value="admin">
    <input type="hidden" name="action" value="change_status_complaint">
    <input type="hidden" name="cid" value=<?php echo $post->cid ?>>
    
    <td> <?php ++ $counter; echo $counter ?></td>
    <td> <?php  echo $post->description   ?></td>
    <td> <?php  echo $post->sid  ?></td>
    <td> <?php  echo $post->request_type  ?></td>
    <?php $days_spent=intval($post->no_of_days)
   ;?>
   <!-- <?php $days_left=7-$days_spent ?>
  -->

    <td><?php  echo $days_spent ?></td>
    <td><?php  echo $post->apply_date   ?></td>
    <td><?php  echo $post->status  ?></td>
    <?php  $cid=$post->cid; ?>
     <?php  $done=$post->action ;
if($done==0){
    $value="submit";

}else $value="hidden";

  ?>  
    <td>
        <select class="form-control" name="status" required>
<option value="Rejected">reject</option>
<option value="Accepted">accept</option>

</select>

</td>
<td>
<?php
if($done==0){

?>
<?php if($days_spent>=5){ ?>

<input class="btn btn-block btn-success" type=<?php echo $value;  ?> style="background-color:red" value="Done" ></td>
<?php  }else{ ?>
    <input class="btn btn-block btn-success" type=<?php echo $value;  ?> value="Done" ></td>
<?php
}}
?>
</form>


</form>
<?php  $cid=$post->cid; ?>
<form  method="get">                                                                                                                     
    <input type="hidden" name="controller" value="admin" >
    <input type="hidden" name="action" value="reply" >
    <input type="hidden" name="cid" value=<?php echo $cid; ?> >
<td><input class="btn btn-block btn-success"  Style="background:orange" onclick="location.href='?controller=admin&action=reply';" type=<?php echo $value;  ?> value="Reply" ></td>

</form>  
</tr>
<?php 
} ?>


</tbody>
</table>
</div>
</div>	</div>
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
$("a.toggle-column").on("click", function(e) {
    e.preventDefault();
    $.post($(this).attr("href"), function(data) {
        var pjaxId = $(e.target).closest(".grid-view").parent().attr("id");
        $.pjax.reload({container:"#" + pjaxId});
    });
    return false;
});
jQuery('#w1').yiiGridView({"filterUrl":"/CMS/index.php?r=dashboard%2Fmsg-of-day%2Findex","filterSelector":"#w1-filters input, #w1-filters select"});
jQuery(document).pjax("#w0 a", "#w0", {"push":false,"replace":false,"timeout":1000,"scrollTo":false});
jQuery(document).on('submit', "#w0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, '#w0', {"push":false,"replace":false,"timeout":1000,"scrollTo":false});});
});</script>    
    
    </body></html>

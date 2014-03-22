	<div class="rightcunt">
    

<h1>
    <?php echo lang('access.first'); ?> </h1>
<form action="" method="post" name="frm">   
<div class="cssaver1 leftcom">
  <?php echo lang('access.second'); ?> 


<div class="cssaver1 leftcom selt1">
<select ><option value="<?php echo $this->session->userdata('country_name_web'); ?>" readonly ><?php echo $this->session->userdata('country_name_web'); ?></option></select>
<br/><br/>
<div class="accessntxt">
<h3>Access Number</h3>  <h3> City</h3>  <h3> Stae</h3>
<?php foreach($result->List as $row) { ?>

<h3><small><?php echo $row->AccessNo; ?></small></h3>  <h3><small><?php echo $row->Descript; ?></small></h3>
<?php } ?>
</div></div>
      </div>

</form>

</div>
</div>
</div>
      <!--footer section  start here-->
                 <script type="text/javascript">
$( ".leftmyaccount" ).css({height: "980px" });
</script>
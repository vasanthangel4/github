<!--  right content-->


<title>Search: </title><div class="rightcunt">
    <h1><?php echo lang('local_number.first'); ?></h1>
    <?php echo lang('local_number.second'); ?>
       <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/local_number/add"><b>
         <?php echo lang('local_number.second1'); ?></b></a>    <?php echo lang('local_number.second2'); ?> 
    </p>
    <hr />
    <div class="rightcunt">
        <h3>Manage Local numbers</h3>
        
        <!--<?php //if($this->session->flashdata('success')) { ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php //echo $this->session->flashdata('success'); ?>
            </div>
            <div class="clearfix"></div>
        <?php //} ?>-->
        
        <?php if($this->session->flashdata('failed')) { ?>
         <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->flashdata('failed'); ?>
         </div>
         <div class="clearfix"></div>
        <?php } ?>
        
       <!-- <div class="rightlink">
            <a href="" class="underline">View all</a> <a href="" class="underline">Print all</a>
        </div>-->
        
        <div class="locapg">
            <div><input type="text" class="lolnumber visibility "   placeholder="Type to search..."></div>
        
            <p class="boldtxt" >Show</p>
        
            <a href="" class="redbtn">All</a> <!--<a href="" class="greybtn">Favorites</a>-->
            <div class="login">
                <a title="Add Contacts" href="<?php echo base_url(); ?>myaccount/local_number/add"> 
                <span>+</span> &nbsp;Add Contacts
                </a>
            </div>
        </div>
        
        <div class="rightcunt">
                
        <div class="rightcunt" style="margin-top: -15px;">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="localno">
          <thead>
              <tr>
                  <th>Friend’s name</th>
                  <th>Local number</th>
                  <th>Friend’s number</th>
                  <th>Rate</th>
                  <th></th>
              </tr>
          </thead>
          
          <tbody>
		  <?php foreach($result->List as $val) { ?>
          
              <tr class="odd gradeX records">
              
                  <td class="row_name">
                  <?php if($val->Starred == 'true') { ?>    
                      <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/local_number/favorite/<?php echo $val->LocalNo; ?>/true" onClick="return confirm('Are you sure change to favorite ?')" style="display:none !important;">  
                      <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" class="imgstr" alt="Chillitalk star"/> 
                      </a>
                  <?php }else{ ?>
                      <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/local_number/favorite/<?php echo $val->LocalNo; ?>/false" onClick="return confirm('Are you sure change to favorite ?')" style="display:none !important;">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/favorites1.png" class="imgstr" alt="Chillitalk star" />
                      </a>
          		  <?php } ?>
                      <?php echo $val->ContactName; ?>
                      
                </td>
                <input type="hidden" name="row_hidden_name" class="hidden_name" value="<?php echo $val->ContactName; ?>" />
                <td class="row_localno"><?php echo $val->LocalNo; ?>
                	
                </td>
                <input type="hidden" name="row_hidden_localno" class="hidden_localno" value="<?php echo $val->LocalNo; ?>" />
                <td class="row_destno"><?php echo $val->DestNo; ?>
                	
                </td>
                <input type="hidden" name="row_hidden_destno" class="hidden_destno" value="<?php echo $val->DestNo; ?>"/>
                <td class="row_callrate"><?php echo $val->CallRate; ?>
                </td>
                <input type="hidden" name="row_hidden_callrate" class="hidden_callrate" value="<?php echo $val->CallRate; ?>" />
                <td>
                   <a href="#" class="underline row_edit">Edit</a> / 
				   <a href="<?php echo base_url(); ?>/myaccount/local_number/delete/<?php echo $val->LocalNo; ?>" onClick="return confirm('Are you sure you want to delete this contact?')" class="underline row_delete">Delete</a>
                   <a href="#" class="underline row_cancel" style="display:none">cancel</a>
                </td>
            
            </tr>
            
               
          <?php } ?>
          </tbody>
        </table>
        </div>
         
        </div>
        </div>
        <hr />
    </div>
</div>
</div>
<a class="toplink" style="display: block;"></a>
<!--footer section  start here-->
</div>

<script type="text/javascript">
$(document).ready(function() {
  
  
  
  $('.row_edit').live('click', function(ev) {
	  if (ev.type == 'click') {	
	  
		  $(this).parents('.records').find('.row_name').
		  html('<input style="width:120px" class="input_name" type="text" value="'+$(this).parents('.records').find('.hidden_name').val()+'"  />');

		  $(this).parents('.records').find('.row_destno').
		  html('<input type="text" class="input_destno" style="width:120px" value="'+$(this).parents('.records').find('.hidden_destno').val()+'" pattern="[0-9]+" />');
		  
		  $(this).parents('.records').find('.row_edit').
		  html('<a href="<?php echo base_url(); ?>myaccount/local_number/update/'+$(this).parents('.records').find('.hidden_localno').val()+'/'+$(this).parents('.records').find('.input_destno').val()+'/'+$(this).parents('.records').find('.input_name').val()+'" class="underline">update</a>');
		  
		  $(this).parents('.records').find('.row_delete').hide();
		  $(this).parents('.records').find('.row_cancel').show();
	  }
	  
  });
  
  
  $('.row_cancel').live('click', function(e) {
	  
	  if(e.type == 'click') {
		
		  $(this).parents('.records').find('.row_name').text($(this).parents('.records').
		  find('.hidden_name').val());
		  
		  
		  $(this).parents('.records').find('.row_destno').text($(this).parents('.records').
		  find('.hidden_destno').val());
		  
		  
		  $(this).parents('.records').find('.row_edit').
		  html('<a href="#" class="underline row_edit">Edit</a>');
		  
		  $(this).parents('.records').find('.row_delete').show();
		  $(this).parents('.records').find('.row_cancel').hide();
	  }
  });
  
  $('.input_name').live('keyup', function(e) {
	if(e.type == 'keyup') {
		$(this).parents('.records').find('.row_edit').
		html('<a href="<?php echo base_url(); ?>myaccount/local_number/update/'+$(this).parents('.records').find('.hidden_localno').val()+'/'+$(this).parents('.records').find('.input_destno').val()+'/'+$(this).parents('.records').find('.input_name').val()+'" class="underline">update</a>');
					
	}
   });
   
   $('.input_destno').live('keyup', function(e) {
	if(e.type == 'keyup') {
		$(this).parents('.records').find('.row_edit').
		html('<a href="<?php echo base_url(); ?>myaccount/local_number/update/'+$(this).parents('.records').find('.hidden_localno').val()+'/'+$(this).parents('.records').find('.input_destno').val()+'/'+$(this).parents('.records').find('.input_name').val()+'" class="underline">update</a>');
					
	}
   });
  
  
  
  
});
</script>
   <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "720px" });
</script>
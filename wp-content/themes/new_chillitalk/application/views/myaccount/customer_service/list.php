<!--  right content-->
<div class="rightcunt">                 
<h1  class="rightcunt2">
Contact Customer Service </h1>


<p class="rightcunt2">

If you experiencing any difficulty with Chillitalk, we recommend you visit our <strong><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/using_chillitalk">FAQ</a></strong>. If you still can't find what you're looking for, please fill out the forms below. Select which subject your problem is related to, briefly describe the problem you are experiencing and press submit.
<br/><br/>
</p>

<?php if($this->session->flashdata('success_send')) { ?>
<div class="clearfix"></div>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('success_send'); ?>.
</div>

<?php } ?>
<br/><br/><br/><br/>
<form name="frmcs" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/customer_service/">
<b  class="leftcom">Subject: &nbsp;&nbsp;&nbsp;</b>

<select class="leftcom" name="subject">
<option value="My Account">My Account</option>
<option value="Top Up">Top Up</option>
<option value="Call Quality">Call Quality</option>
<option value="Mobile Apps">Mobile Apps</option>
<option value="Other">Other</option>
</select>
<br/><br/><br/><br/>
<textarea class="textard" name="problem" placeholder="Tell us your problem" required></textarea>

<div class="login">
            <button type="submit" class="list-group-item" id="blur" >Submit</button>
        </div>
       </form>
        
        
        
      
        
        
        
        
        
        </div>  
         
         
        </div>   </div>  
         
         
 
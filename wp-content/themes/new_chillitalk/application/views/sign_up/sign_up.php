<div class="row-fluid"  style="background:#FFF;">
    
  <!--main logo section  start here-->
  <section class="earnm">
      <h3>Cheap International Calls from Any Device </h3>
      <p class="commfrt">
      Enjoy super-fast connections with the Chillitalk App or sign-up with your landline or mobile phone. Our App is available to download for Smartphone, tablet and PC.
         <br/>     <br/>
     Select your device below and enter your phone number. If you are registering your Smartphone, you&#39;ll receive a text message with your login details and a link to download the App. 
      </p>
  </section>
    
  <section class="apps earnm">
  	<h3>1. Select your device</h3>
    <form method="POST">
      <div id="radios1">
      
        <input type="radio" id="tim1" value="landline" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg',checked:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',hover:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',disabled:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg' }" checked="checked" title="landline" />

       <input type="radio" id="tim2" onclick="toggle('hide');" value="android" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/android.png',checked:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',hover:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/android.png'}" title="android" />
         
        <input type="radio" id="tim3" onclick="toggle('hide');" value="iPhone & iPad" name="group1"  class="{src:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',checked:'<?php echo get_template_directory_uri(); ?>/img/iphone_select.png',hover:'<?php echo get_template_directory_uri(); ?>/img/iphone_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png'}"   title="iPhone" />
           
         <input type="radio" id="tim4" onclick="toggle('hide');" value="PC" name="group1"  class="{src:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',checked:'<?php echo get_template_directory_uri(); ?>/img/PC_select.png',hover:'<?php echo get_template_directory_uri(); ?>/img/PC_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png'}"  title="PC"/>
      </div>
      
    </form>
    <a class="toplink" style="display: block;"></a>
    <br/><br/><br/><br/><br/><br/><br/>
              
    <div id="landline">
    	<h3>2. Sign-up here</h3>
         
    	<section>
        
        
          <div class="appbgcl">
      
          <?php if($this->session->userdata('signup_failed')) { ?>
          
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->userdata('signup_failed'); ?>
            </div>
          <?php } ?>
        
            <form name="frm-signup" id="frm-signup" method="post" action="<?php echo current_url(); ?>">
                <div>
                    <label>First Name</label>
                    <?php if(form_error('first_name')) { ?>
                   
                    <input type="text" name="first_name" style="border-color:red;color:red" value="<?php echo set_value('first_name'); ?>" required="required" />
                    <?php echo form_error('first_name','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                    <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" required="required" />
                    <?php } ?>
                </div>
                    
                <div>
                    <label>Last Name</label>
                    <?php if(form_error('last_name')) { ?>
                    <input type="text" name="last_name" style="color:red;border-color:red;" value="<?php echo set_value('last_name'); ?>" required="required" />
                    <?php echo form_error('last_name','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                    <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" required="required" />
                    
                    <?php } ?>
                </div>
                
                <div>
                    <label>Your email</label>
                    
                    <?php if(form_error('email_address')) { ?>
                    <input type="email" name="email_address" style="color:red;border-color:red" value="<?php echo set_value('email_address'); ?>" required="required" />
                    <?php echo form_error('email_address','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                    <input type="email" name="email_address" value="<?php echo set_value('email_address'); ?>" required="required" />
                    <?php } ?>
                </div>
                
                <div>
                    <label>Your Phone Number</label>
                    <input type="text" class="<?php echo $this->session->userdata('small_flag'); ?>" value="+<?php echo $this->session->userdata('prefix_phone_web'); ?>" name="UK" readonly="readonly">
                    <?php if(form_error('phone_number')) { ?>
                    <input type="text" name="phone_number" style="color:red;border-color:red" value="<?php echo set_value('phone_number'); ?>" required="required" pattern="[0-9]+" />
                    <?php echo form_error('phone_number','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                    <input type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>" required="required" pattern="[0-9]+" />
                    <?php } ?>
                </div>
                
                <div>
                    <label>Create password</label>
                    
                    <?php if(form_error('password')) { ?>
                    <input type="password" name="password" style="color:red;border-color:red" required="required" />
                    <label>4-12 characters</label>
                    <?php echo form_error('password','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                     <input type="password" name="password" required="required" />
                    <label>4-12 characters</label>
                    
                    <?php } ?>           
                </div>
               
                <div>
                    <label>Confirm password</label>
                    
                    <?php if(form_error('confirm_password')) { ?>
                    <input type="password" name="confirm_password" required="required" style="border-color:red" />
                    <?php echo form_error('confirm_password','<span style="color:red">','</span>'); ?>
                    <?php }else{ ?>
                    <input type="password" name="confirm_password" required="required" />
                    <?php } ?>
                </div>
      
                <div>
                    <label>
                    </label>
                    <input type="checkbox" id="checkboxOneInput" required="required" />
                    <label for="checkboxOneInput">
                        <span>I agree to Chillitalk's Terms of services and privacy policy.
                   <!--  Note:15% VAT is added to all prices for EU citizens only.--></span>
                    </label>
                </div>
                <label></label>
                <button type="submit"  class="signupimg leftcaed" />sign-up</button>
            </form>
    	  </div>
        
    	</section>
    </div>
              
    <div id="iphone-android">
    
    <h3 id="store"> 
    2. Enter your phone number and we will send you a text message containing your Login details and a link to the Google Play Store</h3>
        
        <?php if(validation_errors()) { ?>
          <h3 class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo validation_errors(); ?>
          </h3>
        <?php } ?>
        
        <?php if($this->session->userdata('signup_failed')) { ?>
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->userdata('signup_failed'); ?>
          </div>
        <?php } ?>
                  
        <section>            
          <div class="appbgcl">
          
              <form name="frm-signup-mobile" id="frm-signup-mobile" 
              method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps/invalid">
                 
                  <div>
                      <label>
                          Your Phone Number</label>
                      <input type="text" class="<?php echo $this->session->userdata('small_flag'); ?>" value="+<?php echo $this->session->userdata('prefix_phone_web'); ?>" name="UK" readonly="readonly">
                      <input type="text" name="phone_number" required="required" pattern="[0-9]+" />
                      <input type="hidden" name="device" id="device"/>
                  </div>
                  <label></label>
                
                  <button type="submit" class="signupimg leftcaed">sign-up</button>
              </form>
          </div>
        </section>
        
              
     </div>
     </section>
    </div>
  </div>
 
  <script type="text/javascript">
	$(document).ready(function() {
        $('#iphone-android').hide();
		
		if(window.location.href == '<?php echo base_url().$this->session->userdata('lang'); ?>/sign_up#mobile') {
			$('#img_landline').attr('src','<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg');
			$('#img_android').attr('src','<?php echo get_template_directory_uri(); ?>/img/android_select.png');
			$('#landline').hide();
			$('#iphone-android').show();
		}
		
		$('#tim1').on('change', function() {
			$('#landline').show('slow');
			$('#iphone-android').hide('slow');
			
		});
		
				
		$('#tim2').on('change', function() {
			$('#landline').hide('slow');
			$('#iphone-android').show('slow');
			$('#device').val('android');
			$('#store').text('2. Enter your phone number and we will send you a text message containing your Login details and a link to the Google Play Store');
		});
		
		$('#tim3').on('change', function() {
			$('#landline').hide('slow');
			$('#iphone-android').hide('slow');
			$('#img_landline').attr('src','<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg');
			$('#img_android').attr('src','<?php echo get_template_directory_uri(); ?>/img/android.png');
				
		});
		
		$('#tim4').on('change', function() {
			$('#landline').hide('slow');
			$('#iphone-android').hide('slow');
			$('#img_landline').attr('src','<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg');
			$('#img_android').attr('src','<?php echo get_template_directory_uri(); ?>/img/android.png');
		});
		
    });
  </script>
<style type="text/css">
   #signupat {
    background-image: 
	url("http://mundio-test.azurewebsites.net/wp-content/themes/new_chillitalk/img/signupnew.png") !important}
#tim1 + img {
    margin-right: -6px;
    margin-top: -11px;
}


</style>
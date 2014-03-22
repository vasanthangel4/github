<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chillitalk | Cheap international call made easy</title>
    <meta name="description" content="Chillitalk is the low-cost way to call abroad. No SIM change, no PIN, no long 
    numbers. Just ch eap international calls from your mobile or landline." />
    <meta name="keywords" content="calling cards, call india, call pakistan, Chillitalk, Chillitalk, srilanka, 
    bangladesh, cheap international calls, cheap calling card" />
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
    
    <!--STYLESHEET-->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/colorbox.css" rel="stylesheet" type="text/css">
    <!--JS-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script>
		$(document).ready(function() {
           	$(".mainpopup").colorbox({inline:true, 
									   width:"80%", 
									   height:"70%", 
									   open:true,
									   onClosed:function(){ window.location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/" } 
									   }
									  ); 
        });
	</script>  


</head>
<body>
<!--<a href=".maincomon" class="mainpopup"></a>
-->
<div id="pop">
<div class="maincomon">
  <section class="bgmobile">
    <div class="rightcunt">
    <h1><?php echo lang('add.first'); ?></h1>
    <h3><?php echo lang('add.second'); ?></h3>
    
    <?php if(validation_errors()) { ?>
        <div class="clearfix"></div>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo validation_errors(); ?>.
        </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('failed')){ ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->flashdata('failed'); ?>
        </div>
    <?php } ?>
    
    <div class="bgmobile1">
      <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard_alone/">
          <h3><?php echo lang('add.Addcredit'); ?></h3>
          <div class="rightcunt">
              <label><?php echo lang('add.CreditAmount'); ?></label>
              <select name="amount" id="amount" required>
                  <option value=""><?php echo lang('add.Selectamount'); ?></option>
                  <?php foreach($amount->List as $val) { ?>
                  <option value="<?php echo $val->Amount; ?>"><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $val->Amount; ?></option>
                  <?php } ?>
              </select>
          </div>
          
          <div class="rightcunt">
              <label><?php echo lang('add.Aotopup'); ?></label>
              
              
                  <label>
                  <input type="radio" name="auto_recharge" value="true" <?php echo set_radio('auto_recharge', 'true'); ?> id="auto_charge_0"/> <?php echo lang('add.On'); ?>
                  
                  
                  <br/>
                  
                  <input type="radio" name="auto_recharge" <?php echo set_radio('auto_recharge', 'false'); ?> value="false" id="auto_charge_1" checked="checked" style="margin-left:30px" />
                  <?php echo lang('add.Off'); ?>
                  </label>
                  <br />
              
          </div>
          
          <div class="rightcunt">
              <p class="commfrt"><?php echo lang('add.turnontxt'); ?></p>
          </div>
          <hr>
          
          <div class="rightcunt">
              <label class="leftcom"><?php echo lang('add.CardholderFirstname'); ?></label>
              <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
              <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />
          </div>
          
          <div class="rightcunt">
              <label class="leftcom">
              <?php echo lang('add.CardholderLastname'); ?></label>
              <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
          </div>
          
          <div class="rightcunt">
              <label class="leftcom"><?php echo lang('add.Creditcardnumber'); ?></label>
              <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('password'); ?>" name="credit_card_number" required />
          </div>
          
          <div class="rightcunt">
              <label class="leftcom"><?php echo lang('add.ExpirationandCVV'); ?></label>
              
              <div class="leftcom">
                  <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required pattern="[0-9]{2}" min="1" max="12" />
                  
                  <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" placeholder="Year" name="year" required pattern="[0-9]+" min="2009" max="<?php echo date('Y'); ?>" />
                  <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required />
              </div>
          </div>
          <hr>
          
          <div class="rightcunt">
              <label><?php echo lang('add.Billing'); ?>   </label>
              
              <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required pattern="[0-9]+" />
          </div>
          
          <div class="rightcunt">
         	  <label><?php echo lang('add.Country'); ?></label>
              <select name="country" id="country" onChange="print_state('state',this.selectedIndex);">
              
              </select>
          </div>
          
          <div class="rightcunt">
              <label><?php echo lang('add.Billinga'); ?>     </label>
              <textarea placeholder="Enter Address" class="largbox" name="address" required><?php echo set_value('address'); ?></textarea>
          	   <br/>   
               <br/>
          </div>
          
          <div class="rightcunt">
              <label>   <?php echo lang('add.City'); ?>  </label>
              <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required>
          </div>
          
          <div class="rightcunt">
              <label><?php echo lang('add.State'); ?> </label>
              <select title="Select state" id="state" name="state" required>
              </select>
              <script type="text/javascript">print_country("country");</script>
              <script type="text/javascript">date_populate("date", "month", "year");</script>
              
              
              <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Zip.." class="smtxtbx" style="margin-top:10px;" />
          </div>
          <hr>
          <div class="rightcunt">
          
              <label>  <?php echo lang('add.Total'); ?>   </label>
              <label style="text-align:center !important;">
              <input type="hidden" name="total_topup" />
              <div id="text_topup"></div></label>
          </div>
          
          <div class="secbutton commfrt">
              <p><?php echo lang('add.Terms'); ?>
              	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" class="underline" target="_blank"> <?php echo lang('add.Termssv'); ?></a>
              <br>
              <br>
              </p>
              
              <?php if($this->session->userdata('step_sign_up') == base_url().$this->session->userdata('lang').'/sign_up/step1') { ?>
              <div class="signup blue">
              	<a href="<?php echo base_url()?><?php echo $this->session->userdata('lang'); ?>/sign_up/welcome">I want to skip this step</a>
          	  </div>
              
              <?php }elseif($this->session->userdata('step_sign_up') == base_url().$this->session->userdata('lang').'/sign_up/step2') { ?>
              
              
              <div class="signup blue">
              	<a href="<?php echo base_url()?><?php echo $this->session->userdata('lang'); ?>/sign_up/welcome">I want to skip this step</a>
          	  </div>
              
              <?php }elseif($this->session->userdata('step_sign_up') == base_url().$this->session->userdata('lang').'/sign_up/step3') { ?>
              
              
              <div class="signup blue">
              	<a href="<?php echo base_url()?><?php echo $this->session->userdata('lang'); ?>/sign_up/step4">I want to skip this step</a>
          	  </div>
              
              
              <?php }else{  ?>
          
          		<div class="signup blue">
              	<a href="<?php echo base_url()?><?php echo $this->session->userdata('lang'); ?>/sign_up/welcome">I want to skip this step</a>
          	  </div>
              
       		  <?php } ?>   
              <div class="login">
              <button type="submit">purchase credit</button>
              </div>
          </div>
      </form>
  	</div>
    </div>
  </section>
</div>
</div>  
</div>
<script type="text/javascript">
  $(document).ready(function() {
	  $('#text_topup').text('<?php echo $this->session->userdata('currency_symbol_web'); ?> 0');
	  
	  $('#amount').change(function(){
		  $('#text_topup').text('<?php echo $this->session->userdata('currency_symbol_web'); ?> '+$('#amount').val());
	  })
  });
</script>

<script type="text/javascript">
	$( ".leftmyaccount" ).css({height: "1100px" });
</script>

<?php if($this->lang->lang() == 'fr') { ?>  
<style type="text/css"> .appbgcl label, label {
    width: 265px !important;
	font-size:16px !important;
}
</style>   
<?php }else{ ?>  

<style type="text/css"> .appbgcl label, label {
    width: 247px !important;
}
</style>   
<style type="text/css">
.topupns a {
    background-image: url(  "http://mundio-test.azurewebsites.net/wp-content/themes/new_chillitalk/img/topupnew.png") !important;
    height: 30px !important;
    line-height: 26px;
    margin-top: -5px;
    text-indent: -18px !important;
    width: 102px !important;
}

</style>

<?php } ?> 
</body>
</html>
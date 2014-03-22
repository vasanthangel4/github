<!--  right content-->


                  
            <div class="rightcunt">
                <h1>
                  <?php echo lang('add.first'); ?> </h1>
                <h3>
                    <?php echo lang('add.second'); ?>  </h3>
                    
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
                    <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard/">
                    <h3>     <?php echo lang('add.Addcredit'); ?></h3>
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.CreditAmount'); ?>   </label>
                        <select name="amount" id="amount" required>
                        	<option value="">    <?php echo lang('add.Selectamount'); ?> </option>
                            <?php foreach($amount->List as $val) { ?>
                            <option value="<?php echo $val->Amount; ?>"><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $val->Amount; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="rightcunt">
                        <label>
                      
                             <?php echo lang('add.Aotopup'); ?>
                        </label>
                        
                        <p>
                          <label>
                            <input type="radio" name="auto_recharge" value="true" <?php echo set_radio('auto_recharge', 'true'); ?> id="auto_charge_0"  />
                               <?php echo lang('add.On'); ?></label>
                          <br />
                          <label>
                            <input type="radio" name="auto_recharge" <?php echo set_radio('auto_recharge', 'false'); ?> value="false" id="auto_charge_1" checked="checked" />
                          <?php echo lang('add.Off'); ?>   </label>
                          <br />
                        </p>
                        
						
                    </div>
                    <div class="rightcunt">
                        <p class="commfrt">
                         <?php echo lang('add.turnontxt'); ?> 
                        
                        </p>
                    </div>
                    <hr>
                    <div class="rightcunt">
                        <label class="leftcom">
                           
                             <?php echo lang('add.CardholderFirstname'); ?>   
                            
                            </label>
                        <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
                        <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />
                    </div>
                    
                    <div class="rightcunt">
                        <label class="leftcom">
                            <?php echo lang('add.CardholderLastname'); ?>      </label>
                        <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
                    </div>
                    
                    <div class="rightcunt">
                        <label class="leftcom">
                       <?php echo lang('add.Creditcardnumber'); ?>        </label>
                        <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('password'); ?>" name="credit_card_number" required="required">
                    </div>
                    <div class="rightcunt">
                        <label class="leftcom">
                                 <?php echo lang('add.ExpirationandCVV'); ?>    </label>
                        <div class="leftcom">
                            <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required="required" pattern="[0-9]{2}" min="1" max="12">
                            <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" placeholder="Year" name="year" required="required" pattern="[0-9]+" min="2009" max="<?php echo date('Y'); ?>">
                            <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required="required">
                        </div>
                    </div>
                    <hr>
                    <div class="rightcunt">
                        <label>
                           <?php echo lang('add.Billing'); ?>   </label>
                        <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required="required" pattern="[0-9]+">
                    </div>
                    
                    <div class="rightcunt">
                        <label>       <?php echo lang('add.Country'); ?> </label>
                        <select name="country" id="country" onChange="print_state('state',this.selectedIndex);">
                            
                        </select>
                    </div>
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.Billinga'); ?>     </label>
                        <textarea placeholder="Enter Address" class="largbox" name="address" required="required"><?php echo set_value('address'); ?></textarea>
                        <br/>   <br/>
                    </div>
                 
                    <div class="rightcunt">
                        
                        <label>   <?php echo lang('add.City'); ?>  </label>
                        <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required="required">
                    </div>
                    <div class="rightcunt">
                        <label><?php echo lang('add.State'); ?> </label>
                        <select title="Select state" id="state" name="state" required>
                        </select>
                        <script type="text/javascript">print_country("country");</script>
                        <script type="text/javascript">date_populate("date", "month", "year");</script>
                       
                        
                        <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Zip.." class="smtxtbx" style="margin-top:10px;">
                    </div>
                    <hr>
                    <div class="rightcunt">
                   
                          <label>  <?php echo lang('add.Total'); ?>   </label>
                        <label style="text-align:center !important;">
                            <input type="hidden" name="total_topup" />
                            <div id="text_topup"></div></label>
                    </div>
                   
                    <div class="secbutton commfrt">
                        <p>
                         <?php echo lang('add.Terms'); ?>
                             <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline"> <?php echo lang('add.Termssv'); ?></a>
                            <br>
                            <br>
                        </p>
                        <div class="login">
                            <button type="submit">purchase credit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->

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
   <?php if($this->lang->lang() == 'fr') { ?>  <style type="text/css"> .appbgcl label, label {
    width: 265px !important;
	font-size:16px !important;
}
</style>   <?php }else{ ?>  <style type="text/css"> .appbgcl label, label {
    width: 247px !important;
}
</style>   <?php } ?> 

<style type="text/css">
.topupns a {
    border:1px solid #6ea600 !important;
	}

</style>
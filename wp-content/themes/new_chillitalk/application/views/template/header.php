<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1" />
    <title>Chillitalk | Cheap international call made easy</title>
    <meta name="description" content="Chillitalk is the low-cost way to call abroad. No SIM change, no PIN, no long 
    numbers. Just ch eap international calls from your mobile or landline." />
    <meta name="keywords" content="calling cards, call india, call pakistan, Chillitalk, Chillitalk, srilanka, 
    bangladesh, cheap international calls, cheap calling card" />
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
    
    <!--STYLESHEET-->
    <link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap-responsive.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <?php if($this->uri->segment('2') == '') { ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/facelift.css" rel="stylesheet" type="text/css">
    
	<?php } ?>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
    <!--JS-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/Jscript1.js"></script>
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/Jscript2.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/backtotop.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.imageradio.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/SpryMenuBar.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.imageradio.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/countries-2.0-min.js"></script>
  
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function () { 
		$('#radios1').imageradio({ hidden: false }); 
		$('#radios2').imageradio(); 
		$('#radios3').imageradio(); 
		});
    </script>


	
    <?php wp_head(); ?>
	
  
  </head>
  <body>
     <header class="cstxts">
     <div  id="maincontent">
     <div class="maincomon">
            <div class="flgbttn spanc1">
            	
                <?php if($this->session->userdata('firstname') != '') { ?>
                
            	<div class="leftcom csname">
                    Welcome <?php echo $this->session->userdata('firstname'); ?>
                </div>
                
				<?php } ?>
                
                
			<!--	<button type="submit">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/UK.gif" alt="Chillitalk UK" /></button>
                <span>UK English </span>
                <div class="arrow">
                </div>-->
                <script type="text/javascript">
                $('#pic-changer').change(function(){ //if the select value gets changed
   var imageSource = $(this).find(':selected').data('picture'); //get the data from data-picture attribute
   if(imageSource){ //if it has data
      $('#image-location').hmtl('<img src="'+imageSource+'">'); // insert image in div image-location
   } else {
      $('#image-location').hmtl(''); //remove content from div image-location, thus removing the image
   }
})
                
                </script>
              <span class="leftcom txsgd">Language</span>
    <select class="leftcom slectdt" onChange="window.location.href='<?php echo base_url(); ?>'+$(this).val()+'<?php echo substr($this->uri->uri_string(),2); ?>'">
    
    <?php if($this->uri->segment('1') == 'en') { ?>
    <option class="uk" value="en" selected>UK </option>
    <?php }else{ ?>
    <option class="uk" value="en">UK </option>
    <?php } ?>
  <!--  <?php if($this->uri->segment('1') == 'us') { ?>
    <option class="us" value="us" selected>USA </option>
    <?php }else{ ?>
    <option class="us" value="us" >USA </option>
    <?php } ?>
     <?php if($this->uri->segment('1') == 'us') { ?>
    <option class="au" value="us" selected>Australia</option>
    <?php }else{ ?>
    <option class="au" value="us" >Australia </option>
    <?php } ?>
    <?php if($this->uri->segment('1') == 'at') { ?>
    <option class="at" value="at" selected>Austria</option>
    <?php }else{ ?>
    <option class="at" value="at" >Austria </option>
    <?php } ?>
 <?php if($this->uri->segment('1') == 'fr') { ?>
    <option class="fr" value="fr" selected>France</option>
    <?php }else{ ?>
    <option class="fr" value="fr" >France</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'de') { ?>
    <option class="de" value="de" selected>Germany</option>
    <?php }else{ ?>
    <option class="de" value="de">Germany</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'se') { ?>
    <option class="se" value="se" selected>Sweden</option>
    <?php }else{ ?>
    <option class="se" value="se">Sweden</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'dk') { ?>
    <option class="dk" value="dk" selected>Denmark</option>
    <?php }else{ ?>
    <option class="dk" value="dk">Denmark</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'pl') { ?>
    <option class="pl" value="pl" selected>Polish</option>  
    <?php }else{ ?>
    <option class="pl" value="pl">Polish</option>  
    <?php } ?> 
 -->
	 
    </select>
                
       <?php if($this->lang->lang() == 'fr') { ?>  <style type="text/css">  #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover, ul.nav li,.topupns  a{font-size:13px !important;}</style>   <?php } 
 elseif($this->lang->lang() == 'de') { ?>  <style type="text/css">  #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover, ul.nav li,.topupns  a{font-size:13px !important;}</style>   <?php }
  elseif($this->lang->lang() == 'se') { ?>  <style type="text/css">  #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover, ul.nav li,.topupns  a{font-size:13px !important;}</style>   <?php }
    elseif($this->lang->lang() == 'dk') { ?>  <style type="text/css">   #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover,ul.nav li,.topupns  a{font-size:13px !important;}</style>   <?php }
	 elseif($this->lang->lang() == 'pl') { ?>  <style type="text/css">  #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover, ul.nav li,.topupns  a{font-size:13px !important;}                          #loginimg a, #signupimg a,#loginimg a:hover, #signupimg a:hover{text-indent:11px !important}</style>   <?php }
	   
	   else{ ?>  <style type="text/css"> ul.nav li{font-size:16px !important;}</style>   <?php } ?> 
                  
               <?php if($this->session->userdata('firstname') != '') { ?>
                
                <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard/logout" onClick="return confirm('Are you sure want to logout ?')" class="leftcom underline tctdcss">Log Out</a>
                
               <?php } ?>
               
                
                  <section class="topupns"><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/"><?php echo lang('header.Topup'); ?></a> </section>
               <section id="loginbg">    
               <?php if($this->session->userdata('username') == '') { ?>
                  
                    
              <?php if($this->lang->lang() == 'fr') { ?>
  	  <div class="login">    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/"   title="login with your Chillitalk account">
                     <?php echo lang('header.login'); ?>
                    </a> 
                      </div>
    <?php }else{ ?>
     <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/"  title="login with your Chillitalk account">
                     <?php echo lang('header.login'); ?>
                    </a> 
                    </section>
    <?php } ?>         
 <section id="signupat" >
                	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up" title="signup">
                    	<!--  <?php echo lang('header.signup'); ?>-->
                        sign-up
                    </a>
               
                </section>
                <?php }else{ ?>
                 <ul style="width:120px !important">
                <li style="width:120px !important">
                    <a  style="width:120px !important; background-image:none !important;" id="txtsmyacc" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard" title="my account">
                      <?php echo lang('header.myaccount'); ?>
                    </a>   
                </li>
                
                  
                <?php } ?>
                  </ul>
             
            </div> </div>   </div>
        </header>
  <!--main content start here-->
    <div id="maincontent">
     
        
        <?php if($this->uri->segment('2') == '') { ?>
        
        <!--nav section  start here-->
        <nav class="maincomon">
            <ul class="nav rightcom">
            	<li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/features/" title="features"><?php echo lang('header.features'); ?></a> </li>
                
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/rates/" title="rates">
                  <?php echo lang('header.rates'); ?></a></li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/application/" title="apps"> <?php echo lang('header.apps'); ?></a>
                    
                </li>
                 <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/bundles/" title="bundles"><?php echo lang('header.bundles'); ?></a> </li>
                
                
              <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/" title="support"><?php echo lang('header.support'); ?></a> </li>
                         
         

    <li class="txmyacs"><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/earn_money/">earn free credit</a> </li>
                <?php if($this->session->userdata('username') == '') { ?>
                <li class="login ">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/"  title="login with your Chillitalk account">
                        
                         <?php echo lang('header.login'); ?>
                    </a>   
                </li>
                <li id="signupimg" style="margin-top:-2px !important;float:left !important;display:none !important;">
                	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up" title="signup" style="padding-top:3px !important">
                    	 <?php echo lang('header.signup'); ?> 
                    </a>
                </li>
                
                <?php }else{ ?>
                
                <li class="none">
                    <a class="none" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard" title="my account">
                       <?php echo lang('header.myaccount'); ?> 
                    </a>   
                </li>
                
                <?php } ?>
                
            </ul>
        </nav>
        <a class="toplink" style="display: block;"></a>
        
		<!--main logo section  start here-->
        <header class="maincomon mainlogo leftcom">
         <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/img/world.jpg" alt="Chillitalk" /></a>
          <div class="mainlogo1 leftcom">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Chillitalk" />
           
            
            <?php if($this->lang->lang() == 'fr') { ?>
   <h1 style="width:535px"><?php echo lang('header.first'); ?></h1>
    <?php } 
 elseif($this->lang->lang() == 'de') { ?> 
   <h1 style="width:535px"><?php echo lang('header.first'); ?></h1>
    <?php }
	elseif($this->lang->lang() == 'pl') { ?> 
   <h1 style="width:535px"><?php echo lang('header.first'); ?></h1>
    <?php }
	 elseif($this->lang->lang() == 'dk') { ?> 
   <h1 style="width:623px"><?php echo lang('header.first'); ?></h1>
    <?php }
	
	else{ ?>
  	 <h1><?php echo lang('header.first'); ?></h1>
    <?php } ?>
            
          </div>
        </header>
        <!--main logo section  end here-->
        
    	<?php }else{ ?>
		
        <!--nav section  start here-->
          <nav class="maincomon">
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/innerlogo.png" alt="ChilliTalk Logo" />
            </a>
            <ul class="nav rightcom">
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/features/" title="features"><?php echo lang('header.features'); ?></a> </li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/rates/" title="rates">
                               <?php echo lang('header.rates'); ?>
                </a></li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/application/" title="apps">  <?php echo lang('header.apps'); ?></a>
                   
                </li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/bundles" title="bundles"> <?php echo lang('header.bundles'); ?></a> </li>
                
                
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/" title="support"><?php echo lang('header.support'); ?></a> </li>
                
                  <li class="txmyacs"><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/earn_money/">earn free credit</a> </li>
                
                <?php if($this->session->userdata('username') == '') { ?>
                <li class="login none">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/" class="none" title="login with your Chillitalk account">
                      <?php echo lang('header.login'); ?>  
                    </a>   
                </li>
                <li id="signupimg" style="margin-top:-2px !important;float:left !important;display:none !important;">
                	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/" title="signup" style="padding-top:3px !important">
                  <?php echo lang('header.signup'); ?>
                    </a>
                </li>
                
                <?php }else{ ?>
                
               
                <li class="none">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard"  title="my account" class="none">
                       <?php echo lang('header.myaccount'); ?> 
                    </a>   
                </li>
                
                <?php } ?>
               
            </ul>
            
           
          </nav>
          <!--nav section  end here-->
        
        <?php } ?>
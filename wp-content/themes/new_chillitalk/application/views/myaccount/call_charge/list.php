<!--  right content-->
            <div class="rightcunt">
                <h1>
                    Call & Charge History</h1>
                <div class="callhiswid clearall">
                    <div>
                        <h5>
                            Card on File</h5>
                        <?php if($balance->Last6digitsCC == '') { ?>
                        <span>- </span><span>-</span>
                        <?php }else{ ?>
                        <span>VISA </span><span><?php echo $balance->expirydatemonth; ?>/<?php echo $balance->expirydateyear; ?> <?php echo $balance->Last6digitsCC; ?></span>
                        <?php } ?>
                    </div>
                    <div>
                        <h5>
                            Available Credit
                        </h5>
                        <p>
                            Credit
                        </p>
                        <span><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->MasterBal, 0); ?></span>
                        <br />
                        <p>
                            Bonus Credit
                        </p>
                        <span><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->PkgBal,0); ?></span>
                        <br />
                        <p class="bold">
                            Total Balance
                        </p>
                        <span class="bold"><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->TotalBal,0); ?></span>
                    </div>
                    <div>
                        <h5>
                            Home Saver Bundles</h5>
                        <p>
                            No Home Saver Bundles currently in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this account
                        </p>
                    </div>
                </div>
                <div class="rightcunt">                	
                    <h3>
                        Charge History
                    </h3>
                 <!--   <div class="rightlink">
                        <a href="" class="underline">View all</a>  <a href=""  class="underline">Print all</a>
                    </div>-->
                    <div class="rightcunt">
	                	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="chargeHistoryTable">
				            <thead>
				                <tr>
				                    <th>
				                        Order ID
				                    </th>
				                    <th>
				                        Order date(ET)
				                    </th>
				                    <th>
				                        Amount
				                    </th>
				                    <th>
				                        Card Number
				                    </th>
				                    <th>
				                    	Status
				                    </th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php foreach($topup->List as $val) { ?>
		                          <tr class="odd gradeX">
		                              <td>
		                                  <?php echo $val->OrderId; ?></td>
		                              <td>
		                                  <?php echo strftime('%d/%m/%Y', strtotime($val->OrderDate)); ?></td>
		                              <td>
		                                  <?php 
		                                  if($val->Amount == ''){
		                                  	echo str_replace($this->session->userdata('currency_web'),$this->session->userdata('currency_symbol_web'),0);
		                                  }else{
		                                  	echo str_replace($this->session->userdata('currency_web'),$this->session->userdata('currency_symbol_web'),$val->Amount); 
		                                  }
		                                  	
		                                  ?>
		                              </td>
		                              <td>
		                                  <?php echo $val->CardNo; ?>
		                              </td>
		                              <td>
		                                  <?php echo $val->TopupStatus; ?>
		                              </td>
		                          </tr>
	                          <?php } ?>
	                		</tbody>
	                	</table>	
	                	<div class="rightcom rightlink1" style="margin-bottom: 15px">
                            <?php echo $th_nav_url; ?>&emsp;&emsp;
                            <a href="">Go to date </a> <input type="text" placeholder="04/2013" class="accdtd" />  <a href="">Go</a>
                        </div>
                	</div>
                </div>
                <hr/>
                <div class="rightcunt">
                	
                    <h3>
                        Call History
                    </h3>
                   <!-- <div class="rightlink">
                        <a href="" class="underline">View all</a>  <a href=""  class="underline">Print all</a>
                    </div>-->
                    <div class="rightcunt">
                    	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered pddinbg" id="callHistoryTable" >
                        	<thead>
				                <tr>
				                    <th>
				                        <img src="<?php echo get_template_directory_uri(); ?>/img/ring.jpg" alt="Chillitalk Call" />
				                    </th>
				                    <th>
				                        Date
				                    </th>
				                    <th>
				                        From
				                    </th>
				                    <th>
				                        To
				                    </th>
				                    <th>
				                    	Duration
				                    </th>
				                    <th>
				                    	Amount
				                    </th>
				                    <th>
				                    	Balance
				                    </th>
				                </tr>
				            </thead>
				            <tbody>
                        
                        	<?php foreach($call as $val) { ?>
		                    <tr class="odd gradeX">
			                    <td>
			                    	<img src="<?php echo get_template_directory_uri(); ?>/img/chilli.png" alt="Chillitalk Call" />
			                  	</td>
			                  	<td>
				                    <?php if($val->CallDate == '') { 
				                    	echo '-';
				                    }else{ 
				                    	echo strftime('%d/%m/%Y %H:%M:%S', strtotime($val->CallDate));
				                    } ?>
			                    </td>
		                        <td><?php echo $val->Ani; ?> </td>
		                        <td><?php echo $val->DialedNum; ?>  </td>
		                        <td><?php echo strftime('%H:%M:%S', strtotime($val->TalkTime)); ?> </td>
		                        <td> <?php echo $this->session->userdata('currency_symbol_web').' '.$val->TalkCharge; ?></td>
		                        <td> <span class="bold"><?php echo $this->session->userdata('currency_symbol_web').' '.$val->Balance; ?></span></td>
		                    </tr>
                    		<?php } ?>
                    	</tbody>
                	</table>
                       
                         <div class="rightcom rightlink1" style="margin-bottom: 15px">
                            <?php echo $ch_nav_url; ?>&emsp;&emsp;
                            <a href="">Go to date </a> <input type="text" placeholder="04/2013" class="accdtd" />  <a href="">Go</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>
      <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "1270px" });
</script>

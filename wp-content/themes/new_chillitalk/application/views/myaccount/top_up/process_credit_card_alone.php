<form id="form_process_credit_card1" method="post" action="<?php echo base_url(); ?>myaccount/top_up/process_credit_card_alone">
    
    <input type="hidden" name="ref_code" id="ref_code" value="<?php echo $this->session->userdata('ref_code_card1'); ?>" />
    <input type="submit" id="formButton" style="visibility:hidden" />
</form>

<script language="javascript">
     document.getElementById("formButton").click();
</script>

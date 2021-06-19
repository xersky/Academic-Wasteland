<script src="https://cdn.jotfor.ms/js/vendor/jquery-1.8.0.min.js?v=3.3.25226" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/js/vendor/maskedinput.min.js?v=3.3.25226" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/js/vendor/jquery.maskedinput.min.js?v=3.3.25226" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.min.js"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.25226" type="text/javascript"></script>
<script type="text/javascript"> JotForm.init(function(){ JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"]; JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]; JotForm.calendarOther = {"today":"Today"}; var languageOptions = document.querySelectorAll('#langList li'); for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("3", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); }); } JotForm.setCalendar("3", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); JotForm.formatDate({date:(new Date()), dateField:$("id_"+3)}); JotForm.displayLocalTime("input_3_hourSelect", "input_3_minuteSelect","input_3_ampm", "input_3_timeInput", false);
   if (window.JotForm && JotForm.accessible) $('input_4').setAttribute('tabindex',0); setTimeout(function() { $('input_5').hint('ex: email@website.com'); }, 20);
   if (window.JotForm && JotForm.accessible) $('input_7').setAttribute('tabindex',0); JotForm.newDefaultTheme = true; JotForm.extendsNewTheme = false; JotForm.newPaymentUIForNewCreatedForms = false; JotForm.newPaymentUI = true; /*INIT-END*/ }); JotForm.prepareCalculationsOnTheFly([null,{"name":"clickTo","qid":"1","text":"We are here to assist you!","type":"control_head"},{"name":"submit","qid":"2","text":"Send","type":"control_button"},{"name":"dateOf","qid":"3","text":"Date of filling the form:","type":"control_datetime"},{"name":"complainantsName","qid":"4","text":"Complainant's Name:","type":"control_textbox"},{"name":"email5","qid":"5","subLabel":"example@example.com","text":"E-mail","type":"control_email"},{"name":"clickTo6","qid":"6","text":"","type":"control_text"},{"name":"theComplaint","qid":"7","text":"The complaint is regarding:","type":"control_textarea"}]); setTimeout(function() {
   JotForm.paymentExtrasOnTheFly([null,{"name":"clickTo","qid":"1","text":"We are here to assist you!","type":"control_head"},{"name":"submit","qid":"2","text":"Send","type":"control_button"},{"name":"dateOf","qid":"3","text":"Date of filling the form:","type":"control_datetime"},{"name":"complainantsName","qid":"4","text":"Complainant's Name:","type":"control_textbox"},{"name":"email5","qid":"5","subLabel":"example@example.com","text":"E-mail","type":"control_email"},{"name":"clickTo6","qid":"6","text":"","type":"control_text"},{"name":"theComplaint","qid":"7","text":"The complaint is regarding:","type":"control_textarea"}]);}, 20); 
</script>
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.25226" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f7ed99c2c2c7240ba580251"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/payment/payment_styles.css?3.3.25226" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/payment/payment_feature.css?3.3.25226" />
<form class="jotform-form" action="../../../Server/ComplaintFiledHandler.php" method="POST" name="form_211204026833544" id="211204026833544" accept-charset="utf-8" autocomplete="on">
   <input type="hidden" name="formID" value="211204026833544" /> <input type="hidden" id="JWTContainer" value="" /> <input type="hidden" id="cardinalOrderNumber" value="" /> 
   <div role="main" class="form-all">
      <ul class="form-section page-section">
         <li id="cid_1" class="form-input-wide" data-type="control_head">
            <div class="form-header-group header-large">
               <div class="header-text httal htvam">
                  <h1 id="header_1" class="form-header" data-component="header"> We are here to assist you! </h1>
                  <div id="subHeader_1" class="form-subHeader"> Please complete the form below for your complaints. </div>
               </div>
            </div>
         </li>
         <li class="form-line" data-type="control_datetime" id="id_3">
            <label class="form-label form-label-top form-label-auto" id="label_3" for="lite_mode_3"> Date of filling the form: </label> 
            <div id="cid_3" class="form-input-wide" data-layout="half">
               <div data-wrapper-react="true">
                  <div style="display:none"> <span class="form-sub-label-container" style="vertical-align:top"> <input type="tel" class="form-textbox validate[limitDate]" id="month_3" name="q3_dateOf[month]" size="2" data-maxlength="2" data-age="" maxLength="2" value="05" autoComplete="off" aria-labelledby="label_3 sublabel_3_month" /> <span class="date-separate" aria-hidden="true"> - </span> <label class="form-sub-label" for="month_3" id="sublabel_3_month" style="min-height:13px" aria-hidden="false"> Month </label> </span> <span class="form-sub-label-container" style="vertical-align:top"> <input type="tel" class="currentDate form-textbox validate[limitDate]" id="day_3" name="q3_dateOf[day]" size="2" data-maxlength="2" data-age="" maxLength="2" value="01" autoComplete="off" aria-labelledby="label_3 sublabel_3_day" /> <span class="date-separate" aria-hidden="true"> - </span> <label class="form-sub-label" for="day_3" id="sublabel_3_day" style="min-height:13px" aria-hidden="false"> Day </label> </span> <span class="form-sub-label-container" style="vertical-align:top"> <input type="tel" class="form-textbox validate[limitDate]" id="year_3" name="q3_dateOf[year]" size="4" data-maxlength="4" data-age="" maxLength="4" value="2021" autoComplete="off" aria-labelledby="label_3 sublabel_3_year" /> <label class="form-sub-label" for="year_3" id="sublabel_3_year" style="min-height:13px" aria-hidden="false"> Year </label> </span> </div>
                  <span class="form-sub-label-container" style="vertical-align:top"> <input type="text" class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_3" size="12" data-maxlength="12" maxLength="12" data-age="" value="05-01-2021" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" autoComplete="off" aria-labelledby="label_3 sublabel_3_litemode" /> <img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_3_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2" /> <label class="form-sub-label" for="lite_mode_3" id="sublabel_3_litemode" style="min-height:13px" aria-hidden="false"> Date </label> </span> 
               </div>
            </div>
         </li>
         <li class="form-line" data-type="control_textbox" id="id_4">
            <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4"> Complainant's Name: </label> 
            <div id="cid_4" class="form-input-wide" data-layout="half"> <input type="text" id="input_4" name="id_client" data-type="input-textbox" class="form-textbox" value="<?php $CurrentUser->FullName;?>" style="width:310px" size="310" placeholder="<?php $CurrentUser->FullName;?>" data-component="textbox" aria-labelledby="label_4" /> <label><?php $CurrentUser->FullName;?> </label></div>
         </li>
         <li class="form-line" data-type="control_textbox" id="id_4">
            <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4"> Complaint Addressed To: </label> 
            <div id="cid_4" class="form-input-wide" data-layout="half"> <input type="text" id="input_4" name="id_fournisseur" data-type="input-textbox" class="form-textbox" value="" style="width:310px" size="310" placeholder="" data-component="textbox" aria-labelledby="label_4" /></div>
         </li>
         <li class="form-line" data-type="control_email" id="id_5">
            <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5"> Subject </label> 
            <div id="cid_5" class="form-input-wide" data-layout="half"> <span class="form-sub-label-container" style="vertical-align:top"> <input type="subject" id="input_5" name="email" value="" class="form-textbox" style="width:310px" size="310" placeholder="" aria-labelledby="label_5 sublabel_input_5" /> </span> </div>
         </li>
         <li class="form-line" data-type="control_textarea" id="id_7">
            <label class="form-label form-label-top form-label-auto" id="label_7" for="input_7"> Body: </label> 
            <div id="cid_7" class="form-input-wide" data-layout="full"> <textarea id="input_7" class="form-textarea" name="content" style="width:648px;height:163px" data-component="textarea" aria-labelledby="label_7"></textarea> </div>
         </li>
         <li class="form-line" data-type="control_button" id="id_2">
            <div id="cid_2" class="form-input-wide" data-layout="full">
               <div data-align="left" class="form-buttons-wrapper form-buttons-left jsTest-button-wrapperField"> <button id="input_2" type="submit" name="Send" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content=""> Send </button> </div>
            </div>
         </li>
         <li style="display:none"> Should be Empty: <input type="text" name="website" value="" /> </li>
      </ul>
   </div>
   <script> JotForm.showJotFormPowered = "new_footer"; </script> <script> JotForm.poweredByText = "Powered by JotForm"; </script> <input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="211204026833544" /> <script type="text/javascript"> var all_spc = document.querySelectorAll("form[id='211204026833544'] .si" + "mple" + "_spc");
      for (var i = 0; i < all_spc.length; i++)
      { all_spc[i].value = "211204026833544-211204026833544";
      } 
   </script> 
</form>
<script src="https://cdn.jotfor.ms//js/vendor/smoothscroll.min.js?v=3.3.25226"></script>
<script src="https://cdn.jotfor.ms//js/errorNavigation.js?v=3.3.25226"></script>
<?php
/****
Function Name: drawExpiryRateForm
Functionality: Return HTML block for the expiry rate page
Notes                   :       If you want to create your own custom form, you can create 
                                        customExpiryRateForm function (case sensetive) and make 
                                        it return html element
****/
function drawExpiryRateForm()
{
        if(function_exists('customExpiryRateForm'))
                return customExpiryRateForm();

        $html = '<div id="expiryRateBlock"><div class="rawWrapper">';
        $html .= '      <label for="endDate">'.__('Date:','spot').'</label><input type="text" id="endDate" name="endDate">';    
        $html .= '      <label for="assetType">'.__('Asset:','spot').'</label><select  name="assetType" id="assetType"></select></div>';
        $html .= '      <table class="table table-condensed table-hover table-bordered expiryRateTable" cellpadding="0" cellspacing="0">';
        $html .= '      <thead>';
        $html .= '              <tr>';
        $html .= '                      <th>'.  __('Asset','spot') .'</th>';
        $html .= '                      <th>'.  __('Expiry Rate','spot') .'</th>';
        $html .= '                      <th>'.  __('Expire Date','spot') .'</th>';
        $html .= '              </tr>';
        $html .= '      </thead>';
        $html .= '      <tbody>';
        $html .= '      </tbody>';
        $html .= '      </table>';
        $html .= '      <div class="pagination">';
        $html .= '              <ul></ul>';
        $html .= '      </div>';
        $html .= '</div>';
        return $html;
}
 
/****
Function Name: drawTradingPlatform
Functionality: Return HTML block for the trading platform
Notes			: 	If you want to create your own custom form, you can create 
					customTradingPlatform function (case sensetive) and make 
					it return html element
****/

function drawTradingPlatform()
{
	if(function_exists('customTradingPlatform'))
		return customTradingPlatform();
	$html = '<iframe src="http://'.get_option('platform_url').'/" width="725px" height="660px" id="Trade" ></iframe>';
//	$html = '<div id="so_container"></div>';
	return $html;
}

/****
Function Name: drawWitdrawalForm
Functionality: Return HTML block for the withdrawal form
Notes			: 	If you want to create your own custom form, you can create 
					customWitdrawalForm function (case sensetive) and make 
					it return html element
****/
function drawWitdrawalForm()
{
	if(function_exists('customWitdrawalForm'))
		return customWitdrawalForm();
      
	$html = '<div class="request">';
	$html .= '	<form name="withdrawal" id="withdrawal" method="POST">';
	$html .= '		<table class="table " cellpadding="0" cellspacing="0">';
	$html .= '			<tbody>';
	$html .= '				<tr>';
	$html .= '					<td class="propName">'. __('Amount: ','spot') .'</td>';
	$html .= '					<td class="inputTd"><input type="text" value="" name="amount"  ></input></td>';
	$html .= '				</tr>';
        $html .= '				<tr>';
        $html .= '					<td class="submitTd" colspan="2"><input class="btn" type="submit" name="request" value="'. __('Submit','spot') .'" /></td>';
        $html .= '				</tr>';
	$html .= '				 <input type="hidden" name="action" value="addWithdrawal">';
	$html .= '				 <input type="hidden" name="paymentMethod" value="creditCard">';
	$html .= '			</tbody>';
	$html .= '		</table>';
	$html .= '		';
	$html .= '	</form>';
	$html .= '	<div class="errors">'. @$errors .'</div>';
	$html .= '</div>';

	return $html;
}

/****
Function Name: drawpersonalInfoForm
Functionality: Return HTML block for the personal info form
Notes			: 	If you want to create your own custom form, you can create 
					custompersonalInfoForm function (case sensetive) and make 
					it return html element
****/
function drawpersonalInfoForm()
{
	if(function_exists('custompersonalInfoForm'))
		return custompersonalInfoForm();
        
	$html = '<div class="request">';
	$html .= '	<form name="personalInfo" method="POST" id="mainInfo">';
	$html .= '		<table class="table " cellpadding="0" cellspacing="0">';
	$html .= '			<tbody>';
	$html .= '				<tr class="mail">';
	$html .= '					<td class="propName">'. __('Email: ','spot') .'</td>';
	$html .= '					<td class="inputTd"><input type="text" value="" name="email"  ></input></td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr class="Fname">';
	$html .= '					<td class="propName">'. __('First Name','spot') .'</td>';
	$html .= '					<td class="info"></td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr class="Lname">';
	$html .= '					<td class="propName">'. __('Last Name','spot') .'</td>';
	$html .= '					<td class="info"></td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr class="Country">';
	$html .= '					<td class="propName">'. __('Country','spot') .'</td>';
	$html .= '					<td class="selectTd">';
	$html .= '						<div class="styled-select-regular"><select name="Country" class="countrylist" id="countries">';
	$html .= '						</select></div>';
	$html .= '					</td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr class="phone">';
	$html .= '					<td class="propName">'. __('Phone','spot') .'</td>';
	$html .= '					<td class="inputTd"><input type="text" value="" name="Phone"  ></input></td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr class="Curr">';
	$html .= '					<td class="propName">'. __('Currency','spot') .'</td>';
	$html .= '					<td class="info"></td>';
	$html .= '					<td class="errors"></td>';
	$html .= '				</tr>';
	$html .= '				<tr>';
	$html .= '					<td class="propName"></td>';
	$html .= '					<td class="submitTd">';
	$html .= '						<input type="hidden" name="updateAccount" value="1">';
	$html .= '						<input class="btn btn-large btn-primary" value="'. __('Apply','spot') .'" type="submit">';
	$html .= '					</td>';
	$html .= '					<td></td>';
	$html .= '				</tr>';
	$html .= '			</tbody>';
	$html .= '		</table>';
	$html .= '	</form>';
	$html .= '	<div class="formsSeparator"></div>';
	$html .= '	<form action="#" method="POST" class="passwordForm">';
	$html .= '		<table class="personalDetails passwordTable" cellpadding="10" cellspacing="0" border="0">';
	$html .= '			<tbody><tr>';
	$html .= '				<td class="propName">'. __('Current Password','spot') .'</td>';
	$html .= '				<td class="inputTd"><input type="password" name="oldPassword" autocomplete="off"></td>';
	$html .= '				<td class="desc"></td>';
	$html .= '			</tr>';
	$html .= '			<tr>';
	$html .= '				<td class="propName">'. __('New Password','spot') .'</td>';
	$html .= '				<td class="inputTd"><input type="password" name="password" autocomplete="off"></td>';
	$html .= '				<td class="desc">'. __('Password should be 6 characters or more','spot') .'</td>';
	$html .= '			</tr>';
	$html .= '			<tr>';
	$html .= '				<td class="propName">'. __('Repeat Password','spot') .'</td>';
	$html .= '				<td class="inputTd"><input type="password" name="repeatPassword" autocomplete="off"></td>';
	$html .= '				<td class="desc"></td>';
	$html .= '			</tr>';
	$html .= '			<tr>';
	$html .= '				<td></td>';
	$html .= '				<td class="submitTd">';
	$html .= '					<input type="submit" class="btn btn-large btn-primary" value="'. __('Change Password','spot') .'" name="newAccount">';
	$html .= '				</td>';
	$html .= '				<td></td>';
	$html .= '			</tr>';
	$html .= '		</tbody></table>';
	$html .= '		<input type="hidden" name="updatePassword" value="1">';
	$html .= '	</form>';
	$html .= '</div>';

	return $html;
}

/****
Function Name: drawPositionPage
Functionality: Return HTML block for the deposit form
Notes			: 	If you want to create your own custom form, you can create 
					customPositionPage function (case sensetive) and make 
					it return html element
****/
function drawPositionPage()
{
	if(function_exists('customPositionPage'))
		return customPositionPage();
	
        $html = '<div id="TypeSelector">';
	$html .= '	<select  name="assetType" id="assetType">';
	$html .= '		<option value="0">'.  __('One Touch','spot') .'</option>';
	$html .= '		<option value="1" selected="selected">'.  __('Binary','spot') .'</option>';
	$html .= '	</select>';
	$html .= '</div>';
	$html .= '<div id="filters">';
	$html .= '	<input type="text" name="startDate" class="Date1" placeholder="Start Date">';
	$html .= '	<input type="text" name="endDate" class="Date1" placeholder="End Date">';
	$html .= '	<div class="styled-select"><select name="assetId" id="asset">';
	$html .= '	</select></div>';
	$html .= '	<div class="styled-select-small"><select  name="statusFilter" id="expirePos">';
	$html .= '		<option value="0">'.  __('Open','spot') .'</option>';
	$html .= '		<option value="1" selected="selected">'.  __('Expired','spot') .'</option>';
	$html .= '	</select></div>			';
	$html .= '</div>';
	$html .= '<div class="assets">			';
	$html .= '	<table class="table table-condensed table-hover table-bordered investmentsTable" cellpadding="0" cellspacing="0">';
	$html .= '	<thead>';
	$html .= '		<tr>';
	$html .= '			<th>'.  __('Position Id','spot') .'</th>';
	$html .= '			<th>'.  __('Investment','spot') .'</th>';
	$html .= '			<th>'.  __('Asset','spot') .'</th>';
	$html .= '			<th>'.  __('Execution Date','spot') .'</th>';
	$html .= '			<th class="rateSwitch">'.  __('Rate','spot') .'</th>';
	$html .= '			<th>'.  __('Type','spot') .'</th>';
	$html .= '			<th>'.  __('Expire Date','spot') .'</th>';
	$html .= '			<th class="statusSwitch">'.  __('Expiry Rate','spot') .'</th>';
	$html .= '			<th class="lastColumn">'.  __('Payout','spot') .'</th>';
	$html .= '		</tr>';
	$html .= '	</thead>';
	$html .= '	<tbody>';
	$html .= '	</tbody>';
	$html .= '	</table>';
	$html .= '	<div class="pagination">';
	$html .= '		<ul></ul>';
	$html .= '	</div>';
	$html .= '</div>';

	return $html;
}

/****
Function Name: drawHistoryPage
Functionality: Return HTML block for the deposit form
Notes			: 	If you want to create your own custom form, you can create 
					customHistoryPage function (case sensetive) and make 
					it return html element
****/
function drawHistoryPage()
{
	if(function_exists('customHistoryPage'))
		return customHistoryPage();

$html = '  <div id="leftContiner">';
$html .= '<ul class="filterOptions">';
$html .= '	<li class="selectDates">';
$html .= '		<span id="startDateTrigger" class="dateInput">';
$html .= '			<input type="text" name="startDate" class="Date1" value="'.__('Start Date','spot').'" default="'.__('Start Date','spot').'">';
$html .= '		</span>		';
$html .= '	</li>    ';
$html .= '	<li class="selectDates">';
$html .= '		<span id="endDateTrigger" class="dateInput"> ';
$html .= '			<input type="text" name="endDate" class="Date1" value="'.__('End Date','spot').'" default="'.__('End Date','spot').'">';
$html .= '		</span>		';
$html .= '	</li>    ';
$html .= '	<li class="positionTypes">';
$html .= '        <ul class="positionFilterOptions">';
$html .= '            <li>';
$html .= '                <input type="radio" name="filterRadio" id="deposit" value="deposit">';
$html .= '                <label for="deposit">'.__('deposit','spot').'</label>';
$html .= '            </li>';
$html .= '            <li>';
$html .= '                <input type="radio" name="filterRadio" id="withdrawal" value="withdrawal">';
$html .= '                <label for="withdrawal">'.__('withdrawal','spot').'</label>';
$html .= '            </li>';
$html .= '            <li>';
$html .= '                <input type="radio" name="filterRadio" id="all" checked="checked" value="0">';
$html .= '                <label for="all">'.__('All History','spot').'</label>';
$html .= '            </li>';
$html .= '        </ul>';
$html .= '    </li>        ';
$html .= '    <li class="cb"></li>';
$html .= '</ul>';

$html .= '      <div class="assets">';
$html .= '          <table class="table table-condensed table-hover table-bordered investmentsTable " id="historyTable" cellpadding="0" cellspacing="0">';
$html .= '          <thead>';
$html .= '		<tr>';
$html .= '			<th>'.  __('Transaction ID','spot') .'</th>';
$html .= '			<th>'.  __('Date','spot') .'</th>';
$html .= '			<th>'.  __('Type','spot') .'</th>';
$html .= '			<th>'.  __('Status','spot') .'</th>';
$html .= '			<th>'.  __('Method','spot') .'</th>';
$html .= '			<th>'.  __('Amount','spot') .'</th>					';
$html .= '			';
$html .= '		</tr>';
$html .= '          </thead>';
$html .= '       <tbody>';
$html .= '	</tbody>';
$html .= '	</table>';
	$html .= '	<div class="pagination">';
	$html .= '		<ul></ul>';
	$html .= '	</div>';
$html .= '  </div>';
$html .= '  </div>';

return $html;
}


/****
Function Name: drawDepositForm
Functionality: Return HTML block for the deposit form
Notes			: 	If you want to create your own custom form, you can create 
					customDepositForm function (case sensetive) and make 
					it return html element
****/
function drawDepositForm($content)
{
	if(function_exists('customDepositForm'))
		return customDepositForm();

$html ='   <ul class="paymentMethods" id="paymentMethods">';
$html .='       <li name="creditCard" class="  selected">';
$html .='           <div class="right">';
$html .='               <div class="left">';
$html .='                   <input type="radio" name="payment_method" id="creditCard" checked="checked" style="display: none;"><label for="creditCard">Credit Card</label>';
$html .='               </div>';
$html .='           </div>';
$html .='      </li>';
$html .='       <li name="wire" class="last ">';
$html .='           <div class="right">';
$html .='               <div class="left">';
$html .='                   <input type="radio" name="payment_method" id="wire" class="hidden" style="display: none;"> <label for="wire">Wire Transfer</label>';
$html .='               </div>';
$html .='           </div>';
$html .='      </li>';
$html .='  </ul>';
$html .='<div class="formsContainer">';
$html .='  <div id="creditCard_form" class="tab" style="display:block">';
$html .= '      <div id="creditCard_img">	';
$html .= '          <span id="depositIco">'.__('Credit Card','spot').'</span>	';
$html .= '          <span id="cardImg"></span>	';
$html .= '      </div>	';
$html .= '		<form name="deposit" method="POST" id="depositForm">';
$html .= '			<table class="table deposit" cellpadding="0" cellspacing="0">';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Select credit card or add new one','spot') .'</td>';
$html .= '					<td class="selectTd">';
$html .= '						<div class="styled-select-regular"><select class="selectbox " id="creditcard" name="fundId">	';
$html .= '							<option value="-1">'. __('Add new card','spot') .'</option>			';
$html .= '						</select></div>';
$html .= '					</td>';
$html .= '					<td class="errors">';
$html .= '						<input type="submit" value="'. __('Delete Card','spot') .'" id="deleteCard"/>';
$html .= '					</td>';
$html .= '				<tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Amount:','spot') .'</td>';
$html .= '					<td class="selectTd">';
$html .= '						<input type="text" value="100" id="amount" name="amount"></input>';
$html .= '					</td>';
$html .= '				</tr>';
$html .= '			</table>';
$html .= '			<div class="" id="addNewCard"> ';
$html .= '			<h2>'. __('Card Information','spot') .'</h2>';
$html .= '			<table class="table deposit " cellpadding="0" cellspacing="0">';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Credit Card Type','spot') .'</td>';
$html .= '					<td class="selectTd">';
$html .= '						<div class="styled-select-regular"><select name="cardType" class="ignore" id="creditCardType" >';
$html .= '							<option label="Maestro" value="4">Maestro</option>';
$html .= '							<option label="CarteBleue" value="3">CarteBleue</option>';
$html .= '							<option label="MasterCard" value="2">MasterCard</option>';
$html .= '							<option label="Visa" value="1">Visa</option>';
$html .= '						</select></div>';
$html .= '					</td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Credit Card Number','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="cardNum" class="required number ignore" minlength="8" maxlength="20"  autocomplete="off"></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('CVV','spot') .'</td>';
$html .= '					<td class="selectTd"><input id="cvvInput" type="text" name="CVV2/PIN" class="required number ignore" minlenth="3" maxlength="4" autocomplete="off">';
$html .= '                                      <span id="tooltipSpan"><div id="cvvPopup" class="  hidden"></div><img class="cvvExpl"></span></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Expiration Date','spot') .'</td>';
$html .= '					<td class="selectTd">';
$html .= '						<div class="styled-select-small first"><select name="ExpMonth" class="exp ignore">';
$html .= '							<option label="01" value="01" selected="selected">01</option>';
$html .= '							<option label="02" value="02">02</option>';
$html .= '							<option label="03" value="03">03</option>';
$html .= '							<option label="04" value="04">04</option>';
$html .= '							<option label="05" value="05">05</option>';
$html .= '							<option label="06" value="06">06</option>';
$html .= '							<option label="07" value="07">07</option>';
$html .= '							<option label="08" value="08">08</option>';
$html .= '							<option label="09" value="09">09</option>';
$html .= '							<option label="10" value="10">10</option>';
$html .= '							<option label="11" value="11">11</option>';
$html .= '							<option label="12" value="12">12</option>';
$html .= '						</select></div>';
$html .= '						<div class="styled-select-small last"><select name="ExpYear" class="exp ignore">';
$html .= '							<option label="2013" value="2013" selected="selected">2013</option>';
$html .= '							<option label="2014" value="2014">2014</option>';
$html .= '							<option label="2015" value="2015">2015</option>';
$html .= '							<option label="2016" value="2016">2016</option>';
$html .= '							<option label="2017" value="2017">2017</option>';
$html .= '							<option label="2018" value="2018">2018</option>';
$html .= '							<option label="2019" value="2019">2019</option>';
$html .= '							<option label="2020" value="2020">2020</option>';
$html .= '							<option label="2021" value="2021">2021</option>';
$html .= '							<option label="2022" value="2022">2022</option>';
$html .= '							<option label="2023" value="2023">2023</option>';
$html .= '						</select></div>';
$html .= '					</td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Country','spot') .'</td>';
$html .= '					<td class="selectTd">';
$html .= '						<div class="styled-select-regular"><select name="Country" class="ignore" id="country">';
$html .= '							<?php';
$html .= '							';
$html .= '							?>';
$html .= '						</select><div>';
$html .= '					</td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '			<table>';
$html .= '			<h2>'. __('CREDIT CARD HOLDER INFO','spot') .'</h2>';
$html .= '			<table class="table deposit " cellpadding="0" cellspacing="0">';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('First Name','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="FirstName" class="required ignore" minlength="2" maxlength="30" value=""></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Last Name','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="LastName" class="required ignore" minlength="2" maxlength="30" title="Enter Last Name" value=""></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Address','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="Address" class="required ignore" minlength="5" maxlength="30" title="Enter Address" value=""></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('City','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="City" class="required ignore" minlength="3" maxlength="30" title="Enter City" value=""></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Postal Code','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="postCode" class="required ignore" minlength="2" maxlength="10" title="Enter Postal Code" value=""></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '				<tr>';
$html .= '					<td class="propName">'. __('Phone','spot') .'</td>';
$html .= '					<td class="selectTd"><input type="text" name="Phone" class="required ignore" minlength="8" maxlength="20" value="" title="Enter full phone number"></td>';
$html .= '					<td class="error"></td>';
$html .= '				</tr>';
$html .= '			</table>';
$html .= '			</div>';
$html .= '			<div class="depositbtn">';
$html .= '				<input class="btn btn-large btn-primary" value="Apply" type="submit">';
$html .= '			</div>';
$html .= '                   <div class="clear"></div>';
$html .= '			</form>';
$html .= '		</div>';
$html .='        	<div id="wire_form" class="tab hidden" style="display: none;">';
$html .= '                   <div id="creditCard_img">';
$html .= '                        <span id="wireLogo"></span>';
$html .= '                        <span id="depositIco">'.__('Wire trasnfer deposit','spot').'</span>';
$html .= '                   </div>';
$html .= '                   <ul class="options">';
$html .= $content;
$html .= '                   </ul>';
$html .= '                   <div class="clear"></div>';
$html .= '              </div>	';

return $html;
}

/****
Function Name	: drawOpenAccountForm
Functionality	: Return HTML block for the Open Account form
Notes			: 	If you want to create your own custom form, you can create 
					customOpenAccountForm function (case sensetive) and make 
					it return html element
****/

function drawOpenAccountForm()
{
	
	if(function_exists('customOpenAccountForm'))
		return customOpenAccountForm();
   
        
        $form = '<div class="mune-registrantion">';
	$form .= '  <ul class="registrationSteps ">';
        $form .= '      <li class="current"><span class="registrationStepsText">'.__('Registration','spot').'</span></li>';
        $form .= '      <li class=""><span class="registrationStepsText">'.__('Verification','spot').'</span></li>';
        $form .= '      <li class=""><span class="registrationStepsText">'.__('Deposit','spot').'</span></li>';
        $form .= '  </ul>';
        $form .= '</div>';
	$form .= '<div id="openAccountForm">';
	$form .= '<form id="accountForm" name="accountForm" method="post">';
	$form .= '<table class="table">';
	$form .= '<tr class="first_name"><td class="propName">'. __('First Name:','spot') . '</td>';
	$form .= '<td class="inputTd"><input class="fname" type="text" name="FirstName"  value="'. @$_POST['FirstName'] . '" placeholder="'. __('First Name','spot').'" /></td>';
	$form .= '<td class="errors">'. @$errors['FirstName'].'</td></tr>';
	$form .= '<tr class="last_name"><td class="propName">'.__('Last Name:','spot').'</td>';
	$form .= '<td class="inputTd"><input class="fname" type="text" name="LastName"  value="'. @$_POST['LastName'] .'" placeholder="'. __('Last Name','spot') .'" /></td>';
	$form .= '<td class="errors">'. @$errors['LastName'].'</td></tr>';
	$form .= '<tr class="user_mail"><td class="propName">'. __('Email:','spot').'</td>';
	$form .= '<td class="inputTd"><input type="text" value="'. @$_POST['email'].'"  name="email" class="emails required " placeholder="'. __('Email','spot').'" ></td>';
	$form .= '<td class="errors">'. @$errors['email'].'</td></tr>';
	$form .= '<tr class="user_country"><td class="propName">'. __('Country:','spot') .'</td><td class="curCountry"><select class="countrylist selectbox " id="country" name="Country"></select></td><td class="errors">'. @$errors['Country'] .'</td></tr>';
	$form .= '<tr class="phoneWrapper"><td class="propName">'. __('Phone:','spot') .'</td><td class="phoneTd inputTd">';
	$form .= '<input class="prefix phonePrefixInput" type="text" name="phone_prefix"  value="'. @$_POST['prefix'].'" /> ';
	$form .= '<input class="code phoneAreaInput" type="text" name="phone_area"  value="'. @$_POST['code'].'" placeholder="'. __('Code','spot').'" /> ';
	$form .= '<input class="phone phoneInput" type="text" name="Phone"  value="'. @$_POST['phone'].'" placeholder="'. __('Phone Number','spot').'" /></td>';
	$form .= '<td class="errors">'. @$errors['phone'] .'</td></tr>';
	$form .= '<tr class="password"><td class="propName">'. __('Password:','spot') .'</td>';
	$form .= '<td class="inputTd"><input id="realPass"  class="fname" name="password"  type="password"   placeholder="'. __('Password','spot') .'"  /></td>';
	$form .= '<td class="errors">'. @$errors['password'] .'</td></tr>';
	$form .= '<tr class="repass"><td class="propName">'. __('Repeat password:','spot') .'</td>';
	$form .= '<td class="inputTd"><input  id="realPassConfirm"  class="lname"  name="repeatPassword" type="password"  placeholder="'. __('Repeat','spot') .'"/></td>';
	$form .= '<td class="errors">'. @$errors['repassword'] .'</td></tr>';
	$form .= '<tr><td class="currency propName">'. __('Currency:','spot') .'</td><td class="curName"><select class=" selectbox " id="currency" name="currency"></select></td><td class="errors">'. @$errors['currency'].'</td></tr>';
	$form .= '<tr class="Capcha"><td class="propName">'. __('Please type the characters','spot').'</td><td class="inputTd1"><img src="http://'.get_option('platform_url').'/captcha" class="captchaImage" /><input type="text" name="captcha" value=""></input></td><td class="errors">'. @$capchaerr .'</td></tr>';
	$form .= '<tr class="terms"><td colspan="2" class="checkTerm"><input class="checkbox_inp" value="1" type="checkbox" name="acceptTerms"/>'.__('Please accept our ' ,'spot') .'<a class="privacy" href="'. get_bloginfo('url').'/terms-of-conditions" target="_blank">'. __('Terms of use','spot').'</a></td>';
	$form .= '<td class="errors">'. @$errors['terms'] .'</td></tr>';
	$form .= '</table>';
	$form .= '<input type="hidden" name="prefix" value="'. @$prefix .'" />';
	$form .= '<input type="hidden" name="campaignId" value="'. @$campaignId .'" />';
	$form .= '<input type="hidden" name="subCampaign" value="'. @$subCampaign .'" />';
	$form .= '<input type="hidden" value="'. @$aid .'" name="a_aid">';
	$form .= '<input type="hidden" value="'. @$bid .'" name="a_bid">';
	$form .= '<input type="hidden" value="'. @$cid .'" name="a_cid">';
	$form .= '<input type="hidden" value="on" name="terms">';
	$form .= '<input type="hidden" value="en" name="lang">';
	$form .= '<div class="errorBox">'. @$data['errors']['error'].'</div>';
	$form .= '<div class="openAccountButton button"> <input class="btn btn-large btn-primary" value="'. __('Apply','spot') .'" name="newAccount" type="submit"></div>';
	$form .= '</form></div>';
        
	
	return $form;
	
	
}
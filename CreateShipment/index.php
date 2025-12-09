<?php
$time = microtime();

$time = explode(" ", $time);

$time = $time[1] + $time[0];

$start = $time;
//include 'script.php';
session_start();
error_reporting(E_ERROR | E_PARSE);
$PlatformId = $_SESSION['clientinfo']['PlatformId'];
$agreement = $_SESSION['clientinfo']['Agreement'];


echo "<p>";
echo '<font color="white">';
print_r($_SESSION['clientinfo']);
if (isset($_SESSION['clientinfo']['MailedBy'])) {
    echo 'You are Logged in as account: ' . $_SESSION['clientinfo']['MailedBy'];
    echo '<form action="/destroysession.php" method="POST">
<input type="submit" value="Logout"/>
</form>';
} else {
    echo "<p>";
    echo '<font color="white">';
    echo "<h4>You are not logged in.</h4>
  <br />";
    echo "<h4>Make sure you go to the User Management Screen TAB in order to start(Bottom Page)</h4>";
    echo "</font>";
}
echo "</font>";
echo "</p>";
$shippingPoint = $_POST['shippingPoint'];
echo '<html lang="en">';
//echo '    <head><meta charset="UTF-8">';
echo ' <meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
//header('Content-type: text/html; charset=utf-8');
echo '        ';
echo '        <title>Create Shipments</title>';
echo '        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/mint-choc/jquery-ui.css" />';
echo '        <script src="https://code.jquery.com/jquery-1.9.1.js">
</script>';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
echo '        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js">
</script>';
echo '        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js">
</script>';
echo '        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js">
</script>';
echo '        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js">
</script>';
echo '        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js">
</script>';
echo '         <script src="../myscript.js">
</script>';

echo '        <link rel="stylesheet" type="text/css" href="../main.css">';


?>



<body bgcolor="#000000">
    
    <script>
      <!-- this will generaterandom number and date stamp for customer request element -->
        
        window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}
    </script>
    
  <!--this will generaterandom number and date stamp for customer request element-->
  <script>
        function formatDate(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + '' + ampm;
  return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + "_" + strTime;
}

var d = new Date();
var e = formatDate(d);
        
        function randomnum() {
  var min = 1;
  var max = 9999999999;
  var num = Math.floor(Math.random() * (max - min + 1)) + min;
  var timeNow = new Date();
  document.getElementById('custreq').value = num + '_' + e;
  document.getElementById('custreqUSA').value = num + '_' + e;
document.getElementById('custreqIntl').value = num + '_' + e;
}
window.onload = randomnum;



    </script>





 <!-- This section is to display the pricing div when selecting no for having a manifest -->
    <script>
                                $(document).ready(function(){
    $('#manifestquestion').on('change', function() {
      if ( this.value == 'no')
      {
        $("#pricingdiv").show();
        $("#GroupIdSection").hide();
      }
      else
      {
        $("#pricingdiv").hide();
        $("#GroupIdSection").show();
      }
    });
});


                                $(document).ready(function(){
    $('#manifestquestionUSA').on('change', function() {
      if ( this.value == 'no')
      {
        $("#pricingdivUSA").show();
        $("#GroupIdSectionUSA").hide();
      }
      else
      {
        $("#pricingdivUSA").hide();
        $("#GroupIdSectionUSA").show();
      }
    });
});

                                $(document).ready(function(){
    $('#manifestquestionIntl').on('change', function() {
      if ( this.value == 'no')
      {
        $("#pricingdivIntl").show();
        $("#GroupIdSectionIntl").hide();
      }
      else
      {
        $("#pricingdivIntl").hide();
        $("#GroupIdSectionIntl").show();
      }
    });
});

</script>


<script>
    
        $(function() {
        enable_cbPA21();
        $("#optionPA21").click(enable_cbPA21);
    });
    function enable_cbPA21() {
        if (this.checked) { 
            $("input.optionDNS").prop("disabled", true);  
            $("input.optionPA19").prop("disabled", true);
            $("input.optionPA18").prop("disabled", true);
            $("input.optionLAD").prop("disabled", true);
            $("input.optionSO").prop("checked", true);
            //$("input.optionSO").attr("disabled", true);
        }
        else{
            $("input.optionDNS").prop("disabled", false);  
            $("input.optionPA19").prop("disabled", false);   
            $("input.optionPA18").prop("disabled", false);
            $("input.optionLAD").prop("disabled", false);
            $("input.optionSO").prop("checked", false);
            //$("input.optionSO").prop("disabled", false);
        }
    }
    
</script>


  <div id="tabs">
    <ul>
      <li>
        <a href="#tabs-1">Ship To Canada</a>
      </li>
      <li>
        <a href="#tabs-2">Ship to USA</a>
      </li>
      <li>
        <a href="#tabs-3">Ship To International</a>
      </li>
    </ul>
    <div id="tabs-1">
      <form id="CreateShipmentCanada" action="CreateShipmentCanada.php" method="POST" />
      <?php
           if (isset($_GET['errormsg'])) {
               echo "<h3>
      <font color ='red'>";
                echo $_GET['errormsg'];
               echo "</font>
    </h3>";
            }
            ?>
    <div  class="ui-widget-content">
      <br />
      <p>This is a unique request id for tracking purpuses.</p>
      <br />
      <table class="TableStyle">
        <tr>
          <td>
            <label for="labelcustreq">customer request ID</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="custreq" id="custreq" readOnly="true" maxlength="30" />
          </td>
        </tr>
      </table>
      <br />
      <p>If your shipments are picked up by Canada Post or a third party please select YES. If you are going to deposit select NO.</p>
      <br />
      <table class="TableStyle">
        <tr>
          <td>
            <label>Pickup?<font color="red">
              <b> * </b>
            </font>
          </label>
        </td>
      </tr>
      <tr>
        <td>
          <label for="pickupquestion">
            <input class="pickupyes" type="radio" id="pickupquestion" name="pickupquestion" value="yes" onClick="document.getElementById('groupId').value='PICKUP'"/>Yes</label>
            <label>
              <input class="pickupno" type="radio" id="pickupquestion" name="pickupquestion" value="no" onClick="document.getElementById('groupId').value='DEPOSIT'"/>No</label>
            </td>
          </tr>
        </table>
        <br />
        <div id="shippingpointsection" style="display:none">
          <p>You chose pickup therefore you need to provide the Postal Code of your pickup location.</p>
          <table class="TableSTyle">
            <tr>
              <td>
                <label for="shippingPoint" class="control-label">Shipping Point<font color="red">
                  <b> * </b>
                </font>
              </label>
              <input type="text" name="shippingPoint" id="shippingPoint" maxlength="6" value="K2K0B1" onblur="UpperCasePostalContractShippingCAN()" />
            </td>
          </tr>
        </table>
      </div>
      <div id="pickupsection">
        <br />
        <p>Looks like your going to deposit instead of pickups please ensure to identify the deposit location by identifying the Post Office ID below. If you have no clue what the Post Office ID is then follow the hyperlink, then copy/paste the post office id into the field below.</p>
        <table class="TableStyle">
          <tr>
            <td>
                                Click here to <a href='https://www.canadapost-postescanada.ca/information/app/fdl/business/findDepositLocation?execution=e1s1' target='_blank'>Find a Deposit Location</a>
          </td>
        </tr>
        <tr>
          <td>
            <label for="postofficeid" class="control-label">Post Office ID<font color="red">
              <b> * </b>
            </font>
          </label>
        </td>
      </tr>
      <td>
        <input type="text" name="postofficeid" id="postofficeid" value="3057" maxlength="10" />
      </td>
    </tr>
  </table>
  <br /><br />
</div>


<!-- display div if Agreement is set in session otherwise hide it. -->

<div id="agreement" <?php if (empty($agreement)){ echo 'style="display:none;"'; } ?>>

  <P>If you are planning on shipping over 50 shipments per day then you should opt to include in Manifest. Failure to comply may result in having your shipments refused by Canada Post. Canada Post requires a manifest for every pickup over 50 shipments, the manifest must be given to the Canada Post representative. If you are not familiar with the Manifest please have a look at our handy <a href="http://www.fabsandbox.com/tutorials">video tutorials section.</a>



</P>
<table class="TableStyle">
  <tr>
    <td>
                            Include Shipment in Manifest? <span>
      <font color="red">*</font>
    </span>
  </td>
</tr>
<tr>
  <td>
    <label for="manifestquestion">
    <select name="manifestquestion" id="manifestquestion">
      <option disabled selected value> -- select an option -- </option>
      <option value="yes" label="YES">YES</option>
      <option value="no" label="NO"> NO</option>
    </select>
</td>
    </tr>
  </table>

</div>

<br />

<br />
<br />
<div id="GroupIdSection" style="display:none;">
  <p> Its important to understand that if you opted to include shipments to a manifest and transmit at a later time that you will require printing also and provide hardcopy. This field is disabled and will be autopopulated when you select Pickup or Deposit.</p>
  <table class="TableStyle">
    <tr>
      <td>
        <label for="groupId">Group ID<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" class="groupId" name="groupId" id="groupId" readOnly="true" maxlength="32" />
    </td>
  </tr>
</table>
<br />
</div>


<div>
  <p>Promotional discount code. Note that a promotion code is only valid for a certain period and product. Your entry will be converted to uppercase (i.e, you can use lowercase or a mix of lower or upper case and will get the same result).</p>
  <table class="TableStyle">
    <tr>
      <td>
        <label for="promocode">Promo Code
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" class="promocode" name="promocode" id="promocode" maxlength="32" />
    </td>
  </tr>
</table>
<br />
</div>




<!-- here -->
<div>
    <p>
      This is an optional element, used to request the QR code image of the public label in base64 format, along with contains public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo.
          Note: Only applicable to 8 1/2 X 11 paper encoded in pdf  
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="QrCode">Do you want to generate a QR Code?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="QrCode" id="QrCode">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>
  
  
  
  
  
  
     <!-- script to popup the public key text input when QR Code is YES-->
    <script>
                                $(document).ready(function(){
    $('#QrCode').on('change', function() {
      if ( this.value == 'true')
      {
        $("#publickey").show();
      }
      else
      {
        $("#publickey").hide();
      }
    });
});

</script>

 <div style='display:none;' id='publickey' float: right>
         <p>
            This is an optional element, used to request the public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo

                Note: Only applicable to 8 1/2 X 11 paper encoded in pdf
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="publickey">Do you Want to receive a public key label URL?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="publickey" id="publickey">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
    </div>
<br />


<!-- here -->














</div>
<br /><br />
<div   class="ui-widget-content">
  <br />
  <h2>Payment Information</h2>
  <br />
  <table class="TableStyle">
    <tr>
      <td>
        <label for="mailedBy" class="control-label"> Mailed By <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="mobo" class="control-label">Mailed on Behalf of <font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="paidBy" class="control-label">Paid By <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="agreement" class="control-label">Contract<font color="red">
    <b> * </b>
  </font>
</label>
</td>
<td>
  <label for="methodOfPayment" class="control-label">Method of Payment<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
  <input type="text" name="mailedBy" id="mailedBy" value="<?php echo ($_SESSION['clientinfo']['MailedBy']) ?>" readOnly="true" maxlength="10" />
</td>
  <td>
  <input type="text" name="mobo" id="mobo" value="<?php echo ($_SESSION['clientinfo']['Mobo']) ?>" readOnly="true" maxlength="10" />
</td>
  <td>
  <input type="text" name="paidBy" id="paidBy" value="<?php echo ($_SESSION['clientinfo']['PaidBy']) ?>" readOnly="true" maxlength="10" />
</td>
  <td>
  <input type="text" name="agreement" id="agreement" value="<?php echo ($_SESSION['clientinfo']['Agreement']) ?>" readOnly="true" maxlength="10" />
</td>
  <td>
    <!-- script to popup the want a receipt whem credit card is picked-->
    <script>
                                $(document).ready(function(){
    $('#methodOfPayment').on('change', function() {
      if ( this.value == 'CreditCard')
      {
        $("#receipt").show();
      }
      else
      {
        $("#receipt").hide();
      }
    });
});

</script>


    <select name="methodOfPayment" id="methodOfPayment">
      <option value="Account" label="Account">Account</option>
      <option value="CreditCard" label="CreditCard">Credit Card</option>
      <option value="SupplierAccount" label="SupplierAccount">Supplier Account</option>
    </select>
  </td>
</tr>
</table>
<br />
<div style="display: flex; justify-content: space-around float: right">
  <div id='pricingdiv' style='display:none'>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="GetPricing">Do you want pricing returned in the answer?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetPricing" id="GetPricing">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>
  <br />
 

 <div style='display:none;' id='receipt' float: right>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="receipt">Do you Want a Receipt?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetReceipt" id="GetReceipt">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>



</div></div>
  <br />
  <div  class="ui-widget-content">
    <H2> Continuous Inbound Freight</H2>
    <P>
                    If you have shipments that originate outside of Canada, but are being delivered directly to a Canada Post plant, use this element to identify these shipments as continuous inbound freight (CIF). This option allows you to be eligible for Canadian sales tax exemptions. 
                    You will need to provide Canada Post with documentation that shows proof of origin, such as a Canadian customs document or bill of lading.
                    </p>
    <table class="TableStyle">
      <tr>
        <td>
            <select name="CIF" id="CIF">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
        </td>
      </tr>
    </table>
    <br />
  </div>
  <br /><br /><br />
  <div   class="ui-widget-content">
    <br />
    <p>shipments are priced as per the current shipment date and are re-priced at time of transmit if transmitted at a later date.</p>
    <table class="TableSTyle">
      <tr>
        <td>
          <label>Expected Mailing Date: </label>
          <input id="datepicker" type="text" name="mailingdate" enabled />
          <br /><br />
        </td>
      </tr>
    </table>
    <br />
  </div>
  <br />
  <div   class="ui-widget-content">
    <br />
    <h2>Sender Information</h2>
    <br />
    <table class="TableStyle">
      <tr>
        <td>
          <label for="senderCompany" class="control-label">Company<font color="red">
            <b> * </b>
          </font>
        </label>
      </td>
      <td>
        <label for="contactPhone" class="control-label">Contact Phone<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="contactName" class="control-label">Contact Name</label>
    </td>
  </tr>
  <tr>
    <td>
    <input type="text" name="senderCompany" id="senderCompany" maxlength="44" value="<?php echo ($_SESSION['clientinfo']['SenderCompanyName']) ?>" />
  </td>
    <td>
    <input type="text" name="contactPhone" id="contactPhone" maxlength="25" value="<?php echo ($_SESSION['clientinfo']['SenderContactPhone']) ?>"/>
  </td>
    <td>
    <input type="text" name="contactName" id="contactName" maxlength="44" value="<?php echo ($_SESSION['clientinfo']['SenderContactName']) ?>" />
  </td>
</tr>
</table>
  <br />
  <table class="TableStyle">
    <tr>
      <td>
        <label for="customerAddressLine1" class="control-label">Address (Line 1)<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="customerAddressLine1"> Address (Line 2)</label>
    </td>
    <td>
      <label for="customerCity" class="control-label">City<font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="provstate" class="control-label">Province<font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="customerPostalCode" class="control-label">Postal Code<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
  <input type="text" name="customerAddressLine1" id="customerAddressLine1" maxlength="44" value="<?php echo ($_SESSION['clientinfo']['Senderaddressline1']) ?>" />
</td>
  <td>
  <input type="text" name="customerAddressLine2" id="customerAddressLine2" maxlength="44" value="<?php echo ($_SESSION['clientinfo']['Senderaddressline2']) ?>" />
</td>
  <td>
  <input type="text" name="customerCity" id="customerCity" maxlength="40" value="<?php echo ($_SESSION['clientinfo']['SenderCity']) ?>" />
</td>
  <td>
  <input type="hidden" class="target" value="<?php echo ($_SESSION['clientinfo']['Senderprovince']) ?>" />
    <select name="provstate" id="provstate">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AB">Alberta</option>
      <option value="BC">British Columbia</option>
      <option value="MB">Manitoba</option>
      <option value="NB">New Brunswick</option>
      <option value="NL">Newfoundland and Labrador</option>
      <option value="NS">Nova Scotia</option>
      <option value="NT">Northwest Territories</option>
      <option value="NU">Nunavut</option>
      <option value="ON">Ontario</option>
      <option value="PE">Prince Edward Island</option>
      <option value="QC">Québec</option>
      <option value="SK">Saskatchewan</option>
      <option value="YT">Yukon</option>
    </select>
  </td>
  <td>
  <input type="text" name="customerPostalCode" id="customerPostalCode" maxlength="6" value="<?php echo ($_SESSION['clientinfo']['SenderPostalCode']) ?>" onblur="UpperCasePostalContractShippingCAN()" />
</td>
</tr>
</table>
  <br /><br />
</div>
<br />
<div class="ui-widget-content">
  <br />
  <h2>Recipient Information</h2>
  <br />
  <table class="TableStyle">
    <tr>
      <td>
                            Print QuickShip label?
                            <br />
                            Note : This will only print a barcode
                        </td>
    </tr>
    <tr>
      <td>
        <label for="QuickShipquestion">
          <input class="QuickShipyes" type="radio" id="QuickShipquestion" name="QuickShipquestion" value="yes" />Yes</label>
          <label>
            <input class="QuickShipno" type="radio" id="QuickShipquestion" name="QuickShipquestion" checked value="no" checked />No</label>
          </td>
        </tr>
      </table>
      <br />
      <div id="destinationinfo">
        <table class="TableStyle">
          <tr>
            <td>
              <label for="recipientCompany">Company</label>
            </td>
            <td>
              <label for="recipientName">Name</label>
            </td>
            <td>
              <label for="recipientPhone">Phone Number :</label>
            </td>
            <td>
              <label for="additionalAddressInfo">Additional Address Info</label>
            </td>
          </tr>
          <tr>
            <td>
              <input type="text" name="recipientCompany" id="recipientCompany" maxlength="44" />
            </td>
            <td>
              <input type="text" class="recipientName" name="recipientName" id="recipientName" maxlength="44" />
            </td>
            <td>
              <input type="text" class="recipientPhone" name="recipientPhone" id="recipientPhone" maxlength="25" />
            </td>
            <td>
              <input type="text" name="additionalAddressInfo" id="additionalAddressInfo" maxlength="50" />
            </td>
          </tr>
        </table>
        <br />
        <table class="TableStyle">
          <tr>
            <td>
              <label for="recipientAddressLine1" class="control-label">Address (Line 1)<font color="red">
                <b> * </b>
              </font>
            </label>
          </td>
          <td>
            <label>Address (Line 2)</label>
          </td>
          <td>
            <label for="recipientCity" class="control-label">City<font color="red">
              <b> * </b>
            </font>
          </label>
        </td>
        <td>
          <label for="recipientProvince" class="control-label">Province<font color="red">
            <b> * </b>
          </font>
        </label>
      </td>
    </tr>
    <td>
      <input type="text" name="recipientAddressLine1" id="recipientAddressLine1" maxlength="44" />
    </td>
    <td>
      <input type="text" name="recipientAddressLine2" id="recipientAddressLine2" maxlength="44" />
    </td>
    <td>
      <input type="text" name="recipientCity" id="recipientCity" maxlength="44" />
    </td>
    <td>
      <select name="recipientProvince" id="recipientProvince">
        <option value="" label=" -- Choose One --"> -- Choose One --</option>
        <option value="AB" label="Alberta">Alberta</option>
        <option value="BC" label="British Columbia">British Columbia</option>
        <option value="MB" label="Manitoba">Manitoba</option>
        <option value="NB" label="New Brunswick">New Brunswick</option>
        <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
        <option value="NS" label="Nova Scotia">Nova Scotia</option>
        <option value="NT" label="Northwest Territories">Northwest Territories</option>
        <option value="NU" label="Nunavut">Nunavut</option>
        <option value="ON" label="Ontario">Ontario</option>
        <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
        <option value="QC" label="Québec">Québec</option>
        <option value="SK" label="Saskatchewan">Saskatchewan</option>
        <option value="YT" label="Yukon">Yukon</option>
      </select>
    </td>
  </tr>
</table>
</div>
<br />
<table class="TableStyle">
  <tr>
    <td>
      <label for="recipientPostalCode" class="control-label">Postal Code<font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
</tr>
<tr>
  <td>
    <input type="text" name="recipientPostalCode" id="recipientPostalCode" maxlength="6" onblur="UpperCasePostalContractShippingCAN()" />
  </td>
</tr>
</table>
<br />
</div>
<br />
<div class="ui-widget-content">
  <br />
  <h2>Return Address</h2>
                Create Return Shipping Label? You will only be charged if used by the recipient.
                <table class="TableStyle">
  <tr>
    <td>
      <label>
        <input class="returnyes" type="radio" name="returnadd" value="yes" checked="checked"/>Yes</label>
        <label>
          <input class="returnno" type="radio" name="returnadd" value="no" />No</label>
        </td>
      </tr>
    </table>
    <br /><br />
    <div id="returnsection">
      <br />
      <table class="TableStyle">
        <tr>
          <td>
                                Return Service<font color="red">
            <b> * </b>
          </font>
        </td>
        <td>
                                Company
                            </td>
        <td>
                                Name
                            </td>
        <td>
          <label for="returnAddressLine1" class="control-label">Address (Line 1)<font color="red">
            <b> * </b>
          </font>
        </label>
      </td>
    </tr>
    <td>
      <select name="returnService" id="returnService" class="control-label">
        <option value="" label="--Choose one--">--Choose one--</option>
        <option value="DOM.PC" label="Priority">Priority</option>
        <option value="DOM.XP" label="Xpost">Xpost</option>
        <option value="DOM.RP" label="Regular">Regular</option>
        <option value="DOM.EP" label="Expedited">Expedited</option>
        <option value="DOM.LIB" label="Library Books">Library Books</option>
      </select>
    </td>
    <td>
    <input type="text" name="returnCompany" id="returnCompany" value="<?php echo ($_SESSION['clientinfo']['ReturnCompanyName']) ?>" maxlength="44" />
  </td>
    <td>
    <input type="text" name="returnName" id="returnName" value="<?php echo ($_SESSION['clientinfo']['ReturnContactName']) ?>" />
  </td>
    <td>
    <input type="text" name="returnAddressLine1" id="returnAddressLine1" value="<?php echo ($_SESSION['clientinfo']['Returnaddressline1']) ?>" />
  </td>
</tr>
</table>
  <br />
  <table class="TableStyle">
    <tr>
      <td>
                                Address (Line 2)
                            </td>
      <td>
        <label for="returnCity" class="control-label">City<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="returnProvince" class="control-label"> Province<font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="returnPostalCode" class="control-label">Postal Code <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="returnemailnotification" class="control-label">E-mail Address</label>
</td>
</tr>
<td>
<input type="text" name="returnAddressLine2" id="returnAddressLine2" value="<?php echo ($_SESSION['clientinfo']['Returnaddressline2']) ?>" />
</td>
  <td>
  <input type="text" name="returnCity" id="returnCity" value="<?php echo ($_SESSION['clientinfo']['ReturnCity']) ?>" />
</td>
  <td>
  <input type="hidden" class="target" value="<?php echo ($_SESSION['clientinfo']['Returnprovince']) ?>" </script>
    <select name="returnProvince" id="returnProvince">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="BC">British Columbia</option>
      <option value="MB">Manitoba</option>
      <option value="NB">New Brunswick</option>
      <option value="NL">Newfoundland and Labrador</option>
      <option value="NS">Nova Scotia</option>
      <option value="NT">Northwest Territories</option>
      <option value="NU">Nunavut</option>
      <option value="ON">Ontario</option>
      <option value="PE">Prince Edward Island</option>
      <option value="QC">Québec</option>
      <option value="SK">Saskatchewan</option>
      <option value="YT">Yukon</option>
    </select>
  </td>
  <td>
  <input type="text" name="returnPostalCode" id="returnPostalCode" maxlength="6" value="<?php echo ($_SESSION['clientinfo']['ReturnPostalCode']) ?>" onblur="UpperCasePostalContractShippingCAN()" />
    <br />
  </td>
  <td>
  <input type="text" name="returnemailnotification" id="returnemailnotification" value="<?php echo ($_SESSION['clientinfo']['returnemailnotification']) ?>" />
</td>
</tr>
</table>
  <br />
</div></div>
<br />
<div id="quotescontainer" class="ui-widget-content">
  <h1>Shipment Options and extra's</h1>
  <div id="quotescontainer">
    <table class="TableStyle">
      <tr>
        <td>Standard Options</td>
      </tr>
      <tr>
        <td>
          <input type="checkbox" name="optionfake" value="DC" disabled="disabled" checked /> Delivery Confirmation
                                <input type="hidden" name="optionDC" value="DC" checked />
        </td>
      </tr>
      <tr>
        <td>
          <label for="optionD2POzzzzz">
          <input class="optionD2POzzzz" type="checkbox" id="optionD2PO" name="optionD2PO" value="D2PO" onClick="if(this.checked) {window.open('https://fabsandbox.com/GetNearestPostOffice/d2popopup.php<?php echo $SOMEID["id"] ?>','','width=700,height=400,left=100, scrollbars=yes,top=100,screenX=100,screenY=100');}" />Deliver to post office</label>
          
<!-- SCRIPT TO MAKE EMAIL MANDATORY IF D2PO IS SELECTED -->
          
<script>
$('#optionD2PO').change(function () {
    if(this.checked) {
        $('#eNoticeEmail').prop('required', true);
    } else {
        $('#eNoticeEmail').prop('required', false);
    }
});
</script>
          
          
          
          
        </td>
      </tr>
        <tr>
          <td>
            <label for="optionDNS">
              <input type="checkbox" class="optionDNS" id="optionDNS" name="optionDNS" value="DNS" />Do not safe drop</label>
            </td>
          </tr>
          <tr>
            <td>
              <label for="optionPA18">
                <input class="optionPA18" type="checkbox" name="optionPA18" id="optionPA18" value="PA18" />Proof of Age Required - 18</label>
                <br />
              </td>
            </tr>
            <tr>
              <td>
                <label for="optionPA19">
                  <input class="optionPA19" type="checkbox" name="optionPA19" id="optionPA19" value="PA19" />Proof of Age Required - 19</label>
                </td>
              </tr>
                          <tr>
              <td>
                <label for="optionPA21">
                  <input class="optionPA21" type="checkbox" name="optionPA21" id="optionPA21" value="PA21" />Proof of Age Required - 21</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="optionHFP">
                    <input class="optionHFP" id="optionHFP" type="checkbox" name="optionHFP" value="HFP" />Card for pickup</label>
                    <br />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="optionLAD">
                      <input class="optionLAD" id="optionLAD" type="checkbox" name="optionLAD" value="LAD" enabled />Leave at door - do not card</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="optionD2D">
                        <input type="checkbox" class="optionD2D" id="optionD2D" name="optionD2D" value="D2D" enabled />Delivery to Door</label>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="optionD2PB">
                          <input type="checkbox" id="optionD2PB" class="optionD2PB" name="optionD2PB" value="D2PB" disabled />Deliver to Parcel Box</label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" name="optionPOID" value="POID" enabled />Proof of Identity                                          
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="checkbox" name="unpackaged" id="unpackaged" value="true" />
                                unpackaged     
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="oversized" id="oversized" value="true" />
                                oversized
                            </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="checkbox" name="mailingtube" id="mailingtube" value="true" />
                                mailingtube
                            </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="optionSO">
                                    <input type="checkbox" class="optionSO" id="optionSO" name="optionSO" value="SO" />Signature On Delivery?</label>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input type="checkbox" name="optionCOV" id="optionCOV" value="COV" /> Insurance
                                <input align="right" type="text" name="COVamount" id="COVamount" />
                                    <br />
                                  </td>
                                </tr>
                              </table>
                              <br/><br/>
                            </div>
                            <div id="quotescontainercenter">
                              <table class="TableStyle">
                                <tr>
                                  <td>
                                    <label for="serviceTypezzz">Service Type<font color="red">
                                      <b> * </b>
                                    </font>
                                  </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <select name="serviceType" id="serviceType">
                                    <option value="" label="-- Choose One --"> -- Choose One --</option>
                                    <option value="DOM.RP" label="Regular">Regular</option>
                                    <option value="DOM.XP" label="Xpost">Xpost</option>
                                    <option value="DOM.EP" label="Expedited">Expedited</option>
                                    <option value="DOM.PC" label="priority">Priority</option>
                                    <option value="DOM.LIB" label="Library Books">Library Books</option>
                                  </select>
                                </td>
                              </tr>
                            </table>
                            <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                            <table class="TableStyle">
                              <tr>
                                <td>
                                  <label for="weight">Weight (Kg)<font color="red">
                                    <b> *</b>
                                  </font>
                                </label>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" name="weight" id="weight" />
                              </td>
                            </tr>
                          </table>
                          <br /><br /><br />
                          <table class="TableStyle">
                            <tr>
                              <td>       
                                Include dimension? (CM)
                            </td>
                            </tr>
                            <tr>
                              <td>
                                <label>
                                  <input class="dimensionno" type="radio" name="dimension" value="no"  />No</label>
                                  <label>
                                    <input class="dimensionyes" type="radio" name="dimension" value="yes" checked="checked" />Yes</label>
                                  </td>
                                </tr>
                              </table>
                              <br />
                              <div id="dimension">
                                <table class="TableStyle">
                                  <tr>
                                    <td>
                                      <label for="length">Length:<font color="red">
                                        <b> * </b>
                                      </font>
                                    </label>
                                  </td>
                                  <td>
                                    <label for="width">Width:<font color="red">
                                      <b> * </b>
                                    </font>
                                  </label>
                                </td>
                                <td>
                                  <label for="height">Height:<font color="red">
                                    <b> * </b>
                                  </font>
                                </label>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" id="length" name="length" onblur="CheckGirth()" />
                              </td>
                              <td>
                                <input type="text" id="width" name="width" onblur="CheckGirth()" />
                              </td>
                              <td>
                                <input type="text" id="height" name="height" onblur="CheckGirth(); VolumetricWeight()" />
                              </td>
                            </tr>
                          </table>
                          <br />
                        </div></div>
                        <div id="quotescontainerright">
                          <table border="1" class="TableStyle">
                            <tr>
                              <td align="left">
                                <label for="optionCOD">
                                  <input type="checkbox" class="optionCOD" id="optionCOD" name="optionCOD" value="COD" id="optionCOD" value="0" />Collect On Delivery?</label>
                                  <input align="right" type="text" name="CODamount" id="CODamount" maxlength="9"/>
                                  <br /><br />
                                </td>
                              </tr>
                            </table>
                            <br />
                            <div id="CODSection" style="display:none">
                              <table class="TableStyle">
                                <tr>
                                  <td align="left">
                                    COD amount included in shipping cost? 
                                    <input class="optiontyes" type="radio" name="optionqualifier1COD" value="true" checked="checked"/>Yes            
                                    <input class="optionno" type="radio" name="optionqualifier1COD" value="false" />No<br />
                                </td>
                            <!--   </tr>
                              <tr>
                               <td align="left">
                                    Method of payment accepted for COD?
                                </td>
                              </tr>
                              <tr>
                                <td align="left">
                                  <select name="optionqualifier2COD" id="optionqualifier2COD" onChange="CHKCODAmount();">
                                    <option value="" select="selected">Pick Method of Collection</option>
                                    <option value="CSH">Cash</option>
                                    <option value="CHQ">Cheque</option>
                                    <option value="MOCC">Money Order / Certified Cheque</option>
                                  </select>
                                  <br /><br />
                                </td>
                              </tr>
                              <tr>
                                <td align="left">
                                    Information found on the Collect On Delivery label
                                    <br />
                              </td>
                            </tr>
                            <tr>
                              <td align="right">
                                <label>Name: <input type="text" name="CODname" maxlength="44" />
                              </label>
                              <br />
                            </td>
                          </tr>
                          <tr>
                            <td align="right">
                              <label>Company Name: <font color="red">
                                <b> * </b>
                              </font>
                              <input type="text" name="CODCompany" id="CODCompany" maxlength="44"/>
                            </label>
                            <br />
                          </td>
                        </tr>
                        <tr>
                          <td align="right">
                            <label>Address Line 1: <font color="red">
                              <b> * </b>
                            </font>
                            <input type="text" name="CODAddressLine1" id="CODAddressLine1" maxlength="44"/>
                          </label>
                          <br />
                        </td>
                      </tr>
                      <tr>
                        <td align="right">
                          <label>Address Line 2: <input type="text" name="CODAddressLine2" maxlength="44"/>
                        </label>
                        <br />
                      </td>
                    </tr>
                    <tr>
                      <td align="right">
                        <label>City: <font color="red">
                          <b> * </b>
                        </font>
                        <input type="text" name="CODCity" id="CODCity" maxlength="40"/>
                      </label>
                      <br />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                                    Province: <font color="red">
                      <b> * </b>
                    </font>
                    <select name="CODProvince" id="CODProvince">
                      <option value="" label=" -- Choose One --"> -- Choose One --</option>
                      <option value="AB" label="Alberta">Alberta</option>
                      <option value="BC" label="British Columbia">British Columbia</option>
                      <option value="MB" label="Manitoba">Manitoba</option>
                      <option value="NB" label="New Brunswick">New Brunswick</option>
                      <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
                      <option value="NS" label="Nova Scotia">Nova Scotia</option>
                      <option value="NT" label="Northwest Territories">Northwest Territories</option>
                      <option value="NU" label="Nunavut">Nunavut</option>
                      <option value="ON" label="Ontario">Ontario</option>
                      <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
                      <option value="QC" label="Qu�bec">Québec</option>
                      <option value="SK" label="Saskatchewan">Saskatchewan</option>
                      <option value="YT" label="Yukon">Yukon</option>
                    </select>
                    <br /><br />
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <label>Postal Code: <font color="red">
                      <b> * </b>
                    </font>
                    <input type="text" name="CODPostalCode" id="CODPostalCode" maxlength="6" onblur="UpperCasePostalContractShippingCAN()" />
                  </label>
                  <br />
                </td>
              </tr>  -->
            </table>
          </div></div>
          <!--end container -->
        </div>
        <br />
        <div class="ui-widget-content">
          <h2>Print Preferences </h2>
          <table class="TableStyle">
            <tr>
              <td>
                            Output Format <span>*</span>
            </td>
            <td>
                            Output Type<font color="red">
              <b> * </b>
            </font>
          </td>
          <td>
                            Show Packing Instructions<font color="red">
            <b> * </b>
          </font>
        </td>
  <!--      <td>
                            Show Postage Rate<font color="red">
          <b> * </b>
        </font>
      </td>
      <td>
                            Show Insured Value<font color="red">
        <b> * </b>
      </font>
    </td> -->
  </tr>
  <tr>
    <td>
      <select name="outputFormat" id="outputFormat">
        <option value="8.5x11" label="8.5x11">8.5x11</option>
        <option value="4x6" label="4x6">4x6</option>
      </select>
    </td>
    <td>
      <select name="encoding" id="encoding">
        <option value="PDF" label="PDF">PDF</option>
        <option value="ZPL" label="ZPL">ZPL</option>
      </select>
    </td>
    <td>
      <select name="showPackingInstructions" id="showPackingInstructions">
        <option value="false" label="No">No</option>
        <option value="true" label="Yes">Yes</option>
      </select>
    </td>
<!--    <td>
      <select name="showPostageRate" id="showPostageRate">
        <option value="false" label="No">No</option>
        <option value="true" label="Yes">Yes</option>
      </select>
    </td> 
    <td>
      <select name="showInsuredValue" id="showInsuredValue">
        <option value="false" label="No">No</option>
        <option value="true" label="Yes">Yes</option>
      </select>
    </td> -->
  </tr>
</table>
<br />
</div>
<br />
<div class="ui-widget-content">
  <h2>Tracking Options</h2>
  <table class="TableStyle">
    <tr>
      <td>
        <label for="costcenter" id="label-costcenter">costcenter</label>
      </td>
      <td>
        <label for="customerref1" id="label-customerref1">Cost customerref1</label>
      </td>
      <td>
        <label for="customerref2" id="label-customerref2">customerref2</label>
      </td>
    </tr>
    <td>
      <input type="text" name="costcenter" id="costcenter" maxlength="35" />
    </td>
    <td>
      <input type="text" name="customerref1" id="customerref1" maxlength="30" />
    </td>
    <td>
      <input type="text" name="customerref2" id="customerref2" maxlength="35" />
    </td>
  </tr>
</table>
<br />







<h2>Electronic Delivery Updates</h2>

                This option allows you to request emails to be sent when your item is shipped, delivered, signature obtained or unforeseen delivery interruptions occur.
                This option is available for services with delivery confirmation (barcoded) only.
                <br />
<table class="TableStyle">
  <tr>
    <td>
                            Email address that will receive notification when the shipment order is created and the item is provided to Canada Post for delivery.<font color="red">
      <b> * </b>
    </font>
  </td>
  <td>
    <label for="eNoticeException" id="label-eNoticeException">Exception
                                Email notification when any unforeseen delivery interruptions occur..</label>
  </td>
  <td>
    <label for="eNoticeDelivery" class="eNoticeDelivery" id="eNoticeDelivery">Delivery
                                Email notification when a Delivery Notice Card notifying the recipient to pick the item up at a local post office is delivered.</label>
  </td>
</tr>
<tr>
  <td>
    <input type="text" name="eNoticeEmail" id="eNoticeEmail" maxlength="60" />
    <input type="hidden" name="eNoticeShip" value="false" />
    <input type="checkbox" name="eNoticeShip" id="eNoticeShip" value="true" checked />
  </td>
  <td>
    <input type="hidden" name="eNoticeException" value="false" />
    <input type="checkbox" name="eNoticeException" id="eNoticeException" value="true" checked />
  </td>
  <td>
    <input type="hidden" name="eNoticeDelivery" value="false" />
    <input type="checkbox" class="eNoticeDelivery" name="eNoticeDelivery" id="eNoticeDelivery" value="true" checked />
  </td>
</tr>
</table>
<br />
</div>
<br />
<center>
  <input type="submit" id="submitButton" name="submitButton" value="Create Shipment" />
</center>
</form>
<center>
  <a href='/../'>
    <button>Go to main Screen</button>
  </a>
</center>
</div>
<!--USA FORM BEGIN -->
<div id="tabs-2">
  <form id="CreateShipmentUSA" action="CreateShipmentUSA.php" method="POST">
    <div  class="ui-widget-content">
      <br />
      <p>This is a unique request id for tracking purpuses.</p>
      <br />
      <table class="TableStyle">
        <tr>
          <td>
            <label for="labelcustreqUSA">customer request ID</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="custreqUSA" id="custreqUSA" readOnly="true" maxlength="30" />
          </td>
        </tr>
      </table>
      <br />
      <p>If your shipments are picked up by Canada Post or a third party please select YES. If you are going to deposit select NO.</p>
      <br />
      <table class="TableStyle">
        <tr>
          <td>
            <label>Pickup?<font color="red">
              <b> * </b>
            </font>
          </td>
        </tr>
        <tr>
          <td>
            <label for="pickupquestionUSA">
              <input class="pickupyesUSA" type="radio" id="pickupquestionUSA" name="pickupquestionUSA" value="yes" onClick="document.getElementById('groupIdUSA').value='PICKUP'" />Yes</label>
              <label>
                <input class="pickupnoUSA" type="radio" id="pickupquestionUSA" name="pickupquestionUSA" value="no" onClick="document.getElementById('groupIdUSA').value='DEPOSIT'" />No</label>
              </td>
            </tr>
          </table>
          <br />
          <div id="shippingpointsectionUSA" style="display:none">
            <p>Provide the Postal Code of your pickup location.</p>
            <table class="TableSTyle">
              <tr>
                <td>
                  <label for="shippingPointUSA" class="control-label">Shipping Point<font color="red">
                    <b> * </b>
                  </font>
                </label>
                <input type="text" name="shippingPointUSA" id="shippingPointUSA" maxlength="6" value="K2K0B1" onblur="UpperCasePostalContractShippingUSA()" />
              </td>
            </tr>
          </table>
        </div>
        <div id="pickupsectionUSA">
          <br />
          <p>Looks like your going to deposit instead of pickups please ensure to identify the deposit location by identifying the Post Office ID below. If you have no clue what the Post Office ID is then follow the hyperlink, then copy/paste the post office id into the field below.</p>
          <table class="TableStyle">
            <tr>
              <td>
                                    Click here to <a href='http://www.canadapost.ca/cpotools/apps/fdl/business/findDepositLocation' target='_blank'>Find a Deposit Location</a>
            </td>
          </tr>
          <tr>
            <td>
              <label for="postofficeidUSA" class="control-label">Post Office ID<font color="red">
                <b> * </b>
              </font>
            </label>
          </td>
        </tr>
        <td>
          <input type="text" name="postofficeidUSA" id="postofficeidUSA" value="3057" maxlength="10" />
        </td>
      </tr>
    </table>
    <br /><br />
  </div>
<!-- display div if Agreement is set in session otherwise hide it. -->

<div id="agreement" <?php if (empty($agreement)){ echo 'style="display:none;"'; } ?>>

  <P>If you are planning on shipping over 50 shipments per day then you should opt to include in Manifest. Failure to comply may result in having your shipments refused by Canada Post. Canada Post requires a manifest for every pickup over 50 shipments, the manifest must be given to the Canada Post representative. If you are not familiar with the Manifest please have a look at our handy <a href="http://www.fabsandbox.com/tutorials">video tutorials section.</a>
</P>
<table class="TableStyle">
  <tr>
    <td>
                                Include Shipment in Manifest? <font color="red">
      <b> * </b>
    </font>
  </td>
</tr>
<tr>
  <td>
    <label for="manifestquestionUSA">
    <select name="manifestquestionUSA" id="manifestquestionUSA">
      <option disabled selected value> -- select an option -- </option>
      <option value="yes" label="YES">YES</option>
      <option value="no" label="NO"> NO</option>
    </select>
    </tr>
  </table>
  <div id="GroupIdSectionUSA" style="display:none">
    <p> Its important to understand that if you opted to include shipments to a manifest and transmit at a later time that you will require printing also and provide hardcopy. This field is disabled and will be autopopulated when you select Pickup or Deposit.</p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="groupIdUSA">Group ID<font color="red">
            <b> * </b>
          </font>
        </label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" class="groupIdUSA" name="groupIdUSA" id="groupIdUSA" maxlength="32" readOnly="true" />
      </td>
    </tr>
  </table>
</div>
</div>


<div>
  <p>Promotional discount code. Note that a promotion code is only valid for a certain period and product. Your entry will be converted to uppercase (i.e, you can use lowercase or a mix of lower or upper case and will get the same result).</p>
  <table class="TableStyle">
    <tr>
      <td>
        <label for="promocodeUSA">Promo Code
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" class="promocode" name="promocodeUSA" id="promocodeUSA" maxlength="32" />
    </td>
  </tr>
</table>
<br />
</div>




<!-- here -->
<div>
    <p>
      This is an optional element, used to request the QR code image of the public label in base64 format, along with contains public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo.
          Note: Only applicable to 8 1/2 X 11 paper encoded in pdf  
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="QrCodeUSA">Do you want to generate a QR Code?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="QrCodeUSA" id="QrCodeUSA">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />

<br />
<br />

  </div>
  
  
  
  
  
  
     <!-- script to popup the public key text input when QR Code is YES-->
    <script>
                                $(document).ready(function(){
    $('#QrCodeUSA').on('change', function() {
      if ( this.value == 'true')
      {
        $("#publickeyUSA").show();
      }
      else
      {
        $("#publickeyUSA").hide();
      }
    });
});

</script>

 <div style='display:none;' id='publickeyUSA' float: right>
         <p>
            This is an optional element, used to request the public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo

                Note: Only applicable to 8 1/2 X 11 paper encoded in pdf
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="publickeyUSA">Do you Want to receive a public key label URL?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="publickeyUSA" id="publickeyUSA">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
    </div>
<br />


<!-- here -->



<br />
</div>
<br />











<div  class="ui-widget-content">
  <br />
  <h2>Payment Information</h2>
  <br />
  <table class="TableStyle">
    <tr>
      <td>
        <label for="mailedByUSA"> Mailed By <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="moboUSA">Mailed on Behalf of <font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="paidByUSA">Paid By <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="agreementUSA">Contract<font color="red">
    <b> * </b>
  </font>
</label>
</td>
<td>
  <label for="methodOfPaymentUSA">Method of Payment<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
  <input type="text" name="mailedByUSA" id="mailedByUSA" value="<?php echo ($_SESSION['clientinfo']['MailedBy']) ?>" maxlength="10" readOnly="true" />
</td>
  <td>
  <input type="text" name="moboUSA" id="moboUSA" value="<?php echo ($_SESSION['clientinfo']['MailedBy']) ?>" maxlength="10" readOnly="true" />
</td>
  <td>
  <input type="text" name="paidByUSA" id="paidByUSA" value="<?php echo ($_SESSION['clientinfo']['PaidBy']) ?>" maxlength="10" readOnly="true" />
</td>
  <td>
  <input type="text" name="agreementUSA" id="agreementUSA" value="<?php echo ($_SESSION['clientinfo']['Agreement']) ?>" maxlength="10" readOnly="true" />
</td>
  <td>
    <!-- script to popup the want a receipt whem credit card is picked-->
    <script>
                                $(document).ready(function(){
    $('#methodOfPaymentUSA').on('change', function() {
      if ( this.value == 'CreditCard')
      {
        $("#GetReceiptUSA").show();
      }
      else
      {
        $("#GetReceiptUSA").hide();
      }
    });
});
</script>
    <select name="methodOfPaymentUSA" id="methodOfPaymentUSA">
      <option value="CreditCard" label="creditCard">creditCard</option>
      <option selected value="Account" label="Account">Account</option>
      <option value="SupplierAccount" label="SupplierAccount">Supplier Account</option>
    </select>
  </td>
</tr>
</table>
<br />



<div style="display: flex; justify-content: space-around float: right">
  <div id='pricingdivUSA' style='display:none'>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="GetPricingUSA">Do you want pricing returned in the answer?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetPricingUSA" id="GetPricingUSA">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>

 <div style='display:none;' id='GetReceiptUSA' float: right>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="GetReceiptUSA">Do you Want a Receipt?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetReceiptUSA" id="GetReceiptUSA">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>
</div>
</div>

  <br />
  <div  class="ui-widget-content">
    <H2> Continuous Inbound Freight</H2>
    <P>
                    If you have shipments that originate outside of Canada, but are being delivered directly to a Canada Post plant, use this element to identify these shipments as continuous inbound freight (CIF). This option allows you to be eligible for Canadian sales tax exemptions. 
                    You will need to provide Canada Post with documentation that shows proof of origin, such as a Canadian customs document or bill of lading.
                    </p>
    <table class="TableStyle">
      <tr>
        <td>
            <select name="CIFUSA" id="CIFUSA">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
        </td>
      </tr>
    </table>
    <br />
  </div>
  <br /><br /><br />






<br /><br />
<div   class="ui-widget-content">
  <br />
  <p>shipments are priced as per the current shipment date and are re-priced at time of transmit if transmitted at a later date.</p>
  <table class="TableSTyle">
    <tr>
      <td>
        <label>Expected Mailing Date: </label>
        <input id="datepicker2" type="text" name="mailingdateUSA" />
        <br /><br />
      </td>
    </tr>
  </table>
  <br />
</div>
<br /><br /><br />
<div  class="ui-widget-content">
  <h2>Sender Information</h2>
  <br />
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="senderCompanyUSA" id="senderCompanyUSA">Company <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="senderphoneUSA" id="senderphoneUSA">Contact Phone <font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="contactNameUSA" id="contactNameUSA">Contact Name</label>
  </td>
</tr>
<tr>
  <td>
  <input type="text" name="senderCompanyUSA" id="senderCompanyUSA" value="<?php echo ($_SESSION['clientinfo']['SenderCompanyName']) ?>" maxlength="44" />
</td>
  <td>
  <input type="text" name="senderphoneUSA" id="senderphoneUSA" value="<?php echo ($_SESSION['clientinfo']['SenderContactPhone']) ?>" maxlength="44" />
</td>
  <td>
  <input type="text" name="contactNameUSA" id="contactNameUSA" value="<?php echo ($_SESSION['clientinfo']['SenderContactName']) ?>" maxlength="44" />
</td>
</tr>
</table>
  <br /><br />
  <table class="TableStyle">
    <tr>
      <td>
        <label for="customerAddressLine1USA">Address (Line 1)<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
                                Address (Line 2)
                            </td>
    <td>
      <label for="customerCityUSA">City<font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="provstateUSA">Province<font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="customerPostalCodeUSA">Postal Code<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
  <input type="text" name="customerAddressLine1USA" id="customerAddressLine1USA" value="<?php echo ($_SESSION['clientinfo']['Senderaddressline1']) ?>" maxlength="44" />
</td>
  <td>
  <input type="text" name="customerAddressLine2USA" id="customerAddressLine2USA" value="<?php echo ($_SESSION['clientinfo']['Senderaddressline2']) ?>" maxlength="44" />
</td>
  <td>
  <input type="text" name="customerCityUSA" id="customerCityUSA" value="<?php echo ($_SESSION['clientinfo']['SenderCity']) ?>" maxlength="40" />
</td>
  <td>
  <input type="hidden" class="target" value="<?php echo ($_SESSION['clientinfo']['Senderprovince']) ?>" />
    <select name="senderProvinceUSA" id="senderProvinceUSA">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AB" label="Alberta">Alberta</option>
      <option value="BC" label="British Columbia">British Columbia</option>
      <option value="MB" label="Manitoba">Manitoba</option>
      <option value="NB" label="New Brunswick">New Brunswick</option>
      <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
      <option value="NS" label="Nova Scotia">Nova Scotia</option>
      <option value="NT" label="Northwest Territories">Northwest Territories</option>
      <option value="NU" label="Nunavut">Nunavut</option>
      <option value="ON" label="Ontario" selected >Ontario</option>
      <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
      <option value="QC" label="Québec">Quebec</option>
      <option value="SK" label="Saskatchewan">Saskatchewan</option>
      <option value="YT" label="Yukon">Yukon</option>
    </select>
  </td>
  <td>
  <input type="text" name="customerPostalCodeUSA" id="customerPostalCodeUSA" value="<?php echo ($_SESSION['clientinfo']['SenderPostalCode']) ?>" maxlength="6" onblur="UpperCasePostalContractShippingUSA()" />
</td>
</tr>
</table>
  <br />
</div>
<br />
<div  class="ui-widget-content">
  <br />
  <h2>Recipient Information</h2>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="recipientCompanyUSA" id="recipientCompanyUSA">Company</label>
      </td>
      <td>
        <label for="recipientNameUSA" id="recipientNameUSA">Name<font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="additionalAddressInfoUSA" id="additionalAddressInfoUSA">Additional Address Info</label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" name="recipientCompanyUSA" id="recipientCompanyUSA" maxlength="44" />
    </td>
    <td>
      <input type="text" name="recipientNameUSA" id="recipientNameUSA" maxlength="44" />
    </td>
    <td>
      <input type="text" name="additionalAddressInfoUSA" id="additionalAddressInfoUSA" maxlength="44" />
    </td>
  </tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="recipientAddressLine1USA" id="recipientAddressLine1USA">Address (Line 1) <span>
        <font color="red">*</font>
      </span>
    </label>
  </td>
  <td>
    <label for="recipientAddressLine2USA" id="recipientAddressLine2USA">Address (Line 2)</label>
  </td>
  <td>
    <label for="recipientCityUSA" id="recipientCityUSA">City <span>
      <font color="red">*</font>
    </span>
  </label>
</td>
<td>
  <label for="recipientStateUSA" id="recipientStateUSA">State <span>
    <font color="red">*</font>
  </span>
</label>
</td>
</tr>
<tr>
  <td>
    <input type="text" name="recipientAddressLine1USA" id="recipientAddressLine1USA" maxlength="44" />
  </td>
  <td>
    <input type="text" name="recipientAddressLine2USA" id="recipientAddressLine2USA" maxlength="44" />
  </td>
  <td>
    <input type="text" name="recipientCityUSA" id="recipientCityUSA" maxlength="44" />
  </td>
  <td>
    <select name="recipientStateUSA" id="recipientStateUSA" required>
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AL" label="Alabama">Alabama</option>
      <option value="AK" label="Alaska">Alaska</option>
      <option value="AZ" label="Arizona">Arizona</option>
      <option value="AR" label="Arkansas">Arkansas</option>
      <option value="CA" label="California">California</option>
      <option value="CO" label="Colorado">Colorado</option>
      <option value="CT" label="Connecticut">Connecticut</option>
      <option value="DE" label="Delaware">Delaware</option>
      <option value="DC" label="District of Columbia">District of Columbia</option>
      <option value="FL" label="Florida">Florida</option>
      <option value="GA" label="Georgia">Georgia</option>
      <option value="HI" label="Hawaii">Hawaii</option>
      <option value="ID" label="Idaho">Idaho</option>
      <option value="IL" label="Illinois">Illinois</option>
      <option value="IN" label="Indiana">Indiana</option>
      <option value="IA" label="Iowa">Iowa</option>
      <option value="KS" label="Kansas">Kansas</option>
      <option value="KY" label="Kentucky">Kentucky</option>
      <option value="LA" label="Louisiana">Louisiana</option>
      <option value="ME" label="Maine">Maine</option>
      <option value="MD" label="Maryland">Maryland</option>
      <option value="MA" label="Massachusetts">Massachusetts</option>
      <option value="MI" label="Michigan">Michigan</option>
      <option value="MN" label="Minnesota">Minnesota</option>
      <option value="MS" label="Mississippi">Mississippi</option>
      <option value="MO" label="Missouri">Missouri</option>
      <option value="MT" label="Montana">Montana</option>
      <option value="NE" label="Nebraska">Nebraska</option>
      <option value="NV" label="Nevada">Nevada</option>
      <option value="NH" label="New Hampshire">New Hampshire</option>
      <option value="NJ" label="New Jersey">New Jersey</option>
      <option value="NM" label="New Mexico">New Mexico</option>
      <option value="NY" label="New York">New York</option>
      <option value="NC" label="North Carolina">North Carolina</option>
      <option value="ND" label="North Dakota">North Dakota</option>
      <option value="OH" label="Ohio">Ohio</option>
      <option value="OK" label="Oklahoma">Oklahoma</option>
      <option value="OR" label="Oregon">Oregon</option>
      <option value="PA" label="Pennsylvania">Pennsylvania</option>
      <option value="RI" label="Rhode Island">Rhode Island</option>
      <option value="SC" label="South Carolina">South Carolina</option>
      <option value="SD" label="South Dakota">South Dakota</option>
      <option value="TN" label="Tennessee">Tennessee</option>
      <option value="TX" label="Texas">Texas</option>
      <option value="UT" label="Utah">Utah</option>
      <option value="VT" label="Vermont">Vermont</option>
      <option value="VA" label="Virginia">Virginia</option>
      <option value="WA" label="Washington">Washington</option>
      <option value="WV" label="West Virginia">West Virginia</option>
      <option value="WI" label="Wisconsin">Wisconsin</option>
      <option value="WY" label="Wyoming">Wyoming</option>
    </select>
  </td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="zipUSA" id="zipUSA">zipcode<span>
        <font color="red">*</font>
      </span>
    </label>
  </td>
  <td>
    <label for="recipientPhoneUSA" id="label-recipientPhone">Contact Phone <span>
      <font color="red">*</font>
    </span>
  </label>
</td>
</tr>
<tr>
  <td>
    <input type="text" name="zipUSA" id="zipUSA" />
  </td>
  <td>
    <input type="text" name="recipientPhoneUSA" id="recipientPhoneUSA" maxlength="25" />
  </td>
</tr>
</table>
<br />
</div>
<br />
<div id="quotescontainer"  class="ui-widget-content">
  <h2>Shipment Information</h2>
  <br />
  <div id="quotescontainer" style="width: 300px;">
    <table class="TableSTyle">
      <tr>
        <td>
          <label id="serviceTypeUSAxx">Service Type <span>
            <font color="red">*</font>
          </span>
        </label>
      </td>
    </tr>
    <tr>
      <td>
        <select id="serviceTypeUSA" name="serviceTypeUSA" onChange="setChkSelectUSA();">
          <option value="">--Select This--</option>
          <option value="USA.XP">Xpost USA</option>
          <option value="USA.EP">Expedited USA</option>
          <option value="USA.PW.ENV">Priority Worldwide envelope USA</option>
          <option value="USA.PW.PAK">Priority Worldwide pak USA</option>
          <option value="USA.PW.PARCEL">Priority Worldwide parcel</option>
          <option value="USA.TP">Tracked Packet - USA</option>
          <option value="USA.TP.LVM">Tracked Packet - USA (LVM)</option>
          <option value="USA.SP.AIR">Small Packet USA Air</option>
          <option value="USA.SP.AIR.LVM">Small Packet USA Air (LVM)</option>
        </select>
      </td>
    </tr>
  </table>
  <br />
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="weightUSA">weight (kg)<span>
          <font color="red">*</font>
        </span>
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" name="weightUSA" id="weightUSA" />
    </td>
  </tr>
</table>
</div>
<div id="quotescontainercenter">
  <table class="TableSTyle">
    <tr>
      <td>
        <label>Include dimension? <span>*</span>
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <label>
        <input class="dimensionnoUSA" type="radio" name="dimensionUSA" value="no"  />No</label>
        <label>
          <input class="dimensionyesUSA" type="radio" name="dimensionUSA" value="yes" checked="checked" />Yes</label>
        </td>
      </tr>
    </table>
    <br />
    <div id="dimensionUSA">
      <table class="TableSTyle">
        <tr>
          <td>
            <label for="lengthUSA">Length:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
          <td>
            <label for="widthUSA">Width:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
          <td>
            <label for="heightUSA">Height:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="lengthUSA" id="lengthUSA" onblur="CheckGirth()" />
          </td>
          <td>
            <input type="text" name="widthUSA" id="widthUSA" onblur="CheckGirth()" />
          </td>
          <td>
            <input type="text" name="heightUSA" id="heightUSA" onblur="CheckGirth(); VolumetricWeightUSA()" />
          </td>
        </tr>
      </table>
    </div>
    <br />
  </div>
  <div id="quotescontainerright" style="margin-left:180px;">
    <table class="TableSTyle">
      <tr>
        <td>
          <label>Shipping Options</label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="checkbox" name="optionfake" value="DC" disabled="disabled" checked /> Delivery Confirmation
                                    <input type="hidden" name="optionDC" value="DC" checked />
        </td>
      </tr>
      <tr>
        <td>
          <label for="optionSOUSA">
            <input type="checkbox" class="optionSOUSA" id="optionSOUSA" name="optionSOUSA" value="SO" />Signature On Delivery?</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="unpackagedUSA" id="unpackagedUSA" value="true" />
            <label for="unpackagedUSA">unpackaged</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="oversizedUSA" id="oversizedUSA" value="true" />
            <label for="oversizedUSA">oversized</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="mailingtubeUSA" id="mailingtubeUSA" value="true" />
            <label for="malingtubeUSA">mailingtube</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="optionCOVUSA" value="COV" /> Insurance 
                                    <input align="right" type="text" name="COVamountUSA" maxlength="9" />
          </td>
        </tr>
      </table>
      <br />
      <table class="TableSTyle">
        <tr>
          <td>
            <label> Non Delivery Options</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="raseUSA" id="raseUSA" value="RASE" />
            <label for="raseUSA">return At Sender Expense</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="rtsUSA" id="rtsUSA" value="RTS" />
            <label for="rtsUSA">return To Sender</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="abanUSA" id="abanUSA" value="ABAN" />
            <label for="abanUSA">Abandon</label>
          </td>
        </tr>
      </table>
      <br />
    </div>
    <br />
  </div>
  <br />
  <div  class="ui-widget-content">
    <h3>Print Preferences</h3>
    <table class="TableSTyle">
      <tr>
        <td>
          <label for="outputFormatUSA" id="outputFormatUSA">Output Format <span>*</span>
        </label>
      </td>
      <td>
        <label for="showPackingInstructionsUSA" id="label-showPackingInstructionsUSA">Show Packing Instructions <span>*</span>
      </label>
    </td>
    <td>
      <label for="showPostageRateUSA" id="showPostageRateUSA">Show Postage Rate <span>*</span>
    </label>
  </td>
  <td>
    <label for="showInsuredValueUSA" id="showInsuredValueUSA">Show Insured Value <span>*</span>
  </label>
</td>
</tr>
<tr>
  <td>
    <select name="outputFormatUSA" id="outputFormatUSA">
      <option value="8.5x11" label="8.5x11" selected="selected">8.5x11</option>
      <option value="4x6" label="4x6">4x6</option>
    </select>
  </td>
  <td>
    <select name="showPackingInstructionsUSA" id="showPackingInstructionsUSA">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
  <td>
    <select name="showPostageRateUSA" id="showPostageRateUSA">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
  <td>
    <select name="showInsuredValueUSA" id="showInsuredValueUSA">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
</tr>
</table>
<br />
</div>
<br />
<div   class="ui-widget-content">
  <h2>Customs Information</h2>
  <h3>Item List</h3>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="customsCurrencyUSA" id="label-customsCurrency">Currency <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="customsConversionFromCadUSA" id="label-customsConversionFromCad">Exchange Rate to Canadian Currency <span>*</span>
    </label>
  </td>
  <td>
    <label for="customsReasonForExportUSA" id="label-customsReasonForExportUSA">Reason For Export <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="otherreasonUSA" id="label-customsOtherReasonUSA">Other Reason <span>*</span>
</label>
</td>
</tr>
<tr>
  <td>
    <select name="customsCurrencyUSA" id="customsCurrencyUSA">
      <option value="CAD" label="Canada Dollar" selected="selected">Canada Dollar</option>
      <option value="USD" label="United States Dollar">United States Dollar</option>
      <option value="AED" label="United Arab Emirates Dirham">United Arab Emirates Dirham</option>
      <option value="AFN" label="Afghanistan Afghani">Afghanistan Afghani</option>
    </select>
  </td>
  <td>
    <input type="text" name="customsConversionFromCadUSA" id="customsConversionFromCadUSA" />
  </td>
  <td>
    <select name="customsReasonForExportUSA" id="customsReasonForExportUSA">
      <option value="GIF" label="Gift">Gift</option>
      <option value="DOC" label="Document">Document</option>
      <option value="SAM" label="Commercial Sample">Commercial Sample</option>
      <option value="REP" label="Repair or Warranty">Repair or Warranty</option>
      <option value="SOG" label="Sale of Goods">Sale of Goods</option>
      <option value="OTH" label="Other" selected="selected">Other</option>
    </select>
  </td>
  <td>
    <input type="text" name="otherreasonUSA" id="otherreasonUSA" maxlength="44" />
  </td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="dutiesandtaxesprepaidUSA" id="label-dutiesandtaxesprepaidUSAcustomsOtherReasonUSA">Duties-And-Taxes Prepaid</label>
    </td>
    <td>
      <label for="certificatenumberUSA" id="label-certificatenumberUSA">certificate Number</label>
    </td>
    <td>
      <label for="licencenumberUSA" id="label-licencenumberUSA">licence number</label>
    </td>
    <td>
      <label for="invoicenumberUSA" id="label-invoicenumberUSA">invoice number</label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" name="dutiesandtaxesprepaidUSA" id="dutiesandtaxesprepaidUSA" value="123" maxlength="44" />
    </td>
    <td>
      <input type="text" name="certificatenumberUSA" id="certificatenumberUSA" value="1234" maxlength="10" />
    </td>
    <td>
      <input type="text" name="licencenumberUSA" id="licencenumberUSA" value="1234" maxlength="10" />
    </td>
    <td>
      <input type="text" name="invoicenumberUSA" id="invoicenumberUSA" value="1234" maxlength="10" />
    </td>
  </tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="customsNumberOfUnitsUSA" id="label-customsNumberOfUnitsUSA">Number of Units <span>
        <font color="red">*</font>
      </span>
    </label>
  </td>
  <td>
    <label for="customsunitofmeasureUSA" id="label-customsunitofmeasureUSA">customs unit of measure</label>
  </td>
  <td>
    <label for="customsDescriptionUSA" id="label-customsDescriptionUSA">Customs Description <span>
      <font color="red">*</font>
    </span>
  </label>
</td>
<td>
  <label for="skuUSA" id="label-skuUSA">sku <span>*</span>
</label>
</td>
<td>
  <label for="hstarrifcodeUSA" id="label-hstarrifcodeUSA">hs tarrif code</label>
</td>
</tr>
<td>
  <input type="text" name="customsNumberOfUnitsUSA" id="customsNumberOfUnitsUSA" value="1" maxlength="44" />
</td>
<td>
  <select name="customsunitofmeasureUSA" id="customsunitofmeasureUSA">
    <option value="PCE" label="Piece">Piece</option>
    <option value="NMB" label="Number">Number</option>
    <option value="PAR" label="Pair">Pair</option>
    <option value="PKG" label="Package">Package</option>
    <option value="ENV" label="Envelope">Envelope</option>
    <option value="LTR" label="Litre">Litre</option>
    <option value="MLT" label="Millilitre">Millilitre</option>
    <option value="BOX" label="Box">Box</option>
    <option value="BAG" label="Bag">Bag</option>
    <option value="MTR" label="Meter">Meter</option>
    <option value="MMT" label="Millimetre">Millimetre</option>
    <option value="DZN" label="Dozen">Dozen</option>
    <option value="GRM" label="Gram">Gram</option>
    <option value="KGM" label="Kilogram">Kilogram</option>
    <option value="CTN" label="Carton">Carton</option>
    <option value="BIN" label="Bin">Bin</option>
    <option value="SET" label="Number of sets">Number of sets</option>
    <option value="BOT" label="Bottle">Bottle</option>
    <option value="TBE" label="Tube">Tube</option>
    <option value="KIT" label="Kit" selected="selected">Kit</option>
  </select>
</td>
<td>
  <input type="text" name="customsDescriptionUSA" id="customsDescriptionUSA" value="description" maxlength="44" />
</td>
<td>
  <input type="text" name="skuUSA" id="skuUSA" maxlength="44" />
</td>
<td>
  <input type="text" name="hstarrifcodeUSA" id="hstarrifcodeUSA" value="9999.99.99.99" />
</td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="customsUnitWeightUSA" id="label-customsUnitWeightUSA">Total Units Weight<span>
        <font color="red">*</font>
      </span>
    </label>
  </td>
  <td>
    <label for="customsunitvalueUSA" id="label-customsunitvalueUSA">Unit Value <span>
      <font color="red">*</font>
    </span>
  </label>
</td>
<td>
  <label for="customsCountryOfOriginUSA" id="label-ccustomsCountryOfOriginUSA">Country of Origin</label>
</td>
<td>
  <label for="customprovinceoforiginUSA" id="label-ccustomprovinceoforiginUSA">Province of Origin</label>
</td>
</tr>
<td>
  <input type="text" name="customsUnitWeightUSA" id="customsUnitWeightUSA" value="11" maxlength="7" onblur="CheckWeightCustom()" />
</td>
<td>
  <input type="text" name="customsunitvalueUSA" id="customsunitvalueUSA" value="1" maxlength="7" />
</td>
<td>
  <select name="customsCountryOfOriginUSA" id="customsCountryOfOriginUSA">
    <option value="" label=" -- Choose One --"> -- Choose One --</option>
    <option value="AF" label="Afghanistan">Afghanistan</option>
    <option value="AX" label="Åland Islands">Åland Islands</option>
    <option value="AL" label="Albania">Albania</option>
    <option value="DZ" label="Algeria">Algeria</option>
    <option value="AS" label="American Samoa">American Samoa</option>
    <option value="AD" label="Andorra">Andorra</option>
    <option value="AO" label="Angola">Angola</option>
    <option value="AI" label="Anguilla">Anguilla</option>
    <option value="AQ" label="Antarctica">Antarctica</option>
    <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="AR" label="Argentina">Argentina</option>
    <option value="AM" label="Armenia">Armenia</option>
    <option value="AW" label="Aruba">Aruba</option>
    <option value="AU" label="Australia">Australia</option>
    <option value="AT" label="Austria">Austria</option>
    <option value="AZ" label="Azerbaijan">Azerbaijan</option>
    <option value="BS" label="Bahamas">Bahamas</option>
    <option value="BH" label="Bahrain">Bahrain</option>
    <option value="BD" label="Bangladesh">Bangladesh</option>
    <option value="BB" label="Barbados">Barbados</option>
    <option value="BY" label="Belarus">Belarus</option>
    <option value="BE" label="Belgium">Belgium</option>
    <option value="BZ" label="Belize">Belize</option>
    <option value="BJ" label="Benin">Benin</option>
    <option value="BM" label="Bermuda">Bermuda</option>
    <option value="BT" label="Bhutan">Bhutan</option>
    <option value="BO" label="Bolivia">Bolivia</option>
    <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="BW" label="Botswana">Botswana</option>
    <option value="BV" label="Bouvet Island">Bouvet Island</option>
    <option value="BR" label="Brazil">Brazil</option>
    <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="BN" label="Brunei Darussalam">Brunei Darussalam</option>
    <option value="BG" label="Bulgaria">Bulgaria</option>
    <option value="BF" label="Burkina Faso">Burkina Faso</option>
    <option value="BI" label="Burundi">Burundi</option>
    <option value="KH" label="Cambodia">Cambodia</option>
    <option value="CM" label="Cameroon">Cameroon</option>
    <option value="CA" label="Canada">Canada</option>
    <option value="CV" label="Cape Verde">Cape Verde</option>
    <option value="KY" label="Cayman Islands">Cayman Islands</option>
    <option value="CF" label="Central African Republic">Central African Republic</option>
    <option value="TD" label="Chad">Chad</option>
    <option value="CL" label="Chile">Chile</option>
    <option value="CN" label="China">China</option>
    <option value="CX" label="Christmas Island">Christmas Island</option>
    <option value="CC" label="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="CO" label="Colombia">Colombia</option>
    <option value="KM" label="Comoros">Comoros</option>
    <option value="CG" label="Congo">Congo</option>
    <option value="CD" label="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
    <option value="CK" label="Cook Islands">Cook Islands</option>
    <option value="CR" label="Costa Rica">Costa Rica</option>
    <option value="CI" label="Cote D'ivoire">Cote D'ivoire</option>
    <option value="HR" label="Croatia">Croatia</option>
    <option value="CU" label="Cuba">Cuba</option>
    <option value="CY" label="Cyprus">Cyprus</option>
    <option value="CZ" label="Czech Republic">Czech Republic</option>
    <option value="DK" label="Denmark">Denmark</option>
    <option value="DJ" label="Djibouti">Djibouti</option>
    <option value="DM" label="Dominica">Dominica</option>
    <option value="DO" label="Dominican Republic">Dominican Republic</option>
    <option value="EC" label="Ecuador">Ecuador</option>
    <option value="EG" label="Egypt">Egypt</option>
    <option value="SV" label="El Salvador">El Salvador</option>
    <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
    <option value="ER" label="Eritrea">Eritrea</option>
    <option value="EE" label="Estonia">Estonia</option>
    <option value="ET" label="Ethiopia">Ethiopia</option>
    <option value="FK" label="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
    <option value="FO" label="Faroe Islands">Faroe Islands</option>
    <option value="FJ" label="Fiji">Fiji</option>
    <option value="FI" label="Finland">Finland</option>
    <option value="FR" label="France">France</option>
    <option value="GF" label="French Guiana">French Guiana</option>
    <option value="PF" label="French Polynesia">French Polynesia</option>
    <option value="TF" label="French Southern Territories">French Southern Territories</option>
    <option value="GA" label="Gabon">Gabon</option>
    <option value="GM" label="Gambia">Gambia</option>
    <option value="GE" label="Georgia">Georgia</option>
    <option value="DE" label="Germany">Germany</option>
    <option value="GH" label="Ghana">Ghana</option>
    <option value="GI" label="Gibraltar">Gibraltar</option>
    <option value="GR" label="Greece">Greece</option>
    <option value="GL" label="Greenland">Greenland</option>
    <option value="GD" label="Grenada">Grenada</option>
    <option value="GP" label="Guadeloupe">Guadeloupe</option>
    <option value="GU" label="Guam">Guam</option>
    <option value="GT" label="Guatemala">Guatemala</option>
    <option value="GG" label="Guernsey">Guernsey</option>
    <option value="GN" label="Guinea">Guinea</option>
    <option value="GW" label="Guinea-bissau">Guinea-bissau</option>
    <option value="GY" label="Guyana">Guyana</option>
    <option value="HT" label="Haiti">Haiti</option>
    <option value="HM" label="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
    <option value="VA" label="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
    <option value="HN" label="Honduras">Honduras</option>
    <option value="HK" label="Hong Kong">Hong Kong</option>
    <option value="HU" label="Hungary">Hungary</option>
    <option value="IS" label="Iceland">Iceland</option>
    <option value="IN" label="India">India</option>
    <option value="ID" label="Indonesia">Indonesia</option>
    <option value="IR" label="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
    <option value="IQ" label="Iraq">Iraq</option>
    <option value="IE" label="Ireland">Ireland</option>
    <option value="IM" label="Isle of Man">Isle of Man</option>
    <option value="IL" label="Israel">Israel</option>
    <option value="IT" label="Italy">Italy</option>
    <option value="JM" label="Jamaica">Jamaica</option>
    <option value="JP" label="Japan">Japan</option>
    <option value="JE" label="Jersey">Jersey</option>
    <option value="JO" label="Jordan">Jordan</option>
    <option value="KZ" label="Kazakhstan">Kazakhstan</option>
    <option value="KE" label="Kenya">Kenya</option>
    <option value="KI" label="Kiribati">Kiribati</option>
    <option value="KP" label="Korea, Democratic People\s Republic of">Korea, Democratic People\s Republic of</option>
    <option value="KR" label="Korea, Republic of">Korea, Republic of</option>
    <option value="KW" label="Kuwait">Kuwait</option>
    <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
    <option value="LA" label="Lao People\s Democratic Republic">Lao People\s Democratic Republic</option>
    <option value="LV" label="Latvia">Latvia</option>
    <option value="LB" label="Lebanon">Lebanon</option>
    <option value="LS" label="Lesotho">Lesotho</option>
    <option value="LR" label="Liberia">Liberia</option>
    <option value="LY" label="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="LI" label="Liechtenstein">Liechtenstein</option>
    <option value="LT" label="Lithuania">Lithuania</option>
    <option value="LU" label="Luxembourg">Luxembourg</option>
    <option value="MO" label="Macao">Macao</option>
    <option value="MK" label="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
    <option value="MG" label="Madagascar">Madagascar</option>
    <option value="MW" label="Malawi">Malawi</option>
    <option value="MY" label="Malaysia">Malaysia</option>
    <option value="MV" label="Maldives">Maldives</option>
    <option value="ML" label="Mali">Mali</option>
    <option value="MT" label="Malta">Malta</option>
    <option value="MH" label="Marshall Islands">Marshall Islands</option>
    <option value="MQ" label="Martinique">Martinique</option>
    <option value="MR" label="Mauritania">Mauritania</option>
    <option value="MU" label="Mauritius">Mauritius</option>
    <option value="YT" label="Mayotte">Mayotte</option>
    <option value="MX" label="Mexico">Mexico</option>
    <option value="FM" label="Micronesia, Federated States of">Micronesia, Federated States of</option>
    <option value="MD" label="Moldova, Republic of">Moldova, Republic of</option>
    <option value="MC" label="Monaco">Monaco</option>
    <option value="MN" label="Mongolia">Mongolia</option>
    <option value="ME" label="Montenegro">Montenegro</option>
    <option value="MS" label="Montserrat">Montserrat</option>
    <option value="MA" label="Morocco">Morocco</option>
    <option value="MZ" label="Mozambique">Mozambique</option>
    <option value="MM" label="Myanmar">Myanmar</option>
    <option value="NA" label="Namibia">Namibia</option>
    <option value="NR" label="Nauru">Nauru</option>
    <option value="NP" label="Nepal">Nepal</option>
    <option value="NL" label="Netherlands">Netherlands</option>
    <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
    <option value="NC" label="New Caledonia">New Caledonia</option>
    <option value="NZ" label="New Zealand">New Zealand</option>
    <option value="NI" label="Nicaragua">Nicaragua</option>
    <option value="NE" label="Niger">Niger</option>
    <option value="NG" label="Nigeria">Nigeria</option>
    <option value="NU" label="Niue">Niue</option>
    <option value="NF" label="Norfolk Island">Norfolk Island</option>
    <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="NO" label="Norway">Norway</option>
    <option value="OM" label="Oman">Oman</option>
    <option value="PK" label="Pakistan">Pakistan</option>
    <option value="PW" label="Palau">Palau</option>
    <option value="PS" label="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
    <option value="PA" label="Panama">Panama</option>
    <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
    <option value="PY" label="Paraguay">Paraguay</option>
    <option value="PE" label="Peru">Peru</option>
    <option value="PH" label="Philippines">Philippines</option>
    <option value="PN" label="Pitcairn">Pitcairn</option>
    <option value="PL" label="Poland">Poland</option>
    <option value="PT" label="Portugal">Portugal</option>
    <option value="PR" label="Puerto Rico">Puerto Rico</option>
    <option value="QA" label="Qatar">Qatar</option>
    <option value="RE" label="Reunion">Reunion</option>
    <option value="RO" label="Romania">Romania</option>
    <option value="RU" label="Russian Federation">Russian Federation</option>
    <option value="RW" label="Rwanda">Rwanda</option>
    <option value="SH" label="Saint Helena">Saint Helena</option>
    <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="LC" label="Saint Lucia">Saint Lucia</option>
    <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="VC" label="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
    <option value="WS" label="Samoa">Samoa</option>
    <option value="SM" label="San Marino">San Marino</option>
    <option value="ST" label="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
    <option value="SN" label="Senegal">Senegal</option>
    <option value="RS" label="Serbia">Serbia</option>
    <option value="SC" label="Seychelles">Seychelles</option>
    <option value="SL" label="Sierra Leone">Sierra Leone</option>
    <option value="SG" label="Singapore">Singapore</option>
    <option value="SK" label="Slovakia">Slovakia</option>
    <option value="SI" label="Slovenia">Slovenia</option>
    <option value="SB" label="Solomon Islands">Solomon Islands</option>
    <option value="SO" label="Somalia">Somalia</option>
    <option value="ZA" label="South Africa">South Africa</option>
    <option value="GS" label="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
    <option value="ES" label="Spain">Spain</option>
    <option value="LK" label="Sri Lanka">Sri Lanka</option>
    <option value="SD" label="Sudan">Sudan</option>
    <option value="SR" label="Suriname">Suriname</option>
    <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="SZ" label="Swaziland">Swaziland</option>
    <option value="SE" label="Sweden">Sweden</option>
    <option value="CH" label="Switzerland">Switzerland</option>
    <option value="SY" label="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="TW" label="Taiwan, Province of China">Taiwan, Province of China</option>
    <option value="TJ" label="Tajikistan">Tajikistan</option>
    <option value="TZ" label="Tanzania, United Republic of">Tanzania, United Republic of</option>
    <option value="TH" label="Thailand">Thailand</option>
    <option value="TL" label="Timor-leste">Timor-leste</option>
    <option value="TG" label="Togo">Togo</option>
    <option value="TK" label="Tokelau">Tokelau</option>
    <option value="TO" label="Tonga">Tonga</option>
    <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="TN" label="Tunisia">Tunisia</option>
    <option value="TR" label="Turkey">Turkey</option>
    <option value="TM" label="Turkmenistan">Turkmenistan</option>
    <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="TV" label="Tuvalu">Tuvalu</option>
    <option value="UG" label="Uganda">Uganda</option>
    <option value="UA" label="Ukraine">Ukraine</option>
    <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
    <option value="GB" label="United Kingdom">United Kingdom</option>
    <option value="US" label="United States">United States</option>
    <option value="UY" label="Uruguay">Uruguay</option>
    <option value="UZ" label="Uzbekistan">Uzbekistan</option>
    <option value="VU" label="Vanuatu">Vanuatu</option>
    <option value="VE" label="Venezuela">Venezuela</option>
    <option value="VN" label="Viet Nam">Viet Nam</option>
    <option value="VG" label="Virgin Islands, British">Virgin Islands, British</option>
    <option value="VI" label="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
    <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
    <option value="EH" label="Western Sahara">Western Sahara</option>
    <option value="YE" label="Yemen">Yemen</option>
    <option value="ZM" label="Zambia">Zambia</option>
    <option value="ZW" label="Zimbabwe">Zimbabwe</option>
  </select>
</td>
<td>
  <select name="customprovinceoforiginUSA" id="customprovinceoforiginUSA">
    <option value=""> -- Choose One --</option>
    <option value="AB" label="Alberta">Alberta</option>
    <option value="BC" label="British Columbia">British Columbia</option>
    <option value="MB" label="Manitoba">Manitoba</option>
    <option value="NB" label="New Brunswick">New Brunswick</option>
    <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
    <option value="NS" label="Nova Scotia">Nova Scotia</option>
    <option value="NT" label="Northwest Territories">Northwest Territories</option>
    <option value="NU" label="Nunavut">Nunavut</option>
    <option value="ON" label="Ontario">Ontario</option>
    <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
    <option value="QC" label="Québec">Québec</option>
    <option value="SK" label="Saskatchewan">Saskatchewan</option>
    <option value="YT" label="Yukon">Yukon</option>
  </select>
</td>
</table>
<br />
</div>
<br />
<div   class="ui-widget-content">
  <h2>Tracking Information</h2>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="costcenterUSA" id="label-costcenterUSA">costcenter</label>
      </td>
      <td>
        <label for="customerref1USA" id="label-customerref1USA">Cost customerref1</label>
      </td>
      <td>
        <label for="customerref2USA" id="label-customerref2">customerref2</label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="costcenterUSA" id="costcenterUSA" value="internRefInvoice"maxlength="35" />
      </td>
      <td>
        <input type="text" name="customerref1USA" id="customerref1USA" value="ref1" maxlength="30" />
      </td>
      <td>
        <input type="text" name="customerref2USA" id="customerref2USA" value="ref2" maxlength="35" />
      </td>
    </tr>
  </table>
  <br />
</div>
<br />
<div   class="ui-widget-content">
  <br />
  <h2>Electronic Delivery Updates</h2>
  <p>
                        This option allows you to request emails to be sent when your item is shipped, delivered, signature obtained or unforeseen delivery interruptions occur.
                        This option is available for services with delivery confirmation (barcoded) only.
                    </p>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="eNoticeEmailUSA" id="eNoticeEmailUSA">Email</label>
      </td>
      <td>
        <label for="eNoticeShipUSA" id="eNoticeShipUSA">Ship</label>
                                Email notification when the shipment order is created and the item is provided to Canada Post for delivery.

                            </td>
        <td>
          <label for="eNoticeExceptionUSA" id="eNoticeExceptionUSA">Exception</label>
                                Email notification when any unforeseen delivery interruptions occur.

                            </td>
          <td>
            <label for="eNoticeDeliveryUSA" id="eNoticeDeliveryUSA">Delivery</label>

                                Email notification when a Delivery Notice Card notifying the recipient to pick the item up at a local post office is delivered.

                            </td>
          </tr>
          <tr>
            <td>
              <input type="text" name="eNoticeEmailUSA" id="eNoticeEmailUSA" value="admin@fabsandbox.com" maxlength="60" />
            </td>
            <td>
              <input type="hidden" name="eNoticeShipUSA" value="false" />
              <input type="checkbox" name="eNoticeShipUSA" id="eNoticeShipUSA" value="true" checked="checked" />
            </td>
            <td>
              <input type="hidden" name="eNoticeExceptionUSA" value="false" />
              <input type="checkbox" name="eNoticeExceptionUSA" id="eNoticeExceptionUSA" value="true" checked="checked" />
            </td>
            <td>
              <input type="hidden" name="eNoticeDeliveryUSA" value="false" />
              <input type="checkbox" name="eNoticeDeliveryUSA" id="eNoticeDeliveryUSA" value="true" checked="checked" />
            </td>
          </tr>
        </table>
        <br />
      </div>
      <br />
      <center>
        <input class="button button-small" type="submit" id="submitButton" name="submitButton" value="Create Shipment" />
      </center>
    </form>
    <center>
      <a href='/../'>
        <button>Go to main Screen</button>
      </a>
    </center>
  </div>
  <!--fORM usa end -->
  <!-----INTERNATINAL SECTION FORM ------------->
  <div id="tabs-3">
    <form id="CreateShipmentIntl" action="CreateShipmentIntl.php" method="POST">
      <div  class="ui-widget-content">
          <br />
      <p>This is a unique request id for tracking purpuses.</p>
      <br />
      <table class="TableStyle">
        <tr>
          <td>
            <label for="labelcustreqIntl">customer request ID</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="custreqIntl" id="custreqIntl" readOnly="true" maxlength="30" />
          </td>
        </tr>
      </table>
      <br />  

        <p>If your shipments are picked up by Canada Post or a third party please select YES. If you are going to deposit select NO.

</p>
        <br />
        <table class="TableStyle">
          <tr>
            <td>
              <label>Pickup?<font color="red">
                <b> * </b>
              </font>
            </td>
          </tr>
          <tr>
            <td>
              <label for="pickupquestionIntl">
                <input class="pickupyesIntl" type="radio" id="pickupquestionIntl" name="pickupquestionIntl" value="yes" onClick="document.getElementById('groupIdIntl').value='PICKUP'" />Yes</label>
                <label>
                  <input class="pickupnoIntl" type="radio" id="pickupquestionIntl" name="pickupquestionIntl" value="no" onClick="document.getElementById('groupIdIntl').value='DEPOSIT'" />No</label>
                </td>
              </tr>
            </table>
            <br />
            <div id="shippingpointsectionIntl" style="display:none">
              <p>Provide the Postal Code of your pickup location.</p>
              <table class="TableSTyle">
                <tr>
                  <td>
                    <label for="shippingPointIntl" class="control-label">Shipping Point<font color="red">
                      <b> * </b>
                    </font>
                  </label>
                  <input type="text" name="shippingPointIntl" id="shippingPointIntl" maxlength="6" value="K2K0B1" onblur="UpperCasePostalContractShippingIntl()" />
                </td>
              </tr>
            </table>
          </div>
          <div id="pickupsectionIntl">
            <br />
            <p>Looks like your going to deposit instead of pickups please ensure to identify the deposit location by identifying the Post Office ID below. If you have no clue what the Post Office ID is then follow the hyperlink, then copy/paste the post office id into the field below.</p>
            <table class="TableStyle">
              <tr>
                <td>
                                    Click here to <a href='http://www.canadapost.ca/cpotools/apps/fdl/business/findDepositLocation' target='_blank'>Find a Deposit Location</a>
              </td>
            </tr>
            <tr>
              <td>
                <label for="postofficeidIntl" class="control-label">Post Office ID<font color="red">
                  <b> * </b>
                </font>
              </label>
            </td>
          </tr>
          <td>
            <input type="text" name="postofficeidIntl" id="postofficeidIntl" value="3057" maxlength="10" />
          </td>
        </tr>
      </table>
      <br /><br />
    </div>
<!-- display div if Agreement is set in session otherwise hide it. -->

<div id="agreement" <?php if (empty($agreement)){ echo 'style="display:none;"'; } ?>>

    <P>If you are planning on shipping over 50 shipments per day then you should opt to include in Manifest. Failure to comply may result in having your shipments refused by Canada Post. Canada Post requires a manifest for every pickup over 50 shipments, the manifest must be given to the Canada Post representative. If you are not familiar with the Manifest please have a look at our handy <a href="http://www.fabsandbox.com/tutorials">video tutorials section.</a>
  </P>
  <table class="TableStyle">
    <tr>
      <td>
                                Include Shipment in Manifest? <font color="red">
        <b> * </b>
      </font>
    </td>
  </tr>
  <tr>
    <td>
    <label for="manifestquestionIntl">
    <select name="manifestquestionIntl" id="manifestquestionIntl">
      <option disabled selected value> -- select an option -- </option>
      <option value="yes" label="YES">YES</option>
      <option value="no" label="NO"> NO</option>
    </select>
        </td>
      </tr>
    </table>
    <div id="GroupIdSectionIntl" style="display:none">
      <p> Its important to understand that if you opted to include shipments to a manifest and transmit at a later time that you will require printing also and provide hardcopy. This field is disabled and will be autopopulated when you select Pickup or Deposit.</p>
      <table class="TableStyle">
        <tr>
          <td>
            <label for="groupIdIntl">Group ID<font color="red">
              <b> * </b>
            </font>
          </label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" class="groupIdIntl" name="groupIdIntl" id="groupIdIntl" maxlength="32" readOnly="true" />
        </td>
      </tr>
    </table>
  </div>
  <br />
</div>

<div>
  <p>Promotional discount code. Note that a promotion code is only valid for a certain period and product. Your entry will be converted to uppercase (i.e, you can use lowercase or a mix of lower or upper case and will get the same result).</p>
  <table class="TableStyle">
    <tr>
      <td>
        <label for="promocodeIntl">Promo Code
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" class="promocodeIntl" name="promocodeIntl" id="promocodeIntl" maxlength="32" />
    </td>
  </tr>
</table>
<br />
</div>
<br />




<!-- here -->
<div>
    <p>
      This is an optional element, used to request the QR code image of the public label in base64 format, along with contains public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo.
          Note: Only applicable to 8 1/2 X 11 paper encoded in pdf  
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="QrCodeIntl">Do you want to generate a QR Code?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="QrCodeIntl" id="QrCodeIntl">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />

<br />
<br />

  </div>
  
  
  
  
  
  
     <!-- script to popup the public key text input when QR Code is YES-->
    <script>
                                $(document).ready(function(){
    $('#QrCodeIntl').on('change', function() {
      if ( this.value == 'true')
      {
        $("#publickeyIntl").show();
      }
      else
      {
        $("#publickeyIntl").hide();
      }
    });
});

</script>

 <div style='display:none;' id='publickeyIntl' float: right>
         <p>
            This is an optional element, used to request the public key label URL, and expiry date.If true, two new links are provided: publicLabel and publicKeyInfo

                Note: Only applicable to 8 1/2 X 11 paper encoded in pdf
    </p>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="publickeyIntl">Do you Want to receive a public key label URL?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="publickeyIntl" id="publickeyIntl">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
    </div>
<br />


<!-- here -->




</div>
<br />











<div   class="ui-widget-content">
  <table class="TableStyle">
    <tr>
      <td>
        <label for="mailedByIntl"> Mailed By <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="mailedOnBehalfOfIntl">Mailed on Behalf of <font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="paidByIntl">Paid By <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="agreementIntl">Contract<font color="red">
    <b> * </b>
  </font>
</label>
</td>
<td>
  <label for="methodOfPaymentIntl">Method of Payment<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
  <input type="text" name="mailedByIntl" id="label-mailedByIntl" value="<?php echo ($_SESSION['clientinfo']['MailedBy']) ?>" maxlength="10" readOnly="true"/>
</td>
  <td>
  <input type="text" name="mailedOnBehalfOfIntl" id="label-mailedOnBehalfOfIntl" value="<?php echo ($_SESSION['clientinfo']['MailedBy']) ?>" maxlength="10" readOnly="true"/>
</td>
  <td>
  <input type="text" name="paidbycustomerIntl" id="label-paidbycustomerIntl" value="<?php echo ($_SESSION['clientinfo']['PaidBy']) ?>" maxlength="10" readOnly="true"/>
</td>
  <td>
  <input type="text" name="agreementIntl" id="label-agreementIntl" value="<?php echo ($_SESSION['clientinfo']['Agreement']) ?>" maxlength="10" readOnly="true"/>
</td>
<td>
    <!-- script to popup the want a receipt whem credit card is picked-->
    <script>
                                $(document).ready(function(){
    $('#methodOfPaymentIntl').on('change', function() {
      if ( this.value == 'CreditCard')
      {
        $("#GetReceiptIntl").show();
      }
      else
      {
        $("#GetReceiptIntl").hide();
      }
    });
});
</script>


    <select name="methodOfPaymentIntl" id="methodOfPaymentIntl">
      <option value="CreditCard" label="CreditCard">creditCard</option>
      <option selected value="Account" label="Account">Account</option>
      <option value="SupplierAccount" label="SupplierAccount">Supplier Account</option>
    </select>
  </td>
</tr>
</table>
<br />


<div style="display: flex; justify-content: space-around float: right">
  <div id='pricingdivIntl' style='display:none'>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="GetPricingIntl">Do you want pricing returned in the answer?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetPricingIntl" id="GetPricingIntl">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>

 <div style='display:none;' id='GetReceiptIntl' float: right>
    <table class="TableStyle">
      <tr>
        <td>
          <label for="receipt">Do you Want a Receipt?</label>
        </td>
      </tr>
      <tr>
        <td>
          <center>
            <select name="GetReceiptIntl" id="GetReceiptIntl">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
          </center>
        </td>
      </tr>
    </table>
<br />
<br />
<br />
  </div>
</div>
</div>


  <br />
  <div  class="ui-widget-content">
    <H2> Continuous Inbound Freight</H2>
    <P>
                    If you have shipments that originate outside of Canada, but are being delivered directly to a Canada Post plant, use this element to identify these shipments as continuous inbound freight (CIF). This option allows you to be eligible for Canadian sales tax exemptions. 
                    You will need to provide Canada Post with documentation that shows proof of origin, such as a Canadian customs document or bill of lading.
                    </p>
    <table class="TableStyle">
      <tr>
        <td>
            <select name="CIFIntl" id="CIFIntl">
              <option value="false" label="No">No</option>
              <option value="true" label="Yes">Yes</option>
            </select>
        </td>
      </tr>
    </table>
    <br />
  </div>
  <br />





<br /><br />
<div   class="ui-widget-content">
  <br />
  <p>shipments are priced as per the current shipment date and are re-priced at time of transmit if transmitted at a later date.</p>
  <table class="TableSTyle">
    <tr>
      <td>
        <label>Expected Mailing Date: </label>
        <input id="datepicker3" type="text" name="mailingdateIntl" />
        <br /><br />
      </td>
    </tr>
  </table>
  <br />
</div>
<br /><br /><br />
<div  class="ui-widget-content">
  <h2>Sender Information</h2>
  <br />
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="senderCompanyIntl" id="senderCompanyIntl">Company <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="senderphoneIntl" id="senderphoneIntl">Contact Phone <font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
    <label for="contactNameIntl" id="contactNameIntl">Contact Name</label>
  </td>
</tr>
<tr>
  <td>
    <input type="text" name="senderCompanyIntl" id="senderCompanyIntl" value="company" maxlength="44" />
  </td>
  <td>
    <input type="text" name="senderphoneIntl" id="senderphoneIntl" value="1234567890" maxlength="44" />
  </td>
  <td>
    <input type="text" name="contactNameIntl" id="contactNameIntl" maxlength="44" />
  </td>
</tr>
</table>
<br /><br />
<table class="TableStyle">
  <tr>
    <td>
      <label for="customerAddressLine1Intl">Address (Line 1)<font color="red">
        <b> * </b>
      </font>
    </label>
  </td>
  <td>
                                Address (Line 2)
                            </td>
  <td>
    <label for="customerCityIntl">City<font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="provstateIntl">Province<font color="red">
    <b> * </b>
  </font>
</label>
</td>
<td>
  <label for="customerPostalCodeIntl">Postal Code<font color="red">
    <b> * </b>
  </font>
</label>
</td>
</tr>
<tr>
  <td>
    <input type="text" name="customerAddressLine1Intl" id="customerAddressLine1Intl" value="123 test" maxlength="44" />
  </td>
  <td>
    <input type="text" name="customerAddressLine2Intl" id="customerAddressLine2Intl" maxlength="44" />
  </td>
  <td>
    <input type="text" name="customerCityIntl" id="customerCityIntl" value="city" maxlength="40" />
  </td>
  <td>
    <select name="senderProvinceIntl" id="senderProvinceIntl">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AB" label="Alberta">Alberta</option>
      <option value="BC" label="British Columbia">British Columbia</option>
      <option value="MB" label="Manitoba">Manitoba</option>
      <option value="NB" label="New Brunswick">New Brunswick</option>
      <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
      <option value="NS" label="Nova Scotia">Nova Scotia</option>
      <option value="NT" label="Northwest Territories">Northwest Territories</option>
      <option value="NU" label="Nunavut">Nunavut</option>
      <option value="ON" label="Ontario" selected >Ontario</option>
      <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
      <option value="QC" label="Québec">Québec</option>
      <option value="SK" label="Saskatchewan">Saskatchewan</option>
      <option value="YT" label="Yukon">Yukon</option>
    </select>
  </td>
  <td>
    <input type="text" name="customerPostalCodeIntl" id="customerPostalCodeIntl" value="K2K0B1" maxlength="6" onblur="UpperCasePostalContractShippingIntl()" />
  </td>
</tr>
</table>
<br />
</div>
<br />
<div  class="ui-widget-content">
  <br />
  <h2>Recipient Information</h2>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="recipientCompanyIntl" id="recipientCompanyIntl">Company</label>
      </td>
      <td>
        <label for="recipientNameIntl" id="recipientNameIntl">Name</label>
      </td>
      <td>
        <label for="additionalAddressInfoIntl" id="additionalAddressInfoIntl">Additional Address Info</label>
      </td>
      <td>
        <label for="recipientphoneIntl" id="recipientphoneIntl">Contact Phone </label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="recipientCompanyIntl" id="recipientCompanyIntl" value="company" maxlength="44" />
      </td>
      <td>
        <input type="text" name="recipientNameIntl" id="recipientNameIntl" value="recipientname" maxlength="44" />
      </td>
      <td>
        <input type="text" name="additionalAddressInfoIntl" id="additionalAddressInfoIntl" value="addinfo" maxlength="44" />
      </td>
      <td>
        <input type="text" name="recipientphoneIntl" id="recipientphoneIntl" value="1111112212" maxlength="44" />
      </td>
    </tr>
  </table>
  <br />
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="recipientAddressLine1Intl" id="recipientAddressLine1Intl">Address (Line 1) <span>*</span>
      </label>
    </td>
    <td>
      <label for="recipientAddressLine2Intl" id="recipientAddressLine2Intl">Address (Line 2)</label>
    </td>
    <td>
      <label for="recipientCityIntl" id="recipientCityIntl">City <span>*</span>
    </label>
  </td>
  <td>
    <label for="recipientStateIntl" id="recipientStateIntl">prov/state <span>*</span>
  </label>
</td>
</tr>
<td>
  <input type="text" name="recipientAddressLine1Intl" id="recipientAddressLine1Intl" value="add1" maxlength="44" />
</td>
<td>
  <input type="text" name="recipientAddressLine2Intl" id="recipientAddressLine2Intl" value="add2" maxlength="44" />
</td>
<td>
  <input type="text" name="recipientCityIntl" id="recipientCityIntl" value="city" maxlength="44" />
</td>
<td>
  <input type="text" name="recipientStateIntl" id="recipientStateIntl" value="provstateIntl" maxlength="44" />
</td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="zipIntl" id="zipIntl">postcode<span>*</span>
    </label>
  </td>
  <td>
    <label for="recipientCountrytIntl" id="label-recipientCountrytIntl">Recipient Country</label>
  </td>
</tr>
<tr>
  <td>
    <input type="text" name="zipIntl" value="90210"id="zipIntl" />
  </td>
  <td>
    <select name="recipientCountrytIntl" id="recipientCountrytIntl">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AF" label="Afghanistan">Afghanistan</option>
      <option value="AX" label="Åland Islands">Åland Islands</option>
      <option value="AL" label="Albania">Albania</option>
      <option value="DZ" label="Algeria">Algeria</option>
      <option value="AS" label="American Samoa">American Samoa</option>
      <option value="AD" label="Andorra" selected="selected">Andorra</option>
      <option value="AO" label="Angola">Angola</option>
      <option value="AI" label="Anguilla">Anguilla</option>
      <option value="AQ" label="Antarctica">Antarctica</option>
      <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
      <option value="AR" label="Argentina">Argentina</option>
      <option value="AM" label="Armenia">Armenia</option>
      <option value="AW" label="Aruba">Aruba</option>
      <option value="AU" label="Australia">Australia</option>
      <option value="AT" label="Austria">Austria</option>
      <option value="AZ" label="Azerbaijan">Azerbaijan</option>
      <option value="BS" label="Bahamas">Bahamas</option>
      <option value="BH" label="Bahrain">Bahrain</option>
      <option value="BD" label="Bangladesh">Bangladesh</option>
      <option value="BB" label="Barbados">Barbados</option>
      <option value="BY" label="Belarus">Belarus</option>
      <option value="BE" label="Belgium">Belgium</option>
      <option value="BZ" label="Belize">Belize</option>
      <option value="BJ" label="Benin">Benin</option>
      <option value="BM" label="Bermuda">Bermuda</option>
      <option value="BT" label="Bhutan">Bhutan</option>
      <option value="BO" label="Bolivia">Bolivia</option>
      <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
      <option value="BW" label="Botswana">Botswana</option>
      <option value="BV" label="Bouvet Island">Bouvet Island</option>
      <option value="BR" label="Brazil">Brazil</option>
      <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
      <option value="BN" label="Brunei Darussalam">Brunei Darussalam</option>
      <option value="BG" label="Bulgaria">Bulgaria</option>
      <option value="BF" label="Burkina Faso">Burkina Faso</option>
      <option value="BI" label="Burundi">Burundi</option>
      <option value="KH" label="Cambodia">Cambodia</option>
      <option value="CM" label="Cameroon">Cameroon</option>
      <option value="CA" label="Canada">Canada</option>
      <option value="CV" label="Cape Verde">Cape Verde</option>
      <option value="KY" label="Cayman Islands">Cayman Islands</option>
      <option value="CF" label="Central African Republic">Central African Republic</option>
      <option value="TD" label="Chad">Chad</option>
      <option value="CL" label="Chile">Chile</option>
      <option value="CN" label="China">China</option>
      <option value="CX" label="Christmas Island">Christmas Island</option>
      <option value="CC" label="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
      <option value="CO" label="Colombia">Colombia</option>
      <option value="KM" label="Comoros">Comoros</option>
      <option value="CG" label="Congo">Congo</option>
      <option value="CD" label="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
      <option value="CK" label="Cook Islands">Cook Islands</option>
      <option value="CR" label="Costa Rica">Costa Rica</option>
      <option value="CI" label="Cote D'ivoire">Cote D'ivoire</option>
      <option value="HR" label="Croatia">Croatia</option>
      <option value="CU" label="Cuba">Cuba</option>
      <option value="CY" label="Cyprus">Cyprus</option>
      <option value="CZ" label="Czech Republic">Czech Republic</option>
      <option value="DK" label="Denmark">Denmark</option>
      <option value="DJ" label="Djibouti">Djibouti</option>
      <option value="DM" label="Dominica">Dominica</option>
      <option value="DO" label="Dominican Republic">Dominican Republic</option>
      <option value="EC" label="Ecuador">Ecuador</option>
      <option value="EG" label="Egypt">Egypt</option>
      <option value="SV" label="El Salvador">El Salvador</option>
      <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
      <option value="ER" label="Eritrea">Eritrea</option>
      <option value="EE" label="Estonia">Estonia</option>
      <option value="ET" label="Ethiopia">Ethiopia</option>
      <option value="FK" label="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
      <option value="FO" label="Faroe Islands">Faroe Islands</option>
      <option value="FJ" label="Fiji">Fiji</option>
      <option value="FI" label="Finland">Finland</option>
      <option value="FR" label="France">France</option>
      <option value="GF" label="French Guiana">French Guiana</option>
      <option value="PF" label="French Polynesia">French Polynesia</option>
      <option value="TF" label="French Southern Territories">French Southern Territories</option>
      <option value="GA" label="Gabon">Gabon</option>
      <option value="GM" label="Gambia">Gambia</option>
      <option value="GE" label="Georgia">Georgia</option>
      <option value="DE" label="Germany">Germany</option>
      <option value="GH" label="Ghana">Ghana</option>
      <option value="GI" label="Gibraltar">Gibraltar</option>
      <option value="GR" label="Greece">Greece</option>
      <option value="GL" label="Greenland">Greenland</option>
      <option value="GD" label="Grenada">Grenada</option>
      <option value="GP" label="Guadeloupe">Guadeloupe</option>
      <option value="GU" label="Guam">Guam</option>
      <option value="GT" label="Guatemala">Guatemala</option>
      <option value="GG" label="Guernsey">Guernsey</option>
      <option value="GN" label="Guinea">Guinea</option>
      <option value="GW" label="Guinea-bissau">Guinea-bissau</option>
      <option value="GY" label="Guyana">Guyana</option>
      <option value="HT" label="Haiti">Haiti</option>
      <option value="HM" label="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
      <option value="VA" label="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
      <option value="HN" label="Honduras">Honduras</option>
      <option value="HK" label="Hong Kong">Hong Kong</option>
      <option value="HU" label="Hungary">Hungary</option>
      <option value="IS" label="Iceland">Iceland</option>
      <option value="IN" label="India">India</option>
      <option value="ID" label="Indonesia">Indonesia</option>
      <option value="IR" label="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
      <option value="IQ" label="Iraq">Iraq</option>
      <option value="IE" label="Ireland">Ireland</option>
      <option value="IM" label="Isle of Man">Isle of Man</option>
      <option value="IL" label="Israel">Israel</option>
      <option value="IT" label="Italy">Italy</option>
      <option value="JM" label="Jamaica">Jamaica</option>
      <option value="JP" label="Japan">Japan</option>
      <option value="JE" label="Jersey">Jersey</option>
      <option value="JO" label="Jordan">Jordan</option>
      <option value="KZ" label="Kazakhstan">Kazakhstan</option>
      <option value="KE" label="Kenya">Kenya</option>
      <option value="KI" label="Kiribati">Kiribati</option>
      <option value="KP" label="Korea, Democratic People\s Republic of">Korea, Democratic People\s Republic of</option>
      <option value="KR" label="Korea, Republic of">Korea, Republic of</option>
      <option value="KW" label="Kuwait">Kuwait</option>
      <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
      <option value="LA" label="Lao People\s Democratic Republic">Lao People\s Democratic Republic</option>
      <option value="LV" label="Latvia">Latvia</option>
      <option value="LB" label="Lebanon">Lebanon</option>
      <option value="LS" label="Lesotho">Lesotho</option>
      <option value="LR" label="Liberia">Liberia</option>
      <option value="LY" label="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
      <option value="LI" label="Liechtenstein">Liechtenstein</option>
      <option value="LT" label="Lithuania">Lithuania</option>
      <option value="LU" label="Luxembourg">Luxembourg</option>
      <option value="MO" label="Macao">Macao</option>
      <option value="MK" label="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
      <option value="MG" label="Madagascar">Madagascar</option>
      <option value="MW" label="Malawi">Malawi</option>
      <option value="MY" label="Malaysia">Malaysia</option>
      <option value="MV" label="Maldives">Maldives</option>
      <option value="ML" label="Mali">Mali</option>
      <option value="MT" label="Malta">Malta</option>
      <option value="MH" label="Marshall Islands">Marshall Islands</option>
      <option value="MQ" label="Martinique">Martinique</option>
      <option value="MR" label="Mauritania">Mauritania</option>
      <option value="MU" label="Mauritius">Mauritius</option>
      <option value="YT" label="Mayotte">Mayotte</option>
      <option value="MX" label="Mexico">Mexico</option>
      <option value="FM" label="Micronesia, Federated States of">Micronesia, Federated States of</option>
      <option value="MD" label="Moldova, Republic of">Moldova, Republic of</option>
      <option value="MC" label="Monaco">Monaco</option>
      <option value="MN" label="Mongolia">Mongolia</option>
      <option value="ME" label="Montenegro">Montenegro</option>
      <option value="MS" label="Montserrat">Montserrat</option>
      <option value="MA" label="Morocco">Morocco</option>
      <option value="MZ" label="Mozambique">Mozambique</option>
      <option value="MM" label="Myanmar">Myanmar</option>
      <option value="NA" label="Namibia">Namibia</option>
      <option value="NR" label="Nauru">Nauru</option>
      <option value="NP" label="Nepal">Nepal</option>
      <option value="NL" label="Netherlands">Netherlands</option>
      <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
      <option value="NC" label="New Caledonia">New Caledonia</option>
      <option value="NZ" label="New Zealand">New Zealand</option>
      <option value="NI" label="Nicaragua">Nicaragua</option>
      <option value="NE" label="Niger">Niger</option>
      <option value="NG" label="Nigeria">Nigeria</option>
      <option value="NU" label="Niue">Niue</option>
      <option value="NF" label="Norfolk Island">Norfolk Island</option>
      <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
      <option value="NO" label="Norway">Norway</option>
      <option value="OM" label="Oman">Oman</option>
      <option value="PK" label="Pakistan">Pakistan</option>
      <option value="PW" label="Palau">Palau</option>
      <option value="PS" label="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
      <option value="PA" label="Panama">Panama</option>
      <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
      <option value="PY" label="Paraguay">Paraguay</option>
      <option value="PE" label="Peru">Peru</option>
      <option value="PH" label="Philippines">Philippines</option>
      <option value="PN" label="Pitcairn">Pitcairn</option>
      <option value="PL" label="Poland">Poland</option>
      <option value="PT" label="Portugal">Portugal</option>
      <option value="PR" label="Puerto Rico">Puerto Rico</option>
      <option value="QA" label="Qatar">Qatar</option>
      <option value="RE" label="Reunion">Reunion</option>
      <option value="RO" label="Romania">Romania</option>
      <option value="RU" label="Russian Federation">Russian Federation</option>
      <option value="RW" label="Rwanda">Rwanda</option>
      <option value="SH" label="Saint Helena">Saint Helena</option>
      <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
      <option value="LC" label="Saint Lucia">Saint Lucia</option>
      <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
      <option value="VC" label="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
      <option value="WS" label="Samoa">Samoa</option>
      <option value="SM" label="San Marino">San Marino</option>
      <option value="ST" label="Sao Tome and Principe">Sao Tome and Principe</option>
      <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
      <option value="SN" label="Senegal">Senegal</option>
      <option value="RS" label="Serbia">Serbia</option>
      <option value="SC" label="Seychelles">Seychelles</option>
      <option value="SL" label="Sierra Leone">Sierra Leone</option>
      <option value="SG" label="Singapore">Singapore</option>
      <option value="SK" label="Slovakia">Slovakia</option>
      <option value="SI" label="Slovenia">Slovenia</option>
      <option value="SB" label="Solomon Islands">Solomon Islands</option>
      <option value="SO" label="Somalia">Somalia</option>
      <option value="ZA" label="South Africa">South Africa</option>
      <option value="GS" label="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
      <option value="ES" label="Spain">Spain</option>
      <option value="LK" label="Sri Lanka">Sri Lanka</option>
      <option value="SD" label="Sudan">Sudan</option>
      <option value="SR" label="Suriname">Suriname</option>
      <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
      <option value="SZ" label="Swaziland">Swaziland</option>
      <option value="SE" label="Sweden">Sweden</option>
      <option value="CH" label="Switzerland">Switzerland</option>
      <option value="SY" label="Syrian Arab Republic">Syrian Arab Republic</option>
      <option value="TW" label="Taiwan, Province of China">Taiwan, Province of China</option>
      <option value="TJ" label="Tajikistan">Tajikistan</option>
      <option value="TZ" label="Tanzania, United Republic of">Tanzania, United Republic of</option>
      <option value="TH" label="Thailand">Thailand</option>
      <option value="TL" label="Timor-leste">Timor-leste</option>
      <option value="TG" label="Togo">Togo</option>
      <option value="TK" label="Tokelau">Tokelau</option>
      <option value="TO" label="Tonga">Tonga</option>
      <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
      <option value="TN" label="Tunisia">Tunisia</option>
      <option value="TR" label="Turkey">Turkey</option>
      <option value="TM" label="Turkmenistan">Turkmenistan</option>
      <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
      <option value="TV" label="Tuvalu">Tuvalu</option>
      <option value="UG" label="Uganda">Uganda</option>
      <option value="UA" label="Ukraine">Ukraine</option>
      <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
      <option value="GB" label="United Kingdom">United Kingdom</option>
      <option value="US" label="United States">United States</option>
      <option value="UY" label="Uruguay">Uruguay</option>
      <option value="UZ" label="Uzbekistan">Uzbekistan</option>
      <option value="VU" label="Vanuatu">Vanuatu</option>
      <option value="VE" label="Venezuela">Venezuela</option>
      <option value="VN" label="Viet Nam">Viet Nam</option>
      <option value="VG" label="Virgin Islands, British">Virgin Islands, British</option>
      <option value="VI" label="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
      <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
      <option value="EH" label="Western Sahara">Western Sahara</option>
      <option value="YE" label="Yemen">Yemen</option>
      <option value="ZM" label="Zambia">Zambia</option>
      <option value="ZW" label="Zimbabwe">Zimbabwe</option>
    </select>
  </td>
</tr>
</table>
<br />
</div>
<br />
<div id="quotescontainer"  class="ui-widget-content">
  <h2>Shipment Information</h2>
  <br />
  <div id="quotescontainer" style="width: 300px;">
    <table class="TableSTyle">
      <tr>
        <td>
          <label for="serviceTypeIntl">Service Type <span>
            <font color="red">*</font>
          </span>
        </label>
      </td>
    </tr>
    <tr>
      <td>
        <select name="serviceTypeIntl" id="serviceTypeIntl" onChange="setChkSelectIntl();">
          <option value="" label=" -- Choose One --"> -- Choose One --</option>
          <option value="INT.IP.AIR" label="International Parcel Air">International Parcel Air</option>
          <option value="INT.IP.SURF" label="International Parcel Surface">International Parcel Surface</option>
          <option value="INT.PW.ENV" label="Priority Worldwide Envelope Int'l">Priority Worldwide Envelope Int'l</option>
          <option value="INT.PW.PAK" label="Priority Worldwide pak Int'l">Priority Worldwide pak Int'l</option>
          <option value="INT.PW.PARCEL" label="Priority Worldwide parcel Int'l">Priority Worldwide parcel Int'l</option>
          <option value="INT.SP.AIR" label="Small Packet International Air">Small Packet International Air</option>
          <option value="INT.SP.SURF" label="Small Packet International Surface">Small Packet International Surface</option>
          <option value="INT.TP" label="Tracked Packet International">Tracked Packet – International</option>
          <option value="INT.XP" label="Xpresspost International">Xpresspost International</option>
        </select>
      </td>
    </tr>
  </table>
  <br />
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="weightIntl">weight (kg)<span>
          <font color="red">*</font>
        </span>
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" name="weightIntl" id="weightIntl" />
    </td>
  </tr>
</table>
</div>
<div id="quotescontainercenter">
  <table class="TableSTyle">
    <tr>
      <td>
        <label>Include dimension? <span>*</span>
      </label>
    </td>
  </tr>
  <tr>
    <td>
      <label>
        <input class="dimensionnoIntl" type="radio" name="dimensionIntl" value="no"  />No</label>
        <label>
          <input class="dimensionyesIntl" type="radio" name="dimensionIntl" value="yes" checked="checked" />Yes</label>
        </td>
      </tr>
    </table>
    <br />
    <div id="dimensionIntl">
      <table class="TableSTyle">
        <tr>
          <td>
            <label for="lengthIntl">Length:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
          <td>
            <label for="widthIntl">Width:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
          <td>
            <label for="heightIntl">Height:</label>
            <font color="red">
              <b> * </b>
            </font>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="lengthIntl" id="lengthIntl" onblur="CheckGirth()" />
          </td>
          <td>
            <input type="text" name="widthIntl" id="widthIntl" onblur="CheckGirth()" />
          </td>
          <td>
            <input type="text" name="heightIntl" id="heightIntl" onblur="CheckGirth(); VolumetricWeightIntl()" />
          </td>
        </tr>
      </table>
    </div>
    <br />
  </div>
  <div id="quotescontainerright" style="margin-left:180px;">
    <table class="TableSTyle">
      <tr>
        <td>
          <label>Shipping Options</label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="checkbox" name="optionfake" value="DC" disabled="disabled" checked /> Delivery Confirmation
                                    <input type="hidden" name="optionDC" value="DC" checked />
        </td>
      </tr>
      <tr>
        <td>
          <label for="optionSOIntl">
            <input type="checkbox" class="optionSOIntl" id="optionSOIntl" name="optionSOIntl" value="SO" />Signature On Delivery?</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="unpackagedIntl" id="unpackagedIntl" value="true" />
            <label for="unpackagedIntl">unpackaged</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="oversizedIntl" id="oversizedIntl" value="true" />
            <label for="oversizedIntl">oversized</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="mailingtubeIntl" id="mailingtubeIntl" value="true" />
            <label for="malingtubeIntl">mailingtube</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="optionCOVIntl" value="COV" /> Insurance 
                                    <input align="right" type="text" name="COVamountIntl" maxlength="9" />
          </td>
        </tr>
      </table>
      <br />
      <table class="TableSTyle">
        <tr>
          <td>
            <label> Non Delivery Options</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="raseIntl" id="raseIntl" value="RASE" />
            <label for="raseIntl">return At Sender Expense</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="rtsIntl" id="rtsIntl" value="RTS" />
            <label for="rtsIntl">return To Sender</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="abanIntl" id="abanIntl" value="ABAN" />
            <label for="abanIntl">Abandon</label>
          </td>
        </tr>
      </table>
      <br />
    </div>
    <br />
  </div>
  <br />
  <div  class="ui-widget-content">
    <h3>Print Preferences</h3>
    <table class="TableSTyle">
      <tr>
        <td>
          <label for="outputFormatIntl" id="outputFormatIntl">Output Format <span>*</span>
        </label>
      </td>
      <td>
        <label for="showPackingInstructionsIntl" id="label-showPackingInstructionsIntl">Show Packing Instructions <span>*</span>
      </label>
    </td>
    <td>
      <label for="showPostageRateIntl" id="showPostageRateIntl">Show Postage Rate <span>*</span>
    </label>
  </td>
  <td>
    <label for="showInsuredValueIntl" id="showInsuredValueIntl">Show Insured Value <span>*</span>
  </label>
</td>
</tr>
<tr>
  <td>
    <select name="outputFormatIntl" id="outputFormatIntl">
      <option value="8.5x11" label="8.5x11" selected="selected">8.5x11</option>
      <option value="4x6" label="4x6">4x6</option>
    </select>
  </td>
  <td>
    <select name="showPackingInstructionsIntl" id="showPackingInstructionsIntl">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
  <td>
    <select name="showPostageRateIntl" id="showPostageRateIntl">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
  <td>
    <select name="showInsuredValueIntl" id="showInsuredValueIntl">
      <option value="false" label="No" selected="selected">No</option>
      <option value="true" label="Yes">Yes</option>
    </select>
  </td>
</tr>
</table>
<br />
</div>
<br />
<div   class="ui-widget-content">
  <h2>Customs Information</h2>
  <h3>Item List</h3>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="customsCurrencyIntl" id="label-customsCurrency">Currency <font color="red">
          <b> * </b>
        </font>
      </label>
    </td>
    <td>
      <label for="customsConversionFromCadIntl" id="label-customsConversionFromCadIntl">Exchange Rate to Canadian Currency <span>*</span>
    </label>
  </td>
  <td>
    <label for="customsReasonForExportIntl" id="label-customsReasonForExportIntl">Reason For Export <font color="red">
      <b> * </b>
    </font>
  </label>
</td>
<td>
  <label for="otherreasonIntl" id="label-customsOtherReasonIntl">Other Reason <span>*</span>
</label>
</td>
</tr>
<tr>
  <td>
    <select name="customsCurrencyIntl" id="customsCurrencyIntl">
      <option value="CAD" label="Canada Dollar" selected="selected">Canada Dollar</option>
      <option value="USD" label="United States Dollar">United States Dollar</option>
      <option value="AED" label="United Arab Emirates Dirham">United Arab Emirates Dirham</option>
      <option value="AFN" label="Afghanistan Afghani">Afghanistan Afghani</option>
    </select>
  </td>
  <td>
    <input type="text" name="customsConversionFromCadIntl" id="customsConversionFromCadIntl" />
  </td>
  <td>
    <select name="customsReasonForExportIntl" id="customsReasonForExportIntl">
      <option value="GIF" label="Gift">Gift</option>
      <option value="DOC" label="Document">Document</option>
      <option value="SAM" label="Commercial Sample">Commercial Sample</option>
      <option value="REP" label="Repair or Warranty">Repair or Warranty</option>
      <option value="SOG" label="Sale of Goods">Sale of Goods</option>
      <option value="OTH" label="Other" selected="selected">Other</option>
    </select>
  </td>
  <td>
    <input type="text" name="otherreasonIntl" id="otherreasonIntl" maxlength="44" />
  </td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="addcustomIntl" id="label-customsOtherReasonIntl">add custom info <b> * </b>
    </label>
  </td>
  <td>
    <label for="hstarrifcodeIntl" id="label-hstarrifcodeIntl">hs tarrif code<b> * </b>
  </label>
</td>
<td>
  <label for="skuIntl" id="label-skuIntl">sku <span>*</span>
</label>
</td>
<td>
  <label for="customsDescriptionIntl" id="label-customsDescriptionIntl">Customs Description <span>
    <font color="red">*</font>
  </span>
</label>
</td>
<td>
  <label for="customsunitvalueIntl" id="label-customsunitvalueIntl">Unit Value <span>
    <font color="red">*</font>
  </span>
</label>
</td>
</tr>
<tr>
  <td>
    <input type="text" name="addcustomIntl" id="addcustomIntl" maxlength="44" />
  </td>
  <td>
    <input type="text" name="hstarrifcodeIntl" id="hstarrifcodeIntl" value="9999.99.99.99" />
  </td>
  <td>
    <input type="text" name="skuIntl" id="skuIntl" maxlength="44" />
  </td>
  <td>
    <input type="text" name="customsDescriptionIntl" id="customsDescriptionIntl" value="description" maxlength="44" />
  </td>
  <td>
    <input type="text" name="customsunitvalueIntl" id="customsunitvalueIntl" value="1" maxlength="7" />
  </td>
</tr>
</table>
<br />
<table class="TableSTyle">
  <tr>
    <td>
      <label for="customsNumberOfUnitsIntl" id="label-customsNumberOfUnitsIntl">Number of Units <span>
        <font color="red">*</font>
      </span>
    </label>
  </td>
  <td>
    <label for="customsUnitWeightIntl" id="label-customsUnitWeightIntl">Total Units Weight <span>
      <font color="red">*</font>
    </span>
  </label>
</td>
<td>
  <label for="customsCountryOfOriginIntl" id="label-ccustomsCountryOfOriginIntl">Country of Origin</label>
</td>
<td>
  <label for="customprovinceoforiginIntl" id="label-ccustomprovinceoforiginIntl">Province of Origin</label>
</td>
</tr>
<tr>
  <td>
    <input type="text" name="customsNumberOfUnitsIntl" id="customsNumberOfUnitsIntl" value="1" maxlength="44" />
  </td>
  <td>
    <input type="text" name="customsUnitWeightIntl" id="customsUnitWeightIntl" maxlength="7" value="11" onblur="CheckWeightCustomIntl()" />
  </td>
  <td>
    <select name="customsCountryOfOriginIntl" id="customsCountryOfOriginIntl">
      <option value="" label=" -- Choose One --"> -- Choose One --</option>
      <option value="AF" label="Afghanistan">Afghanistan</option>
      <option value="AX" label="Åland Islands">Åland Islands</option>
      <option value="AL" label="Albania">Albania</option>
      <option value="DZ" label="Algeria">Algeria</option>
      <option value="AS" label="American Samoa">American Samoa</option>
      <option value="AD" label="Andorra">Andorra</option>
      <option value="AO" label="Angola">Angola</option>
      <option value="AI" label="Anguilla">Anguilla</option>
      <option value="AQ" label="Antarctica">Antarctica</option>
      <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
      <option value="AR" label="Argentina">Argentina</option>
      <option value="AM" label="Armenia">Armenia</option>
      <option value="AW" label="Aruba">Aruba</option>
      <option value="AU" label="Australia">Australia</option>
      <option value="AT" label="Austria">Austria</option>
      <option value="AZ" label="Azerbaijan">Azerbaijan</option>
      <option value="BS" label="Bahamas">Bahamas</option>
      <option value="BH" label="Bahrain">Bahrain</option>
      <option value="BD" label="Bangladesh">Bangladesh</option>
      <option value="BB" label="Barbados">Barbados</option>
      <option value="BY" label="Belarus">Belarus</option>
      <option value="BE" label="Belgium">Belgium</option>
      <option value="BZ" label="Belize">Belize</option>
      <option value="BJ" label="Benin">Benin</option>
      <option value="BM" label="Bermuda">Bermuda</option>
      <option value="BT" label="Bhutan">Bhutan</option>
      <option value="BO" label="Bolivia">Bolivia</option>
      <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
      <option value="BW" label="Botswana">Botswana</option>
      <option value="BV" label="Bouvet Island">Bouvet Island</option>
      <option value="BR" label="Brazil">Brazil</option>
      <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
      <option value="BN" label="Brunei Darussalam">Brunei Darussalam</option>
      <option value="BG" label="Bulgaria">Bulgaria</option>
      <option value="BF" label="Burkina Faso">Burkina Faso</option>
      <option value="BI" label="Burundi">Burundi</option>
      <option value="KH" label="Cambodia">Cambodia</option>
      <option value="CM" label="Cameroon">Cameroon</option>
      <option value="CA" label="Canada">Canada</option>
      <option value="CV" label="Cape Verde">Cape Verde</option>
      <option value="KY" label="Cayman Islands">Cayman Islands</option>
      <option value="CF" label="Central African Republic">Central African Republic</option>
      <option value="TD" label="Chad">Chad</option>
      <option value="CL" label="Chile">Chile</option>
      <option value="CN" label="China">China</option>
      <option value="CX" label="Christmas Island">Christmas Island</option>
      <option value="CC" label="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
      <option value="CO" label="Colombia">Colombia</option>
      <option value="KM" label="Comoros">Comoros</option>
      <option value="CG" label="Congo">Congo</option>
      <option value="CD" label="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
      <option value="CK" label="Cook Islands">Cook Islands</option>
      <option value="CR" label="Costa Rica">Costa Rica</option>
      <option value="CI" label="Cote D'ivoire">Cote D'ivoire</option>
      <option value="HR" label="Croatia">Croatia</option>
      <option value="CU" label="Cuba">Cuba</option>
      <option value="CY" label="Cyprus">Cyprus</option>
      <option value="CZ" label="Czech Republic">Czech Republic</option>
      <option value="DK" label="Denmark">Denmark</option>
      <option value="DJ" label="Djibouti">Djibouti</option>
      <option value="DM" label="Dominica">Dominica</option>
      <option value="DO" label="Dominican Republic">Dominican Republic</option>
      <option value="EC" label="Ecuador">Ecuador</option>
      <option value="EG" label="Egypt">Egypt</option>
      <option value="SV" label="El Salvador">El Salvador</option>
      <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
      <option value="ER" label="Eritrea">Eritrea</option>
      <option value="EE" label="Estonia">Estonia</option>
      <option value="ET" label="Ethiopia">Ethiopia</option>
      <option value="FK" label="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
      <option value="FO" label="Faroe Islands">Faroe Islands</option>
      <option value="FJ" label="Fiji">Fiji</option>
      <option value="FI" label="Finland">Finland</option>
      <option value="FR" label="France">France</option>
      <option value="GF" label="French Guiana">French Guiana</option>
      <option value="PF" label="French Polynesia">French Polynesia</option>
      <option value="TF" label="French Southern Territories">French Southern Territories</option>
      <option value="GA" label="Gabon">Gabon</option>
      <option value="GM" label="Gambia">Gambia</option>
      <option value="GE" label="Georgia">Georgia</option>
      <option value="DE" label="Germany">Germany</option>
      <option value="GH" label="Ghana">Ghana</option>
      <option value="GI" label="Gibraltar">Gibraltar</option>
      <option value="GR" label="Greece">Greece</option>
      <option value="GL" label="Greenland">Greenland</option>
      <option value="GD" label="Grenada">Grenada</option>
      <option value="GP" label="Guadeloupe">Guadeloupe</option>
      <option value="GU" label="Guam">Guam</option>
      <option value="GT" label="Guatemala">Guatemala</option>
      <option value="GG" label="Guernsey">Guernsey</option>
      <option value="GN" label="Guinea">Guinea</option>
      <option value="GW" label="Guinea-bissau">Guinea-bissau</option>
      <option value="GY" label="Guyana">Guyana</option>
      <option value="HT" label="Haiti">Haiti</option>
      <option value="HM" label="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
      <option value="VA" label="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
      <option value="HN" label="Honduras">Honduras</option>
      <option value="HK" label="Hong Kong">Hong Kong</option>
      <option value="HU" label="Hungary">Hungary</option>
      <option value="IS" label="Iceland">Iceland</option>
      <option value="IN" label="India">India</option>
      <option value="ID" label="Indonesia">Indonesia</option>
      <option value="IR" label="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
      <option value="IQ" label="Iraq">Iraq</option>
      <option value="IE" label="Ireland">Ireland</option>
      <option value="IM" label="Isle of Man">Isle of Man</option>
      <option value="IL" label="Israel">Israel</option>
      <option value="IT" label="Italy">Italy</option>
      <option value="JM" label="Jamaica">Jamaica</option>
      <option value="JP" label="Japan">Japan</option>
      <option value="JE" label="Jersey">Jersey</option>
      <option value="JO" label="Jordan">Jordan</option>
      <option value="KZ" label="Kazakhstan">Kazakhstan</option>
      <option value="KE" label="Kenya">Kenya</option>
      <option value="KI" label="Kiribati">Kiribati</option>
      <option value="KP" label="Korea, Democratic People\s Republic of">Korea, Democratic People\s Republic of</option>
      <option value="KR" label="Korea, Republic of">Korea, Republic of</option>
      <option value="KW" label="Kuwait">Kuwait</option>
      <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
      <option value="LA" label="Lao People\s Democratic Republic">Lao People\s Democratic Republic</option>
      <option value="LV" label="Latvia">Latvia</option>
      <option value="LB" label="Lebanon">Lebanon</option>
      <option value="LS" label="Lesotho">Lesotho</option>
      <option value="LR" label="Liberia">Liberia</option>
      <option value="LY" label="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
      <option value="LI" label="Liechtenstein">Liechtenstein</option>
      <option value="LT" label="Lithuania">Lithuania</option>
      <option value="LU" label="Luxembourg">Luxembourg</option>
      <option value="MO" label="Macao">Macao</option>
      <option value="MK" label="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
      <option value="MG" label="Madagascar">Madagascar</option>
      <option value="MW" label="Malawi">Malawi</option>
      <option value="MY" label="Malaysia">Malaysia</option>
      <option value="MV" label="Maldives">Maldives</option>
      <option value="ML" label="Mali">Mali</option>
      <option value="MT" label="Malta">Malta</option>
      <option value="MH" label="Marshall Islands">Marshall Islands</option>
      <option value="MQ" label="Martinique">Martinique</option>
      <option value="MR" label="Mauritania">Mauritania</option>
      <option value="MU" label="Mauritius">Mauritius</option>
      <option value="YT" label="Mayotte">Mayotte</option>
      <option value="MX" label="Mexico">Mexico</option>
      <option value="FM" label="Micronesia, Federated States of">Micronesia, Federated States of</option>
      <option value="MD" label="Moldova, Republic of">Moldova, Republic of</option>
      <option value="MC" label="Monaco">Monaco</option>
      <option value="MN" label="Mongolia">Mongolia</option>
      <option value="ME" label="Montenegro">Montenegro</option>
      <option value="MS" label="Montserrat">Montserrat</option>
      <option value="MA" label="Morocco">Morocco</option>
      <option value="MZ" label="Mozambique">Mozambique</option>
      <option value="MM" label="Myanmar">Myanmar</option>
      <option value="NA" label="Namibia">Namibia</option>
      <option value="NR" label="Nauru">Nauru</option>
      <option value="NP" label="Nepal">Nepal</option>
      <option value="NL" label="Netherlands">Netherlands</option>
      <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
      <option value="NC" label="New Caledonia">New Caledonia</option>
      <option value="NZ" label="New Zealand">New Zealand</option>
      <option value="NI" label="Nicaragua">Nicaragua</option>
      <option value="NE" label="Niger">Niger</option>
      <option value="NG" label="Nigeria">Nigeria</option>
      <option value="NU" label="Niue">Niue</option>
      <option value="NF" label="Norfolk Island">Norfolk Island</option>
      <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
      <option value="NO" label="Norway">Norway</option>
      <option value="OM" label="Oman">Oman</option>
      <option value="PK" label="Pakistan">Pakistan</option>
      <option value="PW" label="Palau">Palau</option>
      <option value="PS" label="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
      <option value="PA" label="Panama">Panama</option>
      <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
      <option value="PY" label="Paraguay">Paraguay</option>
      <option value="PE" label="Peru">Peru</option>
      <option value="PH" label="Philippines">Philippines</option>
      <option value="PN" label="Pitcairn">Pitcairn</option>
      <option value="PL" label="Poland">Poland</option>
      <option value="PT" label="Portugal">Portugal</option>
      <option value="PR" label="Puerto Rico">Puerto Rico</option>
      <option value="QA" label="Qatar">Qatar</option>
      <option value="RE" label="Reunion">Reunion</option>
      <option value="RO" label="Romania">Romania</option>
      <option value="RU" label="Russian Federation">Russian Federation</option>
      <option value="RW" label="Rwanda">Rwanda</option>
      <option value="SH" label="Saint Helena">Saint Helena</option>
      <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
      <option value="LC" label="Saint Lucia">Saint Lucia</option>
      <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
      <option value="VC" label="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
      <option value="WS" label="Samoa">Samoa</option>
      <option value="SM" label="San Marino">San Marino</option>
      <option value="ST" label="Sao Tome and Principe">Sao Tome and Principe</option>
      <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
      <option value="SN" label="Senegal">Senegal</option>
      <option value="RS" label="Serbia">Serbia</option>
      <option value="SC" label="Seychelles">Seychelles</option>
      <option value="SL" label="Sierra Leone">Sierra Leone</option>
      <option value="SG" label="Singapore">Singapore</option>
      <option value="SK" label="Slovakia">Slovakia</option>
      <option value="SI" label="Slovenia">Slovenia</option>
      <option value="SB" label="Solomon Islands">Solomon Islands</option>
      <option value="SO" label="Somalia">Somalia</option>
      <option value="ZA" label="South Africa">South Africa</option>
      <option value="GS" label="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
      <option value="ES" label="Spain">Spain</option>
      <option value="LK" label="Sri Lanka">Sri Lanka</option>
      <option value="SD" label="Sudan">Sudan</option>
      <option value="SR" label="Suriname">Suriname</option>
      <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
      <option value="SZ" label="Swaziland">Swaziland</option>
      <option value="SE" label="Sweden">Sweden</option>
      <option value="CH" label="Switzerland">Switzerland</option>
      <option value="SY" label="Syrian Arab Republic">Syrian Arab Republic</option>
      <option value="TW" label="Taiwan, Province of China">Taiwan, Province of China</option>
      <option value="TJ" label="Tajikistan">Tajikistan</option>
      <option value="TZ" label="Tanzania, United Republic of">Tanzania, United Republic of</option>
      <option value="TH" label="Thailand">Thailand</option>
      <option value="TL" label="Timor-leste">Timor-leste</option>
      <option value="TG" label="Togo">Togo</option>
      <option value="TK" label="Tokelau">Tokelau</option>
      <option value="TO" label="Tonga">Tonga</option>
      <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
      <option value="TN" label="Tunisia">Tunisia</option>
      <option value="TR" label="Turkey">Turkey</option>
      <option value="TM" label="Turkmenistan">Turkmenistan</option>
      <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
      <option value="TV" label="Tuvalu">Tuvalu</option>
      <option value="UG" label="Uganda">Uganda</option>
      <option value="UA" label="Ukraine">Ukraine</option>
      <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
      <option value="GB" label="United Kingdom">United Kingdom</option>
      <option value="US" label="United States">United States</option>
      <option value="UY" label="Uruguay">Uruguay</option>
      <option value="UZ" label="Uzbekistan">Uzbekistan</option>
      <option value="VU" label="Vanuatu">Vanuatu</option>
      <option value="VE" label="Venezuela">Venezuela</option>
      <option value="VN" label="Viet Nam">Viet Nam</option>
      <option value="VG" label="Virgin Islands, British">Virgin Islands, British</option>
      <option value="VI" label="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
      <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
      <option value="EH" label="Western Sahara">Western Sahara</option>
      <option value="YE" label="Yemen">Yemen</option>
      <option value="ZM" label="Zambia">Zambia</option>
      <option value="ZW" label="Zimbabwe">Zimbabwe</option>
    </select>
  </td>
  <td>
    <select name="customprovinceoforiginIntl" id="customprovinceoforiginIntl">
      <option value=""> -- Choose One --</option>
      <option value="AB" label="Alberta">Alberta</option>
      <option value="BC" label="British Columbia">British Columbia</option>
      <option value="MB" label="Manitoba">Manitoba</option>
      <option value="NB" label="New Brunswick">New Brunswick</option>
      <option value="NL" label="Newfoundland and Labrador">Newfoundland and Labrador</option>
      <option value="NS" label="Nova Scotia">Nova Scotia</option>
      <option value="NT" label="Northwest Territories">Northwest Territories</option>
      <option value="NU" label="Nunavut">Nunavut</option>
      <option value="ON" label="Ontario">Ontario</option>
      <option value="PE" label="Prince Edward Island">Prince Edward Island</option>
      <option value="QC" label="Québec">Québec</option>
      <option value="SK" label="Saskatchewan">Saskatchewan</option>
      <option value="YT" label="Yukon">Yukon</option>
    </select>
  </td>
</tr>
</table>
<br />
</div>
<br />
<div   class="ui-widget-content">
  <h2>Tracking Information</h2>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="costcenterIntl" id="label-costcenterIntl">costcenter</label>
      </td>
      <td>
        <label for="customerref1Intl" id="label-customerref1Intl">Cost customerref1</label>
      </td>
      <td>
        <label for="customerref2Intl" id="label-customerref2">customerref2</label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="costcenterIntl" id="costcenterIntl" value="interninvoiceref" maxlength="35" />
      </td>
      <td>
        <input type="text" name="customerref1Intl" id="customerref1Intl" value="ref1" maxlength="30" />
      </td>
      <td>
        <input type="text" name="customerref2Intl" id="customerref2Intl" value="ref2" maxlength="35" />
      </td>
    </tr>
  </table>
  <br />
</div>
<br />
<div   class="ui-widget-content">
  <br />
  <h2>Electronic Delivery Updates</h2>
  <p>
                        This option allows you to request emails to be sent when your item is shipped, delivered, signature obtained or unforeseen delivery interruptions occur.
                        This option is available for services with delivery confirmation (barcoded) only.
                    </p>
  <table class="TableSTyle">
    <tr>
      <td>
        <label for="eNoticeEmailIntl" id="eNoticeEmailIntl">Email</label>
      </td>
      <td>
        <label for="eNoticeShipIntl" id="eNoticeShipIntl">Ship</label>
                                Email notification when the shipment order is created and the item is provided to Canada Post for delivery.

                            </td>
        <td>
          <label for="eNoticeExceptionIntl" id="eNoticeExceptionIntl">Exception</label>
                                Email notification when any unforeseen delivery interruptions occur.

                            </td>
          <td>
            <label for="eNoticeDeliveryIntl" id="eNoticeDeliveryIntl">Delivery</label>

                                Email notification when a Delivery Notice Card notifying the recipient to pick the item up at a local post office is delivered.

                            </td>
          </tr>
          <tr>
            <td>
              <input type="text" name="eNoticeEmailIntl" id="eNoticeEmailIntl" value="admin@fabsandbox.com"maxlength="60" />
            </td>
            <td>
              <input type="hidden" name="eNoticeShipIntl" value="false" />
              <input type="checkbox" name="eNoticeShipIntl" id="eNoticeShipIntl" value="true" checked="checked" />
            </td>
            <td>
              <input type="hidden" name="eNoticeExceptionIntl" value="false" />
              <input type="checkbox" name="eNoticeExceptionIntl" id="eNoticeExceptionIntl" value="true" checked="checked" />
            </td>
            <td>
              <input type="hidden" name="eNoticeDeliveryIntl" value="false" />
              <input type="checkbox" name="eNoticeDeliveryIntl" id="eNoticeDeliveryIntl" value="true" checked="checked" />
            </td>
          </tr>
        </table>
        <br />
      </div>
      <br />
      <center>
        <input class="button button-small" type="submit" id="submitButton" name="submitButton" value="Create Shipment" />
      </center>
    </form>
    <center>
      <a href='/../'>
        <button>Go to main Screen</button>
      </a>
    </center>
  </div>
  <!---INTERNATIONAL FORM END ------>
</div>
</body>
<?php
$time = microtime();

$time = explode(" ", $time);

$time = $time[1] + $time[0];

$finish = $time;

$totaltime = ($finish - $start);

printf("<font color='white'>This page took %f seconds to load.</font>", $totaltime);
?>
</html>


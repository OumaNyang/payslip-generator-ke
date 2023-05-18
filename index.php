<?php
$homebase_url = 'http://localhost/harare/signal-2/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>SIGNAL</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

  <style>
.table tr {
      line-height: 5px;
      font-size: 12px;
      font-family: 'Courier New', monospace;
      
    }

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

#pinfo_tbl1,#pinfo_tbl2 {
      font-size: 13px;
      line-height: 5px;
      position: relative;
    }
    #bio_tbl{
        position: relative;

    }

    #payslip_tbl {
      position: relative;
      z-index: 1;
      color:#000;
      font-weight:600;
    }


    #payslip_tbl:before {
        content: " "; 
      background-image: url("./assets/img/dscf75b78hf-removebg-preview.png");
      background-repeat: no-repeat;
      background-position: center;
      position: absolute;
       left: 100;
       right: 100;
      width: 100%;
      /* height: 500px; */
      opacity: .05;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
    <div class="card">
    <div class="card-header">
    Payroll
    </div>
   <div class="card-body">
   <div class="row justify-content-center">
     <div class="col-md-5">
        <form method="post" id ="payslip_frm"  autocomplete="off">
        <div class="form no-gutters">
        <div class="col-md-12 form-group">
        <label class="control-label rounded-0">Month :</label>
        <input required type="month"  value="<?=date('Y-m')  ?>"  class="form-control bg-white rounded-0"  id="paymonth" name="paymonth" >
        </div>

        <div class="col-md-12  form-group">
        <label class="control-label">Name :</label>
        <input required type="text"  min="5" value="Jakaya Kikwete"  class="form-control bg-white rounded-0" id="empname" name="empname" >
        </div>

        <div class="col-md-12   form-group">
        <label class="control-label">Department :</label>

        <input required type="text"    class="form-control bg-white rounded-0" value="sales" id="department" name="department" >
        </div>

        <div class="col-md-12  form-group">
        <label class="control-label">Basic Salary :</label>
        <input required type="number"  min="1"  value="892000" class="form-control bg-white rounded-0" id="basicpay"  name="basicpay" >
        </div>

        <div class="col-md-12  form-group">
        <label class="control-label" for="actionnotes">Allowancess:</label>
        <input  type="number"  value="0" min="0" class="form-control bg-white rounded-0" id="allowances" name="allowances" >
        </div>

        <div class="col-md-12  form-group">
        <label class="control-label" for="actionnotes">Overtime:</label>
        <input  type="number"  value="0" min="0" class="form-control bg-white rounded-0" id="overtime" name="overtime" >
        </div>

        <div class="col-md-12  form-group">
        <label class="control-label rounded-0" for="actionnotes">NSSF :</label>
        <select required class="form-control bg-white rounded-0" id="nssrates" name="nssfrates" >
         <option value="oldnssf">Old NSSF rates</option>
        <option value="newnssf">New NSSF Rates</option>
        </select>
        </div>


        <div class="col-md-12  form-group">
        <label class="control-label" for="actionnotes rounded-0">Deductions:</label>

        <input  type="number"  value="0" min="0" class="form-control bg-white rounded-0" id="deductions" name="deductions" >
        </div>

        <div class="col-md-12 p-0 form-group">
        <label class="control-label" for="actionnotes">Deduct HELB:</label>
        <select required class="form-control bg-white" id="deducthelb" name="deducthelb" >
        <option value="donotpay">NO</option>
        <option value="pay">YES</option>

        </select>

        </div>
        <button  type="submit"  class="btn btn-md btn-round btn-primary mt-5" id="get_payslip"  name="get_payslip" ><i class="bi bi-check-circle"></i>&nbsp;Generate Payslip
        </button>
        </div>
        </form>


</div>
<!-- /.col -->


<div class="col-md-5">
  <div id="mypayslip" class="">
    <div class="row justify-content-center mt-1">
      <div class="col-md-8">
        <!-- <img class="" width="30%" src="./dscf75b78hf-removebg-preview.png" alt=""> -->
        <hr>
        <h6 class="text-center text-bold" id="payslip-month"></h6>
      </div>
    </div>

    <table id="bio_tbl" class="table table-borderless">
      <tr>
        <td>Name</td>
        <td class="text-bold text-right" id="employee-name"></td>
      </tr>
      <tr>
        <td>Staff Number</td>
        <td class="text-bold text-right" id="employee-number"></td>
      </tr>
      <tr>
        <td>Department</td>
        <td class="text-bold text-right" id="employee-department"></td>
      </tr>
    </table>

    <table id="payslip_tbl" class="table ptable table-striped" style="width: 100%; height: auto;">
    <tr>
      <td class="text-bold">Basic pay</td>
      <td class="text-bold" id="basic_pay"></td>
    </tr>
    <tr>
      <td>Overtime</td>
      <td class="text-bold" id="overtime_amnt"></td>
    </tr>
    <tr>
      <td>Allowances</td>
      <td class="text-bold" id="allowances_amnt"></td>
    </tr>
    <tr>
      <td>Mortgage (HOSP)</td>
      <td class="text-bold" id="hosp_mortgage"></td>
    </tr>
    <tr>
      <td>NSSF</td>
      <td class="text-bold" id="nssf"></td>
    </tr>
    <tr>
      <td class="text-bold">Taxable pay</td>
      <td class="text-bold" id="taxable_pay"></td>
    </tr>
    <tr>
      <td>Income Tax</td>
      <td class="text-bold" id="income_tax"></td>
    </tr>
    <tr>
      <td>Personal relief</td>
      <td class="text-bold" id="personal_relief"></td>
    </tr>
    <tr>
      <td>Insurance (NHIF) relief</td>
      <td class="text-bold" id="insurance_relief"></td>
    </tr>
    <tr>
      <td>P.A.Y.E</td>
      <td class="text-bold" id="paye"></td>
    </tr>
    <tr>
      <td class="text-bold">Gross pay after Tax</td>
      <td class="text-bold" id="pay_after_tax"></td>
    </tr>
    <tr>
      <td>NHIF</td>
      <td class="text-bold" id="nhif"></td>
    </tr>
    <tr>
      <td>HELB</td>
      <td class="text-bold" id="helb"></td>
    </tr>
    <tr>
      <td>Deductions</td>
      <td class="text-bold" id="deductions"></td>
    </tr>
    <tr class="bg-primary  ">
      <td>Net Pay</td>
      <td class="text-bold text-light" id="netpay"></td>
    </tr>
  </table>
  
  <hr>
  
  <div class="row">
    <div class="col-12">
      <p>PERSONAL INFO:</p>
    </div>

    <div class="col-6">
      <table id="pinfo_tbl1" class="table infotbl table-compact table-borderless table-striped">
        <tr>
          <td>Payment Mode:</td>
          <td class="text-bold text-left" id="paymentmode"></td>
        </tr>
        <tr>
          <td>Bank Name:</td>
          <td class="text-left" id="bankname"></td>
        </tr>
        <tr>
          <td>Bank Branch:</td>
          <td class="text-left" id="bankbranch"></td>
        </tr>
        <tr>
          <td>Bank Acc:</td>
          <td class="text-left" id="bankaccno"></td>
        </tr>
      </table>
    </div>
    
    <div class="col-6">
      <table id="pinfo_tbl2" class="table infotbl table-borderless table-compact table-borderless table-striped">
        <tr>
          <td>ID:</td>
          <td class="text-left" id="natidno"></td>
        </tr>
        <tr>
          <td>PIN:</td>
          <td class="text-left" id="pinno"></td>
        </tr>
        <tr>
          <td>NHIF:</td>
          <td class="text-left" id="nhifno"></td>
        </tr>
        <tr>
          <td>NSSF:</td>
          <td class="text-left" id="nssfno"></td>
        </tr>
      </table>
    </div>

    <div class="col-12">
      <svg id="barcode"></svg>
      <small>
        <p class="text-bold" > Created on <span id="createddate"></span></p>
      </small>
    </div>

  </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- JavaScript files -->
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
<script src="./assets/js/payslip.js"></script> 
 
</body>
</html>







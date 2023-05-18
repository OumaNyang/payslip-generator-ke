<!DOCTYPE html>
<html lang="en">
<head>
<title>Payroll Software | HRMS</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="The calculator uses the latests PAYE, NHIF, NSSF values to calculate the net-pay and present it in a simple payslip as it could look in in a typical payroll.">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>    <div  class="container mt-2 mb-2">

    <div style="background: #fff;" class="row  ">
      <div   class="col-12 text-center bg-theme text-light p-2 "> 

         <h3 >Payroll Calculator</h3>
 </div>
     <div class="col-md-5">
      <h5 class="text-center">Enter Payroll Data</h5>
    <hr>
     <form method="post" id="payslip_frm" autocomplete="off">
  <div class="form no-gutters">
    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label rounded-0">Month:</label>
      <div class="col-md-7">
        <input required type="month" value="<?= date('Y-m', strtotime(date('Y-m'))) ?>" max="<?= date('Y-m', strtotime(date('Y-m'))) ?>" class="form-control rounded-0" id="paymonth" name="paymonth">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label">Name:</label>
      <div class="col-md-7">
        <input required type="text" min="5" value="Ouma Nyang" class="form-control rounded-0" id="empname" name="empname">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label">Department:</label>
      <div class="col-md-7">
        <input required type="text" class="form-control rounded-0" value="Software Solutions Development" id="department" name="department">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label">Basic Salary:</label>
      <div class="col-md-7">
        <input required type="number" min="1" value="250000" class="form-control rounded-0" id="basicpay" name="basicpay">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label" for="actionnotes">Allowances:</label>
      <div class="col-md-7">
        <input type="number" value="0" min="0" class="form-control rounded-0" id="allowances" name="allowances">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label" for="actionnotes">Overtime:</label>
      <div class="col-md-7">
        <input type="number" value="12000" min="0" class="form-control rounded-0" id="overtime" name="overtime">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label rounded-0" for="actionnotes">NSSF:</label>
      <div class="col-md-7">
        <select required class="form-control rounded-0" id="nssrates" name="nssfrates">
          <option value="oldnssf">Old NSSF rates</option>
          <option value="newnssf">New NSSF Rates</option>
        </select>
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label" for="actionnotes rounded-0">Deductions:</label>
      <div class="col-md-7">
        <input type="number" value="0" min="0" class="form-control rounded-0" id="deductions" name="deductions">
      </div>
    </div>

    <div class="col-md-12 form-group row mt-2">
      <label class="col-md-5 control-label" for="actionnotes">Deduct HELB:</label>
      <div class="col-md-7">
        <select required class="form-control rounded-0" id="deducthelb" name="deducthelb">
          <option value="donotpay">NO</option>
          <option value="pay">YES</option>
        </select>
      </div>
    </div>
    <div class="col-md-12 form-group row mt-2 ">
      <label class="col-md-5 control-label" for="actionnotes">Deduct Housing Levy (3% of Taxable income):</label>
      <div class="col-md-7">
        <select required class="form-control rounded-0" id="deducthousing" name="deducthousing">
          <option value="donotpay">NO</option>
          <option value="pay">YES</option>
        </select>
      </div>
    </div>
    <div class="col-md-12 form-group   m-2">
         <button type="submit" class="btn btn-block btn-primary rounded-0" id="get_payslip" name="get_payslip"><i class="bi bi-check-circle"></i>&nbsp;Generate Payslip</button>
     </div>

  </div>
</form>

<div style="background: #defde8;color:#000;font-weight:700"class="col-md-12 text-center p-2 mt-5">
  <p>Are you in need of a Payroll Software? <a target="_blank"  class="text-theme" href="https://oumanyang.com/contact-us"> Contact us </a> on +254 780104232 | developer@oumanyang.com</p>
  </div>


</div>
<!-- /.col -->

<div class="col-md-7">
  <div id="page_info">
    <img src="assets/img/istockphoto-1389726884-612x612.jpg" alt="">
     <p>This calculator works out an employee's net pay by subtracting PAYE, NSSF, NHIF and pension fund contribution from the monthly gross pay. In order to work out taxable pay, the calculator requires non-cash benefits and any allowable deductions other than NSSF and pension fund contribution.</p>
  <p>The calculator uses the latests PAYE, NHIF, NSSF values to calculate the net-pay and present it in a simple payslip as it could look in in a typical payroll.</p>
<h4>PAYE Calculator</h4>
<p>Pay As You Earn (PAYE) is a mandatory tax deduction done on any earnings.   </p>
</div>
 
<div id="payslip_info" >
  <div id="mypayslip" class="">
    <div class="row justify-content-center mt-1">
      <div class="col-md-8">
        <!-- <img class="" width="30%" src="./assets/img/dscf75b78hf-removebg-preview.png" alt=""> -->
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
      <td>Housing Levy</td>
      <td class="text-bold" id="housing_levy"></td>
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
      <td class="text-bold" id="total_deductions"></td>
    </tr>
    <tr class="bg-dark  text-light">
      <td>Net Pay</td>
      <td class="text-light" id="netpay"></td>
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

<div class="col-md-12 text-center bg-theme p2">
  <p>Developed by <a target="_blank" href="https://oumanyang.com">Nyang Digital iHub</a></p>
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







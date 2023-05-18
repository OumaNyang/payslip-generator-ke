$(document).ready(function() {
    // Submit event handler for the form
     
$('#payslip_frm').on('submit',function(event) {
  event.preventDefault();
const basicPay = parseFloat($('#basicpay').val());
const allowances = parseFloat($('#allowances').val());
const payMonth = $('#paymonth').val();
const overtime = parseFloat($('#overtime').val());
const otherDeductions = parseFloat($('#deductions').val());
const deductHelb = $('#deducthelb').val();
const nssfRates = $('#nssfrates').val();
const department = $('#department').val();
const deducthousing = $('#deducthousing').val();

const employeeName = $('#empname').val();
const empNumber = Math.floor(Math.random() * 100000) + 990000;
const insuranceRelief = -255;

const nssfNo = '201523698';
const nhifNo = '306589725';
const pinNo = 'A014965234C';
const natIdNo = '22536897';
const bankAccNo = '067865492';
const bankBranch = '058';
const bankName = 'Equity Bank of Kenya';
const paymentMode = 'Bank Transfer';
const helb = deductHelb === 'pay' ? 5000 : 0;
const nssf = nssfRates === 'oldnssf' ? 200 : (basicPay < 18000 ? 0.06 * basicPay : 0.06 * 18000);
const nhif = (basicPay < 6000 ? 150 : (basicPay >= 6000 && basicPay < 8000 ? 300 : (basicPay >= 8000 && basicPay < 12000 ? 400 : (basicPay >= 12000 && basicPay < 15000 ? 500 : (basicPay >= 15000 && basicPay < 20000 ? 600 : (basicPay >= 20000 && basicPay < 25000 ? 750 : (basicPay >= 25000 && basicPay < 30000 ? 850 : (basicPay >= 30000 && basicPay < 35000 ? 900 : (basicPay >= 35000 && basicPay < 40000 ? 950 : (basicPay >= 40000 && basicPay < 45000 ? 1000 : (basicPay >= 45000 && basicPay < 50000 ? 1100 : (basicPay >= 50000 && basicPay < 60000 ? 1200 : (basicPay >= 60000 && basicPay < 70000 ? 1300 : (basicPay >= 70000 && basicPay < 80000 ? 1400 : (basicPay >= 80000 && basicPay < 90000 ? 1500 : (basicPay >= 90000 && basicPay < 100000 ? 1600 : 1700))))))))))))))));
const taxablePay = basicPay + overtime + allowances - nssf;
let incomeTax = 0;
let personalRelief = -2400;
let paye = 0;
const housingLevy   = deducthousing ===  'pay' ? 0.03 *basicPay : 0;

  if (taxablePay > 24000 && taxablePay <= 32333) {
    const tier1 = 0.1 * 24000;
    const tier2 = 0.25 * (taxablePay - 24000);
    incomeTax = tier1 + tier2;
  } else if (taxablePay > 32333) {
    const tier1 = 0.1 * 24000;
    const tier2 = 0.25 * 8333;
    const tier3 = 0.3 * (taxablePay - 32333);
    incomeTax = tier1 + tier2 + tier3;
  }

  if (taxablePay >= 24000) {
    paye = incomeTax + personalRelief +insuranceRelief;
  }

  const payAfterTax = taxablePay - paye;
  const netPay = payAfterTax - nhif - helb - housingLevy- otherDeductions;
  const totalDeductions = nhif + helb + paye + nssf+ housingLevy + otherDeductions;

function formatNumber(number) {
  if (typeof number === 'number') {
    return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  } else {
    return 0
  }

}
$('#payslip_info').show(); 
$('#payslip-month').text(`Payslip for the month of ${payMonth}`) ;
$('#employee-name').text(employeeName) ;
$('#employee-number').text(empNumber) ;
$('#employee-department').text(department);

$('#basic_pay').text(formatNumber(basicPay));
$('#overtime_amnt').text(formatNumber(overtime));
$('#allowances_amnt').text(formatNumber(allowances));
$('#hosp_mortgage').text(formatNumber(hosp_mortgage));
$('#nssf').text(formatNumber(nssf));
$('#taxable_pay').text(formatNumber(taxablePay));
$('#income_tax').text(formatNumber(incomeTax));
$('#personal_relief').text(formatNumber(personalRelief));
$('#insurance_relief').text(formatNumber(insuranceRelief));
$('#paye').text(formatNumber(paye));
$('#pay_after_tax').text(formatNumber(payAfterTax));
$('#nhif').text(formatNumber(nhif));
$('#helb').text(formatNumber(helb));
$('#deductions').text(formatNumber(deductions));
$('#netpay').text(formatNumber(netPay));
$('#housing_levy').text(formatNumber(housingLevy));total_deductions;
$('#total_deductions').text(formatNumber(totalDeductions));
// Update personal info table
$('#paymentmode').text(paymentMode);
$('#bankname').text(bankName);
$('#bankbranch').text(bankBranch);
$('#bankaccno').text(bankAccNo);
$('#natidno').text(natIdNo);
$('#pinno').text(pinNo);
$('#nhifno').text(nhifNo);
$('#nssfno').text(nssfNo);

  
// Display the created date
// window.history.replaceState( null, null, window.location.href );

const currentDate = new Date();
const createdDate = currentDate.toLocaleDateString();
$('#createddate').text(` ${createdDate}`) ;

var today = new Date();
var dt = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

var element = $('mypayslip');
var opt = {
  margin:       [0,1],
  filename:     'payslip-'+dt+'-'+time+'.pdf',
  image:        { type: 'jpeg', quality:1 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
};

// New Promise-based usage:
html2pdf().set(opt).from(element).save();
var stafno = "5748";

var barcodeValue = (stafno.replace(/[^0-9]/g, "Hello World")).toUpperCase();
		var barcodeType = 'code39';
	/*	var showText = empNumber;*/
		JsBarcode("#barcode", barcodeValue, {
			format: barcodeType,
			displayValue: true,
			lineColor: "#24292e",
			width:2,
			height:40,
			fontSize: 15
		});


});
 
});


$(document).ready(function() {
    // Submit event handler for the form

$('#payslip_frm').on('submit',function(event) {
  event.preventDefault();
const basicPay = parseFloat($('#basicpay').val());
const allowances = parseFloat($('#allowances').val());
const payMonth = $('#paymonth').val();
const overtime = parseFloat($('#overtime').val());
const deductions = parseFloat($('#deductions').val());
const deductHelb = $('#deducthelb').val();
const nssfRates = $('#nssfrates').val();
const department = $('#department').val();
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
  const netPay = payAfterTax - nhif - helb - deductions;
  document.getElementById('payslip-month').textContent = `Payslip for the month of ${payMonth}`;
  document.getElementById('employee-name').textContent = employeeName;
  document.getElementById('employee-number').textContent = empNumber;
  document.getElementById('employee-department').textContent = department;
 
function formatNumber(number) {
  if (typeof number === 'number') {
    return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  } else {
    return 0
  }

}

document.getElementById('basic_pay').textContent = formatNumber(basicPay);
document.getElementById('overtime_amnt').textContent = formatNumber(overtime);
document.getElementById('allowances_amnt').textContent = formatNumber(allowances);
document.getElementById('hosp_mortgage').textContent = formatNumber(hosp_mortgage);
document.getElementById('nssf').textContent = formatNumber(nssf);
document.getElementById('taxable_pay').textContent = formatNumber(taxablePay);
document.getElementById('income_tax').textContent = formatNumber(incomeTax);
document.getElementById('personal_relief').textContent = formatNumber(personalRelief);
document.getElementById('insurance_relief').textContent = formatNumber(insuranceRelief);
document.getElementById('paye').textContent = formatNumber(paye);
document.getElementById('pay_after_tax').textContent = formatNumber(payAfterTax);
document.getElementById('nhif').textContent = formatNumber(nhif);
document.getElementById('helb').textContent = formatNumber(helb);
document.getElementById('deductions').textContent = formatNumber(deductions);
document.getElementById('netpay').textContent = formatNumber(netPay);

// Update personal info table
document.getElementById('paymentmode').textContent = paymentMode;
document.getElementById('bankname').textContent = bankName;
document.getElementById('bankbranch').textContent = bankBranch;
document.getElementById('bankaccno').textContent = bankAccNo;
document.getElementById('natidno').textContent = natIdNo;
document.getElementById('pinno').textContent = pinNo;
document.getElementById('nhifno').textContent = nhifNo;
document.getElementById('nssfno').textContent = nssfNo;

// Generate barcode using a library or custom implementation

// Display the created date
// window.history.replaceState( null, null, window.location.href );

const currentDate = new Date();
const createdDate = currentDate.toLocaleDateString();
// document.getElementById('createddate').textContent = `Created ${createdDate}`;

var today = new Date();
var dt = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

var element = document.getElementById('mypayslip');
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


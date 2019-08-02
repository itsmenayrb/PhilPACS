<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="./index.php">
        <img src="../assets/logo/Logo.png" class="header-brand-img" alt="PhilPaCS logo">
        PhilPaCS
      </a>
      <div class="d-flex order-lg-2 ml-auto">

        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">Bryan Balaga</span>
              <small class="text-muted d-block mt-1">Administrator</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-settings"></i> Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-log-out"></i> Sign out
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row text-md-right text-sm-center align-items-center">
      <div class="col-md-2 ml-auto col-xs-12 col-sm-12">
        <h6 class="text-muted form-text" id="clockbox"></h6>
        <script type="text/javascript">
          var tday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
          var tmonth = ["January","February","March","April","May","June","July","August","September","October","November","December"];

          function GetClock(){

            var d = new Date();
            var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(), nyear = d.getFullYear();
            var nhour = d.getHours(), nmin = d.getMinutes(),nsec = d.getSeconds(), ap;

            if (nhour == 0) {
              ap = " AM";
              nhour = 12;
            } else if (nhour < 12) {
              ap = " AM";
            } else if (nhour == 12) {
              ap =" PM";
            } else if(nhour > 12) {
              ap =" PM";
              nhour -= 12;
            }

            if(nmin <= 9) nmin = "0" + nmin;
            if(nsec <= 9) nsec = "0" + nsec;

            var clocktext = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + "<br>" + nhour + ":" + nmin +":" + nsec + ap + "";
            document.getElementById('clockbox').innerHTML = clocktext;
          }

          GetClock();
          setInterval(GetClock,1000);
        </script>
      </div>
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="./index.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
          </li>

          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Human Resources</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="./employee.php" class="dropdown-item ">Employee Management</a>
              <a href="./attendance.php" class="dropdown-item ">Attendance Management</a>
              <a href="./Requisition.php" class="dropdown-item ">Requisition Management</a>
              <a href="./event.php" class="dropdown-item ">Event Management</a>
              <a href="javascript:void(0)" class="dropdown-item" data-toggle="dropdown">Contribution Management</a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                  <a href="./contribution.sss.php" class="dropdown-item ">SSS Contribution Matrix</a>
                  <a href="./contribution.philhealth.php" class="dropdown-item ">PhilHealth Contribution Matrix</a>
                  <a href="./contribution.pagibig.php" class="dropdown-item ">Pag-ibig Contribution Matrix</a>
                  <a href="./contribution.tax.php" class="dropdown-item ">Tax Contribution Matrix</a>
                </div>

              <a href="./department.php" class="dropdown-item ">Department</a>
              <a href="./position.php" class="dropdown-item ">Position</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Accounting</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="./payroll.php" class="dropdown-item ">Payroll</a>
              <a href="./payroll.history.php" class="dropdown-item ">Payroll History</a>
              <a href="./salary.calculator.php" class="dropdown-item ">Salary Calculator</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  require(['jquery'], function($) {
    var url = window.location.href;
     $('ul li a').each(function() {

      if (url == (this.href)) {
        $(this).closest('li').addClass('active');
      }

    });
   });
</script>

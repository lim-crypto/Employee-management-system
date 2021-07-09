 @extends('adminlte::page')

 @section('title', 'Dashboard')

 @section('content_header')
 <h1>Dashboard</h1>
 @stop

 @section('content')
 <div class="row">
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-purple"><i class="fas fa-calendar"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Attendance today</span>
                 <span class="info-box-number">{{$attendance}}</span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-indigo"><i class="far fa-calendar-minus"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Absent today</span>
                 <span class="info-box-number">{{$employee-$attendance-$leave}}</span>
             </div>

             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-blue"><i class="fas fa-calendar-times"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">On leave today</span>
                 <span class="info-box-number">{{$leave}}</span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-lightblue"><i class="fas fa-users"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Employees</span>
                 <span class="info-box-number">{{$employee}}</span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
 </div>



 <div class="col-md-6 col-sm-12 col-12 card">
     <canvas id="myChart"></canvas>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
     // === include 'setup' then 'config' above ===
     const labels = [

         'Present',
         'Absent',
         'On leave',
         'Employees',
     ];

     const data = {
         labels: labels,
         datasets: [{
             label: ' Attendace Today',
             data: [
                 '{{$attendance}}',
                 '{{$employee-$attendance-$leave}}',
                 '{{$leave}}',
                 '{{$employee}}'
             ],
             backgroundColor: [
                 'rgb(102, 16, 242, 0.5)',
                 'rgb(111, 66, 193, 0.2)',
                 'rgb(0, 123, 255,0.2)',
                 ' rgb(60, 141, 188,0.2)',

             ],
             borderColor: [
                 'rgb(102, 16, 242)',
                 'rgb(111, 66, 193)',
                 'rgb(0, 123, 255)',
                 ' rgb(60, 141, 188)',

             ],
             borderWidth: 2
         }]
     };
     const config = {
         type: 'bar',
         data: data,
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         },
     };
     var myChart = new Chart(
         document.getElementById('myChart'),
         config
     );
 </script>


 @stop

 @section('css')
 <link rel="stylesheet" href="/css/admin_custom.css">
 @stop

 @section('js')
 <script>
     console.log('Hi!');
 </script>
 @stop
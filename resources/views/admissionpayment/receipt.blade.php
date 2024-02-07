<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Payment Receipt</title>
  <style>
    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }
    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }
    .table .table {
      background-color: #fff;
    }
    </style>
</head>
<body>
  
<div class="container">
  <div class="row justify-content-center">
    <div class="card col-md-6">
      <table class="table">
        <caption>PAYMENT RECEIPT</caption>
        <tr>
          <th>Admission to class</th>
          <td>{{ $admission_to_class }}</td>
        </tr>
        <tr>
          <th>Full Name</th>
          <td>{{ $name }}</td>
        </tr>
        <tr>
         <th>Admission Form Fee</th>
          <td>{{$amount}}</td>
        </tr>
        <tr>
          <th>Payment ID</th>
          <td>{{$payment_id}}</td>
        </tr>
        <tr>
          <th>Payment Date</th>
          <td>{{$date}}</td>
        </tr>
        <tr>
          <th>Payment Status</th>
          <td>{{$status}}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

</body>
</html>
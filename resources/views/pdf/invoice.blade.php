<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      width: 100%;
    }

    table {
      width: 70%;
      margin: 0 auto;
    }

    .bold {
      font-weight: bold;
    }

    .p-5 {
      padding-left: 5rem;
    }

    .pe-5 {
      /* padding-right: 5rem; */
    }

    .text-right {
      text-align: right;
    }

    .text-left {
      text-align: left;
    }
  </style>
</head>
<body>

  <table >
    <tr>
      <th></th>
      <th class="bold">
        {{ $data->sales_code }}<br><br><br>
      </th>
    </tr>
    <tr>
      <td class="text-left">
        {{ $data->customer_name }}<br>
        {{ $data->motor_dp_words }}<br>
        <br>
        <br>
      </td>
    </tr>
    <tr>
      <td class="text-left p-5">
        {{ $data->motor_type }}<br>
        {{ $data->motor_engine_number }}<br>
        {{ $data->motor_frame_number }}<br>
        {{ $data->motor_color }}<br>
        {{ $data->motor_plate_number }}<br>
      </td>
      <td class="text-right pe-5">
        <br><br>
        {{ number_format($data->total_payment) }}<br>
        {{ number_format($data->motor_dp) }}<br>
        {{ number_format($data->total_installment_amount) }}<br>
        {{ $data->motor_installment_period }} Bulan<br>
        {{ number_format($data->motor_installment_amount) }}<br>
        <br>
        <br>
      </td>
    </tr>
    <tr>
      <td class="text-left">
        {{ number_format($data->motor_dp) }}<br>
      </td>
      <td class="text-right pe-5">
        {{ date('d M Y', strtotime($data->sales_date))}}
      </td>
    </tr>

  </table>

</body>
</html>
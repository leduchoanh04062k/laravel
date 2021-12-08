<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF Laravel 8 - phpcodingstuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }
</style>    
<body>
    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Laravel 8 Generate PDF - phpcodingstuff.com</h2>
                </div>
                <div class="panel-body">
                    <div class="main-div">
                      <table class="table table-bordered">
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>

                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center pdf-btn">
              <a href="{{ url('khachhang/pdf/download') }}" class="btn btn-primary">Generate PDF</a>
          </div>
      </div>
  </div>
</div>
</body>
</html>
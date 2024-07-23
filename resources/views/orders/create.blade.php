<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thêm mới</title>
</head>
<body>
    <div class="container">
        <h1>Thêm mới đơn hàng</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên</label>
              <input type="text" class="form-control" name="product_name" value="{{ $data->product_name }}"  placeholder="Tên sản phẩm">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity" placeholder="Tên số lượng">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá</label>
                <input type="number" class="form-control" name="price" placeholder="Giá sản phẩm">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>
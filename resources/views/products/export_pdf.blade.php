<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->kategory->name }}</td>
                    <td>{{ $product->subKategory->name }}</td>
                    <td align="right">{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

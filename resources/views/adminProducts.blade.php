<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .logout {
            float: right;
            margin-bottom: 20px;
            background-color: #dc3545; /* Màu đỏ cho nút Logout */
        }

        .logout:hover {
            background-color: #c82333; /* Màu đỏ đậm khi hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Admin Product Management</h1>
    <a href="/addProducts">Add New Product</a>
    <a href="/logout" class="logout">Logout</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->code }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->descriptions }}</td>
            <td class="action-links">
                <a href="/editProducts/{{ $product->code }}">Edit</a>
                <a href="/deleteProducts/{{ $product->code }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->kategory->name }}</td>
                <td>{{ $product->subKategory->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->image }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

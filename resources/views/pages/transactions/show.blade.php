<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Item Details</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <td>Product</td>
                    <td>Type</td>
                    <td>Price</td>
                </tr>
                @foreach ($item->details as $detail)
                
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->product->type }}</td>
                    <td>${{ $detail->product->price }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
 <div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS"
            class="btn btn-success btn-block btn-sm">
        <i class="fa fa-check"></i> Set Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED"
            class="btn btn-danger btn-block btn-sm">
        <i class="fa fa-times"></i> Set FAILED
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=PENDING"
            class="btn btn-info btn-block btn-sm">
        <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div> 
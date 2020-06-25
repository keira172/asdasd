
@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customer Table: {{ $customers->count() }} rows</h6>
        <button style="float: right; margin-top: -20px" type="btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addcustomer">
        <i class="fas fa-plus"></i> Add Customer
        </button>
        @include('admin.customers.create')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->mail }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                            <div class="row">
                                <div>
                                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#editcustomer{{$customer->id}}">
                                        Edit
                                    </button>
                                    @include('admin.customers.edit')
                                </div>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning mg" data-toggle="modal">
                                        Delete
                                    </button>
                                </form>
                                {{-- <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">Detail</a> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

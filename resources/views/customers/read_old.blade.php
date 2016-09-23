@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">You Have <span class="badge fa fa-5x">{{ $num_of_old_customers }} </span> Old Clients <a class="pull-right" href="{{ URL::to('customers/add')  }}"> Add new customer</a> </div>


                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <th>#</th>
                            <th>Name</th>
                            <th>contacts</th>


                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id  }}</td>
                                    <td>{{ $customer->fullname  }}</td>
                                    <td>{{ $customer->contacts  }}</td>


                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

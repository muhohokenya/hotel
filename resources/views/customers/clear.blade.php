@extends('layouts.app')


@section('content')
    <div class="container">
        <section class="col-md-1">
            <span class="glyphicon glyphicon-user fa-5x" style="border-radius: 360px;height: 120px;width: 120px;border:1px solid #000000;padding: 23px;"></span>
            {{ ucwords($customers->fullname)  }}

        </section>
        <section class="col-md-11">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Clear {{ ucwords($customers->fullname)  }} <a class="pull-right" href="{{ URL::to('customers/read')  }}"> Back </a> </div>


                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <th>#</th>
                                <th>Name</th>
                                <th>contacts</th>
                                <th>Entry Date</th>
                                <th>Check Out Date</th>
                                <th>room_id</th>

                                <tr>
                                    <td>{{ $customers->id  }}</td>
                                    <td>{{ $customers->fullname  }}</td>
                                    <td>{{ $customers->contacts  }}</td>
                                    <td>{{ $customers->created_at  }}</td>
                                    <td>{{ $customers->checkout  }}</td>
                                    <td>{{ $customers->room_id  }}</td>
                                </tr>

                            </table>
                        </div>
                        <div class="panel-footer">
                            <a href="{{ URL::to('clear/'.$customers->id)  }}">Clear {{ $customers->fullname  }} from the Database </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
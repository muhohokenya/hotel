@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome <a class="pull-right" href="{{ URL::to('rooms')  }}"> Add new Rooom</a> </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <th>#</th>
                            <th>Room Number</th>
                            <th>Price</th>
                            <th>Occupied by</th>
                            @foreach($occupiedrooms as $room)
                                <tr>
                                    <td>{{ $room->id  }}</td>
                                    <td>{{ strtoupper($room->room_num)  }}</td>
                                    <td>{{ $room->charges  }}</td>
                                    <td>
                                        @if(count($room->customer))
                                            <span class="fa fa-check-circle"></span> {{ $room->customer['fullname']  }}
                                        @else
                                            <span class="fa fa-sellsy"></span> Free
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
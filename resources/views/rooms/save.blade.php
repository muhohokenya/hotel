@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="fa fa-plus-circle"></span> Add a customer here</div>

                    <div class="panel-body">
                        <form action="{{ URL::to('rooms/save')  }}" method="POST" accept-charset="utf-8" autocomplete="off">
                            {{ csrf_field()  }}
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group<?= ($errors->first('room_num')? ' has-error':'') ?>">
                                    <label for="room_num" class="control-label">Room Number</label>
                                    <input type="text" class="form-control" name="room_num" id="room_num" value="{{ old('room_num')  }}">
                                    <small class="help-block">
                                        <?= $errors->first('room_num') ?>
                                    </small>
                                </div>

                                <div class="form-group<?= ($errors->first('charges')? ' has-error':'') ?>">
                                    <label for="natid" class="control-label">charges  per day</label>
                                    <input type="text" class="form-control" name="charges" id="charges" value="{{ old('charges')  }}">
                                    <small class="help-block">
                                        <?= $errors->first('charges') ?>
                                    </small>
                                </div>


                                <button class="btn btn-primary">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="fa fa-plus-circle"></span> Add a customer here</div>

                    <div class="panel-body">
                        <form action="{{ URL::to('customers/save')  }}" method="POST" accept-charset="utf-8" autocomplete="off">
                            {{ csrf_field()  }}
                            <div class="col-md-12">
                                <div class="form-group<?= ($errors->first('fullname')? ' has-error':'') ?>">
                                    <label for="fullname" class="control-label">full name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname')  }}">
                                    <small class="help-block">
                                        <?= $errors->first('fullname') ?>
                                    </small>
                                </div>

                                <div class="form-group<?= ($errors->first('natid')? ' has-error':'') ?>">
                                    <label for="natid" class="control-label">National Id</label>
                                    <input type="text" class="form-control" name="natid" id="natid" value="{{ old('natid')  }}">
                                    <small class="help-block">
                                        <?= $errors->first('natid') ?>
                                    </small>
                                </div>

                                <div class="form-group<?= ($errors->first('contacts')? ' has-error':'') ?>">
                                    <label for="contacts" class="control-label">Contacts</label>
                                    <input type="text" class="form-control" name="contacts" id="contacts" value="{{ old('contacts')  }}">
                                    <small class="help-block">
                                        <?= $errors->first('contacts') ?>
                                    </small>
                                </div>

                                <div class="form-group<?= ($errors->first('checkout')? ' has-error':'') ?>">
                                    <label for="checkout" class="control-label">Check out Date</label>
                                    <input type="text" class="form-control" name="checkout" id="checkout" value="{{ old('checkout') }}">
                                    <small class="help-block">
                                        <?= $errors->first('checkout') ?>
                                    </small>
                                </div>

                                <div class="form-group<?= ($errors->first('checkout')? ' has-error':'') ?>">
                                    <label for="checkout" class="control-label">Room Number</label>
                                    <select name="room_id" class="form-control">
                                        @foreach($rooms as $room)
                                            <option  value="{{ $room->id  }}">{{ $room->room_num  }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-12">
                            <button class="btn btn-primary">save</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
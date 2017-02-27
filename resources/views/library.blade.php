@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    LIBRARY
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1 ?>
                        @forelse ($authors as $key)
                            <tr>
                                <td>{{$count}}</td>
                                <td><a href="{{URL::current()}}/{{ $key->id }}">{{ $key->name }}</a></td>
                                <td>
                                    <button class="btn btn-danger delete-author" author="{{ $key->id }}"
                                            token="{{ csrf_token() }}">DELETE
                                    </button>
                                </td>
                            </tr>
                            <?php $count++ ?>
                        @empty
                            <p>No authors</p>
                        @endforelse
                        </tbody>
                    </table>

                    <!-- Add Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default show-author">
                                <i class="fa fa-btn fa-plus"></i>Add Author
                            </button>
                        </div>
                    </div>

                </div>
                <div class="form-area">
                    <?= Form::open(['url' => '/library', 'id' => 'add-author']) ?>
                    <div class="form-group">
                        <?= Form::label('author', 'New author')?>
                        <?= Form::text('author', null, ['class' => 'form-control input-author'])?>
                    </div>
                    <?= Form::submit('Submit', ['class' => 'form-control submit-author'])?>
                    <?= Form::close()?>
                </div>
            </div>

        </div>
    </div>
@endsection
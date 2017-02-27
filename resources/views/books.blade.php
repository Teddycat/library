@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    BOOKS OF {{$author}} <a class="link-return" href="/library">Return to the list of authors</a>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>ISBN</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1 ?>
                        @foreach($books as $key)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$key->books_title}}</td>
                                <td>{{$key->books_subtitle}}</td>
                                <td>{{$key->books_isbn}}</td>
                                <td>
                                    <button class="btn btn-danger delete-book" book="{{ $key->books_id }}"
                                            token="{{ csrf_token() }}">DELETE
                                    </button>
                                </td>
                            </tr>
                            <?php $count++ ?>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default show-book">
                                <i class="fa fa-btn fa-plus"></i>Add Book
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-area">
                    <?= Form::open(['url' => '/library/' . $authorId, 'id' => 'add-book']) ?>
                    <div class="form-group">
                        <?=  Form::label('title', 'Title')?>
                        <?= Form::text('title', null, ['class' => 'form-control input-book'])?>
                    </div>
                    <div class="form-group">
                        <?=  Form::label('subtitle', 'Subtitle')?>
                        <?= Form::text('subtitle', null, ['class' => 'form-control input-book'])?>
                    </div>
                    <div class="form-group">
                        <?=  Form::label('isbn', 'ISBN')?>
                        <?= Form::text('isbn', null, ['class' => 'form-control input-book'])?>
                    </div>
                    <?= Form::hidden('authorId', $authorId)?>
                    <?= Form::submit('Submit', ['class' => 'form-control submit-book'])?>
                    <?= Form::close()?>
                </div>
            </div>

        </div>
    </div>
@endsection
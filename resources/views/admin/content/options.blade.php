@extends('admin.layout.app')

@section('title')Список опций товаров@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Список опций товаров
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">{{Setting::get('config.sitename')}}</a></li>
                <li class="active">Список опций товаров</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Список опций</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><center>Имя</center></th>
                                            <th><center>Цена</center></th>

                                            <th><center>Управлять</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($options as $option)
                                        <tr>
                                            <td>{{$option->name}}</td>
                                            <td>{{$option->price}}</td>

                                            <td><center>
                                                <div class="btn-group text-center">
                                                    <a href='{{URL::to('/content/options/edit/'.$option->id)}}' class="btn btn-warning btn-xs">редактировать</a>
                                                    <button type="button" data-id="{{$option->id}}" class="btn btn-danger btn-xs remove">удалить</button>
                                                </div>
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-solid">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="{!! URL::to('content/options/add'); !!}" class="btn btn-block btn-primary btn-flat">Создать опцию</a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('body').on('click', '.remove', function(event) {
                event.preventDefault();
                var id=$(this).attr('data-id');
                bootbox.confirm("Действительно хотите удалить опцию?", function(result) {
                    if (result == true) {
                        var data={ _token : CSRF_TOKEN, _method: 'DELETE', id : id };
                        //console.log(id);
                        $.ajax({
                            type: 'POST',
                            url: SYS_URL+'/content/options/delete/'+id,
                            data: data,
                            //dataType: 'html',
                            success: function(html) {
                                window.location = SYS_URL+'/content/options'
                            }
                        });
                    }
                    else {
                    }
                });
            });
            //jQuery UI sortable for the todo list
        });
    </script>
@endpush
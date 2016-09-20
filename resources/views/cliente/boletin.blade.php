@extends('layout')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ URL::asset('css/email.css') }}" />
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
      <div class="mail-box">
        <aside class="sm-side">
            <div class="user-head">
                <a class="inbox-avatar" href="javascript:;">
                    <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                </a>
                <div class="user-name">
                    <h5><a href="#">{{ Auth::user()->nombre }}</a></h5>
                    <span><a href="#">{{ Auth::user()->email }}</a></span>
                </div>
                <a class="mail-dropdown pull-right" href="javascript:;">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
            <div class="inbox-body">

                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Compose</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">To</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Cc / Bcc</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="" id="cc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Subject</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Message</label>
                                        <div class="col-lg-10">
                                            <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>
                                            <button class="btn btn-send" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
            <ul class="inbox-nav inbox-divider">
                <li class="active">
                    <a href="{{url('cliente')}}"><i class="fa fa-inbox"></i> clientes <span class="label label-danger pull-right"></span></a>

                </li>
                <li>
                    <a href="{{url('boletin')}}"><i class="fa fa-bookmark-o"></i> Crear Boletín</a>
                </li>
            </ul>

        </aside>
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>Inbox</h3>

            </div>
            <div class="inbox-body">
                <div class="mail-option">
                    <div class="chk-all">
                        <input type="checkbox" onclick="marcar(this);" />Todos
                        <hr/>
                    </div>

                    <div class="btn-group">
                        <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                            <i class=" fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="btn-group hidden-phone">
                        <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                            More
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                            <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a data-toggle="dropdown" href="#" class="btn mini blue">
                            Move to
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                            <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>

                    <ul class="unstyled inbox-pagination">
                        <li><span>1-50 of 234</span></li>
                        <li>
                            <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                        </li>
                        <li>
                            <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                        </li>
                    </ul>
                </div>
                <div>
                     <form class="form-horizontal" role="form" method="POST" action="{{url('cliente/boletin')}}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                         <div class="form-group">

                             <label class="col-md-6 control-label">Asunto</label>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" name="asunto" value="{{ old('asunto') }}">
                             </div>


                         </div>
                         <br>

                        <table class="table table-inbox table-hover">
                            <tbody>
                            <tr class="">
                                <th class="inbox-small-cells">
                                <th class="view-message">Clave </th>
                                <th class="view-message">Nombre </th>
                                <th class="view-message">Correo </th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="inbox-small-cells">
                                        <label>

                                            <input type="checkbox" name="ch[]" value="{{ $user->registration_token }}">
                                        </label>
                                    </td>
                                    <td class="view-message">{{ $user->idUsuario }}</td>
                                    <td class="view-message">{{ $user->nombre }}</td>
                                    <td class="view-message">{{ $user->email }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                         <div class="form-group">

                             <div class="col-md-6">
                                 <br>
                                 <br>
                                 <button type="submit" class="btn btn-primary">Enviar Boletín</button>
                             </div>
                         </div>


                    </form>
                </div>

            </div>
        </aside>

    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/seleccionar.js"></script>
<script src="js/main.js"></script>
</body>
@endsection
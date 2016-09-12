@extends('layout')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ URL::asset('css/email.css') }}" />
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
   <header>
       <script type="text/javascript">
           function marcar(source)
           {
               //obtenemos todos los controles del tipo Input
               checkboxes=document.getElementsByTagName('input');
               //recoremos todos los controles
               for(i=0;i<checkboxes.length;i++)
               {
                   //solo si es un checkbox entramos
                   if(checkboxes[i].type == "checkbox")
                   {
                       //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
                       checkboxes[i].checked=source.checked;

                   }
               }
           }
       </script>
   </header>
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
                    <a href="#"><i class="fa fa-inbox"></i> clientes <span class="label label-danger pull-right"></span></a>

                </li>
                <li>
                    <a href="#"><i class="fa fa-envelope-o"></i> Enviar Boletín</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bookmark-o"></i> Crear Boletín</a>
                </li>
                <li>
                    <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right"></span></a>
                </li>
                <li>
                    <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
                </li>
            </ul>

            <div class="inbox-body text-center">
                <div class="btn-group">
                    <a class="btn mini btn-primary" href="javascript:;">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a class="btn mini btn-success" href="javascript:;">
                        <i class="fa fa-phone"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a class="btn mini btn-info" href="javascript:;">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
            </div>

        </aside>
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>Inbox</h3>
                <form action="#" class="pull-right position">
                    <div class="input-append">
                        <input type="text" class="sr-input" placeholder="Search Mail">
                        <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
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
                                <input type="checkbox" class="mail-checkbox">
                            </td>
                            <td class="view-message">{{ $user->idUsuario }}</td>
                            <td class="view-message">{{ $user->nombre }}</td>
                            <td class="view-message">{{ $user->email }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </aside>

    </div>
</div>
@endsection
@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar de sesión</div>
				<div class="panel-body">
					@include('partials/errors')
					@include('partials/success')
					<form class="form-horizontal" role="form" method="POST" action="{{route('login')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Usuario</label>
							<div class="col-md-6">
							  <input name="email" type="email" value="{{old('email')}}" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña </label>
							<div class="col-md-6">
								<input name="password" type="password"  class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">Recordar
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Iniciar
								</button>

								<a href="/password/email">olvide</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

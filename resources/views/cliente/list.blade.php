<script type="text/javascript">
    function marcar(source)
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }
</script>
<table class="table table-striped">
    <tr>
        <th>Full name</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <br>
            <input type="checkbox" name="dkkd"> Opcion 1
            <br>
            <td>{{ $user->idUsuario }}</td>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach

</table>
<input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos
<hr/>
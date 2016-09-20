$("#btnMiBotonsito").click(function(){

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
});


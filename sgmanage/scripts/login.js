function init()
{

  //alert("entra");
}


function login()
{
    //alert("entra");

    var logina = $("#usuario").val();
    var clavea = $("#contrasena").val();

    // alert(logina);
    // alert(clavea);

         $.post("ajax/usuario.php?op=verificar",
            {"logina":logina,"clavea":clavea},
            function(data)
        {
            data = JSON.parse(data);

            if (data!=null)
            {

                $(location).attr("href","index.php");

                                
            }
            else
            {
                if (data==null) {

                    bootbox.alert("Usuario y/o Password incorrectos");
                    
                }
                
            }
        });
}



init();

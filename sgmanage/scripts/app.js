let arrImages = [];

let myDropzone = new Dropzone('.dropzone', {
  url:'/youtube/dropzone/',
  maxFilesize:20,
  maxFiles:50,
  acceptedFiles:'image/jpeg, image/png, image/jpg',
  addRemoveLinks:true,
  dictRemoveFile:'Quitar'
})

myDropzone.on('addedfile', file => {
  arrImages.push(file);
  document.getElementById("caja_subir").style.backgroundImage = "";
})

myDropzone.on('removedfile', file => {
  let i = arrImages.indexOf(file);
  arrImages.splice(i, 1);
})

function subir_img()
{
   var idproducto = $("#idproducto").val();
   arrImages.push(idproducto);

  let not = [];
  for(let i=0; i<arrImages.length; i++) {
    let imgData = new FormData();
    // alert(arrImages[i])
    if (arrImages[i]=="[object File]") {
      // alert("es objeto");
      imgData.append('file', arrImages[i]);
    }else{
      // alert("no es objeto");
      imgData.append('idproducto', arrImages[i]);
    }

    fetch('upload.php', {
      method:'POST',
      body:imgData
    }).then(res => res.json()).then(data => {
      not.push(data);
    });
  }

  if (!not.includes('fail')) {
     
    var tam_arr = (arrImages.length)*2000;
     setTimeout(func, tam_arr);
     function func(){
         
        var idproducto = $("#idproducto").val();
        $.post("ajax/productos.php?op=actualizar_nombre2",{idproducto:idproducto},function(data, status)
        {
          data = JSON.parse(data);

          $.post("ajax/productos.php?op=listar_img_prod&idproducto="+idproducto,function(r){
            $("#box_imagenes").html(r);		
            bootbox.alert("Producto actualizado exitosamente");
            vaciar_caja();
          });	

        });	

     }

  } else {
    alert('Error');
  }
}

function vaciar_caja()
{

    var tam_arr = arrImages.length;
    //alert(tam_arr);
    arrImages.length=arrImages.length-tam_arr
    $(".dz-processing").empty();

    document.getElementById("caja_subir").style.backgroundImage = "url('images/upload.png')";
    document.getElementById("caja_subir").style.backgroundRepeat = "no-repeat";  
    document.getElementById("caja_subir").style.backgroundPosition = "center center";
    document.getElementById("box_imagenes_new").style.display = "none";
}

// document.getElementById('send').addEventListener('click', () => {
//   let not = [];
//   for(let i=0; i<arrImages.length; i++) {
//     let imgData = new FormData();
//     imgData.append('file', arrImages[i]);

//     fetch('upload.php', {
//       method:'POST',
//       body:imgData
//     }).then(res => res.json()).then(data => {
//       not.push(data);
//     });
//   }

//   if (!not.includes('fail')) {
//     alert('Guardado');
//   } else {
//     alert('Error');
//   }
// })

$(document).ready(function(){
    $('#busqueda').focus()
    buscar_datos('')
    $('#busqueda').on('keyup', function(){
     var busqueda = $('#busqueda').val()  
     buscar_datos(busqueda) 
    })
    function buscar_datos(busqueda){ 
       
    $.ajax({
      type: 'POST',
      url: 'prueba.php',
      data: {'busqueda': busqueda},
      
    })
    .done(function(resultado){
         
       $('#datos').html(resultado)
    })
    .fail(function(){
        console.log('error')
    //   alert('Hubo un error :(')
    })
   
    }
})


    /*Se accede con getElementId al que tiene de id sidebarCollpase, en este caso es el menu de hamburguesa, al
    darle click se activa la funcion que lo q hace es q oculta o activa el sidebar usando la classList.Toggle() */
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
    });

    
    $(document).ready( function () {
      $('#Table').DataTable({
        scrollY: 200,
        scrollX: true,
        "bPaginate": false,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
      },
      });
    } );

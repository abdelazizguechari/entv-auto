
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Supprimer cette donnée?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimez-le!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Supprimé!',
                    'Votre fichier a été supprimé.',
                    'success'
                
            
       
        
                      )
                    }
                  }) 


    });

  });

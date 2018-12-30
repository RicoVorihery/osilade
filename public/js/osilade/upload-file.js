 var reinitilizeFields = function(){
    $("#message").removeClass('alert-danger');
    $("#message").removeClass('alert-success');
    $("#message").css('display','none');
    $(".form_dtl input").val('');
    $(".form_dtl textarea").val('');

    $('div.reference_dtl_container').html('');
  }


$(function(){
  $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('[name="_token"]').val()
      }
    });

    $(document).on("submit", "#clientForm", function(e){
      e.preventDefault();
      $.ajax({
        method: $(this).attr('method'),
        url : $(this).attr('action'),
        data: new FormData(this),
        dataType:"json",
        contentType: false,
        cache: false,
        processData:false
      })
      .success(function(data){
          $("#message").removeClass('alert-danger');
          $("#message").removeClass('alert-success');

          $("#message").css('display','block');
          $("#message").html(data.message);
          $("#message").addClass(data.class_name);

          if(data.ok=="ok")
          {
            reinitilizeFields();

            id_client = $('select.client-select').val();

            $.ajax({
              method : 'GET',
              url : '/references/getReferencesByIdClient/{id_client}',
              data : {id_client :id_client}
            })
            .done(function(data){

              $('div.references_container').html(data);

              $('select.client-select').select2({
                  placeholder:"selectionnez un...",
                  allowClear: false
              });

            }); //done


          }

      })//done
      .fail(function(data){
        console.log("ERREUR");

        console.log(data);
      });

    }); //on submit
});
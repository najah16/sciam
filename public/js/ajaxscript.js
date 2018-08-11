           /* $(document).on('submit',"#VisitorRegister", function(e){
                e.preventDefault();
                var urls = $(this).attr('action');
                var  token = $('input[name=_token]').val();
                var num_piece = $('#num_piece_1').val();
                var type_piece = $('#type_piece').val();
                var nom = $('#nom_1').val();
                var prenoms = $('#prenoms_1').val();
                var contact = $('#contact_1').val();
                var lib_etage = $('#lib_etage_1').val();
                var lib_direction = $('#direction_1').val();
                var contact_direction = $('#contact_direction_1').val();
                var nom_hote = $('#nom_hote_1').val();
                var prenoms_hote = $('#prenoms_hote_1').val();
                
                $.ajax({
                    type: 'POST',
                    url: urls,
                    data: {
                        '_token': token, 
                        'num_piece': num_piece, 
                        'type_piece': type_piece,
                         'nom': nom, 
                         'prenoms': prenoms,
                          'contact': contact,
                          'lib_etage': lib_etage,
                          'lib_direction': lib_direction,
                          'contact_direction': contact_direction,
                          'nom_hote': nom_hote,
                          'prenoms_hote': prenoms_hote
                      },
                    dataType: 'json',
                    success: function(response){
                         $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg').html('Visiteur enregistré avec succès');


                    },
                    error: function(response)
                    {
                        if(response===422){
                            var errors = response.responseJSON;
                            $.each(json.responseJSON, function (key, value){
                                $('.'+key+'-error').html(value);
                            });
                        } else {
                            $('#msg').removeClass('alert-success');
                            $('#msg').addClass('alert-danger');
                            $('#msg').html('Données mal renseignées, veuillez recommencer.');
                        }
                    }
                });
        });*/
// autocomplete visitor script 
     
            $(document).on('focus','.autocomplete_txt',function(){
              var type = $(this).data('type');
              var autoType = 'num_piece';
              var urls = '/visite_search';
               $(this).autocomplete({
                   minLength: 2,
                   source: function( request, response ) {
                        $.ajax({
                            url: urls,
                            dataType: "json",
                            data: {
                                term : request.term,
                                type : type,
                            },
                            success: function(data) {
                                var array = $.map(data, function (item) {
                                   return {
                                       label: item[autoType],
                                       value: item[autoType],
                                       data : item
                                   }
                               });
                                response(array)
                            },
                           error: function(data) {
                            alert('no');
                           }
                        });
                   },
                   select: function( event, ui ) {
                       var data = ui.item.data;           
                       id_arr = $(this).attr('id');
                       id = id_arr.split("_");
                       elementId = id[id.length-1];
                       $('#num_piece_'+elementId).val(data.num_piece);
                       $('#nom_'+elementId).val(data.nom);
                       $('#prenoms_'+elementId).val(data.prenoms);
                       $('#contact_'+elementId).val(data.contact);
                   }
               });
               
               
            });

    // end script 
    // hote live search
   $(document).on('focus','.autocomplete_hote',function(){
              var type = $(this).data('type');
              var autoType = 'nom_hote';
              var urls = '/hote_search';
               $(this).autocomplete({
                   minLength: 2,
                   source: function( request, response ) {
                        $.ajax({
                            url: urls,
                            dataType: "json",
                            data: {
                                term : request.term,
                                type : type,
                            },
                            success: function(data) {
                                var array = $.map(data, function (item) {
                                   return {
                                       label: item[autoType],
                                       value: item[autoType],
                                       data : item
                                   }
                               });
                                response(array)
                            },
                           error: function(data) {
                            alert('no');
                           }
                        });
                   },
                   select: function( event, ui ) {
                       var data = ui.item.data;           
                       id_arr = $(this).attr('id');
                       id = id_arr.split("_");
                       elementId = id[id.length-1];
                       $('#nom_hote'+elementId).val(data.nom_prenom_hote);
                       $('#direction_'+elementId).val(data.direction);
                   }
               });     
            });
   // datepicker strict
   (function($){
      $.fn.datepicker.dates['fr'] = {
      days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
      daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
      daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
      months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
      monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
      today: "Aujourd'hui",
      monthsTitle: "Mois",
      clear: "Effacer",
      weekStart: 1,
      format: "dd-mm-yyyy"
      };
      }(jQuery));

      $('.datepicker').datepicker({
      language: 'fr',
      autoclose: true,
      todayHighlight: true
      })
      // timepicker
      $('.timepicker').timepicker({
          timeFormat: 'HH:mm:ss',
          interval: 30,
          minTime: '08',
          maxTime: '20:00pm',
          defaultTime: '00',
          startTime: '08:00',
          dynamic: false,
          dropdown: true,
          scrollbar: true
      });
    // date search ajax script 
   $(document).ready(function(){
    $('#dateSearch').click(function(e){
        e.preventDefault();
        var urls = $(this).attr('action');
        var  token = $('input[name=_token]').val();
        var date = $('#date').val();
        var hstart = $('#hstart').val();
        var hend = $('#hend').val();
         $.ajax({
                    type: 'POST',
                    url: urls,
                    data: {
                        '_token': token, 
                        'date': date,
                        'hstart': hstart,
                        'hend': hend
                      },
                    dataType: 'json',
                    success: function(data){
                        $('#tab_div').remove();
                        $('#third_tab').removeClass("hidden");
                        $('#third_body').html(data.table_data);
                    },
                    error: function(response)
                    {
                        if(response===422){
                            var errors = response.responseJSON;
                            $.each(json.responseJSON, function (key, value){
                                $('.'+key+'-error').html(value);
                            });
                        } else {
                            $('#msg').removeClass('alert-success');
                            $('#msg').addClass('alert-danger');
                            $('#msg').html('Données mal renseignées, veuillez recommencer.');
                        }
                    }
                });
    });
   });
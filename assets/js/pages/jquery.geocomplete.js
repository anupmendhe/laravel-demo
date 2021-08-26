

        var glob_autocomplete;
        var glob_component_form = 
                        {
                            street_number: 'short_name',
                            route: 'long_name',
                            locality: 'long_name',
                            administrative_area_level_1: 'long_name',
                            postal_code: 'short_name',
                            country : 'long_name',
                            political: 'short_name',
                        };

        var glob_options = {};
        glob_options.types = ['establishment','geocode'];


        function initAutocomplete(country_code) 
        {
            var address = $('#autocomplete').val();
            if(address!=undefined){
                glob_autocomplete = false;
                glob_autocomplete = initGoogleAutoComponent($('#autocomplete')[0],glob_options,glob_autocomplete);    
            }
        }


        function initGoogleAutoComponent(elem,options,autocomplete_ref)
        {
            autocomplete_ref = new google.maps.places.Autocomplete(elem,options);
            autocomplete_ref = createPlaceChangeListener(autocomplete_ref,fillInAddress);

            return autocomplete_ref;
        }

        function createPlaceChangeListener(autocomplete_ref,fillInAddress)
        {
            autocomplete_ref.addListener('place_changed', fillInAddress);
            return autocomplete_ref;
        }

        function destroyPlaceChangeListener(autocomplete_ref)
        {
            google.maps.event.clearInstanceListeners(autocomplete_ref);
        }

        function fillInAddress() 
        {
            
            var place = glob_autocomplete.getPlace();
            console.log(place);
            $('#latitude').val(place.geometry.location.lat());
            $('#longitude').val(place.geometry.location.lng());
            
            for (var component in glob_component_form) 
            {
                $("#"+component).val("");
                $("#"+component).attr('disabled',false);
            }
            
            if(place.address_components.length > 0 )
            {
              $.each(place.address_components,function(index,elem){

                  var addressType = elem.types[0];
                  
                  if(addressType!=undefined){
                    
                    
                    if(glob_component_form[addressType]!=undefined){
                      var val = elem[glob_component_form[addressType]];
                      $("#"+addressType).val(val) ;
                      console.log(elem[glob_component_form[addressType]]) ;
                    }
                  }
              });  
            }
          }

  $("#address").on("change",function(){
        
        $("input[name='address']").next().text("");      
  })
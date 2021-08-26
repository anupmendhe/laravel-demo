
function initialize() {
  var bounds;

  var map = new google.maps.Map(document.getElementById('map-box'), {
    zoom:   0,
    center: new google.maps.LatLng(latitude, longitude),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  bounds = new google.maps.LatLngBounds();

 
  var infowindow = new google.maps.InfoWindow();
  var markers=[];
  var names=[];
  var marker, i,k;
 
  for(i=0;i<chefs.length;i++){
    
    
    var business_latitude = chefs[i]['get_chef_details']['get_chef']['pickup_latitude'];
    var business_longitude = chefs[i]['get_chef_details']['get_chef']['pickup_longitude'];
    
    var first_name =  chefs[i]['get_chef_details']['first_name'];
    var last_name =  chefs[i]['get_chef_details']['last_name'];
    names[i] = first_name+' '+last_name;
    var pickupinfowindow = new google.maps.InfoWindow({
                                      content: name
                              });
    marker = new SlidingMarker({
                                        position   : new google.maps.LatLng(business_latitude, business_longitude),
                                        map        : map,
                                        title      : name
                                       
                                    });

      bounds.extend(marker.getPosition());

      
     
      var listener = google.maps.event.addListener(map, "idle", function() { 
            if (map.getZoom() > 16) map.setZoom(16); 
            google.maps.event.removeListener(listener); 
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                    infowindow.setContent('<div class="modal-content">'+
                      '<div class="modal-body">'+
                      '<div class="review-detais">'+
                              '<div class="boldtxts"></div>'+
                              '<div class="rightview-txt">'+names[i]+'</div>'+
                              '<div class="clearfix"></div>'+
                          '</div>');
                    infowindow.setOptions({maxWidth: 200});
                    infowindow.open(map, marker);
                  }
            }) (marker, i));
        map.fitBounds(bounds);
  } 
  
}





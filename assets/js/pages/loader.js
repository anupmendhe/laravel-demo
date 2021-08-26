/* Processing Overlay */
    function showProcessingOverlay()
    {
       var doc_height = $(document).height();
       var doc_width = $(document).width();
       var spinner_html = "";
       for(var i = 1; i<=9; i++)
       {
          spinner_html+= "<div class='sk-cube sk-cube"+i+"'></div>";
       }

       $("body").append("<div id='global_processing_overlay'><div class='sk-cube-grid'>"+spinner_html+"</div></div>");


       $("#global_processing_overlay").height(doc_height)
                                     .css({
                                       'opacity' : 0.5,
                                       'position': 'fixed',
                                       'top': 0,
                                       'left': 0,
                                       'background-color': 'black',
                                       'width': '100%',
                                       'z-index': 999999,
                                       'text-align': 'center',
                                       'vertical-align': 'middle',
                                       'margin': 'auto',

                                     });
    }

    function hideProcessingOverlay()
    {
      $("#global_processing_overlay").remove();
    }
$(document).ready(function(){    
    $(".head-cart-box").on("click", function(){
        $(this).next(".cart-dropdown-section").slideToggle("slow");
    });   
    $( function() {
        var spinner = $( "#spinner,#spinner1,#spinner2" ).spinner();    
        $( "#disable" ).on( "click", function() {
        if ( spinner.spinner( "option", "disabled" ) ) {
            spinner.spinner( "enable" );
        } else {
            spinner.spinner( "disable" );
        }
        });
        $( "#destroy" ).on( "click", function() {
        if ( spinner.spinner( "instance" ) ) {
            spinner.spinner( "destroy" );
        } else {
            spinner.spinner();
        }
        });        
        $( "#setvalue" ).on( "click", function() {
        spinner.spinner( "value", 5 );
        });

        $( "button" ).button();
    });
    $(".cart-dropdown-item-head").on("click", function(){
        $(this).siblings(".cart-items-main").slideToggle("slow");
    });
});
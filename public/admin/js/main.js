$(window).on("load", function(){
    // stretchBlock(".wrapper");
    // stretchBlock(".login-wrapper");

    $("h1").on("click", notification);




});

// $(window).on("resize", function(){
//     stretchBlock(".wrapper");
//     stretchBlock(".login-wrapper");
//
// });



function stretchBlock(el){
    let h = window.innerHeight;
    h += "px";
    $(el).height(h);
}



function notification(param){
    $(".notification").removeClass("hidden").addClass("animated bounceInUp ");
    $(".notification-text").text(param);
    $(".close-notification").on("click", function(){$(".notification").addClass("animated bounceOutDown hidden").removeClass("bounceInUp visible")})
}






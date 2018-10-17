$(window).on("load", function(){
    stretchBlock();

});
$(window).on("resize", function(){
    stretchBlock();

})



function stretchBlock(){
    let h = window.innerHeight;
    h += "px";
    $(".wrapper").height(h);
}
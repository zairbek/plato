window.addEventListener("load", init);

function init() {
    $(document).on("touchmove", false);


    //  ANIMATEDMODAL =========
    $("#demo1").animatedModal({
        color: "rgb(23, 173, 233)",
        animationDuration: ".6s",
        animatedIn: "bounceInDown",
        animatedOut: "bounceOutUp"
    });


    if (typeDevice() == "desktop") {
        $(".phone-number").animatedModal({
            modalTarget: "popupmodal",
            color: "rgba(0,0,0,.0)",
            animationDuration: ".6s",
            animatedIn: "bounceIn",
            animatedOut: "bounceOut",
        });
    }
    // end  ANIMATEDMODAL =========
}



getId = (attr) => document.getElementById(attr);

// ===================================================================
function typeDevice (){
    // функция для определение девайса
    // Возвращаеть "desktop" - "mobile"
    window.device = {};

    var _user_agent = window.navigator.userAgent.toLowerCase();

    var device_desktop = ['windows', 'x11', 'macintosh'];
    var device_mobile = ['android', 'blackberry', 'bb10', 'rim', 'ios', 'mobile', 'ipad', 'ipod', 'iphone', 'phone', 'touch'];

    desktop = function(){
        for(let i = 0; i <= device_desktop.length; i++){
            if(_user_agent.indexOf(device_desktop[i]) !== -1)
                return _user_agent.indexOf(device_desktop[i]) !== -1;
        }
    }
    mobile = function(){
        for(let i = 0; i <= device_mobile.length; i++){
            if(_user_agent.indexOf(device_mobile[i]) !== -1)
                return _user_agent.indexOf(device_mobile[i]) !== -1
        }
    }

    if(desktop())
        return "desktop";
    if(mobile())
        return "mobile";
};


// =====================================================================================



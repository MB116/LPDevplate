//This is loading by iframe map which doesn't block the load event
function createIframe(){
    var i = document.createElement("iframe");
    i.src = "/map.html";
    i.scrolling = "auto";
    i.frameborder = "0";
    i.width = "600px";
    i.height = "400px";
    document.getElementById("jsModalWindowContainer").appendChild(i);
};

// Check for browser support of event handling capability
if (window.addEventListener)
    window.addEventListener("load", createIframe, false);
else if (window.attachEvent)
    window.attachEvent("onload", createIframe);
else window.onload = createIframe;/**
 * Created by Kanat on 03.02.2015.
 */

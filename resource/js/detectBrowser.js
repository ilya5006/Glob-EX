checkBrowser = false;

function detectIE() 
{
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) { return true; }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) { return true; }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) { return true; }

    return false;
}

var checkBrowser = detectIE();

if (checkBrowser != false)
{
    document.write('<div style="text-align: center; font-size: 36px; text-transform: uppercase; padding: 15px; position: fixed; width: 100%; z-index: 5000; background-color: white; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.25); top: 0; "> Внимание! Ваш браузер устарел! </div>');
}
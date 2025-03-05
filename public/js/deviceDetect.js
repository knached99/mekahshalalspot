const displayText = document.getElementById('displayText');

function isMobile(){

    const userAgent = navigator.userAgent.toLowerCase();

    // common devices and browsers 

    const devices = [

        'android', 'iphone', 'ipod', 'ipad', 'blackberry', 'windows phone', 'opera mini', 'mobile', 'webos', 'nokia',
    ];

    // now we check to see if the user agent contains any of the mobile device keywords 

    for(let i = 0; i < devices.length; i++){
        if(userAgent.indexOf(devices[i]) != -1){
            return true; // It is a mobile device 
        }
    }
    return false; // It's a desktop device
}

if(isMobile()){

    displayText.innerHTML = 'Press and hold to zoom in on the image';
}

else{
    displayText.innerHTML = 'Hover on image to zoom in';
}
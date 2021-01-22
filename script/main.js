

//Footer cookies

    var footer = document.querySelectorAll("#footer")[0];
    var footerP = document.querySelectorAll("#footerP")[0];
    var fTrigger = document.querySelectorAll("#fTrigger")[0];
    var noText = document.querySelectorAll("#no")[0];
    
    fTrigger.addEventListener ("click", showRevoke, false);
    
    function showRevoke (event) {
        footer.innerHTML="Cookies were accepted. Would you like to revoke?";
        footerP.innerHTML=" ";
        fTrigger.innerHTML="REVOKE";
        noText.innerHTML="CONFIRM ACCEPTANCE";
        fTrigger.addEventListener ("click", back, false);
    }
    
    
    function back(event){
        fTrigger.removeEventListener ("click", back, false);
        footer.innerHTML="THIS WEBSITE USES COOKIES";
        footerP.innerHTML="We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services. You consent to our cookies if you continue to use our website.";
        fTrigger.innerHTML="ACCEPT";
        noText.innerHTML="DECLINE";
    }

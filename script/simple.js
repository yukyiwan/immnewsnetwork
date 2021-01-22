    var toggle = document.querySelectorAll("#switch")[0];
    
    toggle.addEventListener("change", obvious, false);
    
    document.addEventListener("keydown", ()=>{
        
        if ((toggle.checked==false) && (event.code == "KeyA" && (event.ctrlKey || event.metaKey))) {
            event.preventDefault();
            on();
            toggle.checked=true;} 
        
        else if ((toggle.checked) && (event.code == "KeyA" && (event.ctrlKey || event.metaKey))) {
            event.preventDefault();
            off();
            toggle.checked=false;}
        
    });
    
    var html = document.querySelector("html");
    var main = document.querySelector("main");
    var ul = document.querySelectorAll("ul");
    var h2 = document.querySelectorAll("h2");
    var p = document.querySelectorAll("p");
    var section= document.querySelectorAll("section");
    
    function obvious (){
        if (toggle.checked) {
            
        on ();
             
        } else{
             
        off();
    
        }
    }
    
    
    function on () {
        
        html.setAttribute("style", "font-size:20px" );
        
        main.setAttribute("style", "margin: 200px 0 200px 0;" );
        
        for (i=0; i<ul.length; i++) {
        ul[i].setAttribute("style", "color: black")}
       
        for (i=0; i<h2.length; i++) {
        h2[i].setAttribute("style", "color: black")}
        
        for (i=0; i<p.length; i++) {
        p[i].setAttribute("style", "line-height: 1.5")}
        
        for (i=0; i<section.length; i++) {
        section[i].setAttribute("style", "background-color: white; padding:5%")}
             
        } 
        
    function off (){
        
        html.removeAttribute("style");
        
        main.removeAttribute("style");
        
        for (i=0; i<ul.length; i++) {
        ul[i].removeAttribute("style")} 
        
        for (i=0; i<h2.length; i++) {
        h2[i].removeAttribute("style")}
        
        for (i=0; i<p.length; i++) {
        p[i].removeAttribute("style")}
        
        for (i=0; i<section.length; i++) {
        section[i].removeAttribute("style")} 
             
    
        }
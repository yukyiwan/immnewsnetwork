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
    var h1 = document.querySelectorAll("h1");
    var p = document.querySelectorAll("p");
    var section= document.querySelectorAll("section");
    
    function obvious (){
        if (toggle.checked) {
            
        on ();
             
        } else{
             
        off();
    
        }
    }
    
    
    function on (){
        
        html.setAttribute("style", "font-size:20px" );        
        
        main.setAttribute("style", "margin: 200px 0 200px 0;" );
        
        for (i=0; i<ul.length; i++) {
        ul[i].setAttribute("style", "color: black")}
       
        for (i=0; i<h1.length; i++) {
        h1[i].setAttribute("style", "color: black")}
        
        for (i=0; i<p.length; i++) {
        p[i].setAttribute("style", "line-height: 1.5")}
       
        for (i=0; i<section.length; i++) {
        section[i].setAttribute("style", "background-color: white")}
             
        } 
        
    function off () {
             
        html.removeAttribute("style");     
                
        main.removeAttribute("style");
        
        for (i=0; i<ul.length; i++) {
        ul[i].removeAttribute("style")} 
        
         for (i=0; i<h1.length; i++) {
        h1[i].removeAttribute("style")}
        
        for (i=0; i<p.length; i++) {
        p[i].removeAttribute("style")}
       
        for (i=0; i<section.length; i++) {
        section[i].removeAttribute("style")} 

        }
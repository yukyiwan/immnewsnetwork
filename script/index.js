//Dynamic visitor statistics
var table = document.querySelectorAll("tbody")[0];
var visitStat = [
    {month:"December 2020", visits:5100},
    {month:"November 2020", visits:2100},
    {month:"October, 2020", visits:3000},
    {month:"September 2020", visits:1400},
    {month:"August 2020", visits:1500},
    {month:"July 2020", visits:600},
    ];

//Math. floor(Math.random() * 2000),

for (i=0; i<6; i++) {
    var trTag = document.createElement("tr");
    var tdTag= document.createElement("td");
    var tdTag2= document.createElement("td");
    tdTag.appendChild(document.createTextNode(visitStat[i].month));
    trTag.appendChild(tdTag);
    tdTag2.appendChild(document.createTextNode(visitStat[i].visits));
    trTag.appendChild(tdTag2);
    table.appendChild(trTag);
    
}

//toggle
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
    var h1 = document.querySelector("h1");
    var ul = document.querySelectorAll("ul");
    var h2 = document.querySelectorAll("h2");
    var p = document.querySelectorAll("p");
    var section= document.querySelectorAll("section");
    var featured = document.querySelector("#featured");
    var container = document.querySelector(".container");
    var block = document.querySelectorAll(".block");

    function obvious (event){
        if (toggle.checked) { 
        on ();
        } else{
        off();
        }
    }
    
    function on () {
        
        html.setAttribute("style", "font-size:20px" );
        
        main.setAttribute("style", "margin: 200px 0 200px 0;" );
        
        h1.setAttribute("style", "color:black;" );
                
        for (i=0; i<ul.length; i++) {
        ul[i].setAttribute("style", "color: black")}
       
        for (i=0; i<h2.length; i++) {
        h2[i].setAttribute("style", "color: black")}
        
        for (i=0; i<p.length; i++) {
        p[i].setAttribute("style", "line-height: 1.5")}
       
        for (i=0; i<section.length; i++) {
        section[i].setAttribute("style", "background-color: white; padding:5%")}

        featured.setAttribute("style", "border:0; padding:5% 10%;");
        
        container.setAttribute("style", "background-color:white");
        
        for (i=0; i<block.length; i++) {
        block[i].setAttribute("style", "padding:inherit; margin:inherit;")}
        
    }
    
    function off() {
        
        html.removeAttribute("style");
                
        main.removeAttribute("style");
        
        h1.removeAttribute("style");
                
        for (i=0; i<ul.length; i++) {
        ul[i].removeAttribute("style")} 
        
         for (i=0; i<h2.length; i++) {
        h2[i].removeAttribute("style")}
        
        for (i=0; i<p.length; i++) {
        p[i].removeAttribute("style")}
       
        for (i=0; i<section.length; i++) {
        section[i].removeAttribute("style")} 
        
        featured.removeAttribute("style");
        
        for (i=0; i<block.length; i++) {
        block[i].removeAttribute("style")}
        
        container.removeAttribute("style");

        
    }
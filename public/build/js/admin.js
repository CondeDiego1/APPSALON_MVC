const myVinyls={"Ganancias mes actual":0},año={"Ganancias mes anterior":0};function iniciarApp(){mostrarCalculos(),drawPieSlice()}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));const currency=function(t){return new Intl.NumberFormat("es-co",{style:"currency",currency:"COP",minimumFractionDigits:0}).format(t)};async function mostrarCalculos(){const t=await fetch("http://localhost:4000/dashboar/servicio"),a=await t.json(),{0:n,1:i,2:e,3:o,4:s,5:c,6:h,7:r,8:d,9:l}=a;console.log(a),myVinyls["Ganancias mes actual"]=parseFloat(n),myVinyls.año=100-parseFloat(n),myDougnutChart.draw(),año["Ganancias mes anterior"]=parseFloat(l),año.año=100-parseFloat(l),DougnutChart.draw();document.getElementById("citas-actuales").innerText=i;document.getElementById("servicio-preferido").innerText=e;document.getElementById("ganancias-mes").innerText=currency(o);document.getElementById("cantidad_servicios").innerText=s;document.getElementById("cantidad_usuarios").innerText=c;document.getElementById("cantidad_citas").innerText=h;document.getElementById("citas-año").innerText=r;document.getElementById("ganancias-año").innerText=currency(d)}function drawPieSlice(t,a,n,i,e,o,s){t.fillStyle=s,t.beginPath(),t.moveTo(a,n),t.arc(a,n,i,e,o),t.closePath(),t.fill()}var myCanvas=document.getElementById("myCanvas");myCanvas.width=250,myCanvas.height=250;var canvas_año=document.getElementById("canvas_año");canvas_año.width=250,canvas_año.height=250;var Piechart=function(t){if(this.options=t,this.canvas=t.canvas,this.ctx=this.canvas.getContext("2d"),this.colors=t.colors,this.draw=function(){var t=0,a=0;for(var n in this.options.data){var i=this.options.data[n];t+=i}var e=0;for(n in this.options.data){i=this.options.data[n];var o=2*Math.PI*i/t;drawPieSlice(this.ctx,this.canvas.width/2,this.canvas.height/2,Math.min(this.canvas.width/2,this.canvas.height/2),e,e+o,this.colors[a%this.colors.length]),e+=o,a++}for(n in this.options.doughnutHoleSize&&drawPieSlice(this.ctx,this.canvas.width/2,this.canvas.height/2,this.options.doughnutHoleSize*Math.min(this.canvas.width/2,this.canvas.height/2),0,2*Math.PI,"#191C24"),e=0,this.options.data){i=this.options.data[n],o=2*Math.PI*i/t;var s=Math.min(this.canvas.width/2,this.canvas.height/2),c=this.canvas.width/2+s/2*Math.cos(e+o/2),h=this.canvas.height/2+s/2*Math.sin(e+o/2);if(this.options.doughnutHoleSize){var r=s*this.options.doughnutHoleSize/2;c=this.canvas.width/2+(r+s/2)*Math.cos(e+o/2),h=this.canvas.height/2+(r+s/2)*Math.sin(e+o/2)}var d=parseFloat(i).toFixed(1);this.ctx.fillStyle="black",this.ctx.font="bold 18px Nunito",this.ctx.fillText(d+"%",c-15,h+5),e+=o}},this.options.legend){color_index=0;var a="";for(categ in this.options.data)a+="<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div>";this.options.legend.innerHTML=a}},myLegend=document.getElementById("myLegend"),myDougnutChart=new Piechart({canvas:myCanvas,data:myVinyls,colors:["#FFAB00","#ffffff"],doughnutHoleSize:.5,legend:myLegend}),legend_año=document.getElementById("legend_año"),DougnutChart=new Piechart({canvas:canvas_año,data:año,colors:["#FFAB00","#ffffff"],doughnutHoleSize:.5,legend:legend_año});
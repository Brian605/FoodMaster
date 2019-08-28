//variables

//assoc array of dishes and prices
var arr=[];
var items=0;

function initialize(){
var n=document.getElementById("items");

try{
n.innerHTML=items;
}catch(err){
alert(err.message);
}
}

function redirect(){
var ps=[];
var ax=[];
var counter=0;


try{

for(var i in arr){
ps[counter]=i;
ax[counter]=arr[i];
counter++;
}

localStorage.setItem("order",JSON.stringify(ps));
localStorage.setItem("prices",JSON.stringify(ax));
window.location.href="order.html";

}
catch(err){alert(err.message);}

}

function buy(s){
try{
var amount=document.getElementById(s).value;
var n=document.getElementById("items");

arr[s]=amount;
items++;
n.innerHTML=items;

}catch(err){
alert(err.message);
}
}
 
function loadCart(){

var ostr=localStorage.getItem('order');
var pstr=localStorage.getItem('prices');

var order=JSON.parse(ostr);
var price=JSON.parse(pstr);

var table="<table id='orders' style='height=5cm;' role='table' class='table-responsive'><th>Item NO</th><th>Food Name</th><th>Price</th> </table>";
document.getElementById("table").innerHTML=table;

for(var i in order){
var idgen="s"+i;
var row=document.createElement("tr");
row.id=idgen;

var data="<td><span class='label label-default'>"+(parseInt(i)+1)+"</span></td><td><span class='label label-info'>"+order[i]+"</span></td><td> <span class='label label-primary'>Ksh."+price[i]+"</span></td><span class='glyphicon glyphicon-remove' onclick='remove(this.id)' id=\'"+idgen+"\'></span>";

document.getElementById("orders").appendChild(row);
document.getElementById(idgen).innerHTML=data;

}
var total=0;

for(var g in price){
total+=parseInt(price[g]);
}

try{
var trow=document.createElement("tr");
trow.id="totals";

var tdata="<td></td><td><b>Totals</b></td><td id='total'><span class='label label-success'>"+total+"</span></td>";
document.getElementById("orders").appendChild(trow);
document.getElementById("totals").innerHTML=tdata;
}catch(err){alert(err.message);}

}

function remove(s){
var t=document.getElementById(s);
t.style.display="none";
var arr=s.split(/(\d+)/);
var index=parseInt(arr[1]);

var ostr=localStorage.getItem('order');
var pstr=localStorage.getItem('prices');

var order=JSON.parse(ostr);
var price=JSON.parse(pstr);

try{
price.splice(index,1);
order.splice(index,1);
localStorage.setItem("order",JSON.stringify(order));
localStorage.setItem("prices",JSON.stringify(price));
loadCart();
}
catch(err){alert(err.message);}

}

function makeOrder(){
var ostr=localStorage.getItem('order');
var pstr=localStorage.getItem('prices');

var order=JSON.parse(ostr);
var price=JSON.parse(pstr);

for (var i in order){
var name=order[i];
var quot=price[i];


try{
$.ajax({
url:"order.php",
method:"POST",
data:{"name":name,"quot":quot},
success:function(data){
alert(data);
}

});
window.location.replace("Index.php");

}catch(err){alert(err.message);}


}

}

function cancelOrder(){
window.location.replace("Index.php");

}
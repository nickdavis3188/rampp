let mydata = JSON.stringify({ "category":["Drink"]})
window.fetch("./Utils/getProductByCategory.php",{
method: 'POST',
body: mydata,
headers: {"Content-Type": "application/json; charset=utf-8"}
}).then(res=>res.json()).then(function(data) {
  if(data.status == "success"){
    console.log(data)
  }
})
  
let RequisitionNumber = document.querySelector(".regn"); 
let from = document.querySelector(".from"); 
let Subject = document.querySelector(".sub"); 
let Date = document.querySelector(".date2"); 
let ItemName = document.querySelector(".iname"); 
let Description = document.querySelector(".desc"); 
let Qty = document.querySelector(".qty"); 
let UnitPrice = document.querySelector(".upay"); 
let SubTotal = document.querySelector(".subtot"); 
let Summary = document.querySelector(".summ"); 
let PreparedBy = document.querySelector(".prepby"); 
let DatePrepared = document.querySelector(".dateprep"); 
let ConfirmedBy = document.querySelector(".confby"); 
let AuthorizeBy = document.querySelector(".authby"); 
let ApprovedBy = document.querySelector(".appby"); 
let total = document.querySelector("#total"); 
let tbodyy = document.querySelector("#tbodyy"); 
let add = document.querySelector("#add"); 
let submit = document.querySelector("#sub"); 


     
      
let eachData = {
RequisitionNumber:RequisitionNumber.value,
from:from.value,
Subject:Subject.value,
Date:Date.value,
item:[],
Summary:Summary.value,
PreparedBy:PreparedBy.value,
DatePrepared:DatePrepared.value,
ConfirmedBy:ConfirmedBy.value,
AuthorizeBy:AuthorizeBy.value,
ApprovedBy:ApprovedBy.value
}

function displayHtml(params) {

var child = tbodyy.lastElementChild; 
while (child) {
tbodyy.removeChild(child);
    child = tbodyy.lastElementChild;
}

params.item.forEach(function(item,ind) {

let list = document.createElement("tr");

list.innerHTML = `
    
    <td class=" text-left" >${ind}</td>
    <td class=" text-left" >${item.ItemName}</td>
    <td class=" text-left" >${item.Description}</td>
    <td class=" text-left" >${item.UnitPrice}</td>                      
    <td class=" text-left" >${item.Qty}</td>   
    <td class=" text-left" >${item.SubTotal}</td>                    
    <td class="iext-center">                                                                       
        <i class="ti-trash text-danger btn-icon-append" style="font-size: 24px" onClick="remove(${ind})">                                                                         
    </td>
`;
tbodyy.appendChild(list);
})
}



if (eachData.item.length < 1) {

let Thtml = `<tr>
        <td></td>
        <td></td>
        <th class='text-primary text-center'>NO ITEM LISTED</th>
        <td></td>
        <td></td>
        <td></td>
        </tr>`
tbodyy.innerHTML = Thtml
}

add.addEventListener("click",(e)=>{
console.log("I AM CLICKED")
var child = tbodyy.lastElementChild; 
while (child) {
tbodyy.removeChild(child);
    child = tbodyy.lastElementChild;
}

let subIsem = {
ItemName:ItemName.value,
Description:Description.value,
UnitPrice:UnitPrice.value,
Qty:Qty.value,
SubTotal:UnitPrice.value * Qty.value
}

eachData.item.push(subIsem)
displayHtml(eachData)

// clear inputs
ItemName.value = "";
Description.value = "";
UnitPrice.value = "";
Qty.value = "";

})


function remove(index){
eachData.item.splice(index,1)
if (eachData.item.length < 1) {

let Thtml = `<tr>
            <td></td>
            <td></td>
            <th class='text-primary text-center'>NO ITEM LISTED</th>
            <td></td>
            <td></td>
            <td></td>
        </tr>`
tbodyy.innerHTML = Thtml
}else{
displayHtml(eachData)
}

}


submit.addEventListener("click",(e)=>{
if(from.value == "" || Subject.value == "" || Date.value == "" || Summary.value == "" || PreparedBy.value == "" || DatePrepared.value == ""|| ConfirmedBy.value == "" || AuthorizeBy.value == "" || ApprovedBy.value == ""){
alert("please confirm your input")
}
console.log(eachData)
})
  //   console.log("defaultd",eachData.item)

  
  // console.log("general display",eachData.item)

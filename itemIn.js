let eachData = {
    "RequisitionNumber":"",
    "from": "",
    "Subject":"",
    "Date":"",
    "item":[],
    "Summary": "",
    "DatePrepared": "",
    "Total":0
    }

   ////////////////////////////////// // dependencies/////////////////////////////////////////////////
  function LoadingDisplay(status,ele){
    if (status == "fail") {
      var child = ele.lastElementChild; 
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }

        ele.innerText = "Loading...";
        let newSpan = document.createElement("span");
        newSpan.classList.add("spinner-border");
        newSpan.classList.add("spinner-border-sm");

        ele.appendChild(newSpan);
      
    }else{

      var child = ele.lastElementChild; 
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }
        
        ele.innerText = "Save";
        let newI = document.createElement("i");
        newI.classList.add("ti-save");
        newI.classList.add("btn-icon-append");

        ele.appendChild(newI);
    }
  }

      // next
    function displayHtml(obj,ele){

        let child = ele.lastElementChild; 
        while (child) {
          ele.removeChild(child);
            child = ele.lastElementChild;
        }

        obj.item.forEach(function(item,ind) {

          let list = document.createElement("tr");

          list.innerHTML = `
              
              <td class=" text-left" >${ind}</td>
              <td class=" text-left" >${item.ItemName}</td>
              <td class=" text-left" >${item.Description}</td>
              <td class=" text-left" >${item.UnitPrice}</td>                      
              <td class=" text-left" >${item.Qty}</td>   
              <td class=" text-left" >${item.SubTotal}</td>                    
              <td class="iext-center">                                                                       
                  <i class="ti-trash text-danger btn-icon-append deli" style="font-size: 24px" onClick="remove(${ind})" >                                                                         
              </td>
          `;
          ele.appendChild(list);
        })
    }
    // next
    function clearItenListAndElements(ele,ele2){
      while(eachData.item.length > 0) {
        eachData.item.pop();
      }

      var child = ele.lastElementChild; 
      while (child) {
        ele.removeChild(child);
          child = ele.lastElementChild;
      }

      if (eachData.item.length < 1) {

        let Thtml = `<tr>
                <td></td>
                <td></td>
                <th class=' text-center' style="color:#17a2b8;">NO ITEM LISTED</th>
                <td></td>
                <td></td>
                <td></td>
                </tr>`
        ele.innerHTML = Thtml
      }

      ele2.innerText = 0.00
    }
/////////////////////////////////////// End dependencies/////////////////////////////////////////////

    function addItem(btn) {
     
      // btn.addEventListener("click",(e)=>{

        let ItemName = document.querySelector(".iname"); 
        let Description = document.querySelector(".desc"); 
        let Qty = document.querySelector(".qty"); 
        let UnitPrice = document.querySelector(".upay"); 
        let SubTotal = document.querySelector(".subtot");
        let tbodyEle = document.querySelector("#tbodyy"); 
        let Maintotal = document.querySelector("#total"); 
        let RequisitionNumber1 = document.querySelector(".regn");  
        
        if(ItemName.value == "" || Description.value == "" || UnitPrice.value == "" || Qty.value == ""){
        // alert("please confirm your input")
        window.location = window.location.origin+"/BizAp-V2/View/purchaseRequisition/createpRequisition.php?fail=Warning: please confirm your input";

        
      }else{
        console.log("I AM CLICKED")
        var child = tbodyy.lastElementChild; 
        while (child) {
        tbodyy.removeChild(child);
            child = tbodyy.lastElementChild;
        }

        let subIsem = {
          reqNo:RequisitionNumber1.value,
          ItemName:ItemName.value,
          Description:Description.value,
          UnitPrice:UnitPrice.value,
          Qty:Qty.value,
          SubTotal:parseFloat(Number(UnitPrice.value * Qty.value).toFixed(2))
        }

        eachData.item.push(subIsem)
        displayHtml(eachData,tbodyEle)

        let total = 0
        for (let items = 0; items < eachData.item.length; items++) {
          total+= eachData.item[items].SubTotal;    
        }
        Maintotal.innerText = parseFloat(Number(total).toFixed(2) ) 
        eachData.Total =  parseFloat(Number(total).toFixed(2) ) 

        // clear inputs
        ItemName.value = "";
        Description.value = "";
        UnitPrice.value = "";
        Qty.value = "";

      }

      // })
    }
    function submitRequisition(btn){
   
        let RequisitionNumber2 = document.querySelector(".regn"); 
        let from2 = document.querySelector(".from"); 
        let Subject2 = document.querySelector(".sub"); 
        let Date2 = document.querySelector(".date2"); 
        let Summary2 = document.querySelector(".summ");  
        let DatePrepared2 = document.querySelector(".dateprep"); 
        let tbodyEle = document.querySelector("#tbodyy");
        let Maintotal = document.querySelector("#total"); 
        let tostSucmsg = document.querySelector("#tbs")
        let tostFamsg = document.querySelector("#tbf")
        var tostFa = document.querySelector("#fai1")
        var tostSuc = document.querySelector("#succ1")
        if(from2.value == "" || Subject2.value == "" || Date2.value == "" || Summary2.value == "" || DatePrepared2.value == "" || RequisitionNumber2.value == ""){
        
          // alert("plese confirm your input")  
          window.location = window.location.origin+"/BizAp-V2/View/purchaseRequisition/createpRequisition.php?fail=Warning: please confirm your input";
   
        }else{
      
            LoadingDisplay("fail",btn)
            eachData.RequisitionNumber = RequisitionNumber2.value
            eachData.from = from2.value
            eachData.Subject = Subject2.value
            eachData.Date = Date2.value
            eachData.Summary = Summary2.value      
            eachData.DatePrepared = DatePrepared2.value

            let mydata = JSON.stringify({ "requisitionData":eachData })
            fetch("../../Controller/purchaseRequisitionController.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data) {
              if(data.status == "success"){
                LoadingDisplay(data.status,btn)
                RequisitionNumber2.value = "";
                from2.value = "";
                Subject2.value = "";
                Date2.value = "";
                Summary2.value = "";
                DatePrepared2.value = "";

                clearItenListAndElements(tbodyEle,Maintotal)
                window.location = window.location.origin+"/BizAp-V2/View/purchaseRequisition/createpRequisition.php?msg=Successful";
              }else{
                // console.log("response",data.msg)
                clearItenListAndElements(tbodyEle,Maintotal)
                window.location = window.location.origin+"/BizAp-V2/View/purchaseRequisition/createpRequisition.php?fail=Error"+data.msg;
               
              }
              console.log("respones",data)
            }).catch(err=>{
              if (err) {
                LoadingDisplay("problem",btn)
                window.location = window.location.origin+"/BizAp-V2/View/purchaseRequisition/createpRequisition.php?fail=Error"+err;
                // alert("Error:"+err)
              }
            })

         

        }
    
    }
    
    function remove(index){
      let Maintotal = document.querySelector("#total"); 
      let tbodyEle = document.querySelector("#tbodyy");
      eachData.item.splice(index,1)
      let total = 0
      for (let items = 0; items < eachData.item.length; items++) {
        total+= eachData.item[items].SubTotal;
        
      }
    }
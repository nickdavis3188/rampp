

  
  <!-- jquery
  ============================================ -->
  
  <script src="../../www/js/jQuery1.9.1.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../../www/js/bootstrap.min.js"></script>
 
    <!-- plugins JS
		============================================ -->

    <script src="../../www/js/plugins.js"></script>
     <!-- Data Table JS
		============================================ -->
    <script src="../../www/js/jquery.dataTables.min.js"></script>
    <script src="../../www/js/data-table-act.js"></script>


  <!-- plugins:js -->
  <script src="../../www/vendors/base/vendor.bundle.base.js" ></script>
 
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- <script src="../../www/vendors/chart.js/Chart.min.js"></script> -->
  <script src="../../www/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../www/js/off-canvas.js"></script>
  <script src="../../www/js/hoverable-collapse.js"></script>
  <script src="../../www/js/template.js"></script>
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../www/js/dashboard.js"></script>

  <script type="text/javascript">

  
    window.onload = ()=>{
    
     let par = new URLSearchParams(window.location.search)

     if (par.has("msg")) {

        toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")
   

        toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
      let elemet2 = document.querySelector('#succ')
      new bootstrap.Toast(elemet2,{animation:true,delay:10000}).show() 

     }else if(par.has("fail")){

      toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")
   

        toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        let elemet = document.querySelector('#fail')
        new bootstrap.Toast(elemet,{animation:true,delay:6000}).show()

     }else{
        toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")
   

        toggleFunc("#togle","#ui-basic7","#angle")
        toggleFunc("#togle1","#ui-basic8","#angle1")
        toggleFunc("#togle2","#ui-basic9","#angle2")
        
        toggleFunc("#togleA","#ui-basicA","#angleA")
        toggleFunc("#togleB","#ui-basicB","#angleB")
        toggleFunc("#togleC","#ui-basicC","#angleC")

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

     }


        // if (window.location.pathname.includes("View/HrManagement/addUser.php")) {
        //   let elemet2 = document.querySelector('#succ')
        //   new bootstrap.Toast(elemet2,{animation:true,delay:6000}).hide() 
        // }

    }

  
    function toggleFunc(itemClicked,itemToggle,iconElement) {
      var itemIdToBeClicked = document.querySelector(itemClicked)
      var itemToToggle = document.querySelector(itemToggle)
      var angleIcon = document.querySelector(iconElement)

      var flag = false

      itemIdToBeClicked.addEventListener("click",(e)=>{
      console.log("I AM CLICKED")
          flag = !flag

          if(flag == false){
              itemToToggle.style.display = "none";             
              angleIcon.classList.remove("ti-angle-down")
              angleIcon.classList.add("ti-angle-right")
          }else{
              itemToToggle.style.display = "block";
              angleIcon.classList.remove("ti-angle-right")
              angleIcon.classList.add("ti-angle-down")
          }
      })
        
  }



  function chkInternetStatus() {
    if(!window.navigator.onLine) {
        alert("Oops! You're offline. Please check your network connection...");
    }
  }
    function loading(btn) {
      // var submitButtons = document.querySelector('#sub')
      
        console.log("B Iam clicked",btn)
        chkInternetStatus()
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }

          btn.innerText = "Loading..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")

          btn.appendChild(newSpan);

    }

    function updating(btn) {
      // var submitButtons = document.querySelector('#sub')
      
        console.log("B Iam clicked",btn)
        chkInternetStatus()
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }

          btn.innerText = "Updating..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")

          btn.appendChild(newSpan);

    }
    function approving(btn) {
      // var submitButtons = document.querySelector('#sub')
      
        console.log("B Iam clicked",btn)
        chkInternetStatus()
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }

          btn.innerText = "Approving..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")

          btn.appendChild(newSpan);

    }
    function deleting(btn) {
      // var submitButtons = document.querySelector('#sub')
      
        console.log("B Iam clicked",btn)
        chkInternetStatus()
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }

          btn.innerText = "Deleting..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")

          btn.appendChild(newSpan);

    }
   
    // setInterval(function(){
    //   window.addEventListener("online", (event) => {
    //     alert("No internet connection.")
    //     // const statusDisplay = document.getElementById("status");
    //     // statusDisplay.textContent = "Online";
    //   });
    // },10000)
  
  
  


</script>
  <!-- End custom js for this page-->
</body>

</html>
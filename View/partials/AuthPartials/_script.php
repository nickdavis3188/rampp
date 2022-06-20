
  <!-- plugins:js -->
  <script src="www/vendors/base/vendor.bundle.base.js" ></script>
 
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="www/vendors/chart.js/Chart.min.js"></script>
  <script src="www/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="www/js/off-canvas.js"></script>
  <script src="www/js/hoverable-collapse.js"></script>
  <script src="www/js/template.js"></script>
  <script src="www/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="www/js/dashboard.js"></script>

  <script>
      function loading(btn) {
      // var submitButtons = document.querySelector('#sub')
      
        console.log("B Iam clicked",btn)
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
  </script>
  <!-- End custom js for this page-->
</body>

</html>
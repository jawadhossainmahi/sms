


<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="">School Management System</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../admin/plugins/raphael/raphael.min.js"></script>
<script src="../admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard2.js"></script>

<script>
  let path = window.location.href;
  let nav_link = document.querySelectorAll('a');
  nav_link.forEach(e => {
    let href = e.getAttribute('href');
    if (href === (decodeURIComponent(path))) {
      e.classList.add('active');
      e.parentElement.parentElement.parentElement.classList.add('menu-opening');
      e.parentElement.parentElement.parentElement.classList.add('menu-open');
    }
  });
</script>


<!-- subject -->
<script>
  jQuery(document).ready(function() {
    jQuery('#class').change(function(){
      jQuery.ajax({
        'url':'ajax.php',
        'type':'post',
        'data':{'class_id':jQuery(this).val()},
        success: function(response){
          
          if(response.length >50){

            jQuery('#section_container').show();
            jQuery('#section').html(response);
          }
          else{
            jQuery('#section_container').hide();
            
          }
        }
      })
    })
  })
  jQuery(document).ready(function() {
        jQuery('#class1').change(function() {
            jQuery.ajax({
                'url': 'ajax.php',
                'type': 'post',
                'data': {
                    'class_id': jQuery(this).val()
                },
                success: function(response) {
                  
                    if (response.length > 50) {

                        jQuery('#section_container1').show();
                        jQuery('#section1').html(response);
                        console.log(response);
                    } else {


                        jQuery('#section_container1').hide();
                    }
                }
            })
        })
    })



  jQuery(document).ready(function() {
        jQuery('#period').change(function() {
            jQuery.ajax({
                'url': 'ajax.php',
                'type': 'post',
                'data': {
                    'period_id': jQuery(this).val()
                },
                success: function(response) {
                    if (response.length > 0) {

                        jQuery('#day_container').show();
                        jQuery('#day').html(response);
                    } else {
                        jQuery('#day_container').hide();

                    }
                }
            })
        })
    })


  //form section togggle section
  let add_new = document.getElementById('add_new');
  add_new.addEventListener('click',()=>{
    if(add_new.innerText == "Add new"){
    add_new.innerText='See List'
    }
    else
    {
      add_new.innerText='Add new'
    }
    let table = document.getElementById('table');
    let form = document.getElementById('form');
    form.classList.toggle('d-block')
    table.classList.toggle('d-none')
  })
</script>
</body>

</html>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/autosize/autosize.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/node-waves/waves.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/skin/js/demo.js"></script>

    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

     <!-- Custom Datatables Js -->
    <script src="<?php echo base_url(); ?>assets/skin/js/pages/tables/data.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/skin/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/skin/js/pages/forms/basic-form-elements.js"></script>
    
    <script type="text/javascript">
       function printDiv(divId) {
           var printContents = document.getElementById(divId).innerHTML;
           var originalContents = document.body.innerHTML;
           document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
           window.print();
           document.body.innerHTML = originalContents;
       }
    </script>

    <script>
        $(document).ready(function(){
          $("#add_schedule").on("submit", function(event){
            event.preventDefault();
            var formdata = $(this).serialize();
            $.ajax({
                url: '<?php echo base_url(); ?>Schedule/add_schedule', 
                method:'POST',
                data : formdata,
                success: function(data)
                {
                    alert(data);
                    $("#defaultModal").modal("hide");
                }
                error: function()
                {
                    alert('error')
                }
            });
          });
        });
    </script>

    <script>
    function checked(){
        var items=getElementsByname('mycheck');
        var selectedlist=[];
        for(var i=0; i<items.length; i++)       
        {
            if(items[i].type=='mycheck' && items[i].checked==true)                 
                selectedlist+=items[i].value+"\n";
        }
        alert(selectedlist);
    }
    </script>

    <script>
    $('.list').on('click','li', function(){
       $(this).addClass('active').siblings().removeClass('active');
    });
    </script>

</body>

</html>


        <!-- jQuery 3 -->
        <script src="js/jquery.min.js"></script>

        <!-- Sweet Alert 2 -->
        <script src="js/sweetalert2.min.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>

        <!-- SlimScroll -->
        <script src="js/jquery.slimscroll.min.js"></script>

        <!-- FastClick -->
        <script src="js/fastclick.js"></script>

        <!-- AdminLTE App -->
        <script src="js/adminlte.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/demo.js"></script>

        <!-- Modernizr -->
        <script src="../js/vendor/modernizr-3.8.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="../js/vendor/jquery-3.4.1.min.js"><\/script>')
        </script>

        <!-- Muestra el nombre del archivo cargado -->
        <script type="application/javascript">
            jQuery('input[type=file]').change(function(){
            var filename = jQuery(this).val().split('\\').pop();
            var idname = jQuery(this).attr('id');
            console.log(jQuery(this));
            console.log(filename);
            console.log(idname);
            jQuery('span.'+idname).next().find('span').html(filename);
            });
        </script>

        <!-- Scripts Personales -->
        <script src="js/posteo.js"></script>  
        <script src="js/login-ajax.js"></script>
        <script src="js/admin-ajax.js"></script>
        <script src="../js/app.js"></script>

    </body>
</html>

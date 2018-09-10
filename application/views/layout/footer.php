
            </main>
        </div>
	</div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php  echo base_url();?>assets/js/bootstrap.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>

    
    <?php if(isset($scripts)):?>
        
        <?php foreach ($scripts as $key => $value):?>
            <script type="text/javascript" src="<?php  echo base_url();?>assets/js_library/<?php  echo $value;?>"></script>
        <?php endforeach;?>
        <?php endif;?>


</body>

</html>
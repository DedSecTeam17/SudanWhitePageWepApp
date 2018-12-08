<footer class="page-footer" style="height: 100%">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a href="<?php echo Route::to('create', 'PhoneController', null, false) ?>" class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
        </ul>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 UnderScore Development Team
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
    });
</script>
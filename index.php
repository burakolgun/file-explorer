
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(function(){

    $('.has-files >div').on('click', function(){
        $(this).next('ul').toggle();
        $('.icon-folder', this).toggleClass('icon-folder-open');
    });

});
</script>

<style> 
@import "asset/fontello/css/fontello.css";
ul li ul {
    display: none;
}

has-files{
    background-color: green;
    text-align: right;
}
</style>

<?php
function listDirectory($dir) {
    $directories = glob($dir);
    echo '<ul>';

    foreach ($directories as $file) {
        echo "<li" . (is_dir($file) ? " class='has-files'" : null) . ">" . "<div>";

        if (is_file($file)) {
            echo "<i class='icon-file-code'> </i>";
        }

        if (is_dir($file)) {
            echo "<i class='icon-folder'> </i>";
        }
        echo $file. "</div>";   

        if (is_dir($file)) {
            listDirectory($file. '/*');
        }
        echo "</li>";
    }
    echo '</ul>';
}

listDirectory('*');
?>